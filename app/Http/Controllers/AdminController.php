<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class AdminController extends Controller
{
    public function index(){ 

        return view('backend.pages.dashboard');
    }

    public function cms(){ 

        return view('backend.pages.cms');

    }


    public function league(){ 

        return view('backend.pages.league');
    }

    public function trial(){ 

        return view('backend.pages.trial');


    }

    public function player(){ 

          return view('backend.pages.player-management');

    }

     public function media(){ 

          return view('backend.pages.media');

    }


}
