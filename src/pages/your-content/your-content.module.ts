import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { YourContentPage } from './your-content';

@NgModule({
  declarations: [
    YourContentPage,
  ],
  imports: [
    IonicPageModule.forChild(YourContentPage),
  ],
})
export class YourContentPageModule {}
