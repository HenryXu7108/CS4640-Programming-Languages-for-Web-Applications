import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule} from "@angular/forms";
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';
import { FormComponent } from './form/form.component';


//link: https://cs4640.cs.virginia.edu/wx8mcm/hw8

@NgModule({
  declarations: [
    AppComponent,
    FormComponent,


  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpClientModule
  ],
  providers: [],
  exports: [
    FormComponent
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
