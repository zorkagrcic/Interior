@php use Illuminate\Support\Str @endphp

@extends('layouts.layout')
@section('title', 'Home')

@section('content')

    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
        <div class="container-fluid">
            <div class="owl-banner owl-carousel">
                @foreach($bannerPosts as $banner)
                    <div class="item">
                        <img src="{{asset('/assets/images/' . $banner->image)}}" alt="{{$banner->title}}">
                        <div class="item-content">
                            <div class="main-content">
                                <div class="meta-category">
                                    <a href="{{route('blog', $banner->category->id)}}">
                                        <span>{{optional($banner->category)->name}}</span>
                                    </a>
                                </div>
                                <a href="{{route('posts.show', $banner->id)}}"><h4>{{$banner->title}}</h4></a>
                                <ul class="post-info">
                                    <li><a href="#">{{$banner->user->name}}</a></li>
                                    <li><a href="#">{{$banner->created_at->format('F d, Y')}}</a></li>
                                    <li><a href="#">{{$banner->comments->count()}}
                                            @if($banner->comments->count()===1)
                                                Comment
                                            @else
                                                Comments
                                            @endif
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->

    <section class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-content">
                        <div class="row">
                            <div class="col-lg-8">
                                <span>Read. Explore. Inspire.</span>
                                <h4>Join our community and share your thoughts with us!</h4>
                            </div>
                            <div class="col-lg-4">
                                <div class="main-button">
                                    <a rel="nofollow" href="{{route('register')}}" target="_parent">Sign Up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            @foreach($homePosts as $hp)
                                <div class="col-lg-12">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <img src="{{asset('/assets/images/' . $hp->image)}}" alt="{{$hp->title}}">
                                        </div>
                                        <div class="down-content">
                                            <a href="{{ route('blog', ['category_id' => $hp->category->id, 'q' => request('q')]) }}">
                                                <span>{{optional($hp->category)->name}}</span>
                                            </a>
                                            <a href="{{route('posts.show',$hp->id)}}"><h4>{{$hp->title}}</h4></a>
                                            <ul class="post-info">
                                                <li><a href="#">{{$hp->user->name}}</a></li>
                                                <li><a href="#">{{$hp->created_at->format('F d, Y')}}</a></li>
                                                <li><a href="{{route('posts.show', $hp->id)}}">{{$hp->comments->count()}}
                                                        @if($hp->comments->count()===1)
                                                            Comment
                                                        @else
                                                            Comments
                                                        @endif
                                                    </a>
                                                </li>
                                            </ul>
                                            <p>{{Str::limit($hp->content, 250)}}</p>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-lg-12">
                                <div class="main-button">
                                    <a href="{{route('blog')}}">View All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sidebar-item recent-posts">
                                    <div class="sidebar-heading">
                                        <h2>Recent Posts</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach($recentPosts as $recent)
                                                <li><a href="{{route('posts.show', $recent->id)}}">
                                                        <h5>{{Str::limit($recent->content, 60)}}</h5>
                                                        <span>{{$recent->created_at->format('F d, Y')}}</span>
                                                    </a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item categories">
                                    <div class="sidebar-heading">
                                        <h2>Categories</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach($categories as $category)
                                                <li>
                                                    <a
                                                        href="{{ route('blog', ['category_id' => $category->id, 'q' => request('q')]) }}"
                                                        class="category-link"
                                                        data-id="{{ $category->id }}"
                                                    >
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item tags">
                                    <div class="sidebar-heading">
                                        <h2>Tag Clouds</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li><a href="#">Minimalist</a></li>
                                            <li><a href="#">Plants</a></li>
                                            <li><a href="#">Cozy</a></li>
                                            <li><a href="#">Inspirational</a></li>
                                            <li><a href="#">Pinterest</a></li>
                                            <li><a href="#">Rooms</a></li>
                                            <li><a href="#">Style</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
