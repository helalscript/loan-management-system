<?php

namespace App\Http\Controllers\API\V1\CMS;

use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CMS;
use Exception;
use Illuminate\Support\Facades\Log;

class ResourcesPageController extends Controller
{
    public function getHeroSection()
    {
        try {
            $data = CMS::where('page', Page::ResourcesPage)
                ->where('section', Section::HeroSection)
                ->select('id', 'title', 'button_text', 'image')
                ->where('status', 'active')
                ->first();

            if (! $data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error('ResourcesPageController::getHeroSection'.$e->getMessage());

            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    public function getLoanCalculatorSectionSection()
    {
        try {
            $section = CMS::where([
                ['page', Page::ResourcesPage],
                ['section', Section::LoanCalculatorSection],
                ['status', 'active'],
            ])
                ->select('id', 'title', 'sub_title', 'description')
                ->first();

            $contents = CMS::where([
                ['page', Page::ResourcesPage],
                ['section', Section::LoanCalculatorSectionContent],
                ['status', 'active'],
            ])
                ->select('id', 'title', 'description')
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
            Log::error('ResourcesPageController::getFeatureSection - '.$e->getMessage());

            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    public function getRipeCreditTrackerGuideSection()
    {
        try {
            $data = CMS::where('page', Page::ResourcesPage)
                ->where('section', Section::RipeCreditTrackerGuide)
                ->select('id', 'title', 'sub_title', 'description', 'image')
                ->where('status', 'active')
                ->first();

            if (! $data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error('ResourcesPageController::getRipeCreditTrackerGuideSection'.$e->getMessage());

            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    public function getRepaymentOptionsSection()
    {
        try {
            $data = CMS::where('page', Page::ResourcesPage)
                ->where('section', Section::RepaymentOptions)
                ->select('id', 'title', 'sub_title', 'description')
                ->where('status', 'active')
                ->first();

            if (! $data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error('ResourcesPageController::getRepaymentOptionsSection'.$e->getMessage());

            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    public function getFeesPoliciesSection()
    {
        try {
            $data = CMS::where('page', Page::ResourcesPage)
                ->where('section', Section::FeesPolicies)
                ->select('id', 'title', 'description', 'image')
                ->where('status', 'active')
                ->first();

            if (! $data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error('ResourcesPageController::getFeesPoliciesSection'.$e->getMessage());

            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    public function getSecurityPrivacySection()
    {
        try {
            $data = CMS::where('page', Page::ResourcesPage)
                ->where('section', Section::SecurityPrivacy)
                ->select('id', 'title', 'description', 'image')
                ->where('status', 'active')
                ->first();

            if (! $data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            return Helper::jsonResponse(true, 'Data fatced successfully', 200, $data);
        } catch (Exception $e) {
            Log::error('ResourcesPageController::getSecurityPrivacySection'.$e->getMessage());

            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    public function getBlogsSection()
    {
        try {
            $section = CMS::where([
                ['page', Page::ResourcesPage],
                ['section', Section::Blogs],
                ['status', 'active'],
            ])
                ->select('id', 'title', 'sub_title')
                ->first();

            $contents = Blog::where('status', 'active')
                // ->select('id', 'title', 'description')
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
            Log::error('ResourcesPageController::getBlogsSection - '.$e->getMessage());

            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }

    public function getSingleBlog($slug)
    {
        try {
            $data = Blog::where('slug', $slug)
                ->where('status', 'active')
                ->first();

            if (! $data) {
                return Helper::jsonResponse(true, 'No data found', 200, []);
            }

            // Assuming your Blog model has a "tags" relation or "tags" column
            $tags = json_decode($data->tags, true) ?? [];

            if (! empty($tags)) {
                $relatedPosts = Blog::where('id', '!=', $data->id)
                    ->where('status', 'active')
                    ->where(function ($query) use ($tags) {
                        foreach ($tags as $tag) {
                            $query->orWhereJsonContains('tags', $tag);
                        }
                    })
                    ->latest()
                    ->take(5)
                    ->get();
            } else {
                $relatedPosts = collect(); // empty collection
            }

            // If no related posts, fetch recent posts
            if ($relatedPosts->isEmpty()) {
                $relatedPosts = Blog::where('id', '!=', $data->id)
                    ->select('id', 'title', 'slug', 'thumbnail', 'description', 'created_at')
                    ->where('status', 'active')
                    ->latest()
                    ->take(5)
                    ->get();
            }

            return Helper::jsonResponse(true, 'Data fetched successfully', 200, [
                'blog' => $data,
                'related_posts' => $relatedPosts,
            ]);
        } catch (Exception $e) {
            Log::error('ResourcesPageController::getSingleBlog '.$e->getMessage());

            return Helper::jsonErrorResponse('Something went wrong', 500);
        }
    }
}
