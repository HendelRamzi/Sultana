@extends('admin.layout.app')

{{-- Title of the page --}}
@push('title')
    Liste des contacts
@endpush


@push('custom-css')
    
@endpush

@section('content')
@if(session()->has("processSuccess"))
<div class="col-12 py-2 px-4 alert alert-success" role="alert">
    {{ session()->get('processSuccess') }}
</div>
@endif
@if(session()->has("processError"))
<div class=" col-12 py-2 px-4 alert alert-danger" role="alert">
    {{ session()->get('processError') }}
</div>
@endif
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Contacts</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Liste des contact</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@livewire('contact-list')

@endsection



@push('custom-js')
    
@endpush