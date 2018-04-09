<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Dashboard</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="">Listar Classes</a></li>
                <li><a href="">Questões</a></li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Questões de
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
								<div class="col-md-12">
									<table class="table table-striped">
										<thead>
										<tr>
											<th>Nome</th>
                                            <th>Início</th>
                                            <th>Fim</th>
                                            <th>Questões</th>
                                            <th>Pontos</th>
                                            <th>Meus pontos</th>
                                            <th>Ações</th>
										</tr>
										</thead>
										<tbody>
                                             <tr v-for="classTest in classTests">
                                                <td>{{classTest.name}}</td>
                                                <td>{{classTest.date_start | dateTimeBr}}</td>
                                                <td>{{classTest.date_end | dateTimeBr}}</td>
                                                <td>{{classTest.total_questions}}</td>
                                                <td>{{classTest.total_points}}</td>
                                                <td>00</td>
                                                <td>
                                                   Começar
                                                </td>
                                            </tr>
                                        </tbody>
									</table>
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
            classTests() {
                return store.state.patient.classTest.classTests;
            }
        },
        mounted() {
            let classMeetingId = this.$route.params.class_meeting;
            let classInformationId = this.$route.params.class_information;
            store.dispatch('patient/classMeeting/get',{classInformationId, classMeetingId});
            store.dispatch('patient/classTest/query', classMeetingId);
        },
        methods:{
            
        }
    }
</script>
