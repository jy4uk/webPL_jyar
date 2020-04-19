import { Component } from '@angular/core';
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
  constructor(private signupservice: SignupService) { }

  responsedata = new SignUp('', '', '');
  signUpModel = new SignUp('', '', '');

  confirm_msg = '';
  data_submitted = '';

  confirmSignUp(data) {
    console.log('in component.ts' , data);
    this.confirm_msg = 'User: ' + data.username;
    this.confirm_msg += 'Password: ' + data.password;
    this.confirm_msg += 'Retype Pass: ' + data.retypepassword;
 }

 // pass form data to orderService
 onSubmit(data): void {
    //this.responsedata = this.orderService.onSubmit(data)
    this.signupservice.sendSignUp(data)
        .subscribe((res) =>
            this.responsedata = res);
    
 }
}
