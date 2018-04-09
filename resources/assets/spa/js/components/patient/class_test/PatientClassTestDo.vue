<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Dashboard</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="">Listar Classes</a></li>
                <li><a href="">Questões</a></li>
                <li><a href="">Fazendo teste</a></li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Questões
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
								<div class="col-md-3">
                                    <strong>Classe:</strong> {{classInformationName}}
                                    <br/>
                                    <strong>Pontos:</strong> {{classTestPoints}}
                                    <br/>
                                    <strong>Início:</strong> {{classTestDateStart}}
                                    <br/>
                                    <strong>Fim:</strong>     {{classTestDateEnd}}
                                    <div class="cleaner_h10"></div>
                                    <button class="btn btn-sm btn-primary btn-block" @click="save">Salvar</button>
								</div>
                                <div class="col-md-9" v-if="classTest">
									<ol class="nav nav-pills">
                                        <li v-for="(question,index) in classTest.questions">
                                            <a href="#" @click.prevent="setQuestion(question)">
                                                <span class="label label-default">
                                                    Quest. #{{index+1}}
                                                </span>
                                            </a>
                                        </li>
                                    </ol>
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
        mixins:[classInformationMixin],
        computed: {
            storeType(){
                return 'patient';
            },
            classTest() {
                return store.state.patient.classTest.classTest;
            },
            classTestPoints() {
                let classTest = this.classTest;
                return classTest ? classTest.total_points : 0;
            },
            classTestDateStart() {
                let classTest = this.classTest;
                return classTest ? this.$options.filters.dateTimeBr(classTest.date_start) : '';
            },
            classTestDateEnd() {
                let classTest = this.classTest;
                return classTest ? this.$options.filters.dateTimeBr(classTest.date_end) : '';
            }
        },
        mounted() {
            let classMeetingId = this.$route.params.class_meeting;
            let classInformationId = this.$route.params.class_information;
            let classTestId = this.$route.params.class_test;
            store.dispatch('patient/classMeeting/get',{classInformationId, classMeetingId});
            store.dispatch('patient/classTest/get', {classMeetingId,classTestId});
        },
        methods:{
            
        }
    }
</script>
