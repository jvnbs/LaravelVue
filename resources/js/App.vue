<template>
    <!-- site header -->
    <header class="site-header" id="site-header">
      <Header />
    </header>

  <div id="content" class="content">
    <router-view></router-view>

    <div class="footer">
      <Footer />
    </div>
  </div>
</template>

<script setup>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";
</script>
