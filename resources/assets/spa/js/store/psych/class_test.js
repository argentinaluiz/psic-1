import {Psychoanalyst} from '../../services/resources';

function newChoice(){
    return{
        choice:''
    };
}


function newQuestion(){
    return{
        question: '',
        point:1,
        choices:[
            newChoice(),
            newChoice(),
            newChoice(),
            newChoice(),
        ]
    };
}

const state = {
    classTests: [],
    classTest: {
        name: '',
        date_start: '',
        date_end: '',
        questions:[]
    },
    question: newQuestion()
};

const mutations = {
    setClassTests(state,classTests){
        state.classTests = classTests;
    },
    setName(state,name){
        state.classTest.name = name;
    },
    addQuestion(state){
        state.classTest.questions.push(state.question);
        state.question = newQuestion();
    },
    deleteQuestion(state,index){
        state.classTest.questions.splice(index,1);
    },
    addChoice(state){
        state.question.choices.push(newChoice());
    },
    deleteChoice(state,index){
        state.question.choices.splice(index,1);
    }
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
    create(context,classMeetingId){
        return Psychoanalyst.classTest.save({class_meeting:classMeetingId},context.state.classTest);
    }
};

export default {
    namespaced: true,
    state, mutations,actions
}