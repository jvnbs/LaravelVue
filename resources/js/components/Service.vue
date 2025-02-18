<template>
  <div class="company-services">
    <div class="container">
      <div class="section_title">
        <h2 class="h2_title">Browse Company by Services</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" v-for="(tab, index) in tabs" :key="index" role="presentation">
            <button class="nav-link" 
              :class="{ active: activeTab === tab.id }"  @click="activeTab = tab.id" 
              :id="`${tab.id}-tab`" type="button" role="tab">  {{ tab.name }}
            </button>
          </li>
        </ul>
      </div>

      <div class="tab-content">
        <div v-for="(tab, index) in tabs" :key="index" class="tab-pane fade" :class="{ 'show active': activeTab === tab.id }">
          <div class="row">
            <div class="col-lg-3 col-md-4 col-6" v-for="(service, idx) in tab.services" :key="idx">
              <a href="#" class="service_block">
                <div class="s_icon">
                  <img :src="service.icon" :alt="service.title" />
                </div>
                <h4>{{ service.title }}</h4>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="Show_all">
        <a href="listing.html" class="btn">
          Browse all services 
          <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M7 14C10.8669 14 14 10.8669 14 7C14 3.13306 10.8669 0 7 0C3.13307 0 0 3.13306 0 7C0 10.8669 3.13307 14 7 14ZM3.72581 5.75806H7V3.75686C7 3.45484 7.36694 3.30242 7.57863 3.51694L10.8048 6.76008C10.9375 6.89274 10.9375 7.10443 10.8048 7.2371L7.57863 10.4802C7.36411 10.6948 7 10.5423 7 10.2403V8.24193H3.72581C3.53952 8.24193 3.3871 8.08952 3.3871 7.90323V6.09677C3.3871 5.91048 3.53952 5.75806 3.72581 5.75806Z"
              fill="currentColor" 
            />
          </svg>
        </a>
      </div>

    </div>
  </div>
</template>

<script>
import { onMounted, ref } from "vue";
import { useHomeStore } from "@/stores/homeStore";

export default {
  setup() {
    const homeStore = useHomeStore();
    const activeTab = ref("services");

    const tabs = ref([
      {
        id: "services",
        name: "Find Services",
        services: []
      },
      {
        id: "software",
        name: "Find Software",
        services: []
      }
    ]);

    onMounted(() => {
      tabs.value[0].services = homeStore.services;
      tabs.value[1].services = homeStore.softwares;
    });

    return {
      activeTab,
      tabs
    };
  }
};
</script>
