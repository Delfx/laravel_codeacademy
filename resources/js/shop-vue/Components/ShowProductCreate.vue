<script setup>
import axios from 'axios';
import { ref, reactive, computed } from 'vue';
import router from '../router';


const selectedCategories = ref('0')
const product = ref([])
const productCategories = ref([])
const validationError = reactive({
    name: '',
    description: '',
    price: '',
    identifier: '',
    category_id: ''
})

axios.get('/api/v1/productcategory').then(response => {
    productCategories.value = response.data.data;
});

const errorClassName = computed(() => {
    return validationError.name == '' ? false : true
})

const errorClassDescription = computed(() => {
    return validationError.description == '' ? false : true
})

const errorClassPrice = computed(() => {
    return validationError.price == '' ? false : true
})

const errorClassIdentifier = computed(() => {
    return validationError.identifier == '' ? false : true
})

const errorClassCategory = computed(() => {
    return validationError.category_id == '' ? false : true
})

function showProduct() {
    axios.post('/api/v1/product/create/', {
        name: product.value.name,
        description: product.value.description,
        price: product.value.price,
        identifier: product.value.identifier,
        category_id: selectedCategories.value,
    })
        .then(function (response) {
            router.push({ name: 'products.index' })
            console.log(response);
        })
        .catch(function (error) {
            validationError.name = error.response.data.errors.name[0]
            validationError.description = error.response.data.errors.description[0]
            validationError.price = error.response.data.errors.price[0]
            validationError.identifier = error.response.data.errors.identifier[0]
            // validationError.category_id = error.response.data.errors.category_id[0]
            console.log(error.response.data.errors);
        });
}

</script>

<template>

    <div class="mt-3">
        <div class="mb-3">
            <label for="formGroupInput" class="form-label">Product name</label>
            <input v-model="product.name" type="text" class="form-control">
        </div>

        <div :class="{ alert: errorClassName, 'alert-danger': errorClassName}" role="alert">
            {{ validationError.name }}
        </div>

        <div class="mb-3">
            <label for="FormControlTextarea" class="form-label">Product Description</label>
            <textarea v-model="product.description" class="form-control" id="FormControlTextareaDescription"
                rows="3"></textarea>
        </div>

        <div :class="{ alert: errorClassDescription, 'alert-danger': errorClassDescription}" role="alert">
            {{ validationError.description }}
        </div>

        <div class="mb-3">
            <label for="formGroupInput" class="form-label">Product Category</label>
            <select v-model="selectedCategories" class="form-select" aria-label="category_id" name="category_id">
                <option value="0" disabled>Select Category</option>
                <option v-for="productCategory in productCategories" :key="productCategory.id"
                    :value="productCategory.id">
                    {{ productCategory.name }}
                </option>
            </select>
        </div>

        <div :class="{ alert: errorClassCategory, 'alert-danger': errorClassCategory}" role="alert">
            {{ validationError.category_id }}
        </div>

        <div class="mb-3">
            <label for="formGroupInput" class="form-label">Product identifier</label>
            <input v-model="product.identifier" type="text" class="form-control" id="formGroupInputPrice"
                placeholder="Product identifier">
        </div>

        <div :class="{ alert: errorClassIdentifier, 'alert-danger': errorClassIdentifier}" role="alert">
            {{ validationError.identifier }}
        </div>

        <div class="mb-3">
            <label for="formGroupInput" class="form-label">Product price</label>
            <input v-model="product.price" type="text" class="form-control" id="formGroupInputPrice"
                placeholder="Product price">
        </div>

        <div :class="{ alert: errorClassPrice, 'alert-danger': errorClassPrice}" role="alert">
            {{ validationError.price }}
        </div>

        <button @click="showProduct" class="btn btn-info">Save</button>

        <router-link :to="{ name: 'products.index' }" class="btn btn-danger m-2"> Back </router-link>
    </div>

</template>
