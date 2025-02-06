<script setup lang="ts">
import Brand from "../components/Brand.vue";
import RecentInterviews from "../components/RecentInterviews.vue";
import Reviews from "../components/Reviews.vue";
</script>

<template>
    <div id="content" class="content">
        <div class="find-great-clients">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="find-great-img">
                            <img
                                :src="'front/young-successfulbusinessman.png'"
                            />
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
                                <a href="#" class="btn"
                                    >Get Listed
                                    <svg
                                        width="9"
                                        height="8"
                                        viewBox="0 0 9 8"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M8.41557 4.59159C8.61083 4.39633 8.61083 4.07975 8.41557 3.88448L5.23358 0.702503C5.03832 0.507241 4.72174 0.507241 4.52648 0.702503C4.33122 0.897765 4.33122 1.21435 4.52648 1.40961L7.35491 4.23804L4.52648 7.06646C4.33122 7.26173 4.33122 7.57831 4.52648 7.77357C4.72174 7.96883 5.03832 7.96883 5.23358 7.77357L8.41557 4.59159ZM0.0620117 4.73804H8.06201V3.73804H0.0620117V4.73804Z"
                                            fill="currentColor"
                                        />
                                    </svg>
                                </a>
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

        <div class="Recent">
          <RecentInterviews/>
        </div>

        <!-- Trusted By Section -->
        <div class="trusted">
            <Brand />
        </div>
    </div>
</template>
