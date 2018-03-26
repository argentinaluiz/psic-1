//Administra todos os modules de armazém
import Vuex from 'vuex';
import auth from './auth';

export default new Vuex.Store({
    modules: {
        auth
    }
});