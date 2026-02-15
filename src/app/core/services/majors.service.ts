import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { ApiService } from './api.service';
import { Major } from '../models/major.model';
import { ApiResponse } from '../models/api-response.model';

@Injectable({
  providedIn: 'root'
})
export class MajorsService {
  constructor(private apiService: ApiService) {}

  getMajors(): Observable<Major[]> {
    return this.apiService
      .get<ApiResponse<Major[]>>('majors')
      .pipe(
        map(response => response.data || [])
      );
  }
}