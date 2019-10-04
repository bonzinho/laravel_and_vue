<template>
    <div>

            <div class="form-group" :class="{'has-error': errors.name}">
                <div v-if="errors.name">{{errors.name[0]}}</div>
                <input type="text" id="name" class="form-control" v-model="user.name" placeholder="Nome">
            </div>
            <div class="form-group" :class="{'has-error': errors.email}">
                <div v-if="errors.email">{{errors.email[0]}}</div>
                <input type="email" id="email" class="form-control" v-model="user.email" placeholder="Email">
            </div>
            <div class="form-group" :class="{'has-error': errors.password}">
                <div v-if="errors.password">{{errors.password[0]}}</div>
                <input type="password" class="form-control"  id="password" v-model="user.password" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success form-control">Editar perfil</button>
            </div>

    </div>
</template>


<script>
    export default {
        props:{
            user:{
                required: true,
                type: Object,
                default: {}
            },
            errors:{
                required: false,
                type: Object,
                default: {},
            }
        },
        methods:{
            submitForm(){
                this.$emit('submitForm', this.user)
            }
        }
    }
</script>

<style scoped>
    .has-error{color:red}
</style>
