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
            <h1 class="page-title text-primary h2 font-weight-bold">Blog</h1>
            <div class="page-breadcrumb mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0">
                        <li class="breadcrumb-item">
                            <router-link to="/">Home</router-link>
                        </li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">
                            Blog
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Blog Page Section -->
    <div class="blog-page py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-primary h3 font-weight-bold mb-5">
                Our Blog Posts
            </h2>

            <!-- Loader Section -->
            <div v-if="loading" class="text-center py-5">
                <Loader />
            </div>

            <!-- Blog Cards -->
            <div v-else class="row">
                <div class="col-md-4 mb-4" v-for="blog in blogs" :key="blog.id">
                    <div class="card shadow-sm border-0 rounded-lg overflow-hidden">
                        <router-link :to="'/blog-detail/' + blog.id">
                        <img :src="blog.image" alt="Blog Image" class="card-img-top img-fluid"
                                style="width: 400px; height: 280px; object-fit: cover;"
                            />
                        </router-link>
                        <div class="card-body">
                            <h5 class="card-title text-primary font-weight-bold">
                                {{ blog.title }}
                            </h5>
                            <p class="card-text text-muted">{{ blog.description }}</p>
                            <router-link :to="'/blog-detail/' + blog.id" class="btn btn-info btn-sm">Read More</router-link>
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
        Loader,
    },
    data() {
        return {
            blogs: [],
            loading: true,  
        };
    },
    async mounted() {
        await this.fetchBlogs();
    },
    
     methods: {
        async fetchBlogs() {
            try {
                const response = await fetch("http://127.0.0.1:8000/api/blogs");

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                const result = await response.json();
                console.log('Fetched Blogs:', result.data); // ✅ Corrected log

                this.blogs = result.data;
                
            } catch (error) {
                console.error("Error fetching blogs:", error);
            } finally {
                this.loading = false; // ✅ Hide loader after fetching data
            }
        },
    },
};
</script>
