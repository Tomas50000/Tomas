@extends('layouts.admin')
@section('content')

<form class="container" action="{{route('dish.update', $dish)}}" method="post" enctype="multipart/form-data" >
  <input type="hidden" name="_method" value="PUT">

  {{csrf_field()}}
  <div class=" form-group">
    <label for="Name">Title</label>
    <input name="title" type="text" class="form-control" value="{{$dish->title}}" >
  </div>
  <div class="form-group">
  <label for="comment">description:</label>
  <textarea name="description" class="form-control" rows="5"></textarea>
</div>
  <div class="form-group">
    <label for="price">price</label>
    <input name="price" type="text" class="form-control" value="{{$dish->price}}" >
  </div>
  <div class="form-group">
    <select class="form-controll" name="menu_id">

    <label>Menu</label>
    @foreach ($menus as $menu)
    <option value="{{$menu->id}}"
      @if ($menu->id == $dish->menu_id)
      selected @endif >
       >{{$menu->title}}</option>
    @endforeach
    </select>
  </div>
  <div  class="form-group photostilius">
    <label for="photo">photo</label>
    <input name="photo" type="file" >
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection
