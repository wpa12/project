import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';
import { StatusBar } from '@ionic-native/status-bar';
import { MyApp } from './app.component';

//import { Injectable } from '@angular/core';

// Importing the SQLite controller
//import { SQLite, SQLiteObject } from '@ionic-native/SQLite';

import { HomePage } from '../pages/home/home';


//Importing the new Page created through the CLI named 'your-content'
import { YourContentPage } from '../pages/your-content/your-content';

//Importing the new page created through the CLI named 'sign-in'
import { SignInPage } from '../pages/sign-in/sign-in';

//Importing the new page created through the CLI named 'create-account'
import { CreateAccountPage } from '../pages/create-account/create-account';

//Importing the new page created through the CLI named 'profile'
import { ProfilePage } from '../pages/profile/profile';



//These declarations are the pages of the application
@NgModule({
  
  declarations: [
    MyApp,
    HomePage,
    YourContentPage,
    SignInPage,
    CreateAccountPage,
    ProfilePage
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp),
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    YourContentPage,
    SignInPage,
    CreateAccountPage,
    ProfilePage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler}
  ]
})
export class AppModule {}
