<template>
      <div class="home-banner">
          <div class="banner_bg">
              <img :src="bannerImage" alt="icon" />
          </div>
          <div class="container">
              <div class="banner_content">
                  <h2>
                      <b>Hire the Best</b>
                      <span>{{ textUpdate }}</span>
                  </h2>
                  <p>Work with the best IT company talent service provider for your needs.</p>
                  <form class="search_form">
                      <div class="form-group" id="search-suggestion">
                          <input
                              type="search"
                              id="form1"
                              class="form-control"
                              placeholder="What are you looking for?"
                              v-model="searchQuery"
                          />
                          <button type="button" class="btn" @click="performSearch">
                              <svg
                                  width="14"
                                  height="14"
                                  viewBox="0 0 14 14"
                                  fill="none"
                                  xmlns="http://www.w3.org/2000/svg"
                              >
                                  <path
                                      d="M13.9036 12.8209L10.5842 9.50149C10.5214 9.4386 10.4393 9.40579 10.3518 9.40579H9.99092C10.8522 8.40779 11.3744 7.10903 11.3744 5.68722C11.3744 2.54558 8.82887 0 5.68722 0C2.54558 0 0 2.54558 0 5.68722C0 8.82887 2.54558 11.3744 5.68722 11.3744C7.10903 11.3744 8.40779 10.8522 9.40579 9.99092V10.3518C9.40579 10.4393 9.44134 10.5214 9.50149 10.5842L12.8209 13.9036C12.9494 14.0321 13.1572 14.0321 13.2857 13.9036L13.9036 13.2857C14.0321 13.1572 14.0321 12.9494 13.9036 12.8209Z"
                                      fill="#3B5BE2"
                                      fill-opacity="0.8"
                                  />
                              </svg>
                          </button>
                      </div>
                      <ul class="searchTags">
                          <li v-for="tag in searchTags" :key="tag">
                              <a href="#">{{ tag }}</a>
                          </li>
                      </ul>
                  </form>
              </div>
          </div>
      </div>
  </template>
  
  <script>
  export default {
      data() {
          return {
              bannerImage: "/front/banner.png",
              textUpdate: "Developers",
              searchQuery: "",
              searchTags: ["Graphic Design", "WordPress"],
          };
      },
      methods: {
          performSearch() {
              console.log("Searching for:", this.searchQuery);
              // Implement actual search logic here
          },
      },
  };
  </script>
  