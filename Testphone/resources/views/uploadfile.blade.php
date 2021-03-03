@extends('layouts.app')

@section('title-block')Телефонная книга@endsection

@section('content')
      <?php
         echo Form::open(array('url' => '/uploadfile','files'=>'true'));
         echo 'Импорт контактов';
         echo Form::file('image');
         echo Form::submit('Загрузить');
         echo Form::close();
      ?>

      
@endsection
