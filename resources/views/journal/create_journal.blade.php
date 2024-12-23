@if(Auth::user()->role_id == 1)
@extends('layouts.journal_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Journal') }}</div>

                <div class="card-body">
                    <form action="/create-journal" method="post" enctype="multipart/form-data">
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
                       
                        <div class="form-group row mb-3">
                            <label for="full_name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="" required autocomplete="full_name" autofocus>

                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="short_name" class="col-md-4 col-form-label text-md-right">{{ __('Short Name') }}</label>

                            <div class="col-md-6">
                                <input id="short_name" type="text" class="form-control @error('short_name') is-invalid @enderror" name="short_name" value="" required autocomplete="short_name" autofocus>

                                @error('short_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                        <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Exicutive Editor') }}</label>
                            <div class="col-md-6">
                                <select class="form-control js-example-basic-single" name="user_id">
                                <option value="">--- Select Executive Editor ---</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="reviewer_comment_file" class="col-md-4 col-form-label text-md-right">Attach Reviewer Form</label>
                            <div class="col-md-6">
                                <input type="file" value="{{old('mobile')}}" name="reviewer_comment_file" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Journal') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endif