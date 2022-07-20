<div class="col-lg-12">

    <div class="mb-3 row">
        {{ Form::label('category_id', 'Category Name',['class' => 'col-md-3 col-form-label']); }}
         <div class="col-md-9">
         {{ Form::select('category_id', $data['category_id'], null, ['class' => 'form-control select2','id'=>'category_id', 'placeholder'=>'Categories Name']); }}
         @include('backend.includes.validation_error_message',['fieldname'=>'category_id'])
         </div>
       </div>

    <div class="mb-3 row">
       {{ Form::label('name', 'Subcategory Name',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('name', null, ['class' => 'form-control','id'=>'name', 'placeholder'=>'Subcategory Name']); }}
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
        {{ Form::label('image_field', 'Image',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::file('image_field', null, ['class' => 'form-control','placeholder'=>'Image']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'image_field'])
            @if(isset($data['row']->image))
                <img src="{{asset($img_path.$data['row']->image)}}" class="img-fluid" alt="{{$data['row']->name}}" width="60">
                @else <span class="text-danger">No Image Found</span>
            @endif

        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('rank', 'Rank',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::number('rank', null, ['class' => 'form-control','placeholder'=>'Rank']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'rank'])

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

      <div class="form-group row">
        <div class="col-3">
            {{ Form::label('status', 'Status',["class" => "radiostatus"]) }}
        </div>
        <div class="col-9">
            <label class="radio-inline">
            {{ Form::radio('status',1, false) }} Hide </label>
            <label class="radio-inline">
            {{ Form::radio('status',0, true) }} Show </label>
        </div>
    </div>


      <div class="py-4 row d-flex justify-content-center">
          <button class="btn btn-outline-primary">Save Changes</button>
      </div>
</div>
