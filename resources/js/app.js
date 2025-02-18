/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import { createApp } from 'vue';
import App from './App.vue';
import { createPinia } from "pinia";

import router from './router'; // Import router

const app = createApp(App);
app.use(createPinia()); // Use Pinia

app.use(router);
app.mount('#app');

