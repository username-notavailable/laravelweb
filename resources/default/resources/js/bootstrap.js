import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withXSRFToken = true;


            
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import leaflet from 'leaflet';
window.leaflet = leaflet;

import markerIconUrl from 'leaflet/dist/images/marker-icon.png';
import markerIconRetinaUrl from 'leaflet/dist/images/marker-icon-2x.png';
import markerShadowUrl from 'leaflet/dist/images/marker-shadow.png';

import * as L from 'leaflet';

L.Icon.Default.prototype.options.iconUrl = markerIconUrl;
L.Icon.Default.prototype.options.iconRetinaUrl = markerIconRetinaUrl;
L.Icon.Default.prototype.options.shadowUrl = markerShadowUrl;
L.Icon.Default.imagePath = ''; // necessary to avoid Leaflet adds some prefix to image path

import htmx from 'htmx.org';
window.htmx = htmx;

import Cookies from 'js-cookie';
window.Cookies = Cookies;


import.meta.glob([
    '../assets/**',
]);

import utils from './utils';
window.utils = utils;

import Alpine from 'alpinejs'
 
window.Alpine = Alpine
 
Alpine.start()
