<template>
    <div>
        <form class="form form-inline" @submit.prevent="searchCategory()">
            <div class="form-group">
                <input type="text" placeholder="Pesquisar" class="form-control" v-model="filter">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success pesquisar">Pesquisar</button>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    data(){
        return {
            filter: ''
        }
    },
    methods:{
        searchCategory(){
            this.$emit('searchCategory', this.filter)
        }
    }

}
</script>

<style scoped>
    .pesquisar{margin-left: 10px;}
</style>
