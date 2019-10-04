<template>
    <div>
        <h2>Criar novo produto</h2>
        <form class="form" @submit.prevent="submitForm">
            <div class="form-group">
                <input type="text" v-model="product.name" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <select id="category_id" v-model="product.category_id" class="form-control">
                    <option value>Selecione a categoria</option>
                    <option v-for="(category, index) in categories" :key="index" :value="category.id">{{category.name}}</option>
                </select>
            </div>
            <div class="form-group">
                <div v-if="imagePreview" class="text-center">
                    <img :src="imagePreview" class="image-preview" />
                    <button @click.prevent="resetImage" class="btn btn-danger">X</button>
                </div>
                <div v-else>
                    <input type="file" @change.prevent="onFileChange" class="form-control">
                </div>

            </div>
            <div class="form-group">
                <textarea id="description" cols="30" rows="10" v-model="product.description" class="form-control" placeholder="description"></textarea>
            </div>
            <div class="form-group">
                {{product.image}}
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" v-text="update ? 'Editar' : 'Adicionar'"></button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props:{
        product: {
            require: false,
            type: Object|Array,
            default: () => {
                return {
                    id: '',
                    category_id: '',
                    name: '',
                    description: '',
                    image: ''
                }
            }

        },
        update:{
            required: false,
            type: Boolean,
            defaul: false,
        }
    },

    computed:{
        categories(){
            return this.$store.state.categories.items.data;
        }

    },

    data(){
        return {
            errors:{},
            upload: null,
            imagePreview: null,
        }
    },

    methods:{
        submitForm(){
            const action = this.update ? 'updateProduct' : 'createProduct';

            // Form data para poder enviar ficheiros pelo axios
            const formData = new FormData()
            if(this.upload != null){
                formData.append('image', this.upload);
            }
            formData.append('id', this.product.id)
            formData.append('name', this.product.name)
            formData.append('description', this.product.description)
            formData.append('category_id', this.product.category_id)

            this.$store.dispatch(action, formData)
                .then(() => {
                    this.$snotify.success('Produto adicionado com sucesso');
                    this.reset()
                    this.$emit('closeModal');
                })
                .catch((error) => {
                    this.$snotify.error('Ocorreu um erro ao adicionar o produto', 'ERRO!');
                    this.errors = error.response.data.errors
                })
        },

        // Upload
        onFileChange(e){
          let file =  e.target.files || e.dataTransfer.files;
          if(!file.length)
            return
          this.upload = file[0];
          this.previewImage(file[0]);
        },

        previewImage(file){
            let reader = new FileReader()
            reader.onload = (e) => {
               this.imagePreview = e.target.result
            }
            reader.readAsDataURL(file)
        },

        resetImage(){
            this.imagePreview = null
            this.upload = null
        },

        reset(){
            this.product = {
                    id: '',
                    category_id: '',
                    name: '',
                    description: '',
                    image: ''
            }
            this.errors = {}
            this.imagePreview = null
            this.upload = null
        }
    }
}
</script>

<style scoped>
.image-preview{max-width: 60px}
</style>
