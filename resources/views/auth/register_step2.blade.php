@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register Step 2 (optional)') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register.step2') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="birthday" class="col-md-4 col-form-label text-md-end">{{ __('Birthday') }}</label>

                                <div class="col-md-6">
                                    <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" birthday="birthday" value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>

                                    @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                                <div class="col-md-6">
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                        <option value="">-- {{ __('choose your gender') }} --</option>
                                        <option value="0">Female</option>
                                        <option value="1">Male</option>
                                    </select>

                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="country_id" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <select name="country_id" class="form-control @error('country_id') is-invalid @enderror">
                                        <option value="">-- {{ __('choose your country') }} --</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
                                        @endforeach
                                    </select>

                                    @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Finish Registration') }}
                                    </button>
                                    <br /><br />
                                    <a href="{{ route('home') }}">Skip for now</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
