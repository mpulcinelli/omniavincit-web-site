import { NgModule } from '@angular/core';
import { RouterModule, Routes }   from '@angular/router';
import { CommonModule } from '@angular/common';
import { ListaCarteiraMensalComponent } from './lista-carteira-mensal.component';

const routes: Routes =  [
 { path: 'carteira-mensal', component: ListaCarteiraMensalComponent }
];

@NgModule({
  imports: [
    CommonModule,
    RouterModule.forChild(routes)
  ],
  declarations: [ListaCarteiraMensalComponent]
})
export class CarteiraMensalModule { }
