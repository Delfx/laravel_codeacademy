import { defineStore } from 'pinia'
import axios from "axios"
import { ref } from 'vue'

export const useProductStore = defineStore('ProductStore', () => {
    const products = ref([]);

    async function load() {
        const res = await axios.get('/api/v1/products');
        return products.value = res.data.data;
    }

    async function getProductAfterSearch(formValues) {
        const res = await axios.get('/api/v1/products' + formValues);
        return products.value = res.data.data;
    }

    return { products, load, getProductAfterSearch }
});
