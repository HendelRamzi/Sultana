@extends('admin.layout.app')

{{-- Title of the page --}}
@push('title')
   {{ $cat->name }}
@endpush


@push('custom-css')
@livewireStyles

@endpush


@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Category :  {{ $cat->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">category details</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


@livewire('category-details', [
    'cat' => $cat
])

@endsection





@push('custom-js')
@livewireScripts

@endpush

