<template>
    <div>

        <vodal :show="showModal" animation="zoom" @hide="showModal = false" >
            <form-product-component @closeModal="closeModal" :width="600" :heigth="600" :product="product" :update="update"></form-product-component>
        </vodal>

        <h2>Lista de produtos</h2>
        <button @click.prevent="showModal = true" class="btn btn-success top-add-button">Adicionar novo</button>
        <search-product-component class="float-right top-add-button" @searchProduct="searchProduct"></search-product-component>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th width="200">Acções</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in products.data" :key="index">
                    <td width="150">
                        <div v-if="product.image">
                            <img :src="[`/storage/products/${product.image}`]" :alt="product.name" class="img-list">
                        </div>
                    </td>
                    <td>{{product.name}}</td>
                    <td>
                        <button class="btn btn-success" @click.prevent="editProduct(product.id)">Editar</button>
                        <button-destroy-component @deleteItem="deleteProduct" :item="product"></button-destroy-component>
                    </td>
                </tr>
            </tbody>
        </table>

        <pagination-component :pagination="products" :offset="3" @paginate="loadProducts"></pagination-component>


    </div>
</template>

<script>
import Axios from 'axios';
import PaginationComponent from '../../../layouts/PaginationComponent'
import SearchProductComponent from './partials/SearchProductComponent'
import FormProductComponent from './partials/FormProductComponent'
import Vodal from 'vodal';

export default {

    created(){
         this.loadProducts()
    },

    computed:{
        products(){
            return this.$store.state.products.items
        },
        params(){
            return {
                page: this.products.current_page,
                filter: this.search
            }
        }
    },

    data(){
        return {
            search: '',
            showModal: false,
            update:false,
            product: {
                id: '',
                category_id: '',
                name: '',
                description: '',
                //image: ''
            },
        }
    },
    methods: {

        loadProducts(page = 1){
            this.$store.dispatch('loadProducts', {...this.params, page}); // substitui o elemento page do objecto params pelo page passado para a função
        },

        searchProduct(filter){
            this.search = filter
            this.loadProducts(1);

        },

        editProduct(id){
            this.product = this.$store.dispatch('loadProduct', id)
            .then((response) => {
                this.product = response
                this.update = true
                this.showModal = true
            })
            .catch((error) => {
                this.$snotify.error('Erro ao carregar o produto, por favor tente novamente', 'Erro!')
            })

        },

        deleteProduct(item){
            this.$store.dispatch('deleteProduct', item.id)
            .then((response) => {
                this.loadProducts()
                this.$snotify.success('Produto ' + item.name + ' apagado com sucesso!')
            })
            .catch((error) => {
                this.$snotify.error('Erro ao apagar produto, por favor tente novamente', 'Erro!')
            });
        },

        closeModal(){
            this.loadProducts(1)
            this.showModal = false;
        }
    },

    components:{
        PaginationComponent,
        SearchProductComponent,
        Vodal,
        FormProductComponent
    }

}
</script>

<style scoped>
 .top-add-button{
     margin: 20px 0
 }
 .img-list{max-width: 100px;}
</style>
