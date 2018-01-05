@extends('layouts.admin')
@section('content')
  <div class="col-md-4">
    <ul class="list-group">
    @foreach($menus as $menu)
      <li class="list-group-item clearfix">{{$menu->title}}
        <form action="{{ route('menu.destroy', $menu) }}" method="POST"
                 style="display: inline"
                 onsubmit="return confirm('Are you sure?');">
               <input type="hidden" name="_method" value="DELETE">
               {{ csrf_field() }}
               <button class="btn btn-danger pull-right">Delete</button>
           </form>
        <a class="btn btn-primary pull-right" href="{{route('menu.edit', $menu)}}">Edit</a></li>
    @endforeach
  </ul>
  <ul class="">
    <li class=""><a class="btn btn-default pull-left" href="{{route('admin')}}">Atgal</a><a class="btn btn-success pull-right" href="{{route('menu.create')}}">Sukurti</a></li>

  </ul>
  </div>

@endsection
