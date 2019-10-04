export default{
    state:{
        items: {
            data: [],
            week: 0,
        },
    },

    mutations:{
        LOAD_SLIDES(state, slides){
            state.items.data = slides;
        },
        LOAD_WEEK(state, week){
            state.items.week = week
        }
    },

    actions:{
        loadSlides(context){
            // Activar o preloader
            context.commit('CHANGE_PRELOADER', true)
            axios.get(`/api/v1/imageSlider`)
                .then((response) => {
                    context.commit('LOAD_SLIDES', response.data.data)
                    context.commit('LOAD_WEEK', response.data.data[0].week)
                }).catch( errors => {
                    console.log(errors);
                }).finally(() => context.commit('CHANGE_PRELOADER', false));
        },
    },

    getters:{

    }
}
