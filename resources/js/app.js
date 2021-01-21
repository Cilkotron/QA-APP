require('./bootstrap');

require('./fontawesome');

require('alpinejs');

window.Vue = require('vue');

import UserInfo from './components/UserInfo.vue';
import Answer from './components/Answer.vue';


Vue.component('user-info', UserInfo);
Vue.component('answer', Answer);


import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.min.css';

Vue.use(VueIziToast);

// Vue.component('user-info', require('./components/UserInfo.vue'));
const app = new Vue({
    el: '#app',
    components: {
        UserInfo,
        Answer
    }
});
