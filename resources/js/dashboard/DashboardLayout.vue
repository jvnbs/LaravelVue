<template>
  <body class="user-favorite-page">
    <div class="user-favorite">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <Sidebar />
          </div>
          <div class="col-md-9">
            <div id="content" class="content">
                <router-view></router-view>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</template>

<script setup>
import Sidebar from "../components/Sidebar.vue";
</script>
