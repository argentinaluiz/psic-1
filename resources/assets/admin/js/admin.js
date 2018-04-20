require('./bootstrap');

window.Vue = require('vue');

//Vue.component('example', require('./components/Example.vue'));
Vue.component('class-patient', require('./components/class_information/ClassPatient.vue'));
Vue.component('class-meeting', require('./components/class_information/ClassMeeting.vue'));
Vue.component('class-type-choice', require('./components/class_information/ClassTypeChoice.vue'));

const app = new Vue({
    el: '#wrapper'
});