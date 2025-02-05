<template>
    <!-- Loader Section -->
    <div v-if="loading">
        <Loader />
    </div>

    <div v-else id="content" class="content">
        <div class="home-banner">
            <div class="banner_bg">
                <img :src="'/front/banner.png'" alt="icon" />
            </div>
            <div class="container">
                <div class="banner_content">
                    <h2>
                        <b>Hire the Best</b>
                        <span class="textUpdate"></span>
                    </h2>
                    <p>
                        Work with the best It company talent from around the
                        world. Our platform enables you to swiftly search and
                        find the perfect service provider for your needs.
                    </p>
                    <form class="search_form">
                        <div class="form-group" id="search-suggection">
                            <input
                                type="search"
                                id="form1"
                                class="form-control"
                                placeholder="What are you looking for?"
                            />

                            <button type="button" class="btn">
                                <svg
                                    width="14"
                                    height="14"
                                    viewBox="0 0 14 14"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M13.9036 12.8209L10.5842 9.50149C10.5214 9.4386 10.4393 9.40579 10.3518 9.40579H9.99092C10.8522 8.40779 11.3744 7.10903 11.3744 5.68722C11.3744 2.54558 8.82887 0 5.68722 0C2.54558 0 0 2.54558 0 5.68722C0 8.82887 2.54558 11.3744 5.68722 11.3744C7.10903 11.3744 8.40779 10.8522 9.40579 9.99092V10.3518C9.40579 10.4393 9.44134 10.5214 9.50149 10.5842L12.8209 13.9036C12.9494 14.0321 13.1572 14.0321 13.2857 13.9036L13.9036 13.2857C14.0321 13.1572 14.0321 12.9494 13.9036 12.8209ZM5.68722 10.062C3.27015 10.062 1.31244 8.10429 1.31244 5.68722C1.31244 3.27015 3.27015 1.31244 5.68722 1.31244C8.10429 1.31244 10.062 3.27015 10.062 5.68722C10.062 8.10429 8.10429 10.062 5.68722 10.062Z"
                                        fill="#3B5BE2"
                                        fill-opacity="0.8"
                                    />
                                </svg>
                            </button>
                        </div>

                        <ul class="searchTags">
                            <li><a href="#">Graphic Design</a></li>
                            <li><a href="#">Logo Design</a></li>
                            <li><a href="#">Wordpress</a></li>
                            <li><a href="#">Drupal</a></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>

        <div class="company-services">
            <div class="container">
                <div class="section_title">
                    <h2 class="h2_title">Browse Company by Services</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                    </p>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link active"
                                id="home-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#home"
                                type="button"
                                role="tab"
                                aria-controls="home"
                                aria-selected="true"
                            >
                                Find Services
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link"
                                id="profile-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#profile"
                                type="button"
                                role="tab"
                                aria-controls="profile"
                                aria-selected="false"
                            >
                                Find Software
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div
                        class="tab-pane fade show active"
                        id="home"
                        role="tabpanel"
                        aria-labelledby="home-tab"
                    >
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="service_block">
                                    <div class="s_icon">
                                        <img
                                            :src="'/front/icon1.png'"
                                            alt="icon"
                                        />
                                    </div>
                                    <h4>Web Development</h4>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="service_block">
                                    <div class="s_icon">
                                        <img
                                            :src="'/front/icon2.png'"
                                            alt="icon"
                                        />
                                    </div>
                                    <h4>Web Designing</h4>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="service_block">
                                    <div class="s_icon">
                                        <img
                                            :src="'/front/icon3.png'"
                                            alt="icon"
                                        />
                                    </div>
                                    <h4>Digital Marketing & Advertising</h4>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="service_block">
                                    <div class="s_icon">
                                        <img
                                            :src="'/front/icon4.png'"
                                            alt="icon"
                                        />
                                    </div>
                                    <h4>Mobile App Development</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="profile"
                        role="tabpanel"
                        aria-labelledby="profile-tab"
                    >
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="service_block">
                                    <div class="s_icon">
                                        <img
                                            :src="'/front/icon13.png'"
                                            alt="icon"
                                        />
                                    </div>
                                    <h4>Testing Software</h4>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="service_block">
                                    <div class="s_icon">
                                        <img
                                            :src="'/front/icon14.png'"
                                            alt="icon"
                                        />
                                    </div>
                                    <h4>
                                        Accounting Practice Management Software
                                    </h4>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="service_block">
                                    <div class="s_icon">
                                        <img
                                            :src="'/front/icon15.png'"
                                            alt="icon"
                                        />
                                    </div>
                                    <h4>Accounting Software</h4>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="service_block">
                                    <div class="s_icon">
                                        <img
                                            :src="'/front/icon16.png'"
                                            alt="icon"
                                        />
                                    </div>
                                    <h4>Accounts Payable Software</h4>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="service_block">
                                    <div class="s_icon">
                                        <img
                                            :src="'/front/icon17.png'"
                                            alt="icon"
                                        />
                                    </div>
                                    <h4>Admissions Software</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Show_all">
                    <a href="listing.html" class="btn"
                        >Browse all services
                        <svg
                            width="14"
                            height="14"
                            viewBox="0 0 14 14"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M7 14C10.8669 14 14 10.8669 14 7C14 3.13306 10.8669 0 7 0C3.13307 0 0 3.13306 0 7C0 10.8669 3.13307 14 7 14ZM3.72581 5.75806H7V3.75686C7 3.45484 7.36694 3.30242 7.57863 3.51694L10.8048 6.76008C10.9375 6.89274 10.9375 7.10443 10.8048 7.2371L7.57863 10.4802C7.36411 10.6948 7 10.5423 7 10.2403V8.24193H3.72581C3.53952 8.24193 3.3871 8.08952 3.3871 7.90323V6.09677C3.3871 5.91048 3.53952 5.75806 3.72581 5.75806Z"
                                fill="currentColor"
                            />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="best_agencies">
            <div class="container">
                <div
                    class="sec_bg"
                    style="background-image: url(front/banner2.png)"
                >
                    <span class="top_text">For clients</span>
                    <h2>Find Best Agencies From Worldwide</h2>
                    <p>
                        Explore and connect with top-notch agencies from around
                        the globe to find the best talent for your business
                        needs.
                    </p>
                    <ul class="bottom_list">
                        <li>
                            <a href="#" class="listItem">
                                <p>
                                    Search, Shortlist, Review and Contact Best
                                    Agencies
                                </p>
                                <span class="link_btn"
                                    >Search agencies
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
                                        />
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="listItem">
                                <p>Hire agency as per Your needs and terms</p>
                                <span class="link_btn"
                                    >Hire agency
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
                                        />
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="listItem">
                                <p>
                                    Not sure, Let us help you in finding the
                                    right agency
                                </p>
                                <span class="link_btn"
                                    >Find the right agency
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
                                        />
                                    </svg>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="quick_connect">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h3>Quick<span>Connect</span></h3>
                        <ul class="nav nav-tabs" id="quickTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link active"
                                    id="Software-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#Software"
                                    type="button"
                                    role="tab"
                                    aria-controls="Software"
                                    aria-selected="true"
                                >
                                    Best Software
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    id="Services-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#Services"
                                    type="button"
                                    role="tab"
                                    aria-controls="Services"
                                    aria-selected="false"
                                >
                                    Top IT Services
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    id="Trading-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#Trading"
                                    type="button"
                                    role="tab"
                                    aria-controls="Trading"
                                    aria-selected="false"
                                >
                                    Trading Skills
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7">
                        <div class="tab-content" id="quickTabContent">
                            <div
                                class="tab-pane fade show active"
                                id="Software"
                                role="tabpanel"
                                aria-labelledby="Software-tab"
                            >
                                <ul class="result_list">
                                    <li><a href="#">WordPress Developer</a></li>
                                    <li><a href="#">Logo Designer</a></li>
                                    <li><a href="#">Drupal Developer</a></li>
                                    <li><a href="#">Web Designer</a></li>
                                </ul>
                            </div>
                            <div
                                class="tab-pane fade"
                                id="Services"
                                role="tabpanel"
                                aria-labelledby="Services-tab"
                            >
                                <ul class="result_list">
                                    <li><a href="#">Logo Designer</a></li>
                                    <li><a href="#">Virtual Assistant</a></li>
                                    <li><a href="#">Java Developer</a></li>
                                    <li><a href="#">Web Designer</a></li>
                                </ul>
                            </div>
                            <div
                                class="tab-pane fade"
                                id="Trading"
                                role="tabpanel"
                                aria-labelledby="Trading-tab"
                            >
                                <ul class="result_list">
                                    <li><a href="#">WordPress Developer</a></li>
                                    <li><a href="#">Logo Designer</a></li>
                                    <li><a href="#">Java Developer</a></li>
                                    <li><a href="#">Web Designer</a></li>
                                </ul>
                            </div>
                            <div
                                class="tab-pane fade"
                                id="Locations"
                                role="tabpanel"
                                aria-labelledby="Locations-tab"
                            >
                                <ul class="result_list">
                                    <li>
                                        <a href="#">JavaScript Developer</a>
                                    </li>
                                    <li><a href="#">WordPress Developer</a></li>
                                    <li><a href="#">Technical Writer</a></li>
                                    <li><a href="#">Web Designer</a></li>
                                </ul>
                            </div>
                            <div
                                class="tab-pane fade"
                                id="Industries"
                                role="tabpanel"
                                aria-labelledby="Industries-tab"
                            >
                                <ul class="result_list">
                                    <li>
                                        <a href="#">Data Entry Specialists</a>
                                    </li>
                                    <li>
                                        <a href="#">JavaScript Developer</a>
                                    </li>
                                    <li><a href="#">WordPress Developer</a></li>
                                    <li><a href="#">Web Designer</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="find-great-clients">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="find-great-img">
                            <img
                                :src="'front/young-successfulbusinessman.png'"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="find-great-content">
                            <span>For Agency</span>
                            <h3>Find great <br />clients</h3>
                            <p>
                                Meet verified clients from all around the globe.
                                Let's list your company with ItBizHub and take
                                your business to new heights.
                            </p>
                            <div class="Show_all">
                                <a href="#" class="btn"
                                    >Get Listed
                                    <svg
                                        width="9"
                                        height="8"
                                        viewBox="0 0 9 8"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M8.41557 4.59159C8.61083 4.39633 8.61083 4.07975 8.41557 3.88448L5.23358 0.702503C5.03832 0.507241 4.72174 0.507241 4.52648 0.702503C4.33122 0.897765 4.33122 1.21435 4.52648 1.40961L7.35491 4.23804L4.52648 7.06646C4.33122 7.26173 4.33122 7.57831 4.52648 7.77357C4.72174 7.96883 5.03832 7.96883 5.23358 7.77357L8.41557 4.59159ZM0.0620117 4.73804H8.06201V3.73804H0.0620117V4.73804Z"
                                            fill="currentColor"
                                        />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Recent-reviews">
            <div class="container">
                <h2>Recent Reviews</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua.
                </p>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="review-box">
                            <p>
                                The client got exactly what they asked for: a
                                functional and well-designed site with all the
                                necessary features. Protocloud Technologies Pvt.
                                Ltd. was very reliable and efficient — they
                                address.
                            </p>
                            <h5>- Umesh Bagri , Manager, Flexibits</h5>
                            <img :src="'front/newLogo3.png'" />
                            <span>Ptiwebtech Technologies</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="review-box">
                            <p>
                                The client got exactly what they asked for: a
                                functional and well-designed site with all the
                                necessary features. Protocloud Technologies Pvt.
                                Ltd. was very reliable and efficient — they
                                address.
                            </p>
                            <h5>- Umesh Bagri , Manager, Flexibits</h5>
                            <img :src="'front/newLogo2.png'" />
                            <span>Trimurty Infotech</span>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="review-box">
                            <p>
                                The client got exactly what they asked for: a
                                functional and well-designed site with all the
                                necessary features. Protocloud Technologies Pvt.
                                Ltd. was very reliable and efficient — they
                                address.
                            </p>
                            <h5>- Umesh Bagri , Manager, Flexibits</h5>
                            <img :src="'front/newLogo1.png'" />
                            <span>JaipuriaGeeks</span>
                        </div>
                    </div>
                </div>
                <div class="Show_all">
                    <a href="#" class="btn"
                        >Browse all Reviews
                        <svg
                            width="14"
                            height="14"
                            viewBox="0 0 14 14"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M7 14C10.8669 14 14 10.8669 14 7C14 3.13306 10.8669 0 7 0C3.13307 0 0 3.13306 0 7C0 10.8669 3.13307 14 7 14ZM3.72581 5.75806H7V3.75686C7 3.45484 7.36694 3.30242 7.57863 3.51694L10.8048 6.76008C10.9375 6.89274 10.9375 7.10443 10.8048 7.2371L7.57863 10.4802C7.36411 10.6948 7 10.5423 7 10.2403V8.24193H3.72581C3.53952 8.24193 3.3871 8.08952 3.3871 7.90323V6.09677C3.3871 5.91048 3.53952 5.75806 3.72581 5.75806Z"
                                fill="currentColor"
                            ></path></svg
                    ></a>
                </div>
            </div>
        </div>

        <div class="Recent">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="Recent-heading">
                            <h3>Recent<span>Interviews</span></h3>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="Recent-profile">
                            <div class="pro-file">
                                <img :src="'front/profile-33.png'" />
                                <h4>
                                    Umesh Bagri <span>Manager, Flexibits</span>
                                </h4>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum
                                dolore eu fugiat nulla pariatur. Excepteur sint
                                occaecat cupidatat non proident, sunt in culpa
                                qui officia deserunt mollit anim id est laborum.
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam,
                            </p>
                            <div class="Show_all">
                                <a href="#" class="btn"
                                    >Full interview<svg
                                        width="9"
                                        height="8"
                                        viewBox="0 0 9 8"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M8.41557 4.59159C8.61083 4.39633 8.61083 4.07975 8.41557 3.88448L5.23358 0.702503C5.03832 0.507241 4.72174 0.507241 4.52648 0.702503C4.33122 0.897765 4.33122 1.21435 4.52648 1.40961L7.35491 4.23804L4.52648 7.06646C4.33122 7.26173 4.33122 7.57831 4.52648 7.77357C4.72174 7.96883 5.03832 7.96883 5.23358 7.77357L8.41557 4.59159ZM0.0620117 4.73804H8.06201V3.73804H0.0620117V4.73804Z"
                                            fill="currentColor"
                                        /></svg
                                ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Show_all view-more">
                    <a href="#" class="btn"
                        >View More Interviews
                        <svg
                            width="14"
                            height="14"
                            viewBox="0 0 14 14"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M7 14C10.8669 14 14 10.8669 14 7C14 3.13306 10.8669 0 7 0C3.13307 0 0 3.13306 0 7C0 10.8669 3.13307 14 7 14ZM3.72581 5.75806H7V3.75686C7 3.45484 7.36694 3.30242 7.57863 3.51694L10.8048 6.76008C10.9375 6.89274 10.9375 7.10443 10.8048 7.2371L7.57863 10.4802C7.36411 10.6948 7 10.5423 7 10.2403V8.24193H3.72581C3.53952 8.24193 3.3871 8.08952 3.3871 7.90323V6.09677C3.3871 5.91048 3.53952 5.75806 3.72581 5.75806Z"
                                fill="currentColor"
                            ></path></svg
                    ></a>
                </div>
            </div>
        </div>

        <div class="trusted">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <li>
                                <h3>Trusted By</h3>
                            </li>
                            <li>
                                <a href="#"
                                    ><img :src="'front/shopify_partne.png'"
                                /></a>
                            </li>
                            <li>
                                <a href="#"
                                    ><img :src="'front/amazon-logo.png'"
                                /></a>
                            </li>
                            <li>
                                <a href="#"
                                    ><img
                                        :src="'front/acquia-partner-ptiwebtech.png'"
                                /></a>
                            </li>
                            <li>
                                <a href="#"
                                    ><img :src="'front/cisco-ptiwebtech.png'"
                                /></a>
                            </li>
                            <li>
                                <a href="#"
                                    ><img
                                        :src="'front/redhat-certified-partner-ptiwebtech.png'"
                                /></a>
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
        Loader, // Include the loader component
    },
    data() {
        return {
            loading: true, // Start with loading state as true
        };
    },
    async mounted() {
        // Simulate loading time (replace with actual data fetching)
        await this.fetchData();
    },
    methods: {
        async fetchData() {
            // Simulate a fetch request or any async operation
            setTimeout(() => {
                this.loading = false; // Set loading to false after 2 seconds (simulate data load)
            }, 1000);
        },
    },
};
</script>
