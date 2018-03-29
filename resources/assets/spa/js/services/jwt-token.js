import {Jwt} from './resources';
import LocalStorage from './localstorage';

//O método atob é responsável por decodificar o hash, que vem no formato base64. O método btoa faz o contrário.
const payloadToObject = (token) => {
    let payload = token.split('.')[1];
    return JSON.parse(atob(payload));
};

export default {
    get token() {
        return LocalStorage.get('token');
    },
    set token(value) {
        LocalStorage.set('token', value);
    },
    //Método para realizar o resgate das informações do usuário e descriptografar o hash do payload
    get payload(){
        return this.token!=null?payloadToObject(this.token):null;
    },
    accessToken(username, password){
        return Jwt.accessToken(username,password)
            .then((response) => {
                this.token = response.data.token;
            })
    },
    revokeToken(){

    }
};