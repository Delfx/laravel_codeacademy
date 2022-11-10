<script setup>
defineProps({
    products: Array
});





// onBeforeMount(async () => {
// 	let response = await axios.get('/api/v1/products');
// 	products.value = response.data.data;
// 	state.products = response.data.data;
// });

</script>

<template>
    <div v-if="products.length > 0" class="row mt-5 row-cols-1 row-cols-md-3 m-3 text-center">
        <div v-for="product in products" :key="product.id" class="col">
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
