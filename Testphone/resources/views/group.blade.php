@extends('layouts.app')

@section('title-block')Результат поиска@endsection

@section('content')
<h1>Результат поиска</h1>
<div class="form-group">

<form action="{{route('group')}}" method="get">
  <label for="q">Выберите группу:</br></label>
  <select name="q">
          @foreach($groups as $el)
            <option value="{{$el->id}}">{{$el->name}}</option>
          @endforeach
  </select>
  <button type="submit" clas="btn btn-primary btn-block">Просмотр</button>
</form>
</div>
@if(count($contacts))

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
   @foreach($contacts as $el)
   <tr>
    <td>{{$el->name }}</td>
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
