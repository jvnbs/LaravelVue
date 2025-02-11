<template>
  <div class="container Tickets">
    <h2>Tickets</h2>

    <div class="ticket_category">
      <div class="ticket_info_top justify-content-between">
        <router-link to="/tickets" class="ticket_back">Ticket</router-link>
        <h3>Select ticket category</h3>
      </div>

      <div class="ticket_category_inner">
        <div
          v-for="ticket in ticketCategories"
          :key="ticket.id"
          class="ticket_category_inner_box"
          :class="{ active: ticket.id === selectedCategoryId }"
        >
          <a href="javascript:void(0);" @click="TicketCategory(ticket.name, ticket.id)">
            <span><i class="fa fa-angle-right"></i></span>
            {{ ticket.name }}
          </a>
        </div>
      </div>

      <div class="ticket_reply_form mt-5">
        <form @submit.prevent="submitTicket" class="ticket_form_submit">
          <input type="hidden" v-model="ticket.user_id" />

          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label class="ticketFormLabel">Ticket Category</label>
                <input
                  type="text"
                  v-model="selectedCategoryName"
                  class="form-control"
                  placeholder="Select a category"
                  readonly
                />
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label class="ticketFormLabel">Subject</label>
                <input
                  type="text"
                  v-model="ticket.subject"
                  class="form-control"
                  placeholder="Enter subject"
                />
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label for="priority" class="ticketFormLabel">Priority</label>
                <select v-model="ticket.priority" class="form-control">
                  <option value="Low">Low</option>
                  <option value="Medium">Medium</option>
                  <option value="High">High</option>
                </select>
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label for="Attachments" class="ticketFormLabel">Attachments</label>
                <input type="file" class="form-control" @change="handleFileUpload" />
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label for="message" class="ticketFormLabel">Message</label>
                <textarea
                  v-model="ticket.message"
                  class="form-control"
                  placeholder="Enter message"
                  rows="3"
                ></textarea>
              </div>
            </div>

            <div class="submit_btn d-flex justify-content-end">
              <button type="submit" class="ticket_from_button">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import Sidebar from "../components/Sidebar.vue";
import axios from "axios";

// Ticket categories
const ticketCategories = ref([
  { id: 1, name: "General" },
  { id: 2, name: "Support" },
  { id: 3, name: "Advertising" },
  { id: 4, name: "Billing" },
]);

// Ticket state
const ticket = ref({
  category_id: null,
  subject: "",
  priority: "Low",
  message: "",
  attachment: null,
});

// Selected category state
const selectedCategoryId = ref(null);
const selectedCategoryName = ref("");

// Handle ticket category selection
const TicketCategory = (name, id) => {
  selectedCategoryId.value = id;
  selectedCategoryName.value = name;
  ticket.value.category_id = id;
};

// Set default category on component mount
onMounted(() => {
  const defaultCategory = ticketCategories.value[0]; // First category (General)
  TicketCategory(defaultCategory.name, defaultCategory.id);
});

// Handle file upload
const handleFileUpload = (event) => {
  ticket.value.attachment = event.target.files[0];
};

// Submit form
const submitTicket = async () => {
  if (!ticket.value.category_id) {
    alert("Please select a ticket category!");
    return;
  }

  let formData = new FormData();
  formData.append("category_id", ticket.value.category_id);
  formData.append("subject", ticket.value.subject);
  formData.append("priority", ticket.value.priority);
  formData.append("message", ticket.value.message);
  if (ticket.value.attachment) {
    formData.append("attachment", ticket.value.attachment);
  }

  try {
    const response = await axios.post("/api/tickets", formData, {
      headers: { "Content-Type": "multipart/form-data" },
    });
    console.log("Ticket submitted successfully:", response.data);
  } catch (error) {
    console.error("Error submitting ticket:", error);
  }
};
</script>
