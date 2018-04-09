import {Patient} from '../../services/resources';

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
    query(context,classInformationId){
        return Patient.classMeeting.query({class_information: classInformationId})
            .then(response => {
                context.commit('setClassMeetings', response.data);
            });
    },
    get(context, {classInformationId, classMeetingId}){
        return Patient.classMeeting.get({class_information: classInformationId, class_meeting: classMeetingId})
            .then(response => {
                context.commit('setClassMeeting', response.data);
            })
    }
};

export default {
    namespaced: true,
    state, mutations, actions
}