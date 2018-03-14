import 'vue-resource';
import ADMIN_CONFIG from './adminConfig';
import Vue from 'vue';

Vue.http.headers.common['X-CSRF-Token'] = $('meta[name=csrf-token]').attr('content');

let ClassPatient = Vue.resource(`${ADMIN_CONFIG.ADMIN_URL}/class_informations/{class_information}/patients/{patient}`);
//let ClassTeaching = Vue.resource(`${ADMIN_CONFIG.ADMIN_URL}/class_informations/{class_information}/teachings/{teaching}`);

export {
    ClassPatient
};