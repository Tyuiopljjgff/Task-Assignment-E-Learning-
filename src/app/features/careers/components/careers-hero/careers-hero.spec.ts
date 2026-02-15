import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CareersHeroComponent } from './careers-hero';

describe('CareersHero', () => {
  let component: CareersHeroComponent;
  let fixture: ComponentFixture<CareersHeroComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CareersHeroComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CareersHeroComponent);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
