<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{

    // create journal
    public function create_journal(){
        if(Auth::user()->role_id != 1){
            return redirect()->to('/home');
        }
        $users = User::where('role_id', 4)->get();
        $journals = Journal::all();
        return view('journal.create_journal', compact('journals', 'users'));
    }

    //Store journal
    public function store_journal(Request $request){
        $data = $request->all();
        if (request()->hasFile('reviewer_comment_file')) {
            $image = request()->reviewer_comment_file;
            $time = time();
            $image_name_pp = $time . '_pp.' . $image->getClientOriginalExtension();
            //set directory image_name
            $dir = 'reviewer_comment_file/';
            //move file
            $image->move($dir, $image_name_pp);
            //$request->pp_image = $image_name_pp;
            $data['reviewer_comment_file'] = $image_name_pp;
        }
        $journal_insert = Journal::create($data);

        return redirect('/create-journal')->with('success', 'Journal added successfully');
    }

    //journal List
    public function journal_list(){
        if(Auth::user()->role_id != 1){
            return redirect()->to('/home');
        }
        $journals = Journal::all();
        return view('journal.journal_list', compact('journals'));
    }

}
