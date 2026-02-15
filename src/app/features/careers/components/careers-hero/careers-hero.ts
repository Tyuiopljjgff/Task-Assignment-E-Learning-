import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LanguageService, Language } from '../../../../core/services/language.service';

@Component({
  selector: 'app-careers-hero',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './careers-hero.html',
  styleUrls: ['./careers-hero.scss']
})
export class CareersHeroComponent implements OnInit {
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
}