import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LanguageService, Language } from '../../../../core/services/language.service';

@Component({
  selector: 'app-contact-info',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './contact-info.html',
  styleUrls: ['./contact-info.scss']
})
export class ContactInfoComponent implements OnInit {
  currentLanguage: Language = 'ar';

  constructor(private languageService: LanguageService) {}

  ngOnInit(): void {
    this.languageService.currentLanguage$.subscribe(lang => {
      this.currentLanguage = lang;
    });
  }

  get isRTL(): boolean {
    return this.currentLanguage === 'ar';
  }

  getContactItems() {
    return [
      {
        type: 'email',
        text: 'support@domain.com',
        icon: 'email'
      },
      {
        type: 'phone',
        text: '+962-xxx-xxx-xxx',
        icon: 'phone'
      },
      {
        type: 'location',
        text: this.currentLanguage === 'ar' ? 'الأردن، عمان' : 'Jordan, Amman',
        icon: 'location'
      },
      {
        type: 'time',
        text: this.currentLanguage === 'ar' 
          ? '9:00 - 17:00 من الأحد الى الخميس' 
          : '9:00 - 17:00 Sunday to Thursday',
        icon: 'time'
      }
    ];
  }
}