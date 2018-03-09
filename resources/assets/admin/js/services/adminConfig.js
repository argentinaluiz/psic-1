const location = window.location;

export default {
    HOST: `${location.protocol}//${location.hostname}:${location.port}`,
    //HOST: 'http://teste.website/~devol190',
    get API_URL(){ //pacientes em geral
        return `${this.HOST}/admin/api`;
    },
    get ADMIN_URL(){ //pacientes da classe,
        return `${this.HOST}/admin`;
    }
};