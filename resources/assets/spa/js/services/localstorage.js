export default {
    set(key, value){ //string, inteiro, boolean - 	Adiciona o token no local storage do browser de acordo com a chave e o valor informado
        window.localStorage[key] = value;
        return window.localStorage[key];
    },
    get(key, defaultValue = null){ //leio esses valores string, inteiro, boolean - Pega o valor do local de acordo com a chave informada
        return window.localStorage[key] || defaultValue;
    },
    setObject(key, value){//Transforma o formato JSON em string para conseguir gravar no local storage
        window.localStorage[key] = JSON.stringify(value);
        return this.getObject(key);
    },
    getObject(key){ //Transforma o valor do local storage em um JSON, fazendo o processo inverso ao método anterior
        return JSON.parse(window.localStorage[key] || null);
    },
    remove(key){//Remove o token do local storage
        window.localStorage.removeItem(key);
    }
}