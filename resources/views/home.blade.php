@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          @foreach($dishes as $dish)
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="thumbnail" >
					<img src="/storage/image/{{$dish->photo}}" class="img-responsive">
					<div class="caption">
      						<div class="row">
        							<div class="col-md-4 col-sm-4 col-xs-4 price">
            							<h3 style="margin:5px auto;"><label>${{$dish->price}}</label></h3>
        							</div>
            							<div class="col-md-8 col-sm-8 col-xs-8">
            								<a href="#" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Add 2 Cart</a>
                					</div>
            				</div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
  </div>
</div>
@endsection
