import { Component, OnInit, OnDestroy } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LanguageService, Language } from '../../../../core/services/language.service';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-hero-section',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './hero-section.html',
  styleUrls: ['./hero-section.scss']
})
export class HeroSectionComponent implements OnInit, OnDestroy {
  currentLanguage: Language = 'ar';
  private languageSubscription?: Subscription;
  private autoSlideInterval?: any;
  
  // Dots & Active slide
  dots = [0, 1, 2, 3, 4];
  activeDot = 0;

  // صور السلايدر
  images = [
    '/assets/images/myimage.jpg',
    '/assets/images/myimage.jpg',
    '/assets/images/myimage.jpg',
    '/assets/images/myimage.jpg',
    '/assets/images/myimage.jpg'
  ];

  // ألوان الخلفية لكل سلايد
  colors = [
    'color-slide-1',
    'color-slide-2',
    'color-slide-3',
    'color-slide-1',
    'color-slide-2'
  ];

  constructor(private languageService: LanguageService) {}

  ngOnInit(): void {
    // Subscribe to language changes
    this.languageSubscription = this.languageService.currentLanguage$.subscribe(lang => {
      this.currentLanguage = lang;
    });

    // Auto slide every 5 seconds
    this.autoSlideInterval = setInterval(() => {
      this.activeDot = (this.activeDot + 1) % this.images.length;
    }, 5000);
  }

  ngOnDestroy(): void {
    // Clean up subscriptions
    if (this.languageSubscription) {
      this.languageSubscription.unsubscribe();
    }
    if (this.autoSlideInterval) {
      clearInterval(this.autoSlideInterval);
    }
  }

  goToSlide(index: number): void {
    this.activeDot = index;
  }

  get isRTL(): boolean {
    return this.currentLanguage === 'ar';
  }
}