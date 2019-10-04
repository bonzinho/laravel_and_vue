<template>
    <div>
        <h1 v-text="title"></h1>
        <div class="row">
            <div class="col-12" v-for="item in cart" :key="item.id">
                <div class="row">
                    <div class="col-3">
                        <div v-if="item.image">
                            <img :src="[`/storage/products/${item.image}`]" :alt="item.name" class="img-list">
                        </div>
                        <div v-else>
                            <img src="/imgs/noimage.jpg" :alt="item.name" class="img-list">
                        </div>
                    </div>
                    <div class="col-7">
                        <p>
                            {{item.name}}
                        </p>
                    </div>
                    <div class="col-2">
                        <button-add-to-cart-component :item="item"></button-add-to-cart-component>
                    </div>
                    <span class="border-top my-3"></span>
                </div>

            </div>
        </div>
    </div>
</template>

<script>

import ButtonAddToCartComponent from '../../layouts/ButtonAddToCartComponent'
    export default{
        data(){
            return {
                title: 'O meu carrinho'
            }
        },

        computed:{
            cart(){
                return this.$store.state.cart.items
            }
        },

        components: {
            ButtonAddToCartComponent
        }


    }
</script>

<style scoped>
.img-list{max-width: 100px;}
</style>
