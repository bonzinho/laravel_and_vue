<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Laravel & Vue.js - FrontEnd</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <router-link class="nav-link" :to="{name: 'home'}">Home <span class="sr-only"></span></router-link>
                </li>

                <li class="nav-item">
                    <router-link class="nav-link" :to="{name: 'home'}">Sobre nós <span class="sr-only"></span></router-link>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Loja
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Categorias</a>
                    <a class="dropdown-item" href="#">Produtos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>

                <li class="nav-item">
                    <router-link :to="{name:'contact'}" class="nav-link">Contactos</router-link>
                </li>

                <li class="nav-item">
                    <router-link :to="{name:'cart'}" class="nav-link">Carrinho ({{cart.length}})</router-link>
                </li>

                <li class="nav-item right" v-show="!authenticated">
                    <router-link :to="{name:'login'}" class="nav-link">Login</router-link>
                </li>

                <li class="nav-item right" v-show="!authenticated">
                    <router-link :to="{name:'register'}" class="nav-link">Register</router-link>
                </li>

                <li class="nav-item dropdown" v-show="authenticated">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bem-vindo {{authenticatedUser.name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <router-link :to="{name:'admin.dashboard'}" class="dropdown-item">Dashboard</router-link>
                    <a href="#" @click.prevent="logout" class="dropdown-item">Logout</a>
                    <div class="dropdown-divider"></div>
                    <router-link :to="{name:'profile.edit'}" class="dropdown-item" href="#">Edit profile</router-link>
                    </div>
                </li>




            </ul>
            <search-component @searchProduct="searchProduct"></search-component>
        </div>
    </nav>
</template>

<script>
import SearchComponent from  './pages/home/partials/SearchComponent'
export default {

    props:{

    },

    data(){
        return {
            search: '',
            category_id: ''
        }
    },

    computed:{

        authenticated(){
            return this.$store.state.auth.authenticated
        },

        authenticatedUser(){
            return this.$store.state.auth.me
        },

        products(){
            return this.$store.state.products.items
        },

        params(){
            return {
                page: this.products.current_page,
                category_id: this.category_id,
                filter: this.search
            }
        },

        cart(){
            return this.$store.state.cart.items
        }
    },

    methods: {

        searchProduct(search){
             this.search = search.filter;
             this.category_id = search.category_id
             this.loadProducts(1);

        },

        loadProducts(page = 1){
            this.$store.dispatch('loadProducts', {...this.params, page});
             this.$router.push({name: 'products'})
        },

        logout(){
            this.$store.dispatch('logout')
        }

    },
    components: {
        SearchComponent,
    }
}
</script>

<style scoped>

</style>
