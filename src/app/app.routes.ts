import { Routes } from '@angular/router';

export const routes: Routes = [
  {
    path: '',
    loadComponent: () => import('./features/home/home').then(m => m.HomeComponent)
  },
  {
    path: 'careers',
    loadComponent: () => import('./features/careers/careers').then(m => m.CareersComponent)
  },
  {
    path: '**',
    redirectTo: ''
  }
];