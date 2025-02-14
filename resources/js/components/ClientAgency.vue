<template>
      <div class="container">
        <div class="sec_bg" :style="{ backgroundImage: `url(${bannerImage})` }">
          <span class="top_text">For clients</span>
          <h2>Find Best Agencies From Worldwide</h2>
          <p>
            Explore and connect with top-notch agencies from around the globe to find the best
            talent for your business needs.
          </p>
          <ul class="bottom_list">
            <li v-for="(item, index) in agencyList" :key="index">
              <a :href="item.link" class="listItem">
                <p>{{ item.text }}</p>
                <span class="link_btn">
                  {{ item.buttonText }}
                  <svg
                    width="9"
                    height="8"
                    viewBox="0 0 9 8"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M8.35355 4.35355C8.54882 4.15829 8.54882 3.84171 8.35355 3.64645L5.17157 0.464466C4.97631 0.269204 4.65973 0.269204 4.46447 0.464466C4.2692 0.659728 4.2692 0.976311 4.46447 1.17157L7.29289 4L4.46447 6.82843C4.2692 7.02369 4.2692 7.34027 4.46447 7.53553C4.65973 7.7308 4.97631 7.7308 5.17157 7.53553L8.35355 4.35355ZM0 4.5H8V3.5H0V4.5Z"
                      fill="currentColor"
                    ></path>
                  </svg>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </template>
    
    <script>
    export default {
      data() {
        return {
          bannerImage: "/front/assets/images/banner2.png",
          agencyList: [
            {
              text: "Search, Shortlist, Review and Contact Best Agencies",
              buttonText: "Search agencies",
              link: "#",
            },
            {
              text: "Hire agency as per Your needs and terms",
              buttonText: "Hire agency",
              link: "#",
            },
            {
              text: "Not sure? Let us help you in finding the right agency",
              buttonText: "Find the right agency",
              link: "#",
            },
          ],
        };
      },
    };
    </script>
    