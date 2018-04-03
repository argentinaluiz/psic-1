//Administra todos os modules de armazém
import Vuex from 'vuex';
import auth from './auth';
import psych from './psych';

export default new Vuex.Store({
    modules: {
        auth, psych
    }
});