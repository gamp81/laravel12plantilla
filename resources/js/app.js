import.meta.glob([
    '../img/**',
    '../fonts/**',
]);

import 'bootstrap';
import 'admin-lte';
import './overlayscrollbars.js'
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import contador from './components/contador.vue';
import prueba from './components/prueba.vue';
const app = createApp({});

// Registra el componente globalmente para que esté disponible en cualquier vista
app.component('contador', contador);
app.component('prueba', prueba);
app.mount("#app");