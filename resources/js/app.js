require('./bootstrap');

require('./fontawesome');

require('alpinejs');

window.Vue = require('vue');

import UserInfo from './components/UserInfo.vue';
Vue.component('user-info', UserInfo);

// Vue.component('user-info', require('./components/UserInfo.vue'));
const app = new Vue({
    el: '#app'
});
