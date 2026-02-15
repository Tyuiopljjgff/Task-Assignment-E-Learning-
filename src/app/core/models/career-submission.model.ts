import { Major } from './major.model';

export interface CareerSubmission {
  job_position: string;
  years_experience: string;
  major_id: number;
  full_name: string;
  phone: string;
  email: string;
  cv: File;
}

export interface CareerSubmissionResponse {
  id: number;
  job_position: string;
  years_experience: string;
  major_id: number;
  full_name: string;
  phone: string;
  email: string;
  cv_path: string;
  status: 'pending' | 'reviewed' | 'rejected';
  major?: Major;
  created_at: string;
  updated_at: string;
}