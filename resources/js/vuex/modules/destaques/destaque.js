export default{
    state:{
        items: {
            data: []
        },
    },

    mutations:{
        LOAD_DESTAQUES(state, destaques){
            state.items = destaques;
        },
    },

    actions:{
        loadDestaques(context, param){
            // Activar o preloader
            context.commit('CHANGE_PRELOADER', true)
            axios.get(`/api/v1/destaques?name=${param.name}`)
                .then((response) => {
                    context.commit('LOAD_DESTAQUES', response)
                }).catch( errors => {

                    console.log(errors);

                }).finally(() => context.commit('CHANGE_PRELOADER', false));
        },

        loadDestaque(context, id){
            context.commit('CHANGE_PRELOADER', true)
            return new Promise((resolve, reject)=>{
                axios.get(`/api/v1/destaques/${id}`)
                    .then((response) => {
                        resolve(response.data)
                    }).catch( errors => {
                        reject(errors)
                    }).finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },

        createDestaque(context, params){
            // Activar o preloader
            context.commit('CHANGE_PRELOADER', true)

            return new Promise((resolve, reject)=>{
                axios.post('/api/v1/destaques', params)
                    .then((response) => {
                        resolve()
                    }).catch( errors => {
                        reject(errors)
                    }).finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },

        updateDestaque(context, params){
            context.commit('CHANGE_PRELOADER', true)

            return new Promise((resolve, reject)=>{
                axios.put(`/api/v1/destaques/${params.id}`, params)
                    .then((response) => {
                        resolve()
                    }).catch( errors => {
                        reject(errors)
                    }).finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },

        deleteDestaque(context, id){
            // Activar o preloader
            context.commit('CHANGE_PRELOADER', true)
            return new Promise((resolve, reject)=>{
                axios.delete(`/api/v1/destaques/${id}`)
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
