@extends('layouts.journal_app')
@section('content')

@if(Auth::user()->role_id == 4)
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Archive List</h5>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped table-bordered" style="width:100%"> 
                            <thead>
                                <tr>
                                    <th>Archive Title</th>
                                    <th>Abstract</th>
                                    <th>Archive File</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($archives as $archive)
                                <tr>
                                    <td>{{$archive->title}}</td>
                                    <td>{!!$archive->abstract!!}</td>
                                    <td><a  class="btn btn-link" href="{{$archive->archive_link}}">Link</a></td>
                                    <td><a class="btn btn-danger" href = 'delete-archive/{{ $archive->id }}'>Delete</a></td>
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

@endif
@endsection

