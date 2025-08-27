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
    // ============== HERO SECTION ==============
    public function getHeroSection()
    {
        $data = CMS::where('page', Page::AboutPage->value)
            ->where('section', Section::HeroSection->value)
            ->first();

        return view('backend.layouts.cms.about_page.hero_section.create', compact('data'));
    }

    public function updateHeroSection(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => 'nullable|string|max:255',
        //     'description' => 'nullable|string',
        //     'button_text' => 'nullable|string|max:255',
        //     'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        // ]);
        $validatedData = $this->validateRequest($request);
        try {
            $data = CMS::where('page', Page::AboutPage->value)
                ->where('section', Section::HeroSection->value)
                ->first();

            if ($request->hasFile('image')) {
                if ($data && $data->image && file_exists(public_path($data->image))) {
                    Helper::fileDelete(public_path($data->image));
                }
                $validatedData['image'] = Helper::fileUpload(
                    $request->file('image'),
                    'hero_section',
                    time() . '_' . getFileName($request->file('image'))
                );
            }

            CMS::updateOrCreate(
                [
                    'page' => Page::AboutPage->value,
                    'section' => Section::HeroSection->value,
                ],
                $validatedData
            );

            return redirect()->route('cms.about_page.hero_section.create')
                ->with('success', 'Services Overview Updated Successfully');
        } catch (\Exception $e) {
            Log::error("AboutPageController::updateHeroSection " . $e->getMessage());
            return redirect()->route('cms.about_page.hero_section.create')
                ->with('error', 'Services Overview Not Updated');
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);
        $data = CMS::where('page', Page::AboutPage->value)
            ->where('section', Section::OurServices->value)
            ->first();

        if ($request->hasFile('image')) {
            if ($data && $data->image && file_exists(public_path($data->image))) {
                Helper::fileDelete(public_path($data->image));
            }
            $validatedData['image'] = Helper::fileUpload(
                $request->file('image'),
                'hero_section',
                time() . '_' . getFileName($request->file('image'))
            );
        }
        CMS::updateOrCreate(
            [
                'page' => Page::AboutPage->value,
                'section' => Section::OurServices->value,
            ],
            $validatedData
        );

        return redirect()->route('cms.about_page.our_services.create')->with('success', 'Our Services Updated Successfully');
    }
    public function getCustomText()
    {
        $data = CMS::where('page', Page::AboutPage->value)
            ->where('section', Section::CustomText->value)
            ->first();
        return view('backend.layouts.cms.about_page.custom_text.create', compact('data'));
    }

    public function updateCustomText(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => 'nullable|string|max:255',
        //     'sub_title' => 'nullable|string|max:255',
        //     'description' => 'nullable|string',
        //     'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        // ]);

        $validatedData = $this->validateRequest($request);
        try {
            $data = CMS::where('page', Page::AboutPage->value)
                ->where('section', Section::CustomText->value)
                ->first();
            if ($request->hasFile('image')) {
                if ($data && $data->image && file_exists(public_path($data->image))) {
                    Helper::fileDelete(public_path($data->image));
                }
                $validatedData['image'] = Helper::fileUpload(
                    $request->file('image'),
                    'services_overview',
                    time() . '_' . getFileName($request->file('image'))
                );
            }
            CMS::updateOrCreate(
                [
                    'page' => Page::AboutPage->value,
                    'section' => Section::CustomText->value,
                ],
                $validatedData
            );

            return redirect()->route('cms.about_page.custom_text_section.create')
                ->with('success', 'Work Process Updated Successfully');
        } catch (\Exception $e) {
            Log::error("AboutPageController::updateCustomText " . $e->getMessage());
            return redirect()->route('cms.about_page.custom_text_section.create')
                ->with('error', 'Work Process Not Updated');
        }
    }


    // // ============== FAQ SECTION ==============
    // public function getFaqs()
    // {
    //     $data = CMS::where('page', Page::AboutPage->value)
    //         ->where('section', Section::Faq->value)
    //         ->first();

    //     return view('backend.layouts.cms.about_page.faqs.create', compact('data'));
    // }

    // public function updateFaqs(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'nullable|string|max:255',
    //         'tags' => 'nullable|json', // store multiple questions/answers
    //     ]);

    //     CMS::updateOrCreate(
    //         [
    //             'page' => Page::AboutPage->value,
    //             'section' => Section::Faq->value,
    //         ],
    //         $validatedData
    //     );

    //     return redirect()->route('cms.about_page.faqs.create')->with('success', 'FAQs Updated Successfully');
    // }


    // // ============== TESTIMONIALS SECTION ==============
    // public function getTestimonials()
    // {
    //     $data = CMS::where('page', Page::AboutPage->value)
    //         ->where('section', Section::Testimonials->value)
    //         ->first();

    //     return view('backend.layouts.cms.about_page.testimonials.create', compact('data'));
    // }

    // public function updateTestimonials(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'nullable|string|max:255',
    //         'tags' => 'nullable|json', // store multiple testimonials
    //     ]);

    //     CMS::updateOrCreate(
    //         [
    //             'page' => Page::AboutPage->value,
    //             'section' => Section::Testimonials->value,
    //         ],
    //         $validatedData
    //     );

    //     return redirect()->route('cms.about_page.testimonials.create')->with('success', 'Testimonials Updated Successfully');
    // }


    // ================= Helper Functions =================
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sub_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'tags' => 'nullable|json',
            'button_text' => 'nullable|string|max:255',
            'link_url' => 'nullable|url',
        ]);
    }
}
