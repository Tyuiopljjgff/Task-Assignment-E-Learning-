import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormBuilder, FormGroup, Validators, ReactiveFormsModule } from '@angular/forms';
import { MatDialog, MatDialogModule } from '@angular/material/dialog';
import { MajorsService } from '../../../../core/services/majors.service';
import { CareerSubmissionService } from '../../../../core/services/career-submission.service';
import { Major } from '../../../../core/models/major.model';
import { LanguageService, Language } from '../../../../core/services/language.service';
import { SuccessDialogComponent } from './success-dialog.component';
@Component({
  selector: 'app-application-form',
  standalone: true,
  imports: [CommonModule, ReactiveFormsModule, MatDialogModule],
  templateUrl: './application-form.html',
  styleUrls: ['./application-form.scss']
})
export class ApplicationFormComponent implements OnInit {
  applicationForm: FormGroup;
  majors: Major[] = [];
  selectedFileName: string = 'تحميل';
  loading = false;
  loadingMajors = true;
  submitSuccess = false;
  submitError: string | null = null;
  currentLanguage: Language = 'ar';

  constructor(
    private fb: FormBuilder,
    private majorsService: MajorsService,
    private careerSubmissionService: CareerSubmissionService,
    private languageService: LanguageService,
    private dialog: MatDialog
  ) {
    this.applicationForm = this.fb.group({
      job_position: ['معلم', Validators.required],
      years_experience: ['1+', Validators.required],
      major_id: ['', Validators.required],
      full_name: ['', Validators.required],
      phone: ['+962 xxxx xxxx', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      cv: [null, Validators.required]
    });
  }

  ngOnInit(): void {
    this.languageService.currentLanguage$.subscribe(lang => {
      this.currentLanguage = lang;
      this.updateFileName();
    });
    
    this.loadMajors();
  }

  loadMajors(): void {
    this.majorsService.getMajors().subscribe({
      next: (data) => {
        this.majors = data;
        this.loadingMajors = false;
      },
      error: (err) => {
        console.error('Error loading majors:', err);
        this.loadingMajors = false;
      }
    });
  }

  updateFileName(): void {
    if (this.selectedFileName === 'تحميل' || this.selectedFileName === 'Upload') {
      this.selectedFileName = this.currentLanguage === 'ar' ? 'تحميل' : 'Upload';
    }
  }

  onFileSelected(event: any): void {
    const file = event.target.files[0];
    if (file) {
      const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
      if (!allowedTypes.includes(file.type)) {
        this.submitError = this.currentLanguage === 'ar' 
          ? 'يرجى اختيار ملف PDF أو Word فقط' 
          : 'Please select PDF or Word file only';
        return;
      }

      if (file.size > 5 * 1024 * 1024) {
        this.submitError = this.currentLanguage === 'ar' 
          ? 'حجم الملف يجب أن لا يتجاوز 5 ميجابايت' 
          : 'File size should not exceed 5MB';
        return;
      }

      this.selectedFileName = file.name;
      this.applicationForm.patchValue({ cv: file });
      this.submitError = null;
    }
  }

  onSubmit(): void {
    if (this.applicationForm.valid) {
      this.loading = true;
      this.submitError = null;

      const formData = this.applicationForm.value;

      this.careerSubmissionService.submitApplication(formData).subscribe({
        next: (response) => {
          console.log('Form submitted successfully:', response);
          this.loading = false;
          
          // فتح Dialog عند النجاح
          this.openSuccessDialog();
          
          // إعادة تعيين النموذج
          this.applicationForm.reset({
            job_position: 'معلم',
            years_experience: '1+',
            phone: '+962 xxxx xxxx'
          });
          this.selectedFileName = this.currentLanguage === 'ar' ? 'تحميل' : 'Upload';
        },
        error: (err) => {
          console.error('Error submitting form:', err);
          this.loading = false;
          
          if (err.error?.errors) {
            const firstErrorKey = Object.keys(err.error.errors)[0];
            this.submitError = err.error.errors[firstErrorKey][0];
          } else {
            this.submitError = this.currentLanguage === 'ar' 
              ? 'حدث خطأ أثناء إرسال الطلب. يرجى المحاولة مرة أخرى.' 
              : 'An error occurred while submitting. Please try again.';
          }
        }
      });
    } else {
      Object.keys(this.applicationForm.controls).forEach(key => {
        const control = this.applicationForm.get(key);
        if (control?.invalid) {
          control.markAsTouched();
        }
      });
      this.submitError = this.currentLanguage === 'ar' 
        ? 'يرجى ملء جميع الحقول المطلوبة' 
        : 'Please fill all required fields';
    }
  }

  openSuccessDialog(): void {
    this.dialog.open(SuccessDialogComponent, {
      width: '400px',
      data: { language: this.currentLanguage },
      panelClass: 'success-dialog',
      disableClose: false
    });
  }

  isFieldInvalid(fieldName: string): boolean {
    const field = this.applicationForm.get(fieldName);
    return !!(field && field.invalid && field.touched);
  }

  getMajorName(major: Major): string {
    return this.currentLanguage === 'ar' ? major.name_ar : major.name_en;
  }

  get isRTL(): boolean {
    return this.currentLanguage === 'ar';
  }
}