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
							<form class="form-horizontal">
								<h3>Informações da questão</h3>
								<div class="form-group">
									<label for="name" class="col-sm-2 control-label">Nome</label>
									<div class="col-sm-6"><input  name="name" id="name" class="form-control" v-model="name">
                                    {{name}}
                                    </div>
								</div>
								<div class="form-group">
									<label for="date_start" class="col-sm-2 control-label">Início</label>
									<div class="col-sm-3"><input  id="date_start" type="datetime-local" name="date_start" class="form-control"></div>
								</div>
								<div class="form-group">
									<label for="date_end" class="col-sm-2 control-label">Fim</label>
									<div class="col-sm-3"><input id="date_end" type="datetime-local" name="date_end" class="form-control"></div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<button class="btn btn-sm btn-primary btn-block">Ir para questões</button>
									</div>
								</div>
							</form>
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
            classTest(){
                return store.state.psych.classTest.classTest;
            },
            
            /*form handler two way data binding
            name:{
                get(){
                    return this.classTest.name
                },
                set(value){
                    store.commit('psych/classTest/setName', value);
                }
            }*/
        },
        mounted() {
            let classMeetingId = this.$route.params.class_meeting;
            store.dispatch('psych/classMeeting/get',classMeetingId);
        },
        methods: {
            
        }
    }
</script>