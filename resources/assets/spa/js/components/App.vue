<template>
    <div>
        <template v-if="isAuth">
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <psych-menu></psych-menu>
                </div>
            </nav>
        </template>
        
            <div id="page-wrapper" class="gray-bg">
                <template v-if="isAuth">
                    <div class="row border-bottom">
                        <psych-topo></psych-topo>
                    </div>
                </template>
                    <router-view></router-view>
                
                
                <div class="footer">
                    <div class="pull-right">
                        10GB de <strong>250GB</strong> livre.
                    </div>
                    <div>
                        <strong>Copyright</strong> MarGraphics &copy; 2018
                    </div>
                </div>
            </div>
        
	</div> 
</template>

<script type="text/javascript">
    import PsychMenuComponent from './psych/PsychMenu.vue';
    import PsychTopoComponent from './psych/PsychTopo.vue';
    import authMixin from '../mixins/auth.mixin';
    
    export default {
        components:{
            'psych-menu' : PsychMenuComponent,
            'psych-topo' : PsychTopoComponent
        },
        mixins: [authMixin]
    }
</script>