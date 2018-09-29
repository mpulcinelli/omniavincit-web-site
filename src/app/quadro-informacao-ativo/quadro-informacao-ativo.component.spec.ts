import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { QuadroInformacaoAtivoComponent } from './quadro-informacao-ativo.component';

describe('QuadroInformacaoAtivoComponent', () => {
  let component: QuadroInformacaoAtivoComponent;
  let fixture: ComponentFixture<QuadroInformacaoAtivoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ QuadroInformacaoAtivoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(QuadroInformacaoAtivoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
