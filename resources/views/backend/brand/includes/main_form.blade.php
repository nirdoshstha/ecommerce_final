<div class="col-lg-12">
    <div class="mb-3 row">

       {{ Form::label('name', 'Brand Name',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{--  {{ Form::text('name', ['nike'=>'Nike','addidas'=>'Addidas']null, ['class' => 'form-control','id'=>'name', 'placeholder'=>'eg: Nike, Addidas, Samsung etc..']); }}  --}}
        {{ Form::text('name', null, ['class' => 'form-control','id'=>'name', 'placeholder'=>'eg: Nike, Addidas, Samsung etc..']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'name'])
        </div>
      </div>


      <div class="mb-3 row">
        {{ Form::label('slug', 'Slug',['class' => 'col-md-3 col-form-label']); }}
         <div class="col-md-9">
         {{ Form::text('slug', null, ['class' => 'form-control','id'=>'slug']); }}
         @include('backend.includes.validation_error_message',['fieldname'=>'slug'])
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
