import axios from 'axios';
import { URL_BASE } from '../../../configs/config'

const RESOURCE = 'products/'
const CONFIGS = {
    header: {
        'content-type': 'multipart/form-data',
    }
}

export default{
    loadProducts(context, params){
        context.commit('CHANGE_PRELOADER', true)
        axios.get(`${URL_BASE}${RESOURCE}`, {params})
            .then((response) => {
                context.commit('LOAD_PRODUCTS', response.data)
            }).catch( errors => {
                console.log(errors);
                context.commit('CHANGE_PRELOADER', false)
            }).finally(() => context.commit('CHANGE_PRELOADER', false));
    },

    loadProduct(context, id){
        context.commit('CHANGE_PRELOADER', true)
        return new Promise((resolve, reject)=>{
            axios.get(`${URL_BASE}${RESOURCE}${id}`)
                .then((response) => {
                    resolve(response.data)
                }).catch( errors => {
                    reject(errors)
                }).finally(() => context.commit('CHANGE_PRELOADER', false));
        })
    },

    createProduct(context, formData){
        context.commit('CHANGE_PRELOADER', true)
        return new Promise((resolve, reject)=>{
            axios.post(`${URL_BASE}${RESOURCE}`, formData, CONFIGS)
                .then((response) => {
                    resolve()
                }).catch( errors => {
                    reject(errors)
                }).finally(() => context.commit('CHANGE_PRELOADER', false))
        })
    },

    updateProduct(context, formData){
        context.commit('CHANGE_PRELOADER', true)

        // Necessário adicionar "method" => "PUT", pois não é possivel enviar através do axios.put
        formData.append('_method', 'PUT')
        return new Promise((resolve, reject)=>{
            axios.post(`${URL_BASE}${RESOURCE}${formData.get('id')}`, formData, CONFIGS)
                .then((response) => {
                    resolve()
                }).catch( errors => {
                    reject(errors)
                }).finally(() => context.commit('CHANGE_PRELOADER', false));
        })
    },

    deleteProduct(context, id){
        context.commit('CHANGE_PRELOADER', true)
        return new Promise((resolve, reject)=>{
            axios.delete(`${URL_BASE}${RESOURCE}${id}`)
                .then((response) => {
                    resolve(response)
                }).catch( errors => {
                    reject(errors)
                    context.commit('CHANGE_PRELOADER', false)
                })
        })
    },
}
