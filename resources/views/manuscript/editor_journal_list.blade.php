@if(Auth::user()->role_id == 4)

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
                        <table class="table table-bordered"> 
                            <tr>
                                <th>Journal</th>
                            </tr>
                            
                            @foreach($journals as $journal)
                            <tr>
                                <td><a href="/journalwise-manuscript-list/{{$journal->id}}">{{$journal->full_name}}</a></td>
                            </tr>
                            @endforeach
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
