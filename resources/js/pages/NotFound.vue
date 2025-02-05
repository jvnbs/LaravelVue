<template>
    <div class="container not-found-container">
        <div class="row align-items-center">
            <!-- Left Side: Image -->
            <div class="col-md-6 text-center">
                <img
                    src="https://internetdevels.com/sites/default/files/public/blog_preview/404_page_cover.jpg"
                    alt="404 Not Found"
                    class="not-found-img"
                />
            </div>

            <!-- Right Side: Text & Buttons -->
            <div class="col-md-6 text-center text-md-start">
                <h1 class="not-found-title">404 - Page Not Found</h1>
                <p class="not-found-text">
                    Oops! Jo page aap dhoondh rahe hain, wo exist nahi karta.  
                </p>
                <div class="buttons">
                    <router-link to="/" class="home-btn">🏠 Home Page</router-link>
                    <button @click="goBack" class="back-btn">🔙 Back</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        goBack() {
            if (window.history.length > 1) {
                this.$router.go(-1);
            } else {
                this.$router.push("/");
            }
        },
    },
};
</script>

<style scoped>
/* Container Styling */
.not-found-container {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 20px;
    text-align: center;
}

/* Image Styling */
.not-found-img {
    width: 100%;
    max-width: 450px;
    border-radius: 10px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
}

/* Title Styling */
.not-found-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #d9534f; /* Red color */
}

/* Text Styling */
.not-found-text {
    font-size: 1.2rem;
    margin: 15px 0;
    color: #555;
}

/* Buttons Styling */
.buttons {
    margin-top: 20px;
}

.home-btn, .back-btn {
    display: inline-block;
    padding: 12px 20px;
    font-size: 1.2rem;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s ease-in-out;
    cursor: pointer;
}

.home-btn {
    background-color: #007bff;
    color: white;
    border: none;
    margin-right: 10px;
}

.back-btn {
    background-color: #6c757d;
    color: white;
    border: none;
}

.home-btn:hover {
    background-color: #0056b3;
}

.back-btn:hover {
    background-color: #5a6268;
}
</style>
