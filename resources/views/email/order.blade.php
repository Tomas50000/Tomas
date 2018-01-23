<h1>Hello, {{$userName}}, yout order accepted</h1>
@foreach ($cart->items as $product)
<p>{{$product['item']['title']}}: Kiekis {{$product['qty']}}: Kaina {{$product['price']}}</p>
@endforeach
<p>Viso {{$cart->totalQty}}</p>
<p>Viso moketi {{$cart->totalPrice}}</p>
