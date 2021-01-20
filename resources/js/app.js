require('./bootstrap');

require('./fontawesome');

require('alpinejs');

window.Vue = require('vue');

import UserInfo from './components/UserInfo.vue';
import Answer from './components/Answer.vue';


Vue.component('user-info', UserInfo);
Vue.component('answer', Answer);


// Vue.component('user-info', require('./components/UserInfo.vue'));
const app = new Vue({
    el: '#app'
});
