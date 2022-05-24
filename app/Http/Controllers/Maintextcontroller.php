<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintext;
class Maintextcontroller extends Controller
{
  public function getIndex(Maintext $maintext){

    return view ('maintext', compact('maintext'));
  }
  public function postIndex(){
      //создали объект, добавили в БД, сохранили
      $maintext=new Maintext;
      $maintext->name ='Контакты';
      $maintext->body ='Текст для контактов';
      $maintext->url ='Contacts';
      $maintext->lang ='ru';
      $maintext->save();
      //это уже объект с другими полями
      return  response()->json($maintext);
  }
  public function getUrl($url){
      $maintext =Maintext::where('url',$url)->first();
      return view ('maintext', compact('maintext'));
  }
}
