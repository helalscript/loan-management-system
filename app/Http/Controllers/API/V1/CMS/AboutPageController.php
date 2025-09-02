<?php

namespace App\Http\Controllers\API\V1\CMS;

use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AboutPageController extends Controller
{
    public function getHeroSection()
    {
        try {
            $data = CMS::where('page', Page::AboutPage)
                ->where('section', Section::HeroSection)
                ->select('id', 'title', 'sub_title', 'description', 'button_text', 'image')
                ->where('status', 'active')
                ->first();

            if (!$data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("AboutPageController::getHeroSection" . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }
    public function getOurVisionSection()
    {
        try {
            $data = CMS::where('page', Page::AboutPage)
                ->where('section', Section::OurVision)
                ->select('id', 'title', 'sub_title', 'description','image')
                ->where('status', 'active')
                ->first();

            if (!$data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("AboutPageController::getHeroSection" . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }
    public function getOurMissionSection()
    {
        try {
            $data = CMS::where('page', Page::AboutPage)
                ->where('section', Section::OurMission)
                ->select('id', 'title', 'sub_title', 'description','image')
                ->where('status', 'active')
                ->first();

            if (!$data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("AboutPageController::getHeroSection" . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    public function getHowitWorksSectionSection()
    {
        try {
            $section = CMS::where([
                ['page', Page::AboutPage],
                ['section', Section::HowitWorksSection],
                ['status', 'active']
            ])
                ->select('id', 'title', 'sub_title','description')
                ->first();

            $contents = CMS::where([
                ['page', Page::AboutPage],
                ['section', Section::HowitWorksSectionContent],
                ['status', 'active']
            ])
                ->select('id', 'title', 'description', 'image')
                ->get();

            // Use Laravel Collection to pass data
            $data = collect([
                'id' => $section->id,
                'section_title' => $section->title,
                'title' => $section->sub_title,
                'description' => $section->description,
                'contents' => $contents,
            ]);

            return Helper::jsonResponse(true, 'Data fetched successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("AboutPageController::getFeatureSection - " . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

     public function getOurServicesSection()
    {
        try {
            $data = CMS::where('page', Page::AboutPage)
                ->where('section', Section::OurServices)
                ->select('id', 'title', 'description','image')
                ->where('status', 'active')
                ->first();

            if (!$data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("AboutPageController::getHeroSection" . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }
    public function getLeadershipTeamSectionSection()
    {
        try {
            $section = CMS::where([
                ['page', Page::AboutPage],
                ['section', Section::LeadershipTeamSection],
                ['status', 'active']
            ])
                ->select('id', 'title', 'sub_title')
                ->first();

            $contents = CMS::where([
                ['page', Page::AboutPage],
                ['section', Section::LeadershipTeamSectionContent],
                ['status', 'active']
            ])
                ->select('id', 'title', 'description', 'image')
                ->get();

            // Use Laravel Collection to pass data
            $data = collect([
                'id' => $section->id,
                'section_title' => $section->title,
                'title' => $section->sub_title,
                'contents' => $contents,
            ]);

            return Helper::jsonResponse(true, 'Data fetched successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("AboutPageController::getFeatureSection - " . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }
     public function getCustomTextSection()
    {
        try {
            $data = CMS::where('page', Page::AboutPage)
                ->where('section', Section::CustomText)
                ->where('status', 'active')
                ->select('id', 'description')
                ->first();

            if (!$data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("AboutPageController::getJobSeekerSection" . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }
}
