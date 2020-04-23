import { Component, Inject } from '@angular/core';
import { SignUp } from './signup';
import { SignupService } from './signup.service'

import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Sign Up';

  // constructor(private http: HttpClient) { }
  constructor(private signupservice: SignupService, private http: HttpClient) {   }

  responsedata = new SignUp('', '', '');
  signUpModel = new SignUp('', '', '');

  confirm_msg = '';

  confirmSignUp(data) {
    this.confirm_msg = 'User: ' + data.username;
    this.confirm_msg += 'Password: ' + data.password;
    this.confirm_msg += 'Retype Pass: ' + data.retypepassword;
 }

 // pass form data to signupService
 onSubmit(data): void {
    this.signupservice.sendSignUp(data)
        .subscribe((res) => {
            this.responsedata = res[0].response;    
            console.log('responsedata: ' + this.responsedata + " type: " + typeof(this.responsedata));
    
    }, (error) => {
      console.log('Error ', error);
    })
  }
}