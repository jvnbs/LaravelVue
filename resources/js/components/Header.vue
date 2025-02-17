<template>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <router-link to="/" class="logo_container">
        <img src="front/itbizhubb-logo.png" alt="Logo" />
      </router-link>
      <button class="navbar-toggler" @click="toggleNavbar">
        <span class="navbar-togglerIcon"></span>
        <span class="navbar-togglerIcon"></span>
        <span class="navbar-togglerIcon"></span>
      </button>

      <div class="collapse navbar-collapse" :class="{ show: isNavbarOpen }" id="main-nav">
        <ul class="navbar-nav">
          <li v-for="(menu, index) in menuItems" :key="index" class="nav-item sub-menu">
            <a class="nav-link" @click.prevent="toggleMenu(index)">
              {{ menu.title }}
            </a>
            <ul
              v-if="menu.submenu"
              class="category-menu-list"
              :class="{ 'd-block': activeMenu === index }"
            >
              <li
                v-for="(category, subIndex) in menu.submenu"
                :key="subIndex"
                class="category-menu"
              >
                <button type="button" class="service-title">
                  {{ category.title }}
                </button>
                <div class="mega-sub-menu">
                  <ul>
                    <li v-for="(item, itemIndex) in category.items" :key="itemIndex">
                      <router-link :to="item.link">{{ item.name }}</router-link>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <router-link to="/" class="nav-link">How it Works</router-link>
          </li>
        </ul>
      </div>

      <div class="right-buttons d-flex">
        <router-link v-if="!isLoggedIn" to="/sign-in" class="btn">Login</router-link>
        <a v-if="isLoggedIn" href="#" @click.prevent="handleLogout" class="btn">Logout</a>
        <router-link v-if="isLoggedIn" to="/dashboard" class="btn">Dashboard</router-link>
        <router-link to="/get-listing" class="btn get_listing">Get Listed</router-link>
      </div>
    </div>
  </nav>
</template>



<script>
import { useRouter } from 'vue-router';
import Loader from '../components/Loader.vue';

export default {
  data() {
    return {
      isLoggedIn: !!localStorage.getItem("authToken"), 
      isNavbarOpen: false,
      activeMenu: null,
      services: [], // Store fetched services
    };
  },
  methods: {
    toggleNavbar() {
      this.isNavbarOpen = !this.isNavbarOpen;
    },
    toggleMenu(index) {
      this.activeMenu = this.activeMenu === index ? null : index;
    },
    handleLogout() {
      localStorage.removeItem("authToken"); // Remove token from localStorage
      this.isLoggedIn = false; // Update login state
      this.$router.push("/sign-in"); // Redirect to sign-in page
    },
    async fetchServices() {
      try {
        const response = await fetch("http://127.0.0.1:8000/api/services", {
          method: 'GET',
          headers: {
            'Content-Type': 'application/json',
          },
        });

        if (!response.ok) {
          throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const result = await response.json();
        console.log('Fetched services:', result.data);

        this.services = result.data; // Assign the fetched services to the `services` array
      } catch (error) {
        console.error("Error fetching services:", error);
      }
    },
  },
  mounted() {
    this.fetchServices(); // Fetch services on component mount
    this.isLoggedIn = localStorage.getItem("authToken") !== null; // Update the login state on page load
  },
};
</script>


