import { NgModule } from '@angular/core';
import { RouterModule, Routes }   from '@angular/router';
import { CommonModule } from '@angular/common';
import { ListaCarteiraMensalComponent } from './lista-carteira-mensal.component';
// PRIME FACES
import {DataTableModule} from 'primeng/primeng';
import {TableModule} from 'primeng/table';
import {ListboxModule} from 'primeng/listbox';
import {ButtonModule} from 'primeng/button';

const routes: Routes =  [
 { path: 'carteira-mensal', component: ListaCarteiraMensalComponent }
];

@NgModule({
  imports: [
    CommonModule,
    ListboxModule,
    DataTableModule,
    TableModule,
    ButtonModule,
    RouterModule.forChild(routes)
  ],
  declarations: [ListaCarteiraMensalComponent]
})
export class CarteiraMensalModule { }
