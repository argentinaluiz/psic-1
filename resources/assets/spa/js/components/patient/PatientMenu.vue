<template src="../templates/menu.html"></template>

<script type="text/javascript">
    import authMixin from '../../mixins/auth.mixin';
    import menuMixin from '../../mixins/menu.mixin';

    export default {
        mixins: [menuMixin],
        data(){
            return {
                menus:[
                    {name: "Minhas", routeName: 'patient.class_meetings.list' }
                ],
                brandRouteName: 'patient.class_meetings.list'
            }
        }
    };
</script>