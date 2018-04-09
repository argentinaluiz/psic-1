import store from '../store/store';

export default {
    computed: {
        classMeeting(){
            return store.state[this.storeType].classMeeting.classMeeting;
        },
        classInformation(){
            return !this.classMeeting ? null : this.classMeeting.class_information;
        },
        classInformationName(){
            if(this.classInformation){
                let classInformationAlias = this.$options.filters.classInformationAlias(this.classInformation);
                return `${classInformationAlias} - ${this.classMeeting.subject.name}`;
            }
            return '';
        },
    }
}