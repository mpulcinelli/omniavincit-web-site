import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';

import { BsDropdownModule } from 'ngx-bootstrap/dropdown';
import { TooltipModule } from 'ngx-bootstrap/tooltip';
import { ModalModule } from 'ngx-bootstrap/modal';
import { DashboardModule }  from './dashboard/dashboard.module';
import { CarteiraMensalModule } from './carteira-mensal/carteira-mensal.module';

import { AppComponent } from './app.component';
import { AppRoutingModule }  from "./app-routing.module";
import { SobreComponent } from './sobre/sobre.component';



import { MenuComponent } from './menu/menu.component';

@NgModule({
  declarations: [
    AppComponent,
    SobreComponent,
    MenuComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserModule,
    HttpClientModule,
    BsDropdownModule.forRoot(),
    TooltipModule.forRoot(),
    ModalModule.forRoot(),
    DashboardModule,
    CarteiraMensalModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
