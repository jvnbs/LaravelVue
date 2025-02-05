<header id="header" class="header sticky-top">
    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:contact@example.com">contact@example.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+91 9785636485</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

            <!-- Language Dropdown Visible on All Screens -->
            <div class="language d-flex align-items-center ms-4">
                <div class="dropdown">
                    <select name="lang" id="lang" class="form-select form-select-sm"
                        onchange="window.location.href=this.value;">
                        <option value="{{ route('lang.switch', ['lang' => 'en']) }}"
                            {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                        <option value="{{ route('lang.switch', ['lang' => 'hi']) }}"
                            {{ app()->getLocale() == 'hi' ? 'selected' : '' }}>हिंदी</option>
                        <option value="{{ route('lang.switch', ['lang' => 'ar']) }}"
                            {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>العربية</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- End Top Bar -->

    <div class="branding d-flex align-items-cente">

        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('front.home') }}" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <h1 class="sitename">
                    <p>{{ __('messages.pti') }}</p>
                </h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('front.home') }}" class="active">{{ trans('messages.home') }}</a></li>
                    <li><a href="{{ route('front.about') }}">{{ trans('messages.about') }}</a></li>
                    <li><a href="{{ route('front.services') }}">{{ trans('messages.services') }}</a></li>
                    <li><a href="{{ route('front.portfolio') }}">{{ trans('messages.portfolio') }}</a></li>
                    <li><a href="{{ route('front.team') }}">{{ trans('messages.team') }}</a></li>
                    <!-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Dropdown 1</a></li>
                            <li><a href="#">Dropdown 2</a></li>
                            <li><a href="#">Dropdown 3</a></li>
                        </ul>
                    </li> -->
                    <li><a href="{{ route('front.contact') }}">{{ trans('messages.contact') }}</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>

    </div>

</header>


<style>
.language .form-select {
    background-color: #f8f9fa;
    border-radius: 25px;
    border: 1px solid #ccc;
    padding: 0.3rem 2rem;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.language .form-select:hover {
    border-color: #007bff;
    background-color: #e9ecef;
}

.language .form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
}
</style>