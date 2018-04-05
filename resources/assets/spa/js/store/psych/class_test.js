import {Psychoanalyst} from '../../services/resources';

const state = {
    classTests: [],
};

const mutations = {
    setClassTests(state,classTests){
        state.classTests = classTests;
    },
};

const actions = {
    query(context,classMeetingId){
        return Psychoanalyst.classTest.query({class_meeting: classMeetingId})
            .then(response => {
                context.commit('setClassTests',response.data);
            });
    },
    get(context, {classMeetingId,classTestId}){
        return Psychoanalyst.classTest.get({class_meeting: classMeetingId, class_test: classTestId})
            .then(response => {
                context.commit('setClassTest',response.data);
            })
    },
};

export default {
    namespaced: true,
    state, mutations,actions
}