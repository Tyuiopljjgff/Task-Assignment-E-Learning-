export interface Testimonial {
  id: number;
  student_name_ar: string;
  student_name_en: string;
  course_ar: string;
  course_en: string;
  text_ar: string;
  text_en: string;
  image: string | null;
  image_url?: string;
  color: 'green' | 'orange' | 'blue';
  is_active?: boolean;
}