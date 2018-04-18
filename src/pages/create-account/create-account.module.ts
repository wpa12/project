import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';

import { CreateAccountPage } from './create-account';

/****************************************************************
    Created By: Wayne Anstey
    Student ID: 14015750
    Description: This file allows for module dependency injection
*****************************************************************/


@NgModule({
  declarations: [
    CreateAccountPage,
  ],
  imports: [
    IonicPageModule.forChild(CreateAccountPage),
  ],
})
export class CreateAccountPageModule {}
