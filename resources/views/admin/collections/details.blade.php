@extends('admin.layout.app')

{{-- Title of the page --}}
@push('title')
   {{ $collection->name }}
@endpush


@push('custom-css')
@livewireStyles

@endpush

@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Collection :  {{ $collection->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">collection details</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


@livewire('collection-details', [
    'collection' => $collection
])
@endsection


@push('custom-js')
@livewireScripts

@endpush
