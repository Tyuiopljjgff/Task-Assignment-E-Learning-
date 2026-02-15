import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NavbarComponent } from '../../shared/components/navbar/navbar';
import { FooterComponent } from '../../shared/components/footer/footer';
import { CareersHeroComponent } from './components/careers-hero/careers-hero';
import { ContactInfoComponent } from './components/contact-info/contact-info';
import { ApplicationFormComponent } from './components/application-form/application-form';

@Component({
  selector: 'app-careers',
  standalone: true,
  imports: [
    CommonModule,
    NavbarComponent,
    FooterComponent,
    CareersHeroComponent,
    ContactInfoComponent,
    ApplicationFormComponent
  ],
  templateUrl: './careers.html',
  styleUrls: ['./careers.scss']
})
export class CareersComponent {}