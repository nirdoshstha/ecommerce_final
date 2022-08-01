@extends('frontend.layouts.master')

@section('title')
Product Details
@endsection

@section('content')



<section class="mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Product Details</h2>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card shadow">
                        <div class="shadow-lg">
                            @if(isset($data['product']))
                            <img src="{{asset('uploads/product/'.$data['product']->latestImage->image)}}" class="img-fluid shadow-lg" >
                            @else <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                            @endif
                        </div>
                        <div class="row px-3">
                            <div class="col-lg-3 border"><img src="{{asset('uploads/product/'.$data['product']->latestImage->image)}}" class="img-fluid shadow-lg" ></div>
                            <div class="col-lg-3 border"><img src="{{asset('uploads/product/'.$data['product']->latestImage->image)}}" class="img-fluid shadow-lg" ></div>
                            <div class="col-lg-3 border"><img src="{{asset('uploads/product/'.$data['product']->latestImage->image)}}" class="img-fluid shadow-lg" ></div>
                            <div class="col-lg-3 border"><img src="{{asset('uploads/product/'.$data['product']->latestImage->image)}}" class="img-fluid shadow-lg" ></div>

                        </div>
                        </div>
                    </div>
                    <div class="col-md-7 shadow">
                        <div class="py-2">
                            <span class="text-gray">Product/{{$data['product']->category->name}}/{{$data['product']->subcategory->name}}/{{$data['product']->name}} </span>
                        </div>
                        <div class="border-top py-3">
                        <h6 class="mt-3 mb-3" class="fw-bold mb-0">{{$data['product']->name}}</h6>
                        <p>{{$data['product']->long_description}}</p>
                        </div>
                        <div class="mb-2">
                            <small>Rating:</small>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>

                        </div>
                        <div class="py-2">
                            <span class="h6">Nrs: {{$data['product']->offer_price}}</span> <span class="p-3"></span>
                            <span class="h6 text-danger"><s>Nrs: {{$data['product']->original_price}} </s></span>
                        </div>

                        <div class="mt-2 d-flex" >
                          <div class="col-lg-4">
                            {{--  <select class="form-select" aria-label="Default select example">
                                <option selected>Select Size</option>
                                <option value="1">Samsung</option>
                                <option value="2">Nokia</option>
                                <option value="3">Iphone</option>
                                <option value="4">Nike</option>
                                <option value="5">Addidas</option>
                                <option value="6">Levis</option>
                              </select>  --}}
                        </div>
                     </div>

                    <form action="{{route('product.add_to_cart')}}" method="POST" id="form-cart">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$data['product']->id}}" >
                        <div class="py-3 d-flex justify-content-between" >

                                <h5 class="float-start p-2">Quantity: </h5>
                                <div class="button minus">
                                    <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quantity">
                                        <i class="ti-minus"></i>
                                    </button>
                                </div>
                                <input type="text" name="quantity" class="input-number"  data-min="1" data-max="5" value="1">
                                <div class="button plus">
                                    <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quantity">
                                        <i class="ti-plus"></i>
                                    </button>
                                </div>
                                <button type="button" class="btn btn-primary active" id="buy-confirm">Add To Cart</button>

                        </div>
                    </form>
<div class="row mt-3">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">this is Main Page Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur eaque nostrum debitis aut numquam impedit quod, ea blanditiis modi maxime quae, eos voluptatem pariatur. Voluptatibus, dolores quasi. Velit, magnam quas!</div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">This is second page Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore ratione ipsam maiores eaque exercitationem eius enim a vel soluta ducimus officiis aliquid, cum quibusdam, magnam, voluptatum rerum minus assumenda delectus.</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">..this is third page. Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae eligendi corporis laboriosam dolorem a nemo, nam ipsam, dolores magnam consequatur expedita obcaecati dicta, quas totam vitae amet itaque quisquam est.</div>
      </div>


</div>
                         </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section>
    <div class="container-fluid" style="margin-bottom: 50px">
        <div class="row">
             <div class="col-md-12 ">
                 <div>
                    <h3 class="text-center mt-3 mb-3">Related Items</h3>
                    <hr>
                 </div>
             </div>
        </div>
    </div>

    <section id="features">
        <div class="row container mx-auto">
            <div class="owl-carousel related-items owl-theme">
                @foreach ($data['related_products'] as $product )
                    <div class="product item text-center bg-light">
                        @if(isset($data['related_products']))
                        <img src="{{asset('uploads/product/'.$product->image)}}" class="img-fluid" >
                        @else <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                        @endif
                        <div class="fs-6 text-warning">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        </div>
                        <h6 class="mt-2 mb-2">{{$product->name}}</h6>
                        <h5>Nrs {{$product->offer_price}}</h5>
                        <button class="buy_btn mt-3">Buy Now</button>
                    </div>
                @endforeach
            </div>
            </div>
        </div>

      </section>
</section>

@endsection

@section('script')
    <script>
        $(document).ready(function(){

            $('#buy-confirm').click(function(){
                 if(!'{{auth()->user()}}')
                    $('#loginModal').modal('show');
                 else
                 $('#form-cart').submit();

                //
            });
        });
    </script>
@endsection
