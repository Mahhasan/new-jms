@extends('layouts.journal_app')
@section('content')
@if(Auth::user()->role_id == 4)
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
        <h5 class="card-title">Add Archive</h5>
      </div>
      <!-- /.card-header -->
      <div class="card-body col-md-12">
        <form action="/create-archive" method="POST" enctype="multipart/form-data">
          @csrf
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

          <div class="row">
            <input type="hidden" name="journal_id" value="{{$journals->id}}">
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label for="volume_number">Volume</label>
                <select name="volume_id" class="form-control" required>
                  <option value="">--- Add Volume ---</option>
                  @foreach($volumes as $volume)
                    <option value="{{$volume->id}}">
                      Volume No: {{$volume->volume_number}}, &nbsp;
                      Issue: {{$volume->issue}}, &nbsp;
                      Year: {{$volume->year}},
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="exampleInputname">Title</label>
                <textarea name="title" class="form-control" placeholder="Title" required></textarea>
              </div>
              <div class="form-group mb-3">
                <label for="keywords">Keywords</label>
                <input name="keywords" class="form-control" id="keywords" placeholder="Keywords">
              </div>
              <div class="form-group mb-4">
                <label for="exampleInputname">Link</label>
                <input type="url" name="archive_link" class="form-control" placeholder="Archive Link" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-4">
                <label for="exampleInputname">Abstract</label>
                <textarea name="abstract" class="form-control" required></textarea>
              </div>
            </div>
          </div>
      
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">Authors Information</div>
                <div class="card-body">
                  <table class="table table-striped" id="dynamicTable">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Organization</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>
                            <div class="form-group">
                              <select class="form-control select2bs4" name="addmore[0][title]">
                                <option selected="selected" value="">Title</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Miss.">Miss.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms.">Ms.</option>
                                <option value="Prof.">Prof.</option>
                              </select>
                            </div> 
                          </td>
                          <td>
                            <div class="form-group">
                              <input type="text" name="addmore[0][name]" class="form-control" placeholder="Name" required>
                            </div>
                          </td>
                          <td>
                            <div class="form-group">
                              <input type="text" name="addmore[0][organization]" class="form-control" placeholder="Enter Organization">
                            </div>
                          </td>
                          <td>
                            <div class="form-group">
                              <input type="button" name="add" id="add" class="btn btn-block btn-info btn-sm" value="More">
                            </div>
                          </td>
                        </tr>   
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group mt-3">  
            <input type="submit" class="btn btn-block btn-success btn-lg" name="submit" class="form-control" value="Save">
          </div>
        </form>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
      </div>
    </div>
  </div>
</section>
<!-- Dynamic Table -->
<script type="text/javascript">
  var i = 0;   
  $("#add").on("click",function(){
    i++;
    $("#dynamicTable").append('<tr></td><td><div class="form-group"><select name="addmore['+i+'][title]" class="form-control"><option>Dr.</option><option>Mr.</option><option>Ms.</option><option>Mrs.</option><option>Prof.</option></select></div> </td><td><div class="form-group"><input type="text" name="addmore['+i+'][name]" class="form-control" placeholder="First Name"></div></td><td><div class="form-group"><input type="text" name="addmore['+i+'][organization]" class="form-control" placeholder="Enter Organization"></div></td><td><div class="form-group"><input type="button" class="btn btn-block btn-info btn-sm btn btn-danger remove-tr" value="Remove"></div></td></tr>');
    
  });

  $(document).on('click', '.remove-tr', function(){  
      $(this).parents('tr').remove();
  });
</script>

<!-- ckeditor -->
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'abstract' );
</script>
@endif
@endsection



