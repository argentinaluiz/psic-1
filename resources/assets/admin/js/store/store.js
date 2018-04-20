//Administra todos os modules de armazém
import Vuex from 'vuex';
import classPatient from './class_patient';
import classMeeting from './class_meeting';
import classTypeChoice from './class_type_choice';

export default new Vuex.Store({
    modules: {
        //'classPatient': classPatient representado de modo simplificado por classPatient
        classPatient, classMeeting, classTypeChoice
    }
});