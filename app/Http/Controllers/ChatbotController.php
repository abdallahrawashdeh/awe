<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\News;

class ChatbotController extends Controller
{
    public function getResponse(Request $request)
    {
        // Log the request for debugging
        \Log::info('Chatbot Request Received', [
            'question' => $request->query('question'),
            'full_url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip()
        ]);

        $question = $request->query('question', '');

        if (empty($question)) {
            return response()->json([
                'message' => "👋 Hello! I'm your AW Engineering Assistant. How can I help you today?"
            ]);
        }

        // Convert question to lowercase for easier matching (mb_ keeps Arabic text safe)
        $lowerQuestion = mb_strtolower(trim($question));

        // ORDER MATTERS: the first match wins, so specific topics come before general ones.

        // 1. Greetings and thanks (only when the whole message is a greeting)
        if ($this->isGreeting($lowerQuestion)) {
            return response()->json([
                'message' => "👋 Hello and welcome to **AW Engineering**! Ask me about our services, departments, projects, careers, news, or how to contact us."
            ]);
        }
        elseif ($this->containsAny($lowerQuestion, ['thank', 'thx', 'shukran', 'شكرا'])) {
            return response()->json([
                'message' => "😊 You're welcome! If you need anything else about AW Engineering, just ask."
            ]);
        }

        // 2. Database-driven answers
        elseif ($this->isCareerRelatedQuestion($lowerQuestion)) {
            return $this->getCareerOpportunities();
        }
        elseif ($this->containsAny($lowerQuestion, ['project', 'portfolio', 'previous work', 'latest work', 'your work', 'case stud'])) {
            return $this->getLatestProjects();
        }
        elseif ($this->isNewsRelatedQuestion($lowerQuestion)) {
            return $this->getLatestNews();
        }

        // 3. Founder / leadership (must come BEFORE "found", because "founder" contains "found")
        elseif ($this->containsAny($lowerQuestion, ['founder', 'owner', 'ceo', 'general manager', 'adel', 'leader', 'who runs', 'who manages', 'boss'])) {
            return response()->json([
                'message' => "👤 **Eng. Adel — Founder & General Manager**\n\nEng. Adel leads AW Engineering with more than **15 years** of experience and a strong focus on innovation and quality.\n\n• **15+** years of experience\n• **200+** successful projects\n• A team culture built on taking care of people and helping them succeed\n\n📧 info@aw-engineering.net"
            ]);
        }
        elseif ($this->containsAny($lowerQuestion, ['found', 'establish', 'start', 'since when', 'how old', 'history'])) {
            return response()->json([
                'message' => "🚀 **AW Engineering** was founded in **2016** with a vision to revolutionize the engineering industry through innovative solutions and exceptional service delivery."
            ]);
        }

        // 4. Vision / mission
        elseif ($this->containsAny($lowerQuestion, ['vision', 'mission', 'goal', 'values', 'aim'])) {
            return response()->json([
                'message' => "🏗️ **Our Vision**\n\nTo be a leading engineering firm known for **excellence, reliability and customer satisfaction** — delivering innovative, high-quality solutions across all engineering disciplines, building lasting client relationships, and helping set new industry standards.\n\n🎯 **Our Mission**\n\nTo advance engineering practice and raise quality standards in the sector, serving property developers, project owners and contractors."
            ]);
        }

        // 5. Departments (specific) — before the general services answer
        elseif ($this->containsAny($lowerQuestion, ['bim', 'clash', '3d', '4d', '5d', 'modeling', 'modelling', 'facility management'])) {
            return response()->json([
                'message' => "🧩 **BIM Department**\n\n• **3D BIM Modeling**\n• **Clash Detection and Resolution**\n• **4D BIM** (Time Scheduling)\n• **5D BIM** (Cost Estimation)\n• **Facility Management BIM**\n• **BIM Coordination and Collaboration**\n\n📧 For a BIM quote: info@aw-engineering.net"
            ]);
        }
        elseif ($this->containsAny($lowerQuestion, ['structur', 'fea', 'finite element', 'inspection', 'assessment', 'restoration', 'forensic'])) {
            return response()->json([
                'message' => "🏛️ **Structural Department**\n\n• **Structural Analysis & Design**\n• **Structural Shop Drawings**\n• **Inspection & Assessment / Restorations & Forensic Investigations**\n• **FEA Consulting Services**\n\n📧 For structural enquiries: info@aw-engineering.net"
            ]);
        }
        elseif ($this->containsAny($lowerQuestion, ['architect', 'interior', 'decor'])) {
            return response()->json([
                'message' => "📐 **Architectural Department**\n\n• **Architectural Design**\n• **Interior Design**\n• **Shop Drawings**\n\n📧 For architectural enquiries: info@aw-engineering.net"
            ]);
        }
        elseif ($this->containsAny($lowerQuestion, ['electric', 'lighting', 'power'])) {
            return response()->json([
                'message' => "⚡ **Electrical Department**\n\n• **Electrical Design**\n• **Electrical Shop Drawings**\n\n📧 For electrical enquiries: info@aw-engineering.net"
            ]);
        }
        elseif ($this->containsAny($lowerQuestion, ['mechanic'])) {
            return response()->json([
                'message' => "⚙️ **Mechanical Department**\n\n• **Mechanical Design**\n• **Mechanical Shop Drawings**\n\n📧 For mechanical enquiries: info@aw-engineering.net"
            ]);
        }

        // 6. General services
        elseif ($this->containsAny($lowerQuestion, ['service', 'what do you do', 'offer', 'department', 'shop drawing', 'design', 'speciali', 'discipline'])) {
            return response()->json([
                'message' => "🔧 **Our Services — 5 Departments:**\n\n• **Structural** — analysis & design, shop drawings, inspection, FEA consulting\n• **Architectural** — architectural design, interior design, shop drawings\n• **Electrical** — design and shop drawings\n• **Mechanical** — design and shop drawings\n• **BIM** — 3D modeling, clash detection, 4D scheduling, 5D cost estimation, FM BIM, coordination\n\nWe serve **property developers, project owners and contractors**. Ask me about any department for details!"
            ]);
        }

        // 7. Team
        elseif ($this->containsAny($lowerQuestion, ['team', 'staff', 'engineers', 'employees', 'who works'])) {
            return response()->json([
                'message' => "👥 **Our Team**\n\nA carefully selected team of highly skilled engineers, organised in five departments:\n\n• **Structural**\n• **Architectural**\n• **Electrical**\n• **Mechanical**\n• **BIM**\n\nLed by **Eng. Adel**, Founder & General Manager. Visit the **Our Team** page to meet everyone."
            ]);
        }

        // 8. Certifications and partners
        elseif ($this->containsAny($lowerQuestion, ['certif', 'accredit', 'iso', 'license', 'licence', 'qualified'])) {
            return response()->json([
                'message' => "📜 **Certifications**\n\nAW Engineering holds professional certifications that reflect our commitment to quality standards. You can view them in the **Certifications** section of our home page, or email **info@aw-engineering.net** if you need copies for a tender or prequalification."
            ]);
        }
        elseif ($this->containsAny($lowerQuestion, ['partner', 'client', 'customer', 'who do you work with', 'collaborat'])) {
            return response()->json([
                'message' => "🤝 **Clients & Partners**\n\nWe work with **property developers, project owners and contractors**, and collaborate with trusted industry partners in Jordan, KSA and beyond. See the **Trusted Partners** section on our home page."
            ]);
        }

        // 9. Pricing / quotation
        elseif ($this->containsAny($lowerQuestion, ['price', 'pricing', 'cost', 'quote', 'quotation', 'fee', 'how much', 'proposal'])) {
            return response()->json([
                'message' => "💰 **Request a Quote**\n\nPricing depends on the project scope and the disciplines involved. Send us your drawings or a short brief and we'll reply with a proposal:\n\n📧 **info@aw-engineering.net**\n📱 **+962 798984004**"
            ]);
        }

        // 10. Contact (before location, so "where can I contact you" lands here)
        elseif ($this->containsAny($lowerQuestion, ['contact', 'phone', 'mobile', 'call', 'email', 'e-mail', 'mail', 'number', 'reach', 'whatsapp', 'get in touch'])) {
            return response()->json([
                'message' => "📞 **Contact AW Engineering**\n\n📱 Mobile: **+962 798984004**\n☎️ Landline: **+962 6523472**\n📧 Email: **info@aw-engineering.net**\n📍 Abu Nusair - Amman - Jordan\n\nYou can also use the **Contact us** button at the bottom of the page."
            ]);
        }
        elseif ($this->containsAny($lowerQuestion, ['location', 'address', 'where', 'office', 'branch', 'countr', 'ksa', 'saudi', 'jordan', 'amman'])) {
            return response()->json([
                'message' => "📍 **Our Locations**\n\n• **Jordan** — Abu Nusair - Amman\n• **KSA** — serving clients in Saudi Arabia\n\n📱 +962 798984004"
            ]);
        }

        // 11. About the company (general — keep near the end)
        elseif ($this->containsAny($lowerQuestion, ['about', 'who are you', 'who is aw', 'company', 'advanced works', 'awd', 'aw engineering', 'tell me', 'overview', 'profile'])) {
            return response()->json([
                'message' => "🏢 **About AW Engineering**\n\n**Advanced Works Engineering** (Advanced Works Design) was established in **2016** as a comprehensive provider of all engineering disciplines.\n\n• Services for **property developers, project owners and contractors**\n• Five departments: **Structural, Architectural, Electrical, Mechanical, BIM**\n• **200+** successful projects\n• Offices serving **Jordan** and **KSA**\n\nOur goal is to be your partner for every engineering service need."
            ]);
        }
        else {
            return response()->json([
                'message' => "😊 I'm here to help you learn about AW Engineering! You can ask me about:\n\n• **About us & our history**\n• **Our founder**\n• **Vision & mission**\n• **Services** (Structural, Architectural, Electrical, Mechanical, BIM)\n• **Projects**\n• **Our team**\n• **Certifications & partners**\n• **Career opportunities**\n• **Latest news & updates**\n• **Quotes, contact details & locations**\n\nTry clicking one of the buttons above or ask your own question!"
            ]);
        }
    }

