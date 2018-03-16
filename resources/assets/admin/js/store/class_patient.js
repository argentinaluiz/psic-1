//trabalhar o vuex voltado para modules
import {ClassPatient} from '../services/resources';
import 'vue-resource';
import Vue from 'vue';
import ADMIN_CONFIG from '../services/adminConfig';

const state = {
    patients: []
};

const mutations = {
    add(state, patient){
        state.patients.push(patient);
    },
    set(state,patients){
        state.patients = patients;
    },
    destroy(state,patientId){
        let index = state.patients.findIndex((item) => {
            return item.id == patientId;
        });
        if(index!=-1){
            state.patients.splice(index,1);
        }
    }
};

const actions = {
    query(context,classInformationId){
        return Vue.http.get(`${ADMIN_CONFIG.ADMIN_URL}/class_informations/${classInformationId}/patients`)
            .then(response => {
                context.commit('set',response.data);
            })
    },
    store(context, {patientId, classInformationId}){
        return ClassPatient.save({class_information: classInformationId},{patient_id: patientId})
            .then(response => {
                context.commit('add',response.data)
            })
    },
    destroy(context,{patientId, classInformationId}){
        return ClassPatient.delete({class_information: classInformationId,patient: patientId})
            .then(response => {
                context.commit('destroy',patientId)
            });
    }
};

const module = {
    namespaced: true, // consegue acessar o state, um dispatch() para disparar uma ação, fazer commit etc. 
    state,mutations,actions
};

export default module;