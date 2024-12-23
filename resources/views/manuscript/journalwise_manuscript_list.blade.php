@if(Auth::user()->role_id == 4)

@extends('layouts.journal_app')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Manuscript Lists</h5>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Paper ID</th>
                                    <th>Journal</th>
                                    <th>Author</th>
                                    <th>Paper Title</th>
                                    <th>Tracking</th>
                                    <th>Main File</th>
                                    <th>Camera Ready Manuscript</th>
                                    <th>Details</th>
                                    <!-- <th>Delete</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($journal_manuscripts as $journal_manuscript)
                                <tr>
                                    <td>{{$journal_manuscript->id}}</td>
                                    <td>{{$journal_manuscript->journal->short_name}}</td>
                                    <td>{{$journal_manuscript->user->first_name}} {{$journal_manuscript->user->last_name}}</td>
                                    <td>{{$journal_manuscript->paper_title}}</td>
                                    <td><p class="bg-primary text-light rounded">{{$journal_manuscript->status}}</p></td>
                                    <td> <a href="/article/{{$journal_manuscript->main_file}}" target=_blank>Download</a></td>
                                    <td> 
                                    @if($journal_manuscript->updated_file == NULL)
                                    No File
                                    @else
                                    <a href="/updatedfile/{{$journal_manuscript->updated_file}}" target=_blank>Download</a>
                                    @endif
                                    </td>
                                    <td><a href="/manuscript-details/{{$journal_manuscript->id}}"  class="btn btn-success">Details</a></td>
                                    <!-- <td><a class="btn btn-danger" href="">Delete</a></td> -->
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
