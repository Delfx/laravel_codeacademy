<script setup>
import axios from 'axios';
import { ref } from 'vue';


const product = ref([]);
let buttonText = ref([]);

let showProduct = ref(true)

const props = defineProps({
    productId: String
});

axios.get('/api/v1/product/' + props.productId).then((response) => {
    product.value = response.data.data[0]
})

// console.log(props.productId);

if (showProduct.value) {
    buttonText.value = 'Edit'
} else {
    buttonText.value = 'Back'
}


</script>

<template>

    <div id="productView" v-show="showProduct" class="mt-4">
        <h6 class="m-0">
            Product name:
        </h6>
        <h1 class="m-0">
            {{ product.name }}
        </h1>

        <h3 class="mt-4">
            Product description: {{ product.description }}
        </h3>

        <h5>
            Price: {{ product.price }}
        </h5>
    </div>
    <router-link class="btn btn-primary" :to="{ name: 'productEdit', params: { productId: props.productId } }"> Edit
    </router-link>

    <router-link :to="{ name: 'products.index' }" class="btn btn-danger m-2"> Back </router-link>

</template>
