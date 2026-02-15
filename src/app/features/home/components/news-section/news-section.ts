import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NewsService } from '../../../../core/services/news.service';
import { News } from '../../../../core/models/news.model';
import { StorageUrlPipe } from '../../../../shared/pipes/storage-url.pipe';
import { LanguageService, Language } from '../../../../core/services/language.service';

@Component({
  selector: 'app-news-section',
  standalone: true,
  imports: [CommonModule, StorageUrlPipe],
  templateUrl: './news-section.html',
  styleUrls: ['./news-section.scss']
})
export class NewsSectionComponent implements OnInit {
  newsItems: News[] = [];
  loading = true;
  error: string | null = null;
  currentLanguage: Language = 'ar';

  constructor(
    private newsService: NewsService,
    private languageService: LanguageService
  ) {}

  ngOnInit(): void {
    this.languageService.currentLanguage$.subscribe(lang => {
      this.currentLanguage = lang;
    });
    
    this.loadNews();
  }

  loadNews(): void {
    this.loading = true;
    this.error = null;
    
    this.newsService.getNews().subscribe({
      next: (data) => {
        this.newsItems = data;
        this.loading = false;
      },
      error: (err) => {
        console.error('Error loading news:', err);
        this.error = this.currentLanguage === 'ar' 
          ? 'فشل تحميل الأخبار' 
          : 'Failed to load news';
        this.loading = false;
      }
    });
  }

  formatDate(dateString: string): string {
    const date = new Date(dateString);
    const locale = this.currentLanguage === 'ar' ? 'ar-EG' : 'en-US';
    
    return date.toLocaleDateString(locale, {
      day: '2-digit',
      month: '2-digit',
      year: 'numeric'
    });
  }

  getNewsTitle(news: News): string {
    return this.currentLanguage === 'ar' ? news.title_ar : news.title_en;
  }

  getNewsDescription(news: News): string {
    return this.currentLanguage === 'ar' ? news.description_ar : news.description_en;
  }

  get isRTL(): boolean {
    return this.currentLanguage === 'ar';
  }
}