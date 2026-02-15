import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';

export type Language = 'ar' | 'en';

@Injectable({
  providedIn: 'root'
})
export class LanguageService {
  private currentLanguageSubject = new BehaviorSubject<Language>('ar');
  public currentLanguage$: Observable<Language> = this.currentLanguageSubject.asObservable();

  constructor() {
    // تحميل اللغة المحفوظة من localStorage
    const savedLanguage = localStorage.getItem('language') as Language;
    if (savedLanguage) {
      this.setLanguage(savedLanguage);
    }
  }

  getCurrentLanguage(): Language {
    return this.currentLanguageSubject.value;
  }

  setLanguage(language: Language): void {
    this.currentLanguageSubject.next(language);
    localStorage.setItem('language', language);
    
    // فقط تغيير لغة الصفحة بدون تغيير الاتجاه
    document.documentElement.lang = language;
  }

  toggleLanguage(): void {
    const newLanguage: Language = this.getCurrentLanguage() === 'ar' ? 'en' : 'ar';
    this.setLanguage(newLanguage);
  }

  // Helper method للحصول على النص حسب اللغة
  getLocalizedText(textAr: string, textEn: string): string {
    return this.getCurrentLanguage() === 'ar' ? textAr : textEn;
  }

  // Helper method لمعرفة إذا اللغة الحالية عربي (للاستخدام في الـ components)
  isRTL(): boolean {
    return this.getCurrentLanguage() === 'ar';
  }
}