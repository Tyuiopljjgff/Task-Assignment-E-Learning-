// application-form/success-dialog/success-dialog.component.ts
import { Component, Inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MAT_DIALOG_DATA, MatDialogRef, MatDialogModule } from '@angular/material/dialog';

@Component({
  selector: 'app-success-dialog',
  standalone: true,
  imports: [CommonModule, MatDialogModule],
  template: `
    <div class="success-dialog-container" [attr.dir]="data.language === 'ar' ? 'rtl' : 'ltr'">
      <div class="success-icon">
        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="40" cy="40" r="40" fill="#10B981"/>
          <path d="M25 40L35 50L55 30" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
      
      <h2 class="dialog-title">
        {{ data.language === 'ar' ? 'تم الإرسال بنجاح!' : 'Successfully Submitted!' }}
      </h2>
      
      <p class="dialog-message">
        {{ data.language === 'ar' 
           ? 'تم إرسال طلبك بنجاح. سنتواصل معك قريباً عبر البريد الإلكتروني أو الهاتف.' 
           : 'Your application has been submitted successfully. We will contact you soon via email or phone.' }}
      </p>
      
      <button class="dialog-button" (click)="close()">
        {{ data.language === 'ar' ? 'حسناً' : 'OK' }}
      </button>
    </div>
  `,
  styles: [`
    .success-dialog-container {
      padding: 32px;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 24px;
    }

    .success-icon {
      animation: scaleIn 0.5s ease-out;
    }

    @keyframes scaleIn {
      0% {
        transform: scale(0);
        opacity: 0;
      }
      50% {
        transform: scale(1.1);
      }
      100% {
      
        opacity: 1;
      }
    }

    .dialog-title {
      font-family: 'Tajawal', sans-serif;
      font-weight: 700;
      font-size: 28px;
      color: #043458;
      margin: 0;
    }

    .dialog-message {
      font-family: 'Tajawal', sans-serif;
      font-weight: 400;
      font-size: 18px;
      line-height: 1.6;
      color: #545F71;
      margin: 0;
      max-width: 350px;
    }

    .dialog-button {
      padding: 16px 48px;
      background: linear-gradient(90deg, #09528A 0%, #043458 100%);
      border: none;
      border-radius: 12px;
      color: white;
      font-family: 'Tajawal', sans-serif;
      font-weight: 700;
      font-size: 18px;
      cursor: pointer;
      transition: transform 0.2s ease;
    }

    .dialog-button:hover {
      transform: scale(1.05);
    }

    .success-dialog-container[dir="rtl"] {
      .dialog-title,
      .dialog-message {
        text-align: center;
        direction: rtl;
      }
    }

    .success-dialog-container[dir="ltr"] {
      .dialog-title,
      .dialog-message {
        text-align: center;
        direction: ltr;
      }
    }
  `]
})
export class SuccessDialogComponent {
  constructor(
    public dialogRef: MatDialogRef<SuccessDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: { language: string }
  ) {}

  close(): void {
    this.dialogRef.close();
  }
}