import { NgModule } from '@angular/core';
import { RouterModule, Routes }   from '@angular/router';
import { CommonModule } from '@angular/common';
import { ListaCarteiraMensalComponent } from './lista-carteira-mensal.component';
// PRIME FACES
import {DataTableModule} from 'primeng/primeng';
import {TableModule} from 'primeng/table';
import {ListboxModule} from 'primeng/listbox';

const routes: Routes =  [
 { path: 'carteira-mensal', component: ListaCarteiraMensalComponent }
];

@NgModule({
  imports: [
    CommonModule,
    ListboxModule,
    DataTableModule,
    TableModule,    
    RouterModule.forChild(routes)
  ],
  declarations: [ListaCarteiraMensalComponent]
})
export class CarteiraMensalModule { }
