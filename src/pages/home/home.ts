import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { YourContentPage } from '../your-content/your-content';
import { SignInPage } from '../sign-in/sign-in';
import { CreateAccountPage } from '../create-account/create-account';
import { ProfilePage } from '../profile/profile';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

  constructor(private navCtrl: NavController) {

  }

  navigateToYourContentPage (): void {
    this.navCtrl.push(YourContentPage);
  }

 signInPage () {
    this.navCtrl.push(SignInPage);
  }

createAccount() {
  this.navCtrl.push(CreateAccountPage);
}


}
