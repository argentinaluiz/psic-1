require('./bootstrap');

window.Vue = require('vue');
//import Vue from 'vue';

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('class-patient', require('./components/class_information/ClassPatient.vue'));

if(document.getElementById("wrapper")){
    new Vue({
    el: '#wrapper', 
    });
}

