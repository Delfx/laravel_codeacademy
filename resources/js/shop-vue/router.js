import { createRouter, createWebHistory } from 'vue-router'


import Products from '../shop-vue/Components/FormFilter.vue'

const routes = [
    { path: '/', component: Products, name: 'products.index' },
]


const router = createRouter({
    history: createWebHistory('/vue/products'),
    routes
})
export default router
