import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ConfigService {

  constructor() { }

  getWebApiPath()
  {
      return 'http://localhost/app/webapi/';
  }

}
