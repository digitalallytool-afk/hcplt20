<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Trial;
use App\Models\MatchSchedule;
use App\Models\Ambassador;
use App\Models\Team;
use App\Models\NewsArticle;
use App\Models\Media;

class HomeController extends Controller
{
    
  public function home(){
    $sliders = Slider::where('status', 1)->orderBy('order', 'asc')->get();
    $trials = Trial::where('is_active', 1)->orderBy('created_at', 'desc')->get();
    $matches = MatchSchedule::orderBy('created_at', 'desc')->get();
    
    // 1. Ambassadors and Chief Mentors
    $chiefMentors = Ambassador::where('status', 1)
        ->where(function($query) {
            $query->where('name', 'like', '%Praveen%')
                  ->orWhere('name', 'like', '%Pardeep%');
        })
        ->orderBy('order', 'asc')
        ->get();
    if ($chiefMentors->isEmpty()) {
        $chiefMentors = Ambassador::where('status', 1)->orderBy('order', 'asc')->take(1)->get();
    }
    $chiefMentorIds = $chiefMentors->pluck('id')->toArray();
    
    $guestAmbassadors = Ambassador::where('status', 1)
        ->whereNotIn('id', $chiefMentorIds)
        ->orderBy('order', 'asc')
        ->get();

    // 2. Teams
    $teams = Team::where('status', 1)->orderBy('order', 'asc')->get();
    $mens_db_teams = $teams->where('gender', 'Men');
    $womens_db_teams = $teams->where('gender', 'Women');

    // 3. News
    $news = NewsArticle::with('category')->where('status', 1)->orderBy('order', 'asc')->orderBy('published_at', 'desc')->get();

    // 4. Videos Section
    $dbVideos = Media::where('type', 'video')->where('status', 1)->orderBy('order', 'asc')->take(2)->get();
    $videoList = [];
    foreach ($dbVideos as $video) {
        $videoList[] = [
            'video_url' => $video->video_url
        ];
    }
    
    // Fallbacks for URLs
    if (count($videoList) < 1) {
        $videoList[] = [
            'video_url' => 'https://youtu.be/jPBYnWjueOk?si=UPng_Cuos4cpCx_1'
        ];
    }
    if (count($videoList) < 2) {
        $videoList[] = [
            'video_url' => 'https://www.youtube.com/watch?v=Kz69c-U05_E'
        ];
    }

    // Simple fixed titles and descriptions
    $videoList[0]['title'] = 'ABOUT LEAGUE';
    $videoList[0]['description'] = 'Discover the vision, structure, and excitement of the Haryana Cricket Premier League (HCPL).';

    $videoList[1]['title'] = 'TRIAL & REGISTRATION PROCESS';
    $videoList[1]['description'] = 'A complete step-by-step guide to registering online and preparing for the zone-wise trials.';

    // Add ytId and isYoutube flags to each videoItem
    foreach ($videoList as &$videoItem) {
        $url = $videoItem['video_url'];
        $videoItem['is_youtube'] = (str_contains($url, 'youtube.com') || str_contains($url, 'youtu.be'));
        $videoItem['yt_id'] = '';
        if ($videoItem['is_youtube']) {
            $videoItem['yt_id'] = $this->extractYoutubeId($url);
        }
    }
    unset($videoItem);

    return view('frontend.pages.index', compact(
        'sliders', 
        'trials', 
        'matches', 
        'chiefMentors', 
        'guestAmbassadors', 
        'mens_db_teams', 
        'womens_db_teams', 
        'news', 
        'videoList'
    ));
  }

  private function extractYoutubeId($url) {
      $videoId = '';
      if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $url, $match)) {
          $videoId = $match[1];
      }
      return $videoId;
  }

  public function about(){ 
    $members = \App\Models\ManagementMember::where('status', 1)->orderBy('order', 'asc')->get();
    return view('frontend.pages.about-us', compact('members'));
  }

    public function player_registration(){ 
    $sliders = \App\Models\RegistrationSlider::where('status', 1)->orderBy('order', 'asc')->get();
    return view('frontend.pages.registration', compact('sliders'));
  }

    public function team_registration()
    {
        return view('frontend.pages.registration');
    }

    public function team_details($id)
    {
        $team = Team::with(['members' => function($query) {
            $query->where('status', 1)->orderBy('order', 'asc');
        }])->findOrFail($id);

        $wicket_keepers = $team->members->where('role', 'Wicket Keeper');
        $batsmen = $team->members->where('role', 'Batsman');
        $all_rounders = $team->members->where('role', 'All Rounder');
        $bowlers = $team->members->where('role', 'Bowler');

        return view('frontend.pages.team-details', compact('team', 'wicket_keepers', 'batsmen', 'all_rounders', 'bowlers'));
    }

    public function owner_registration(){ 

    return view('frontend.pages.owner-registration');
  }

    public function sponsor_registration(){ 

    return view('frontend.pages.sponsor-registration');
  }

    public function team(){ 
        $teams = Team::where('status', 1)->orderBy('order', 'asc')->get();
        return view('frontend.pages.teams', compact('teams'));
    }

    public function gallery(){ 
        $images = Media::where('type', 'image')->where('status', 1)->orderBy('order', 'asc')->get();
        return view('frontend.pages.gallery', compact('images'));
    }

    public function video(){ 
        $videos = Media::where('type', 'video')->where('status', 1)->orderBy('order', 'asc')->get();
        return view('frontend.pages.video', compact('videos'));
    }

    public function contact(){ 

    return view('frontend.pages.contact-us');
  }

    public function privacy(){ 
        return view('frontend.pages.privacy');
    }

    public function terms(){ 
        return view('frontend.pages.terms-and-conditions');
    }

    public function faq(){ 
        return view('frontend.pages.faq');
    }

    public function sponsors(){ 
        return view('frontend.pages.sponsors');
    }
}
