import {Psychoanalyst} from '../../services/resources';

const state = {
    classMeetings:[],
    classMeeting: null
};

const mutations = {
    setClassMeetings(state, classMeetings){
        state.classMeetings = classMeetings;
    },
    setClassMeeting(state, classMeeting){
        state.classMeeting = classMeeting;
    }
};

const actions = {
    query(context){
        Psychoanalyst.classMeeting.query()
            .then(response => {
                context.commit('setClassMeetings', response.data);
            });
    },
    get(context, classMeetingId){
        Psychoanalyst.classMeeting.get({class_meeting: classMeetingId})
            .then(response => {
                context.commit('setClassMeeting', response.data);
            });
    }
};

export default {
    namespaced: true,
    state, mutations, actions
}