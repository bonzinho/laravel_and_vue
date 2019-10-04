<template>
    <div class="form-inline">
        <button  class="btn btn-primary" @click.prevent="addToCart" >Adicionar ao carrinho</button>
        <button  class="btn btn-danger" v-show="!notInCart" @click.prevent="removeFromCart">Remover do carrinho</button>
    </div>
</template>

<script>
    export default{

        props:{
            item:{
                required: true,
                type: Object,
                default: {}
            }
        },

        computed: {
            notInCart(){
                return this.$store.state.cart.items.indexOf(this.item) < 0;
            }
        },

        methods:{
            addToCart(){
                this.$store.commit('ADD_PRODUCT_CART', this.item)
            },
            removeFromCart(){
                this.$store.commit('REMOVE_PRODUCT_CART', this.item)
            }
        }
    }
</script>

<style scoped>

</style>
