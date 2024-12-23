@extends('layouts.journal_app')
@section('content')
@if(Auth::user()->role_id == 1)
<!-- Main content -->
<section class="content col-md-12">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">  
        <h5 class="card-title">Add Volume</h5>
      </div>
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
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">Volume</div>
              <form action="/create-volume" method="post">
                @csrf
                
                <div class="card-body">
                  <div class="form-group">
                    <label for="volume_number">Journal</label>
                    <select name="journal_id" class="form-control" required>
                      <option value="">--- Add Journal ---</option>
                      @foreach($journals as $journal)
                      <option value="{{$journal->id}}">{{$journal->full_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="volume_number">Volume</label>
                    <input type="text" name="volume_number" class="form-control" id="volume_number" placeholder="Enter Volume" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="issue_id">Issue</label>
                    <select name="issue" class="form-control" required>
                      <option value="">--- Add Issue ---</option>
                      @foreach($issues as $issue)
                      <option value="{{$issue->issue}}">{{$issue->issue}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="year">year</label>
                    <input type="text" name="year" class="form-control" id="year" placeholder="Enter Year" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-6">
                <div class="card">
                    <div class="card-header">Volume List</div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped table-bordered" style="width:100%"> 
                            <thead>
                                <tr>
                                    <th>Volume</th>
                                    <th>Year</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($volumes as $volume)
                                <tr>
                                    <td>{{$volume->volume_number}}</td>
                                    <td>{{$volume->year}}</td>
                                    <td><a class="btn btn-danger" href = 'delete-volume/{{ $volume->id }}'>Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>   
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
      </div>
    </div>
  </div>
</section>
@elseif(Auth::user()->role_id == 4)

<!-- Main content -->
<section class="content col-md-12">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">  
        <h5 class="card-title">Add Volume</h5>
      </div>
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
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">Volume</div>
              <form action="/create-volume" method="post">
              @csrf
                <div class="card-body">
                  <input type="hidden" name="journal_id" value="{{$editor_journal->id}}">
                  <div class="form-group">
                    <label for="volume_number">Volume</label>
                    <input type="text" name="volume_number" class="form-control" id="exampleInputEmail1" placeholder="Enter Volume" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="issue_id">Issue</label>
                    <select name="issue" class="form-control" required>
                      <option value="">--- Add Issue ---</option>
                      @foreach($issues as $issue)
                      <option value="{{$issue->id}}">{{$issue->issue}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="year">year</label>
                    <input type="text" name="year" class="form-control" id="exampleInputEmail1" placeholder="Enter Year" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-6">
                <div class="card">
                  <div class="card-header">Volume List</div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped table-bordered" style="width:100%"> 
                            <thead>
                                <tr>
                                    <th>Volume</th>
                                    <th>Year</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($volumes as $volume)
                                <tr>
                                    <td>{{$volume->volume_number}}</td>
                                    <td>{{$volume->year}}</td>
                                    <td><a class="btn btn-danger" href = 'delete-volume/{{ $volume->id }}'>Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>   
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
      </div>
    </div>
  </div>
</section>
@endif
@endsection


