<template>
    <div>
        <form class="form-inline my-2 my-lg-0" @submit.prevent="submitForm">
            <div class="form-group">
                <select id="category_id" v-model="category_id" class="form-control">
                    <option value>Selecione a categoria</option>
                    <option v-for="(category, index) in categories" :key="index" :value="category.id">{{category.name}}</option>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" v-model="filter">
            </div>
            <div class="form-group">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                filter: '',
                category_id: ''
            }
        },

        computed:{
            categories(){
                return this.$store.state.categories.items.data;
            }

        },

        methods:{
            submitForm(){
                this.$emit('searchProduct', {filter: this.filter, category_id: this.category_id})
            }
        }
    }
</script>

<style scoped>
#category_id {
    margin-right: 20px;
}
</style>
