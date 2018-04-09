import {Patient} from '../../services/resources';

const state = {
    classTests: [],
    classTest: null,
    question: null,
    questionIndex: 0
};

const mutations = {
    setClassTest(state,classTest){
        state.classTest = classTest;
    },
    setClassTests(state,classTests){
        state.classTests = classTests;
    },
    setQuestion(state, question) {
         // console.log(question);
        state.question = question;
        let index = state.classTest.questions.findIndex((item) => {
            return item.id == question.id;
        });
        state.questionIndex = index;
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