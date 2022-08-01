<div class="col-lg-12">

    <div class="mb-3 row">
       {{ Form::label('name', 'Name *',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('name', null, ['class' => 'form-control','id'=>'name', 'placeholder'=>'Name']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'name'])
        </div>
      </div>


      <div class="mb-3 row">
        {{ Form::label('address', 'Address *',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('address', null, ['class' => 'form-control','placeholder'=>'Address *']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'address'])

        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('email', 'Email *',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('email', null, ['class' => 'form-control','placeholder'=>'Email']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'email'])

        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('phone', 'Phone',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::number('phone', null, ['class' => 'form-control','placeholder'=>'Phone']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'phone'])

        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('website', 'Website',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('website',null, ['class' => 'form-control','placeholder'=>'Website']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'website'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('pan_no', 'Pan No',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::number('pan_no',null, ['class' => 'form-control', 'placeholder'=>'Pan No' ]); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'pan_no'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('image_field', 'Logo',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::file('image_field',null, ['class' => 'form-control', 'placeholder'=>'Logo' ]); }}
        @if (isset($data['row']->logo))
        <img src="{{asset('uploads/setting/'.$data['row']->logo)}}" width="90">

        @endif
        @include('backend.includes.validation_error_message',['fieldname'=>'image_field'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('fav_icon', 'Fav Icon ',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('fav_icon',null, ['class' => 'form-control', 'placeholder'=>'Fav Icon ' ]); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'fav_icon'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('facebook_link', 'Facebook ',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('facebook_link',null, ['class' => 'form-control', 'placeholder'=>'Facebook ' ]); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'facebook_link'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('twitter_link', 'Twitter ',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('twitter_link',null, ['class' => 'form-control', 'placeholder'=>'Twitter ' ]); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'twitter_link'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('youtube_link', 'Youtube',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('youtube_link',null, ['class' => 'form-control', 'placeholder'=>'Youtube ' ]); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'youtube_link'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('instagram_link', 'Instagram ',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('instagram_link',null, ['class' => 'form-control', 'placeholder'=>'Instagram ' ]); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'instagram_link'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('google_map', 'Google Map ',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('google_map',null, ['class' => 'form-control', 'placeholder'=>'Google Map ' ]); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'google_map'])
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
