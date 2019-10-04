export default{
    state:{
        items: {
            data: []
        },
    },

    mutations:{
        LOAD_NOTICIAS(state, noticias){
            state.items = noticias;
        },
    },

    actions:{
        loadNoticias(context, param){
            // Activar o preloader
            context.commit('CHANGE_PRELOADER', true)
            axios.get(`/api/v1/noticias?name=${param.name}`)
                .then((response) => {
                    context.commit('LOAD_NOTICIAS', response)
                }).catch( errors => {

                    console.log(errors);

                }).finally(() => context.commit('CHANGE_PRELOADER', false));
        },

        loadNoticia(context, id){
            context.commit('CHANGE_PRELOADER', true)
            return new Promise((resolve, reject)=>{
                axios.get(`/api/v1/noticias/${id}`)
                    .then((response) => {
                        resolve(response.data)
                    }).catch( errors => {
                        reject(errors)
                    }).finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },

        createNoticia(context, params){
            // Activar o preloader
            context.commit('CHANGE_PRELOADER', true)

            return new Promise((resolve, reject)=>{
                axios.post('/api/v1/noticias', params)
                    .then((response) => {
                        resolve()
                    }).catch( errors => {
                        reject(errors)
                    }).finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },

        updateNoticia(context, params){
            context.commit('CHANGE_PRELOADER', true)

            return new Promise((resolve, reject)=>{
                axios.put(`/api/v1/noticias/${params.id}`, params)
                    .then((response) => {
                        resolve()
                    }).catch( errors => {
                        reject(errors)
                    }).finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },

        deleteNoticia(context, id){
            // Activar o preloader
            context.commit('CHANGE_PRELOADER', true)

            return new Promise((resolve, reject)=>{
                axios.delete(`/api/v1/noticias/${id}`)
                    .then((response) => {
                        resolve(response)
                    }).catch( errors => {
                        reject(errors)
                    })
                    //.finally(() => context.commit('CHANGE_PRELOADER', false));
            })
        },
    },

    getters:{

    }
}
