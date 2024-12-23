<?php

namespace App\Http\Controllers;
use App\Models\Archive;
use App\Models\Volume;
use App\Models\ArchiveAuthor;
use App\Models\Journal;
use App\Models\Issue;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    //
    // create Volume
    public function create_volume(){
        if(Auth::user()->role_id == 2){
            return redirect()->to('/home');
        }
        if(Auth::user()->role_id == 3){
            return redirect()->to('/home');
        }
        $journals = Journal::all();
        $editor_journal = Journal::where('user_id', Auth::user()->id)->first();
        $issues = Issue::all();
        $volumes = Volume::all();
        return view('volume.create_volume', compact('journals', 'editor_journal', 'issues', 'volumes'));
    }

    //Store Volume
    public function store_volume(Request $request){
        $data = $request->all();
        $volume_insert = Volume::create($data);
        return redirect('/create-volume')->with('success', 'Volume has been added successfully');
    }

    //Delete Volume
    public function destroy_volume($id) {
        DB::delete('delete from volumes where id = ?',[$id]);
        return redirect('/create-volume')->with('success', 'Volume has been remove successfully');
     }

    // create Archive by Editor
    public function create_archive(){
        if(Auth::user()->role_id != 4){
            return redirect()->to('/home');
        }
        $journals = Journal::where('user_id', Auth::user()->id)->first();
        $volumes = Volume::where('journal_id', $journals->id)->get();
        return view('archive.create_archive', compact('volumes', 'journals'));
    }


    //store archive by Editor
    public function store_archive(Request $request){
        $data = $request->all();
        //Dynamic archive_Author table
        $data_insert = Archive::create($data);
        foreach($request->addmore as $key => $value){
            ArchiveAuthor::create(array_merge($value, ['archive_id' => $data_insert->id, 'user_id'=>auth()->id()]));
        }
        return redirect('/create-archive')->with('success', 'Archive has been created successfully');
    }

    //archive List for Editor
    public function archive_list(){
        if(Auth::user()->role_id != 4){
            return redirect()->to('/home');
        }
        $journals = Journal::where('user_id', Auth::user()->id)->first();
        $archives = Archive::where('journal_id', $journals->id)->get();
        return view('archive.archive_list', compact('archives', 'journals'));
    }

    //Delete Archive by Editor
    public function destroy_archive($id) {
        DB::delete('delete from archives where id = ?',[$id]);
        return redirect('/archive-list')->with('success', 'Archive has been remove successfully');
     }

    // create  Archive by Admin
    public function create_admin_archive(){
        if(Auth::user()->role_id != 1){
            return redirect()->to('/home');
        }
        $journals = Journal::all();
        return view('archive.create_admin_archive', compact('journals'));
    }

    //Get Volume in Archive
    public function getVolume($id){
        $volumes = DB::table("volumes")->where("journal_id",$id)
        ->selectRaw("id, concat('Volume No: ', volume_number, ' , Issue: ' , issue, ' , Year: ' , year, '.') as volume")
        ->orderBy('volume')->pluck("volume", "id")->toArray();
        return json_encode($volumes);
    }
    //store archive by Admin
    public function store_admin_archive(Request $request){
          // Validate the incoming request data
        $request->validate([
            'main_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Adjust file types and size limit as needed
        ]);

        // Handle file upload if a file is provided
        if ($request->hasFile('main_file')) {
            // Generate a unique file name
            $fileName = time().'.'.$request->file('main_file')->extension();
            // Move the uploaded file to the desired destination
            $request->file('main_file')->move(public_path('archive'), $fileName);
        } else {
            $fileName = null; // If no file is provided, set fileName to null
        }

        $data_insert = Archive::create([
            'journal_id'=> $request->journal_id,
            'volume_id'=> $request->volume_id,
            'title'=> $request->title,
            'slug'=> Str::slug($request->title),
            'abstract'=> $request->abstract,
            'keywords'=> $request->keywords,
            'main_file'=> $fileName,
            'archive_link'=> $request->archive_link,
        ]);

        //Dynamic archive_Author table
        foreach($request->addmore as $key => $value){
            ArchiveAuthor::create(array_merge($value, ['archive_id' => $data_insert->id, 'user_id'=>auth()->id()]));
        }
        return redirect('/create-admin-archive')->with('success', 'Archive has been created successfully');
    }
    public function create_company_post(Request $request)
    {

        $obj = new Company;

        $obj->name  = $request->name;
        $obj->user_id  = $data_insert->id;
        $obj->slug  = Str::slug($request->name, '-');;

        $imageName = time().'.'.$request->logo->extension();

        $request->logo->move(public_path('logo'), $imageName);
        $obj->logo  = $imageName;
        $obj->location  = $request->location;
        $data = $obj->save();


        return redirect()->back()->with('success', 'Company Added Succesfully');
    }

    // archive List for Admin
    public function admin_archive_list(){
        if(Auth::user()->role_id != 1){
            return redirect()->to('/home');
        }
        $archives = Archive::all();
        return view('archive.admin_archive_list', compact('archives'));
    }


    //Delete Archive by Admin
    public function destroy_admin_archive($id) {
        DB::delete('delete from archives where id = ?',[$id]);
        return redirect('/admin-archive-list')->with('success', 'Archive has been remove successfully');
     }

    // create Issue
    public function create_issue(){
        if(Auth::user()->role_id == 2){
            return redirect()->to('/home');
        }
        if(Auth::user()->role_id == 3){
            return redirect()->to('/home');
        }
        $issues = Issue::all();
        return view('volume.create_issue', compact('issues'));
    }

    //Store Issue
    public function store_issue(Request $request){
        $data = $request->all();
        $issue_insert = Issue::create($data);
        return redirect('/create-issue')->with('success', 'Issue has been added successfully');
    }

    //Delete Issue
    public function destroy_issue($id) {
        DB::delete('delete from issues where id = ?',[$id]);
        return redirect('/create-issue')->with('success', 'Issue has been remove successfully');
    }

}
