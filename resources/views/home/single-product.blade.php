@extends('layouts.app')
@section('script')
    <script>
        $('#sendComment').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal

            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
        })
    </script>
@endsection

    @section('content')
       <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $product->title }}</h4>
                    </div>

                    <div class="card-body">
                        <h5>{{ $product->description }}</h5>
                    </div>

                    <div class="card-body">
                        @if($product->categories)
                            @foreach($product->categories as $cate)
                                <a href="#">{{ $cate->name }}</a>
                            @endforeach

                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="mt-4">بخش نظرات</h4>
                    @auth
                        {{--                        <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#sendComment">ثبت نظر جدید</span>--}}
                        <form action="{{route('store.comment')}}" method="post" class="comment-form default-form">


                            <input type="hidden" name="post_id" value="{{$product->id}}">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="subject" placeholder="موضوع" required="">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="دیدگاه شما"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button type="submit" class="btn btn-primary">ارسال نظر</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    @else
                        <p><b>For Add Comment You need to login first <a href="{{ route('login')}}"> Login Here </a> </b></p>
                    @endauth
                </div>








                @php
        $comment = App\Models\Comment::where('post_id',$product->id)->where('parent_id',null)->limit(5)->get();
                @endphp

                <div class="comment-box">

                    @foreach($comment as $com)
                        <div class="comment">

                            <div class="comment-inner">
                                <div class="comment-info clearfix">


                                    <h3>{{ $com->user->name }}</h3>
                                    <span>{{ $com->created_at->format('M d Y') }}</span>
                                </div>
                                <br class="text">
                                    <p>{{ $com->subject  }}</p>
                                    <p>{{ $com->message  }}</p>
                                <a href="blog-details.htm" class="btn btn-success">پاسخ</a>
                                </div>
                            </div>
                        </div>
                </br>


                        @php
                         $reply = App\Models\Comment::where('parent_id',$com->id)->get();
                        @endphp

                        @foreach($reply as $rep)

                            <div class="comment">

                                <div class="comment-inner">
                                    <div class="comment-info clearfix">
                                        <h3>{{ $rep->subject }}</h3>
                                        <span>{{ $rep->created_at->format('M d Y') }}</span>
                                    </div>
                                    <div class="text">
                                        <p>{{ $rep->message }}</p>
                                        <a href="blog-details.html" class="btn btn-primary">پاسخ</a>
                                    </div>
                                </div>
                            </div>
                    </br>
                        @endforeach
       @endforeach
    @endsection
