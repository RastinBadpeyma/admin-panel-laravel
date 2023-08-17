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
                {{--                <div class="card">--}}
                {{--                    <div class="card-header d-flex justify-content-between">--}}
                {{--                        <div class="commenter">--}}
                {{--                            <span>نام نظردهنده</span>--}}
                {{--                            <span class="text-muted">- دو دقیقه قبل</span>--}}
                {{--                        </div>--}}
                {{--                        <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#sendComment" data-id="2" data-type="product">پاسخ به نظر</span>--}}
                {{--                    </div>--}}

                {{--                    <div class="card-body">--}}
                {{--                        محصول زیبایه--}}

                {{--                        <div class="card mt-3">--}}
                {{--                            <div class="card-header d-flex justify-content-between">--}}
                {{--                                <div class="commenter">--}}
                {{--                                    <span>نام نظردهنده</span>--}}
                {{--                                    <span class="text-muted">- دو دقیقه قبل</span>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}

                {{--                            <div class="card-body">--}}
                {{--                                محصول زیبایه--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>
@endsection

