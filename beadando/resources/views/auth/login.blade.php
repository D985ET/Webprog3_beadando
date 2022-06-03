@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="display-3 mb-5">{{ __('message.Sign in' )}}</h3>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <x-forms.input name="email" type="email" label="{{ __('message.Email address')}}"/>
                        <x-forms.input name="password" type="password" label="{{ __('message.Password') }}" />
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                              {{ __('message.Remember me') }}
                            </label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-outline-dark btn-lg" style="background-color: #f55247" type="submit">
                                {{ __('message.Sign in') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection