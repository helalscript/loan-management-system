<?php

namespace App\Enums;

enum Section: string
{
    // ===== Home Page Sections =====
    case HeroSection = 'hero_section';
    case ServicesOverview = 'services_overview';
    case ServicesSection = 'services_section';
    case ServicesSectionContent = 'services_section_content';
    case AboutUs = 'about_us';
    case WorkProcess = 'work_process';
    case WorkProcessSection = 'work_process_section';
    case WorkProcessSectionContent = 'work_process_section_content';
    case QuickRateCheck = 'quick_rate_check';
    case Faq = 'faq';
    case TestimonialSection = 'testimonial_section';
    case TestimonialSectionContent = 'testimonial_section_content';
    case Footer = 'footer';
    case CustomText = 'custom_text';
    case FaqContainer = 'faq_container';
    case SocialLinkContainer = 'social_link_container';

    // ===== About Page Sections =====
    case OurStory = 'our_story';
    case OurVision = 'our_vision';
    case OurMission = 'our_mission';
    case HowItWorks = 'how_it_works';
    case OurServices = 'our_services';
    case LeadershipTeamSection = 'leadership_team_section';
    case LeadershipTeamSectionContent = 'leadership_team_section_content';
    case AboutFaqs = 'about_faqs'; // to differentiate from home page faq
    case AboutTestimonials = 'about_testimonials';
    case HowitWorksSection = 'howit_works_section';
    case HowitWorksSectionContent = 'howit_works_section_content';

    // ===== Resources Page Sections =====
    case LoanCalculatorSection = 'loan_calculator_section';
    case LoanCalculatorSectionContent = 'loan_calculator_section_content';
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

    case PageContentSection = 'page_content_section';
    case PageContentSectionContent = 'page_content_section_content';


}


