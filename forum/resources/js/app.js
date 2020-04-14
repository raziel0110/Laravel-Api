
require('./bootstrap');

import Vue from 'vue';
import Vuetify from "vuetify";
import router from './router';
import 'vuetify/dist/vuetify.min.css';

import User from './Helpers/User';
import AppHome from "./components/AppHome";

Vue.component('app-home',AppHome);
Vue.use(Vuetify);


window.User = User;
window.EventBus = new Vue();

const app = new Vue({
    el: '#app',
    router
});
