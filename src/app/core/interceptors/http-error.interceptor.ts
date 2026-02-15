import { HttpInterceptorFn, HttpErrorResponse } from '@angular/common/http';
import { inject } from '@angular/core';
import { catchError, throwError } from 'rxjs';
import { Router } from '@angular/router';

export const httpErrorInterceptor: HttpInterceptorFn = (req, next) => {
  const router = inject(Router);

  return next(req).pipe(
    catchError((error: HttpErrorResponse) => {
      let errorMessage = 'حدث خطأ غير متوقع';

      if (error.error instanceof ErrorEvent) {
        // Client-side error
        errorMessage = `خطأ: ${error.error.message}`;
        console.error('Client-side error:', error.error.message);
      } else {
        // Server-side error
        console.error(
          `Backend returned code ${error.status}, ` +
          `body was: ${JSON.stringify(error.error)}`
        );

        switch (error.status) {
          case 400:
            errorMessage = 'طلب غير صحيح';
            break;
          case 401:
            errorMessage = 'غير مصرح لك بالدخول';
            router.navigate(['/']);
            break;
          case 403:
            errorMessage = 'ليس لديك صلاحية للوصول';
            break;
          case 404:
            errorMessage = 'المورد المطلوب غير موجود';
            break;
          case 422:
            // Validation errors
            if (error.error?.errors) {
              // سيتم التعامل معه في الـ component
              return throwError(() => error);
            }
            errorMessage = 'بيانات غير صحيحة';
            break;
          case 500:
            errorMessage = 'خطأ في الخادم، يرجى المحاولة لاحقاً';
            break;
          case 503:
            errorMessage = 'الخدمة غير متاحة حالياً';
            break;
          default:
            errorMessage = error.error?.message || 'حدث خطأ غير متوقع';
        }
      }

      // إرجاع الخطأ للـ component
      return throwError(() => ({
        ...error,
        userMessage: errorMessage
      }));
    })
  );
};