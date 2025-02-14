<template>
    <div class="company-services">
      <div class="container">
        <div class="section_title">
          <h2 class="h2_title">Browse Company by Services</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
  
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" v-for="(tab, index) in tabs" :key="index" role="presentation">
              <button 
                class="nav-link" 
                :class="{ active: activeTab === tab.id }" 
                @click="activeTab = tab.id" 
                :id="`${tab.id}-tab`" 
                type="button" 
                role="tab"
              >
                {{ tab.name }}
              </button>
            </li>
          </ul>
        </div>
  
        <div class="tab-content">
          <div v-for="(tab, index) in tabs" :key="index" class="tab-pane fade" :class="{ 'show active': activeTab === tab.id }">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-6" v-for="(service, idx) in tab.services" :key="idx">
                <a href="#" class="service_block">
                  <div class="s_icon">
                    <img :src="service.icon" :alt="service.name" />
                  </div>
                  <h4>{{ service.name }}</h4>
                </a>
              </div>
            </div>
          </div>
        </div>
  
        <div class="Show_all">
          <a href="listing.html" class="btn">
            Browse all services 
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M7 14C10.8669 14 14 10.8669 14 7C14 3.13306 10.8669 0 7 0C3.13307 0 0 3.13306 0 7C0 10.8669 3.13307 14 7 14ZM3.72581 5.75806H7V3.75686C7 3.45484 7.36694 3.30242 7.57863 3.51694L10.8048 6.76008C10.9375 6.89274 10.9375 7.10443 10.8048 7.2371L7.57863 10.4802C7.36411 10.6948 7 10.5423 7 10.2403V8.24193H3.72581C3.53952 8.24193 3.3871 8.08952 3.3871 7.90323V6.09677C3.3871 5.91048 3.53952 5.75806 3.72581 5.75806Z"
                fill="currentColor" 
              />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        activeTab: "services",
        tabs: [
          {
            id: "services",
            name: "Find Services",
            services: [
              { name: "Web Development", icon: "front/icon1.png" },
              { name: "Web Designing", icon: "front/icon2.png" },
              { name: "Digital Marketing & Advertising", icon: "front/icon3.png" },
              { name: "Mobile App Development", icon: "front/icon4.png" },
              { name: "Software Development", icon: "front/icon5.png" },
              { name: "E-commerce Development", icon: "front/icon6.png" },
              { name: "SEO", icon: "front/icon7.png" },
              { name: "Testing Services", icon: "front/icon8.png" },
              { name: "Implementation Services", icon: "front/icon9.png" },
              { name: "Progressive Web App", icon: "front/icon10.png" },
              { name: "Game Development", icon: "front/icon11.png" },
              { name: "Admin Services", icon: "front/icon12.png" }
            ]
          },
          {
            id: "software",
            name: "Find Software",
            services: [
              { name: "Testing Software", icon: "front/icon13.png" },
              { name: "Accounting Practice Management Software", icon: "front/icon14.png" },
              { name: "Accounting Software", icon: "front/icon15.png" },
              { name: "Accounts Payable Software", icon: "front/icon16.png" },
              { name: "Admissions Software", icon: "front/icon17.png" },
              { name: "Affiliate Software", icon: "front/icon18.png" },
              { name: "Animation Software", icon: "front/icon19.png" },
              { name: "Anti-Spam Software", icon: "front/icon20.png" },
              { name: "App Design Software", icon: "front/icon21.png" },
              { name: "App Development Software", icon: "front/icon22.png" },
              { name: "Applicant Tracking Software", icon: "front/icon23.png" },
              { name: "Architecture Software", icon: "front/icon24.png" }
            ]
          }
        ]
      };
    }
  };
  </script>
  