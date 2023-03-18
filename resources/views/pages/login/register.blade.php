@extends('layouts.layout')
@section('content')
    <div class="axil-post-list-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    @if (Session::has('msg'))
                            <p class="alert alert-success text-right">{{Session::get('msg')}}</p>
                            @endif
                    {{-- My contact form --}}
                    <div class="axil-section-gapTop axil-contact-form-area">
                        <h4 class="title mb--10">Create an account</h4>
                        <p class="b3 mb--30">Your email address will not be published. All the fields are required.</p>

                        <form action="{{url('/register/store')}}" method="POST" class="row">
                            @csrf

                            {{-- Field --}}
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="name">Your name <small class="text-danger">*</small></label>
                                    <input type="text" name="name" id="name"  placeholder="Enter your name" value="{{old('name')}}">
                                    @error('name')
                                    <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Field --}}
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="username">Your username <small class="text-danger">*</small></label>
                                    <input type="text" name="username" id="username"  placeholder="Enter your username" value="{{old('username')}}">
                                    @error('username')
                                    <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Field --}}
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Your email <small class="text-danger">*</small></label>
                                    <input type="text" name="email" id="email"  placeholder="Enter your email" value="{{old('email')}}">
                                    @error('email')
                                    <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Field --}}
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label for="password">Your password <small class="text-danger">*</small></label>
                                    <input type="password" name="password" id="password"  placeholder="Enter your password" value="{{old('password')}}">
                                    @error('password')
                                    <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Field --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="photo">Your photo <small class="text-danger">*</small></label>
                                    <input type="text" name="profile_picture" id="photo"  placeholder="Enter your photo" value="{{old('photo')}}">
                                    @error('profile_picture')
                                    <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Field --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Your description <small class="text-danger">*</small></label>
                                    <textarea name="description" id="description" cols="30" rows="5" placeholder="Write something">{{old('description')}}</textarea>
                                    @error('description')
                                    <div class="form-text text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Submit field --}}
                            <div class="col-12">
                                <div class="form-submit">
                                    <input type="submit" value="Sign Up">
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
