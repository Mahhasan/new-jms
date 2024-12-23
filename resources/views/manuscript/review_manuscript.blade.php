@if(Auth::user()->role_id == 3)
@extends('layouts.journal_app')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                
                <div class="card">
                    <div class="card-header"> 
                        <h5 class="card-title">Manuscript Lists For Reviewer Comment</h5>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Paper ID</th>
                                    <th>Journal</th>
                                    <!-- <th>Author</th> -->
                                    <th>Paper Title</th>
                                    <th>Abstract</th>
                                    <th>Keywords</th>
                                    <th>Review Status</th>
                                    <th>Main File</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rev_manuscripts as $rev_manuscript)
                                <tr>
                                    <td>{{$rev_manuscript->manuscript_id}}</td>
                                    <td>{{$rev_manuscript->journal->short_name}}</td>
                                    <!-- <td>{{$rev_manuscript->manuscript->user->first_name}} {{$rev_manuscript->manuscript->user->last_name}}</td> -->
                                    <td>{{$rev_manuscript->manuscript->paper_title}}</td>
                                    <td>{!!$rev_manuscript->manuscript->abstract!!}</td>
                                    <td>{{$rev_manuscript->manuscript->keywords}}</td>
                                    <td><p class="bg-primary text-light rounded">{{$rev_manuscript->status}}</p></td>
                                    <td> <a href="/article/{{$rev_manuscript->manuscript->main_file}}" target=_blank>Download</a></td>
                                    <td><a href="/reviewer-manuscript-details/{{$rev_manuscript->manuscript_id}}"  class="btn btn-success">Details</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Main content -->
@endsection
@endif