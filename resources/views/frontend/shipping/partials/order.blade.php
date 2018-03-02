<div class="your-order">
	<div class="order-item">
		<!--  one item	 -->
		<div class="media">
			@foreach($cart_item as $cart)
			<img width="10%" src="source/image/product/{{$cart->options->img}}" alt="" class="pull-left">
			<div class="media-body">
				<div class="col-md-6 col-sm-6 ">
					<p class="color-orange font-large">{{$cart->name}}</p>
					<span class="color-gray your-order-info">Color: Red</span>
					<span class="color-gray your-order-info">Size: M</span>
					<span class="color-gray your-order-info">Qty: {{$cart->qty}}</span>
					<span class="color-gray your-order-info">{{number_format($cart->price,0)}} VND</span>
				</div>
				<div class="col-md-6 col-sm-6">
					{{($cart->qty)*($cart->price)}} VND
				</div>
			</div>
			@endforeach
		</div>
		<!-- end one item -->
	</div>
	<div class="clearfix"></div>

	<div class="order-total">
		<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
		<div class="pull-right"><h5 class="color-black">{{Cart::Subtotal()}} VND</h5></div>
		<div class="clearfix"></div>
	</div>
</div>