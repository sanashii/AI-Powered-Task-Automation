import axios from 'axios';

// Extend Window interface so TS knows about our globals
declare global {
    interface Window {
        axios: typeof axios;
    }
}

// Attach axios globally (optional, can also import directly in components)
window.axios = axios;

// Default headers for Laravel
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// CSRF token from meta tag
const token = document.querySelector('meta[name="csrf-token"]') as HTMLMetaElement | null;

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error(
        'CSRF token not found: add <meta name="csrf-token" content="..."> in your HTML head.'
    );
}
