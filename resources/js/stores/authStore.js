import { ref } from "vue";

const isLoggedIn = ref(localStorage.getItem("authToken") !== null);

const login = (token) => {
  localStorage.setItem("authToken", token);
  isLoggedIn.value = true; // Vue reactivity trigger karega
};

const logout = () => {
  localStorage.removeItem("authToken");
  isLoggedIn.value = false; // Vue reactivity trigger karega
};

export { isLoggedIn, login, logout };
