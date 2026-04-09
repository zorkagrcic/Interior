
    @forelse($posts as $post)
        <div class="col-lg-6">
            <div class="blog-post">
                <div class="blog-thumb">
                    <img src="{{ asset('assets/images/' . $post->image) }}" alt="{{ $post->title }}">
                </div>
                <div class="down-content">
                    <span>{{ optional($post->category)->name }}</span>
                    <a href="{{ route('posts.show', $post->id) }}">
                        <h4>{{ $post->title }}</h4>
                    </a>
                    <ul class="post-info">
                        <li><a href="#">{{ $post->user->name }}</a></li>
                        <li><a href="#">{{ $post->created_at->format('F d, Y') }}</a></li>
                        <li>
                            <a href="{{route('posts.show', $post->id)}}">
                                {{ $post->comments->count() }}
                                {{ $post->comments->count() === 1 ? 'Comment' : 'Comments' }}
                            </a>
                        </li>
                    </ul>
                    <p>{{ Str::limit($post->content, 150) }}</p>
                </div>
            </div>
        </div>
    @empty
        <div class="col-lg-12">
            <p>No posts found.</p>
        </div>
    @endforelse



