@extends('layouts.guest')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-md-6 col-lg-6 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <!-- <img src="{{asset('admin/images/logo.svg')}}"> -->
                                <h2 class="text-primary"> DIUJMS</h2>
                            </div>
                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                            <form class="pt-3" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
                                <div class="form-group col-md-8">
                                    <select id="title" class="text-dark form-select rounded-3 @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Prof.">Prof.</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Miss.">Miss.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms.">Ms.</option>
                                    </select>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- First Name -->
                            <div class="row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>
                                <div class="form-group col-md-8">
                                    <input id="first_name" type="text" class="form-control rounded-3 @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>
                                <div class="form-group col-md-8">
                                    <input id="last_name" type="text" class="form-control rounded-3 @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Designation -->
                            <div class="row">
                                <label for="designation" class="col-md-4 col-form-label text-md-end">{{ __('Designation') }}</label>
                                <div class="form-group col-md-8">
                                    <input id="designation" type="text" class="form-control rounded-3 @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}">
                                    @error('designation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="row">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                                <div class="form-group col-md-8">
                                    <input id="email" type="email" class="form-control rounded-3 @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- ORC ID -->
                            <div class="row">
                                <label for="orc_id" class="col-md-4 col-form-label text-md-end">{{ __('ORC ID') }}</label>
                                <div class="form-group col-md-8">
                                    <input id="orc_id" type="text" class="form-control rounded-3 @error('orc_id') is-invalid @enderror" name="orc_id" value="{{ old('orc_id') }}">
                                    @error('orc_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Scopus Author ID -->
                            <div class="row">
                                <label for="scopus_author_id" class="col-md-4 col-form-label text-md-end">{{ __('Scopus Author ID') }}</label>
                                <div class="form-group col-md-8">
                                    <input id="scopus_author_id" type="text" class="form-control rounded-3 @error('scopus_author_id') is-invalid @enderror" name="scopus_author_id" value="{{ old('scopus_author_id') }}">
                                    @error('scopus_author_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Organization -->
                            <div class="row">
                                <label for="organization" class="col-md-4 col-form-label text-md-end">{{ __('Organization') }}</label>
                                <div class="form-group col-md-8">
                                    <input id="organization" type="text" class="form-control rounded-3 @error('organization') is-invalid @enderror" name="organization" value="{{ old('organization') }}" required>
                                    @error('organization')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Country -->
                            <div class="row">
                                <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
                                <div class="form-group col-md-8">
                                    <select class="text-dark form-select rounded-3 @error('country') is-invalid @enderror" name="country" id="country" required>
                                        <option value="" selected></option>
                                    </select>
                                    @error('country')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="row">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="form-group col-md-8">
                                    <input id="password" type="password" class="form-control rounded-3 @error('password') is-invalid @enderror" name="password" required>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                <div class="form-group col-md-8">
                                    <input id="password-confirm" type="password" class="form-control rounded-3" name="password_confirmation" required>
                                </div>
                            </div>

                            <!-- <div class="form-check">
                                <label class="form-check-label text-muted">
                                <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                            </div> -->

                            <!-- Submit Button -->
                            <div class="mt-2 d-grid gap-2">
                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                    {{ __('SIGN UP') }}
                                </button>
                            </div>

                            <!-- Already Registered -->
                            <div class="text-center mt-4 font-weight-light">
                                Already have an account?
                                <a href="{{route('login')}}" class="text-primary">Login</a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script defer>
    // Fetch countries and populate the dropdown
    document.addEventListener('DOMContentLoaded', function () {
        const countrySelect = document.getElementById('country');

        // Fetch country data
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
                const countries = data.map(country => country.name.common).sort(); // Sort countries alphabetically
                countries.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country;
                    option.textContent = country;
                    countrySelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching countries:', error));
    });
    </script>
@endsection
