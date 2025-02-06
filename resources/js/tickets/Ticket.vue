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

                                <!-- Loader -->
                                <div v-if="loading">
                                    <Loader />
                                </div>

                                <!-- Ticket List -->
                                <div
                                    v-else
                                    class="ticket_list ticket_table_html show"
                                >
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
                                            <tr
                                                v-for="ticket in paginatedTickets"
                                                :key="ticket.id"
                                            >
                                                <td>
                                                    <router-link
                                                        :to="
                                                            'tickets/detail/' +
                                                            ticket.id
                                                        "
                                                    >
                                                        {{ ticket.id }}
                                                    </router-link>
                                                </td>
                                                <td>{{ ticket.date }}</td>
                                                <td>{{ ticket.title }}</td>
                                                <td>Open</td>
                                                <!-- Static status -->
                                                <td>{{ ticket.updatedAt }}</td>
                                                <td>
                                                    <router-link
                                                        :to="
                                                            'tickets/detail/' +
                                                            ticket.id
                                                        "
                                                        >View</router-link
                                                    >
                                                    <a
                                                        href="#"
                                                        @click.prevent="
                                                            deleteTicket(
                                                                ticket.id
                                                            )
                                                        "
                                                        class="text-danger ms-2"
                                                        >Delete</a
                                                    >
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div v-if="tickets.length > 0" class="pagin-tion">
                                        <div class="container">
                                            <div class="row">
                                                <!-- Showing Entries -->
                                                <div class="col-md-6">
                                                    <div class="totle-page">
                                                        <span>
                                                            Showing {{ startIndex + 1 }} to {{ endIndex }} of {{ tickets.length }} Entries
                                                        </span>
                                                    </div>
                                                </div>

                                                <!-- Pagination Controls -->
                                                <div class="col-md-6">
                                                    <ul class="page-list">
                                                        <!-- Previous Button -->
                                                        <li :class="{ Previous: true, disabled: currentPage === 1 }">
                                                            <span @click="prevPage" :style="{ cursor: currentPage === 1 ? 'not-allowed' : 'pointer' }">
                                                                <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M0.697399 4.66803L5.29806 0.137668C5.48162 -0.0458899 5.77844 -0.0458899 5.962 0.137668L6.23929 0.414958C6.42284 0.598516 6.42284 0.895333 6.23929 1.07889L2.24397 5L6.23538 8.92111C6.41894 9.10467 6.41894 9.40148 6.23538 9.58504L5.95809 9.86233C5.77453 10.0459 5.47771 10.0459 5.29416 9.86233L0.693493 5.33197C0.513841 5.14841 0.513841 4.85159 0.697399 4.66803Z"
                                                                        fill="#1A1B29" fill-opacity="0.4"></path>
                                                                </svg>
                                                                Previous
                                                            </span>
                                                        </li>

                                                        <!-- Page Numbers -->
                                                        <li v-for="page in totalPages" :key="page" :class="{ active: currentPage === page }">
                                                            <a href="#" @click.prevent="goToPage(page)">{{ page }}</a>
                                                        </li>

                                                        <!-- Next Button -->
                                                        <li :class="{ Next: true, disabled: currentPage === totalPages }">
                                                            <span @click="nextPage" :style="{ cursor: currentPage === totalPages ? 'not-allowed' : 'pointer' }">
                                                                Next
                                                                <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M0.697399 4.66803L5.29806 0.137668C5.48162 -0.0458899 5.77844 -0.0458899 5.962 0.137668L6.23929 0.414958C6.42284 0.598516 6.42284 0.895333 6.23929 1.07889L2.24397 5L6.23538 8.92111C6.41894 9.10467 6.41894 9.40148 6.23538 9.58504L5.95809 9.86233C5.77453 10.0459 5.47771 10.0459 5.29416 9.86233L0.693493 5.33197C0.513841 5.14841 0.513841 4.85159 0.697399 4.66803Z"
                                                                        fill="#1A1B29" fill-opacity="0.4"></path>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <!-- No Tickets Found -->
                                <div
                                    v-if="!loading && tickets.length === 0"
                                    class="text-center text-muted"
                                >
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
        Sidebar,
        Loader,
    },
    data() {
        return {
            tickets: [],
            loading: true,
            currentPage: 1,
            perPage: 5,
        };
    },
    computed: {
        totalPages() {
            return Math.ceil(this.tickets.length / this.perPage);
        },
        startIndex() {
            return (this.currentPage - 1) * this.perPage;
        },
        endIndex() {
            return Math.min(
                this.startIndex + this.perPage,
                this.tickets.length
            );
        },
        paginatedTickets() {
            return this.tickets.slice(this.startIndex, this.endIndex);
        },
    },
    async mounted() {
        await this.fetchTickets();
    },
    methods: {
        async fetchTickets() {
            try {
                const response = await fetch(
                    "https://jsonplaceholder.typicode.com/posts?_limit=20"
                );
                if (!response.ok) throw new Error("Failed to fetch tickets");

                const data = await response.json();
                this.tickets = data.map((ticket) => ({
                    id: ticket.id,
                    title: ticket.title,
                    date: new Date().toLocaleDateString(),
                    updatedAt: new Date().toLocaleString(),
                }));
            } catch (error) {
                console.error("Error fetching tickets:", error);
            } finally {
                this.loading = false;
            }
        },
        deleteTicket(ticketId) {
            this.tickets = this.tickets.filter(
                (ticket) => ticket.id !== ticketId
            );
            if (this.tickets.length > 0 && this.currentPage > this.totalPages) {
                this.currentPage = this.totalPages; // Adjust page if last item deleted
            }
        },
        goToPage(page) {
            if (page >= 1 && page <= this.totalPages) {
                this.currentPage = page;
            }
        },
        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
            }
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
            }
        },
    },
};
</script>
