<template>
    <div>

        <div @click.prevent="refresh()" class="week-slider valign-wrapper"><i class="fa fa-home" aria-hidden="true"></i></div>
        <div id="feupworld_slide" class="owl-carousel owl-theme">
            <div class="item">
                <div class="textoverlay firstSlide"><span>{{ week }} / {{ year }}</span></div>
                <img :src="'storage/guest/' + banner_default" alt="#FEUPWORLD">
            </div>
            <div class="item" v-for="(slide, index) in getSlides" :key="index">
                <div class="textoverlay captionSlide flow-text">
                    <a :href="slide.link" target="_blank">
                        <span class="background-slide-text show-link" style="font-size: 2.0vw;">{{ slide.title }}</span>
                    </a>
                    <div style="" class="hashtag">
                    <span class="light grey-text text-lighten-3 tags-slide background-slide-text">
                        <span v-for="tag in slide.tags" class="tags" style="font-size: 1.1vw;">#{{ tag.tag }} </span>
                    </span>
                    </div>
                </div>
                <img :src="'storage/noticias/images/' + slide.photo " alt="#FEUPWORLD">
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import $ from 'jquery'
    export default{

        data(){
            return{
                banner_default: "banner_default.jpg",
                year: new Date().getFullYear(),
                init: false,
            }
        },

        created(){
            this.sliderInit();
        },

        computed:{
            getSlides(){
                return this.$store.state.slide.items.data
            },
            week(){
                return this.$store.state.slide.items.week
            },
        },

        methods:{
            refresh(){
                location.reload();
            },
            sliderInit(){
                if(!this.init){
                    this.init = true;
                    Vue.nextTick(function () {
                        $("#feupworld_slide").owlCarousel({
                            singleItem:false,
                            items: 1,
                            autoplay: true,
                            autoPlaySpeed: 3000,
                            autoPlayTimeout: 3000,
                            dots: true,
                            loop:true,
                            pagination: true,
                        });
                    }.bind(this));
                }
            },
        },
    }
</script>
