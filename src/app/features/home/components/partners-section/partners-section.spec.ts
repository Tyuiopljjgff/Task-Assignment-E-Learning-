import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PartnersSectionComponent } from './partners-section';

describe('PartnersSection', () => {
  let component: PartnersSectionComponent;
  let fixture: ComponentFixture<PartnersSectionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PartnersSectionComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PartnersSectionComponent);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
