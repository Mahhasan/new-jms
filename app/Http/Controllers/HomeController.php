<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manuscript;
use App\Models\Journal;
use App\Models\User;
use App\Models\ReviewerSelection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    public function index()
    {
        $total_paper = DB::table('manuscripts')->count();
        $manuscripts = Manuscript::where('user_id', Auth::user()->id)->count();
        $pending_manuscripts = Manuscript::where('user_id', Auth::user()->id)
         ->where('status', '!=', 'Accepted')
         ->where('status', '!=', 'Rejected')
         ->count();
        $accepted_manuscripts = Manuscript::where('user_id', Auth::user()->id)
         ->where('status', '=', 'Accepted')
         ->count();
        $rejected_manuscripts = Manuscript::where('user_id', Auth::user()->id)
         ->where('status', '=', 'Rejected')
         ->count();
        $users = Auth::user();
        $authors = User::where('role_id', 2)->count();
        $journals = DB::table('journals')->count();
        $reviewers = User::where('role_id', 3)->count();
        $pending_review = ReviewerSelection::where('reviewer', Auth::user()->id)
         ->where('status', '!=', 'Submitted')
         ->count();
        $submitted_review = ReviewerSelection::where('reviewer', Auth::user()->id)
         ->where('status', '=', 'Submitted')
         ->count();
        return view('home', compact('total_paper', 'users', 'manuscripts', 'authors', 'journals', 'reviewers', 'pending_manuscripts', 'accepted_manuscripts', 'rejected_manuscripts', 'pending_review', 'submitted_review'));
    }
}
