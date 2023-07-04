import { defineConfig } from 'vite';
console.log( defineConfig );
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/react/app.jsx',
            refresh: true,
        }),
        react(),
    ],
});
