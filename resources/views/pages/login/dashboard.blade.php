@extends('layouts.layout')
@section('content')
    <!-- Start Author Area  -->
    <div class="axil-author-area axil-author-banner bg-color-grey">
        <div class="container">
            <div class="row">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <div class="col-lg-12">
                    <div class="about-author">
                        <div class="media">
                            <div class="thumbnail">
                                <a href="{{ route('user-post', $user->username) }}">
                                    <img src="{{ $user->profile_picture }}" alt="Author Images">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="author-info">
                                    <h1 class="title"><a
                                            href="{{ route('user-post', $user->username) }}">{{ $user->name }}</a></h1>
                                    <span class="b3 subtitle">{{ $user->email }}</span>
                                </div>
                                <div class="content">
                                    <p class="b1 description">{{$user->description}}</p>
                                    <ul class="social-share-transparent size-md">
                                        <li><a href="{{ $user->facebook_link }}"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="{{ $user->instagram_link }}"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li><a href="{{ $user->twitter_link }}"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li><a href="{{ $user->website_link }}"><i class="fas fa-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Author Area  -->
@endsection
