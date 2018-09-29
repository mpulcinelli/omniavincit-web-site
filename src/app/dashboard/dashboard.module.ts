import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule, Routes }   from '@angular/router';
import { DashboardComponent } from './dashboard.component';
import { QuadroInformacaoAtivoComponent } from '../quadro-informacao-ativo/quadro-informacao-ativo.component';

const routes: Routes =  [
  { path: 'dashboard',  component: DashboardComponent },
];

@NgModule({
  imports: [
    CommonModule,
    RouterModule.forChild(routes)
  ],
  declarations: [DashboardComponent, QuadroInformacaoAtivoComponent]
})
export class DashboardModule{}
