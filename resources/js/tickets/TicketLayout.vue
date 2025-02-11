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
                <router-view></router-view>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</template>

<script>
import Sidebar from "../components/Sidebar.vue";

export default {
  name: "TicketLayout",
  components: {
    Sidebar,
  },
};
</script>

<style>
.user-favorite .Tickets h2 {
  border: 0;
}

.user-favorite .listing_header .Tickets .btn {
  position: absolute;
  top: 1px;
  color: #fff;
  right: 25px;
  width: auto;
}

a.ticket_create_btn {
  background: #151554;
  color: white;
  border: opx;
  padding: 2px;
  padding-left: 15px;
  padding-right: 15px;
  border-radius: 5px;
}

.ticket_category h3 {
  text-align: center;
  margin-bottom: 30px;
  font-size: 25px;
  text-transform: capitalize;
}

.ticket_category_inner {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
}

.ticket_category_inner_box {
  box-shadow: 0px 0px 8px rgb(131 131 131 / 50%);
}

.ticket_category_inner_box a {
  color: #071063;
  font-weight: 600;
  display: flex;
  align-items: center;
  padding: 25px;
}

.ticket_category_inner_box span {
  width: 40px;
  height: 40px;
  display: inline-block;
  background: #f5f5f5;
  border-radius: 50%;
  text-align: center;
  font-size: 25px;
  margin-right: 10px;
  transition: all 0.3s ease-in-out;
}

.ticket_category_inner_box a:hover span {
  background: #071063;
  color: #fff;
}

.Dashboard-list li i.fa.fa-ticket {
  margin-right: 7px;
}

.Tickets {
  padding-bottom: 25px;
}

.user-favorite .ticket_list table tbody td {
  font-weight: 400;
  font-size: 14px;
  color: #1a1b29;
  width: 200px;
  padding: 12px 14px;
}

.user-favorite .ticket_list table tbody td a {
  color: #071063;
  font-weight: 600;
}

.user-favorite .ticket_list table th {
  border-bottom: 1px solid #dee2e6 !important;
  font-size: 16px;
  color: #1a1b29;
  padding: 20px 14px;
}

.ticket_form select.form-control {
  -webkit-appearance: auto;
  -moz-appearance: auto;
  appearance: auto;
}

.user-favorite .ticket_list table th:nth-child(5) {
  width: 220px !important;
}

.user-favorite .ticket_list {
  border: 1px solid #d9d9d9;
  border-radius: 4px;
  margin-top: 10px;
}

.ticket_list table.table {
  margin: 0px;
}

.user-favorite .ticket_list table tbody tr:last-child td {
  border: 0;
}

.ticket_info_left {
  box-shadow: 0px 0px 2px rgb(135 135 135 / 50%);
  padding: 15px;
  border-radius: 6px;
}

.ticket_info_head h5 {
  font-size: 16px;
  font-weight: 600;
  margin: 0px;
}

.ticket_info_head {
  margin-bottom: 15px;
}

.ticket_info_box_txt {
  margin-bottom: 15px;
}

.ticket_info_box_txt h6 {
  color: #898989;
  font-size: 15px;
  margin: 1px 0px 3px;
}

.ticket_info_box_txt p {
  margin: 0px;
}

.ticket_info h1 {
  text-align: center;
  font-size: 25px;
  margin-bottom: 30px;
}

.ticket_info_right {
  border: 1px solid #dee2e6;
  background: #f6f8fb;
  border-radius: 6px;
  padding: 15px 20px;
  margin-bottom: 6px;
}

.ticket_info_right_top {
  display: flex;
  gap: 10px;
  align-items: center;
  cursor: pointer;
  position: relative;
}

.left_avtar {
  position: relative;
}

.left_avtar_head {
  border: 1px solid #000;
  width: 32px;
  height: 32px;
  text-align: center;
  font-size: 14px;
  line-height: 31px;
  border-radius: 50%;
}

.left_avtar_icon {
  position: absolute;
  top: -6px;
  right: -6px;
  font-size: 10px;
  color: #0d6efd;
  border: 1px solid #0d6efd;
  border-radius: 50%;
  width: 18px;
  height: 18px;
  background: #fff;
  text-align: center;
}

.ticket_info_right_bottom p {
  margin: 0px;
}

.avtar_title {
  margin-left: 5px;
  font-weight: 600;
  font-size: 16px;
  color: #000;
}

.avtar_title:hover {
  color: #071063;
}

.dots_avtar {
  color: #b9b9b9;
  line-height: 29px;
}

.avtar_time {
  display: flex;
  gap: 5px;
  font-size: 14px;
  color: #4e4e4e;
}

.ticket_info_right_bottom {
  margin-top: 10px;
  cursor: pointer;
}

button.btn_reply {
  position: absolute;
  top: 0px;
  right: 0px;
  background: #071063;
  border: 1px solid #071063;
  padding: 2px 6px;
  font-size: 13px;
  color: #fff;
  border-radius: 5px;
}

.ticket_info_top {
  position: relative;
}

a.ticket_back {
  position: absolute;
  top: 2px;
  left: 0px;
  background: #071063;
  color: #fff;
  width: 80px;
  height: 30px;
  text-align: center;
  border-radius: 5%;
}

.ticket_category_inner_box span i {
  line-height: 40px;
}

a.ticket_back i {
  line-height: 30px;
}

.reply_form_footer {
  margin-top: 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

button.btn_reply_send {
  background: #071063;
  border: 1px solid #071063;
  color: #fff;
  border-radius: 5px;
  padding: 4px 25px;
  font-size: 16px;
  transition: all 0.3s ease-in-out;
}

button.btn_reply_send:hover {
  background: #fff;
  border: 1px solid rgba(26, 27, 41, 0.8);
  color: rgba(26, 27, 41, 0.8);
}

button.btn_reply_close {
  color: rgba(26, 27, 41, 0.8);
  border: 1px solid rgba(26, 27, 41, 0.8);
  background: #fff;
  font-size: 16px;
  border-radius: 4px;
  margin-left: 10px;
  padding: 4px 20px;
  transition: all 0.3s ease-in-out;
}

button.btn_reply_close:hover {
  background: #071063;
  border: 1px solid #071063;
  color: #fff;
}

input.reply_file {
  font-size: 16px;
}

.ticket_info_html {
  overflow-y: auto;
  max-height: 405px;
}

button.ticket_from_button {
  background: #090942;
  color: white;
  margin: 0px;
  /* padding: 0px; */
  padding-left: 12px;
  padding-right: 12px;
  /* padding: 7px; */
  padding-top: 5px;
  padding-bottom: 5px;
  margin-top: 20px;
  border: 0px;
  border-radius: 20px;
}

label.ticketFormLabel {
  font-size: 15px;
  margin: 5px;
}
.ticket_category_inner_box.active {
  /* background: aliceblue; */
  background: linear-gradient(
    121.69deg,
    rgba(51, 243, 189, 0.35) 0%,
    rgba(59, 91, 226, 0.35) 100%
  );
}
</style>
