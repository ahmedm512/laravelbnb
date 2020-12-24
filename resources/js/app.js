require('./bootstrap');

import router from "./routes";
import store from './store';
import moment from 'moment';
import VueRouter from 'vue-router';
import Index from "./Index";
import CoreuiVue from '@coreui/vue';
import { freeSet } from '@coreui/icons'
import CoreuiVueCharts from '@coreui/vue-chartjs';


window.Vue = require('vue');
import ValidationErrors from './shared/components/ValidationErrors';

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.use(VueRouter);
Vue.use(CoreuiVue);
Vue.use(CoreuiVueCharts);
Vue.component("v-errors", ValidationErrors);
Vue.filter("fromNow", value => moment(value).fromNow());

const app = new Vue({
    el: '#app',
    router,
    store,
    icons: { freeSet },
    components: {
            "index": Index
        },
         async beforeCreate() {
            
        },
    
});

