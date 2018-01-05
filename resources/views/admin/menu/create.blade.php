@extends('layouts.admin')
@section('content')

<form class="" action="{{route('menu.store')}}" method="post">

  {{csrf_field()}}
  <div class="form_group">
    <label for="Menu">Menu</label>
    <input type="text" class="form-control" name="title">
  </div>
  <button type="submit" class="btn btn-primary" name="button">Create</button>
</form>
@endsection
