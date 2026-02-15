import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AcademicLevelsService } from '../../../../core/services/academic-levels.service';
import { LanguageService, Language } from '../../../../core/services/language.service';
import { AcademicLevel } from '../../../../core/models/academic-level.model';
import { StorageUrlPipe } from '../../../../shared/pipes/storage-url.pipe';

@Component({
  selector: 'app-subjects-section',
  standalone: true,
  imports: [CommonModule, StorageUrlPipe],
  templateUrl: './subjects-section.html',
  styleUrls: ['./subjects-section.scss']
})
export class SubjectsSectionComponent implements OnInit {
  subjects: AcademicLevel[] = [];
  loading = true;
  error: string | null = null;
  currentLanguage: Language = 'ar';

  constructor(
    private academicLevelsService: AcademicLevelsService,
    private languageService: LanguageService
  ) {}

  ngOnInit(): void {
    this.languageService.currentLanguage$.subscribe(lang => {
      this.currentLanguage = lang;
    });
    
    this.loadAcademicLevels();
  }

  loadAcademicLevels(): void {
    this.loading = true;
    this.error = null;
    
    this.academicLevelsService.getAcademicLevels().subscribe({
      next: (data) => {
        this.subjects = data;
        this.loading = false;
      },
      error: (err) => {
        console.error('Error loading academic levels:', err);
        this.error = this.currentLanguage === 'ar' 
          ? 'فشل تحميل المراحل الدراسية' 
          : 'Failed to load academic levels';
        this.loading = false;
      }
    });
  }

  getSubjectName(subject: AcademicLevel): string {
    return this.currentLanguage === 'ar' ? subject.name_ar : subject.name_en;
  }

  get isRTL(): boolean {
    return this.currentLanguage === 'ar';
  }
}