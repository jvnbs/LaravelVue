<template>
  <div class="container">
    <div class="row">
      <!-- Logo & Description -->
      <div class="col-md-3">
        <div class="footer-logo">
          <router-link to="/">
            <img :src="footerData.logo" alt="icon" />
          </router-link>
          <p>{{ footerData.description }}</p>
          <ul>
            <li>Follow Us</li>
            <li v-for="(social, index) in footerData.socialLinks" :key="index">
              <a :href="social.url" target="_blank" v-html="social.icon"></a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Dynamic Footer Menus -->
      <div v-for="(menu, index) in footerData.menus" :key="index" class="col-md-3">
        <div class="footer-menu">
          <h3>{{ menu.title }}</h3>
          <ul>
            <li v-for="(link, linkIndex) in menu.links" :key="linkIndex">
              <router-link :to="link.to">{{ link.text }}</router-link>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
      <ul>
        <li>© {{ new Date().getFullYear() }} All rights reserved, ItBizHub.</li>
        <li v-for="(link, index) in footerData.bottomLinks" :key="index">
          <router-link :to="link.to">{{ link.text }}</router-link> |
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      footerData: {
        logo: "/front/itbizhub-logo-white.png",
        description:
          "Discover a world of IT excellence at ItBizHub, your one-stop destination for connecting with top-tier IT companies worldwide.",
        socialLinks: [
          {
            url: "#",
            icon:
              '<svg width="28" height="28" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="13.5" stroke="white"/><path d="M12.0973 21V14.7383H10V12.25H12.0973V10.2895C12.0973 8.15938 13.3988 7 15.2992 7C16.2098 7 16.9918 7.06836 17.2188 7.09844V9.32422H15.9008C14.8672 9.32422 14.6676 9.81641 14.6676 10.5355V12.25H17L16.6801 14.7383H14.6676V21" fill="white"/></svg>',
          },
          {
            url: "#",
            icon:
              '<svg width="28" height="28" viewBox="0 0 28 28" fill="none"><circle cx="14" cy="14" r="13.5" stroke="white"/><path d="M20.6866 10.5647C20.514 9.94878 20.0058 9.46372 19.3604 9.29911C18.1906 9 13.5 9 13.5 9C13.5 9 8.80939 9 7.6396 9.29911C6.99423 9.46375 6.48595 9.94878 6.31344 10.5647C6 11.681 6 14.0101 6 14.0101C6 14.0101 6 16.3392 6.31344 17.4555C6.48595 18.0714 6.99423 18.5363 7.6396 18.7009C8.80939 19 13.5 19 13.5 19C13.5 19 18.1906 19 19.3604 18.7009C20.0058 18.5363 20.514 18.0714 20.6866 17.4555C21 16.3392 21 14.0101 21 14.0101C21 14.0101 21 11.681 20.6866 10.5647ZM11.9659 16.1248V11.8954L15.8863 14.0102L11.9659 16.1248Z" fill="white"/></svg>',
          },
        ],
        menus: [
          {
            title: "For Clients",
            links: [
              { text: "How to find a right agency", to: "#" },
              { text: "Find Agency by Service", to: "#" },
              { text: "Find the best software", to: "#" },
              { text: "Write a Review", to: "#" },
              { text: "Testimonials", to: "/testimonials" },
              { text: "Client FAQs", to: "/faq" },
            ],
          },
          {
            title: "For Agency",
            links: [
              { text: "Get listed with ItBizHub", to: "#" },
              { text: "Get Sponsorship", to: "#" },
              { text: "Get Badges", to: "#" },
              { text: "Business Interviews", to: "#" },
              { text: "Agency FAQs", to: "/faq" },
            ],
          },
          {
            title: "ItBizHub",
            links: [
              { text: "About Us", to: "/about" },
              { text: "News", to: "/news" },
              { text: "Blogs", to: "/blogs" },
              { text: "Contact Us", to: "/contact-us" },
            ],
          },
        ],
        bottomLinks: [
          { text: "Terms of Service", to: "/terms-conditions" },
          { text: "Privacy Policy", to: "/privacy-policy" },
        ],
      },
    };
  },
};
</script>
