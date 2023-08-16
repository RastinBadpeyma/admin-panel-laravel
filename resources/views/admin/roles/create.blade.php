@component('admin.layouts.content' , ['title' => 'ایجاد مقام'])


    <div class="row">
        <div class="col-lg-12">
            @include('admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">فرم ایجاد مقام</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">عنوان مقام</label>
                            <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="عنوان دسترسی را وارد کنید" >
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">توضیح مقام</label>
                            <input type="text" name="label" class="form-control" id="inputEmail3" placeholder="توضیح دسترسی را وارد کنید" >
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">دسترسی ها</label>
                            <select class="form-control" name="permissions[]" id="permissions" multiple>
                                @foreach(\App\Models\Permission::all() as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }} - {{ $permission->label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت مقام جدید</button>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-default float-left">بازگشت</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endcomponent
