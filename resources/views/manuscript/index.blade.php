@extends('layouts.journal_app')
@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
        <h5 class="card-title">Manuscript Information</h5>
      </div>
      <!-- /.card-header -->
      <div class="card-body col-md-12">
        <form action="/manuscript_submission" method="POST" enctype="multipart/form-data">
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
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input name="status" type="hidden" value="Under Fisrt Screening">
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label for="title">Select Journal:</label>
                <select name="journal_id" class="form-control" required>
                  <option value="">--- Select Journal ---</option>
                  @foreach($journals as $key=>$value)
                    <option value="{{$key}}">{{$value}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="title">Select Topic:</label>
                <select name="topic_id" class="form-control" required>
                  <option selected>--- Select Topic ---</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="exampleInputname">Paper Title</label>
                <textarea name="paper_title" class="form-control" placeholder="Paper Title" required></textarea>
              </div>
              <div class="form-group mb-3">
                <label for="exampleInputEmail1">Specific Area</label>
                <input type="text" name="specific_area" class="form-control" placeholder="Specific Research Area">
              </div>
              <div class="form-group mb-3">
                <label for="exampleInputname">keywords</label>
                <input type="text" name="keywords" class="form-control" placeholder="Keywords" required>
              </div>
              <div class="form-group mb-4">
                <label for="exampleInputname">Attach Full Paper</label>
                <input type="file" value="{{old('mobile')}}" name="main_file" class="form-control" placeholder="Enter Mobile No" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-4">
                <label for="exampleInputname">Abstract</label>
                <textarea name="abstract" class="form-control" placeholder="Abstract" required></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">Co-Authors Information (if any)</div>
                <div class="card-body">
                  <table class="table table-striped" id="dynamicTable">
                    <thead>
                      <tr>
                        <th>Email</th>
                        <th>Title</th>
                        <th>First Name</th>
                        <th>Family Name</th>
                        <th>Organization</th>
                        <th>Country</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>
                            <div class="form-group">
                              <input type="text" name="addmore[0][email]" class="form-control" placeholder="Enter Email">
                            </div>
                          </td>
                          <td>
                            <div class="form-group">
                              <select class="form-control select2bs4" name="addmore[0][title]">
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
                              <input type="text" name="addmore[0][name]" class="form-control" placeholder="First Name">
                            </div>
                          </td>
                          <td>
                            <div class="form-group">
                              <input type="text" name="addmore[0][family_name]" class="form-control" placeholder="Family Name">
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <input type="text" name="addmore[0][organization]" class="form-control" placeholder="Enter Organization">
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                              <input type="text" name="addmore[0][country]" class="form-control" placeholder="Enter Country">
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
            <input type="submit" class="btn btn-block btn-success" name="submit" class="form-control" value="Submit">
          </div>
        </form>
      </div>
      <!-- /.card-body -->
      <!-- <div class="card-footer">
      </div> -->
    </div>
  </div>
</section>

<!-- For dependency field -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="journal_id"]').on('change', function() {
            var journalID = $(this).val();
            if(journalID) {
                $.ajax({
                    url: '/myform/ajax/'+journalID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="topic_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="topic_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="topic_id"]').empty();
            }
        });
    });
</script>

<!-- For dynamic table -->
<script type="text/javascript">
  var i = 0;
  $("#add").on("click",function(){
    i++;
    $("#dynamicTable").append('<tr><td><div class="form-group"><input type="text" name="addmore['+i+'][email]" class="form-control" placeholder="Enter Email"></div></td><td><div class="form-group"><select name="addmore['+i+'][title]" class="form-control"><option>Dr.</option><option>Mr.</option><option>Ms.</option><option>Mrs.</option><option>Prof.</option></select></div> </td><td><div class="form-group"><input type="text" name="addmore['+i+'][name]" class="form-control" placeholder="First Name"></div></td><td><div class="form-group"><input type="text" name="addmore['+i+'][family_name]" class="form-control" placeholder="Family Name"></div></td><td><div class="form-group"><input type="text" name="addmore['+i+'][organization]" class="form-control" placeholder="Enter Organization"></div></td><td><div class="form-group"><input type="text" name="addmore['+i+'][country]" class="form-control" placeholder="Enter Country"></div></td><td><div class="form-group"><input type="button" class="btn btn-block btn-info btn-sm btn btn-danger remove-tr" value="Remove"></div></td></tr>');

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
@endsection



