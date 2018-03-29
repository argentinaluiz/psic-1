<template src="../templates/menu.html"></template>

<script type="text/javascript">
    import store from '../../store/store';

    export default {
        data(){
            return {
                menus:[
                    {name: "Minhas classes", routeName: 'class_informations.list' }
                ],
                brandRouteName: 'class_informations.list'
            }
        },
        computed: {
            isAuth(){//Verifica se o usuário está com token válido, ou seja, autenticado
                return store.state.auth.check;
            },
            user(){//Retorna o objeto de dados do usuário descriptografado do token
                return store.state.auth.user;
            },
            username(){//Retorna apenas o nome do usuário, caso o usuário esteja autenticado corretamente
                return this.isAuth?store.state.auth.user.name:null;
            }
        }
    };
</script>