<template>
    <div class="preloader" v-show="preloader">
        <img src="/imgs/preload.gif" alt="Aguarde...">
    </div>
</template>
<script>
export default {
    computed:{
        preloader(){
            return this.$store.state.preloader.loading;
        }
    },
}
</script>

<style scoped>
.preloader{
    position: absolute;
    background: #fff;
    width: 100%;
    opacity: .8;
    z-index: 9999;
    height: 100%;
    margin: 0;
    text-align: center;
}
.preloader img{
    max-width: 100px;
}
</style>
