import { Injectable } from '@angular/core';
import { SignUp } from './signup';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class SignupService {

  signup = new SignUp('','','');

  constructor(private http: HttpClient) { }

  sendRequest(data: any): Observable<any> {
    // return this.http.post('http://localhost/cs4640/inclass11/ngphp-post.php', data, {responseType: 'text'});
    // return this.http.post('http://localhost/cs4640/inclass11/ngphp-post.php', data, {responseType: 'json'});
    return this.http.post('http://localhost/inclass7/project/todo/signUpPage-db.php', data, {responseType: 'text'});
  }

  sendSignUp(data): Observable<SignUp> {
     return this.sendRequest(data);
  }

}
