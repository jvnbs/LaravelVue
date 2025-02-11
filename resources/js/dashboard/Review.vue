<template>
  <div class="container Reviews">
    <h2>Reviews</h2>
    <a class="btn btn_review" data-bs-toggle="modal" href="#reviewModal" role="button">
      Write a Review
    </a>
    <div v-if="loading">
      <Loader />
    </div>
    <div v-else class="reviews_list">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Company</th>
            <th scope="col">Ratings</th>
            <th scope="col">Submitted on</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="review in paginatedReviews" :key="review.id">
            <td>{{ review.title }}</td>
            <td>⭐ {{ review.rating }}/5</td>
            <td>{{ review.date }}</td>
            <td>Published</td>
            <td>
              <div class="dropdown editList">
                <button
                  class="btn btn-secondary dropdown-toggle"
                  type="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  ...
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#" @click="deleteReview(review.id)">
                    Delete
                  </a>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div v-if="reviews.length > 0" class="pagin-tion">
      <div class="container">
        <div class="row">
          <!-- Showing Entries -->
          <div class="col-md-6">
            <div class="totle-page">
              <span>
                Showing {{ startIndex + 1 }} to {{ endIndex }} of
                {{ reviews.length }} Entries
              </span>
            </div>
          </div>

          <!-- Pagination Controls -->
          <div class="col-md-6">
            <ul class="page-list">
              <!-- Previous Button -->
              <li :class="{ Previous: true, disabled: currentPage === 1 }">
                <span
                  @click="prevPage"
                  :style="{ cursor: currentPage === 1 ? 'not-allowed' : 'pointer' }"
                >
                  <svg
                    width="7"
                    height="10"
                    viewBox="0 0 7 10"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M0.697399 4.66803L5.29806 0.137668C5.48162 -0.0458899 5.77844 -0.0458899 5.962 0.137668L6.23929 0.414958C6.42284 0.598516 6.42284 0.895333 6.23929 1.07889L2.24397 5L6.23538 8.92111C6.41894 9.10467 6.41894 9.40148 6.23538 9.58504L5.95809 9.86233C5.77453 10.0459 5.47771 10.0459 5.29416 9.86233L0.693493 5.33197C0.513841 5.14841 0.513841 4.85159 0.697399 4.66803Z"
                      fill="#1A1B29"
                      fill-opacity="0.4"
                    ></path>
                  </svg>
                  Previous
                </span>
              </li>

              <!-- Page Numbers -->
              <li
                v-for="page in totalPages"
                :key="page"
                :class="{ active: currentPage === page }"
              >
                <a href="#" @click.prevent="goToPage(page)">{{ page }}</a>
              </li>

              <!-- Next Button -->
              <li :class="{ Next: true, disabled: currentPage === totalPages }">
                <span
                  @click="nextPage"
                  :style="{
                    cursor: currentPage === totalPages ? 'not-allowed' : 'pointer',
                  }"
                >
                  Next
                  <svg
                    width="7"
                    height="10"
                    viewBox="0 0 7 10"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M0.697399 4.66803L5.29806 0.137668C5.48162 -0.0458899 5.77844 -0.0458899 5.962 0.137668L6.23929 0.414958C6.42284 0.598516 6.42284 0.895333 6.23929 1.07889L2.24397 5L6.23538 8.92111C6.41894 9.10467 6.41894 9.40148 6.23538 9.58504L5.95809 9.86233C5.77453 10.0459 5.47771 10.0459 5.29416 9.86233L0.693493 5.33197C0.513841 5.14841 0.513841 4.85159 0.697399 4.66803Z"
                      fill="#1A1B29"
                      fill-opacity="0.4"
                    ></path>
                  </svg>
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Loader from "../components/Loader.vue";

export default {
  components: {
    Loader,
  },
  data() {
    return {
      reviews: [],
      loading: true,
      currentPage: 1,
      perPage: 5,
    };
  },
  computed: {
    totalPages() {
      return Math.ceil(this.reviews.length / this.perPage);
    },
    startIndex() {
      return (this.currentPage - 1) * this.perPage;
    },
    endIndex() {
      return Math.min(this.startIndex + this.perPage, this.reviews.length);
    },
    paginatedReviews() {
      return this.reviews.slice(this.startIndex, this.endIndex);
    },
  },
  async mounted() {
    await this.fetchReviews();
  },
  methods: {
    async fetchReviews() {
      try {
        const response = await fetch(
          "https://jsonplaceholder.typicode.com/posts?_limit=20"
        );
        if (!response.ok) throw new Error("Failed to fetch reviews");

        const data = await response.json();
        this.reviews = data.map((review) => ({
          ...review,
          rating: (Math.random() * 2 + 3).toFixed(1), // Mock rating between 3.0 - 5.0
          date: new Date().toDateString(), // Mock date
        }));
      } catch (error) {
        console.error("Error fetching reviews:", error);
      } finally {
        this.loading = false;
      }
    },
    deleteReview(reviewId) {
      this.reviews = this.reviews.filter((review) => review.id !== reviewId);
      if (this.reviews.length > 0 && this.currentPage > this.totalPages) {
        this.currentPage = this.totalPages; // Adjust page if last item deleted
      }
    },
    goToPage(page) {
      if (page >= 1 && page <= this.totalPages) {
        this.currentPage = page;
      }
    },
    prevPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
  },
};
</script>
