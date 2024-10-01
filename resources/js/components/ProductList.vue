<template>
  <div>
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col" v-for="product in products" :key="product.id">
          <div class="card shadow-sm">
            <img :src="'/images/' + product.image" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="Product Image">
            <div class="card-body">
              <h2>{{ product.name }}</h2>
              <p class="card-text">{{ product.description }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <!-- The @click event handler -->
                  <button @click="addToCart(product)" class="btn btn-sm btn-outline-secondary">Add to cart</button>
                </div>
                <small class="text-body-secondary">Brand: {{ product.brand }}</small>
                <small class="text-body-secondary">Price: ${{ product.price }}</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      products: []
    };
  },
  mounted() {
    axios.get('/products')
      .then(response => {
        this.products = response.data;
      })
      .catch(error => {
        console.error(error);
      });
  },
  methods: {
    addToCart(product) {
      axios.post('/cart/add', {
        product_id: product.id,
        quantity: 1,
        price: product.price
      })
      .then(response => {
        alert('Product added to cart!');
      })
      .catch(error => {
        console.error(error);
      });
    }
  }
};
</script>
