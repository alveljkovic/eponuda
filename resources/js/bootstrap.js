import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


let apiBaseUrl = '/';

if (import.meta.env.VITE_API_URL) {
    apiBaseUrl = import.meta.env.VITE_API_URL;
}

window.axios.defaults.baseURL = apiBaseUrl;
