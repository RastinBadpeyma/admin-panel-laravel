@component('admin.layouts.content' , ['title' => 'ویرایش دسترسی'])


    <div class="row">
        <div class="col-lg-12">
            @include('admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">فرم ویرایش دسترسی</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.permissions.update' , ['permission' => $permission->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">عنوان دسترسی</label>
                            <input type="text" name="name" class="form-control" id="inputEmail3" value="{{$permission->name}}" placeholder="عنوان دسترسی را وارد کنید" >
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">توضیح دسترسی</label>
                            <input type="text" name="label" class="form-control" id="inputEmail3" placeholder="توضیح دسترسی را وارد کنید"  value="{{$permission->label}}">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش دسترسی جدید</button>
                        <a href="{{ route('admin.permissions.index') }}" class="btn btn-default float-left">بازگشت</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

@endcomponent
