<template>

    <div class="col-3">
        <router-link :to="{name: 'product.detail', params: {id: item.id}}">
            <div v-if="item.image">
                <img :src="[`/storage/${path}/${item.image}`]" :alt="item.name" class="img-list">
            </div>
            <div v-else>
                <img src="/imgs/noimage.jpg" :alt="item.name" class="img-list">
            </div>
            <p>
                {{item.name}}
            </p>
        </router-link>
        <button-add-cart-component :item="item"></button-add-cart-component>
    </div>

</template>

<script>

    import ButtonAddCartComponent from '../frontend/layouts/ButtonAddToCartComponent'


export default {

    props:{

        item:{
            type: Object | Array,
            required: true,
            default: []

        },

        path:{
            type: String,
            require: true,
            default: ''
        },

        detail:{
            type: Boolean,
            require: false,
            default: true,
        }
    },

    components:{
        ButtonAddCartComponent
    }

}
</script>

<style scoped>
.img-list{max-width: 100px;}
</style>
