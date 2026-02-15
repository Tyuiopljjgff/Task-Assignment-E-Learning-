import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { ApiService } from './api.service';
import { News } from '../models/news.model';
import { ApiResponse } from '../models/api-response.model';

@Injectable({
  providedIn: 'root'
})
export class NewsService {
  constructor(private apiService: ApiService) {}

  getNews(): Observable<News[]> {
    return this.apiService
      .get<ApiResponse<News[]>>('news')
      .pipe(
        map(response => response.data || [])
      );
  }
}