
require('./bootstrap');

window.Vue = require('vue');




import App from './views/App';
import Home from './pages/Home';
import Boolpress from './pages/Boolpress';
import Boolpresses from './pages/Boolpresses';
import About from './pages/About';


import VueRouter from 'vue-router';
Vue.use(VueRouter);

const router = new VueRouter ({
    mode: 'history',
    routes:  [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/boolpresses',
            name: 'boolpresses',
            component: Boolpresses
        },
        {
            path: '/boolpresses/:id',
            name: 'boolpress',
            props: true, 
            component: Boolpress
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        
    ]

});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router 
});
