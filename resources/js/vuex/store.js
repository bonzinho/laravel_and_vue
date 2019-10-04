import Vue from 'vue';
import Vuex from 'vuex';

// Modules
import auth from './modules/auth/auth'
import preloader from './modules/preloader/preloader'
import slide from './modules/slides/slide'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        preloader,
        auth,
        slide
    }
})

export default store;
