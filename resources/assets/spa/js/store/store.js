//Administra todos os modules de armazém
import Vuex from 'vuex';
import Vue from 'vue';
import auth from './auth';
import psych from './psych';
import patient from './patient';
import * as VueDeepSet from 'vue-deepset';

Vue.use(VueDeepSet);

export default new Vuex.Store({
    mutations: VueDeepSet.extendMutation(),
    modules: {
        auth, psych, patient
    }
});