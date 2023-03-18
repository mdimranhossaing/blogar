@extends('layouts.layout')
@section('content')
    <div class="axil-post-list-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    @if (Session::has('msg'))
                            <p class="alert alert-success text-right">{{Session::get('msg')}}</p>
                            @endif
                    {{-- My contact form --}}
                    <div class="axil-section-gapTop axil-contact-form-area">
                        <h4 class="title mb--10">Login your account</h4>
                        <p class="b3 mb--30">Your email address will not be published. All the fields are required.</p>

                        <form action="{{route('login.process')}}" method="POST" class="row">
                            @csrf

                            {{-- Field --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Your email <small class="text-danger">*</small></label>
                                    <input type="text" name="email" id="email"  placeholder="Enter your email" value="{{old('email')}}">
                                    @error('email')
                                    <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Field --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">Your password <small class="text-danger">*</small></label>
                                    <input type="password" name="password" id="password"  placeholder="Enter your password" value="{{old('password')}}">
                                    @error('password')
                                    <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Submit field --}}
                            <div class="col-12">
                                <div class="form-submit">
                                    <input type="submit" value="Sign In">
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
