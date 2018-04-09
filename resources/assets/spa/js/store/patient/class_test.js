import {Patient} from '../../services/resources';

const state = {
    classTests: [],
    classTest: null,
    question: null
};

const mutations = {
    setClassTest(state,classTest){
        state.classTest = classTest;
    },
    setClassTests(state,classTests){
        state.classTests = classTests;
    },
    setQuestion(state,question){
        state.question = question;
    },
};

const actions = {
    query(context,classMeetingId){
        return Patient.classTest.query({class_meeting: classMeetingId})
            .then(response => {
                context.commit('setClassTests',response.data);
            });
    },
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