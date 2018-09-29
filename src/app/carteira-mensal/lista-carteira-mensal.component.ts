import { Component, OnInit } from '@angular/core';
//import { formatDate } from '@angular/common';
import {AcaoService}  from "../servico/acao.service";
import {Acao} from '../model/acao';

@Component({
  selector: 'app-lista-carteira-mensal',
  templateUrl: './lista-carteira-mensal.component.html',
  styleUrls: ['./lista-carteira-mensal.component.css']
})
export class ListaCarteiraMensalComponent implements OnInit {
//Atualizacao:formatDate(this.agora, 'dd-MM-yyyy hh:mm:ss a', 'pt-BR', '+3000')

  acoes: Acao[];
  constructor(private acaoService:AcaoService) { }
  agora=new Date();

  ngOnInit()
  {
      this.acaoService.getAcoes().then(acoes => this.acoes = acoes);
  }


  handleClick()
  {
      // debugger
        alert(this.acoes[0].NOME);
  }

}
