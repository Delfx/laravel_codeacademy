import { createRouter, createWebHistory } from 'vue-router'


import Products from '../shop-vue/Components/FormFilter.vue'
import Product from '../shop-vue/Components/ShowOneProduct.vue'
import ProductEdit from '../shop-vue/Components/ShowProductEdit.vue'
import ProductCreate from '../shop-vue/Components/ShowProductCreate.vue'

const routes = [
    { path: '/', component: Products, name: 'products.index' },
    { path: '/product/:productId', component: Product, name: 'product', props: true},
    { path: '/product/:productId/edit', component: ProductEdit, name: 'productEdit', props: true},
    { path: '/product/create', component: ProductCreate, name: 'productCreate', props: true}
]

const router = createRouter({
    history: createWebHistory('/vue/products'),
    routes
})
export default router
