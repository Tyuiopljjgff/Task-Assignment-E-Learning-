import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ApiService } from './api.service';
import { CareerSubmission, CareerSubmissionResponse } from '../models/career-submission.model';
import { ApiResponse } from '../models/api-response.model';

@Injectable({
  providedIn: 'root'
})
export class CareerSubmissionService {
  constructor(private apiService: ApiService) {}

  submitApplication(data: CareerSubmission): Observable<ApiResponse<CareerSubmissionResponse>> {
    const formData = new FormData();
    
    formData.append('job_position', data.job_position);
    formData.append('years_experience', data.years_experience);
    formData.append('major_id', data.major_id.toString());
    formData.append('full_name', data.full_name);
    formData.append('phone', data.phone);
    formData.append('email', data.email);
    formData.append('cv', data.cv);

    return this.apiService.postFormData<ApiResponse<CareerSubmissionResponse>>(
      'career-submissions',
      formData
    );
  }
}