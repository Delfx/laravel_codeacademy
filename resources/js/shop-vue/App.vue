<script setup>
import axios from 'axios';
import { ref, reactive, onBeforeMount } from 'vue';

const products = ref([]);
const state = reactive({});

// onBeforeMount(async () => {
// 	let response = await axios.get('/api/v1/products');
// 	products.value = response.data.data;
// 	state.products = response.data.data;
// });

const category = [

]

axios.get('/api/v1/products').then(response => {
    products.value = response.data.data;
    state.products = response.data.data;
});
</script>

<template>


    <form class="mt-2 p-4" action="/" method="get">
        <div class="mb-3">
            <label for="searchField" class="form-label">Datalist example</label>
            <input class="form-control" name="searchField" id="exampleDataList" value=""
                placeholder="Type to search...">
        </div>

        <div class="mb-3">
            <select name="filterByCategories" class="form-select" aria-label="Default select example">
                <option selected>Filter By Category</option>
                @foreach ($productCategories as $productCategory)
                <!-- <option value="{{ $productCategory->id }}">{{ $productCategory -> name }}</option> -->
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <select name="filterByPrice" class="form-select" aria-label="Default select example">
                <option selected>Filter by price</option>
                @foreach ($filersProducts as $filerProduct)
                <option value="{{ $filerProduct }}">{{ $filerProduct }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/" class="btn btn-danger">Reset</a>
        <a href="/create" class="btn btn-warning">Create</a>
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
