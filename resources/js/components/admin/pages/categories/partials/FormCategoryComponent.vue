<template>
    <div>
        <form class="form" @submit.prevent="onSubmitForm">
            <div :class="['form-group', {'has-error': errors.name}]">
                <div v-if="errors.name" class="text-danger">{{errors.name[0]}}</div>
                <input type="text" class="form-control" name="categoria" v-model="category.name">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" v-text="update ? 'Actualizar' : 'Adicionar'"></button>
            </div>
        </form>
    </div>
</template>

<script>
export default {

    props:{
        category: {
            require: false,
            type: Object|Array,
            default: () => {
                return {
                    id: '',
                    name: '',
                }
            }

        },
        update: {
            require: false,
            type: Boolean,
            default: false,
        }
    },

    data(){
        return {
            errors: {}
        }
    },

    methods:{
        onSubmitForm(){
            const action = this.update ? 'updateCategory' : 'createCategory';

            this.$store.dispatch(action, this.category)
                .then(() => {
                    this.$snotify.success('Categoria Adicionada com sucesso');
                    this.$router.push({name: 'admin.categories'})
                })
                .catch((error) => {
                    this.$snotify.error('Ocorreu um erro ao adicionar categoria', 'ERRO!');
                    this.errors = error.response.data.errors
                })
        },
    }

}
</script>

<style scoped>
    .has-error{
        color: red;

    }
    .has-error input{
        border: 1px solid red;

    }
</style>
