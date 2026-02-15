import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NavbarComponent } from '../../shared/components/navbar/navbar';
import { FooterComponent } from '../../shared/components/footer/footer';
import { HeroSectionComponent } from './components/hero-section/hero-section';
import { SubjectsSectionComponent } from './components/subjects-section/subjects-section';
import { TestimonialsSectionComponent } from './components/testimonials-section/testimonials-section';
import { PartnersSectionComponent } from './components/partners-section/partners-section';
import { NewsSectionComponent } from './components/news-section/news-section';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [
    CommonModule,
    NavbarComponent,
    FooterComponent,
    HeroSectionComponent,
    SubjectsSectionComponent,
    TestimonialsSectionComponent,
    PartnersSectionComponent,
    NewsSectionComponent
  ],
  templateUrl: './home.html',
  styleUrls: ['./home.scss']
})
export class HomeComponent {}