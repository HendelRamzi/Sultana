@extends('admin.layout.app')

{{-- Title of the page --}}
@push('title')
    {{$product->name}}
@endpush



@push('custom-css')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link
    href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
    rel="stylesheet"
/>



@livewireStyles

@endpush


@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">{{ $product->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Code: {{ $product->code }}</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


@livewire('product-edit',[
    'product' => $product
])


@endsection


@push('custom-js')
@livewireScripts
    {{-- Load adminLTE scripts --}}
@vite(["resources/js/admin/js/adminlte.js"])





@endpush
