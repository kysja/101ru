import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

// Set in docker-compose.dev.yml; Traefik proxies https://<host> to the node container
const devHost = process.env.VITE_DEV_HOST;

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        cors: true,
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
        // Inside the Docker node container: listen on all interfaces, but have the
        // browser (and public/hot) use the Traefik-proxied HTTPS host
        ...(devHost && {
            host: '0.0.0.0',
            port: 5180,
            strictPort: true,
            origin: `https://${devHost}`,
            allowedHosts: [devHost],
            hmr: { host: devHost, protocol: 'wss', clientPort: 443 },
        }),
    },
});
