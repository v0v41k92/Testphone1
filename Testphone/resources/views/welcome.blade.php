@extends('layouts.app')

@section('title-block')Телефонная книга@endsection

@section('content')
<div id="message"></div>
<h1>Телефонная книга</h1>
<div class="row">
<div class="col-md-8">

</div>
<div class="col-md-4">

<form action="{{route('group')}}" method="get">
@csrf

<div class="form-group">
  <label for="g">Выберите группу:</br></label>

  <select class="groupContact" name="q">

    @foreach($group as $el)
      <option value="{{$el->name}}">{{$el->name}}</option>
    @endforeach

  </select>
  <button type="submit" clas="btn btn-primary btn-block">Просмотр</button>
</div>
</form>
</div>

<div class="table-responsive">
<form><table class="table table-hover table-striped">
 <thead>
  <tr>
     <th scope="col"><input type="checkbox" name="allContact"  value="all" onclick="CheckAll(this);"></th>
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
    <td><input type="checkbox" name="Contacts[]" value="{{$el->id}}"></td>
    <td>{{ $el->name }}</td>
    <td>{{$el->number}}</td>
    <td>{{$el->email}}</td>
    <td><a href="{{ route('contact-update', $el->id)}}"><button class="btn btn-warning" >Редактировать</button></td>
    <td><a href="{{ route('contact-delete', $el->id)}}"><button type="submit" clas="btn btn-danger">Удалить</button></a></td>
   </tr>
   @endforeach
 </tbody>
</table></form>

</div>


</div>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

@endsection
