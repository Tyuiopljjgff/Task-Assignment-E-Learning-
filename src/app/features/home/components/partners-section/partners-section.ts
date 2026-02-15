import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LanguageService, Language } from '../../../../core/services/language.service';

@Component({
  selector: 'app-partners-section',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './partners-section.html',
  styleUrls: ['./partners-section.scss']
})
export class PartnersSectionComponent implements OnInit {
  currentLanguage: Language = 'ar';
  loading = false;
  error: string | null = null;

  // ✅ Static Partners Data
  partners = [
    {
      id: 1,
      name_ar: 'شركة المستقبل التعليمية',
      name_en: 'Future Education Company',
      logo: 'assets/images/photo_5803338048215911907_m.jpg'
    },
    {
      id: 2,
      name_ar: 'مؤسسة التميز الأكاديمي',
      name_en: 'Academic Excellence Foundation',
      logo: 'assets/images/photo_5803338048215911907_m.jpg'
    },
    {
      id: 3,
      name_ar: 'معهد النجاح الدولي',
      name_en: 'International Success Institute',
      logo: 'assets/images/photo_5803338048215911907_m.jpg'
    },
    {
      id: 4,
      name_ar: 'شركة الإبداع التعليمي',
      name_en: 'Creative Learning Company',
      logo: 'assets/images/photo_5803338048215911907_m.jpg'
    },
    {
      id: 5,
      name_ar: 'مركز التطوير المهني',
      name_en: 'Professional Development Center',
      logo: 'assets/images/photo_5803338048215911907_m.jpg'
    },
    {
      id: 6,
      name_ar: 'أكاديمية الرواد',
      name_en: 'Pioneers Academy',
      logo: 'assets/images/photo_5803338048215911907_m.jpg'
    },
    {
      id: 7,
      name_ar: 'مؤسسة العلم والمعرفة',
      name_en: 'Science and Knowledge Foundation',
      logo: 'assets/images/photo_5803338048215911907_m.jpg'
    },
    {
      id: 8,
      name_ar: 'شركة التعليم الذكي',
      name_en: 'Smart Education Company',
      logo: 'assets/images/photo_5803338048215911907_m.jpg'
    },
    {
      id: 9,
      name_ar: 'معهد الابتكار التربوي',
      name_en: 'Educational Innovation Institute',
      logo: 'assets/images/photo_5803338048215911907_m.jpg'
    },
    {
      id: 10,
      name_ar: 'مركز التدريب المتقدم',
      name_en: 'Advanced Training Center',
      logo: 'assets/images/photo_5803338048215911907_m.jpg'
    }
  ];

  constructor(private languageService: LanguageService) {}

  ngOnInit(): void {
    this.languageService.currentLanguage$.subscribe(lang => {
      this.currentLanguage = lang;
    });
  }

  getPartnerName(partner: any): string {
    return this.currentLanguage === 'ar' ? partner.name_ar : partner.name_en;
  }

  getPartnerLogo(partner: any): string {
    return partner.logo;
  }

  hasLogo(partner: any): boolean {
    return !!partner.logo;
  }

  get isRTL(): boolean {
    return this.currentLanguage === 'ar';
  }
}