@component('admin.layouts.content' , ['title' => 'نظرات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">مدیریت نظرات کاربران</li>
    @endslot
    <div class="page-content">



        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>

                                    <th>آیدی نظر</th>
                                    <th> نام محصول</th>
                                    <th> مدل محصول</th>
                                    <th>نام کاربر</th>
                                    <th>ایدی کاربر</th>
                                    <th>متن</th>
                                    <th>اقدامات</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->product->title }}</td>
                                        <td>{{ $comment->subject }}</td>
                                        <td>{{ $comment->user->name }}</td>
                                        <td>{{ $comment->user->id }}</td>
                                        <td>{{ $comment->message }}</td>

                                        <td>
                                           <a href="{{ route('admin.comments.reply',$comment->id) }}" class="btn btn-inverse-warning"> پاسخ </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endcomponent
