// core/models/partner.model.ts
export interface Partner {
  id: number;
  name_ar: string;
  name_en: string;
  logo: string | null;
  logo_url?: string;
  is_active?: boolean;
  order: number;
  created_at?: string;
  updated_at?: string;
}