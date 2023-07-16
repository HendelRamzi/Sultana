@extends('admin.layout.app')

{{-- Title of the page --}}
@push('title')
    Liste des collections
@endpush



@push('custom-css')
@livewireStyles

@endpush


@section('content')
    @livewire('collection-list')
@endsection


@push('custom-js')
@livewireScripts

@endpush
