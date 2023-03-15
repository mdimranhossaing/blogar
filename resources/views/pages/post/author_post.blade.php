@extends('layouts.layout')
@section('content')
    <!-- Start Author Area  -->
    <div class="axil-author-area axil-author-banner bg-color-grey">
        <div class="container">
            <div class="row">
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

    <!-- Start Post List Wrapper  -->
    <div class="axil-post-list-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title">
                        <h2 class="title mb--40">Articles By {{$user->name}}</h2>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-8">

                    @foreach ($posts as $post)
                    <!-- Start Post List  -->
                    <div class="content-block post-list-view mt--30">
                        <div class="post-thumbnail">
                            <a href="{{route('single',$post->slug)}}">
                                <img src="{{$post->thumbnail}}" alt="Post Images">
                            </a>
                        </div>
                        <div class="post-content">
                            <div class="post-cat">
                                <div class="post-cat-list">
                                    <a class="hover-flip-item-wrapper" href="{{ route('archive-post', $post->category->slug )}}">
                                        <span class="hover-flip-item">
                                            <span data-text="{{$post->category->name}}">{{$post->category->name}}</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <h4 class="title"><a href="{{route('single',$post->slug)}}">{{$post->title}}</a></h4>
                            <div class="post-meta-wrapper">
                                <div class="post-meta">
                                    <div class="content">
                                        <h6 class="post-author-name">
                                            <a class="hover-flip-item-wrapper" href="{{route('user-post', $post->user->username )}}">
                                                <span class="hover-flip-item">
                                                    <span data-text="{{$post->user->name}}">{{$post->user->name}}</span>
                                                </span>
                                            </a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li>Feb 17, 2019</li>
                                            <li>3 min read</li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="social-share-transparent justify-content-end">
                                    <li><a href="{{$post->user->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{$post->user->instagram_link}}"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{$post->user->twitter_link}}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{$post->user->website_link}}"><i class="fas fa-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Post List  -->
                    @endforeach

                </div>

                @include('pages.post.post_page_sidebar')

            </div>
        </div>
    </div>
    <!-- End Post List Wrapper  -->

    <!-- Start Instagram Area  -->
    @include('components.instagram_area')
    <!-- End Instagram Area  -->
@endsection
