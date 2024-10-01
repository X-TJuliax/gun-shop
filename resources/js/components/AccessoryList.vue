<template>
    <div>
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <div class="col" v-for="accessory in accessories" :key="accessory.id">
            <div class="card shadow-sm">
              <img :src="'/images/' + accessory.image" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="accessory Image">
              <div class="card-body">
                <h2>{{ accessory.name }}</h2>
                <p class="card-text">{{ accessory.description }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button @click="addToCart(accessory)" class="btn btn-sm btn-outline-secondary">Add to cart</button>
                  </div>
                  <small class="text-body-secondary">Brand: {{ accessory.brand }}</small>
                  <small class="text-body-secondary">Price: ${{ accessory.price }}</small>
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
        accessories: []
      };
    },
    mounted() {
      axios.get('/accessories')
        .then(response => {
          this.accessories = response.data;
        });
    },
    methods: {
    addToCart(accessory) {
      axios.post('/cart/add', {
        accessory_id: accessory.id,
        quantity: 1,
        price: accessory.price
      })
      .then(response => {
        alert('Accessory added to cart!');
      })
      .catch(error => {
        console.error(error);
      });
    }
  }
  };
  </script>
  