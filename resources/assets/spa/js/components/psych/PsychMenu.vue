<template src="../templates/menu.html"></template>

<script type="text/javascript">
    import authMixin from '../../mixins/auth.mixin';
    import menuMixin from '../../mixins/menu.mixin';

    export default {
        mixins: [menuMixin],
        data(){
            return {
                menus:[
                    {name: "Minhas classes", routeName: 'class_meetings.list' }
                ],
                brandRouteName: 'class_meetings.list'
            }
        }
    };
</script>