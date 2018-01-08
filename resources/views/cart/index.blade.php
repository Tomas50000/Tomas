@extends('layouts.app')

@section('content')

<h1>Veikia</h1>
<div class="container-fluid">

 <table class="table table-hover">
   <thead>
     <tr>
       <th><input type="checkbox" name=""></th>
       <th>Preke</th>
       <th>Kiekis</th>
       <th>Kaina</th>
       <th>Suma</th>
       <th>Istrinti</th>
     </tr>
   </thead>
   <tbody>
    @if($cart)
    @foreach(($cart->items as $item )
     <tr>
       <td><input type="checkbox" name="" value=""></td>
       <td>{{$itmes['item']['title']}}</td>
       <td>{{$itmes['qty']}}</td>
       <td>{{$itmes['price']}}</td>
       <td>{{$items['price']}}</td>
       <td><button type="button" class="btn btn-danger">Delete</button></td>
     </tr>
     @endforeach
     @else
     <tr>
       <td>tuscias krepselis</td>
     </tr>
     @endif
   </tbody>
 </table>
 <a href="#"><button type="button" class="btn btn-primary">aaaa</button></a>
 <button type="button" class="btn btn-danger">Delete</button>
</div>
@endsection
