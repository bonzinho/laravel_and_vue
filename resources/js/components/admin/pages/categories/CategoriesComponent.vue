<template>
    <div>
        <h2>Lista de categorias</h2>
        <router-link :to="{name: 'admin.categories.create'}" class="btn btn-success top-add-button">Adicionar novo</router-link>
        <search-category-component class="float-right top-add-button" @searchCategory="searchCategory"></search-category-component>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th width="200">Acções</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(category, index) in categories" :key="index">
                    <td>{{category.id}}</td>
                    <td>{{category.name}}</td>
                    <td>
                        <router-link class="btn btn-success" :to="{name: 'admin.categories.edit', params: {id: category.id, name: category.name}}">Editar</router-link>
                        <button-destroy-component @deleteItem="deleteCategory" :item="category"></button-destroy-component>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import Axios from 'axios';
import SearchCategoryComponent from './partials/SearchCategoryComponent'

export default {

    created(){
         this.loadCategories()
    },

    computed:{
        categories(){
            return this.$store.state.categories.items.data
        },
    },
    data(){
        return {
            name:''
        }
    },
    methods: {

        loadCategories(){
            this.$store.dispatch('loadCategories', {name: this.name}); // action
        },

        searchCategory(filter){
            this.name = filter
            this.loadCategories()

        },

        deleteCategory(item){
            this.$store.dispatch('deleteCategory', item.id)
            .then((response) => {
                this.loadCategories()
                this.$snotify.success('Categoria ' + item.name + ' apagada com sucesso!')
            })
            .catch((error) => {
                this.$snotify.error('Erro ao apagar categoria, por favor tente novamente', 'Erro!')
            });
        }
    },

    components: {
        SearchCategoryComponent,
    }

}
</script>

<style scoped>
 .top-add-button{
     margin: 20px 0
 }
</style>
