<template>
    <div>
        <h1>Detalhes do produto {{product.name}}</h1>
        <div class="row">
            <div class="col-4">
                <div v-if="product.image">
                    <img :src="[`/storage/products/${product.image}`]" :alt="product.name" class="img-list">
                </div>
                <div v-else>
                    <img src="/imgs/noimage.jpg" :alt="product.name" class="img-list">
                </div>
            </div>
            <div class="col-8">
                {{product.description}}
            </div>
        </div>
    </div>
</template>

<script>
export default {

    created(){
        this.loadProduct();
    },

    props:{
        id:{
            require: true,
        }
    },

    data(){
        return{
            product: {}
        }
    },

    methods:{
        loadProduct(){
            this.$store.dispatch('loadProduct', this.id)
                .then((response) => {
                    this.product = response;
                })
                .catch((error) => {
                    this.$snotify.error('Oops ocorreu um erro ao carregar o produto! Por favor tente novamente recarregando a página', 'Erro!')
                })
        }
    }


}
</script>

<style scoped>
.img-list{
    max-width: 300px;
}
</style>
