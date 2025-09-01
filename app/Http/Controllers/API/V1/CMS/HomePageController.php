<?php

namespace App\Http\Controllers\API\V1\CMS;

use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\CMS\GetFeatureSectionResource;
use App\Models\CMS;
use App\Models\DynamicPage;
use App\Models\Faq;
use App\Models\SystemSetting;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomePageController extends Controller
{


    /**
     * Retrieves the system information, which includes the system name, logo, favicon, copyright text,
     * description, contact number, address, and email.
     *
     * @param Request $request The incoming request instance.
     * @return \Illuminate\Http\JsonResponse A JSON response containing the system information or an error message.
     */
    public function getSystemInfo(Request $request): JsonResponse
    {
        try {
            $data = SystemSetting::select('id', 'system_name', 'logo', 'favicon', 'copyright_text', 'address', 'company_open_hour', 'description', 'contact_number', 'address', 'email')->first();
            return Helper::jsonResponse(true, 'System data fetched successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("HomePageController::getSystemInfo" . $e->getMessage());
            return Helper::jsonErrorResponse('Failed to retrieve System', 403);
        }
    }

    /**
     * Retrieves a paginated list of active dynamic pages.
     *
     * This method fetches dynamic pages that are marked as active, including
     * their ID, title, and slug. If the request contains a 'per_page' parameter,
     * it uses that value for pagination; otherwise, it defaults to 25 items per
     * page. Returns a JSON response with the paginated data or an error message
     * in case of failure.
     *
     * @param Request $request The incoming request instance.
     * @return \Illuminate\Http\JsonResponse A JSON response with the dynamic pages data or an error message.
     */

    public function getDynamicPages(Request $request): JsonResponse
    {
        try {
            // Get 'per_page' from the request or default to 25
            $per_page = $request->has('per_page') ? $request->per_page : 25;
            $dynamicPages = DynamicPage::where('status', 'active')->select('id', 'page_title', 'page_slug')->paginate($per_page);
            if (!$dynamicPages) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }
            return Helper::jsonResponse(true, 'Dynamic pages retrieved successfully.', 200, $dynamicPages, true);
        } catch (Exception $e) {
            return Helper::jsonErrorResponse('Failed to retrieve Dynamic pages data.', 403);
        }
    }
    /**
     * Retrieves a dynamic page by its slug.
     *
     * This method fetches a dynamic page based on its slug, including the ID,
     * title, slug, content, and status. If the page is not found or is not
     * active, it returns a JSON response with an error message and a status
     * code of 403.
     *
     * @param string $page_slug The slug of the dynamic page to retrieve.
     * @return \Illuminate\Http\JsonResponse A JSON response with the dynamic
     * page data or an error message.
     */
    public function showDaynamicPage($page_slug): JsonResponse
    {
        try {
            $page = DynamicPage::where('page_slug', $page_slug)->where('status', 'active')->firstOrFail();
            if (!$page) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }
            return Helper::jsonResponse(true, 'Dynamic page retrieved successfully.', 200, $page);
        } catch (Exception $e) {
            return Helper::jsonErrorResponse('Failed to retrieve Dynamic page data.', 403);
        }
    }


    public function getHeroSection()
    {
        try {
            $data = CMS::select('id', 'title')
                ->where('page', Page::HomePage)
                ->where('section', Section::HeroSection)
                ->where('status', 'active')
                ->first();

            if (!$data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("HomePageController::getHeroSection" . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }
    public function getWelcomeSection()
    {
        try {
            $data = CMS::where('page', Page::HomePage)
                ->where('section', Section::WelcomeSection)
                ->where('status', 'active')
                ->select('id', 'title', 'sub_title', 'sub_description', 'image')
                ->first();

            if (!$data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("HomePageController::getHeroSection" . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }
    public function getEmployerSection()
    {
        try {
            $data = CMS::where('page', Page::HomePage)
                ->where('section', Section::EmployerSection)
                ->where('status', 'active')
                ->select('id', 'title', 'sub_title', 'sub_description', 'image', 'button_text')
                ->first();

            if (!$data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("HomePageController::getHeroSection" . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    public function getHowItWorkSection()
    {
        try {
            $section = CMS::select('id', 'title', 'button_text')
                ->where([
                    ['page', Page::HomePage],
                    ['section', Section::HowitWorksSection],
                    ['status', 'active']
                ])
                ->first();

            $contents = CMS::select('id', 'title', 'description', 'image')
                ->where([
                    ['page', Page::HomePage],
                    ['section', Section::HowitWorksSectionContent],
                    ['status', 'active']
                ])
                ->get();

            // Use Laravel Collection to pass data
            $data = collect([
                'id' => $section->id,
                'section_title' => $section->title,
                'button_text' => $section->button_text ?? 'View More',
                'contents' => $contents,
            ]);

            return Helper::jsonResponse(true, 'Data fetched successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("HomePageController::getFeatureSection - " . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    public function getJobSeekerSection()
    {
        try {
            $data = CMS::where('page', Page::HomePage)
                ->where('section', Section::JobSeekersSection)
                ->where('status', 'active')
                ->select('id', 'title', 'sub_title', 'sub_description', 'image', 'button_text')
                ->first();

            if (!$data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("HomePageController::getJobSeekerSection" . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    public function getOurExpertiseSection()
    {
        try {
            $section = CMS::select('id', 'title', 'description')
                ->where([
                    ['page', Page::HomePage],
                    ['section', Section::OurExpertiseSection],
                    ['status', 'active']
                ])
                ->first();

            $contents = CMS::select('id', 'title', 'image')
                ->where([
                    ['page', Page::HomePage],
                    ['section', Section::OurExpertiseContent],
                    ['status', 'active']
                ])
                ->get();

            // Use Laravel Collection to pass data
            $data = collect([
                'id' => $section->id,
                'section_title' => $section->title,
                'contents' => $contents,
            ]);

            return Helper::jsonResponse(true, 'Data fetched successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("HomePageController::getOurExpertiseSection - " . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }
    public function getWhyChooseUsSection()
    {
        try {
            $section = CMS::select('id', 'sub_title', 'sub_description')
                ->where([
                    ['page', Page::HomePage],
                    ['section', Section::WhyChooseUsSection],
                    ['status', 'active']
                ])
                ->first();

            $contents = CMS::select('id', 'title', 'description')
                ->where([
                    ['page', Page::HomePage],
                    ['section', Section::WhyChooseUsContent],
                    ['status', 'active']
                ])
                ->get();

            // Use Laravel Collection to pass data
            $data = collect([
                'id' => $section->id,
                // 'title' => $section->title,
                // 'description' => $section->description,
                'sub_title' => $section->sub_title,
                'sub_description' => $section->sub_description,
                'contents' => $contents,
            ]);

            return Helper::jsonResponse(true, 'Data fetched successfully', 200, $data);
        } catch (Exception $e) {
            Log::error("HomePageController::getWhyChooseUsSection - " . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }
}
