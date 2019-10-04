<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 card">
                <div class="card-header">
                    {{title}}
                </div>
                <div class="card-body">
                    <form class="form" @submit.prevent="updateProfile">
                       <profile-form-component :user="user" :errors="errors"></profile-form-component>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ProfileFormComponent from "../../../frontend/pages/register/ProfileFormComponent";
    export default {
        data(){
            return {
                title: "Editar Perfil",
                errors: {},
                user: {}
            }
        },
        created(){
            this.me;
        },
        computed:{
            me(){
                this.user =  this.$store.state.auth.me;
            }
        },
        methods:{
            updateProfile(){
                this.$store.dispatch('updateProfile', this.user)
                    .then((response) => {
                        this.$router.push({name: 'admin.dashboard'})
                        this.$snotify.success("Perfil Editado com sucesso!")
                    }).catch((response) => {
                    this.errors = response.errors
                    this.$snotify.error("Erro ao editar o perfil", "Opps!")
                })
            }
        },

        components: {
            ProfileFormComponent
        }

    }
</script>

<style scoped>

</style>
