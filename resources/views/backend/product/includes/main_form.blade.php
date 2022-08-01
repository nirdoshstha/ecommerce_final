<div class="col-lg-12">

    <div class="mb-3 row">
        {{ Form::label('category_id', 'Category Name',['class' => 'col-md-3 col-form-label']); }}
         <div class="col-md-9">
         {{ Form::select('category_id', $data['category_id'], null, ['class' => 'form-control select2','id'=>'category_id', 'placeholder'=>'Categories Name']); }}
         @include('backend.includes.validation_error_message',['fieldname'=>'category_id'])
         </div>
       </div>

    <div class="mb-3 row">
       {{ Form::label('subcategory_id', 'Subcategory Name',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::select('subcategory_id', $data['subcategory_id'], null, ['class' => 'form-control select2','id'=>'sub_category_id', 'placeholder'=>'Subcategory Name']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'subcategory_id'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('name', 'Name',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('name', null, ['class' => 'form-control','placeholder'=>'Name']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'name'])

        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('slug', 'Slug',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('slug', null, ['class' => 'form-control','placeholder'=>'Slug']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'slug'])

        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('code', 'Code',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('code', null, ['class' => 'form-control','placeholder'=>'Code']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'code'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('brand_id', 'Brand Id',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::select('brand_id', $data['brands'] ,null, ['class' => 'form-control select2','placeholder'=>'Brand']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'brands'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('short_description', 'Short Description',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::textarea('short_description',null, ['class' => 'form-control','rows'=>'3']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'short_description'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('long_description', 'Long Description',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::textarea('long_description',null, ['class' => 'form-control', 'rows'=>'3']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'long_description'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('original_price', 'Original Price',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::number('original_price', null, ['class' => 'form-control','placeholder'=>'Original Price']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'original_price'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('offer_price', 'Offer Price',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::number('offer_price', null, ['class' => 'form-control','placeholder'=>'Offer Price']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'offer_price'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('quantity', 'Quantity',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::number('quantity', null, ['class' => 'form-control','placeholder'=>'Quantity']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'quantity'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('stock', 'Stock',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::number('stock', null, ['class' => 'form-control','placeholder'=>'Stock']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'stock'])
        </div>
      </div>

      <div>
        <div class="mb-3 row">
            {{ Form::label('image_name', 'Multiple Image',['class' => 'col-md-3 col-form-label']); }}
            <div class="col-md-9">
                {{--  <table class="table table-striped" id="image_wrapper">
                    <tr class="bg-light">
                        <th>Image Upload</th>
                        <th>Image Name</th>
                        <th>Action</th>
                    </tr>  --}}
                    {{--  <tr>
                        <td><input type="file" name="image_field" value=""></td>
                        <td><input type="text" class="form-control" name="image_value" value=""></td>
                        <td><i class="fas fa-trash text-danger"></i></td>
                    </tr>  --}}

                        {{--  <tr>
                            <td class="d-flex justify-content-between">
                                <input type="file" name="image_field[]" class="form-control" value="">
                                @if(isset($data['product_images']))
                                <img src="{{asset($img_path.$data['product_images']->image)}}" width="60">
                                @else No image
                                @endif
                            </td>
                            <td><input type="text" name="image_name[]" class="form-control" value="{{$data['row']->productImage->name ?? null}}"></td>
                            <td>
                                <a href="#" class="remove_multi_image"><i class="fas fa-trash text-danger"></i></a></td>
                        </tr>
                    <tr>
                        <td><a href="#" class="btn btn-success addMoreImage"><i class="fas fa-plus"></i> Add Image</td>
                    </tr>
                </table>  --}}

                <table class="table table-striped table-bordered" id="image_wrapper">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>

                    @if(isset($data['row']->productImages))
                    @foreach($data['row']->productImages as $product_image )
                    <tr>
                        <td>
                            {!! Form::file('image_field[]', null, ['class' => 'form-control']) !!}
                            <img src="{{asset($img_path.$product_image->image)}}" width="60">
                        </td>
                        <td>
                            {{ Form::text('image_name[]', $product_image->name?? Ok,['class' => 'form-control','id'=>'image_name','placeholder'=>'Enter Image Name']) }}
                        <td>
                            <a class="btn btn-block btn-danger sa-warning remove_multi_image "><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>
                            {!! Form::file('image_field[]',null,['class' => 'form-control']) !!}
                        </td>
                        <td>
                            {{ Form::text('image_name[]',null,['class' => 'form-control','id'=>'image_name','placeholder'=>'Enter Image Name']) }}
                        <td>
                            <a class="btn btn-block btn-danger sa-warning remove_multi_image "><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endif

                </table>
                <button class="btn btn-info" type="button" id="addMoreImage" style="margin-bottom: 20px">
                    <i class="fa fa-plus"></i>
                    Add
                </button>
            </div>

        </div>


      </div>



</div>


