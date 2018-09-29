import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, of } from 'rxjs';
import { catchError, map, tap } from 'rxjs/operators';

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

  getAcoesV2():Observable<Acao[]>{

      return this.http.get<Acao[]>(this.conf.getWebApiPath() + 'acoes.php?param=listar')
      .pipe(
          tap(heroes => this.log('fetched heroes')),
                 catchError(this.handleError('getHeroes', []))

      );

  }
  private handleError<T> (operation = 'operation', result?: T) {
      return (error: any): Observable<T> => {

        // TODO: send the error to remote logging infrastructure
        console.error(error); // log to console instead

        // TODO: better job of transforming error for user consumption
        this.log(`${operation} failed: ${error.message}`);

        // Let the app keep running by returning an empty result.
        return of(result as T);
      };
    }

  private log(message: string) {
      console.log(message);
    }
}
