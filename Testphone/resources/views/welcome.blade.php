@extends('layouts.app')

@section('title-block')Телефонная книга@endsection

@section('content')
<div id="message"></div>
<h1>Телефонная книга</h1>
<div class="row">

<form action="{{route('group')}}" method="get">
@csrf
<div class="form-group">
  <label for="g">Выберите группу:</br></label>
  <select class="groupContact form-control" name="q" onchange="GroupSelected(this)">
    @foreach($group as $el)
      <option value="{{$el->name}}">{{$el->name}}</option>
    @endforeach
  </select>
  <button type="submit" class="btn btn-primary btn-block">Просмотр</button>
</div>
</form>
</div>

<div class="tabs row">
<ul class="tabs__caption">
  <li class="active">Контакты</li>
  @foreach($group as $el)
    <li  name="q" value="{{$el->name}}">{{$el->name}}</li>
  @endforeach
</ul>

<div class="tabs__content  active">
<sector>
<table class="table table-hover table-striped">
 <thead>
  <tr>
     <th scope="col"><input type="checkbox" name="allContact"  value="all" onchange="CheckAll(this)"></th>
     <th scope="col">Имя</th>
     <th scope="col">Номер</th>
     <th scope="col">Електронная почта</th>
     <th scope="col"></th>
     <th scope="col"></th>
  </tr>
 </thead>
 <tbody>
   @foreach($data as $el)
   <tr>
    <td><input type="checkbox" id="ckeck{{$el->id}}" name="Contacts[]" value="{{$el->id}}" onchange="OptionsSelected(this)"></td>
    <td>{{ $el->name }}</td>
    <td>{{$el->number}}</td>
    <td>{{$el->email}}</td>
    <td><a href="{{ route('contact-update', $el->id)}}"><button class="btn btn-warning" >Редактировать</button></td>
    <td><a href="{{ route('contact-delete', $el->id)}}"><button type="submit"  class="btn btn-danger" id="submit{{$el->id}}"disabled>Удалить</button></a></td>
   </tr>
   @endforeach
 </tbody>
</table>

</div>
</sector>

@foreach($group as $el)
<div class="tabs__content" id="{{$el->name}}">
  <table class="table table-hover table-striped">
   <thead>
    <tr>
       <th scope="col">Имя</th>
       <th scope="col">Номер</th>
       <th scope="col">Електронная почта</th>
       <th scope="col">Группы</th>
    </tr>
   </thead>
   <tbody>

  @foreach($data as $elem)

  @if($el->name == $elem->group)
  <tr>
   <td>{{$elem->name }}</td>
   <td>{{$elem->number}}</td>
   <td>{{$elem->email}}</td>
   <td>{{$elem->group}}</td>
  </tr>
  @endif
  @endforeach
</tbody>
</table>
</div>
@endforeach


<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@endsection
