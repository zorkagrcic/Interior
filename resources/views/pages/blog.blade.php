@php use Illuminate\Support\Str @endphp

@extends('layouts.layout')
@section('title', 'Interior - Blog Posts')

@section('content')

    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Recent Posts</h4>
                            <h2>Our Recent Blog Entries</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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

    <section class="blog-posts grid-system">

        <div class="container">
            <div class="col-lg-12 filters">
                <form id="search_form" name="gs" method="GET" action="{{ route('blog.filter') }}">
                    <div class="row d-flex align-items-center">

                        <!-- SEARCH -->
                        <div class="col-lg-6 col-md-12 search">
                            <input
                                type="text"
                                name="q"
                                class="searchText form-control"
                                placeholder="Type to search..."
                                value="{{ request('q') }}"
                                autocomplete="on"
                            >
                        </div>

                        <!-- CATEGORY DROPDOWN -->
                        <div class="col-lg-6 col-md-12 catDropDown">
                            <select name="category_id" class="form-select">
                                <option value="">All Categories</option>

                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div id="posts-container" class="row">
                            @include('partials.posts-list')
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
