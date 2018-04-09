import classInformation from './patient/class_information';
import classMeeting from './patient/class_meeting';
import classTest from './patient/class_test';
import patientClassTest from './patient/patient_class_test';

const module = {
    namespaced: true,
    modules: {
        classInformation, classMeeting, classTest, patientClassTest
    }
}

export default module;