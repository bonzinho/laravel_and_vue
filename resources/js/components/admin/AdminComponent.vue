<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Laravel&VueJs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <router-link class="nav-item nav-link" :to="{name: 'admin.dashboard'}">Dashboard</router-link>
                <router-link class="nav-item nav-link" :to="{name: 'admin.categories'}">Categorias ({{totalCategories}})</router-link>
                <router-link class="nav-item nav-link" :to="{name: 'admin.products'}">Produtos ({{totalProducts}})</router-link>
                <a href="#" class="nav-item nav-link" :to="{name: 'admin.products'}">
                    {{me.name}}
                    <a @click.prevent="logout">(Sair)</a>
                </a>
            </div>
        </div>
        </nav>

        <div class="container">
            <router-view></router-view>
        </div>
  </div>
</template>
<script>
export default {
    computed: {
        totalCategories(){
            return this.$store.state.categories.items.data.length
        },
        totalProducts(){
            return this.$store.state.products.items.data.length
        },
        me(){
            return this.$store.state.auth.me
        }
    },

    methods:{
        logout(){
            this.$store.dispatch('logout')
            this.$router.push({name: 'home'})
        }
    }
}
</script>

<style scoped>

</style>
