import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { ActionSheetController } from 'ionic-angular';
import { ViewChild } from '@angular/core';

@IonicPage()
@Component({
  selector: 'page-your-content',
  templateUrl: 'your-content.html',
})
export class YourContentPage {

  constructor(public navCtrl: NavController, public navParams: NavParams, public actionCtrl: ActionSheetController) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad YourContentPage');
  }

  displayOptions () {
    let actionSheet = this.actionCtrl.create({
      title: 'Content control',
      buttons: [
        {
          text: 'Create Content',
          role: 'create',
          icon: 'md-create',
          handler: () => {
            console.log("create content clicked");
          }
        },
        {
          text: 'Delete Content',
          role: 'delete',
          icon: 'md-remove',
          handler: () => {
            alert("you clicked to delete item");
          }
        }
      ]
    });

    actionSheet.present();
  }

}
