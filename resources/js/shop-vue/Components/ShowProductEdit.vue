<script setup>
import axios from 'axios';
import { ref } from 'vue';
import router from '../router';


const props = defineProps({
    productId: String,
});

const product = ref([])

axios.get('/api/v1/product/' + props.productId).then((response) => {
    product.value = response.data.data[0]
})


function showProduct() {

    axios.post('/api/v1/product/update/' + props.productId, {
        name: product.value.name,
        description: product.value.description,
        price: product.value.price
    })
        .then(function (response) {
            router.push({name: 'product', params: {productId: props.productId}})
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
}

</script>

<template>

    <div class="mt-3">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Product name</label>
            <input v-model="product.name" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
            <textarea v-model="product.description" class="form-control" id="exampleFormControlTextarea1"
                rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Product price</label>
            <input v-model="product.price" type="text" class="form-control" id="formGroupExampleInput"
                placeholder="Product price">
        </div>

        <button @click="showProduct" class="btn btn-info">Save</button>

        <router-link :to="{ name: 'product', params:{productId: props.productId}}" class="btn btn-danger m-2"> Back </router-link>
    </div>

</template>
