import { Component, OnInit } from '@angular/core';
//import { formatDate } from '@angular/common';
import {Acao} from '../model/acao'

@Component({
  selector: 'app-lista-carteira-mensal',
  templateUrl: './lista-carteira-mensal.component.html',
  styleUrls: ['./lista-carteira-mensal.component.css']
})
export class ListaCarteiraMensalComponent implements OnInit {
//Atualizacao:formatDate(this.agora, 'dd-MM-yyyy hh:mm:ss a', 'pt-BR', '+3000')

  acoes: Acao[];
  constructor() { }
  agora=new Date();

  ngOnInit() {

      this.acoes = [
                        { Id : 1, Codigo:'0001', Last:10, Atualizacao:this.agora, Volatilidade:10},
                        { Id : 2, Codigo:'0001', Last:10, Atualizacao:this.agora, Volatilidade:10}
                    ];
  }

}
