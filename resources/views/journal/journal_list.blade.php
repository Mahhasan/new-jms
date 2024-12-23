@if(Auth::user()->role_id == 1)

@extends('layouts.journal_app')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Journal List</h5>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Executive Editor</th>
                                    <th>Full Name</th>
                                    <th>Short Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($journals as $journal)
                                <tr>
                                    <td>{{$journal->id}}</td>
                                    <td>{{$journal->user->first_name}} {{$journal->user->last_name}}</td>
                                    <td>{{$journal->full_name}}</td>
                                    <td>{{$journal->short_name}}</td>
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

