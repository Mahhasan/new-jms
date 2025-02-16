@extends('layouts.journal_app')
@section('content')

@if(Auth::user()->role_id == 1)
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
                                    <th>Journal</th>
                                    <th>Archive Title</th>
                                    <th>Abstract</th>
                                    <th>Dspace Link</th>
                                    <th>Main File</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($archives as $archive)
                                <tr>
                                    <td>{{$archive->journal->short_name}}</td>
                                    <td>{{$archive->title}}</td>
                                    <td>{!!$archive->abstract!!}</td>
                                    <td>
                                        @if ($archive->archive_link)
                                         <a  class="btn btn-link" href="{{$archive->archive_link}}">Link</a></td>
                                         @else
                                            No Link
                                        @endif
                                    <td>
                                        @if ($archive->main_file)
                                            <a href="/archive/{{$archive->main_file}}" target="_blank">Download</a>
                                        @else
                                            No File Available
                                        @endif
                                    </td>
                                    <td><a class="btn btn-danger" href = 'delete-admin-archive/{{ $archive->id }}'>Delete</a></td>
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

