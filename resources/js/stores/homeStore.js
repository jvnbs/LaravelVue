// resources/js/stores/homeStore.js

import { defineStore } from 'pinia';

export const useHomeStore = defineStore('home', {
  state: () => ({
    services: [],
    softwares: [],
    loading: false,
  }),
  actions: {
    async fetchServices() {
      this.loading = true;
      try {
        const response = await fetch("http://127.0.0.1:8000/api/services", {
          method: "GET",
          headers: { "Content-Type": "application/json" },
        });

        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
        const data = await response.json();
        this.services = data.data; 
      } catch (error) {
        console.error("Error fetching services:", error);
      } finally {
        this.loading = false;
      }
    },

    async fetchSoftwares() {
      this.loading = true;
      try {
        const response = await fetch("http://127.0.0.1:8000/api/softwares", {
          method: "GET",
          headers: { "Content-Type": "application/json" },
        });

        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
        const data = await response.json();
        this.softwares = data.data; 
      } catch (error) {
        console.error("Error fetching softwares:", error);
      } finally {
        this.loading = false;
      }
    },

  },
});
