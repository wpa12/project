import { Component } from '@angular/core';
import { Platform } from 'ionic-angular';
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';

//Imports the 'HomePage' page that is created on project intialisation (at least one page must exist, therefore the CLI generates this).
import { HomePage } from '../pages/home/home';


@Component({
  templateUrl: 'app.html'
})

//creates a class then defines the root page as being the HomePage to be loaded first
export class MyApp {
  rootPage:any = HomePage;

  //constructor class that injects the imported classes at the top of this file for use.
  constructor(platform: Platform, statusBar: StatusBar, splashScreen: SplashScreen) {
    platform.ready().then(() => {

      statusBar.styleDefault();
      splashScreen.hide();
    });
  }
}

