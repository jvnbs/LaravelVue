<template>
    <!-- Loader Section -->
    <div v-if="loading">
        <Loader />
    </div>

    <div v-else id="content" class="content">
        <!-- Banner Section -->
        <Banner/>

        <!-- Company Services -->
        <div class="company-services">
            <Service/>
        </div>

        <!-- Best Agencies -->
        <div class="best_agencies">
            <Agency/>
        </div>

        <!-- Quick Connect Section -->
        <div class="quick_connect">
            <QuickConnect/>
        </div>

        <!-- Find Great Clients Section -->
        <div class="find-great-clients">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="find-great-img">
                            <img :src="'/front/young-successfulbusinessman.png'" alt="Find Clients" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="find-great-content">
                            <span>For Agency</span>
                            <h3>Find great <br />clients</h3>
                            <p>
                                Meet verified clients from all around the globe.
                                Let's list your company with ItBizHub and take
                                your business to new heights.
                            </p>
                            <div class="Show_all">
                                <a href="#" class="btn">Get Listed</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Reviews Section -->
        <div class="Recent-reviews">
            <Reviews/>
        </div>

        <!-- Recent Interviews Section -->
        <div class="Recent">
            <RecentInterviews/>
        </div>

        <!-- Trusted By Section -->
        <div class="trusted">
            <Brand/>
        </div>
    </div>
</template>

<script>
import Banner from '../components/Banner.vue';
import Brand from '../components/Brand.vue';
import Loader from '../components/Loader.vue';
import RecentInterviews from '../components/RecentInterviews.vue';
import Reviews from '../components/Reviews.vue';
import Service from '../components/Service.vue';
import Agency from '../components/Agency.vue';
import QuickConnect from '../components/QuickConnect.vue';
export default {
    components: {
        Loader,
        Banner,
        Agency,
        QuickConnect,
        Reviews,
        Service,
        RecentInterviews,
        Brand
    },
    data() {
        return {
            loading: true,  // Added loader state
            services: [],
            softwares: [],
        };
    },
    async mounted() {
        await this.fetchData();
    },
    methods: {
        async fetchData() {
            try {
                const [serviceResponse, softwareResponse] = await Promise.all([
                    fetch("https://jsonplaceholder.typicode.com/posts?_limit=4"),
                    fetch("https://jsonplaceholder.typicode.com/posts?_limit=3")
                ]);

                this.services = await serviceResponse.json();
                this.softwares = await softwareResponse.json();
            } catch (error) {
                console.error("Error fetching data:", error);
            } finally {
                this.loading = false; // Hide loader after fetching data
            }
        }
    }
};
</script>
