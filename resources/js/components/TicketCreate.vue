<template>
    <div class="user-favorite-page">
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

                                    <div class="ticket_category">
                                        <div
                                            class="ticket_info_top justify-content-between"
                                        >
                                            <router-link
                                                to="/tickets"
                                                class="ticket_back"
                                                >Ticket</router-link
                                            >
                                            <h3>Select ticket category</h3>
                                        </div>

                                        <div class="ticket_category_inner">
                                            <div
                                                v-for="ticket in ticketCategories"
                                                :key="ticket.id"
                                                class="ticket_category_inner_box"
                                            >
                                                <a
                                                    href="javascript:void(0);"
                                                    @click="
                                                        openModal(
                                                            ticket.name,
                                                            ticket.id
                                                        )
                                                    "
                                                >
                                                    <span
                                                        ><i
                                                            class="fa fa-angle-right"
                                                        ></i
                                                    ></span>
                                                    {{ ticket.name }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Popup -->
                                    <div
                                        v-if="isModalOpen"
                                        class="modal ticketModal show"
                                    >
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2
                                                        class="ticketCategoryName"
                                                    >
                                                        {{
                                                            selectedCategoryName
                                                        }}
                                                        Ticket
                                                    </h2>
                                                    <button
                                                        type="button"
                                                        class="btn-close"
                                                        @click="closeModal"
                                                    ></button>
                                                </div>
                                                <div id="ticket-form-container">
                                                    <form
                                                        @submit.prevent="
                                                            submitTicket
                                                        "
                                                        class="ticket_form_submit"
                                                    >
                                                        <input
                                                            type="hidden"
                                                            v-model="
                                                                selectedCategoryId
                                                            "
                                                        />

                                                        <div class="modal-body">
                                                            <div
                                                                class="fieldset"
                                                            >
                                                                <label
                                                                    for="subject"
                                                                    >Subject</label
                                                                >
                                                                <input
                                                                    v-model="
                                                                        ticket.subject
                                                                    "
                                                                    type="text"
                                                                    class="form-control"
                                                                    placeholder="Enter Subject"
                                                                />
                                                            </div>

                                                            <div
                                                                class="fieldset"
                                                            >
                                                                <label
                                                                    for="priority"
                                                                    >Priority</label
                                                                >
                                                                <select
                                                                    v-model="
                                                                        ticket.priority
                                                                    "
                                                                    class="form-control"
                                                                >
                                                                    <option
                                                                        value="Low"
                                                                    >
                                                                        Low
                                                                    </option>
                                                                    <option
                                                                        value="Medium"
                                                                    >
                                                                        Medium
                                                                    </option>
                                                                    <option
                                                                        value="High"
                                                                    >
                                                                        High
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div
                                                                class="fieldset"
                                                            >
                                                                <label
                                                                    for="message"
                                                                    >Message</label
                                                                >
                                                                <textarea
                                                                    v-model="
                                                                        ticket.message
                                                                    "
                                                                    class="form-control"
                                                                    placeholder="Enter message"
                                                                    rows="3"
                                                                ></textarea>
                                                            </div>

                                                            <div
                                                                class="fieldset"
                                                            >
                                                                <label
                                                                    for="Attachments"
                                                                    >Attachments</label
                                                                >
                                                                <input
                                                                    type="file"
                                                                    class="form-control"
                                                                    @change="
                                                                        handleFileUpload
                                                                    "
                                                                />
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="modal-footer"
                                                        >
                                                            <button
                                                                type="button"
                                                                class="btn btn-danger"
                                                                @click="
                                                                    closeModal
                                                                "
                                                            >
                                                                Close
                                                            </button>
                                                            <button
                                                                type="submit"
                                                                class="Update ticket_from_button"
                                                            >
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import Sidebar from "../components/Sidebar.vue";

// Ticket categories
const ticketCategories = ref([
    { id: 1, name: "General" },
    { id: 2, name: "Support" },
    { id: 3, name: "Advertising" },
    { id: 4, name: "Billing" },
]);

// Modal state
const isModalOpen = ref(false);
const selectedCategoryName = ref("");
const selectedCategoryId = ref(null);
const ticket = ref({
    subject: "",
    priority: "Low",
    message: "",
    attachment: null,
});

// Open modal with selected category
const openModal = (name, id) => {
    selectedCategoryName.value = name;
    selectedCategoryId.value = id;
    isModalOpen.value = true;
};

// Close modal
const closeModal = () => {
    isModalOpen.value = false;
};

// Handle file upload
const handleFileUpload = (event) => {
    ticket.value.attachment = event.target.files[0];
};

// Submit form
const submitTicket = () => {
    console.log("Submitting ticket:", {
        category: selectedCategoryName.value,
        subject: ticket.value.subject,
        priority: ticket.value.priority,
        message: ticket.value.message,
        attachment: ticket.value.attachment,
    });
    closeModal(); // Close modal after submission
};
</script>

<style scoped>
/* Modal Styling */
.modal {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}
.modal-dialog {
    background: white;
    padding: 20px;
    border-radius: 5px;
}
</style>
