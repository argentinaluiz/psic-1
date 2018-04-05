import classInformation from './psych/class_information';
import classMeeting from './psych/class_meeting';
import classTest from './psych/class_test';

const module = {
    namespaced: true,
    modules: {
        classInformation, classMeeting, classTest
    }
}

export default module;