<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Dashboard</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="">Aproveitamento</a></li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>(Classe)????
                            <small>{{classInformationName}}</small>
                            </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div  class="ibox-content">  
							<div class="row">
								   
							</div>
                            <div class="cleaner_h15"></div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import scriptjs from 'scriptjs';
    import store from '../../../store/store';
    import classInformationMixin from '../../../mixins/class_information.mixin';
    import {Patient} from '../../../services/resources';

    export default {
        mixins:[classInformationMixin],
        computed: {
            storeType(){
                return 'patient';
            },
        },
        mounted() {
            let classInformationId = this.$route.params.class_information;
            let classMeetingId = this.$route.params.class_meeting;
            store.dispatch('patient/classInformation/get', classInformationId);
            store.dispatch('patient/classMeeting/get', {classInformationId,classMeetingId})
                .then(this.getData)
        },
        methods:{
            initGoogleCharts(){

            },
            drawChart(){

            },
            getData(){
                Patient.classTestResult.perSubject({classMeeting: this.classMeeting.id})
                    .then(response => {

                    })
            }
        }
    }
</script>
