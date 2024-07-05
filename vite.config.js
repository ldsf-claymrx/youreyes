import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0', // Escuchar en todas las interfaces
        port: 5173,      // Puerto por defecto de Vite, puedes cambiarlo si es necesario
        hmr: {
            host: '192.168.0.8', // Cambia esto por la IP de tu máquina en la red
        },
    },
});
