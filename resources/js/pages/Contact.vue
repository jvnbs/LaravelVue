<template>


<!-- Page Title Section -->
<section class="page-title-section" style="background-image: url(https://www-demo.basket.qa/public/frontend/img/faq-header-img.png); background-size: cover; background-position: center; padding: 80px 0; color: #fff;">
    <div class="container text-center">
               <h1 class="page-title text-primary h2 font-weight-bold">Contact Us</h1>
                <div class="page-breadcrumb mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center bg-transparent p-0">
                    <li class="breadcrumb-item">
                        <router-link to="/">Home</router-link>
                    </li>
                    <li class="breadcrumb-item active text-dark" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<div class="description-page p-5">
    <div class="container">
        <div class="heading_Box">
            <div class="section_box_desc text-muted">
                <span class="text-primary h4">Contact Us</span>
                <p>
                Work with the best IT company talent from around the world. Our platform enables you to swiftly search and find the perfect service provider for your needs.
                </p>
            </div>
        </div>
    </div>
</div>



<!-- Contact Page Section -->
<div class="contact-page py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Contact Details Section -->
            <div class="col-12 mb-lg-0">
                <div class="mt-4">
                    <h4 class="text-primary font-weight-bold">Find Us</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.1191280547597!2d-122.4194157846818!3d37.77492937975985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858163ad3fe687%3A0x9c9c5b86b83f78c8!2sGolden%20Gate%20Bridge!5e0!3m2!1sen!2sus!4v1633803573050!5m2!1sen!2sus" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Page Section -->
<div class="contact-page py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Contact Details Section -->
            <div class="col-6 bg-white p-4 rounded shadow-sm">
                <h4 class="text-primary font-weight-bold">Our Office</h4>
                <p class="text-muted">
                    <strong>Address:</strong> 123 Business St, City, Country
                </p>
                <p class="text-muted">
                    <strong>Phone:</strong> +1 234 567 890
                </p>
                <p class="text-muted">
                    <strong>Email:</strong> contact@yourcompany.com
                </p>

                <h4 class="text-primary font-weight-bold mt-4">Business Hours</h4>
                <p class="text-muted">
                    <strong>Mon-Fri:</strong> 9:00 AM - 6:00 PM
                </p>
                <p class="text-muted">
                    <strong>Sat-Sun:</strong> Closed
                </p>
            </div>

            <!-- Contact Form Section -->
            <div class="col-lg-6">
                <form @submit.prevent="ContactEnquiry" class="bg-white p-4 rounded shadow-sm">
                    <h4 class="text-primary font-weight-bold mb-4">Send Us a Message</h4>

                    <!-- Name Field -->
                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" class="form-control" v-model="name" maxlength="32" placeholder="Enter Name">
                        <small v-if="errors.name" class="text-danger">{{ errors.name }}</small>
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label class="form-label">Your Email</label>
                        <input type="email" class="form-control" v-model="email" maxlength="32" placeholder="Enter Email">
                        <small v-if="errors.email" class="text-danger">{{ errors.email }}</small>
                    </div>

                    <!-- Message Field -->
                    <div class="mb-3">
                        <label class="form-label">Your Message</label>
                        <textarea class="form-control" v-model="message" rows="4" placeholder="Enter Message"></textarea>
                        <small v-if="errors.message" class="text-danger">{{ errors.message }}</small>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Send Message</button>
                </form>

            </div>
        </div>
    </div>
</div>

</template>

<script>
export default {
    data() {
        return {
            name: "",
            email: "",
            message: "",
            errors: {} // Store validation errors
        };
    },
    methods: {
        async ContactEnquiry() {
            // Reset previous errors
            this.errors = {};

            // **Validation Checks**
            if (!this.name) {
                this.errors.name = "Name is required";
            }
            if (!this.email) {
                this.errors.email = "Email is required";
            } else if (!this.validEmail(this.email)) {
                this.errors.email = "Invalid email format";
            }
            if (!this.message) {
                this.errors.message = "Message is required";
            }

            // **If there are validation errors, stop submission**
            if (Object.keys(this.errors).length > 0) {
                return;
            }

            try {
                const response = await fetch("https://jsonplaceholder.typicode.com/posts", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({
                        title: this.name,
                        body: this.message,
                        userId: 1
                    }),
                });

                const data = await response.json();

                if (response.ok) {
                    console.log("Message sent successfully!");
                    alert("Your message has been sent!");
                    this.name = "";
                    this.email = "";
                    this.message = "";
                } else {
                    console.log("Error: " + (data.message || "Please try again."));
                }
            } catch (error) {
                console.error("Error:", error);
                alert("Server error. Please try again later.");
            }
        },
        validEmail(email) {
            // Simple regex for email validation
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }
    }
};
</script>
