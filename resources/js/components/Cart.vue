<template>
    <div>
      <h2>My Cart</h2>
      <div v-for="item in cart.items" :key="item.id">
        <div v-if="item.product">
          {{ item.product.name }} (x{{ item.quantity }}) - ${{ item.price }}
        </div>
        <div v-if="item.accessory">
          {{ item.accessory.name }} (x{{ item.quantity }}) - ${{ item.price }}
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
  data() {
    return {
      cart: {
        items: []
      }
    };
  },
  created() {
    this.fetchCart();
  },
  methods: {
    fetchCart() {
      // Get the token (replace with your actual logic for retrieving the token)
      
      axios.get('/cart', {
        
      })
      .then(response => {
        console.log(response.data); // Log the response

        this.cart = response.data;

      })
      .catch(error => {
        console.error(error);
        // Handle the error (e.g., redirect to login if 401)
        if (error.response.status === 401) {
          alert('Unauthorized access. Please log in.');
          // You might want to redirect the user to the login page here
        }
      });
    }
  }
};

  </script>
  