<template>
    <!-- Page Title Section -->
    <section class="page-title-section" style="background-image: url(https://www-demo.basket.qa/public/frontend/img/faq-header-img.png); background-size: cover; background-position: center; padding: 80px 0; color: #fff;">
        <div class="container text-center">
            <h1 class="page-title text-primary display-6 font-weight-bold">Faq</h1>
            <div class="page-breadcrumb mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center bg-transparent p-0">
                        <li class="breadcrumb-item">
                            <router-link to="/">Home</router-link>
                        </li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Faq</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <div class="description-page p-5">
        <div class="container">
            <div class="heading_Box">
                <p class="section_box_desc text-muted">
                    <span class="lead">Faq</span>
                </p>
                <p>
                    Work with the best IT company talent from around the world. Our platform enables you to swiftly search and find the perfect service provider for your needs.
                </p>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="faq-page py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-primary font-weight-bold mb-5">Frequently Asked Questions</h2>
            
            <!-- Loader -->
            <div v-if="loading" class="text-center py-5">
                <Loader />
            </div>

            <div v-else class="row align-items-center">
                <!-- Image Section -->
                <div class="col-lg-4 mb-4 mb-lg-0 text-center">
                    <img src="https://img.freepik.com/free-vector/faqs-concept-illustration_114360-5245.jpg?t=st=1735800969~exp=1735804569~hmac=8dfea3b9d60ca66186cb794592bbf9b28d24481cb396014b6bbd16acbb90624b&w=740" alt="FAQ Illustration" class="img-fluid rounded shadow">
                </div>

                <!-- FAQ Accordion -->
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div v-for="(faq, index) in faqs" :key="faq.id" class="accordion-item mb-4 shadow-sm border-0 rounded">
                            <h2 class="accordion-header" :id="'heading' + index">
                                <button 
                                    class="accordion-button fw-bold text-white" 
                                    type="button" 
                                    data-bs-toggle="collapse" 
                                    :data-bs-target="'#collapse' + index" 
                                    aria-expanded="false" 
                                    :aria-controls="'collapse' + index" 
                                    style="background: #071063;">
                                    {{ faq.title }}
                                </button>
                            </h2>
                            <div :id="'collapse' + index" class="accordion-collapse collapse" :aria-labelledby="'heading' + index" data-bs-parent="#faqAccordion">
                                <div class="accordion-body bg-white p-4 text-muted rounded">
                                    {{ faq.body }}
                                </div>
                            </div>
                        </div>
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
        Loader,
    },
    data() {
        return {
            faqs: [], // ✅ Dynamic FAQ data
            loading: true, // ✅ Loader state
        };
    },
    async mounted() {
        await this.fetchFaq();
    },
    methods: {
        async fetchFaq() {
            try {
                const response = await fetch("https://jsonplaceholder.typicode.com/posts?_limit=5");
                if (!response.ok) throw new Error("Failed to fetch FAQs");
                this.faqs = await response.json();
            } catch (error) {
                console.error("Error fetching FAQs:", error);
            } finally {
                this.loading = false;
            }
        },
    },
};
</script>
