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
    @foreach($cart->items as $item )
     <tr>
       <td><input type="checkbox" name="" value=""></td>
       <td>{{$item['item']['title']}}</td>
       <td>{{$item['qty']}}</td>
       <td>{{$item['item']['price']}}</td>
       <td>{{$item['price']}}</td>
       <td><a href="{{route('deleteByOne', $item['item']['id'])}}" type="button" class="btn btn-danger">DeleteByOne</a> <a href="{{route('cart.deleteAll', $item['item']['id'])}}" type="button" class="btn"> </a><a href="{{route('deleteCart', $item['item']['id'] )}}"><button type="button" class="btn btn-primary">Delete All</button></a></td>
     </tr>
     @endforeach
     @else
     <tr>
       <td>tuscias krepselis</td>
     </tr>
     @endif
   </tbody>
 </table>

 <a href="{{route('order.checkout')}}" type="button" class="btn btn-danger">Check out</a>
</div>
@endsection
