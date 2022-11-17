import { defineStore } from 'pinia'
import axios from "axios"
import { ref, onMounted } from 'vue'

export const useProductStore = defineStore('ProductStore', {
    state: () => ({
        products: [],
    }),

    actions: {
        async load() {
            const response = await axios.get('/api/v1/products');
            return this.products = response.data.data;
        }
    }
});

// export const useProductStore = defineStore('ProductStore', () => {
//     const products = ref([]);

//     let load = axios.get('/api/v1/products').then(res => products.value = res.data.data);

//     return {products, load}
// });
