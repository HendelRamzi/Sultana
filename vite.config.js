import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                "resources/css/cart-page.css",
                "resources/css/checkout-page.css", 
                "resources/css/product/style.css", 
                "resources/css/product/list.css", 
                "resources/css/home.css", 
                'resources/js/index.jsx',
            ],
            refresh: true,
        }),
    ],
});
