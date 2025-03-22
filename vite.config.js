import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/admin/admin.css',
                'resources/js/app.js',
                'resources/js/admin/login.js',
                'resources/js/admin/admin.js',
                'resources/js/admin/album.js',
                'resources/js/frontend/album.js',
                'resources/js/frontend/frontend.js',
                'resources/js/frontend/player.js'
            ],
            refresh: true,
        }),
    ],
});
