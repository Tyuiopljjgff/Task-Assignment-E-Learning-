import { Pipe, PipeTransform } from '@angular/core';
import { environment } from '../../../environments/environment';

@Pipe({
  name: 'storageUrl',
  standalone: true
})
export class StorageUrlPipe implements PipeTransform {
  transform(path: string | null | undefined): string {
    if (!path) {
      return 'assets/images/placeholder.jpg';
    }
    
    // إذا كان المسار يبدأ بـ http أو https، أرجعه كما هو
    if (path.startsWith('http://') || path.startsWith('https://')) {
      return path;
    }
    
    // إذا كان المسار من storage
    return `${environment.storageUrl}/${path}`;
  }
}