    /**
     * True if any keyword appears in the text at the START of a word.
     * "new" matches "news"/"newest" but not "renew"; "role" no longer matches "petroleum".
     */
    private function containsAny(string $text, array $keywords): bool
    {
        foreach ($keywords as $keyword) {
            if (preg_match('/(?<![\p{L}\p{N}])' . preg_quote($keyword, '/') . '/u', $text)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Only a greeting when the whole message is a greeting,
     * so "hi, do you have jobs?" still goes to careers.
     */
    private function isGreeting(string $question): bool
    {
        return (bool) preg_match(
            '/^(hi+|hello+|hey+|good (morning|afternoon|evening)|salam|marhaba|مرحبا|اهلا|أهلا|السلام عليكم)[\s!.,،]*$/u',
            $question
        );
    }

    /**
     * Enhanced career detection with multiple patterns
     */
    private function isCareerRelatedQuestion(string $question): bool
    {
        // NOTE: plain 'work' was removed — it matched "Advanced Works", "latest work",
        // "how does it work"... and sent them all to careers. Phrases below cover it.
        $careerKeywords = [
            'career', 'job', 'opportunit', 'vacanc', 'vacant', 'position',
            'employment', 'hiring', 'recruit', 'apply', 'application',
            'opening', 'role', 'internship', 'intern', 'training', 'cv', 'resume',
            'work with you', 'work for you', 'work at', 'working at', 'want to work',
            'join your team', 'join you', 'work opportunity'
        ];

        if ($this->containsAny($question, $careerKeywords)) {
            return true;
        }

        // Check for question patterns about careers
        $careerQuestionPatterns = [
            '/do you have.*(job|position|opening|vacancy)/i',
            '/are you.*hiring/i',
            '/can i.*apply/i',
            '/how.*get.*job/i',
            '/what.*position.*available/i',
            '/any.*job/i',
            '/looking.*job/i',
            '/need.*job/i'
        ];

        foreach ($careerQuestionPatterns as $pattern) {
            if (preg_match($pattern, $question)) {
                return true;
            }
        }

        return false;
    }

    /**
     * News detection with multiple patterns
     */
    private function isNewsRelatedQuestion(string $question): bool
    {
        $newsKeywords = [
            'news', 'update', 'announcement', 'blog', 'article', 'post',
            'recent', 'latest', 'new', 'what\'s new', 'whats new', 'happening',
            'development', 'event', 'press', 'stories'
        ];

        if ($this->containsAny($question, $newsKeywords)) {
            return true;
        }

        // Check for question patterns about news
        $newsQuestionPatterns = [
            '/any.*(news|update|announcement)/i',
            '/what.*(new|news|update)/i',
            '/tell me.*(news|update)/i',
            '/show me.*(news|update)/i',
            '/latest.*(news|update)/i',
            '/recent.*(news|update)/i'
        ];

        foreach ($newsQuestionPatterns as $pattern) {
            if (preg_match($pattern, $question)) {
                return true;
            }
        }

        return false;
    }

    private function getCareerOpportunities()
    {
        try {
            \Log::info('Fetching career opportunities from database');

            // Get only the latest 3 careers
            $careers = Career::orderBy('created_at', 'desc')->limit(3)->get();

            \Log::info('Found ' . $careers->count() . ' careers');

            if ($careers->count() > 0) {
                $message = "🚀 **Latest Career Opportunities at AW Engineering:**\n\n";

                foreach ($careers as $career) {
                    $message .= "• **{$career->title}**\n";

                    if (!empty($career->subtitle)) {
                        $message .= "  {$career->subtitle}\n";
                    }

                    if (!empty($career->years_experience)) {
                        $message .= "  📅 Required Experience: {$career->years_experience} years\n";
                    }

                    if (!empty($career->content)) {
                        $message .= "  📝 " . $this->shorten($career->content, 100) . "\n";
                    }

                    $message .= "\n";
                }

                if ($careers->count() === 3) {
                    $message .= "💼 **View all opportunities?** Visit our Careers page or send your CV to **info@aw-engineering.net**!";
                } else {
                    $message .= "💼 **Interested in joining our team?** Send your CV to **info@aw-engineering.net**!";
                }

                return response()->json(['message' => $message]);
            } else {
                \Log::info('No careers found in database, using fallback message');
                return response()->json([
                    'message' => "💼 **Career Opportunities at AW Engineering**\n\nWe're always looking for talented engineering professionals to join our growing team! While we don't have specific openings listed at the moment, we regularly hire for:\n\n• **Structural Engineers**\n• **Architects & Interior Designers**\n• **Electrical Engineers**\n• **Mechanical Engineers**\n• **BIM Modelers & Coordinators**\n• **Draftsmen (Shop Drawings)**\n\n📞 **How to apply:**\nSend your CV to **info@aw-engineering.net** or visit our office to discuss future opportunities!"
                ]);
            }

        } catch (\Throwable $e) {
            \Log::error('Chatbot career error: ' . $e->getMessage());
            return response()->json([
                'message' => "💼 **Career Opportunities at AW Engineering**\n\nWe offer career paths across our departments:\n\n• **Structural**\n• **Architectural**\n• **Electrical**\n• **Mechanical**\n• **BIM**\n\n🔧 **Join our team** and work on challenging projects across Jordan and KSA!\n\n📞 Send your CV to **info@aw-engineering.net** for current vacancies."
            ]);
        }
    }

    /**
     * Latest projects — same logic as careers/news.
     * ASSUMPTION: model App\Models\Project with 'title' and 'content' columns.
     * Change the class name / fields below if yours are different.
     */
    private function getLatestProjects()
    {
        $fallback = "🏗️ **Our Projects**\n\nAW Engineering has delivered **200+ successful projects** for property developers, project owners and contractors, covering structural, architectural, electrical, mechanical and BIM work.\n\n📂 Visit the **Our Projects** page to browse our latest work, or email **info@aw-engineering.net** for our company profile.";

        try {
            $projectModel = '\\App\\Models\\Project';

            if (!class_exists($projectModel)) {
                return response()->json(['message' => $fallback]);
            }

            \Log::info('Fetching latest projects from database');

            $projects = $projectModel::orderBy('created_at', 'desc')->limit(3)->get();

            \Log::info('Found ' . $projects->count() . ' projects');

            if ($projects->count() === 0) {
                return response()->json(['message' => $fallback]);
            }

            $message = "🏗️ **Our Newest Projects:**\n\n";

            foreach ($projects as $project) {
                $message .= "• **{$project->title}**\n";

                if (!empty($project->content)) {
                    $message .= "  " . $this->shorten($project->content, 120) . "\n";
                }

                $message .= "\n";
            }

            $message .= "📂 **Want to see more?** Visit the **Our Projects** page for the full portfolio.";

            return response()->json(['message' => $message]);

        } catch (\Throwable $e) {
            \Log::error('Chatbot projects error: ' . $e->getMessage());
            return response()->json(['message' => $fallback]);
        }
    }

    private function getLatestNews()
    {
        try {
            \Log::info('Fetching latest news from database');

            // Get only the latest 3 news articles
            $news = News::orderBy('created_at', 'desc')->limit(3)->get();

            \Log::info('Found ' . $news->count() . ' news articles');

            if ($news->count() > 0) {
                $message = "📰 **Latest News & Updates from AW Engineering:**\n\n";

                foreach ($news as $item) {
                    $message .= "📢 **{$item->title}**\n";

                    if (!empty($item->subtitle)) {
                        $message .= "  *{$item->subtitle}*\n";
                    }

                    if (!empty($item->content)) {
                        $message .= "  " . $this->shorten($item->content, 120) . "\n";
                    }

                    $message .= "\n";
                }

                if ($news->count() === 3) {
                    $message .= "📖 **Want to see more?** Visit our news section for complete articles and all updates!";
                } else {
                    $message .= "📖 **Stay updated!** Visit our news section for complete articles.";
                }

                return response()->json(['message' => $message]);
            } else {
                \Log::info('No news found in database, using fallback message');
                return response()->json([
                    'message' => "📰 **Latest News from AW Engineering**\n\nWe don't have news articles published at the moment.\n\n🔔 **Stay tuned!** Check the **All News** page regularly for announcements and project updates."
                ]);
            }

        } catch (\Throwable $e) {
            \Log::error('Chatbot news error: ' . $e->getMessage());
            return response()->json([
                'message' => "📰 **AW Engineering News & Updates**\n\nI couldn't load the news right now. Please visit the **All News** page for our latest announcements and project milestones."
            ]);
        }
    }

    /**
     * Strip HTML (editor content) and cut safely for multibyte text such as Arabic.
     */
    private function shorten(?string $text, int $limit): string
    {
        $clean = trim(preg_replace('/\s+/u', ' ', strip_tags((string) $text)));

        return mb_strlen($clean) > $limit
            ? mb_substr($clean, 0, $limit) . '...'
            : $clean;
    }
}