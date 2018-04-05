import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './router.map';
import AppComponent from './components/App.vue';
import store from './store/store';

const router = new VueRouter({
    routes
});
//Quando trabalhamos com vue-router, temos um recurso que trabalha como um interceptador nas rotas chamado beforeEach. Isso quer dizer que vamos conferir o token antes que cada página seja renderizada. Também devemos verificar se a página é realmente protegida, pois pode se tratar de uma página liberada para qualquer usuário, mesmo sem autenticação.
router.beforeEach((to, from, next) => {
    if (to.meta.auth && !store.state.auth.check) {
        return router.push({name: 'login'});
    }
    next();
});

new Vue({
    store,
    router,
    el: '#wrapper',
    components: {
        'app': AppComponent
    }
});

export default router;