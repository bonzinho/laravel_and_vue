import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../vuex/store'

import FrontendComponent from '../components/frontend/FrontendComponent'
import HomeComponent from '../components/frontend/pages/home/HomeComponent'

import ProductDetailsComponent from '../components/frontend/pages/shop/products/ProductDetailComponent'


import CartComponent from '../components/frontend/pages/cart/CartComponent'

import AdminComponent from '../components/admin/AdminComponent'
import LoginAdminComponent from '../components/frontend/pages/auth/LoginAdminComponent'

import DashboardComponent from '../components/admin/pages/dashboard/DashboardComponent'

import CategoriesComponent from '../components/admin/pages/categories/CategoriesComponent'
import CreateCategoriesComponent from '../components/admin/pages/categories/CreateCategoryComponent'
import EditCategoryComponent from '../components/admin/pages/categories/EditCategoryComponent'

import ProductComponent from '../components/admin/pages/products/ProductsComponent'

import RegisterClientComponent from '../components/frontend/pages/register/RegisterClientComponent'

import EditProfileComponent from '../components/admin/pages/profile/EditProfileComponent'





Vue.use(VueRouter)

const routes =  [

    {
        path: '/',
        component: FrontendComponent,
        children: [

            /*{path: '/login', component: LoginAdminComponent, name: 'login', meta: {auth: false}},
            {path: '', component: HomeComponent, name: 'home'},
            {path: '/product/:id', component: ProductDetailsComponent, name: 'product.detail', props: true},
            {path: '/contact', component: ContactComponent, name: 'contact'},
            {path: '/carrinho', component: CartComponent, name: 'cart'},
            {path: '/register', component: RegisterClientComponent, name: 'register', meta: {auth: false}},
            {path: 'profile/edit', component: EditProfileComponent, name: 'profile.edit'},*/

        ]
    },



    {
        path: '/admin',
        component: AdminComponent,
        meta: {auth: true, admin: true},
        children: [

            {path: '', component: DashboardComponent, name: 'admin.dashboard'},

            {path: 'categories', component: CategoriesComponent, name: 'admin.categories'},
            {path: 'categories/create', component: CreateCategoriesComponent, name: 'admin.categories.create'},
            {path: 'categories/:id/edit', component: EditCategoryComponent, name: 'admin.categories.edit', props: true},

            {path: 'products', component: ProductComponent, name: 'admin.products'},

        ],
    },

];

const router = new VueRouter({
    mode: 'history',
    routes
})


// Middleware para verificar se está logado
/*router.beforeEach((to, from , next) => {

    store.dispatch('checkLogin').then((response) => {

        // Existir a meta auth && a meta auth for false && o utilizador esta authenticated = true
        if(to.meta.hasOwnProperty('auth') && !to.meta.auth && store.state.auth.authenticated){
            return router.push({name: 'admin.dashboard'})
        }

    }).catch(() => {

        // Redirect Back, adicionar o noma da rota de onde vem para poder fazer o redirect
        store.commit('CHANGE_URL_BACK', to.name)

        if(to.meta.auth && !store.state.auth.authenticated){
            return  router.push({name: 'login'})
         }

         // to.matched -> infos da rota pai (component admin)
         if(to.matched.some( (record)=>record.meta.auth && !store.state.auth.authenticated)){
             return  router.push({name: 'login'})
         }

    }).finally(() => store.commit('CHANGE_PRELOADER', false))

    next()
})*/


export default router;
