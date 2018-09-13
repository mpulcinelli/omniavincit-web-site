import { BrowserModule } from '@angular/platform-browser';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import { NgModule, LOCALE_ID } from '@angular/core';
import { registerLocaleData } from '@angular/common';
import ptBr from '@angular/common/locales/pt';
import { HttpClientModule } from '@angular/common/http';

import { DashboardModule }  from './dashboard/dashboard.module';
import { CarteiraMensalModule } from './carteira-mensal/carteira-mensal.module';

import { AppComponent } from './app.component';
import { AppRoutingModule }  from "./app-routing.module";
import { SobreComponent } from './sobre/sobre.component';
import { MenuComponent } from './menu/menu.component';

registerLocaleData(ptBr);

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
    BrowserAnimationsModule,
    HttpClientModule,
    DashboardModule,
    CarteiraMensalModule
  ],
  providers: [{ provide: LOCALE_ID, useValue: 'pt' }],
  bootstrap: [AppComponent]
})
export class AppModule { }
