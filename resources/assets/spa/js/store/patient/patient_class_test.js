import {Patient} from '../../services/resources';
import Vue from 'vue';

const state = {
    patientClassTest:{
        choices:{} // cuidar quando usar um objeto vazio, posso acrescentar uma nova propriedade
    }
};

const mutations = {
    setPatientClassTest(state,patientclassTest){
        state.patientClassTest = patientclassTest;
    },
    setChoiceTrue(state,{choiceId, question}){
        if(!state.patientClassTest.choices.hasOwnProperty(question.id)){
            //vai forçar o Vue a ver choices
            Vue.set(state.patientClassTest.choices,question.id,choiceId);
        }
        state.patientClassTest.choices[question.id] = choiceId;
       // console.log(state.patientClassTest.choices);
    }
};

const actions = {
    get(context, {classMeetingId,classTestId}){
        return Patient.classTest.get({class_meeting: classMeetingId, class_test: classTestId})
            .then(response => {
                context.commit('setClassTest',response.data);
            })
    },
};

export default {
    namespaced: true,
    state, mutations,actions
}