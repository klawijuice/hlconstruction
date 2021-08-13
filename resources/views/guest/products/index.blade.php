@extends('layouts.guest.blog')
@section('page.title')
{{ __('guest/product.products') }}
@endsection
@section("page.description")
    {{ __('guest/product.my products') }}
@endsection
@section('content')
    <!-- home 2 -->
    <section class="mh-home image-bg home-2-img" id="mh-home">
        <div class="img-foverlay img-color-overlay">
            <div class="container">
                <div class="row section-separator">
                    <div class="mh-page-title text-center col-sm-12">
                        <h2>{{ __('guest/product.products') }}</h2>
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
                <div class="col-md-8">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="mh-blog-item dark-bg wow fadeInUp" data-wow-duration="0.8s"
                                     data-wow-delay="0.3s">
                                    @if($post->poster)
                                        {{--{{ \App\App::storage()->getPoster($post, 'products') }}--}}
                                        <img src="{{ \App\App::storage()->getPosterWithoutDefault($post, $post->poster, 372, 262, 'products') }}" style="max-width: 372px;" alt="{{ $post->name }}" class="img-fluid">
                                    @else
                                        <img src="/guest/assets/images/b-3.png" alt="{{ $post->name }}" class="img-fluid">
                                    @endif
                                    <div class="blog-inner">
                                        <h2>
                                            <a href="{{ route('guest.products.show', [$post->id, $post->slug]) }}">
                                                {{ $post->name }}
                                            </a>
                                        </h2>
                                        <div class="mh-blog-post-info">
                                            <ul>
                                                <li>
                                                    <strong>{{ __('guest/blog.post on') }}</strong>
                                                    <span>{{ $post->created_at->isoFormat('LL') }}</span>
                                                </li>
                                                {{--<li><strong>By</strong><a href="">ThemeSpiders</a></li>--}}
                                            </ul>
                                        </div>
                                        <p title="{{ $post->description }}">
                                            {{ \Illuminate\Support\Str::limit($post->description, 100) }}
                                        </p>
                                        <span href="{{ route('guest.products.show', [$post->id, $post->slug]) }}">
                                            {{ __('guest/blog.read more') }}
                                        </span>
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
                <div class="col-md-4">
                    <div class="mh-blog-sidebar">
                        {{--<div class="sidebar-item mh-author-info">
                            <div class="mh-author-img">
                                <div class="img-border">
                                    <img src="/guest/assets/images/b-author.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                            <h2>Alex Smith</h2>
                            <h4>Product Designer</h4>
                            <p>
                                Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit
                                Quo esse possimus unde nostrum
                                nesciunt nam dolor veritatis.
                            </p>
                            <ul class="social-icon">
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-github"></i></a></li>
                                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>--}}
                        <div class="sidebar-item mh-blog-category">
                            <h3>{{ __('guest/blog.categories') }}</h3>
                            <ul>
                                @foreach($categories as $category)
                                    <li>
                                        <a href="javascript:void(0)">
                                            {{ $category->name }} ({{ $category->product->count() }})
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        {{--<div class="sidebar-item mh-blog-category">
                            <h3>Archive</h3>
                            <ul>
                                <li><a href="">2018 (10)</a></li>
                                <li><a href="">Techonology (8)</a></li>
                                <li><a href="">Food (6)</a></li>
                                <li><a href="">Travel (8)</a></li>
                                <li><a href="">Photography (11)</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-item mh-blog-insta">
                            <h3>Instagram</h3>
                            <ul>
                                <li>
                                    <a href="">
                                        <img src="/guest/assets/images/b-1.png" alt="" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="/guest/assets/images/b-1.png" alt="" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="/guest/assets/images/b-1.png" alt="" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="/guest/assets/images/b-1.png" alt="" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="/guest/assets/images/b-1.png" alt="" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="/guest/assets/images/b-1.png" alt="" class="img-fluid">
                                    </a>
                                </li>
                            </ul>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
