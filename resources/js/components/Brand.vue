<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li>
                        <h3>Trusted By</h3>
                    </li>
                    <li v-for="item in services" :key="item.id">
                        <a href="#"
                            ><img :src="item.logo" :alt="item.name"
                        /></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            services: [
                { id: 1, name: "Amazon", logo: "http://127.0.0.1:8000/front/amazon-logo.png" },
                { id: 2, name: "Google", logo: "http://127.0.0.1:8000/front/acquia-partner-ptiwebtech.png" },
                { id: 3, name: "Microsoft", logo: "http://127.0.0.1:8000/front/cisco-ptiwebtech.png" },
                { id: 4, name: "Microsoft", logo: "http://127.0.0.1:8000/front/redhat-certified-partner-ptiwebtech.png" },
            ],
        };
    },
};
</script>
