@extends('layouts.app')

@section('title-block')Результат поиска@endsection

@section('content')
<h1>Результат поиска</h1>
<div class="form-group">

<form action="{{route('group')}}" method="get">
  <label for="g">Выберите группу:</br></label>
  <select name="q">
          @foreach($group as $el)
            <option value="{{$el->name}}">{{$el->name}}</option>
          @endforeach
  </select>
  <button type="submit" clas="btn btn-primary btn-block">Просмотр</button>
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
   <th scope="col">Группа</th>
  </tr>
 </thead>
 <tbody>
   @foreach($user as $el)
   <tr>
    <td>{{ $el->name }}</td>
    <td>{{$el->number}}</td>
    <td>{{$el->email}}</td>
    <td>{{$el->group}}</td>
   </tr>

   @endforeach
 </tbody>
</table>
</div>
@else <div class="alert alert-info">Записей нет</div>
@endif
@endsection
