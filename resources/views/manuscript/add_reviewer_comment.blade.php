@if(Auth::user()->role_id == 3)
@extends('layouts.journal_app')
@section('content')
    
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Manuscript Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-striped table-bordered" style="width:100%">
                                    <tr>
                                        <th class="col-sm-2">Paper ID</th>
                                        <td>{{$reviewers->manuscript_id}}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2">Paper Title</th>
                                        <td>{{$reviewers->manuscript->paper_title}}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2">Abstract</th>
                                        <td>{!!$reviewers->manuscript->abstract!!}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2">Kewords</th>
                                        <td>{{$reviewers->manuscript->keywords}}</td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2">Area of Research</th>
                                        <td>{{$reviewers->manuscript->topic->name}}</td>
                                    </tr>
                                </table>

                                <!-- Reviewer Comment-->
                                <div class="card">
                                    <div class="card-header">Reviewer Comment</div>
                                    <div class="card-body">
                                        <div>
                                            <button><a style="text-decoration: none;" href="/reviewer_comment_file/{{$reviewers->journal->reviewer_comment_file}}" target=_blank>Please Download this file and write your comment</a></button>
                                        </div>
                                        <form method="POST" action="/reviewer-comment/{{$id}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            @if ($errors->any())
                                            <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                            </div>
                                            @endif

                                            @if(session()->get('success'))
                                                <div class="alert alert-success">
                                                {{ session()->get('success') }}  
                                                </div><br />
                                            @endif
                                            <div class="form-group"><br>
                                                <label for="exampleInputname">Attach Reviewed File</label>
                                                <input type="hidden" name="status" value="Submitted">
                                                <input type="file" value="{{old('mobile')}}" name="reviewed_file" class="form-control" placeholder="Enter Mobile No">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label></label>
                                                <button type="submit" class="btn btn-primary">
                                                        {{ __('Submit') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</section>
<!-- ckeditor -->
<!-- <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'reviewer_comment' );
</script> -->
@endsection
@endif


