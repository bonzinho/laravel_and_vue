<template>
    <div>
        <form class="form-inline my-2 my-lg-0" @submit.prevent="submitForm">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" v-model="filter">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
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
        submitForm(){
            this.$emit('searchProduct', this.filter)
        }
    }
}
</script>

<style scoped>

</style>
