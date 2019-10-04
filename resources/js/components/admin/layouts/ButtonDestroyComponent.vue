<template>

        <button class="btn btn-danger" @click.prevent="confirmDeleteProduct">Apagar</button>

</template>

<script>
export default {


    props:{
        item:{
            required:true,
            type: Object
        }
    },

    methods:{
        confirmDeleteProduct(){
            this.$snotify.error(`Tem a certeza que pretende apagar o produto "${this.item.name}"`, 'Apagar?', {
                timeout: 10000,
                closeOnClick: true,
                showProgressBar: true,
                pauseOnHover: true,
                buttons: [
                    {text: 'Não', action: (value) => {console.log('Não apagar...'); this.$snotify.remove(value.id)} },
                    {text: 'Sim', action: (value) => {this.$emit('deleteItem', this.item); this.$snotify.remove(value.id)}}
                ],
            })
        },
    }
}
</script>

<style scoped>

</style>
