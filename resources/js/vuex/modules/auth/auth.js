import {NAME_TOKEN} from '../../../configs/config'

export default{
    state: {
        me:{},
        authenticated: false,
        urlBack: 'home'
    },

    mutations:{
        AUTH_USER_OK(state, user){
            state.authenticated = true
            state.me = user
        },

        CHANGE_URL_BACK(state, url){
            state.urlBack = url;
        },

        AUTH_USER_LOGOUT(state){
            state.authenticated = false
            state.me = {}
            state.urlBack = 'home'
        }
    },

    actions:{

        login(context, params){
            context.commit('CHANGE_PRELOADER', true)
            return axios.post('api/auth', params).then((response) => {
                context.commit('AUTH_USER_OK', response.data.user)
                const token = response.data.token
                // Armazenar Token no LocalStorage
                localStorage.setItem(NAME_TOKEN, token)
                // Adicionar o token no header, para poder logo depois do login fazer oprações e o memo ser enviado no header
                window.axios.defaults.headers.common['Authorization'] = `bearer ${token}`;
            }).finally(() => context.commit('CHANGE_PRELOADER', false));
        },

        checkLogin(context){
            context.commit('CHANGE_PRELOADER', true)
            return new Promise((resolve, reject) => {

                const token = localStorage.getItem(NAME_TOKEN);

                if(!token){
                    return reject() // Sem token | Não logado
                }else{
                    console.log("Com token")
                    axios.get('/api/me')
                        .then(response => {
                            context.commit('AUTH_USER_OK', response.data.user)
                            return resolve();
                        })
                        .catch(() => reject())
                        .finally(() => context.commit('CHANGE_PRELOADER', false))

                }
            })
        },

        logout(context){
            localStorage.removeItem(NAME_TOKEN)
            // Posivel fazer o pedido para fazer logout no backend
            context.commit('AUTH_USER_LOGOUT')
        }

    }
}
