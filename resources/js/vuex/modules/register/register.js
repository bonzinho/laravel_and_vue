import {NAME_TOKEN} from '../../../configs/config'

export default{
    state: {
        user:{},
    },

    mutations:{
        USER_TO_REGISTER(state, user){
            state.user = user
        },

        REGISTER_UPDATED(state, user){
            state.user = user
        }
    },

    actions:{
        register(context, params){
            context.commit('CHANGE_PRELOADER', true)
            return new Promise((resolve, reject) => {
                axios.post('api/register', params)
                    .then((response) => {
                        context.commit('USER_TO_REGISTER', response.data.user)
                        const token = response.data.token
                        // Armazenar Token no LocalStorage
                        localStorage.setItem(NAME_TOKEN, token)
                        // Adicionar o token no header, para poder logo depois do login fazer oprações e o mesmo ser enviado no header
                        window.axios.defaults.headers.common['Authorization'] = `bearer ${token}`;
                        return resolve()
                    })
                    .catch((error) => {
                        return reject(error.response.data)
                    })
                    .finally(() => context.commit('CHANGE_PRELOADER', false))

            })
        },

        updateProfile(context, params){
            console.log(params)
            context.commit('CHANGE_PRELOADER', true)
            return new Promise((resolve, reject) => {
                axios.put('api/update', params)
                    .then((response) => {
                        context.commit('REGISTER_UPDATED', response.data.user)
                        return resolve()
                    })
                    .catch((error) => {
                        return reject(error.response.data)
                    })
                    .finally(() => context.commit('CHANGE_PRELOADER', false))

            })
        },
    }
}
