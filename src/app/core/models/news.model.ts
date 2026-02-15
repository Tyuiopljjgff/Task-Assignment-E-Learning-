export interface News {
  id: number;
  title_ar: string;
  title_en: string;
  description_ar: string;
  description_en: string;
  image: string | null;
  image_url?: string;
  date: string;
  is_active?: boolean;
}