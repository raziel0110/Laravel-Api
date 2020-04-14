import Vue from 'vue';
import VueRouter from 'vue-router';
import AppHome from "./components/AppHome";
import Login from "./components/Login/Login";
import Signup from "./components/Login/Signup"
import Forum from "./components/Forum";
import Logout from "./components/Login/Logout";

Vue.use(VueRouter);

const routes = [
    {path: '/login', component: Login, name: 'Login'},
    {path: '/signup', component: Signup, name: 'Signup'},
    {path: '/forum', component: Forum, name: 'Forum'},
    {path: '/logout', component: Logout, name: 'logout'},
];

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;
