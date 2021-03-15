@extends('layouts.app')

@section('title-block')Добавить группу@endsection

@section('content')
  <h1>Добавить группу</h1>



  <form action="{{route('group-form')}}" method="post">
  @csrf

    <div class="form-group">
      <label for="name">Введите название новой группы</label>
      <input type="text" name="name" placeholder="Введите имя" id="name" class="form-control"></label>
    </div>
    <button type="submit" class="btn btn-success">Сохранить</button>

  </form>
<a href="{{route('home')}}"><button class="btn btn-danger">Отмена</button></a>


<table class="table table-hover table-striped">
 <thead>
  <tr>
     <th scope="col">Название группы</th>
     <th scope="col"></th>
  </tr>
 </thead>
 <tbody>
        @foreach($groups as $el)
        <tr>
          <td>{{ $el->name }}</td>
          <td><a href="{{route('group-delete', $el->id)}}"><button type="submit"  class="btn btn-danger" id="submit{{$el->id}}">Удалить</button></a></td>
        </tr>
        @endforeach
  </tbody>
</table>
@endsection
