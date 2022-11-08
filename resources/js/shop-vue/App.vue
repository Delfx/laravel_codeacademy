<script setup>
import axios from 'axios';
import { ref, reactive, onBeforeMount, } from 'vue';

const selectedCategories = ref('0')
const products = ref([])
const state = reactive({})
const search = ref([])
const productCategories = ref([])

let url = '/api/v1/products'

// onBeforeMount(async () => {
// 	let response = await axios.get('/api/v1/products');
// 	products.value = response.data.data;
// 	state.products = response.data.data;
// });

function onSubmit() {
    axios.get(url + '?searchName=' + search.value).then(response => {
        products.value = response.data.data;
        state.products = response.data.data;
    })
}

const filterByPrices = [
    'Price Up', 'Price Down'
];

axios.get(url).then(response => {
    products.value = response.data.data;
    state.products = response.data.data;
});

axios.get('/api/v1/productcategory').then(response => {
    productCategories.value = response.data.data;
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
                <option value="0" >Select Category</option>
                <option v-for="productCategory in productCategories" :value="productCategory.id">
                    {{ productCategory.name }}
                </option>
            </select>
        </div>

        <div class="mb-3">
            <select name="filterByPrice" class="form-select" aria-label="Default select example">
                <option selected>Filter by price</option>
                <option v-for="filterByPrice in filterByPrices">
                    {{ filterByPrice }}
                </option>
            </select>
        </div>

        <button type="submit" id="submit" class="btn btn-primary me-1">Submit</button>
        <a href="/" class="btn btn-danger m-1">Reset</a>
        <a href="/create" class="btn btn-warning m-1">Create</a>

        <!-- <a href={{ route('order')}} class="btn btn-secondary">Orders</a> -->
    </form>


    <div v-if="products.length > 0" class="row mt-5 row-cols-1 row-cols-md-3 m-3 text-center">
        <div v-for="product in products" class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                    <h4 class="my-0 fw-normal">#{{ product.id }} {{ product.name }}</h4>
                </div>
                <div class="card-body">
                    <h3>{{ product.description }}</h3>
                    <a :href="`/products/view/${product.id}`" type="button"
                        class="w-100 btn btn-lg btn-outline-primary">View</a>
                </div>
            </div>
        </div>
    </div>
    <h3 v-else>Products not found</h3>
</template>
