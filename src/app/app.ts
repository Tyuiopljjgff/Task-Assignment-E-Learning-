import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { GlobalLoadingComponent } from './shared/components/global-loading/global-loading.component';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, GlobalLoadingComponent],
  template: `
    <app-global-loading />
    <router-outlet />
  `,
  styles: []
})
export class AppComponent {
  title = 'educational-platform';
}