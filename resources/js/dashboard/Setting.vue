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
                            <div class="listing_header">
                                <div class="container Ac_Settings">
                                    <h2>Account Settings</h2>
                                    <div class="Profile">
                                        <h3>Profile</h3>
                                        <img
                                            src="http://0.0.0.0:9000/front/assets/images/Profile-img.png"
                                        />
                                    </div>
                                    <div class="Account_detail">
                                        <h5>Name</h5>
                                        <span>Demo</span>
                                        <button
                                            type="button"
                                            class="myProfileBtn"
                                            data-name="name"
                                            data-label="Update Name"
                                            data-content="Demo"
                                        >
                                            Update
                                        </button>
                                    </div>
                                    <div class="Account_detail">
                                        <h5>Phone Number</h5>
                                        <span></span>
                                        <button
                                            type="button"
                                            class="myProfileBtn"
                                            data-name="phone_no"
                                            data-label="Update Phone Number"
                                            data-content=""
                                        >
                                            Update
                                        </button>
                                    </div>
                                    <div class="Account_detail">
                                        <h5>Email</h5>
                                        <span>demo@gmail.com</span>
                                        <p>
                                            This email address will be used to
                                            log in to the ItBizHub system and
                                            all email alerts.
                                        </p>
                                    </div>
                                    <div class="Account_detail">
                                        <h5>Password</h5>
                                        <span>.......</span>
                                        <button
                                            type="button"
                                            class="myProfileBtn"
                                            data-name="password"
                                            data-label="Update Password"
                                            data-content=""
                                        >
                                            Update
                                        </button>
                                    </div>
                                    <div class="Linked-Accounts">
                                        <h4>Linked Accounts</h4>
                                        <img
                                            src="http://0.0.0.0:9000/front/assets/images/google-(1).png"
                                        />
                                        <span>Google</span>
                                    </div>
                                    <div class="About-you">
                                        <h3>About You</h3>
                                        <h4>Location</h4>
                                        <span></span>
                                        <button
                                            type="button"
                                            class="myProfileBtn"
                                            data-name="location"
                                            data-label="Change Location"
                                            data-content=""
                                        >
                                            Change
                                        </button>
                                    </div>
                                    <div class="Industry">
                                        <h4>Industry</h4>
                                        <p>
                                            Information Technology and Services
                                        </p>
                                    </div>
                                    <div class="Industry">
                                        <h4>Headline</h4>
                                        <p></p>
                                        <button
                                            type="button"
                                            class="myProfileBtn"
                                            data-name="headline"
                                            data-label="Update Headline"
                                            data-content=""
                                        >
                                            Update
                                        </button>
                                    </div>
                                    <div class="Bio">
                                        <h4>Bio</h4>
                                        <p></p>
                                        <button
                                            type="button"
                                            class="myProfileBtn"
                                            data-name="my_bio"
                                            data-label="Update Bio"
                                            data-content=""
                                        >
                                            Update
                                        </button>
                                    </div>
                                    <div class="Social-Media">
                                        <h3>Social Media</h3>
                                        <h4>Facebook</h4>
                                        <span
                                            ><img
                                                src="http://0.0.0.0:9000/front/assets/images/facebookIcon.png"
                                            />
                                            umesh bagri</span
                                        >
                                        <button
                                            type="button"
                                            class="myBtn"
                                            data-label="Social Media"
                                            data-content="Facebook"
                                        >
                                            Change
                                        </button>
                                    </div>
                                    <div class="Delete-account">
                                        <h3>Delete Account</h3>
                                        <p>
                                            Note: Are you sure you want to close
                                            your account? This account will no
                                            longer be available, and all your
                                            saved data will be permanently
                                            Deleted.
                                        </p>
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
import Sidebar from "../components/Sidebar.vue";
</script>
