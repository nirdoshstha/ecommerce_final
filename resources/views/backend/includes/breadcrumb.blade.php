<div class="content-header">
    <div class="container-fluid">
        <div class="card p-3">
      <div class="row mb-2">

        <div class="col-sm-6">
          <h1 class="m-0">{{$panel ?? 'Dashboard'}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              @if(isset($base_route))
              @if(Route::has($base_route.'create'))
                    <li class="breadcrumb-item"><a href="{{route($base_route.'create')}}"><i class="fas fa-plus"></i> Create</a></li>
                @if(Route::has($base_route.'index'))
                 <li class="breadcrumb-item"><a href="{{route($base_route.'index')}}">{{$panel}} List</a></li>

                @endif
                    @endif
                    <li class="breadcrumb-item active">{{$page}} Page</li>

                 @endif
          </ol>


        </div><!-- /.col -->


      </div><!-- /.row -->
    </div>
      @include('backend.includes.flash_message')
    </div><!-- /.container-fluid -->
  </div>
