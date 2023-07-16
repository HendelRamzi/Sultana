import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [

                // componenet Files
                // Css
                "resources/css/header.css",


                // js


                // Css website files
                'resources/sass/app.scss',
                "resources/css/cart-page.css",
                "resources/css/checkout-page.css", 
                "resources/css/header.css", 


                // CSS files for the products page
                "resources/css/product/style.css", 
                "resources/css/product/list.css",

                // CSS files for the footer section
                "resources/css/footer/style.css", 


                // CSS files for the about page
                "resource/css/about/style.css",


                // CSS files for the contact page
                "resources/css/contact/style.css",
               
                

                "resources/css/home.css", 

                // JS website files
                'resources/js/index.jsx',



                // Admin css Files
                "resources/js/admin/css/adminlte.css",
                
                // Admin js files
                "resources/js/admin/js/adminlte.js",


                // Admin plugins files
                "resources/js/admin/plugins/fontawesome-free/css/all.css",


            ],
            refresh: true,
        }),
    ],
});
