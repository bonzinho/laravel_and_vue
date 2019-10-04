export default{
    state:{
        items: {
            data: []
        },
    },

    mutations:{
        LOAD_EVENTOS(state, eventos){
            state.items = eventos;
        },
    },

    actions:{
        loadEventos(context, param){
            // Activar o preloader
            context.commit('CHANGE_PRELOADER', true)
            axios.get(`/api/v1/eventos?name=${param.name}`)
                .then((response) => {
                    context.commit('LOAD_EVENTOS', response)
                }).catch( errors => {

                    console.log(errors);

                }).finally(() => context.commit('CHANGE_PRELOADER', false));
        },

        loadEvento(context, id){
            context.commit('CHANGE_PRELOADER', true)
            return new Promise((resolve, reject)=>{
                axios.get(`/api/v1/eventos/${id}`)
                    .then((response) => {
                        resolve(response.data)
                    }).catch( errors => {
                        reject(errors)
                    }).finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },

        createEvento(context, params){
            // Activar o preloader
            context.commit('CHANGE_PRELOADER', true)

            return new Promise((resolve, reject)=>{
                axios.post('/api/v1/eventos', params)
                    .then((response) => {
                        resolve()
                    }).catch( errors => {
                        reject(errors)
                    }).finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },

        updateEvento(context, params){
            context.commit('CHANGE_PRELOADER', true)

            return new Promise((resolve, reject)=>{
                axios.put(`/api/v1/eventos/${params.id}`, params)
                    .then((response) => {
                        resolve()
                    }).catch( errors => {
                        reject(errors)
                    }).finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },

        deleteEvento(context, id){
            // Activar o preloader
            context.commit('CHANGE_PRELOADER', true)
            return new Promise((resolve, reject)=>{
                axios.delete(`/api/v1/eventos/${id}`)
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
