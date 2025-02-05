<template>
  <header class="site-header" id="site-header">
        <div class="navbar navbar-expand-lg">
            <div class="container">
                <router-link to="/" class="logo_container">
                    <img :src="'/front/itbizhubb-logo.png'" alt="icon">
                </router-link>
                <button class="navbar-toggler" type="button">
                    <span class="navbar-togglerIcon"></span>
                    <span class="navbar-togglerIcon"></span>
                    <span class="navbar-togglerIcon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main-nav">
                    <ul class="navbar-nav">
                        <li class="nav-item sub-menu">
                            <a class="nav-link" href="#">
                                Find Services
                            </a>

                            <ul class="category-menu-list" id="service-category">
                                <li class="category-menu">
                                    <button type="button" class="service-title">Software
                                        Development</button>
                                    <div class="mega-sub-menu">
                                        <ul>
                                            <li><a href="#">Custom Software Developers</a></li>
                                            <li><a href="#">React Development</a></li>
                                            <li><a href="#">AngularJS Development</a></li>
                                            <li><a href="#">NodeJS Development</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="category-menu">
                                    <button type="button" class="service-title">Web &amp; App
                                        Development</button>
                                    <div class="mega-sub-menu">
                                        <ul>
                                            <li><a href="#">Mobile App Development</a></li>
                                            <li><a href="#">Web Development</a></li>
                                            <li><a href="#">E-Commerce Development</a></li>
                                            <li><a href="#">Android App Development</a> </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="category-menu">
                                    <button type="button" class="service-title">Design</button>
                                    <div class="mega-sub-menu">
                                        <ul>
                                            <li><a href="#">Web Design</a></li>
                                            <li><a href="#">Graphic Design</a></li>
                                            <li><a href="#">UX Design</a></li>
                                            <li><a href="#">Animation &amp; Multimedia</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="category-menu">
                                    <button type="button" class="service-title">Marketing &amp;
                                        Advertising</button>
                                    <div class="mega-sub-menu">
                                        <ul>
                                            <li><a href="#">Digital Marketing</a></li>
                                            <li><a href="#">SEO Agencies</a></li>
                                            <li><a href="#">Advertising</a></li>
                                            <li><a href="#">Influencer Marketing</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="category-menu">
                                    <button type="button" class="service-title">Latest Tech</button>
                                    <div class="mega-sub-menu">
                                        <ul>
                                            <li><a href="#">Artificial Intelligence</a></li>
                                            <li><a href="#">AR &amp; VR Development</a></li>
                                            <li><a href="#">IoT Development</a></li>
                                            <li><a href="#">Metaverse Development</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="category-menu">
                                    <button type="button" class="service-title">Business &amp; IT
                                        Services</button>
                                    <div class="mega-sub-menu">
                                        <ul>
                                            <li><a href="#">IT Services</a></li>
                                            <li><a href="#">Big Data Companies</a></li>
                                            <li><a href="#">Implementation Services</a></li>
                                            <li><a href="#">Supply Chain &amp; Logistics</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-browse-all category-menu active-menu">
                                    <a href="listing.html" class="browse-all-menu-link">Browse all
                                        categories</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item sub-menu">
                            <a class="nav-link" href="#">
                                Find Software
                            </a>

                            <ul class="category-menu-list" id="software-category">
                                <li class="category-menu"><a class="category-menu-title" href="#">Accounting
                                        Software</a></li>
                                <li class="category-menu"><a class="category-menu-title" href="#">App
                                        Development Software</a></li>
                                <li class="category-menu"><a class="category-menu-title" href="#">CRM
                                        Software</a></li>
                                <li class="category-menu"><a class="category-menu-title" href="#">E-Commerce
                                        Software</a></li>
                                <li class="category-menu"><a class="category-menu-title" href="#">ERP
                                        Software</a></li>
                            </ul>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">How it Works</a>
                        </li>
                    </ul>
                </div>
                <div class="right-buttons d-flex">
                    <router-link to="/sign-up" class="btn">Log In</router-link>
                   
                    <router-link to="/dashboard" class="btn get_listing"> <svg xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" style="background: transparent;" width="20px"
                            height="20px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <circle cx="50" cy="50" r="11.5807" fill="none" stroke="currentColor" stroke-width="3">
                                <animate attributeName="r" repeatCount="indefinite" dur="1s" values="0;40"
                                    keyTimes="0;1" keySplines="0 0.2 0.8 1" calcMode="spline" begin="-0.5s" />
                                <animate attributeName="opacity" repeatCount="indefinite" dur="1s" values="1;0"
                                    keyTimes="0;1" keySplines="0.2 0 0.8 1" calcMode="spline" begin="-0.5s" />
                            </circle>
                            <circle cx="50" cy="50" r="31.896" fill="none" stroke="currentColor" stroke-width="3">
                                <animate attributeName="r" repeatCount="indefinite" dur="1s" values="0;40"
                                    keyTimes="0;1" keySplines="0 0.3 0.8 1" calcMode="spline" />
                                <animate attributeName="opacity" repeatCount="indefinite" dur="1s" values="1;0"
                                    keyTimes="0;1" keySplines="0.2 0 0.8 1" calcMode="spline" />
                            </circle>
                        </svg>
                        Get Listed</router-link>
                </div>
            </div>
        </div>
    </header>
</template>
