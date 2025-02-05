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
                              <div class="active">
                                    <div class="container Reviews">
                                    <h2>Reviews</h2>
                                    <a class="btn btn_review" data-bs-toggle="modal" href="#reviewModal" role="button">Write a Review</a>
                                    <div class="reviews_list">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Company</th>
                                                    <th scope="col">Ratings</th>
                                                    <th scope="col">Submitted on</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                                                                                                        <tr>
                                                    <td>Sukriti Dadhich</td>
                                                    <td>
                                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7.52447 0.463526C7.67415 0.0028708 8.32585 0.00286996 8.47553 0.463525L9.90837 4.87336C9.97531 5.07937 10.1673 5.21885 10.3839 5.21885H15.0207C15.505 5.21885 15.7064 5.83865 15.3146 6.12336L11.5633 8.84878C11.3881 8.9761 11.3148 9.20179 11.3817 9.4078L12.8145 13.8176C12.9642 14.2783 12.437 14.6613 12.0451 14.3766L8.29389 11.6512C8.11865 11.5239 7.88135 11.5239 7.70611 11.6512L3.95488 14.3766C3.56303 14.6613 3.03578 14.2783 3.18546 13.8176L4.6183 9.4078C4.68524 9.20179 4.61191 8.9761 4.43667 8.84878L0.685441 6.12336C0.293584 5.83866 0.494972 5.21885 0.979333 5.21885H5.6161C5.83272 5.21885 6.02469 5.07937 6.09163 4.87336L7.52447 0.463526Z" fill="#F2D909"></path>
                                                        </svg>
                                                        4.2/5
                                                    </td>
                                                    <td>@January 28, 2023</td>
                                                    <td>Published</td>
                                                    <td>
                                                        <div class="dropdown editList">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="editbtn13" data-bs-toggle="dropdown" aria-expanded="false">
                                                                ...
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="editbtn13">
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                                                                <tr>
                                                    <td>Sukriti Dadhich</td>
                                                    <td>
                                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7.52447 0.463526C7.67415 0.0028708 8.32585 0.00286996 8.47553 0.463525L9.90837 4.87336C9.97531 5.07937 10.1673 5.21885 10.3839 5.21885H15.0207C15.505 5.21885 15.7064 5.83865 15.3146 6.12336L11.5633 8.84878C11.3881 8.9761 11.3148 9.20179 11.3817 9.4078L12.8145 13.8176C12.9642 14.2783 12.437 14.6613 12.0451 14.3766L8.29389 11.6512C8.11865 11.5239 7.88135 11.5239 7.70611 11.6512L3.95488 14.3766C3.56303 14.6613 3.03578 14.2783 3.18546 13.8176L4.6183 9.4078C4.68524 9.20179 4.61191 8.9761 4.43667 8.84878L0.685441 6.12336C0.293584 5.83866 0.494972 5.21885 0.979333 5.21885H5.6161C5.83272 5.21885 6.02469 5.07937 6.09163 4.87336L7.52447 0.463526Z" fill="#F2D909"></path>
                                                        </svg>
                                                        4.2/5
                                                    </td>
                                                    <td>@January 28, 2023</td>
                                                    <td>Published</td>
                                                    <td>
                                                        <div class="dropdown editList">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="editbtn13" data-bs-toggle="dropdown" aria-expanded="false">
                                                                ...
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="editbtn13">
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                                                                <tr>
                                                    <td>Sukriti Dadhich</td>
                                                    <td>
                                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7.52447 0.463526C7.67415 0.0028708 8.32585 0.00286996 8.47553 0.463525L9.90837 4.87336C9.97531 5.07937 10.1673 5.21885 10.3839 5.21885H15.0207C15.505 5.21885 15.7064 5.83865 15.3146 6.12336L11.5633 8.84878C11.3881 8.9761 11.3148 9.20179 11.3817 9.4078L12.8145 13.8176C12.9642 14.2783 12.437 14.6613 12.0451 14.3766L8.29389 11.6512C8.11865 11.5239 7.88135 11.5239 7.70611 11.6512L3.95488 14.3766C3.56303 14.6613 3.03578 14.2783 3.18546 13.8176L4.6183 9.4078C4.68524 9.20179 4.61191 8.9761 4.43667 8.84878L0.685441 6.12336C0.293584 5.83866 0.494972 5.21885 0.979333 5.21885H5.6161C5.83272 5.21885 6.02469 5.07937 6.09163 4.87336L7.52447 0.463526Z" fill="#F2D909"></path>
                                                        </svg>
                                                        4.2/5
                                                    </td>
                                                    <td>@January 28, 2023</td>
                                                    <td>Published</td>
                                                    <td>
                                                        <div class="dropdown editList">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="editbtn13" data-bs-toggle="dropdown" aria-expanded="false">
                                                                ...
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="editbtn13">
                                                                <a class="dropdown-item" href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                                                                                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="pagin-tion">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="totle-page">
                                                        <span>Showing 1 to 5 of 23 Entries</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="page-list">
                                                        <li class="Previous">
                                                            <span>
                                                                <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M0.697399 4.66803L5.29806 0.137668C5.48162 -0.0458899 5.77844 -0.0458899 5.962 0.137668L6.23929 0.414958C6.42284 0.598516 6.42284 0.895333 6.23929 1.07889L2.24397 5L6.23538 8.92111C6.41894 9.10467 6.41894 9.40148 6.23538 9.58504L5.95809 9.86233C5.77453 10.0459 5.47771 10.0459 5.29416 9.86233L0.693493 5.33197C0.513841 5.14841 0.513841 4.85159 0.697399 4.66803Z" fill="#1A1B29" fill-opacity="0.4"></path>
                                                                </svg>
                                                                Previous
                                                            </span>
                                                        </li>
                                                        <li class="active"><a href="#">1</a></li>
                                                        <li><a href="#">2</a></li>
                                                        <li><a href="#">3</a></li>
                                                        <li><a href="#">4</a></li>
                                                        <li><a href="#">5</a></li>
                                                        <li class="Next">
                                                            <span>
                                                                Next
                                                                <svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M0.697399 4.66803L5.29806 0.137668C5.48162 -0.0458899 5.77844 -0.0458899 5.962 0.137668L6.23929 0.414958C6.42284 0.598516 6.42284 0.895333 6.23929 1.07889L2.24397 5L6.23538 8.92111C6.41894 9.10467 6.41894 9.40148 6.23538 9.58504L5.95809 9.86233C5.77453 10.0459 5.47771 10.0459 5.29416 9.86233L0.693493 5.33197C0.513841 5.14841 0.513841 4.85159 0.697399 4.66803Z" fill="#1A1B29" fill-opacity="0.4"></path>
                                                                </svg>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </body>
  </template>
  

<script setup>
  import Sidebar from '../components/Sidebar.vue';
</script>