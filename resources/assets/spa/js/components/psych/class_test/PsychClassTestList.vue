<template>
    <div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <h2>Dashboard</h2> 
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="">Minhas Classes</a></li>
                <li><a href="http://localhost:8000/home">Questões</a></li>
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
                                    <router-link :to="routeClassTestCreate" class="btn btn-sm btn-primary">
                                        <span class="glyphicon glyphicon-plus"></span> Nova questão
                                    </router-link>
                                    <div class="cleaner_h15"></div>
									<table class="table table-striped">
										<thead>
										<tr>
											<th>Nome</th>
                                            <th>Início</th>
                                            <th>Fim</th>
                                            <th>Questões</th>
                                            <th>Pontos</th>
                                            <th>Ações</th>
										</tr>
										</thead>
										<tbody>
                                             <tr v-for="classTest in classTests">
                                                <td>{{classTest.name}}</td>
                                                <td>{{classTest.date_start}}</td>
                                                <td>{{classTest.date_end}}</td>
                                                <td>{{classTest.total_questions}}</td>
                                                <td>{{classTest.total_points}}</td>
                                                <td>
                                                    <router-link :to="routeClassTestEdit(classTest.id)">
                                                        Editar
                                                    </router-link> |
                                                    <a href="#" @click.prevent="deleteClassTest(classTest)">
                                                        Excluir
                                                    </a>
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

    export default {
        computed: {
            classTests() {
                return store.state.psych.classTest.classTests;
            }
        },
        mounted() {
            
        },
    }

    
</script>
