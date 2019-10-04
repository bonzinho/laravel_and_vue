<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 card">
                <div class="card-header">
                    LOGIN
                </div>
                <div class="card-body">
                    <form class="form" @submit.prevent="login">
                        <div class="form-group">
                            <input type="email" id="email" class="form-control" v-model="auth.email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" v-model="auth.password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success form-control">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            auth: {
                email: '',
                password: ''
            }
        }
    },

    methods: {
        login(){
            this.$store.dispatch('login', this.auth)
                .then(() => {
                    this.$router.push({name: 'admin.dashboard'})
                }).catch(() => {
                    this.$snotify.error("Erro ao autenticar", "Opps!")
                })
        }
    }


}
</script>
