import Vue from 'vue';
import VueRouter from 'vue-router';
import AxiosPlugin from 'vue-axios-cors';
import VueMeta from 'vue-meta';
import VueSweetAlert2 from 'vue-sweetalert2';
import swal from 'sweetalert2/dist/sweetalert2.all.min.js'
import moment from 'moment';
import routes from './routes';
import App from './App.vue';
import './queries';
import { toNumber } from 'lodash';


require('./bootstrap');

Vue.use(VueRouter);
Vue.use(AxiosPlugin);
Vue.use(VueMeta);
Vue.use(VueSweetAlert2);

const router = new VueRouter({routes});



router.beforeEach((to,from, next) =>{
    if(to.matched.some(m => m.meta.isCustomer === true)) {

        Vue.prototype.$query('checkcustomer').then(res => {
            next();
        }).catch(err => {
            router.push('/');
        })
    }

    if(to.matched.some(m => m.meta.requiresAuth === false)){
        next();
        return;
    }
});


Vue.prototype.$appEvents = new Vue();

new Vue ({
    router,
    render: h => h(App),
}).$mount('#app');