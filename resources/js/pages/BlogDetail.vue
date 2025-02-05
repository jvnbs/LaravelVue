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
            <h1 class="page-title text-primary h2 font-weight-bold">
                Blog Detail
            </h1>
            <div class="page-breadcrumb mt-3">
                <nav aria-label="breadcrumb">
                    <ol
                        class="breadcrumb justify-content-center bg-transparent p-0"
                    >
                        <li class="breadcrumb-item">
                            <router-link to="/">Home</router-link>
                        </li>
                        <li class="breadcrumb-item active">
                            <router-link to="/blogs">Blog</router-link>
                        </li>
                        <li
                            class="breadcrumb-item active text-dark"
                            aria-current="page"
                        >
                            Blog Detail
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Blog Detail Page -->
    <div class="blog-detail py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Loader Section -->
                    <div v-if="loading" class="text-center py-5">
                        <Loader />
                    </div>

                    <!-- BLOG CONTENT -->
                    <div v-else-if="blog" class="blog-content bg-white p-5 shadow-lg rounded-lg">
                        <h2 class="text-center text-primary h4 font-weight-bold mb-5">
                            {{ blog?.title || "N/A" }}
                        </h2>
                        <img
                            src="https://demosrvr.com/ithub/public/backed/blogs/1738728960.jpg"
                            alt="Blog Image"
                            class="card-img-top img-fluid"
                            style="width: 1200px; height: 600px; object-fit: cover;"
                        />
                        <p class="text-muted mb-4">
                            <small>Posted on Feb 05, 2025 |
                                <a href="#" class="text-primary">Read More</a>
                            </small>
                        </p>
                        <div class="blog-body">
                            <p>{{ blog?.body || "No content available" }}</p>
                            <div class="cta-section mt-5 p-4 bg-light rounded border border-primary">
                                <h5 class="text-primary">Interested in this topic?</h5>
                                <p>
                                    If you’re interested in similar content or have any questions, feel free to get in
                                    touch with us. We would love to hear your thoughts!
                                </p>
                                <a href="https://demosrvr.com/ithub/contact" class="btn btn-primary">Contact Us</a>
                            </div>
                        </div>

                        <div class="author-info mt-5 p-4 bg-light rounded shadow-sm">
                            <div class="d-flex align-items-center">
                                <img
                                    src="https://demosrvr.com/ithub/public/backed/blogs/1738728960.jpg"
                                    alt="Author Image"
                                    class="rounded-circle"
                                    style="width: 50px; height: 50px; object-fit: cover;"
                                />
                                <div class="ml-3">
                                    <h6 class="text-primary">Written by Author Name</h6>
                                    <p class="text-muted">
                                        A short bio or description of the author can go here.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-else class="text-center text-muted">
                        <p>No blog details found.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Loader from "../components/Loader.vue";

export default {
    components: {
        Loader
    },
    data() {
        return {
            blog: null,
            loading: true,
            errorMessage: null,
        };
    },
    async mounted() {
        const blogId = this.$route.params.id;
        await this.fetchBlog(blogId);
    },
    methods: {
        async fetchBlog(id) {
            try {
                this.loading = true;
                const response = await fetch(
                    `https://jsonplaceholder.typicode.com/posts/${id}`
                );

                if (!response.ok) {
                    throw new Error("Failed to fetch blog details.");
                }

                this.blog = await response.json();
            } catch (error) {
                this.errorMessage = "Failed to load blog. Please try again.";
            } finally {
                this.loading = false; // ✅ Fix: Ensure loader disappears
            }
        },
    },
};
</script>
