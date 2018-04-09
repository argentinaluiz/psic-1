import classInformation from './patient/class_information';
import classMeeting from './patient/class_meeting';
import classTest from './patient/class_test';

const module = {
    namespaced: true,
    modules: {
        classInformation, classMeeting, classTest
    }
}

export default module;