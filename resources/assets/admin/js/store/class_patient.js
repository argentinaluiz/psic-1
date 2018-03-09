import 'vue-resource';
import Vue from 'vue';
import ADMIN_CONFIG from '../services/adminConfig';

const state = {
    patients: []
};

const mutations = {
    set(state,patients){
        state.patients = patients;
    }
};

const actions = {
    query(context,classInformationId){
        return Vue.http.get(`${ADMIN_CONFIG.ADMIN_URL}/class_informations/${classInformationId}/patients`)
            .then(response => {
                context.commit('set',response.data);
            })
    },
};

const module = {
    namespaced: true,
    state,mutations,actions
};

export default module;