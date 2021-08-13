@extends('layouts.guest.blog')
@section('page.title')
    {{ $post->name }}
@endsection
@section('content')
    <section class="mh-home image-bg home-2-img" id="mh-home">
        <div class="img-foverlay img-color-overlay">
            <div class="container">
                <div class="row section-separator">
                    <div class="mh-page-title text-center col-sm-12">
                        <h2>{{ $post->name }}</h2>
                        <p>{{ $post->description }}</p>
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
                        <div class="col-sm-12 col-md-12">
                            <div class="mh-blog-item dark-bg blog-single">
                                <img src="{{ \App\App::storage()->getPoster($post, 'products') }}" alt="{{ $post->name }}"
                                     class="img-fluid">
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
                                                <span href="">{{ $post->created_at->isoFormat('LL') }}</span>
                                            </li>
                                            {{--<li><strong>By</strong><a href="">ThemeSpiders</a></li>--}}
                                        </ul>
                                    </div>
                                    {!! $post->content !!}
                                </div>
                            </div>
                        </div>
                    {{--<div class="col-sm-12 ">
                        <div class="row mh-related-post">
                            <div class="mh-blog-next-prev-post col-md-6 text-left">
                                <a href=""><i class="fa fa-angle-left"></i> Lorem Ipsum Dolor</a>
                            </div>
                            <div class="mh-blog-next-prev-post col-md-6 text-right">
                                <a href="">Lorem Ipsum Dolor <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>--}}
                    <!-- Comments-->
                        @if($post->isCommentable())
                            {{--<div class="col-sm-12">
                                <div class="comments col-sm-12">
                                    <div class="single-comment media">
                                        <img src="assets/images/b-author.jpg" alt="" class="img-fluid round-image">
                                        <div class="col-md-10 col-sm-10 comment-details media-body">
                                            <h4> Jhone doe </h4>
                                            <span>Feb 29, 2015</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore
                                                et dolore magna aliqua. consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="single-comment media col-sm-10 pull-right">
                                        <img src="assets/images/b-author.jpg" alt="" class="img-fluid round-image">
                                        <div class="col-md-10 col-sm-10 comment-details media-body">
                                            <h4> Hasin Bari </h4>
                                            <span>Feb 29, 2015</span>
                                            <p>Thank You ! I Love it </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="blog-form-inner col-sm-12">
                                    <div class="post-comment-title">
                                        <h3>Post your comment</h3>
                                    </div>
                                    <form id="contact-form" class="single-form comment-form wow fadeIn"
                                          data-wow-offset="30"
                                          data-wow-duration="1.5s" data-wow-delay="0.15s">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input name="name" class="contact-name form-control" id="contact-name"
                                                       type="text" placeholder="Name" required="">
                                            </div>

                                            <div class="col-sm-12">
                                                <input name="name" class="contact-subject form-control"
                                                       id="contact-email"
                                                       type="text" placeholder="Your Website">
                                            </div>

                                            <div class="col-sm-12">
                                                <input name="name" class="contact-subject form-control"
                                                       id="contact-email"
                                                       type="email" placeholder="Your Email" required="">
                                            </div>

                                            <div class="col-sm-12">
                                            <textarea class="contact-message" id="message" rows="6"
                                                      placeholder="Your Message" required></textarea>
                                            </div>

                                            <!-- Subject Button -->
                                            <div class="btn-form col-sm-12">
                                                <button class="btn btn-fill"> Post Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>--}}
                        @endif
                    </div>
                </div>


                <!-- SIDEBAR -->
                <div class="col-md-4">
                    <div class="mh-blog-sidebar">
                        {{--<div class="sidebar-item mh-author-info">
                            <div class="mh-author-img">
                                <div class="img-border">
                                    <img src="assets/images/b-author.jpg" alt="" class="img-fluid">
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
                                        <img src="assets/images/b-1.png" alt="" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="assets/images/b-1.png" alt="" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="assets/images/b-1.png" alt="" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="assets/images/b-1.png" alt="" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="assets/images/b-1.png" alt="" class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="assets/images/b-1.png" alt="" class="img-fluid">
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
