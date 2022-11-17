<script setup>
import axios from 'axios';
import { ref, computed, onMounted, onBeforeMount } from 'vue';
import { useProductStore } from '@/store/ProductStore';
import ShowProductsVue from './ShowProducts.vue';

const selectedCategories = ref('0');
const selectedPriceFilter = ref('0');
const productCategories = ref([]);
const products = ref([]);
const search = ref([]);

const productsStore = useProductStore();

productsStore.load();

let url = '/api/v1/products'

const filterByPrices = [
    { 'id': '1', 'name': 'Price Up' },
    { 'id': '2', 'name': 'Price Down' }
];

function getPriceId() {
    if (selectedPriceFilter.value != 0) {
        return '&' + 'productPriceFilter_id=' + selectedPriceFilter.value
    } else {
        return ''
    }
}

function getCategoryId() {
    if (selectedCategories.value != 0) {
        return '&' + 'category_id=' + selectedCategories.value
    } else {
        return ''
    }
}

function onSubmit() {
    axios.get(url + '?searchName=' + search.value + getCategoryId() + getPriceId()).then(response => {
        products.value = response.data.data;
    })
}

function resetFilter() {
    search.value = ''
    selectedCategories.value = 0;
    selectedPriceFilter.value = 0;
}

axios.get('/api/v1/productcategory').then(response => {
    productCategories.value = response.data.data;
});

// axios.get(url).then(response => {
//     products.value = response.data.data;
// });


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
                <option value="0" disabled>Select Category</option>
                <option v-for="productCategory in productCategories" :key="productCategory.id"
                    :value="productCategory.id">
                    {{ productCategory.name }}
                </option>
            </select>
        </div>

        <div class="mb-3">
            <select v-model="selectedPriceFilter" name="filterByPrice" class="form-select"
                aria-label="Default select example">
                <option value="0" disabled>Filter by price</option>
                <option v-for="filterByPrice in filterByPrices" :key="filterByPrice.id" :value="filterByPrice.id">
                    {{ filterByPrice.name }}
                </option>
            </select>
        </div>

        <button type="submit" id="submit" class="btn btn-primary me-1">Submit</button>
        <button @click="resetFilter" class="btn btn-danger m-1">Reset</button>
        <!-- <a href="/create" class="btn btn-warning m-1">Create</a> -->
        <router-link class="btn btn-warning m-1" :to="{ name: 'productCreate' }">
            Create
        </router-link>
        <!-- <a href={{ route('order')}} class="btn btn-secondary">Orders</a> -->
    </form>

    <ShowProductsVue :products='productsStore.products' />
</template>
