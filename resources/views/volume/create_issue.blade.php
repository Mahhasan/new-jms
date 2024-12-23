@extends('layouts.journal_app')
@section('content')
<!-- Main content -->
<section class="content col-md-12">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">  
        <h5 class="card-title">Issue</h5>
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
              <div class="card-header">Add Issue</div>
              <form action="/create-issue" method="post">
                @csrf
               
                <div class="card-body">
                  <div class="form-group">
                    <label for="issue">Issue</label>
                    <input type="text" name="issue" class="form-control" id="issue" placeholder="Enter Issue" required>
                    @error('issue')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
                    <div class="card-header">Issue List</div>
                    <div class="card-body col-md-12">
                        <table id="datatablesSimple" class="table table-striped table-bordered" style="width:100%"> 
                            <thead>
                                <tr>
                                    <th>Issue</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($issues as $issue)
                                <tr>
                                    <td>{{$issue->issue}}</td>
                                    <td><a class="btn btn-danger" href = 'delete-issue/{{ $issue->id }}'>Delete</a></td>
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
@endsection



