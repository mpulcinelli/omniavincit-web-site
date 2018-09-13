import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListaCarteiraMensalComponent } from './lista-carteira-mensal.component';

describe('ListaCarteiraMensalComponent', () => {
  let component: ListaCarteiraMensalComponent;
  let fixture: ComponentFixture<ListaCarteiraMensalComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListaCarteiraMensalComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListaCarteiraMensalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
