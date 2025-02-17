<template>
    <div id="content" class="content">
        <div class="signIn-page">
            <div class="form-block">
                <div class="heading_block">
                    <h2>Sign in</h2>
                    <router-link to="/sign-up" class="btn_link"
                        >I don't have an account</router-link
                    >
                </div>
                <form class="signIn" @submit.prevent="signIn">
                    <div class="form-group">
                        <input
                            type="email"
                            v-model="email"
                            placeholder="Email"
                            class="form-control"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <input
                            type="password"
                            v-model="password"
                            placeholder="Password"
                            class="form-control"
                            required
                        />
                    </div>

                    <div class="form-group">
                        <button
                            type="submit"
                            class="btn submitButton"
                        >
                            Submit
                        </button>
                    </div>
                    <a href="sign-up.html" class="cantSignIn">Can’t sign in?</a>
                </form>

                <div class="extraDetails">
                    <div class="loginButton">
                        <router-link to="/sign-in">
                            <img :src="'/front/googleIcon.png'" /> Sign in with
                            Google</router-link
                        >
                    </div>
                    <div class="loginButton">
                        <router-link to="/sign-in">
                            <img :src="'/front/facebookIcon.png'" /> Sign in
                            with Facebook</router-link
                        >
                    </div>
                    <div class="loginButton">
                        <router-link to="/sign-in">
                            <img :src="'/front/linkedinIcon.png'" /> Sign in
                            with Linkedin</router-link
                        >
                    </div>
                    <div class="bottomContent">
                        <p>
                            This site is protected by reCAPTCHA and the Google
                            <router-link to="/">Privacy Policy</router-link> and
                            <br />
                            <router-link to="/">Terms of Service</router-link>
                            apply.
                        </p>
                        <ul class="ImpLink">
                            <li>
                                <router-link to="/"
                                    >Terms and Conditions</router-link
                                >
                            </li>
                            <li>
                                <router-link to="/">Privacy Policy</router-link>
                            </li>
                            <li>
                                <router-link to="/"
                                    >CA Privacy Notice</router-link
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script>
import toastr from "toastr";
import "toastr/build/toastr.min.css";

export default {
    data() {
        return {
            email: "",
            password: "",
        };
    },
    methods: {
        async signIn() {
            try {
                const response = await fetch("http://127.0.0.1:8000/api/login", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        email: this.email,
                        password: this.password,
                    }),
                    credentials: "include", // Ensure backend allows credentials
                });

                const data = await response.json();
                
                
                if (response.ok) {
                    localStorage.setItem("authToken", data.token); // Save token to localStorage
                     toastr.success("Login successful!"); // Show success message
                    this.$router.push("/dashboard");
                } else {
                    console.log("Invalid credentials: " + (data.message || "Please try again."));
                      toastr.error("Invalid username or password."); // Show error message
                }
            } catch (error) {
                console.error("Error:", error);
                console.log("Server error. Please try again later.");
            }
        },
    },
};
</script>
