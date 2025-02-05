<template>
    <body class="user-favorite-page">
        <div class="user-favorite">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <Sidebar />
                    </div>
                    <div class="col-md-9">
                        <div id="content" class="content">
                            <div class="container Tickets">
                                <div
                                    class="heading d-flex justify-content-between align-items-center"
                                >
                                    <h2>Tickets</h2>

                                    <router-link
                                        to="tickets/create"
                                        class="ticket_create_btn"
                                    >
                                        Open New Ticket
                                    </router-link>
                                </div>

                                <!-- Loader Section -->
                                <div v-if="loading" class="text-center py-5">
                                    <Loader />
                                </div>

                                <!-- Ticket List -->
                                <div v-else class="ticket_list ticket_table_html show">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tracking ID</th>
                                                <th>Date</th>
                                                <th>Subject</th>
                                                <th>Status</th>
                                                <th>Last update</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="ticket in tickets" :key="ticket.id">
                                                <td>
                                                    <router-link :to="'tickets/detail/' + ticket.id"
                                                        class="position-relative"
                                                    >
                                                        {{ ticket.id }}
                                                    </router-link>
                                                </td>
                                                <td>04-02-2025</td> 
                                                <td>{{ ticket.title }}</td>
                                                <td>Open</td> 
                                                <td>04-02-2025 09:02 AM</td> <!-- Static -->
                                                <td>
                                                    <router-link :to="'tickets/detail/' + ticket.id">View</router-link>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div id="pagination-wrapper"></div>
                                </div>

                                <!-- No Tickets Found -->
                                <div v-if="!loading && tickets.length === 0" class="text-center text-muted">
                                    <p>No tickets available.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</template>

<script>
import Loader from "../components/Loader.vue";
import Sidebar from "../components/Sidebar.vue";

export default {
    components: {
        Loader,
        Sidebar, // Sidebar component should be registered
    },
    data() {
        return {
            tickets: [], // ✅ Dynamic ticket data
            loading: true, // ✅ Loader state
        };
    },
    async mounted() {
        await this.fetchTicket();
    },
    methods: {
        async fetchTicket() {
            try {
                const response = await fetch("https://jsonplaceholder.typicode.com/posts?_limit=5");
                if (!response.ok) throw new Error("Failed to fetch tickets");
                this.tickets = await response.json();
            } catch (error) {
                console.error("Error fetching tickets:", error);
            } finally {
                this.loading = false;
            }
        },
    },
};
</script>
