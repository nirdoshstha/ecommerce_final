@extends('frontend.layouts.master')

@section('title')
Cart
@endsection

@section('content')
<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Cart</a></li>
                        </ul>
                        @if(session('status'))
                        <div class="alert alert-success" role="alert" >{{session('status')}}</div>
                        @endif


					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th style="width: 25%" class="text-center">PRODUCT</th>
								<th style="width: 25%" class="text-center">NAME</th>
								<th style="width: 15%">UNIT PRICE</th>
                                <th style="width: 10%"  class="text-center">QUANTITY</th>
								<th style="width: 10%"  class="text-center">STOCK</th>
								<th style="width: 5%" >TOTAL</th>
								<th style="width: 10%"  class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
                            @forelse(auth()->user()->carts as $carts )
                                <tr>
                                    <td class="image" data-title="No"><img src="https://via.placeholder.com/100x100" alt="#"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="#">{{$carts->product->name}}</a></p>
                                        <p class="product-des">{{$carts->description}}</p>
                                    </td>
                                    <td>
                                        <input type="number" class="price" value="{{$carts->price}}" style="width: 90px;" readonly >
                                    </td>
                                    <td>
                                        <input type="number" class="quantity text-center" name="quantity" min="1" max="{{$carts->product->stock}}" data-min="1" data-max="100" value="{{$carts->quantity}}">
                                    </td>
                                    <td>
                                        <span class="text-success"> {{$carts->product->stock}} Pcs</span>
                                    </td>

                                    <td >
                                        <input type="number" class="total_amount text-center" value="{{$carts->total_amount}}" style="width: 90px;" readonly>
                                    </td>

                                    <td class="action remove_product" data-title="Remove">
                                        <a href="#" class="remove_item"><i class="ti-trash remove-icon"></i></a>
                                        <input type="hidden" class="product_id" name="product_id" value="{{$carts->product->id}}">
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-danger fs-3">You have no files on the record.</td>
                                </tr>

                            @endforelse


						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal Nrs : <input type="number" id="total_sum" value="{{auth()->user()->carts->sum('total_amount')}}" style="width: 120px;" readonly>  </li>
										<li>Shipping<span>Free</span></li>
										<li>You Save<span>$20.00</span></li>
										<li class="last">You Pay<span>$310.00</span></li>
									</ul>
									<div class="button5">
										<a href="#" class="btn">Checkout</a>
										<a href="#" class="btn">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->

	<!-- Start Shop Services Area  -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
@endsection

@section('script')
<script>
    $(document).ready(function(){


        $('.quantity').on('change keyup',function(e){
            e.preventDefault();
            let quantity = $(this).val();
            let stock = $(this).parents('tr').find('.stock').val();

			let price = $(this).parents('tr').find('.price').val();
            let total = quantity*price;
            let total_amount = $(this).parents('tr').find('.total_amount');
            total_amount.val(total);

            let product_id = $(this).parents('tr').find('.product_id').val();
            $.ajax({
                url: "{{route('product.cart_update')}}",
                data: {_token: "{{csrf_token()}}", product_id: product_id, quantity:quantity},
                dataType: "JSON",
                method: "POST",
                success: function(resp) {
                    //$('.total_amount').text(resp.grand_total);
                   // let total_amount = resp.grand_total - shipping_charge;
                    $('#total_sum').val(resp.sub_total);
                    //alert(resp.sub_total);
                    },
                });
        });


        //Remove Cart

        $('.remove_item').on('click',function(e){
            e.preventDefault();
            if(confirm('Are you sure to delete this item ?')){
                let row =  $(this);
                let product_id = $(this).next().val();

                //let product_id = $(this).parents('tr').find('.product_id').val();
                $.ajax({
                    url: "{{route('product.cart_delete')}}",
                    data: {_token: "{{csrf_token()}}", product_id: product_id},
                    dataType: "JSON",
                    method: "POST",
                    success: function(resp) {
                        row.parents('tr').remove();
                        $('#total_sum').val(resp.sub_total);
                    },
                });
            }
        });






    });
</script>
@endsection
