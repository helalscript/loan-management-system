<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('c_m_s')->insert([
            // ['page' => 'about_page', 'section' => 'success_story_container_content', 'title' => 'Driving real results', 'sub_title' => NULL, 'image' => 'uploads/success_story/1752732798-1752732798-image-12.png', 'background_image' => NULL, 'description' => 'We’re committed to building ATS-friendly resumes and actionable tools that connect users with real opportunities, ensuring they land interviews and achieve their career aspirations.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-07-17 06:13:18'), 'updated_at' => Carbon::parse('2025-07-17 06:13:18')],
            ['id' => '1', 'page' => 'home_page', 'section' => 'hero_section', 'title' => 'Access a Curated Talent Bank of Exceptional Candidates', 'sub_title' => NULL, 'image' => NULL, 'background_image' => NULL, 'description' => NULL, 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:38:41'), 'updated_at' => Carbon::parse('2025-08-02 12:38:41')],
            [
                'id' => '2',
                'page' => 'home_page',
                'section' => 'welcome_section',
                'title' => 'Welcome to Clevr Fox',
                'sub_title' => 'Purposeful hiring. Exceptional talent. Real results',
                'image' => 'uploads/trust_section/1754116776-1754116776-pexels-a-darmel-8133880-1.png',
                'background_image' => NULL,
                'description' => 'Purposeful hiring. Exceptional talent. Real results.',
                'sub_description' => 'At Clevr Fox, we’ve reimagined recruitment to work better for everyone. For employers, we deliver direct access to high-calibre, pre-vetted professionals — cutting out the noise and guesswork. 

For candidates, we offer a discreet way to be seen by top-tier firms across insurance, finance, and professional services — without the pressure of the traditional job hunt.

Whether you’re building a team or planning your next career move, we make the process faster, smarter, and more human.',
                'button_text' => NULL,
                'link_url' => NULL,
                'tags' => NULL,
                'status' => 'active',
                'created_at' => Carbon::parse('2025-08-02 12:39:36'),
                'updated_at' => Carbon::parse('2025-08-02 12:39:36')
            ],
            [
                'id' => '3',
                'page' => 'home_page',
                'section' => 'employer_section',
                'title' => 'For Employers',
                'sub_title' => 'Your Shortcut to Exceptional Hires',
                'image' => 'uploads/trust_section/1754116967-1754116967-image-13.png',
                'background_image' => NULL,
                'description' => 'Top talent. Less time. No hassle',
                'sub_description' => 'We simplify hiring by giving exclusive access to a private pool of pre-qualified, high-calibre candidates.

Skip the inefficiencies of traditional recruitment — no job ads, no resume overload. Instead, explore a carefully selected shortlist of professionals who have been vetted for their skills, experience, and cultural fit.

When someone stands out, we facilitate the introduction so you can move straight to interviews and secure the right hire — quickly and confidently.

Top talent. Less time. No hassle',
                'button_text' => 'View More',
                'link_url' => NULL,
                'tags' => NULL,
                'status' => 'active',
                'created_at' => Carbon::parse('2025-08-02 12:42:47'),
                'updated_at' => Carbon::parse('2025-08-02 12:43:13')
            ],
            ['id' => '4', 'page' => 'home_page', 'section' => 'howitworks_section', 'title' => 'How it Works', 'sub_title' => NULL, 'image' => NULL, 'background_image' => NULL, 'description' => 'Check out how it works', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:43:40'), 'updated_at' => Carbon::parse('2025-08-02 12:43:40')],
            ['id' => '5', 'page' => 'home_page', 'section' => 'howitworks_section_content', 'title' => 'Access Our Private Talent Bank', 'sub_title' => NULL, 'image' => 'uploads/how_it_work/1754117048-1754117048.png', 'background_image' => NULL, 'description' => 'Unlock an exclusive talent pool of high-performing candidates, available on demand when you’re ready to hire.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:44:08'), 'updated_at' => Carbon::parse('2025-08-02 12:44:08')],
            ['id' => '6', 'page' => 'home_page', 'section' => 'howitworks_section_content', 'title' => 'Review Curated Profiles', 'sub_title' => NULL, 'image' => 'uploads/how_it_work/1754117072-1754117072.png', 'background_image' => NULL, 'description' => 'Each candidate is thoroughly screened by our team. We present only those who meet your specific criteria — so you\'re not wasting time on unqualified options.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:44:32'), 'updated_at' => Carbon::parse('2025-08-02 12:44:32')],
            ['id' => '7', 'page' => 'home_page', 'section' => 'howitworks_section_content', 'title' => 'Select & Connect', 'sub_title' => NULL, 'image' => 'uploads/how_it_work/1754117092-1754117092.png', 'background_image' => NULL, 'description' => 'Shortlist the profiles that best match your needs. With one click, request an introduction and we’ll handle the rest.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:44:52'), 'updated_at' => Carbon::parse('2025-08-02 12:44:52')],
            ['id' => '8', 'page' => 'home_page', 'section' => 'howitworks_section_content', 'title' => 'Interview & Hire Faster', 'sub_title' => NULL, 'image' => 'uploads/how_it_work/1754117106-1754117106.png', 'background_image' => NULL, 'description' => 'Skip straight to final-stage conversations with top-tier talent. We streamline the process so you can make great hires without delay.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:45:06'), 'updated_at' => Carbon::parse('2025-08-02 12:45:06')],
            [
                'id' => '9',
                'page' => 'home_page',
                'section' => 'jobseekers_section',
                'title' => 'For Job Seekers',
                'sub_title' => 'Your next move — simplified, strategic, and on your terms.',
                'image' => 'uploads/trust_section/1754117194-1754117194-image-14.png',
                'background_image' => NULL,
                'description' => 'Your next move made simpler.',
                'sub_description' => 'Tired of job boards, cold applications, and recruiters who disappear after one email? At Clevr Fox, we do things differently.

We connect experienced professionals with Ireland’s top employers in insurance, finance, and professional services — without the noise of traditional job searching. By joining our private talent network, you’ll be seen by decision-makers who are actively hiring and genuinely interested in your background.

Once vetted, your anonymised profile is added to our exclusive panel — a select group of high-calibre professionals hiring managers browse when they’re ready to move quickly. We’ll only share your details with your permission, and only when a role truly aligns with your goals.

No spam. No chasing. No guesswork.
Just real opportunities, meaningful introductions, and a hiring process built around your value.',
                'button_text' => 'View More',
                'link_url' => NULL,
                'tags' => NULL,
                'status' => 'active',
                'created_at' => Carbon::parse('2025-08-02 12:46:34'),
                'updated_at' => Carbon::parse('2025-08-02 12:46:34')
            ],
            ['id' => '10', 'page' => 'home_page', 'section' => 'our_expertise_section', 'title' => 'Our Areas of Expertise', 'sub_title' => NULL, 'image' => NULL, 'background_image' => NULL, 'description' => 'Check out how it works', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:46:51'), 'updated_at' => Carbon::parse('2025-08-02 12:46:51')],
            ['id' => '11', 'page' => 'home_page', 'section' => 'our_expertise_content', 'title' => 'Commercial & General Insurance', 'sub_title' => NULL, 'image' => 'uploads/our_expertise/1754117246-1754117246-image-36.png', 'background_image' => NULL, 'description' => NULL, 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:47:26'), 'updated_at' => Carbon::parse('2025-08-02 12:47:26')],
            ['id' => '12', 'page' => 'home_page', 'section' => 'our_expertise_content', 'title' => 'Financial Planning & Wealth Management', 'sub_title' => NULL, 'image' => 'uploads/our_expertise/1754117258-1754117258-image-37.png', 'background_image' => NULL, 'description' => NULL, 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:47:38'), 'updated_at' => Carbon::parse('2025-08-02 12:47:38')],
            ['id' => '13', 'page' => 'home_page', 'section' => 'our_expertise_content', 'title' => 'Mortgage Broking', 'sub_title' => NULL, 'image' => 'uploads/our_expertise/1754117366-1754117366-image-15.png', 'background_image' => NULL, 'description' => NULL, 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:49:26'), 'updated_at' => Carbon::parse('2025-08-02 12:49:26')],
            ['id' => '14', 'page' => 'home_page', 'section' => 'our_expertise_content', 'title' => 'Employee Benefits', 'sub_title' => NULL, 'image' => 'uploads/our_expertise/1754117377-1754117377-image-39.png', 'background_image' => NULL, 'description' => NULL, 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:49:37'), 'updated_at' => Carbon::parse('2025-08-02 12:49:37')],
            ['id' => '15', 'page' => 'home_page', 'section' => 'our_expertise_content', 'title' => 'Administration', 'sub_title' => NULL, 'image' => 'uploads/our_expertise/1754117391-1754117391-image-40.png', 'background_image' => NULL, 'description' => NULL, 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:49:51'), 'updated_at' => Carbon::parse('2025-08-02 12:49:51')],
            ['id' => '16', 'page' => 'home_page', 'section' => 'our_expertise_content', 'title' => 'Paraplanning', 'sub_title' => NULL, 'image' => 'uploads/our_expertise/1754117398-1754117398-image-41.png', 'background_image' => NULL, 'description' => NULL, 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:49:58'), 'updated_at' => Carbon::parse('2025-08-02 12:49:58')],
            ['id' => '17', 'page' => 'home_page', 'section' => 'our_expertise_content', 'title' => 'Accountancy', 'sub_title' => NULL, 'image' => 'uploads/our_expertise/1754117407-1754117407-image-42.png', 'background_image' => NULL, 'description' => NULL, 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:50:07'), 'updated_at' => Carbon::parse('2025-08-02 12:50:07')],
            ['id' => '18', 'page' => 'home_page', 'section' => 'our_expertise_content', 'title' => 'Tax', 'sub_title' => NULL, 'image' => 'uploads/our_expertise/1754117415-1754117415-image-43.png', 'background_image' => NULL, 'description' => NULL, 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:50:15'), 'updated_at' => Carbon::parse('2025-08-02 12:50:15')],
            ['id' => '19', 'page' => 'home_page', 'section' => 'why_choose_us_section', 'title' => 'Why Choose Clevr Fox', 'sub_title' => 'Recruitment Built on Real-World Experience!', 'image' => NULL, 'background_image' => NULL, 'description' => 'Recruitment Built on Real-World Experience!', 'sub_description' => 'At Clevr Fox Recruitment, we combine practical industry expertise with a relationship-driven approach to deliver exceptional results. What sets us apart is our firsthand understanding of the sectors we work in.', 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:50:49'), 'updated_at' => Carbon::parse('2025-08-02 12:50:49')],
            ['id' => '20', 'page' => 'home_page', 'section' => 'why_choose_us_content', 'title' => 'Deep Industry Insight', 'sub_title' => NULL, 'image' => NULL, 'background_image' => NULL, 'description' => 'With experience in the roles we recruit for, we know what it takes to succeed in your field.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:51:04'), 'updated_at' => Carbon::parse('2025-08-02 12:51:04')],
            ['id' => '21', 'page' => 'home_page', 'section' => 'why_choose_us_content', 'title' => 'Genuine Partnerships', 'sub_title' => NULL, 'image' => NULL, 'background_image' => NULL, 'description' => 'We build trust and respect with every employer and job seeker, creating lasting connections', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:51:14'), 'updated_at' => Carbon::parse('2025-08-02 12:51:14')],
            ['id' => '22', 'page' => 'home_page', 'section' => 'why_choose_us_content', 'title' => 'Customized Solutions', 'sub_title' => NULL, 'image' => NULL, 'background_image' => NULL, 'description' => 'Our tailored approach ensures that both employers and job seekers achieve their goals.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:51:31'), 'updated_at' => Carbon::parse('2025-08-02 12:51:31')],
            ['id' => '23', 'page' => 'employer_page', 'section' => 'hero_section', 'title' => 'Employers', 'sub_title' => NULL, 'image' => NULL, 'background_image' => NULL, 'description' => 'Building strong, lasting partnerships to achieve shared goals and success.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:51:53'), 'updated_at' => Carbon::parse('2025-08-02 12:51:53')],
            [
                'id' => '24',
                'page' => 'employer_page',
                'section' => 'why_use_section',
                'title' => 'Why Use Our Talent Network?',
                'sub_title' => 'Smarter Hiring. Faster Results. Zero Recruitment Fatigue.',
                'image' => 'uploads/why_use_section/1754117542-1754117542-image-16.png',
                'background_image' => NULL,
                'description' => 'Clevr Fox Recruitment partners with some of Ireland’s most respected firms across wealth management, financial planning, commercial and general insurance, mortgage broking, accountancy, and tax.

Our Talent Panel is your direct line to top-tier professionals in these sectors — all pre-screened, interview-ready, and open to the right move. No sifting through stacks of CVs. Just high-impact candidates, ready when you are.',
                'sub_description' => NULL,
                'button_text' => NULL,
                'link_url' => NULL,
                'tags' => NULL,
                'status' => 'active',
                'created_at' => Carbon::parse('2025-08-02 12:52:22'),
                'updated_at' => Carbon::parse('2025-08-02 12:52:22')
            ],
            [
                'id' => '25',
                'page' => 'employer_page',
                'section' => 'why_choose_us_section',
                'title' => 'Why Leading Firms Choose Us',
                'sub_title' => 'Smarter Hiring. Faster Results. Zero Recruitment Fatigue.',
                'image' => 'uploads/why_choose_us_section/1754117737-1754117737-image-17.png',
                'background_image' => NULL,
                'description' => 'On-demand access to high-quality, vetted talent
Faster hiring cycles — only view/meet candidates who are pre-qualified
Improved retention through better candidate fit
Engaged professionals actively open to new roles
No upfront commitment — flexible and efficient',
                'sub_description' => NULL,
                'button_text' => NULL,
                'link_url' => NULL,
                'tags' => NULL,
                'status' => 'active',
                'created_at' => Carbon::parse('2025-08-02 12:55:37'),
                'updated_at' => Carbon::parse('2025-08-02 12:55:37')
            ],
            ['id' => '26', 'page' => 'employer_page', 'section' => 'our_hiring_section', 'title' => 'Our Hiring Flow – Simple & Streamlined', 'sub_title' => NULL, 'image' => NULL, 'background_image' => NULL, 'description' => 'Say goodbye to generic recruitment. Say hello to targeted, high conversion hiring.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:55:58'), 'updated_at' => Carbon::parse('2025-08-02 12:55:58')],
            ['id' => '27', 'page' => 'employer_page', 'section' => 'our_hiring_content', 'title' => 'Tap into the Talent Panel', 'sub_title' => NULL, 'image' => 'uploads/our_expertise/1754117782-1754117782.png', 'background_image' => NULL, 'description' => 'Browse a curated group of professionals selected for their performance, potential, and fit.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:56:22'), 'updated_at' => Carbon::parse('2025-08-02 12:56:22')],
            ['id' => '28', 'page' => 'employer_page', 'section' => 'our_hiring_content', 'title' => 'View Tailored Profiles', 'sub_title' => NULL, 'image' => 'uploads/our_expertise/1754117797-1754117797.png', 'background_image' => NULL, 'description' => 'Skip to the good part — we’ve done the vetting. You get profiles that already match your expectations.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:56:37'), 'updated_at' => Carbon::parse('2025-08-02 12:56:37')],
            ['id' => '29', 'page' => 'employer_page', 'section' => 'our_hiring_content', 'title' => 'Express Interest', 'sub_title' => NULL, 'image' => 'uploads/our_expertise/1754117809-1754117809.png', 'background_image' => NULL, 'description' => 'Let us know who you’d like to connect with — we handle all the outreach and scheduling.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:56:49'), 'updated_at' => Carbon::parse('2025-08-02 12:56:49')],
            ['id' => '30', 'page' => 'employer_page', 'section' => 'our_hiring_content', 'title' => 'Interview & Hire', 'sub_title' => NULL, 'image' => 'uploads/our_expertise/1754117830-1754117830.png', 'background_image' => NULL, 'description' => 'Jump straight to final-stage conversations with serious, skilled candidates. Save time and secure the right fit faster.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:57:10'), 'updated_at' => Carbon::parse('2025-08-02 12:57:10')],
            ['id' => '31', 'page' => 'employer_page', 'section' => 'get_in_touch_section', 'title' => 'Have questions or need support?', 'sub_title' => 'Get in touch', 'image' => 'uploads/get_in_touch_section/1754117862-1754117862-pexels-kampus-8428066-1.png', 'background_image' => NULL, 'description' => 'Whether you\'re a recruiter looking for guidance or just exploring our platform, feel free to reach out anytime.', 'sub_description' => 'Our friendly team would love to hear from you.', 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:57:42'), 'updated_at' => Carbon::parse('2025-08-02 12:57:42')],
            ['id' => '32', 'page' => 'jobseeker_page', 'section' => 'hero_section', 'title' => 'Job Seekers', 'sub_title' => NULL, 'image' => NULL, 'background_image' => NULL, 'description' => 'Building strong, lasting partnerships to achieve shared goals and success.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 12:58:03'), 'updated_at' => Carbon::parse('2025-08-02 12:58:03')],
            [
                'id' => '33',
                'page' => 'jobseeker_page',
                'section' => 'why_join_section',
                'title' => 'Why Join Our Talent Bank?',
                'sub_title' => 'Be Seen by Top Employers. Get Hired Faster.',
                'image' => 'uploads/why_use_section/1754117956-1754117956-image-18.png',
                'background_image' => NULL,
                'description' => 'If you\'re an experienced professional and want access to the best career opportunities — often before they’re even advertised — we invite you to join our exclusive talent panel.

We partner with leading companies across wealth management, financial planning, commercial/general insurance, mortgage broking, accountancy, and tax — organisations that value quality talent and act fast when the right person comes along.

When you join our panel, you\'re not just another CV in a pile — your part of a carefully curated group that hiring managers want to see.',
                'sub_description' => NULL,
                'button_text' => NULL,
                'link_url' => NULL,
                'tags' => NULL,
                'status' => 'active',
                'created_at' => Carbon::parse('2025-08-02 12:59:16'),
                'updated_at' => Carbon::parse('2025-08-02 12:59:16')
            ],
            [
                'id' => '34',
                'page' => 'jobseeker_page',
                'section' => 'join_with_us_section',
                'title' => 'Why Join with us?',
                'sub_title' => 'Why Candidates Love Clavr Fox',
                'image' => 'uploads/why_use_section/1754117981-1754117981-image-19.png',
                'background_image' => NULL,
                'description' => '✅ Be visible to top employers in your sector who are actively hiring.
✅ One simple vetting process — gain access to multiple companies at once.
✅ Stay anonymous — your profile is only shared with your consent.
✅ Protected from your current employer — they will not see your profile.
✅ Signal your interest discreetly — let employers know you\'re open to conversations without committing to a move.
✅ Access hidden opportunities — get early access to roles never publicly advertised.
✅ 100% free for candidates — no cost, no risk, just opportunities',
                'sub_description' => NULL,
                'button_text' => NULL,
                'link_url' => NULL,
                'tags' => NULL,
                'status' => 'active',
                'created_at' => Carbon::parse('2025-08-02 12:59:41'),
                'updated_at' => Carbon::parse('2025-08-02 12:59:41')
            ],
            ['id' => '35', 'page' => 'jobseeker_page', 'section' => 'howitworks_section', 'title' => 'How It Works', 'sub_title' => 'Let better opportunities come to you — no noise, no pressure.', 'image' => 'uploads/how_it_work_section/1754122408-1754122408-image-20.png', 'background_image' => NULL, 'description' => 'How it works for you!!', 'sub_description' => 'We start with a short, confidential screening call. Once vetted, your anonymised profile is added to our private talent pool. If a company expresses interest, we’ll check with you before making an introduction.', 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 14:13:28'), 'updated_at' => Carbon::parse('2025-08-02 14:13:28')],
            ['id' => '36', 'page' => 'jobseeker_page', 'section' => 'get_in_touch_section', 'title' => 'Reach out today to join our Talent Bank!', 'sub_title' => 'Get in touch', 'image' => 'uploads/get_in_touch_section/1754122443-1754122443-image-21.png', 'background_image' => NULL, 'description' => 'Whether you\'re a recruiter looking for guidance or just exploring our platform, feel free to reach out anytime.', 'sub_description' => 'Our friendly team would love to hear from you.', 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 14:14:03'), 'updated_at' => Carbon::parse('2025-08-02 14:14:03')],
            ['id' => '37', 'page' => 'contact_us_page', 'section' => 'hero_section', 'title' => 'Contact Us', 'sub_title' => NULL, 'image' => NULL, 'background_image' => NULL, 'description' => 'Building strong, lasting partnerships to achieve shared goals and success.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 14:14:24'), 'updated_at' => Carbon::parse('2025-08-02 14:14:52')],
            ['id' => '38', 'page' => 'contact_us_page', 'section' => 'get_in_touch_section', 'title' => 'Have questions or need support? We’re here to help.', 'sub_title' => 'Get in touch', 'image' => 'uploads/get_in_touch_section/1754123100-1754123100-image-22.png', 'background_image' => NULL, 'description' => 'Whether you\'re a recruiter looking for guidance or just exploring our platform, feel free to reach out anytime.', 'sub_description' => 'Our friendly team would love to hear from you.', 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 14:25:00'), 'updated_at' => Carbon::parse('2025-08-02 14:25:00')],
            ['id' => '39', 'page' => 'privacy_policy_page', 'section' => 'hero_section', 'title' => 'Privacy Policy', 'sub_title' => NULL, 'image' => NULL, 'background_image' => NULL, 'description' => 'Building strong, lasting partnerships to achieve shared goals and success.', 'sub_description' => '<h2>1. Introduction</h2><p><br>This Privacy Policy explains how we collect, use, disclose, and protect your personal information when you use the Signage Booking Website ShaShh.</p><h2><br>2. Information We Collect</h2><p>We collect information that you provide to us when you create an account, make a booking, or upload content. This may include your name, email address, payment information, and any other information you choose to provide.<br>&nbsp;</p><h2>3. Use of Information</h2><p>We use the information we collect to provide and improve our services, process payments, communicate with you, and for other customer service purposes. We may also use your information for marketing and promotional purposes.</p><h2>​4. Disclosure of Information</h2><p>We may disclose your information to third parties in the following circumstances:<br>To service providers who perform services on our behalf.<br>To comply with legal obligations.<br>To protect our rights and property.</p><h2>5. Security</h2><p>We take reasonable measures to protect your personal information from unauthorized access, use, or disclosure. However, no internet-based service can be completely secure, and we cannot guarantee the absolute security of your information.</p><h2>6. Your Rights</h2><p>You have the right to access, correct, or delete your personal information. You can exercise these rights by contacting us at&nbsp;<a href="mailto:support@shashh.com">support@shashh.com</a></p><h2>7. Changes to Privacy Policy</h2><p>We may update this Privacy Policy from time to time. Any changes will be posted on the App, and your continued use of the App after such changes have been posted will constitute your acceptance of the changes.</p>', 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 14:29:07'), 'updated_at' => Carbon::parse('2025-08-02 14:29:21')],
            ['id' => '40', 'page' => 'terms_and_conditions_page', 'section' => 'hero_section', 'title' => 'Terms & Conditions', 'sub_title' => NULL, 'image' => NULL, 'background_image' => NULL, 'description' => 'uilding strong, lasting partnerships to achieve shared goals and success.', 'sub_description' => '<h2>1. Introduction</h2><p><br>This Privacy Policy explains how we collect, use, disclose, and protect your personal information when you use the Signage Booking Website ShaShh.</p><h2><br>2. Information We Collect</h2><p>We collect information that you provide to us when you create an account, make a booking, or upload content. This may include your name, email address, payment information, and any other information you choose to provide.<br>&nbsp;</p><h2>3. Use of Information</h2><p>We use the information we collect to provide and improve our services, process payments, communicate with you, and for other customer service purposes. We may also use your information for marketing and promotional purposes.</p><h2>​4. Disclosure of Information</h2><p>We may disclose your information to third parties in the following circumstances:<br>To service providers who perform services on our behalf.<br>To comply with legal obligations.<br>To protect our rights and property.</p><h2>5. Security</h2><p>We take reasonable measures to protect your personal information from unauthorized access, use, or disclosure. However, no internet-based service can be completely secure, and we cannot guarantee the absolute security of your information.</p><h2>6. Your Rights</h2><p>You have the right to access, correct, or delete your personal information. You can exercise these rights by contacting us at&nbsp;<a href="mailto:support@shashh.com">support@shashh.com</a></p><h2>7. Changes to Privacy Policy</h2><p>We may update this Privacy Policy from time to time. Any changes will be posted on the App, and your continued use of the App after such changes have been posted will constitute your acceptance of the changes.</p>', 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 14:29:51'), 'updated_at' => Carbon::parse('2025-08-02 14:29:51')],
            ['id' => '41', 'page' => 'account_page', 'section' => 'hero_section', 'title' => 'Account', 'sub_title' => NULL, 'image' => NULL, 'background_image' => NULL, 'description' => 'Building strong, lasting partnerships to achieve shared goals and success.', 'sub_description' => NULL, 'button_text' => NULL, 'link_url' => NULL, 'tags' => NULL, 'status' => 'active', 'created_at' => Carbon::parse('2025-08-02 14:30:07'), 'updated_at' => Carbon::parse('2025-08-02 14:30:07')]
        ]);
    }
}


