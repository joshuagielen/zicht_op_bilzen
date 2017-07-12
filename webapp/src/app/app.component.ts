import { Component } from '@angular/core';
import { Http } from "@angular/http";
import {
  FormBuilder,
  FormControl,
  FormGroup,
  Validators,
} from '@angular/forms';

@Component({
  selector: 'app-root',
  providers: [FormBuilder],
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css', '../assets/css/global.css']
})

export class AppComponent {
  title = 'app';
  public send_success = false;
  form: FormGroup;

  private mail = {
    email: '',
    firstname: '',
    lastname: '',
    message: '',
    subject: '',
    phone: ''
  };

  public year = new Date().getFullYear();

  public gallery = ['ingang-2.jpg', 'welkom.jpg', 'slaapkamer.jpg', 'bloem.jpg', 'terras.jpg' , 'living.jpg' , 'ingang.jpg' ];
  private endpoint = "http://www.zichtopbilzen.be/sendEmail.php";
  private http : Http;
  constructor(private fb : FormBuilder, http : Http){
    this.http = http;
    this.form = fb.group({
      email: ['', [Validators.required, this.validateEmail]],
      firstname: ['',Validators.required],
      lastname: ['',Validators.required],
      message: ['',Validators.required],
      phone: ['', this.validatePhone],
    })
  }

  onSendMail(data) {
    console.log(data);
    let postVars = {
      email: data.email,
      name: data.firstname + ' ' + data.lastname,
      message: data.message,
      phone: data.phone
    };

    console.log(postVars);
    console.log(this.http);

    //You may also want to check the response. But again, let's keep it simple.
    this.http.post(this.endpoint, postVars)
        .subscribe(
            response => {if(response.status == 200) {
                this.send_success = true;
                this.form.reset();
            }},
            response => console.log(response)
        )
  }

  validateEmail(c: FormControl) {
    let EMAIL_REGEXP = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    return EMAIL_REGEXP.test(c.value) ? null : {
      validateEmail: {
        valid: false
      }
    };
  }

  validatePhone(c: FormControl) {


    let be_landline = /^((\+|00)32\s?|0)(\d\s?\d{3}|\d{2}\s?\d{2})(\s?\d{2}){2}$/;
    let be_mobile = /^((\+|00)32\s?|0)4(60|[789]\d)(\s?\d{2}){3}$/;
    let nl_landline = /^(((0)[1-9]{2}[0-9][-]?[1-9][0-9]{5})|((\\+31|0|0031)[1-9][0-9][-]?[1-9][0-9]{6}))$/;
    let nl_mobile = /^(((\\+31|0|0031)6){1}[1-9]{1}[0-9]{7})$/i;
    let fr_landline = /^((\+|00)33\s?|0)[1-5](\s?\d{2}){4}$/;
    let fr_mobile = /^((\+|00)33\s?|0)[679](\s?\d{2}){4}$/;
    let lu_landline = /^((\+|00\s?)352)?(\s?\d{2}){3,4}$/;
    let lu_mobile = /^((\+|00\s?)352)?\s?6[269]1(\s?\d{3}){2}$/;


    let PHONE_REGEXP = new RegExp(be_landline.source + '|' + be_mobile.source + '|' + nl_mobile.source + '|' + nl_landline.source + '|' + fr_mobile.source + '|' + fr_landline.source + '|' + lu_mobile.source + '|' + lu_landline.source);

    return PHONE_REGEXP.test(c.value) ? null : {
      validatePhone: {
        valid: false
      }
    };
  }








}
