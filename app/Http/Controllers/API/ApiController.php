<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Archive;
use App\Issue;
use App\Volume;
use App\Manuscript;
use App\ArchiveAuthor;

class ApiController extends Controller
{

    //For recent articles in displayed in index page amd present article page
    public function recentArticles($journal_id)
    {
        $recentArticles = Archive::where('journal_id', $journal_id)->latest()->take(10)->get();
        return response()->json([
            "success" => true,
            "message" => "Recent Articles",
            "data" => $recentArticles
        ]);
    }
    
    //For past article list in displayed in index page amd present article page
    public function pastArticles($journal_id)
    {
        $past_articles = Volume::where('journal_id', $journal_id)->orderBy('volume_number', 'DESC')->get();
        return response()->json([
            "success"=>true,
            "message" => "Past Articles List",
            "data"=> $past_articles
        ]);
    }
    // public function pastArticle($volume_id){
    //     $articles = Archive::where('volume_id', $volume_id)->where('journal_id', 2)->get();
    //     return response()->json([
    //         "success"=>true,
    //         "message" => "Article Details",
    //         "data"=> $articles
    //     ]);
    // }
    public function pastArticleDIUJAHS($volume_number, $issue){
       
        $articles = Archive::join('volumes', 'archives.volume_id', '=', 'volumes.id')
                    ->where('volumes.volume_number', $volume_number)->where('volumes.issue', $issue)->where('archives.journal_id', 1)->get();
        return response()->json([
            "success"=>true,
            "message" => "Article Details",
            "data"=> $articles
        ]);
    }
    public function pastArticleDIUJBE($volume_number, $issue){
       
        $articles = Archive::join('volumes', 'archives.volume_id', '=', 'volumes.id')
                    ->where('volumes.volume_number', $volume_number)->where('volumes.issue', $issue)->where('archives.journal_id', 2)->get();
        return response()->json([
            "success"=>true,
            "message" => "Article Details",
            "data"=> $articles
        ]);
    }
    public function pastArticleDIUJHSS($volume_number, $issue){
       
        $articles = Archive::join('volumes', 'archives.volume_id', '=', 'volumes.id')
                    ->where('volumes.volume_number', $volume_number)->where('volumes.issue', $issue)->where('archives.journal_id', 3)->get();
        return response()->json([
            "success"=>true,
            "message" => "Article Details",
            "data"=> $articles
        ]);
    }
    public function pastArticleDIUJST($volume_number, $issue){
       
        $articles = Archive::join('volumes', 'archives.volume_id', '=', 'volumes.id')
                    ->where('volumes.volume_number', $volume_number)->where('volumes.issue', $issue)->where('archives.journal_id', 4)->get();
        return response()->json([
            "success"=>true,
            "message" => "Article Details",
            "data"=> $articles
        ]);
    }
    
    public function article_details($slug){
       
         $articles = Archive::where('slug', $slug)->first();
        $authors = ArchiveAuthor::where('archive_id', $articles->id)->get();
        return response()->json([
            "success"=>true,
            "message" => "Article Details using Slug",
            "data"=> $articles,
            "author"=> $authors,
        ]);
    }
}