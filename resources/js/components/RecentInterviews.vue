<template>
      <div class="container">
          <div class="row">
              <div class="col-md-2">
                  <div class="Recent-heading">
                      <h3>Recent <span>Interviews</span></h3>
                  </div>
              </div>
              <div class="col-md-10">
                  <div class="Recent-profile" v-if="interview">
                      <div class="pro-file">
                          <img :src="interview.image" :alt="interview.name" />
                          <h4>
                              {{ interview.name }} <span>{{ interview.position }}</span>
                          </h4>
                      </div>
                      <p>{{ interview.description }}</p>
                      <div class="Show_all">
                          <a href="#" class="btn">Full interview</a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="Show_all view-more">
              <a href="#" class="btn">View More Interviews</a>
          </div>
      </div>
  </template>
  
  <script>
  export default {
      data() {
          return {
              interview: {
                  id: 1,
                  name: "Umesh Bagri",
                  position: "Manager, Flexibits",
                  image: "/front/profile-33.png",
                  description: " consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, "
              }
          };
      }
  };
  </script>
  