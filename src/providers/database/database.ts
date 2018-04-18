import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { SQLite, SQLiteObject } from '@ionic-native/SQLite';

@Injectable()
export class DatabaseProvider {

  constructor(private sqlite: SQLite) { 
    this.createDatabase();
  }
  
  createDatabase(){

    }
}

