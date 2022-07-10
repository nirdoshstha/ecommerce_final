<div class="col-lg-12">
    <div class="mb-3 row">

       {{ Form::label('name', 'Name',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('name', null, ['class' => 'form-control','placeholder'=>'Name']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'name'])
        </div>
      </div>


      <div class="mb-3 row">
        {{ Form::label('email', 'Email',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::text('email', null, ['class' => 'form-control','placeholder'=>'Email']); }}

        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('user_role', 'User Role',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::select('user_role', ['clients'=>'clients','admin'=>'admin','vendor'=>'vendor'],null, ['class' => 'form-control']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'user_role'])

        </div>
      </div>

      <div class="mb-3 row">
        {{ Form::label('ban_unban', 'Ban/Unban',['class' => 'col-md-3 col-form-label']); }}
        <div class="col-md-9">
        {{ Form::select('ban_unban', ['1'=>'ban','0'=>'unban'],null, ['class' => 'form-control']); }}
        @include('backend.includes.validation_error_message',['fieldname'=>'ban_unban'])

        </div>
      </div>


      <div class="py-4 row d-flex justify-content-center">
          <button class="btn btn-outline-primary">Save Changes</button>
      </div>
</div>
