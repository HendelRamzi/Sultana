@extends('admin.layout.app')

{{-- Title of the page --}}
@push('title')
    Liste des categories
@endpush



@push('custom-css')
    
@endpush


@section('content')
    @livewire('category-list')
@endsection


@push('custom-js')
    
@endpush
