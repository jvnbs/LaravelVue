<template>
  <div class="container Security">
    <h2>Security</h2>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button
          class="nav-link active"
          id="overview-tab"
          data-bs-toggle="tab"
          data-bs-target="#overview"
          type="button"
          role="tab"
          aria-controls="overview"
          aria-selected="true"
        >
          Overview
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button
          class="nav-link"
          id="two-step-tab"
          data-bs-toggle="tab"
          data-bs-target="#two-step"
          type="button"
          role="tab"
          aria-controls="two-step"
          aria-selected="false"
          tabindex="-1"
        >
          Two-Step Verification
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button
          class="nav-link"
          id="devices-tab"
          data-bs-toggle="tab"
          data-bs-target="#devices"
          type="button"
          role="tab"
          aria-controls="devices"
          aria-selected="false"
          tabindex="-1"
        >
          Devices
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button
          class="nav-link"
          id="activity-tab"
          data-bs-toggle="tab"
          data-bs-target="#activity"
          type="button"
          role="tab"
          aria-controls="activity"
          aria-selected="false"
          tabindex="-1"
        >
          Recent Activity
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button
          class="nav-link"
          id="privacy-tab"
          data-bs-toggle="tab"
          data-bs-target="#privacy"
          type="button"
          role="tab"
          aria-controls="privacy"
          aria-selected="false"
          tabindex="-1"
        >
          Privacy
        </button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div
        class="tab-pane fade show active"
        id="overview"
        role="tabpanel"
        aria-labelledby="overview-tab"
      >
        <div class="security_overview">
          <h3>Overview</h3>
          <p>
            Manage your devices and review recent activity to help keep your account
            secure.
          </p>
          <ul>
            <li>Registered email</li>
            <li>
              ptiweb.ux@gmail.com
              <span>
                <svg
                  width="11"
                  height="8"
                  viewBox="0 0 11 8"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M9.66356 0.079853L3.68694 6.05648L1.49091 3.86045C1.38443 3.75398 1.2118 3.75398 1.10531 3.86045L0.462666 4.50309C0.356195 4.60956 0.356195 4.78219 0.462666 4.88869L3.49413 7.92015C3.6006 8.02662 3.77323 8.02662 3.87972 7.92015L10.6918 1.10809C10.7983 1.00162 10.7983 0.828987 10.6918 0.722494L10.0491 0.079853C9.94267 -0.0266177 9.77003 -0.0266177 9.66356 0.079853Z"
                    fill="#33F3BD"
                  ></path>
                </svg>
                Verified
              </span>
            </li>
            <li>Two-step verification</li>
            <li>Signed in using Google</li>
          </ul>
        </div>
        <div class="devices">
          <h3>Devices</h3>
          <p>
            You are signed in to your ItBizHub account on the following devices:<span
              class="sig_out"
              ><a href="#">Sign out on all devices</a></span
            >
          </p>
          <div class="devices_img">
            <img src="assets/windows-icon.png" />
            <h4>
              Windows · India, Jaipur<span
                >Chrome · <small class="this-d">THIS DEVICE</small></span
              >
            </h4>
          </div>
          <a href="#">
            See all device session
            <svg
              width="6"
              height="9"
              viewBox="0 0 6 9"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M5.2663 4.59174L1.58577 8.21604C1.43892 8.36288 1.20147 8.36288 1.05462 8.21604L0.832791 7.99421C0.685945 7.84736 0.685945 7.60991 0.832791 7.46306L4.02904 4.32617L0.835915 1.18928C0.689069 1.04244 0.689069 0.804985 0.835915 0.658138L1.05775 0.436307C1.20459 0.28946 1.44205 0.28946 1.58889 0.436307L5.26942 4.0606C5.41315 4.20745 5.41315 4.4449 5.2663 4.59174Z"
                fill="#1A1B29"
                fill-opacity="0.6"
              ></path>
            </svg>
          </a>
        </div>
        <div class="recent_activity">
          <h3>Recent Activity</h3>
          <p>View your account activity on all of your devices for the last 60 days.</p>
          <table class="table">
            <tbody>
              <tr>
                <th>DATE</th>
                <th>ACTIVITY</th>
                <th>OS</th>
                <th>LOCATION</th>
              </tr>
              <tr>
                <td>2 hours ago</td>
                <td>Signed Up</td>
                <td>Windows</td>
                <td>India, Jaipur</td>
              </tr>
            </tbody>
          </table>
          <a href="#">
            See all device session
            <svg
              width="6"
              height="9"
              viewBox="0 0 6 9"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M5.2663 4.59174L1.58577 8.21604C1.43892 8.36288 1.20147 8.36288 1.05462 8.21604L0.832791 7.99421C0.685945 7.84736 0.685945 7.60991 0.832791 7.46306L4.02904 4.32617L0.835915 1.18928C0.689069 1.04244 0.689069 0.804985 0.835915 0.658138L1.05775 0.436307C1.20459 0.28946 1.44205 0.28946 1.58889 0.436307L5.26942 4.0606C5.41315 4.20745 5.41315 4.4449 5.2663 4.59174Z"
                fill="#1A1B29"
                fill-opacity="0.6"
              ></path>
            </svg>
          </a>
        </div>
        <div class="report">
          <h3>Privacy</h3>
          <p>
            Your trust is important to us. We go to great lengths to ensure your data is
            private and secure. Learn more.
          </p>
        </div>
        <div class="report">
          <h3>Personal Data Report</h3>
          <p>
            Request a personal data report to view the personal data associated with your
            account.
            <a href="#">Submit Request</a>
          </p>
        </div>
        <div class="report trust">
          <h3>Trust Center</h3>
          <p>
            Read about our user-first approach to privacy and security on our Trust
            Center.
          </p>
        </div>
      </div>
      <div
        class="tab-pane fade"
        id="two-step"
        role="tabpanel"
        aria-labelledby="two-step-tab"
      >
        <div class="security_overview Two-Step_Verification">
          <h3>Two-Step Verification</h3>
          <p>
            Since you signed up with Google, visit your Google account settings to turn on
            two-step verification.
          </p>
        </div>
      </div>
      <div
        class="tab-pane fade"
        id="devices"
        role="tabpanel"
        aria-labelledby="devices-tab"
      >
        <div class="devices Your_devices">
          <h3>Your devices</h3>
          <p>
            You are signed in to your ItBizHub account on the following devices:<span
              class="sig_out"
              ><a href="#">Sign out on all devices</a></span
            >
          </p>
          <div class="devices_img">
            <img src="assets/windows-icon.png" />
            <h4>
              Windows · India, Jaipur<span
                >Chrome · <small class="this-d">THIS DEVICE</small></span
              >
            </h4>
          </div>
          <a href="#">
            See all device session
            <svg
              width="6"
              height="9"
              viewBox="0 0 6 9"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M5.2663 4.59174L1.58577 8.21604C1.43892 8.36288 1.20147 8.36288 1.05462 8.21604L0.832791 7.99421C0.685945 7.84736 0.685945 7.60991 0.832791 7.46306L4.02904 4.32617L0.835915 1.18928C0.689069 1.04244 0.689069 0.804985 0.835915 0.658138L1.05775 0.436307C1.20459 0.28946 1.44205 0.28946 1.58889 0.436307L5.26942 4.0606C5.41315 4.20745 5.41315 4.4449 5.2663 4.59174Z"
                fill="#1A1B29"
                fill-opacity="0.6"
              ></path>
            </svg>
          </a>
        </div>
      </div>
      <div
        class="tab-pane fade"
        id="activity"
        role="tabpanel"
        aria-labelledby="activity-tab"
      >
        <div class="recent_activity recent_data">
          <h3>Recent Activity</h3>
          <p>View your account activity on all of your devices for the last 60 days.</p>
          <table class="table">
            <tbody>
              <tr>
                <th>DATE</th>
                <th>ACTIVITY</th>
                <th>OS</th>
                <th>LOCATION</th>
              </tr>
              <tr>
                <td>2 hours ago</td>
                <td>Signed Up</td>
                <td>Windows</td>
                <td>India, Jaipur</td>
              </tr>
            </tbody>
          </table>
          <a href="#">
            See all device session
            <svg
              width="6"
              height="9"
              viewBox="0 0 6 9"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M5.2663 4.59174L1.58577 8.21604C1.43892 8.36288 1.20147 8.36288 1.05462 8.21604L0.832791 7.99421C0.685945 7.84736 0.685945 7.60991 0.832791 7.46306L4.02904 4.32617L0.835915 1.18928C0.689069 1.04244 0.689069 0.804985 0.835915 0.658138L1.05775 0.436307C1.20459 0.28946 1.44205 0.28946 1.58889 0.436307L5.26942 4.0606C5.41315 4.20745 5.41315 4.4449 5.2663 4.59174Z"
                fill="#1A1B29"
                fill-opacity="0.6"
              ></path>
            </svg>
          </a>
        </div>
      </div>
      <div
        class="tab-pane fade"
        id="privacy"
        role="tabpanel"
        aria-labelledby="privacy-tab"
      >
        <div class="Privacy">
          <div class="report vacy">
            <h3>Privacy</h3>
            <p>
              Your trust is important to us. We go to great lengths to ensure your data is
              private and secure. Learn more.
            </p>
          </div>
          <div class="report">
            <h3>Personal Data Report</h3>
            <p>
              Request a personal data report to view the personal data associated with
              your account.
              <a href="#">Submit Request</a>
            </p>
          </div>
          <div class="report">
            <h3>Trust Center</h3>
            <p>
              Read about our user-first approach to privacy and security on our Trust
              Center.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup></script>
