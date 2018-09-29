import { Component, OnInit, Input } from '@angular/core';
import {AcaoService}  from "../servico/acao.service";
import {Acao} from '../model/acao';

@Component({
  selector: 'app-quadro-informacao-ativo',
  templateUrl: './quadro-informacao-ativo.component.html',
  styleUrls: ['./quadro-informacao-ativo.component.css']
})
export class QuadroInformacaoAtivoComponent implements OnInit {

    @Input() codigo:string;

    acoes: Acao[];

    constructor(private acaoService:AcaoService) { }

    agora=new Date();


  ngOnInit() {
      this.acaoService.getAcoesV2().subscribe(acao => this.retorno(acao) );
  }

retorno(a:Acao){
alert(a);
}

}
