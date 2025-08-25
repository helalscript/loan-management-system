<?php

namespace App\Enums;

enum Section: string
{
    // ===== Home Page Sections =====
    case HeroSection = 'hero_section';
    case ServicesOverview = 'services_overview';
    case WorkProcess = 'work_process';
    case Faq = 'faq';
    case Testimonials = 'testimonials';
    case Footer = 'footer';

    // ===== About Page Sections =====
    case OurStory = 'our_story';
    case OurVision = 'our_vision';
    case OurMission = 'our_mission';
    case HowItWorks = 'how_it_works';
    case OurServices = 'our_services';
    case LeadershipTeam = 'leadership_team';
    case AboutFaqs = 'faqs'; // to differentiate from home page faq
    case AboutTestimonials = 'testimonials';

    // ===== Resources Page Sections =====
    case LoanCalculator = 'loan_calculator';
    case RipeCreditTrackerGuide = 'ripe_credit_tracker_guide';
    case RepaymentOptions = 'repayment_options';
    case FeesPolicies = 'fees_policies';
    case SecurityPrivacy = 'security_privacy';
    case Faqs = 'faqs';
    case Blogs = 'blogs';

    // ===== Contact Us Page Sections =====
    case Main = 'main';
    case Form = 'form';

    // ===== Auth Page Sections =====
    case Login = 'login';
    case Register = 'register';
    case ForgotPassword = 'forgot_password';


}


