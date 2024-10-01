<template>
    <div class="dropdown text-end me-lg-3">
      <template v-if="authenticated">
        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img :src="user.avatar_url || defaultAvatar" :alt="user.name" width="32" height="32" class="rounded-circle">
          <span>{{ user.name }}</span>
        </a>
        <ul class="dropdown-menu text-small">
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item" href="#" @click="logout">Sign out</a>
          </li>
        </ul>
      </template>
      <template v-else>
        <a href="/login" class="btn btn-primary">Login</a>
      </template>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        user: {},
        authenticated: false,
        defaultAvatar: 'https://github.com/mdo.png',
      };
    },
    methods: {
      fetchUser() {
        // Fetch authenticated user information
        axios.get('/api/user')
          .then(response => {
            console.log('User data fetched:', response.data);

            this.user = response.data;
            this.authenticated = true;
          })
          .catch(() => {
            console.error('Error fetching user data:', error);

            this.authenticated = false;
          });
      },
      logout() {
        axios.post('/logout')
          .then(() => {
            window.location.href = '/';
          });
      },
    },
    mounted() {
      this.fetchUser();
    }
  };
  </script>
  
  <style scoped>
  /* Add your styles here */
  </style>
  