<template>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l2 s12">
                    <a href="https://fe.up.pt" target="_blank" class="footer-logo">
                        <img class="responsive-img" :src="'storage/guest/' + logoFeup">
                    </a>
                </div>
                <div class="col l6 s12">
                    <div class="morada" style="margin-left:55px;">
                        <h6><strong>Faculdade de Engenharia da Universidade do Porto</strong></h6>
                        <p class="text-lighten-4 adress-footer">
                            Rua Dr. Roberto Frias, s/n <br/>
                            4200-465 Porto <br/>
                            PORTUGAL<br/>
                            <a href="mailto:noticias@fe.up.pt?Subject=FEUPWORLD" class="ver-mais" target="_top">Contacte-nos</a>
                        </p>
                    </div>
                </div>
                <div class="col l4 s12 valign-wrapper social-media">
                    <span style="font-size: 13px;">SIGA-NOS:</span>
                    <a href="https://twitter.com/feup_porto" target="_blank">
                                <span class="fa-stack fa-lg">
                                  <i class="fa fa-circle-thin fa-stack-2x"></i>
                                  <i class="fa fa-twitter fa-stack-1x"></i>
                                </span>
                    </a>
                    <a href="https://www.facebook.com/paginafeup" target="_blank">
                                <span class="fa-stack fa-lg">
                                  <i class="fa fa-circle-thin fa-stack-2x"></i>
                                  <i class="fa fa-facebook fa-stack-1x"></i>
                                </span>
                    </a>
                    <a href="https://www.linkedin.com/school/6498/" target="_blank">
                                <span class="fa-stack fa-lg">
                                  <i class="fa fa-circle-thin fa-stack-2x"></i>
                                  <i class="fa fa-linkedin fa-stack-1x"></i>
                                </span>
                    </a>
                    <a href="https://www.instagram.com/feup_porto/" target="_blank">
                                <span class="fa-stack fa-lg">
                                  <i class="fa fa-circle-thin fa-stack-2x"></i>
                                  <i class="fa fa-instagram fa-stack-1x"></i>
                                </span>
                    </a>
                    <a href="https://www.youtube.com/user/FEUPtv" target="_blank">
                        <font-awesome-layers class="fa-lg">
                            <font-awesome-icon :icon="circle" />
                            <font-awesome-icon :icon="youtube" transform="shrink-6" :style="{ color: 'black' }" />
                        </font-awesome-layers>

                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    data(){
        return {
            loading: false,
            logoFeup: 'feup-logo.png',
            show: false,
        }
    },
}
</script>

<style scoped>

</style>
