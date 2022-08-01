<div class="col-lg-12">


    <div class="mb-3 row">
       {{ Form::label('meta_title', 'Meta Title',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('meta_title', null, ['class' => 'form-control','id'=>'meta_title', 'placeholder'=>'Meta Title']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'meta_title'])
        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('meta_keyword', 'Meta Keyword',['class' => 'col-md-3 col-form-label']); }}
         <div class="col-md-9">
         {{ Form::text('meta_keyword', null, ['class' => 'form-control','id'=>'meta_keyword', 'placeholder'=>'Meta Keyword']); }}
         @include('backend.includes.validation_error_message',['fieldname'=>'meta_keyword'])
         </div>
       </div>

       <div class="mb-3 row">
        {{ Form::label('meta_desc', 'Meta Description',['class' => 'col-md-3 col-form-label']); }}
         <div class="col-md-9">
         {{ Form::text('meta_desc', null, ['class' => 'form-control','id'=>'meta_desc', 'placeholder'=>'Meta Description']); }}
         @include('backend.includes.validation_error_message',['fieldname'=>'meta_desc'])
         </div>
       </div>




</div>
