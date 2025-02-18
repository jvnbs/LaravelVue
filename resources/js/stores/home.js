// stores/homeStore.js
import { defineStore } from "pinia";

export const useHomeStore = defineStore("home", {
    state: () => ({
        services: [],
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
                const result = await response.json();
                this.services = result.data; // Assign fetched services data
            } catch (error) {
                console.error("Error fetching services:", error);
            } finally {
                this.loading = false;
            }
        },
    },
});
