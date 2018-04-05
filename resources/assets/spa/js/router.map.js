/*Adicionamos a propriedade meta. Esta propriedade é um objeto que pode conter várias informações, porém só adicionamos uma propriedade auth com valor true.
A rota login não precisa ser protegida, então não adicionamos. À partir de agora devemos adicionar a propriedade meta em todas as rotas protegidas.*/

export default [
    /*{
        name: 'class_informations.list',
        path: '/classes',
        component: require('./components/psych/PsychClassInformationList.vue'),
        meta: {
            auth: true
        }
    },*/
    {
        name: 'class_meetings.list',
        path: '/classes',
        component: require('./components/psych/PsychClassMeetingList.vue'),
        meta: {
            auth: true
        }
    },
    {
        name: 'class_tests.list',
        path: 'classes/:class_meeting/tests',
        component: require('./components/psych/class_test/PsychClassTestList.vue'),
        meta: {
            auth: true
        }
    },
    {
        name: 'login',
        path: '/login',
        component: require('./components/Login.vue')
    },
    { path: '*', redirect: '/login' }
];