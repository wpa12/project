import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { SignInPage } from './sign-in';
import { ProfilePage } from '../profile/profile';

@NgModule({
  declarations: [
    SignInPage,
    ProfilePage
  ],
  imports: [
    IonicPageModule.forChild(SignInPage),
  ],
})
export class SignInPageModule {}
