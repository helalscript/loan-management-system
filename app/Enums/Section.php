<?php

namespace App\Enums;

enum Section: string
{
    // Home page section 

    case HeroSection = 'hero_section';

    case WelcomeSection = 'welcome_section';
    case EmployerSection = 'employer_section';
    case HowitWorksSection = 'howitworks_section';
    case HowitWorksSectionContent = 'howitworks_section_content';
    case JobSeekersSection = 'jobseekers_section';
    case OurExpertiseSection = 'our_expertise_section';
    case OurExpertiseContent = 'our_expertise_content';
    case WhyChooseUsSection = 'why_choose_us_section';
    case WhyChooseUsContent = 'why_choose_us_content';

    // Employer page section

    case WhyUseSection = 'why_use_section';
    case OurHiringFlowSection = 'our_hiring_section';
    case OurHiringFlowContent = 'our_hiring_content';
 

    // Jobseeker page section
    case WhyJoinSection = 'why_join_section';
    case JoinWithUsSection = 'join_with_us_section';
    case GetInTouchSection = 'get_in_touch_section';
    case ContentSection = 'content_section';


}


