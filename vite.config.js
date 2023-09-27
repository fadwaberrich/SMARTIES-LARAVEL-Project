import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js',
            'resources/assets/libs/slick-carousel/slick/slick.css',
            ],
            refresh: true,
        }),
    ],
});
