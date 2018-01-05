@extends('layouts.admin')
@section('content')
  <div class="col-md-4">
    <ul class="list-group">
    @foreach($dishes as $dish)
      <li class="list-group-item clearfix">{{$dish->title}}
        <form action="{{ route('dish.destroy', $dish) }}" method="POST"
                 style="display: inline"
                 onsubmit="return confirm('Are you sure?');">
               <input type="hidden" name="_method" value="DELETE">
               {{ csrf_field() }}
               <button class="btn btn-danger pull-right">Delete</button>
               <a class="btn btn-primary pull-right" href="{{route('dish.edit', $dish)}}">Edit</a>
           </form>
           </li>
        <li class="list-group-item">{{$dish->description}}</li>
        <li class="list-group-item">{{$dish->price}}</li>
        <li class="list-group-item"><img src="/storage/image/{{$dish->photo}}" alt="paveikslas"></li>
    @endforeach
  </ul>
  <ul class="">
    <li class=""><a class="btn btn-default pull-left" href="{{route('admin')}}">Atgal</a><a class="btn btn-success pull-right" href="{{route('dish.create')}}">Sukurti</a></li>

  </ul>
  </div>

@endsection
