import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { ApiService } from './api.service';
import { Testimonial } from '../models/testimonial.model';
import { ApiResponse } from '../models/api-response.model';

@Injectable({
  providedIn: 'root'
})
export class TestimonialsService {
  constructor(private apiService: ApiService) {}

  getTestimonials(): Observable<Testimonial[]> {
    return this.apiService
      .get<ApiResponse<Testimonial[]>>('testimonials')
      .pipe(
        map(response => response.data || [])
      );
  }
}