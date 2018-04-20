import {ClassTypeChoice} from '../services/resources';
import Vue from 'vue';
import ADMIN_CONFIG from '../services/adminConfig';

const state = {
    type_choices: []
};

const mutations = {
    add(state, type_choice){
        state.type_choices.push(type_choice);
    },
    set(state,type_choices){
        state.type_choices = type_choices;
    },
    destroy(state,typeChoiceId){
        let index = state.type_choices.findIndex((item) => {
            return item.id == typeChoiceId;
        });
        if(index!=-1){
            state.type_choices.splice(index,1);
        }
    }
};

const actions = {
    query(context,classInformationId){
        return Vue.http.get(`${ADMIN_CONFIG.ADMIN_URL}/class_informations/${classInformationId}/type_choices`)
            .then(response => {
                context.commit('set',response.data);
            })
    },
    store(context, {typeChoiceId, classInformationId}){
        return ClassTypeChoice.save({class_information: classInformationId},{type_choice_id: typeChoiceId})
            .then(response => {
                context.commit('add',response.data)
            })
    },
    destroy(context,{typeChoiceId, classInformationId}){
        return ClassTypeChoice.delete({class_information: classInformationId,type_choice: typeChoiceId})
            .then(response => {
                context.commit('destroy',typeChoiceId)
            });
    }
};

const module = {
    namespaced: true,
    state,mutations,actions
};

export default module;