import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class TransacaoService {
  private apiUrl = 'http://localhost:8000/api/transacoes';

  constructor(private http: HttpClient) {}

  getTransacoes(): Observable<any> {
    return this.http.get(this.apiUrl);
  }

  createTransacao(data: any): Observable<any> {
    return this.http.post(this.apiUrl, data);
  }

  // Métodos de edição e exclusão também vão aqui.
}
