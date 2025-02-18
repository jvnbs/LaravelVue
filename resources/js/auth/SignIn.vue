<template>
    <div id="content" class="content">
        <div class="signIn-page">
            <div class="form-block">
                <div class="heading_block">
                    <h2>Sign in</h2>
                    <router-link to="/sign-up" class="btn_link">
                        I don't have an account
                    </router-link>
                </div>

                <form class="signIn" @submit.prevent="handleLogin">
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
                            :disabled="loading"
                        >
                            {{ loading ? "Logging in..." : "Submit" }}
                        </button>
                    </div>
                    <router-link to="/forgot-password" class="cantSignIn">
                        Can’t sign in?
                    </router-link>
                </form>

                <div class="extraDetails">
                    <div class="loginButton">
                        <a @click="socialLogin('google')">
                            <img src="/front/googleIcon.png" />
                            Sign in with Google
                        </a>
                    </div>
                    <div class="loginButton">
                        <a @click="socialLogin('facebook')">
                            <img src="/front/facebookIcon.png" />
                            Sign in with Facebook
                        </a>
                    </div>
                    <div class="loginButton">
                        <a @click="socialLogin('linkedin')">
                            <img src="/front/linkedinIcon.png" />
                            Sign in with LinkedIn
                        </a>
                    </div>

                    <div class="bottomContent">
                        <p>
                            This site is protected by reCAPTCHA and the Google
                            <router-link to="/">Privacy Policy</router-link> and
                            <router-link to="/">Terms of Service</router-link>
                            apply.
                        </p>
                        <ul class="ImpLink">
                            <li>
                                <router-link to="/terms-conditions">
                                    Terms and Conditions
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/privacy-policy">
                                    Privacy Policy
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/ca-privacy-notice">
                                    CA Privacy Notice
                                </router-link>
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
import { useAuthStore } from "@/stores/auth";
import { useRouter } from "vue-router";
import { ref } from "vue";

export default {
    setup() {
        const authStore = useAuthStore();
        const router = useRouter();
        const email = ref("");
        const password = ref("");
        const loading = ref(false);

        const handleLogin = async () => {
            if (!email.value || !password.value) {
                toastr.error("Email and password are required.");
                return;
            }

            loading.value = true;
            const result = await authStore.login(email.value, password.value);
            loading.value = false;

            if (result.success) {
                toastr.success("Login successful!");
                router.push("/dashboard");
            } else {
                toastr.error(result.message || "Invalid username or password.");
            }
        };

        const socialLogin = (provider) => {
            window.location.href = `http://127.0.0.1:8000/auth/${provider}`;
        };

        return { email, password, handleLogin, socialLogin, loading };
    }
};
</script>
