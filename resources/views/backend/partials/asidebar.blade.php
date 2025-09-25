{{-- @php
$systemSetting = App\Models\SystemSetting::first();
@endphp --}}
<!-- Start Sidebar Area -->
<div class="sidebar-area" id="sidebar-area">
    <div class="logo position-relative">
        <a href="{{ route('admin.dashboard') }}" class="d-block text-decoration-none position-relative">
            <img src="{{ asset($systemSetting->logo ?? 'backend/admin/assets/logo.png') }}" alt="logo-icon"
                style="height: 100px">
        </a>
        <button
            class="sidebar-burger-menu bg-transparent p-0 border-0 opacity-0 z-n1 position-absolute top-50 end-0 translate-middle-y"
            id="sidebar-burger-menu">
            <i data-feather="x"></i>
        </button>
    </div>

    <aside id="layout-menu" class="layout-menu menu-vertical menu active" data-simplebar
        style="height: calc(100vh - 100px)">
        <ul class="menu-inner">
            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">MAIN</span>
            </li>
            <!-- Dashboard Menu Item -->
            <li class="menu-item open">
                <a href="{{ route('admin.dashboard') }}"
                    class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">dashboard</span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">APPS</span>
            </li>
            <!-- Category Menu Item -->
            {{-- <li class="menu-item {{ request()->routeIs('candidates.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">group</span>
                    <span class="title">Candidate</span>
                </a>
                <ul class="menu-sub">
                    <!-- candidates Settings Submenu -->
                    <li class="menu-item ">
                        <a href="{{ route('candidates.index') }}"
                            class="menu-link {{ request()->routeIs('candidates.index') ? 'active' : '' }} ">
                            Candidate List
                        </a>
                    </li>

                </ul>
            </li> --}}

            <!-- Contact Support Message Menu Item -->
            <li class="menu-item open">
                <a href="{{ route('loan_packages.index') }}"
                    class="menu-link {{ request()->routeIs('loan_packages.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">content_paste</span>
                    <span class="title">Loan Packages</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('repayment_types.index') }}"
                    class="menu-link {{ request()->routeIs('repayment_types.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">event_repeat</span>
                    <span class="title">Repayment Types</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('package_cycles.index') }}"
                    class="menu-link {{ request()->routeIs('package_cycles.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">schedule</span>
                    <span class="title">Package Cycles</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('admin_contact_us.index') }}"
                    class="menu-link {{ request()->routeIs('admin_contact_us.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">content_paste</span>
                    <span class="title">Contact Message</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('faqs.index') }}"
                    class="menu-link {{ request()->routeIs('faqs.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">help_outline</span>
                    <span class="title">FAQ's</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('blogs.index') }}"
                    class="menu-link {{ request()->routeIs('blogs.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">book</span>
                    <span class="title">Blogs</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('cms.home_page.social_link.index') }}"
                    class="menu-link {{ request()->routeIs('cms.home_page.social_link.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">link</span>
                    <span class="title">Social Link</span>
                </a>
            </li>
            <li class="menu-item open">
                <a href="{{ route('cms.home_page.testimonial_section.index') }}"
                    class="menu-link {{ request()->routeIs('cms.home_page.testimonial_section.*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">stars</span>
                    <span class="title">Testimonials</span>
                </a>
            </li>
            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">OTHERS</span>
            </li>

            <!-- Settings Menu Item -->
            <li class="menu-item {{ request()->routeIs('profile_settings.*', 'system_settings.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">settings</span>
                    <span class="title">Settings</span>
                </a>
                <ul class="menu-sub">
                    <!-- Account Settings Submenu -->
                    <li class="menu-item ">
                        <a href="{{ route('profile_settings.index') }}"
                            class="menu-link {{ request()->routeIs('profile_settings.index') ? 'active' : '' }} ">
                            Profile Settings
                        </a>
                    </li>
                    <!-- Change Password Submenu -->
                    <li class="menu-item">
                        <a href="{{ route('profile_settings.password_change') }}"
                            class="menu-link {{ request()->routeIs('profile_settings.password_change') ? 'active' : '' }}">
                            Change Password
                        </a>
                    </li>
                    <!-- System Settings Configaration Submenu -->
                    <li class="menu-item">
                        <a href="{{ route('system_settings.index') }}"
                            class="menu-link {{ request()->routeIs('system_settings.*') ? 'active' : '' }}">
                            System Configaration
                        </a>
                    </li>

                </ul>
            </li>
            <!-- dynamic page Menu Item -->
            <li class="menu-item {{ request()->routeIs('dynamic_page.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">clarify</span>
                    <span class="title">Dynamic page</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('dynamic_page.index') }}"
                            class="menu-link {{ request()->routeIs('dynamic_page.index') ? 'active' : '' }}">
                            Pages
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('dynamic_page.create') }}"
                            class="menu-link {{ request()->routeIs('dynamic_page.create') ? 'active' : '' }}">
                            Add New
                        </a>
                    </li>

                </ul>
            </li>

            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">CMS</span>
            </li>

            <!-- CMS Home Page Menu Item -->
            <li class="menu-item {{ request()->routeIs('cms.home_page.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">home</span>
                    <span class="title">Home Page</span>
                </a>
                <ul class="menu-sub">
                    {{-- <li class="menu-item">
                        <a href="{{ route('cms.home_page.social_link.index') }}"
                            class="menu-link {{ request()->routeIs('cms.home_page.social_link.*') ? 'active' : '' }}">
                            Social Link
                        </a>
                    </li> --}}
                    <li class="menu-item">
                        <a href="{{ route('cms.home_page.hero_section.create') }}"
                            class="menu-link {{ request()->routeIs('cms.home_page.hero_section.create') ? 'active' : '' }}">
                            Hero Section
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('cms.home_page.services_section.index') }}"
                            class="menu-link {{ request()->routeIs('cms.home_page.services_section.*') ? 'active' : '' }}">
                            Services
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('cms.home_page.about_us_section.create') }}"
                            class="menu-link {{ request()->routeIs('cms.home_page.about_us_section.*') ? 'active' : '' }}">
                            About Us
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('cms.home_page.quick_rate_check_section.create') }}"
                            class="menu-link {{ request()->routeIs('cms.home_page.quick_rate_check_section.*') ? 'active' : '' }}">
                            Quick Rate Check
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('cms.home_page.work_process_section.index') }}"
                            class="menu-link {{ request()->routeIs('cms.home_page.work_process_section.*') ? 'active' : '' }}">
                            Work Process
                        </a>
                    </li>

                    {{-- <li class="menu-item">
                        <a href="{{ route('faqs.index') }}"
                            class="menu-link {{ request()->routeIs('faqs.*') ? 'active' : '' }}">
                            FAQ's
                        </a>
                    </li> --}}
                    {{-- <li class="menu-item">
                        <a href="{{ route('cms.home_page.testimonial_section.index') }}"
                            class="menu-link {{ request()->routeIs('cms.home_page.testimonial_section.*') ? 'active' : '' }}">
                            Testimonials
                        </a>
                    </li> --}}
                    <li class="menu-item">
                        <a href="{{ route('cms.home_page.custom_text_section.create') }}"
                            class="menu-link {{ request()->routeIs('cms.home_page.custom_text_section.*') ? 'active' : '' }}">
                            Custom Text
                        </a>
                    </li>

                </ul>
            </li>
            <!-- CMS About Page Menu Item -->
            <li class="menu-item {{ request()->routeIs('cms.about_page.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">auto_awesome</span>
                    <span class="title">About</span>
                </a>

                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.hero_section.create') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.hero_section.create') ? 'active' : '' }}">
                            Hero Section
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.our_vision.create') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.our_vision.*') ? 'active' : '' }}">
                            Our Vision
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.our_mission.create') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.our_mission.*') ? 'active' : '' }}">
                            Our Mission
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.how_it_works_section.index') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.how_it_works_section.*') ? 'active' : '' }}">
                            How It Works
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.our_services.create') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.our_services.*') ? 'active' : '' }}">
                            Our Services
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.leadership_teams_section.index') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.leadership_teams_section.*') ? 'active' : '' }}">
                            Leadership Team
                        </a>
                    </li>
                    {{-- <li class="menu-item">
                        <a href="{{ route('cms.about_page.faqs.create') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.faqs.*') ? 'active' : '' }}">
                            FAQ's
                        </a>
                    </li> --}}
                    {{-- <li class="menu-item">
                        <a href="{{ route('cms.about_page.testimonials.create') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.testimonials.*') ? 'active' : '' }}">
                            Testimonials
                        </a>
                    </li> --}}
                    <li class="menu-item">
                        <a href="{{ route('cms.about_page.custom_text_section.create') }}"
                            class="menu-link {{ request()->routeIs('cms.about_page.custom_text_section.*') ? 'active' : '' }}">
                            Custom Text
                        </a>
                    </li>
                </ul>
            </li>
            <!-- CMS Resources Page Menu Item -->
            <li class="menu-item {{ request()->routeIs('cms.resources_page.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">local_library</span>
                    <span class="title">Resources</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('cms.resources_page.hero_section.create') }}"
                            class="menu-link {{ request()->routeIs('cms.resources_page.hero_section.create') ? 'active' : '' }}">
                            Hero Section
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.resources_page.loan_calculator_section.index') }}"
                            class="menu-link {{ request()->routeIs('cms.resources_page.loan_calculator_section.*') ? 'active' : '' }}">
                            Loan Calculator
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.resources_page.ripe_credit_tracker_guide.create') }}"
                            class="menu-link {{ request()->routeIs('cms.resources_page.ripe_credit_tracker_guide.*') ? 'active' : '' }}">
                            RipeCredit Tracker Guide
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.resources_page.repayment_options.create') }}"
                            class="menu-link {{ request()->routeIs('cms.resources_page.repayment_options.*') ? 'active' : '' }}">
                            Repayment Options
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.resources_page.fees_policies.create') }}"
                            class="menu-link {{ request()->routeIs('cms.resources_page.fees_policies.*') ? 'active' : '' }}">
                            Fees & Policies
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.resources_page.security_privacy.create') }}"
                            class="menu-link {{ request()->routeIs('cms.resources_page.security_privacy.*') ? 'active' : '' }}">
                            Security & Privacy
                        </a>
                    </li>
                    {{-- <li class="menu-item">
                        <a href="{{ route('blogs.index') }}"
                            class="menu-link {{ request()->routeIs('blogs.*') ? 'active' : '' }}">
                            Blogs
                        </a>
                    </li> --}}
                </ul>
            </li>
            <!-- CMS State Lincensing Page Menu Item -->
            <li class="menu-item {{ request()->routeIs('cms.state_licensing_page.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">account_balance</span>
                    <span class="title">State Licensing Page</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('cms.state_licensing_page.hero_section.create') }}"
                            class="menu-link {{ request()->routeIs('cms.state_licensing_page.hero_section.*') ? 'active' : '' }}">
                            Hero Section
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.state_licensing_page.content_section.index') }}"
                            class="menu-link {{ request()->routeIs('cms.state_licensing_page.content_section.*') ? 'active' : '' }}">
                            Contact Section
                        </a>
                    </li>
                </ul>
            </li>

            {{-- <!-- CMS Contact Us Page Menu Item -->
            <li class="menu-item {{ request()->routeIs('cms.contact_us_page.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">contacts</span>
                    <span class="title">Contact Us</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('cms.contact_us_page.index') }}"
                            class="menu-link {{ request()->routeIs('cms.contact_us_page.index') ? 'active' : '' }}">
                            Contact Information
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.contact_us_page.form.create') }}"
                            class="menu-link {{ request()->routeIs('cms.contact_us_page.form.*') ? 'active' : '' }}">
                            Contact Form
                        </a>
                    </li>
                </ul>
            </li>
            <!-- CMS Auth Page Menu Item -->
            <li class="menu-item {{ request()->routeIs('cms.auth_page.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">fingerprint</span>
                    <span class="title">Auth</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ route('cms.auth_page.login.create') }}"
                            class="menu-link {{ request()->routeIs('cms.auth_page.login.*') ? 'active' : '' }}">
                            Login
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.auth_page.register.create') }}"
                            class="menu-link {{ request()->routeIs('cms.auth_page.register.*') ? 'active' : '' }}">
                            Register
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('cms.auth_page.forgot_password.create') }}"
                            class="menu-link {{ request()->routeIs('cms.auth_page.forgot_password.*') ? 'active' : '' }}">
                            Forgot Password
                        </a>
                    </li>
                </ul>
            </li> --}}

            <!-- Logout Menu Item -->
            <li class="menu-item">
                <a class="menu-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form-asidebar').submit();">
                    <span class="material-symbols-outlined menu-icon">logout</span>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
        <form id="logout-form-asidebar" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </aside>
</div>
<!-- End Sidebar Area -->
