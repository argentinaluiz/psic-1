import {ClassChoosing} from '../services/resources';
import Vue from 'vue';
import ADMIN_CONFIG from '../services/adminConfig';

const state = {
    choosings: []
};

const mutations = {
    add(state, list_choice){
        state.choosings.push(list_choice);
    },
    set(state,choosings){
        state.choosings = choosings;
    },
    destroy(state,choosingId){
        let index = state.choosings.findIndex((item) => {
            return item.id == choosingId;
        });
        if(index!=-1){
            state.choosings.splice(index,1);
        }
    }
};

const actions = {
    query(context,typeChoiceId){
        return Vue.http.get(`${ADMIN_CONFIG.ADMIN_URL}/type_choices/${typeChoiceId}/choosings`)
            .then(response => {
                context.commit('set',response.data);
            })
    },
    store(context, {listChoiceId, typeChoiceId}){
        return ClassChoosing.save({type_choice:typeChoiceId},
            {list_choice_id:listChoiceId})
            .then(response => {
                context.commit('add',response.data)
            });
    },
    destroy(context,{choosingId, typeChoiceId}){
        return ClassChoosing.delete({type_choice: typeChoiceId,choosing: choosingId})
            .then(response => {
                context.commit('destroy',choosingId)
            });
    }
};

const module = {
    namespaced: true,
    state,mutations,actions
};

export default module;