export interface AcademicLevel {
  id: number;
  name_ar: string;
  name_en: string;
  icon: string | null;
  icon_url?: string;   // 👈 أضفه
  is_active?: boolean;
}