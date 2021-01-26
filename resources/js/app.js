require('./bootstrap');

require('./fontawesome');

require('alpinejs');

window.Vue = require('vue');


import QuestionPage from './Pages/QuestionPage.vue';


Vue.component('question-page', QuestionPage);


import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.min.css';
import Authorization from './authorization/authorize';

Vue.use(VueIziToast);

Vue.use(Authorization);

// Vue.component('user-info', require('./components/UserInfo.vue'));
const app = new Vue({
    el: '#app'
});
