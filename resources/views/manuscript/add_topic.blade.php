@if(Auth::user()->role_id == 1)
@extends('layouts.journal_app')
@section('content')

<!-- Main content -->
<section>
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">  
        <h5 class="card-title">Topic Information</h5>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
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
          </div><br/>
        @endif

        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">Paper Topic</div>
              <form action="/add-topic" method="post">
                @csrf
                <div class="card-body">
                <div class="form-group">
                    <label>Define Journal</label>
                    <select class="form-control select2bs4" name="journal_id" style="width: 100%;">
                      @foreach($journals as $journal)
                        <option value="{{$journal->id}}">{{$journal->full_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Topic</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Topic">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputname">Status</label>
                    <select class="form-control select2bs4" name="status" style="width: 100%;">
                      <option selected="selected" value="1">Active</option>
                      <option value="2">In-Active</option>
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">Paper Topic List</div>
              <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Journal</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($topics as $topic)
                    <tr>
                      <td>{{$topic->name}}</td>
                      <td>{{$topic->journal->short_name}}</td>
                      <td>{{$topic->status == 1 ? 'Active' : 'In-Active'}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Title</th>
                      <th>Journal</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
         <!-- /.row -->
         
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
      </div>
    </div>
  </div>
</section>
@endsection
@endif

