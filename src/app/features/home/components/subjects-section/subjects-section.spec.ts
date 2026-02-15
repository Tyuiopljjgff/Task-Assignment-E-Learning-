import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SubjectsSectionComponent } from './subjects-section';

describe('SubjectsSection', () => {
  let component: SubjectsSectionComponent;
  let fixture: ComponentFixture<SubjectsSectionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [SubjectsSectionComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SubjectsSectionComponent);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
