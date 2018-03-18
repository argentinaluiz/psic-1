import {ClassMeeting} from '../services/resources';
import Vue from 'vue';
import ADMIN_CONFIG from '../services/adminConfig';

const state = {
    meetings: []
};

const mutations = {
    add(state, patient){
        state.meetings.push(patient);
    },
    set(state,meetings){
        state.meetings = meetings;
    },
    destroy(state,meetingId){
        let index = state.meetings.findIndex((item) => {
            return item.id == meetingId;
        });
        if(index!=-1){
            state.meetings.splice(index,1);
        }
    }
};

const actions = {
    query(context,classInformationId){
        return Vue.http.get(`${ADMIN_CONFIG.ADMIN_URL}/class_informations/${classInformationId}/meetings`)
            .then(response => {
                context.commit('set',response.data);
            })
    },
    store(context, {psychoanalystId,subjectId, classInformationId}){
        return ClassMeeting.save({class_information: classInformationId},
            {psychoanalyst_id: psychoanalystId,subject_id: subjectId}
            )
            .then(response => {
                context.commit('add',response.data)
            });
    },
    destroy(context,{meetingId, classInformationId}){
        return ClassMeeting.delete({class_information: classInformationId,meetings: meetingId})
            .then(response => {
                context.commit('destroy',meetingId)
            });
    }
};

const module = {
    namespaced: true,
    state,mutations,actions
};

export default module;