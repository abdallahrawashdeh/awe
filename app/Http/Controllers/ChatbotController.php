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

        // Convert question to lowercase for easier matching
        $lowerQuestion = strtolower(trim($question));

        // Enhanced question detection with news
        if ($this->isCareerRelatedQuestion($lowerQuestion)) {
            return $this->getCareerOpportunities();
        }
        elseif ($this->isNewsRelatedQuestion($lowerQuestion)) {
            return $this->getLatestNews();
        }
        elseif (str_contains($lowerQuestion, 'found') || str_contains($lowerQuestion, 'establish') || str_contains($lowerQuestion, 'start')) {
            return response()->json([
                'message' => "🚀 **AW Engineering** was founded in **2010** with a vision to revolutionize the engineering industry through innovative solutions and exceptional service delivery."
            ]);
        }
        elseif (str_contains($lowerQuestion, 'location') || str_contains($lowerQuestion, 'address') || str_contains($lowerQuestion, 'where')) {
            return response()->json([
                'message' => "📍 **AW Engineering** is headquartered in **Dubai, UAE**, with additional offices in **Abu Dhabi** and **Sharjah**. Our strategic locations allow us to serve clients across the Middle East efficiently."
            ]);
        }
        elseif (str_contains($lowerQuestion, 'service') || str_contains($lowerQuestion, 'what do you do') || str_contains($lowerQuestion, 'offer')) {
            return response()->json([
                'message' => "🔧 **Our Services:**\n\n• **Civil Engineering**\n• **Mechanical Engineering**\n• **Electrical Engineering**\n• **Project Management**\n• **Structural Design**\n• **Construction Supervision**\n• **Technical Consultancy**\n\nWe provide end-to-end engineering solutions for residential, commercial, and industrial projects."
            ]);
        }
        else {
            return response()->json([
                'message' => "😊 I'm here to help you learn about AW Engineering! You can ask me about:\n\n• **Our company history**\n• **Service offerings**\n• **Career opportunities**\n• **Company locations**\n• **Latest news & updates**\n• **And much more!**\n\nTry clicking one of the buttons above or ask your own question!"
            ]);
        }
    }

    /**
     * Enhanced career detection with multiple patterns
     */
    private function isCareerRelatedQuestion(string $question): bool
    {
        // Exact career-related keywords
        $careerKeywords = [
            'career', 'careers', 'job', 'jobs', 'opportunit', 'vacancy',
            'vacancies', 'position', 'positions', 'work', 'employment',
            'hiring', 'recruitment', 'recruit', 'apply', 'application',
            'opening', 'openings', 'role', 'roles', 'vacant'
        ];

        // Check for exact keyword matches
        foreach ($careerKeywords as $keyword) {
            if (str_contains($question, $keyword)) {
                return true;
            }
        }

        // Common career-related phrases and patterns
        $careerPhrases = [
            'looking for job',
            'want to work',
            'join your team',
            'work with you',
            'work for you',
            'available position',
            'job opening',
            'career opportunity',
            'hiring now',
            'how to apply',
            'job application',
            'work opportunity',
            'employment opportunity'
        ];

        // Check for phrase matches
        foreach ($careerPhrases as $phrase) {
            if (str_contains($question, $phrase)) {
                return true;
            }
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
        // News-related keywords
        $newsKeywords = [
            'news', 'update', 'updates', 'announcement', 'announcements',
            'blog', 'article', 'articles', 'post', 'posts', 'recent',
            'latest', 'new', 'what\'s new', 'whats new', 'happening',
            'development', 'developments', 'event', 'events'
        ];

        // Check for exact keyword matches
        foreach ($newsKeywords as $keyword) {
            if (str_contains($question, $keyword)) {
                return true;
            }
        }

        // Common news-related phrases
        $newsPhrases = [
            'latest news',
            'recent updates',
            'company news',
            'what\'s happening',
            'any news',
            'tell me news',
            'show me updates',
            'recent announcements',
            'company updates',
            'latest developments'
        ];

        // Check for phrase matches
        foreach ($newsPhrases as $phrase) {
            if (str_contains($question, $phrase)) {
                return true;
            }
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

                    // Add subtitle if available (using your exact field name)
                    if (!empty($career->subtitle)) {
                        $message .= "  {$career->subtitle}\n";
                    }

                    // Add years experience if available (using your exact field name)
                    if (!empty($career->years_experience)) {
                        $message .= "  📅 Required Experience: {$career->years_experience} years\n";
                    }

                    // Add content if available (using your exact field name)
                    if (!empty($career->content)) {
                        $shortDesc = strlen($career->content) > 100
                            ? substr($career->content, 0, 100) . '...'
                            : $career->content;
                        $message .= "  📝 {$shortDesc}\n";
                    }

                    $message .= "\n";
                }

                if ($careers->count() === 3) {
                    $message .= "💼 **View all opportunities?** Contact our HR department for complete listings and more positions!";
                } else {
                    $message .= "💼 **Interested in joining our team?** Contact our HR department for more details!";
                }

                return response()->json(['message' => $message]);
            } else {
                // Fallback message if no careers found in database
                \Log::info('No careers found in database, using fallback message');
                return response()->json([
                    'message' => "💼 **Career Opportunities at AW Engineering**\n\nWe're always looking for talented engineering professionals to join our growing team! While we don't have specific openings listed at the moment, we regularly hire for:\n\n• **Civil Engineers**\n• **Mechanical Engineers**\n• **Electrical Engineers**\n• **Project Managers**\n• **CAD Technicians**\n• **Site Supervisors**\n• **Structural Engineers**\n\n📞 **How to apply:**\nSend your CV to **info@aw-engineering.net** or visit our office to discuss future opportunities!"
                ]);
            }

        } catch (\Exception $e) {
            // Error fallback with logging
            \Log::error('Chatbot career error: ' . $e->getMessage());
            return response()->json([
                'message' => "💼 **Career Opportunities at AW Engineering**\n\nWe offer exciting career paths in various engineering disciplines:\n\n• **Civil Engineering Roles**\n• **Mechanical Engineering Positions**\n• **Electrical Engineering Opportunities**\n• **Project Management Careers**\n• **Structural Design Roles**\n\n🔧 **Join our innovative team** and work on challenging projects across the UAE!\n\n📞 Contact our HR department for current vacancies and application information."
            ]);
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

                    // Add subtitle if available
                    if (!empty($item->subtitle)) {
                        $message .= "  *{$item->subtitle}*\n";
                    }

                    // Add truncated content
                    if (!empty($item->content)) {
                        $shortContent = strlen($item->content) > 120
                            ? substr($item->content, 0, 120) . '...'
                            : $item->content;
                        $message .= "  {$shortContent}\n";
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
                // Fallback message if no news found
                \Log::info('No news found in database, using fallback message');
                return response()->json([
                    'message' => "📰 **Latest News from AW Engineering**\n\nWe're constantly working on exciting new projects and developments! While we don't have specific news articles at the moment, here's what's happening:\n\n• **New projects** in sustainable engineering\n• **Expansion** of our service offerings\n• **Industry partnerships** and collaborations\n• **Technology adoption** for better solutions\n\n🔔 **Stay tuned!** We'll have major announcements coming soon. Check back regularly for updates!"
                ]);
            }

        } catch (\Exception $e) {
            // Error fallback with logging
            \Log::error('Chatbot news error: ' . $e->getMessage());
            return response()->json([
                'message' => "📰 **AW Engineering News & Updates**\n\nWe're always making progress! Recent developments include:\n\n• **Successful completion** of major infrastructure projects\n• **Expansion** into new sustainable engineering sectors\n• **Adoption of cutting-edge** engineering technologies\n• **Industry recognition** for innovative solutions\n\n🌟 **Innovation drives us!** Follow our news section for the latest achievements and project milestones."
            ]);
        }
    }
}
