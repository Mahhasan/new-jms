@extends('layouts.journal_app')
@section('content')
@if(Auth::user()->role_id == 1)
<div class="container-fluid px-4">
    <h1 class="mt-20"></h1>
    <div class="row mb-3" style="font-size: 14px;">
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-primary shadow py-2 mb-2">
                <div class="card-body align-items-center">
                    <div class="font-weight-bold text-primary text-uppercase mb-1">Journal</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $journals }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-success  shadow py-2 mb-2">
                <div class="card-body align-items-center">
                    <div class="font-weight-bold text-success text-uppercase mb-1">Total Paper</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $total_paper }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-info shadow py-2 mb-2">
                <div class="card-body align-items-center">
                    <div class="font-weight-bold text-info text-uppercase mb-1">Author</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $authors }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-warning shadow py-2 mb-2">
                <div class="card-body align-items-center">
                    <div class="font-weight-bold text-warning text-uppercase mb-1">Reviewer</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $reviewers }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(Auth::user()->role_id == 2)
<div class="container-fluid px-4">
    <h1 class="mt-20"></h1>
    <div class="row mb-3" style="font-size: 14px;">
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-primary shadow py-2 mb-2">
                <div class="card-body align-items-center">
                    <div class="font-weight-bold text-primary text-uppercase mb-1">Submitted Manuscript</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $manuscripts }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-success  shadow py-2 mb-2">
                <div class="card-body align-items-center">
                    <div class="font-weight-bold text-success text-uppercase mb-1">Pending</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $pending_manuscripts }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-info shadow py-2 mb-2">
                <div class="card-body align-items-center">
                    <div class="font-weight-bold text-info text-uppercase mb-1">Accepted</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $accepted_manuscripts }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-warning shadow py-2 mb-2">
                <div class="card-body align-items-center">
                    <div class="font-weight-bold text-warning text-uppercase mb-1">Rejected</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $rejected_manuscripts }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="card">
        <div class="progress"  style="height: 30px;">
            <div class="progress-bar border bg-success" role="progressbar" style="width: 20%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="90">Paper ID :</div>
            <div class="progress-bar border" role="progressbar" style="width: 20%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="90">Editor</div>
            <div class="progress-bar border bg-secondary" role="progressbar" style="width: 20%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="90">Reviewer</div>
            <div class="progress-bar border bg-secondary" role="progressbar" style="width: 20%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="90">Editor</div>
            <div class="progress-bar border bg-secondary" role="progressbar" style="width: 20%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="90">Accept</div>
        </div>
    </div>
    <br> -->
</div>
<!-- <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-11 col-md-11
            col-lg-11 col-xl-11 text-center p-0 mt-0 mb-2">
            <div class="px-0 pt-4 pb-0 mt-0 mb-3">
                <h2 style="font-size: 1rem;"> My Manuscript Progress Bar </h2>
                <form id="form">
                    <ul id="progressbar">
                        <li class="active" id="step1"><strong> Editor </strong></li>
                        <li class="active" id="step2"> <strong> Reviewer </strong> </li>
                        <li id="step3"> <strong> Reviewer Comment </strong> </li>
                        <li id="step4"> <strong> Editor </strong> </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>   -->

