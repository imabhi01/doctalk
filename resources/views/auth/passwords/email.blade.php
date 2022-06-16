@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        --}}
        
        <div id="formContent">
            <!-- Tabs Titles -->
            @if($errors->any())
            {!! implode('', $errors->all('<div style="color:red;">:message</div>')) !!}
            @endif
            <!-- Icon -->
            <div class="fadeIn first">
                <h3>{{ __('Reset Password') }}</h3>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email" required>
                @error('email')
                    <span class="invalid-feedback" role="alert" style="color:red;">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="submit" class="fadeIn fourth" value="{{ __('Send Password Reset Link') }}">
            </form>
        </div>
    </div>
</div>
@endsection
