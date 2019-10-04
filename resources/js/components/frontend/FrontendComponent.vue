<template>
    <div>
        <slide-component></slide-component>
        <router-view></router-view>
        <footer-component></footer-component>
    </div>
</template>
<script>

import FooterComponent from './FooterComponent'
import SlideComponent from "./layouts/SlideComponent";
export default {
    data(){
        return {

        }
    },

    components: {
        FooterComponent,
        SlideComponent
    }
}
</script>

<style scoped>

</style>
