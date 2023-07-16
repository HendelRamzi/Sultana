@extends('admin.layout.app')

{{-- Title of the page --}}
@push('title')
    Creation de produits
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
    @livewire('product-creation')
@endsection




@push('custom-js')
@livewireScripts
{{-- Load adminLTE scripts --}}
@vite(["resources/js/admin/js/adminlte.js"])




<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>


{{-- EditorJS configuration --}}
<script>
    const editor = new EditorJS({
    /**
     * Id of Element that should contain Editor instance
     */
    holder: 'editorjs',
    placeholder: 'Ecrivez votre description ici !',
    tools: {
        list: {
            class: List,
            inlineToolbar: true,
            config: {
                defaultStyle: 'unordered'
            }
        },


        // header plugins
        header : {
            class: Header,
            config : {
                placeholder: 'Enter a header',
                levels: [2, 3],
                defaultLevel: 3
            }
        }


    }
  });
</script>







@endpush

