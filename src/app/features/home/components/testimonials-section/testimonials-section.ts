import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TestimonialsService } from '../../../../core/services/testimonials.service';
import { Testimonial } from '../../../../core/models/testimonial.model';
import { StorageUrlPipe } from '../../../../shared/pipes/storage-url.pipe';
import { LanguageService, Language } from '../../../../core/services/language.service';

@Component({
  selector: 'app-testimonials-section',
  standalone: true,
  imports: [CommonModule, StorageUrlPipe],
  templateUrl: './testimonials-section.html',
  styleUrls: ['./testimonials-section.scss']
})
export class TestimonialsSectionComponent implements OnInit {
  testimonials: Testimonial[] = [];
  testimonialSlides: Testimonial[][] = [];
  dots: number[] = [];
  activeDot = 0;
  loading = true;
  error: string | null = null;
  currentLanguage: Language = 'ar';

  constructor(
    private testimonialsService: TestimonialsService,
    private languageService: LanguageService
  ) {}

  ngOnInit(): void {
    // Subscribe to language changes
    this.languageService.currentLanguage$.subscribe(lang => {
      this.currentLanguage = lang;
    });

    this.loadTestimonials();
  }

  loadTestimonials(): void {
    this.loading = true;
    this.error = null;

    this.testimonialsService.getTestimonials().subscribe({
      next: (data: Testimonial[]) => {
        this.testimonials = data;

        // تقسيم الشهادات على slides كل slide فيه 3 شهادات
        this.testimonialSlides = [];
        for (let i = 0; i < this.testimonials.length; i += 3) {
          this.testimonialSlides.push(this.testimonials.slice(i, i + 3));
        }

        // إعداد الدوتس حسب عدد السلايدات
        this.dots = Array(this.testimonialSlides.length).fill(0).map((_, i) => i);

        this.loading = false;
      },
      error: (err) => {
        console.error(err);
        this.error = this.currentLanguage === 'ar' ? 'فشل تحميل الشهادات' : 'Failed to load testimonials';
        this.loading = false;
      }
    });
  }

  goToSlide(index: number): void {
    this.activeDot = index;
  }

  nextSlide(): void {
    this.activeDot = (this.activeDot + 1) % this.testimonialSlides.length;
  }

  prevSlide(): void {
    this.activeDot = this.activeDot === 0 ? this.testimonialSlides.length - 1 : this.activeDot - 1;
  }

  get isRTL(): boolean {
    return this.currentLanguage === 'ar';
  }
}