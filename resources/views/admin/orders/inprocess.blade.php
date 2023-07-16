@extends('admin.layout.app')

{{-- Title of the page --}}
@push('title')
    Liste des Commande
@endpush


@push('custom-css')
    
@endpush


@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Commandes</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Liste des Commandes</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


    @livewire('order-list')


@endsection



@push('custom-js')
    
@endpush

