<?php

namespace App\Http\Controllers\Web\Backend\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Models\CMS;
use Exception;
use Illuminate\Support\Facades\Log;

class AboutPageController extends Controller
{
    // ============== OUR STORY SECTION ==============
    public function getOurStory()
    {
        $data = CMS::where('page', Page::AboutPage->value)
            ->where('section', Section::OurStory->value)
            ->first();

        return view('backend.layouts.cms.about_page.our_story.create', compact('data'));
    }

    public function updateOurStory(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sub_description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'link_url' => 'nullable|url',
        ]);

        try {
            if ($request->hasFile('image')) {
                $validatedData['image'] = Helper::fileUpload(
                    $request->file('image'),
                    'about/our_story',
                    time() . '_' . getFileName($request->file('image'))
                );
            }

            CMS::updateOrCreate(
                [
                    'page' => Page::AboutPage->value,
                    'section' => Section::OurStory->value,
                ],
                $validatedData
            );

            return redirect()->route('cms.about_page.our_story.create')->with('success', 'Our Story Updated Successfully');
        } catch (Exception $e) {
            Log::error("AboutPageController::updateOurStory " . $e->getMessage());
            return redirect()->route('cms.about_page.our_story.create')->with('error', 'Our Story not Updated');
        }
    }


    // ============== OUR VISION SECTION ==============
    public function getOurVision()
    {
        $data = CMS::where('page', Page::AboutPage->value)
            ->where('section', Section::OurVision->value)
            ->first();

        return view('backend.layouts.cms.about_page.our_vision.create', compact('data'));
    }

    public function updateOurVision(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        CMS::updateOrCreate(
            [
                'page' => Page::AboutPage->value,
                'section' => Section::OurVision->value,
            ],
            $validatedData
        );

        return redirect()->route('cms.about_page.our_vision.create')->with('success', 'Our Vision Updated Successfully');
    }


    // ============== OUR MISSION SECTION ==============
    public function getOurMission()
    {
        $data = CMS::where('page', Page::AboutPage->value)
            ->where('section', Section::OurMission->value)
            ->first();

        return view('backend.layouts.cms.about_page.our_mission.create', compact('data'));
    }

    public function updateOurMission(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        CMS::updateOrCreate(
            [
                'page' => Page::AboutPage->value,
                'section' => Section::OurMission->value,
            ],
            $validatedData
        );

        return redirect()->route('cms.about_page.our_mission.create')->with('success', 'Our Mission Updated Successfully');
    }


    // ============== HOW IT WORKS SECTION ==============
    public function getHowItWorks()
    {
        $data = CMS::where('page', Page::AboutPage->value)
            ->where('section', Section::HowItWorks->value)
            ->first();

        return view('backend.layouts.cms.about_page.how_it_works.create', compact('data'));
    }

    public function updateHowItWorks(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'tags' => 'nullable|json', // for multiple steps
        ]);

        CMS::updateOrCreate(
            [
                'page' => Page::AboutPage->value,
                'section' => Section::HowItWorks->value,
            ],
            $validatedData
        );

        return redirect()->route('cms.about_page.how_it_works.create')->with('success', 'How It Works Updated Successfully');
    }


    // ============== OUR SERVICES SECTION ==============
    public function getOurServices()
    {
        $data = CMS::where('page', Page::AboutPage->value)
            ->where('section', Section::OurServices->value)
            ->first();

        return view('backend.layouts.cms.about_page.our_services.create', compact('data'));
    }

    public function updateOurServices(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'tags' => 'nullable|json', // for multiple services
        ]);

        CMS::updateOrCreate(
            [
                'page' => Page::AboutPage->value,
                'section' => Section::OurServices->value,
            ],
            $validatedData
        );

        return redirect()->route('cms.about_page.our_services.create')->with('success', 'Our Services Updated Successfully');
    }


    // ============== LEADERSHIP TEAM SECTION ==============
    public function getLeadershipTeam()
    {
        $data = CMS::where('page', Page::AboutPage->value)
            ->where('section', Section::LeadershipTeam->value)
            ->first();

        return view('backend.layouts.cms.about_page.leadership_team.create', compact('data'));
    }

    public function updateLeadershipTeam(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'tags' => 'nullable|json', // store team members
        ]);

        CMS::updateOrCreate(
            [
                'page' => Page::AboutPage->value,
                'section' => Section::LeadershipTeam->value,
            ],
            $validatedData
        );

        return redirect()->route('cms.about_page.leadership_team.create')->with('success', 'Leadership Team Updated Successfully');
    }


    // ============== FAQ SECTION ==============
    public function getFaqs()
    {
        $data = CMS::where('page', Page::AboutPage->value)
            ->where('section', Section::Faq->value)
            ->first();

        return view('backend.layouts.cms.about_page.faqs.create', compact('data'));
    }

    public function updateFaqs(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'tags' => 'nullable|json', // store multiple questions/answers
        ]);

        CMS::updateOrCreate(
            [
                'page' => Page::AboutPage->value,
                'section' => Section::Faq->value,
            ],
            $validatedData
        );

        return redirect()->route('cms.about_page.faqs.create')->with('success', 'FAQs Updated Successfully');
    }


    // ============== TESTIMONIALS SECTION ==============
    public function getTestimonials()
    {
        $data = CMS::where('page', Page::AboutPage->value)
            ->where('section', Section::Testimonials->value)
            ->first();

        return view('backend.layouts.cms.about_page.testimonials.create', compact('data'));
    }

    public function updateTestimonials(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'tags' => 'nullable|json', // store multiple testimonials
        ]);

        CMS::updateOrCreate(
            [
                'page' => Page::AboutPage->value,
                'section' => Section::Testimonials->value,
            ],
            $validatedData
        );

        return redirect()->route('cms.about_page.testimonials.create')->with('success', 'Testimonials Updated Successfully');
    }
}
