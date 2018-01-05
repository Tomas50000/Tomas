@extends('layouts.admin')
@section('content')

<form class="" action="{{route('menu.update', $menu)}}" method="post">
  <input type="hidden" name="_method" value="PUT">
  {{csrf_field()}}
  
  <div class="form_group">
    <label for="Menu">Menu</label>
    <input type="text" class="form-control" name="title" value="{{$menu->title}}">
  </div>
  <button type="submit" class="btn btn-primary" name="button">Edit</button>
</form>
@endsection
