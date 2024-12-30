@extends('layouts.journal_app')
@section('content')

<section class="content-wrapper">
    <div class="">
        <div class="row">
            <div class="col-12">

             @if(Auth::user()->role_id == 1)
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Manuscript Lists</h5>
                    </div>
                    <div class="card-body">
                        <table id="" class="table table-bordered table-hover datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Paper ID</th>
                                    <th>Journal</th>
                                    <th>Author</th>
                                    <th>Paper Title</th>
                                    <th>Tracking</th>
                                    <th>Main File</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($manuscripts as $manuscript)
                                <tr>
                                    <td>{{$manuscript->id}}</td>
                                    <td>{{$manuscript->journal->short_name}}</td>
                                    <td>{{$manuscript->user->first_name}} {{$manuscript->user->last_name}}</td>
                                    <td>{{$manuscript->paper_title}}</td>
                                    <td><p class="bg-primary text-light rounded">{{$manuscript->status}}</p></td>
                                    <td> <a href="/article/{{$manuscript->main_file}}" target=_blank>Download</a></td>
                                    <td><a href="/manuscript-details/{{$manuscript->id}}"  class="btn btn-success">Details</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

             @elseif(Auth::user()->role_id == 2)
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Manuscript Lists</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover datatable" style="width:100%">
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
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($authors as $author)
                                <tr>
                                    <td>{{$author->id}}</td>
                                    <td>{{$author->journal->short_name}}</td>
                                    <td>{{$author->user->first_name}} {{$author->user->last_name}}</td>
                                    <td>{{$author->paper_title}}</td>
                                    <td><p class="bg-primary text-light rounded"> {{ $author->status }} </p></td>
                                    <!-- <td>{{$author->topic->status == 1 ? 'Active' : 'In-Active'}}</td> -->
                                    <td> <a href="/article/{{$author->main_file}}" target=_blank>Download</a></td>
                                    <td>
                                    @if($author->updated_file == NULL)
                                    No File
                                    @else
                                    <a href="/updatedfile/{{$author->updated_file}}" target=_blank>Download</a>
                                    @endif
                                    </td>
                                    <td><a href="/manuscript-details/{{$author->id}}"  class="btn btn-success">Details</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

             @elseif(Auth::user()->role_id == 3)
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Manuscript Lists</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Paper ID</th>
                                    <th>Journal</th>
                                    <th>Author</th>
                                    <th>Paper Title</th>
                                    <th>Tracking</th>
                                    <th>Main File</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $author)
                                <tr>
                                    <td>{{$author->id}}</td>
                                    <td>{{$author->journal->short_name}}</td>
                                    <td>{{$author->user->first_name}} {{$author->user->last_name}}</td>
                                    <td>{{$author->paper_title}}</td>
                                    <td><p class="bg-primary text-light rounded">{{$author->status}}</p></td>
                                    <td> <a href="/article/{{$author->main_file}}" target=_blank>Download</a></td>
                                    <td><a href="/manuscript-details/{{$author->id}}"  class="btn btn-success">Details</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                @elseif(Auth::user()->role_id == 4)

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Manuscript Lists</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Paper ID</th>
                                    <th>Journal</th>
                                    <th>Paper Title</th>
                                    <th>Area</th>
                                    <th>Specific Area</th>
                                    <th>Tracking</th>
                                    <th>Main File</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $author)
                                <tr>
                                    <td>{{$author->id}}</td>
                                    <td>{{$author->journal->short_name}}</td>
                                    <td>{{$author->paper_title}}</td>
                                    <td>{{$author->topic->name}}</td>
                                    <td>{{$author->specific_area}}</td>
                                    <td><p class="bg-primary text-light rounded">{{$author->status}}</p></td>
                                    <td> <a href="/article/{{$author->main_file}}" target=_blank>Download</a></td>
                                    <td><a href="/manuscript-details/{{$author->id}}"  class="btn btn-success">Details</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>


@endsection


