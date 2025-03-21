import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    resolve:{
        alias:{
            '@': path.resolve(__dirname,'resources'),
            '@views': path.resolve(__dirname,'resources/views'),
            '@js': path.resolve(__dirname,'/resources/js'),
        }
    }
});
