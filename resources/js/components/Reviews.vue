<template>
    <div class="container">
        <h2>Recent Reviews</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
            do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <div class="row">
            <div class="col-lg-4 col-md-6" v-for="review in reviews" :key="review.id">
                <div class="review-box">
                    <p>{{ review.text }}</p>
                    <h5>- {{ review.author }}, {{ review.position }}</h5>
                    <img :src="review.logo" :alt="review.company" />
                    <span>{{ review.company }}</span>
                </div>
            </div>
        </div>
        <div class="Show_all">
            <a href="#" class="btn">
                Browse all Reviews
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <path
                        d="M7 14C10.8669 14 14 10.8669 14 7C14 3.13306 10.8669 0 7 0C3.13307 0 0 3.13306 0 7C0 10.8669 3.13307 14 7 14ZM3.72581 5.75806H7V3.75686C7 3.45484 7.36694 3.30242 7.57863 3.51694L10.8048 6.76008C10.9375 6.89274 10.9375 7.10443 10.8048 7.2371L7.57863 10.4802C7.36411 10.6948 7 10.5423 7 10.2403V8.24193H3.72581C3.53952 8.24193 3.3871 8.08952 3.3871 7.90323V6.09677C3.3871 5.91048 3.53952 5.75806 3.72581 5.75806Z"
                        fill="currentColor"
                    ></path>
                </svg>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            reviews: [
                {
                    id: 1,
                    text: "The client got exactly what they asked for: a functional and well-designed site with all the necessary features. Protocloud Technologies Pvt. Ltd. was very reliable and efficient.",
                    author: "Umesh Bagri",
                    position: "Manager, Flexibits",
                    logo: "/front/newLogo3.png",
                    company: "Ptiwebtech Technologies"
                },
                {
                    id: 2,
                    text: "The client got exactly what they asked for: a functional and well-designed site with all the necessary features. Protocloud Technologies Pvt. Ltd. was very reliable and efficient.",
                    author: "Umesh Bagri",
                    position: "Manager, Flexibits",
                    logo: "/front/newLogo2.png",
                    company: "Trimurty Infotech"
                },
                {
                    id: 3,
                    text: "The client got exactly what they asked for: a functional and well-designed site with all the necessary features. Protocloud Technologies Pvt. Ltd. was very reliable and efficient.",
                    author: "Umesh Bagri",
                    position: "Manager, Flexibits",
                    logo: "/front/newLogo1.png",
                    company: "JaipuriaGeeks"
                }
            ]
        };
    }
};
</script>
