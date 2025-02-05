<template>
    <!-- Page Title Section -->
    <section
        class="page-title-section"
        style="
            background-image: url(https://www-demo.basket.qa/public/frontend/img/faq-header-img.png);
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: #fff;
        "
    >
        <div class="container text-center">
            <h1 class="page-title text-primary h2 font-weight-bold">News</h1>
            <div class="page-breadcrumb mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0">
                        <li class="breadcrumb-item">
                            <router-link to="/">Home</router-link>
                        </li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">
                            News
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- News Page Section -->
    <div class="news-page py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-primary h3 font-weight-bold mb-5">
                Our News Posts
            </h2>

            <!-- Loader Section -->
            <div v-if="loading" class="text-center py-5">
                <Loader />
            </div>

            <!-- News Cards -->
            <div v-else class="row">
                <div class="col-md-4 mb-4" v-for="blog in blogs" :key="blog.id">
                    <div class="card shadow-sm border-0 rounded-lg overflow-hidden">
                        <router-link :to="'/news-detail/' + blog.id">
                            <img
                                src="http://192.168.100.31:9000/public/backed/blogs/1738409731.jpg"
                                alt="News Image"
                                class="card-img-top img-fluid"
                                style="width: 420px; height: 300px; object-fit: cover;"
                            />
                        </router-link>
                        <div class="card-body">
                            <h5 class="card-title text-primary font-weight-bold">
                                {{ blog.title }}
                            </h5>
                            <p class="card-text text-muted">News Description</p>
                            <router-link :to="'/news-detail/' + blog.id" class="btn btn-info btn-sm">Read More</router-link>
                        </div>
                        <div class="card-footer text-muted text-end">
                            <small>Posted on Feb 01, 2025</small>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="!loading && blogs.length === 0" class="text-center mt-5">
                <p class="text-muted">No blog posts available.</p>
            </div>
        </div>
    </div>
</template>

<script>
import Loader from '../components/Loader.vue';

export default {
    components: {
        Loader, // ✅ Register Loader Component
    },
    data() {
        return {
            blogs: [],  // ✅ Array for storing blogs
            loading: true,  // ✅ Loading state
        };
    },
    async mounted() {
        await this.fetchBlogs();
    },
    methods: {
        async fetchBlogs() {
            try {
                const response = await fetch("https://jsonplaceholder.typicode.com/posts?_limit=9");
                const data = await response.json();
                this.blogs = data;
            } catch (error) {
                console.error("Error fetching blogs:", error);
            } finally {
                this.loading = false; // ✅ Hide loader after fetching data
            }
        },
    },
};
</script>
