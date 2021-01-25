require('./bootstrap');

require('./fontawesome');

require('alpinejs');

window.Vue = require('vue');

import UserInfo from './components/UserInfo.vue';
import Favorite from './components/Favorite.vue';
import Accept from './components/Accept.vue';
import Vote from './components/Vote.vue';
import Answers from './components/Answers.vue';
import Answer from './components/Answer.vue';

Vue.component('user-info', UserInfo);
Vue.component('favorite', Favorite);
Vue.component('accept', Accept);
Vue.component('vote', Vote);
Vue.component('answers', Answers);
Vue.component('answer', Answer);

import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.min.css';
import Authorization from './authorization/authorize';

Vue.use(VueIziToast);

Vue.use(Authorization);

// Vue.component('user-info', require('./components/UserInfo.vue'));
const app = new Vue({
    el: '#app',
    components: {
        UserInfo,
        Answer
    }
});
