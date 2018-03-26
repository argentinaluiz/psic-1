import 'vue-resource';
import SPA_CONFIG from './spaConfig';
import Vue from 'vue';

//Para não precisarmos ficar repetindo o caminho base para as requisições, definimos o caminho padrão através do recurso options.root, que o Vue disponibiliza.
Vue.http.options.root = SPA_CONFIG.API_URL;

export class Jwt{
    static accessToken(username, password){
        return Vue.http.post('access_token',{username,password});
    }

    static logout(){
        return Vue.http.post('logout');
    }
}

export {
    
};