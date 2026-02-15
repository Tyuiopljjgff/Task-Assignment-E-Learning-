import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { ApiService } from './api.service';
import { AcademicLevel } from '../models/academic-level.model';
import { ApiResponse } from '../models/api-response.model';

@Injectable({
  providedIn: 'root'
})
export class AcademicLevelsService {
  constructor(private apiService: ApiService) {}

  getAcademicLevels(): Observable<AcademicLevel[]> {
    return this.apiService
      .get<ApiResponse<AcademicLevel[]>>('academic-levels')
      .pipe(
        map(response => response.data || [])
      );
  }
}