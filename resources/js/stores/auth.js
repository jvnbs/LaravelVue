import { defineStore } from "pinia";

export const useAuthStore = defineStore("auth", {
    state: () => ({
        user: null,
        token: localStorage.getItem("authToken") || null,
        services: []
    }),
    getters: {
        isAuthenticated: (state) => !!state.token,
        getServices(state) {
            return state.services; // Return services from state
          }
    },
    actions: {
        async login(email, password) {
            try {
                const response = await fetch("http://127.0.0.1:8000/api/login", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ email, password }),
                    credentials: "include",
                });

                const data = await response.json();

                if (response.ok) {
                    this.token = data.token;
                    this.user = data.user;
                    localStorage.setItem("authToken", data.token);

                    return { success: true };
                } else {
                    throw new Error(data.message || "Invalid credentials");
                }
            } catch (error) {
                return { success: false, message: error.message };
            }
        },

        async fetchServices() {
            try {
              const response = await fetch("http://127.0.0.1:8000/api/services", {
                method: "GET",
                headers: { "Content-Type": "application/json" },
              });
      
              if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
      
              const result = await response.json();
              this.services = result.data; // Assign fetched data to services
            } catch (error) {
              console.error("Error fetching services:", error);
            }
          },

        logout() {
            this.token = null;
            this.user = null;
            localStorage.removeItem("authToken");
        },
    },
});
