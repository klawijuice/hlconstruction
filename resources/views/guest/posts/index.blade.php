@extends('layouts.guest.blog')
@section('page.title')
{{ __('guest/layout.posts') }}
@endsection
@section("page.description")
    {{ __('guest/layout.posts') }}
@endsection
@section('content')
    <!-- home 2 -->
    <section class="mh-home image-bg home-2-img" id="mh-home">
        <div class="img-foverlay img-color-overlay">
            <div class="container">
                <div class="row section-separator">
                    <div class="mh-page-title text-center col-sm-12">
                        <h2>{{ __('guest/layout.posts') }}</h2>
                        {{--<p>It is a long established fact that a reader will be <br>
                            distracted by the readable content of a page when looking at its layout.</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mh-blog">
        <div class="container">
            <div class="row section-separator">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="mh-blog-item dark-bg wow fadeInUp" data-wow-duration="0.8s"
                                     data-wow-delay="0.3s">
                                    @if($post->poster)
                                        {{--{{ \App\App::storage()->getPosterWithoutDefault($post, $post->poster, 372, 262, 'posts') }}--}}
                                        <img src="{{ \App\App::storage()->getPosterWithoutDefault($post, $post->poster, 372, 262, 'posts') }}" alt="{{ $post->name }}" class="img-fluid">
                                    @else
                                        <img src="/guest/assets/images/b-3.png" alt="{{ $post->name }}" class="img-fluid">
                                    @endif
                                    <div class="blog-inner">
                                        <h2>
                                            <a href="{{ route('guest.posts.show', [$post->id, $post->slug]) }}">
                                                {{ $post->name }}
                                            </a>
                                        </h2>
                                        <div class="mh-blog-post-info">
                                            <ul>
                                                <li>
                                                    <strong>{{ __('guest/blog.post on') }}</strong>
                                                    <span href="">{{ $post->created_at->isoFormat('LL') }}</span>
                                                </li>
                                                {{--<li><strong>By</strong><a href="">ThemeSpiders</a></li>--}}
                                            </ul>
                                        </div>
                                        <p title="{{ $post->description }}">
                                            {{ \Illuminate\Support\Str::limit($post->description, 100) }}
                                        </p>
                                        <a href="{{ route('guest.posts.show', [$post->id, $post->slug]) }}">
                                            {{ __('guest/blog.read more') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-sm-12 mh-pagination">
                            {{ $posts->links('vendor.pagination.bootstrap-4') }}
                            {{--<nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
