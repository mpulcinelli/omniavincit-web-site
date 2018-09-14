import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import {ConfigService} from "./config.service";

import {Acao} from "./../model/acao";

@Injectable({
  providedIn: 'root'
})
export class AcaoService {

  constructor(private http: HttpClient,
              private conf:ConfigService) {}

  getAcoes(){
      return this.http.get(this.conf.getWebApiPath() + 'acoes.php?param=listar')
                    .toPromise()
                    .then(data => { return data as Acao[]; });
  }

}