@elseif(Auth::user()->role_id == 3)
<div class="container-fluid px-4">
    <h1 class="mt-20"></h1>
    <div class="row mb-3" style="font-size: 13px;">
        <div class="col-xl-2 col-md-4" style="padding: 0 7px;">
            <div class="card border-left-primary shadow mb-2">
                <div class="card-body" style="padding: 20px 5px; text-align: center;">
                    <div class="font-weight-bold text-primary text-uppercase mb-1">My Manuscript</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $manuscripts }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4" style="padding: 0 7px;">
            <div class="card border-left-warning shadow mb-2">
                <div class="card-body" style="padding: 20px 5px; text-align: center;">
                    <div class="font-weight-bold text-warning text-uppercase mb-1">Pending Manuscript</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $pending_manuscripts }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4" style="padding: 0 7px;">
            <div class="card border-left-info shadow mb-2">
                <div class="card-body"  style="padding: 20px 5px; text-align: center;">
                    <div class="font-weight-bold text-info text-uppercase mb-1">Accepted Manuscript</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $accepted_manuscripts }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4" style="padding: 0 7px;">
            <div class="card border-left-danger shadow mb-2">
                <div class="card-body"  style="padding: 20px 0px; text-align: center;">
                    <div class="font-weight-bold text-danger text-uppercase mb-1">Rejected Manuscript</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $rejected_manuscripts }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4" style="padding: 0 7px;">
            <div class="card border-left-warning shadow mb-2">
                <div class="card-body"  style="padding: 20px 0px; text-align: center;">
                    <div class="font-weight-bold text-warning text-uppercase mb-1">Review Pending</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $pending_review }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4" style="padding: 0 7px;">
            <div class="card border-left-success shadow mb-2">
                <div class="card-body" style="padding: 20px 0px; text-align: center;">
                    <div class="font-weight-bold text-success text-uppercase mb-1">Reviewed Manuscript</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $submitted_review }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(Auth::user()->role_id == 4)
<div class="container-fluid px-4">
    <h1 class="mt-20"></h1>
    <div class="row mb-3" style="font-size: 14px;">
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-primary shadow py-2 mb-2">
                <div class="card-body align-items-center">
                    <div class="font-weight-bold text-primary text-uppercase mb-1">My Manuscript</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $manuscripts }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-success  shadow py-2 mb-2">
                <div class="card-body align-items-center">
                    <div class="font-weight-bold text-success text-uppercase mb-1">Total Manuscript</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $total_paper }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-info shadow py-2 mb-2">
                <div class="card-body align-items-center">
                    <div class="font-weight-bold text-info text-uppercase mb-1">Author</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $authors }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-warning shadow py-2 mb-2">
                <div class="card-body align-items-center">
                    <div class="font-weight-bold text-warning text-uppercase mb-1">Reviewer</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $reviewers }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>
                <div class="card-body">
                    <form method="post" action="/user-profile">
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
                        @method('PUT')

                        <div class="form-group row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6 ">
                                <select id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $users->title }}" required autocomplete="title">
                                    <option value="{{ $users->title }}">{{ $users->title }}</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Prof.">Prof.</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Miss.">Miss.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                </select>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $users->first_name }}" required autocomplete="first_name">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $users->last_name }}" required autocomplete="last_name">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="designation" class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>

                            <div class="col-md-6">
                                <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ $users->designation }}" autocomplete="designation">

                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $users->email }}"  autocomplete="email" readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="orc_id" class="col-md-4 col-form-label text-md-right">{{ __('ORC ID') }}</label>

                            <div class="col-md-6">
                                <input id="orc_id" type="text" class="form-control @error('orc_id') is-invalid @enderror" name="orc_id" value="{{ $users->orc_id }}" autocomplete="orc_id">

                                @error('orc_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="scopus_author_id" class="col-md-4 col-form-label text-md-right">{{ __('Scopus Author ID') }}</label>

                            <div class="col-md-6">
                                <input id="scopus_author_id" type="text" class="form-control @error('scopus_author_id') is-invalid @enderror" name="scopus_author_id" value="{{ $users->scopus_author_id }}" autocomplete="scopus_author_id">

                                @error('scopus_author_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="organization" class="col-md-4 col-form-label text-md-right">{{ __('Organization') }}</label>

                            <div class="col-md-6">
                                <input id="organization" type="text" class="form-control @error('organization') is-invalid @enderror" name="organization" value="{{ $users->organization }}" required autocomplete="organization">

                                @error('organization')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <select type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $users->country }}" required autocomplete="country">
                                    <option value="{{ $users->country }}">{{ $users->country }}</option>
                                    <option id="country" name ="country"></option>
                                </select>
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script language="javascript">
	populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
	populateCountries("country2");
	populateCountries("country2");
</script>
@endsection
