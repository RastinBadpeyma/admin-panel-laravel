@component('admin.layouts.content' , ['title' => 'پاسخ به نظر مورد نظر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست دسترسی ها</li>
    @endslot
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="page-content">


        <div class="row profile-body">
            <!-- left wrapper start -->

            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">


                            <form method="POST" action="{{ route('admin.reply.message') }}" class="forms-sample"  >
                                @csrf

                                <input type="hidden" name="id" value="{{ $comment->id }}">
                                <input type="hidden" name="user_id" value="{{ $comment->user_id }}" >
                                <input type="hidden" name="post_id" value="{{ $comment->post_id }}">


                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">  نام کاربر:   </label>
                                    <code> {{ $comment['user']['name'] }}</code>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">نام محصول :  </label>
                                    <code> {{ $comment->product->title }}</code>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"> مدل محصول :</label>
                                    <code>{{ $comment->subject }}</code>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">نظر کاربر :  </label>
                                    <code> {{ $comment->message }}</code>
                                </div>


                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">مدل محصول</label>
                                    <input type="text" name="subject" class="form-control " >
                                </div>


                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">نظر    </label>
                                    <input type="text" name="message" class="form-control " >
                                </div>




                                <button type="submit" class="btn btn-primary me-2"> ثبت پاسخ</button>

                            </form>

                        </div>
                    </div>




                </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->

            <!-- right wrapper end -->
        </div>

    </div>



@endsection
@endcomponent
