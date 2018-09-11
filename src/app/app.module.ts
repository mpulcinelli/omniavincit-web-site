import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';
import { AppRoutingModule }  from "./app-routing.module";
import { SobreComponent } from './sobre/sobre.component';

import { DashboardModule }  from './dashboard/dashboard.module';

@NgModule({
  declarations: [
    AppComponent,
    SobreComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserModule,
    HttpClientModule,
    DashboardModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
