import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { ApiService } from './api.service';
import { Partner } from '../models/partner.model';
import { ApiResponse } from '../models/api-response.model';

@Injectable({
  providedIn: 'root'
})
export class PartnersService {
  constructor(private apiService: ApiService) {}

  getPartners(): Observable<Partner[]> {
    return this.apiService
      .get<ApiResponse<Partner[]>>('partners')
      .pipe(
        map(response => response.data || [])
      );
  }
}