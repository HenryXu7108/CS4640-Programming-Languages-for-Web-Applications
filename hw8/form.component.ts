import { Component, OnInit } from '@angular/core';

import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';
@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.css']
})
export class FormComponent implements OnInit {
  last :string;
  ans :string;
  prior : Array<string>;
  length : string;
  in_word : string;
  in_place : string;
  in_place_list : Array<string>;
  question :any;
  message :string;
  len1 : number;
  len2 : number;
  min : number;
  valid :number;
  constructor(
     private http:HttpClient
  ) {
    this.ans = "";
    this.last = "";
    this.prior = [];
    this.in_place_list =[];
    this.length ="";
    this.in_word = "";
    this.in_place = "";
    this.question = null;
    this.message = "Press New Word to get started";
    this.len1 = 0;
    this.len2 = 0;
    this.min = 0;
    this.valid = 0;
  }
  submit() {
    this.last = this.ans.toLowerCase();
    this.prior.push(this.last);
    if (this.last == this.question){
      this.message = "You got it, The word is " + this.question;
    }else{
      this.message = "Try again";
    }

    this.len1 = this.question.length

    this.len2 = this.last.length

    if (this.len1 == this.len2){
      this.length = "the same length";
      this.min = this.len1;
    }else if(this.len1 < this.len2){
      this.length = "too long";
      this.min = this.len1;
    }else{
      this.length = "too short";
      this.min = this.len2;
    }
    for (let i = 0; i < this.ans.length; i++) {
      if (this.question.indexOf(this.ans[i]) != -1){
        if (this.in_word.indexOf(this.ans[i]) == -1){
          this.in_word += this.ans[i] + "   "
        }
      }
    }

    for (let i = 0; i < this.min; i++){
      if(this.question[i] == this.ans[i]){
          var temp = (i+1).toString() + ": " + this.ans[i] + "   "
          this.in_place_list.push(temp)

      }
    }
    this.in_place_list = this.in_place_list.filter(function(elem, index, self) {
      return index === self.indexOf(elem);
    })


  }
  new_word(){

    this.http.post<any>("http://localhost/wordle_api.php", JSON.stringify(this.ans)).subscribe(
      (resp) =>{
        this.question = resp;
      }
    )

    if (this.question == null){
      this.question = "computer"
    }
    this.min = 0;
    this.valid = 1;
    //this.question = "computer"
    this.ans = "";
    this.last = "";
    this.prior = [];
    this.length ="";
    this.in_word = "";
    this.in_place = "";
    this.message = "Game started";
    this.len1 = 0;
    this.len2 = 0;

  }

  ngOnInit(): void {
  }

}
