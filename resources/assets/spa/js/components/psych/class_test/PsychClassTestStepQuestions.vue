<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Dashboard</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="">Listar classes</a></li>
                <li><a href="">Questões</a></li>
                <li><a href="">Adicionar questão</a></li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Nova Questão de <small>{{classInformationName}}</small></h5>
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
							<div class="alert alert-warning">
                                {{classTest.name}} | {{classTest.date_start}} à {{classTest.date_end}}
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-primary btn-block" @click="create"
                                    :disabled="!classTest.questions.length">Criar questão</button>
                                </div>
                                <div class="cleaner_h15"></div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <psych-class-test-question-form></psych-class-test-question-form>
                                </div>
                                <div class="col-md-6">
                                    <psych-class-test-question-list></psych-class-test-question-list>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import store from '../../../store/store';
    import classInformationMixin from '../../../mixins/class_information.mixin';

    export default {
        components:{
            'psych-class-test-question-form' : require('./PsychClassTestQuestionForm.vue'),
            'psych-class-test-question-list' : require('./PsychClassTestQuestionList.vue')
        },
        mixins:[classInformationMixin],
        computed: {
            classTest(){
                return this.$deepModel('psych.classTest.classTest');
            },
            

        },
        mounted() {
            store.dispatch('psych/classMeeting/get', this.$route.params.class_meeting);
        },
        methods: {
            create(){
                let classMeetingId = this.$route.params.class_meeting;
                store.dispatch('psych/classTest/create',classMeetingId)
                    .then(() => {
                        this.$router.push({
                            name: 'class_tests.list',
                            params: {
                                class_meeting: classMeetingId
                            }
                        });
                    });
            }
        }
    }
</script>