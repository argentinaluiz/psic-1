<template>
    <div>
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <psych-menu></psych-menu>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <psych-topo></psych-topo>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <h2>Geral</h2> 
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
                                <h5>Lista de Classes</h5>
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
                                <router-view></router-view>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <psych-footer></psych-footer>
        </div>
	</div>

</template>

<script type="text/javascript">
    import PsychMenuComponent from './psych/PsychMenu.vue';
    import PsychTopoComponent from './psych/PsychTopo.vue';
    import PsychFooterComponent from './psych/PsychFooter.vue';

    export default {
        components:{
            'psych-menu' : PsychMenuComponent,
            'psych-topo' : PsychTopoComponent,
            'psych-footer' : PsychFooterComponent
        }
        
    }
</script>