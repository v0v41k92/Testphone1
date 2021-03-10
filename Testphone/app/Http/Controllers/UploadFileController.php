<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Collective\Html\FormFacade;

class UploadFileController extends Controller {
   public function index() {
      return view('uploadfile');
   }
   public function showUploadFile(Request $request) {
      $file = $request->file('image');
      $destinationPath = 'uploads';
      $file->move($destinationPath,$file->getClientOriginalName());
      return redirect()->route('home')->with('succes','Файл загружен');
   }





}
