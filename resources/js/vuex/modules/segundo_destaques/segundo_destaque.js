export default{
    state:{
        items: {
            data: []
        },
    },

    mutations:{
        LOAD_SEGUNDO_DESTAQUE(state, destaques){
            state.items = destaques;
        },
    },

    actions:{
        loadSegundoDestaques(context, param){
            // Activar o preloader
            context.commit('CHANGE_PRELOADER', true)
            axios.get(`/api/v1/segundo-destaques?name=${param.name}`)
                .then((response) => {
                    context.commit('LOAD_DESTAQUES', response)
                }).catch( errors => {

                    console.log(errors);

                }).finally(() => context.commit('CHANGE_PRELOADER', false));
        },

        loadSegundoDestaque(context, id){
            context.commit('CHANGE_PRELOADER', true)
            return new Promise((resolve, reject)=>{
                axios.get(`/api/v1/segundo-destaques/${id}`)
                    .then((response) => {
                        resolve(response.data)
                    }).catch( errors => {
                        reject(errors)
                    }).finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },

        createSegundoDestaque(context, params){
            // Activar o preloader
            context.commit('CHANGE_PRELOADER', true)

            return new Promise((resolve, reject)=>{
                axios.post('/api/v1/segundo-destaques', params)
                    .then((response) => {
                        resolve()
                    }).catch( errors => {
                        reject(errors)
                    }).finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },

        updateSegundoDestaque(context, params){
            context.commit('CHANGE_PRELOADER', true)

            return new Promise((resolve, reject)=>{
                axios.put(`/api/v1/segundo-destaques/${params.id}`, params)
                    .then((response) => {
                        resolve()
                    }).catch( errors => {
                        reject(errors)
                    }).finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },

        deleteSegundoDestaque(context, id){
            // Activar o preloader
            context.commit('CHANGE_PRELOADER', true)
            return new Promise((resolve, reject)=>{
                axios.delete(`/api/v1/segundo-destaques/${id}`)
                    .then((response) => {
                        resolve(response)
                    }).catch( errors => {
                        reject(errors)
                    })
            })
        },
    },

    getters:{

    }
}
