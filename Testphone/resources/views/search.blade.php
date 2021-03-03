@extends('layouts.app')

@section('title-block')Результат поиска@endsection

@section('content')
<h1>Результат поиска</h1>
<div class="row col-md-12">
  <form action="{{route('search')}}" method="get">
  <div class="form-group col-md-10">
    <label for="name">Поиск:</label>
    <input type="text" name="s" id="s" placeholder="Что нужно искать?" class="form-control"></label>
  </div>

  <div class="form-group col-md-2">
    <button type="submit" clas="btn btn-primary btn-block">Поиск</button>
  </div>
</form>
</div>

@if(count($user))

<div class="table-responsive">
<table class="table table-hover table-striped">
 <thead>
  <tr>
   <th scope="col">Имя</th>
   <th scope="col">Номер</th>
   <th scope="col">Електронная почта</th>
  </tr>
 </thead>
 <tbody>
   @foreach($user as $el)
   <tr>
    <td>{{ $el->name }}</td>
    <td>{{$el->number}}</td>
    <td>{{$el->email}}</td>
   </tr>

   @endforeach
 </tbody>
</table>
</div>
@else <div class="alert alert-info">Записей нет</div>
@endif
@endsection
