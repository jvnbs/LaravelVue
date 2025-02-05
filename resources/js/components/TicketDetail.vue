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
                            <div class="active">
                                <div class="container Tickets">
                                    <h2>Tickets</h2>

                                    <!-- Loader -->
                                    <div v-if="loading" class="text-center py-5">
                                        <Loader />
                                    </div>

                                    <!-- Error Message -->
                                    <div v-if="errorMessage" class="alert alert-danger">
                                        {{ errorMessage }}
                                    </div>

                                    <!-- Ticket Details -->
                                    <div v-if="ticket && !loading" class="ticket_info ticket_detail_html">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="ticket_info_top">
                                                    <router-link to="/tickets" class="ticket_back">
                                                        Back
                                                    </router-link>
                                                    <h1 class="cur_ticket_subject">
                                                        {{ ticket.title }}
                                                    </h1>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="ticket_info_left">
                                                    <div class="ticket_info_head">
                                                        <h5>Ticket Information</h5>
                                                    </div>
                                                    <div class="ticket_info_box">
                                                        <div class="ticket_info_box_txt">
                                                            <h6>Tracking ID</h6>
                                                            <p class="cur_ticket_id">
                                                                #{{ ticket.id }}
                                                            </p>
                                                        </div>
                                                        <div class="ticket_info_box_txt">
                                                            <h6>Date</h6>
                                                            <p class="cur_ticket_date">
                                                                22-01-2025 <!-- Replace with real date if available -->
                                                            </p>
                                                        </div>
                                                        <div class="ticket_info_box_txt">
                                                            <h6>Subject</h6>
                                                            <p class="cur_ticket_subject">
                                                                {{ ticket.title }}
                                                            </p>
                                                        </div>
                                                        <div class="ticket_info_box_txt">
                                                            <h6>Category</h6>
                                                            <p class="cur_ticket_category">
                                                                General <!-- Replace if category exists -->
                                                            </p>
                                                        </div>
                                                        <div class="ticket_info_box_txt">
                                                            <h6>Status</h6>
                                                            <p class="cur_ticket_status">
                                                                Open <!-- Replace if status exists -->
                                                            </p>
                                                        </div>
                                                        <div class="ticket_info_box_txt">
                                                            <h6>Last update</h6>
                                                            <p class="cur_ticket_update">
                                                                22-01-2025 <span>3:50 PM</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="ticket_info_html ticket_chat_info_html">
                                                    <div class="ticket_info_right">
                                                        <div class="ticket_info_right_top">
                                                            <div class="left_avtar">
                                                                <div class="left_avtar_head user_name_alpha">
                                                                    AS
                                                                </div>
                                                            </div>
                                                            <div class="avtar_title user_name">
                                                                Abhishek Saini
                                                            </div>
                                                            <div class="dots_avtar">.</div>
                                                            <div class="avtar_time">
                                                                <div class="avtar_time_left">
                                                                    <span>12:03 PM</span>
                                                                </div>
                                                                <div class="avtar_time_response">
                                                                    (responded in 1 day)
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ticket_info_right_bottom">
                                                            <p>
                                                                {{ ticket.body }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ticket_reply_form">
                                                    <form id="ticket_chat_submit" method="post">
                                                        <input type="hidden" name="support_id" class="ticket_chats_support_id" value="" />
                                                        <input type="hidden" name="user_id" class="ticket_chats_user_id" value="0" />
                                                        <div class="reply_form_msg">
                                                            <textarea name="message" class="form-control" id="Message1" rows="5"></textarea>
                                                        </div>
                                                        <div class="reply_form_footer">
                                                            <div class="reply_form_footer_left">
                                                                <input type="file" name="image" class="reply_file" />
                                                            </div>
                                                            <div class="reply_form_footer_right">
                                                                <button class="btn_reply_send" id="sendReply">
                                                                    Send
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <span id="showErrMsg"></span>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- No Ticket Found -->
                                    <div v-if="!loading && !ticket" class="text-center text-muted">
                                        <p>Ticket not found.</p>
                                    </div>

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
        Sidebar, // ✅ Ensure Sidebar is registered properly
    },
    data() {
        return {
            ticket: null,
            loading: true,
            errorMessage: null,
        };
    },
    async mounted() {
        const ticketId = this.$route.params.id;
        if (!ticketId) {
            this.errorMessage = "Invalid ticket ID.";
            this.loading = false;
            return;
        }
        await this.fetchTicket(ticketId);
    },
    methods: {
        async fetchTicket(id) {
            try {
                this.loading = true;
                const response = await fetch(`https://jsonplaceholder.typicode.com/posts/${id}`);
                if (!response.ok) {
                    throw new Error("Failed to fetch ticket details.");
                }
                this.ticket = await response.json();
            } catch (error) {
                this.errorMessage = "Failed to load ticket. Please try again.";
            } finally {
                this.loading = false; // ✅ Fix: Ensure loader disappears
            }
        },
    },
};
</script>
