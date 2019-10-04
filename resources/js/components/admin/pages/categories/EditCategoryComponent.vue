<template>
    <div>
        <form-category-component :category="category" :update="true"></form-category-component>
    </div>
</template>

<script>

import FormCategoryComponent from './partials/FormCategoryComponent'

export default {

    props:{
        id:{
            //type: Number,
            default: '',
            require: true
        }
    },

    created(){
        this.loadCategory();
    },

    data(){
        return {
            category: {},
        }
    },


    methods: {
        loadCategory(){
            this.$store.dispatch('loadCategory', this.id)
                .then((response) => {
                    this.category = response;
                })
                .catch((error) => {
                    this.$snotify.error("Categoria não encontrada")
                    this.$router.push({name: 'admin.categories'})
                });
        }

    },

    components: {
        FormCategoryComponent
    }
}
</script>

<style scoped>

</style>
