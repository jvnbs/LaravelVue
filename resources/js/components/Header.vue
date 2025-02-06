<template>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <router-link to="/" class="logo_container">
        <img src="front/itbizhubb-logo.png" alt="Logo" />
      </router-link>
      <button class="navbar-toggler" @click="toggleNavbar">
        <span class="navbar-togglerIcon"></span>
        <span class="navbar-togglerIcon"></span>
        <span class="navbar-togglerIcon"></span>
      </button>
      <div class="collapse navbar-collapse" :class="{ show: isNavbarOpen }" id="main-nav">
        <ul class="navbar-nav">
          <li v-for="(menu, index) in menuItems" :key="index" class="nav-item sub-menu">
            <a class="nav-link" @click.prevent="toggleMenu(index)">
              {{ menu.title }}
            </a>
            <ul
              v-if="menu.submenu"
              class="category-menu-list"
              :class="{ 'd-block': activeMenu === index }"
            >
              <li
                v-for="(category, subIndex) in menu.submenu"
                :key="subIndex"
                class="category-menu"
              >
                <button type="button" class="service-title">
                  {{ category.title }}
                </button>
                <div class="mega-sub-menu">
                  <ul>
                    <li v-for="(item, itemIndex) in category.items" :key="itemIndex">
                      <router-link :to="item.link">{{ item.name }}</router-link>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <router-link to="/" class="nav-link">How it Works</router-link>
          </li>
        </ul>
      </div>
      <div class="right-buttons d-flex">
        <router-link to="/sign-in" class="btn">Log In</router-link>
        <router-link to="/get-listing" class="btn get_listing">Get Listed</router-link>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { ref } from "vue";

const isNavbarOpen = ref(false);
const activeMenu = ref(null);

const toggleNavbar = () => {
  isNavbarOpen.value = !isNavbarOpen.value;
};

const toggleMenu = (index) => {
  activeMenu.value = activeMenu.value === index ? null : index;
};

const menuItems = ref([
  {
    title: "Find Services",
    submenu: [
      {
        title: "Software Development",
        items: [
          { name: "Custom Software Developers", link: "/services/software-development" },
          { name: "Blockchain Development", link: "/services/blockchain" },
          { name: "Java Development", link: "/services/java" },
        ],
      },
      {
        title: "Web & App Development",
        items: [
          { name: "Mobile App Development", link: "/services/mobile-app" },
          { name: "Web Development", link: "/services/web-development" },
        ],
      },
      {
        title: "Design",
        items: [
          { name: "Mobile App Development", link: "/services/mobile-app" },
          { name: "Web Development", link: "/services/web-development" },
        ],
      },
       {
        title: "Marketing Advertising",
        items: [
          { name: "Mobile App Development", link: "/services/mobile-app" },
          { name: "Web Development", link: "/services/web-development" },
        ],
      },
       {
        title: "Latest Tech",
        items: [
          { name: "Mobile App Development", link: "/services/mobile-app" },
          { name: "Web Development", link: "/services/web-development" },
        ],
      },

       {
        title: "Business & IT Services",
        items: [
          { name: "Cloud Computing", link: "/services/cloud-computing" },
          { name: "DevOps & Automation", link: "/services/devops" },
          { name: "Big Data & Analytics", link: "/services/big-data" },
          { name: "IoT Development", link: "/services/iot" },
        ],
      },
      {
        title: "Browse all categories",
        items: [
          { name: "Cloud Computing", link: "/services/cloud-computing" },
          { name: "DevOps & Automation", link: "/services/devops" },
          { name: "Big Data & Analytics", link: "/services/big-data" },
          { name: "IoT Development", link: "/services/iot" },
        ],
      },

    ],
  },
  {
    title: "Find Software",
    submenu: [
      {title: "Accounting Software"},
      {title: "App Development Software"},
      { title: "CRM Software",
       items: [
        { name: "CRM Software", link: "/software/crm" }
        ]
      },
      {
        title: "E-Commerce Software",
        items: [
          { name: "E-Commerce Software", link: "/software/e-commerce" }
          ],
      },
      {title: "ERP Software"},
      {title: "HR Software"},
      {title: "Help Desk Software"},
      {title: "Inventory Management Software"},
      {title: "Browse all software"},
    ],
  },
]);
</script>
