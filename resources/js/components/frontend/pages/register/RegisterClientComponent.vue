<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 card">
                <div class="card-header">
                    Registo
                </div>
                <div class="card-body">
                    <form class="form" @submit.prevent="register">
                        <profile-form-component :user="user" :errors="errors"></profile-form-component>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ProfileFormComponent from "./ProfileFormComponent";
export default {
    data(){
        return {
            user: {
                email: '',
                password: '',
                name: ''
            },
            errors: {}
        }
    },

    methods: {
        register(){
            this.$store.dispatch('register', this.user)
            .then(() => {
                this.$router.push({name: 'admin.dashboard'})
                this.$snotify.success("Registo efetuado com sucesso!")
            }).catch((response) => {
                this.errors = response.errors
                this.$snotify.error("Erro ao registar", "Opps!")
            })
        }
    },

    components:{
        ProfileFormComponent,
    }


}
</script>

<style scoped>

</style>
