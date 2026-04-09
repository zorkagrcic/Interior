@extends('layouts.layout')
@section('title', 'Interior - Post Details')

@section('content')

    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Post Details</h4>
                            <h2>Single blog post</h2>
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
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{asset('assets/images/' . $post->image)}}" alt="{{$post->title}}">
                                    </div>
                                    <div class="down-content">
                                        <a href="{{ route('blog', ['category_id' => $post->category->id, 'q' => request('q')]) }}">
                                            <span>{{optional($post->category)->name}}</span>
                                        </a>
                                        <h4>{{$post->title}}</h4>
                                        <ul class="post-info">
                                            <li><a href="#">{{$post->user->name}}</a></li>
                                            <li><a href="#">{{$post->created_at->format('F d, Y')}}</a></li>
                                            <li><a href="#">{{$post->comments->count()}}
                                                    @if($post->comments->count()===1)
                                                        Comment
                                                    @else
                                                        Comments
                                                    @endif
                                                </a>
                                            </li>
                                        </ul>
                                        <p> {{$post->content}}</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item comments">
                                    <div class="sidebar-heading">
                                        <h2>
                                            {{ $post->comments->count() }}
                                            {{ $post->comments->count() === 1 ? 'Comment' : 'Comments' }}
                                        </h2>
                                    </div>
                                    <div class="content">
                                        <ul id="comments-list">
                                            @forelse($post->comments->sortByDesc('created_at') as $comment)
                                                <li>
                                                    <div class="author-thumb">
                                                        <img src="{{ asset('assets/images/user.jpg') }}"
                                                             alt="">
                                                    </div>
                                                    <div class="right-content">
                                                        <h4>
                                                            {{ $comment->user->name }}
                                                            <span>{{ $comment->created_at->format('F d, Y') }}</span>
                                                        </h4>
                                                        <p>{{ $comment->content }}</p>
                                                    </div>
                                                </li>
                                            @empty
                                                <p id="no-comments-message">Be the first to comment!</p>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="sidebar-item submit-comment">
                                    <div class="sidebar-heading">
                                        <h2>Your comment</h2>
                                    </div>
                                    <div class="content">

                                        @auth
                                            @if(session('success'))
                                                <p class="text-success">{{ session('success') }}</p>
                                            @endif

                                            <form id="comment_form" action="{{ route('comments.store') }}"
                                                  method="POST">
                                                @csrf
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <fieldset>
                                <textarea
                                    name="content"
                                    rows="6"
                                    id="content"
                                    placeholder="Type your comment"
                                    required
                                >{{ old('content') }}</textarea>

                                                            @error('content')
                                                            <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <fieldset>
                                                            <button type="submit" id="form-submit" class="main-button">
                                                                Submit
                                                            </button>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <p>
                                                <a href="{{ route('login') }}" class="login-link">
                                                    Log In
                                                </a>
                                                to add a comment!
                                            </p>
                                        @endauth

                                    </div>
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
                                                    <a href="{{ route('blog', ['category_id' => $category->id, 'q' => request('q')]) }}">- {{$category->name}}</a>
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
