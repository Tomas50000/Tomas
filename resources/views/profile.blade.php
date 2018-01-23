@extends('layouts.app')
@section('content')
@foreach($orders as $order)
<p>{{$order->created_at}}</p>
@foreach ($order->cart->items as $item)
<p>{{$item['item']['title']}}</p>
@endforeach
@endforeach
@endsection
