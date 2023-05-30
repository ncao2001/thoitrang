@extends('frontend.layouts.master')
@section('title','Blog Detail')
@section('body')

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details-inner">
                    <div class="blog-detail-title">
                        <h2>{{$blog->title}}</h2>
                        <p>{{$blog->category}} <span>- {{date('M d, Y', strtotime($blog->created_at))}}</span></p>
                    </div>
                    <div class="blog-large-pic">
                        <img src="frontend/img/blog/{{$blog->image}}" alt="">
                    </div>
                    {!! $blog->content !!}
                    <div class="tag-share">
                        <div class="details-tag">
                            <ul>
                                <li><i class="fa fa-tags"></i></li>
                                <li>Travel</li>
                                <li>Beauty</li>
                                <li>Fashion</li>
                            </ul>
                        </div>
                        <div class="blog-share">
                            <span>Share:</span>
                            <div class="social-links">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
{{--                    <div class="blog-post">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-5 col-md-6">--}}
{{--                                <a href="#" class="prev-blog">--}}
{{--                                    <div class="pb-pic">--}}
{{--                                        <i class="ti-arrow-left"></i>--}}
{{--                                        <img src="frontend/img/blog/prev-blog.png" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="pb-text">--}}
{{--                                        <span>Previous Post:</span>--}}
{{--                                        <h5>The Personality Trait That Makes People Happier</h5>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-5 offset-lg-2 col-md-6">--}}
{{--                                <a href="#" class="next-blog">--}}
{{--                                    <div class="nb-pic">--}}
{{--                                        <img src="frontend/img/blog/next-blog.png" alt="">--}}
{{--                                        <i class="ti-arrow-right"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="nb-text">--}}
{{--                                        <span>Next Post:</span>--}}
{{--                                        <h5>The Personality Trait That Makes People Happier</h5>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="posted-by">
                        @foreach($blog->blogComments as $blogComment)
                            <div class="pb-pic">
                                <img style="height: 80px; border-radius: 50%" src="admin/assets/images/avatars/{{$blogComment->user->avatar ?? 'default-user.jpg'}}" alt="">
                            </div>
                            <div class="pb-text">

                                    <a href="#">
                                        <h5>{{$blogComment->name}}<span style="color: #87adbd">-{{date('M d ,Y', strtotime($blogComment->created_at))}}</span></h5>
                                    </a>
                                    <p>{{$blogComment->messages}}</p>

                            </div><br>
                        @endforeach
                    </div>
                    <div class="leave-comment">
                        <h4>Leave A Comment</h4>
                        <form action="" method="post" class="comment-form">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{$blog->id}}">
                            <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id ?? null}}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name" name="name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email" name="email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Messages" name="messages"></textarea>
                                    <button type="submit" class="site-btn">Send message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->

@endsection
