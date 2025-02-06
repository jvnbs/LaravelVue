<template>
    <div class="quick_connect">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h3>Quick<span>Connect</span></h3>
                    <ul class="nav nav-tabs">
                        <li v-for="(tab, index) in tabs" :key="index" class="nav-item" >
                            <button class="nav-link" :class="{ active: activeTab === tab.id }"
                                @click="activeTab = tab.id" >
                                {{ tab.name }}
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="col-md-7">
                    <div class="tab-content">
                        <div v-for="(tab, index) in tabs":key="index" class="tab-pane fade"
                            :class="{ 'show active': activeTab === tab.id }" >
                            <ul class="result_list">
                                <li v-for="(item, idx) in tab.items" :key="idx">
                                    <a href="#">{{ item }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            activeTab: "Software",
            tabs: [
                {
                    id: "Software",
                    name: "Best Software",
                    items: [
                        "Data Entry Specialists",
                        "JavaScript Developer",
                        "WordPress Developer",
                        "Logo Designer",
                    ],
                },
                {
                    id: "Services",
                    name: "Top IT Services",
                    items: [
                        "SEO Expert",
                        "Content Writer",
                        "Social Media Manager",
                        "Software Engineer",
                    ],
                },
                {
                    id: "Trading",
                    name: "Trading Skills",
                    items: ["Stock Analyst", "Crypto Trader", "Forex Expert"],
                },
                {
                    id: "Locations",
                    name: "Search By Locations",
                    items: ["New York", "London", "Berlin", "Dubai"],
                },
                {
                    id: "Industries",
                    name: "Filter by Industries",
                    items: ["Healthcare", "Finance", "E-commerce", "Education"],
                },
            ],
        };
    },
};
</script>

