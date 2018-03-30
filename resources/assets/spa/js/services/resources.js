import 'vue-resource';
import SPA_CONFIG from './spaConfig';
import Vue from 'vue';
import JwtToken from './jwt-token';

Vue.http.options.root = SPA_CONFIG.API_URL;
/*
O recurso interceptors trata-se de um array de execuções que devem ser executadas em sequência e por este motivo, temos que utilizar o next para que todas sejam executadas sem interrupções. Por ser um array, devemos utilizar o método push para incluir mais um interceptor, sempre que precisarmos.
O método next serve para continuar o processamento após a inclusão do header. Caso não o adicione, a requisição não terá seu fluxo concluído.
*/
Vue.http.interceptors.push((request, next) => {
    if(JwtToken.token){
        request.headers.set('Authorization', JwtToken.getAuthorizationHeader());
    }
    next();
});

export class Jwt{
    static accessToken(username, password){
        return Vue.http.post('access_token', {username, password});
    }

    static logout(){
        return Vue.http.post('logout');
    }
}

// export {

// };