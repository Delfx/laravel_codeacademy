<script setup>
import axios from 'axios';
import { ref } from 'vue';
import ShowProductsVue from './ShowProducts.vue';

console.log(axios);

defineProps(['']);

const selectedCategories = ref('0')
// const state = reactive({})
const productCategories = ref([])
const products = ref([])
const search = ref([])

let url = '/api/v1/products'

const filterByPrices = [
    'Price Up', 'Price Down'
];

function onSubmit() {
    axios.get(url + '?searchName=' + search.value).then(response => {
        products.value = response.data.data;
    })
}

axios.get('/api/v1/productcategory').then(response => {
    productCategories.value = response.data.data;
});

axios.get(url).then(response => {
    products.value = response.data.data;
});


</script>
<template>
    <form @submit.prevent="onSubmit" class="mt-2 p-4" action="/" method="get">
        <div class="mb-3">
            <label for="searchField" class="form-label">Datalist example</label>
            <input v-model="search" class="form-control" name="searchField" id="exampleDataList"
                placeholder="Type to search...">
        </div>

        <div class="mb-3">
            <select v-model="selectedCategories" class="form-select" aria-label="category_id" name="category_id">
                <option value="0">Select Category</option>
                <option v-for="productCategory in productCategories" :key="productCategory.id" :value="productCategory.id">
                    {{ productCategory.name }}
                </option>
            </select>
        </div>

        <div class="mb-3">
            <select name="filterByPrice" class="form-select" aria-label="Default select example">
                <option selected>Filter by price</option>
                <option v-for="filterByPrice in filterByPrices" :key="filterByPrice.id">
                    {{ filterByPrice }}
                </option>
            </select>
        </div>

        <button type="submit" id="submit" class="btn btn-primary me-1">Submit</button>
        <a href="/" class="btn btn-danger m-1">Reset</a>
        <a href="/create" class="btn btn-warning m-1">Create</a>
        <!-- <a href={{ route('order')}} class="btn btn-secondary">Orders</a> -->
    </form>


<ShowProductsVue :products='products'/>
</template>
