import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withXSRFToken = true;

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import htmx from 'htmx.org';
window.htmx = htmx;

import Cookies from 'js-cookie';
window.Cookies = Cookies;

import.meta.glob([
    '../assets/**',
]);

import fz_utils from './fz_utils';
window.fz = {
    utils: fz_utils
}

import Alpine from 'alpinejs'
 
window.Alpine = Alpine
 
Alpine.start()
