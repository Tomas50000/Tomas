@extends('layouts.app')
@section('content')

<form class="container" action="{{route('reservation.store')}}" method="post">
  {{csrf_field()}}
  <div class="form-group">
    <label> time </label>
    <input type="time" name="time" class="form-control" placeholder="time">
    <small class="form-text text-muted"> no name no game</small>
  </div>
  <div class="form-group">
    <label> Data : </label>
    <input type="date" name="date" class="form-control"  placeholder="Data">
  </div>
  <div class="form-group">
    <label> Asmenu kiekis : </label>
    <input type="number" name="person_count" class="form-control"  placeholder="Asmenu kiekis">
  </div>

  <button type="submit" class="btn btn-primary"> Registruotis </button>
</form>

@endsection
