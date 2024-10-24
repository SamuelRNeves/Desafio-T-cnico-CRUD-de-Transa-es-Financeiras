import { Component } from '@angular/core';
import { TransacaoService } from 'src/app/services/transacao.service';

@Component({
  selector: 'app-transacao-form',
  templateUrl: './transacao-form.component.html'
})
export class TransacaoFormComponent {
  transacao = {
    tipo: '',
    valor: 0,
    descricao: '',
    tipo_id: ''
  };

  constructor(private transacaoService: TransacaoService) {}

  onSubmit() {
    this.transacaoService.createTransacao(this.transacao).subscribe(
      response => {
        alert('Transação criada com sucesso!');
      },
      error => {
        console.error('Erro ao criar transação', error);
      }
    );
  }
}
