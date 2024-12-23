@if(Auth::user()->role_id == 1)
@extends('layouts.journal_app')

@section('content')
<section>
    <div class="container-fluid">
        <div class="card card-default">
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
        <div class="card-header">  
            <h5 class="card-title">User Role Information</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Create Role') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/create-user-role">
                            @csrf
                            
                            <div class="form-group row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Role Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Role') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                <div class="card-header">Role List</div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>ID</th>
                                <th>Name</th>
                                </tr>
                            </tfoot>
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
@endif
