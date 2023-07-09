import * as FilePond from 'filepond';
window.FilePond = FilePond
FilePond.setOptions({
    server: {
        url: 'http://127.0.0.1:8000/image',
        process: {
            url: '/process',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            },
        },
    },
});
import 'filepond/dist/filepond.min.css';
