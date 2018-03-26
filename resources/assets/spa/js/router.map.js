export default [
     {
        name: 'class_informations.list',
        path: '/classes',
        component: require('./components/psych/PsychClassInformationList.vue'),
    },
    {
        name: 'login',
        path: '/login',
        component: require('./components/Login.vue')
    },
    { path: '*', redirect: '/login' }
];