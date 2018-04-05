<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Dashboard</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="http://localhost:8000/home">Listar classes</a></li>
            </ol>
        </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Listagem de classes</h5>
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
											<th>Data Início</th>
											<th>Data Fim</th>
											<th>Classe</th>
											<th>Patologia</th>
                                            <th>Ações</th>
										</tr>
										</thead>
										<tbody>
										 <tr v-for="classMeeting in classMeetings">
											<td>{{classMeeting.class_information.date_start | dateBr}}</td>
											<td>{{classMeeting.class_information.date_end | dateBr}}</td>
											<td>{{classMeeting.class_information | classInformationAlias }}</td>
											<td>{{classMeeting.subject.name}}</td>
											<td>
                                                <router-link :to="{name: 'class_tests.list', params: {class_meeting: classMeeting.id} }">
                                                    Questões
                                                </router-link>
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
    import store from '../../store/store';

    export default {
        computed: {
            classMeetings() {
                return store.state.psych.classMeeting.classMeetings;
            }
        },
        mounted() {
            store.dispatch('psych/classMeeting/query');
        }
    }
</script>