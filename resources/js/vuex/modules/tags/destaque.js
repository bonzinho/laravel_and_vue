export default{
    state:{
        items: {},
    },

    mutations:{
        SEARCH_BY_TAG(state, tag){
            state.items = tag;
        },
    },

    actions:{

    },

    getters:{

    }
}
