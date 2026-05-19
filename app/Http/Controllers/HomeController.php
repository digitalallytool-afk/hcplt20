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
    $ambassadors = Ambassador::where('status', 1)->orderBy('order', 'asc')->get();
    $teams = Team::where('status', 1)->orderBy('order', 'asc')->get();
    $news = NewsArticle::with('category')->where('status', 1)->orderBy('order', 'asc')->orderBy('published_at', 'desc')->get();
    return view('frontend.pages.index', compact('sliders', 'trials', 'matches', 'ambassadors', 'teams', 'news'));
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
}
