<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MasnuscriptSubmissionMail;
use App\Mail\ManuscriptReceivedMail;
use App\Mail\ReviewerSelectionMail;
use App\Mail\ReviewSubmissionMail;
use App\Mail\CameraReadyFileSubmissionMail;
use App\Mail\ManuscriptStatusChangesMail;
use App\Mail\EditorCommentSubmissionMail;
use App\Models\ReviewerSelection;
use App\Models\Manuscript;
use App\Models\Topic;
use App\Models\Journal;
use App\Models\Author;
use App\Models\User;
use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ManuscriptController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    //Create Manuscript
    public function index(){
        $journals = Journal::all()->pluck('full_name', 'id');
        $users = User::WHERE('role_id', 3)->get();
        return view('manuscript.index',compact('users','journals'));
    }

    //Get topic in manuscript submission
    public function getTopic($id){
        $topics = DB::table("topics")->where("journal_id",$id)->pluck("name","id");
        return json_encode($topics);
    }

    //store_manuscript
    public function create_manuscript(Request $request){
        $data = $request->all();
        if (request()->hasFile('main_file')) {
            $image = request()->main_file;
            $time = time();
            $image_name_pp = $time . '_pp.' . $image->getClientOriginalExtension();
            //set directory image_name
            $dir = 'article/';
            //move file
            $image->move($dir, $image_name_pp);
            //$request->pp_image = $image_name_pp;
            $data['main_file'] = $image_name_pp;
        }
            // Dynamic Co_Author table
        $data_insert = Manuscript::create($data);
        foreach($request->addmore as $key => $value){
            Author::create(array_merge($value, ['manuscript_id' => $data_insert->id, 'user_id'=>auth()->id()]));
        }

        Mail::to($data_insert->user->email)->send(new MasnuscriptSubmissionMail([
            'id'=> $data_insert['id'],
        ]));

        Mail::to($data_insert->journal->user->email)->send(new ManuscriptReceivedMail([
            'id'=> $data_insert['id'],
        ]));
        return redirect('/manuscript_submission')->with('success', 'Manuscript has been submitted successfully');
    }

    //Manuscript List
    public function manuscript_list(){
        $manuscripts = Manuscript::all();
        $authors = Manuscript::where('user_id', Auth::user()->id)->get();
        return view('manuscript.manuscript_list',compact('manuscripts', 'authors'));
    }

    //editor journal list
    public function editor_journal_list(){
        if(Auth::user()->role_id != 4){
            return redirect()->to('/home');
        }
        $journals = Journal::where('user_id', Auth::user()->id)->get();
        return view('manuscript.editor_journal_list',compact('journals'));
    }

    //journalwise manuscript list
    public function journalwise_manuscript_list($id){
        if(Auth::user()->role_id != 4){
            return redirect()->to('/home');
        }
        $journal_manuscripts = Manuscript::where('journal_id', $id)->get();
        return view('manuscript.journalwise_manuscript_list',compact('id','journal_manuscripts',));
    }

    // Add Topic
    public function add_topic(){
        if(Auth::user()->role_id != 1){
            return redirect()->to('/home');
        }
        $journals = Journal::all();
        $topics = Topic::all();
        return view('manuscript.add_topic', compact('topics', 'journals'));
    }

    //Store Topic
    public function store_topic(Request $request){
        $data = $request->all();
        $topic_insert = Topic::create($data);
        return redirect('/add-topic')->with('success', 'Topic has been added successfully');
    }

    //Manuscript Details for Author
    public function manuscript_details($id){

        if(Auth::user()->role_id == 2){
            $manuscripts = Manuscript::where('user_id', Auth::user()->id)->where('id',$id)->first();
        }
        elseif(Auth::user()->role_id == 3){
            $manuscripts = Manuscript::where('user_id', Auth::user()->id)->where('id',$id)->first();
        }
        else{
            $manuscripts = Manuscript::find($id);
        }

        $reviewers = ReviewerSelection::where('reviewer_selections.manuscript_id',$manuscripts->id)->get();
        $reviewed_files = ReviewerSelection::where('reviewer_selections.manuscript_id',$manuscripts->id)->get();
        $authors = Author::where('authors.manuscript_id',$manuscripts->id)->get();
        $rev = ReviewerSelection::where('manuscript_id',$manuscripts->id)->select('reviewer')->get();
        $users = User::WHERE('role_id', 3)->whereNotIn('id', $rev)->get();
        //dd($users);

        return view('manuscript.manuscript_details',compact('manuscripts', 'authors', 'id', 'users', 'reviewers', 'reviewed_files'));
    }

    //Select Reviewer by admin
    public function reviewer_selection(Request $request){
        if(Auth::user()->role_id != 1){
            return redirect()->to('/home');
        }
        $data = $request->all();
        $reviewer_insert = ReviewerSelection::create($data);
        return redirect()->route('manuscript_details',$reviewer_insert->manuscript_id)->with('success', 'Reviewer added successfully');
    }

    //Select Reviewer by editor
    public function Editor_reviewer_selection(Request $request){
        if(Auth::user()->role_id != 4){
            return redirect()->to('/home');
        }
        $data = $request->all();
        $reviewer_insert = ReviewerSelection::create($data);

        Mail::to($reviewer_insert->reviewers->email)->send(new ReviewerSelectionMail([
            'id'=> $reviewer_insert['id'],
        ]));

        return redirect()->route('manuscript_details',$reviewer_insert->manuscript_id)->with('success', 'Reviewer added successfully');
    }

    //Manuscript List for Asigned Reviewer
    public function review_manuscript_list(){
        if(Auth::user()->role_id != 3){
            return redirect()->to('/home');
        }
        $rev_manuscripts = ReviewerSelection::where('reviewer', Auth::user()->id)->get();
        return view('manuscript.review_manuscript',compact('rev_manuscripts'));
    }


    //Manuscript Details for review $ create comment
    public function reviewer_manuscript_details($id){
        if(Auth::user()->role_id != 3){
            return redirect()->to('/home');
        }
        $users = User::all();
        $reviewers = ReviewerSelection::where('reviewer', Auth::user()->id)->where('manuscript_id',$id)->first();
        $authors = Author::where('manuscript_id',$reviewers->manuscript_id)->get();
        return view('manuscript.add_reviewer_comment',compact('id', 'users', 'reviewers','authors'));
    }

    //Store Reviewer Comment or //Update reviewer_comment Column in reviewer_selections Table
    public function store_reviewer_comment(Request $request, $id){
        $data = ReviewerSelection::where('manuscript_id',$id)->where('reviewer',Auth::user()->id)->first();
        $data->status = $request->status;
        //dd($data);
        if (request()->hasFile('reviewed_file')) {
            $image = request()->reviewed_file;
            $time = time();
            $image_name_pp = $time . '_pp.' . $image->getClientOriginalExtension();
            //set directory image_name
            $dir = 'reviewed/';
            //move file
            $image->move($dir, $image_name_pp);
            //$request->pp_image = $image_name_pp;
            $data['reviewed_file'] = $image_name_pp;
            $data->save();
        }
        Mail::to($data->journal->user->email)->send(new ReviewSubmissionMail([
            'id'=> $data['id'],
        ]));

        return redirect()->route('reviewer-manuscript-details',$data->manuscript_id)->with('success', 'Reviewed file submitted successfully');
    }

    //Store Updated File by Author
    public function store_updated_file(Request $request, $id){
        $data = Manuscript::find($id);
        //dd($data);
        if (request()->hasFile('updated_file')) {
            $image = request()->updated_file;
            $time = time();
            $image_name_pp = $time . '_pp.' . $image->getClientOriginalExtension();
            //set directory image_name
            $dir = 'updatedfile/';
            //move file
            $image->move($dir, $image_name_pp);
            //$request->pp_image = $image_name_pp;
            $data['updated_file'] = $image_name_pp;
        }
            $data->save();

            Mail::to($data->journal->user->email)->send(new CameraReadyFileSubmissionMail([
                'id'=> $data['id'],
            ]));

        return redirect()->route('manuscript_details', $request->id)->with('success', 'Updated Manuscript submitted successfully');
    }

    //journalwise comment send to author by editor
    public function store_Editor_comment(Request $request, $id){
        $data = Manuscript::find($id);
        $data->editor_comment = $request->editor_comment;
        $data-> save();
        // dd($data-> save());

        Mail::to($data->user->email)->send(new EditorCommentSubmissionMail([
            'id'=> $data['id'],
        ]));

        return redirect()->route('manuscript_details',$data->id)->with('success', 'Comment Sent');
        // dd($data->id);
    }

    //Store Update Status by Admin
    public function store_update_status(Request $request, $id){
        $data = Manuscript::find($id);
        $data->status = $request->status;
        $data-> save();

        Mail::to($data->user->email)->send(new ManuscriptStatusChangesMail([
            'id'=> $data['id'],
        ]));

        return redirect()->route('manuscript_details',$data->id)->with('success', 'Status Updated successfully');
    }
}
