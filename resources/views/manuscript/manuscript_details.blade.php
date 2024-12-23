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

          @if(Auth::user()->role_id == 1)


          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                  <table class="table table-striped table-bordered" style="width:100%">
                  <tr>
                    <th class="col-sm-2">Paper ID</th>
                    <td>{{$manuscripts->id}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Paper Title</th>
                    <td>{{$manuscripts->paper_title}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Abstract</th>
                    <td>{!!$manuscripts->abstract!!}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Kewords</th>
                    <td>{{$manuscripts->keywords}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Area of Research</th>
                    <td>{{$manuscripts->topic->name}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Author Name</th>
                    <td>{{$manuscripts->user->first_name}} {{$manuscripts->user->last_name}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Author Email</th>
                    <td>{{$manuscripts->user->email}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Co-Author</th>
                    <td>@foreach($authors as $author)
                          {{$author->title}} {{$author->name}} {{$author->family_name}}
                        @endforeach</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Organization</th>
                    <td>{{$manuscripts->user->organization}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Author Country</th>
                    <td>{{$manuscripts->user->country}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Reviewer</th>
                    <td>@foreach($reviewers as $reviewer)
                          {{$reviewer->reviewers->first_name}} {{$reviewer->reviewers->last_name}}<br>
                        @endforeach</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Status</th>
                    <td>{{$manuscripts->status}}</td>
                  </tr>
                </table>

                <dl class="row">
                  <dt class="col-sm-2">Update Status</dt>
                  <dd class="col-sm-10">
                  <form method="POST" action="/manuscript-details/{{$id}}">
                     @csrf
                     @method('PUT')
                      <div class="row align-items-center col-sm-10">
                        <div class="col-sm-4">
                          <select type="text" Name="status" class="form-control mb-2" id="inlineFormInput" placeholder="Update Status">
                            <option value="">{{$manuscripts->status}}</option>
                            <option value="Received">Received</option>
                            <option value="Under primary screening">Under primary screening</option>
                            <option value="Screened out (rejected)">Screened out (rejected)</option>
                            <option value="Listed for presenting to the editorial board">Listed for presenting to the editorial board</option>
                            <option value="Delisted by the editorial board (rejected)">Delisted by the editorial board (rejected) </option>
                            <option value="Suggested for sending to a reviewer by editorial board">Suggested for sending to a reviewer by editorial board</option>
                            <option value="Sent to reviewer">Sent to reviewer</option>
                            <option value="Rejected by reviewer">Rejected by reviewer </option>
                            <option value="Accepted by reviewer">Accepted by reviewer</option>
                            <option value="Suggested for modification by reviewer">Suggested for modification by reviewer</option>
                            <option value="Going through proofreading">Going through proofreading</option>
                            <option value="Being prepared for publication">Being prepared for publication</option>
                            <option value="Sent to press">Sent to press</option>
                            <option value="Published (online)">Published (online)</option>
                            <option value="Published (print)">Published (print)</option>
                          </select>
                        </div>
                        <div class="col-sm-2">
                          <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </div>
                      </div>
                    </form>
                  </dd>
                </dl>
                <br>
              </div>
            </div>
          </div>
          <br>

          @elseif(Auth::user()->role_id == 2)
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
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <table class="table table-striped table-bordered" style="width:100%">
                  <tr>
                    <th class="col-sm-2">Paper ID</th>
                    <td>{{$manuscripts->id}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Paper Title</th>
                    <td>{{$manuscripts->paper_title}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Abstract</th>
                    <td>{!!$manuscripts->abstract!!}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Kewords</th>
                    <td>{{$manuscripts->keywords}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Area of Research</th>
                    <td>{{$manuscripts->topic->name}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Author Name</th>
                    <td>{{$manuscripts->user->first_name}} {{$manuscripts->user->last_name}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Author Email</th>
                    <td>{{$manuscripts->user->email}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Co-Author</th>
                    <td>@foreach($authors as $author)
                          {{$author->title}} {{$author->name}} {{$author->family_name}}
                        @endforeach</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Organization</th>
                    <td>{{$manuscripts->user->organization}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Author Country</th>
                    <td>{{$manuscripts->user->country}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Status</th>
                    <td>{{$manuscripts->status}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Editor Comment</th>
                    <td>{!!$manuscripts->editor_comment!!}</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <!-- Attach Updated File-->
          <div class="card">
            <div class="card-header">Attach Updated File</div>
            <div class="card-body">
                <form method="POST" action="/attache-updated-file/{{$id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <!-- <label for="exampleInputname">Attach Updated File</label> -->
                        <input type="file" value="{{old('mobile')}}" name="updated_file" class="form-control" placeholder="Updated File">
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


          @elseif(Auth::user()->role_id == 3)
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
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <table class="table table-striped table-bordered" style="width:100%">
                  <tr>
                    <th class="col-sm-2">Paper ID</th>
                    <td>{{$manuscripts->id}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Paper Title</th>
                    <td>{{$manuscripts->paper_title}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Abstract</th>
                    <td>{!!$manuscripts->abstract!!}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Kewords</th>
                    <td>{{$manuscripts->keywords}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Area of Research</th>
                    <td>{{$manuscripts->topic->name}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Author Name</th>
                    <td>{{$manuscripts->user->first_name}} {{$manuscripts->user->last_name}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Author Email</th>
                    <td>{{$manuscripts->user->email}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Co-Author</th>
                    <td>@foreach($authors as $author)
                          {{$author->title}} {{$author->name}} {{$author->family_name}}
                        @endforeach</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Organization</th>
                    <td>{{$manuscripts->user->organization}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Author Country</th>
                    <td>{{$manuscripts->user->country}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Status</th>
                    <td>{{$manuscripts->status}}</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <!-- Attach Updated File-->
          <div class="card">
            <div class="card-header">Attach Updated File</div>
            <div class="card-body">
                <form method="POST" action="/attache-updated-file/{{$id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <!-- <label for="exampleInputname">Attach Updated File</label> -->
                        <input type="file" value="{{old('mobile')}}" name="updated_file" class="form-control" placeholder="Updated File">
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

          @elseif(Auth::user()->role_id == 4)
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <table class="table table-striped table-bordered" style="width:100%">
                  <tr>
                    <th class="col-sm-2">Paper ID</th>
                    <td>{{$manuscripts->id}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Paper Title</th>
                    <td>{{$manuscripts->paper_title}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Abstract</th>
                    <td>{!!$manuscripts->abstract!!}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Kewords</th>
                    <td>{{$manuscripts->keywords}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Area of Research</th>
                    <td>{{$manuscripts->topic->name}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Author Name</th>
                    <td>{{$manuscripts->user->first_name}} {{$manuscripts->user->last_name}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Author Email</th>
                    <td>{{$manuscripts->user->email}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Co-Author</th>
                    <td>@foreach($authors as $author)
                          {{$author->title}} {{$author->name}} {{$author->family_name}}
                        @endforeach</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Organization</th>
                    <td>{{$manuscripts->user->organization}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Author Country</th>
                    <td>{{$manuscripts->user->country}}</td>
                  </tr>
                  <tr>
                    <th class="col-sm-2">Status</th>
                    <td>{{$manuscripts->status}}</td>
                  </tr>
                  @foreach($reviewers as $key => $reviewer)
                  <tr>
                    <th class="col-sm-2">Reviewer {{ ++$key }}</th>
                    <td>
                      <div class=" row col-md-12">
                        <div class="col-md-5">{{$reviewer->reviewers->first_name}} {{$reviewer->reviewers->last_name}} </div>
                        <div class="col-md-7">
                            @if($reviewer->reviewed_file == NULL)
                            Reviewer did not submit the comment file.
                            @else
                            Reviewed File :
                            <a href="/reviewed/{{$reviewer->reviewed_file}}" target=_blank>Download</a>
                            @endif
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  <!-- <tr>
                    <th class="col-sm-2">Rviewer Comment</th>
                    <td>@foreach($reviewers as $reviewer)
                          {!!$reviewer->reviewer_comment!!}
                        @endforeach</td>
                  </tr> -->

                  <!-- @foreach($reviewed_files as $reviewed_file)
                  <tr>
                    <th class="col-sm-2">Reviewed File</th>
                    <td>
                          <a href="/reviewed/{{$reviewed_file->reviewed_file}}" target=_blank>Download</a>
                    </td>
                  </tr>
                  @endforeach -->
                </table>

                <dl class="row">
                  <dt class="col-sm-2">Update Status</dt>
                  <dd class="col-sm-10">
                    <form method="POST" action="/manuscript-details/{{$id}}">
                     @csrf
                     @method('PUT')
                      <div class="row align-items-center col-sm-10">
                        <div class="col-sm-4">
                          <select type="text" Name="status" class="form-control mb-2" id="inlineFormInput" placeholder="Update Status">
                            <option value="">{{$manuscripts->status}}</option>
                            <option value="Received">Received</option>
                            <option value="Under primary screening">Under primary screening</option>
                            <option value="Screened out (rejected)">Screened out (rejected)</option>
                            <option value="Listed for presenting to the editorial board">Listed for presenting to the editorial board</option>
                            <option value="Delisted by the editorial board (rejected)">Delisted by the editorial board (rejected) </option>
                            <option value="Suggested for sending to a reviewer by editorial board">Suggested for sending to a reviewer by editorial board</option>
                            <option value="Sent to reviewer">Sent to reviewer</option>
                            <option value="Rejected by reviewer">Rejected by reviewer </option>
                            <option value="Accepted by reviewer">Accepted by reviewer</option>
                            <option value="Suggested for modification by reviewer">Suggested for modification by reviewer</option>
                            <option value="Going through proofreading">Going through proofreading</option>
                            <option value="Being prepared for publication">Being prepared for publication</option>
                            <option value="Sent to press">Sent to press</option>
                            <option value="Published (online)">Published (online)</option>
                            <option value="Published (print)">Published (print)</option>
                          </select>
                        </div>
                        <div class="col-sm-2">
                          <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </div>
                      </div>
                    </form>
                  </dd>
                </dl>
                <br>
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
                <!-- Reviewer Selection -->
                <div class="card">
                  <div class="card-header">Reviewer Selection</div>
                  <div class="card-body">
                    <form method="POST" action="/editor-journal-list">
                      @csrf
                      <input type="hidden" name="status" value="Panding">
                      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                      <input type="hidden" name="manuscript_id" value="{{$manuscripts->id}}">
                      <input type="hidden" name="journal_id" value="{{$manuscripts->journal_id}}">
                      <div class="form-group col-sm-4">
                        <label>Reviewer</label>
                        <select class="form-control js-example-basic-single" name="reviewer">
                          @foreach($users as $user)
                          <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-sm-4 mt-3">
                        <div class="col-sm-4">
                          <label></label>
                          <button type="submit" class="btn btn-primary">
                              {{ __('Submit') }}
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <br>
                <!-- Editor Comment -->
                <div class="card">
                  <div class="card-header">Send a comment to Author</div>
                  <div class="card-body">
                    <form method="POST" action="/editor-comment/{{$id}}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <textarea name="editor_comment" class="form-control" placeholder="Editor Comment"></textarea>
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
          @endif
        </div>
      </div>
    </div>

    @if(Auth::user()->role_id == 1)
    <!-- Reviewer Selection -->
    <div class="row mt-5">
      <div class="col-12">
        <div class="card">
          <div class="card-header">Reviewer Selection</div>
          <div class="card-body col-sm-12">
            <div class="row">
              <form method="POST" action="/reviewer-selection">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="manuscript_id" value="{{$manuscripts->id}}">
                <input type="hidden" name="journal_id" value="{{$manuscripts->journal_id}}">
                <div class="form-group col-sm-4">
                  <label>Reviewer</label>
                  <select class="form-control js-example-basic-single" name="reviewer" width="100%">
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group col-sm-4 mt-3">
                  <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
</section>
<script>
      $(document).ready(function() {
      $('.js-example-basic-single').select2();
      });
</script>
<!-- ckeditor -->
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor_comment' );
</script>
@endsection


