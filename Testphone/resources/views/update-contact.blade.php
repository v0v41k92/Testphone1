@extends('layouts.app')

@section('title-block')Обновить контакт@endsection

@section('content')
  <h1>Обновить контакт</h1>



  <form action="{{route('contact-update-succes', $data->id)}}" method="post">
  @csrf

    <div class="form-group">
      <label for="name">Введите имя</label>
      <input type="text" name="name" value="{{$data->name}}" placeholder="Введите имя" id="name" class="form-control"></label>
    </div>
    <div class="form-group">
      <label for="number">Введите номер</label>
      <input type="text" name="number" value="{{$data->number}}" placeholder="Введите номер" id="number" class="form-control"></label>
    </div>
    <div class="form-group">
      <label for="email">email</label>
      <input type="text" name="email" value="{{$data->email}}" placeholder="Введите email" id="email" class="form-control"></label>
    </div>
    <div class="form-group">
      <label for="group">Выберите группу:</br></label>
    </div>
        <fieldset id="check">

          @foreach($group as $el)
            <div class="checkbox">
              <input type="checkbox" name="group[]"  value="{{$el->name}}"><label>{{$el->name}}</label>
            </div>
          @endforeach

      </fieldset>

    <button type="submit" class="btn btn-success">Обновить</button>

  </form>
  <a href="{{route('home')}}"><button type="submit" class="btn btn-danger">Назад</button></a>
@endsection
