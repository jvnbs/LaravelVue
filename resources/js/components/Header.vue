<template>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <router-link to="/" class="logo_container">
        <img src="front/itbizhubb-logo.png" alt="Logo" />
      </router-link>

      <button class="navbar-toggler" type="button">
        <span class="navbar-togglerIcon"></span>
        <span class="navbar-togglerIcon"></span>
        <span class="navbar-togglerIcon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main-nav">
        <ul class="navbar-nav">
          <!-- Loop through categories -->
          <li class="nav-item sub-menu">
            <a class="nav-link" href="#"> Find Services </a>
            <ul class="category-menu-list" id="service-category">
              <li class="category-menu" v-for="service in services" :key="service.id">
                <button type="button" class="service-title">{{ service.name }}</button>
                <div class="mega-sub-menu">
                  <ul>
                    <li><a href="#">{{ service.name }} Details</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>

          <li class="nav-item sub-menu">
            <a class="nav-link" href="#"> Find Software </a>
            <ul class="category-menu-list" id="service-software">
              <li class="category-menu" v-for="software in softwares" :key="software.id">
                <button type="button" class="software-title">{{ software.name }}</button>
                <div class="mega-sub-menu">
                  <ul>
                    <li><a href="#">{{ software.name }} Details</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">How it Works</a>
          </li>

        </ul>
      </div>

      <!-- Right Side Buttons -->
      <div class="right-buttons d-flex">
        <router-link v-if="!isAuthenticated" to="/sign-in" class="btn">Login</router-link>
        <a v-if="isAuthenticated" href="#" @click.prevent="handleLogout" class="btn">Logout</a>
        <router-link v-if="isAuthenticated" to="/dashboard" class="btn">Dashboard</router-link>
        <router-link to="/get-listing" class="btn get_listing">Get Listed</router-link>
      </div>
    </div>
  </nav>
</template>

<script>
import { computed, onMounted } from "vue";
import { useAuthStore } from "@/stores/auth";
import { useHomeStore } from "@/stores/homeStore";
import { useRouter } from "vue-router";

export default {
  setup() {
    const authStore = useAuthStore();
    const homeStore = useHomeStore();  
    const router = useRouter();

    const isAuthenticated = computed(() => authStore.isAuthenticated);

    const handleLogout = () => {
      authStore.logout();
      router.push("/sign-in");
    };

    // Fetch services from the home store
    const fetchServices = async () => {
      await homeStore.fetchServices();
    };

     // Fetch softwares from the home store
     const fetchSoftwares = async () => {
      await homeStore.fetchSoftwares();
    };

    onMounted(() => {
      fetchServices();
      fetchSoftwares();
    });

    return {
      isAuthenticated,
      handleLogout,
      services: homeStore.services,
      softwares: homeStore.softwares,
      loading: homeStore.loading,
    };

  },
};
</script>
