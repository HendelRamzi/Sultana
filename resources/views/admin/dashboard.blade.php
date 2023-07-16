@extends('admin.layout.app')


{{-- Title of the page --}}
@push('title')
    Acceuil
@endpush


@push('custom-css')
  @livewireStyles   
    @vite(["resources/js/admin/plugins/fontawesome-free/css/all.css"])
@endpush

@section('content')
        

  <div class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0">Panneau de controle</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Acceuil</li>
          </ol>
          </div><!-- /.col -->
      </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


  @livewire('dashboard')





@endsection



@push('custom-js')
@livewireScripts
@endpush