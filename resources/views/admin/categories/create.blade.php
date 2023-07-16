@extends('admin.layout.app')

{{-- Title of the page --}}
@push('title')
    Creation de categories
@endpush



@push('custom-css')
@livewireStyles

@endpush


@section('content')
    @livewire('categorie-creation')
@endsection



@push('custom-js')

@livewireScripts

@endpush

