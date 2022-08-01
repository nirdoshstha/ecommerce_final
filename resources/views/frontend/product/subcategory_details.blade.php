@extends('frontend.layouts.master')

@section('title')
Sub Category Details
@endsection

@section('content')

<section>
    <div class="container">
        <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Trending Item</h2>
						</div>
					</div>
				</div>
				<div class="row">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item"><a href="#">{{$data['subcategories']->category->name}}</a></li>
                              <li class="breadcrumb-item active" aria-current="page">{{$data['subcategories']->name}}</li>
                            </ol>
                          </nav>
                    </div>
					<div class="col-12">
						<div class="product-info">

							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="man" role="tabpanel">
									<div class="tab-single">
										<div class="row">
                                            @foreach ($data['product'] as $sub_category_details )

											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="product-details.html">
															@if(isset($sub_category_details->latestImage->image))
															<img class="default-img" src="{{asset('uploads/product/'.$sub_category_details->latestImage->image)}}" alt="#" class="img-fluid" width="550" height="750">
                                                            <img class="hover-img" src="{{asset('uploads/product/'.$sub_category_details->latestImage->image)}}" alt="#" class="img-fluid"  width="550" height="750">
                                                            @else <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                                            @endif
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="#">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="product-details.html">{{$sub_category_details->name}}</a></h3>
														<div class="product-price">
															<span>Nrs :{{$sub_category_details->offer_price}}</span>
														</div>
													</div>
												</div>
											</div>
                                            @endforeach

										</div>
									</div>
								</div>
								<!--/ End Single Tab -->


							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
    </div>
</section>
{{--  <section class="shop-home-list section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>On sale</h1>
                        </div>
                    </div>
                </div>
                <!-- Start Single List  -->
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/115x140" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h4 class="title"><a href="#">Licity jelly leg flat Sandals</a></h4>
                                <p class="price with-discount">$59</p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/115x140" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h4 class="title"><a href="#">Licity jelly leg flat Sandals</a></h4>
                                <p class="price with-discount">$59</p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src="https://via.placeholder.com/115x140" alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h4 class="title"><a href="#">Licity jelly leg flat Sandals</a></h4>
                                <p class="price with-discount">$59</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  --}}


@endsection

@section('script')
@endsection
