/*gravar o token no local storage do browser, pois a cada requisição feita precisaremos passar esta informação no header.
O local storage é o mais indicado para se guardar porque não existe tempo de validade, ou seja, o token será válido até que nossa aplicação faça a alteração ou o usuário limpe os dados do navegador.
O fato de trabalhar com token deixa o cliente livre para consumir os dados da API de qualquer tipo de aplicação desenvolvida, tirando a necessidade de se trabalhar com cookies e sessões. Até mesmo uma aplicação desktop poderá consumir dados da API, basta que ele passe o token na requisição.
Em nossa aplicação não exigimos um local específico para o token ser gravado, apenas exigimos que o mesmo seja passado nas requisições.
*/

import JwtToken from '../services/jwt-token';

const state = {
    user: null,
    check: null
};

const mutations = {
    authenticated(state){

    },
    unauthenticated(state){

    }
};

const actions = {
    login(context, {username, password}){
        return JwtToken.accessToken(username, password);
    },
    logout(context){
        return JwtToken.revokeToken();
    }
};

const module = {
    namespaced: true,
    state, mutations, actions
};

export default module;