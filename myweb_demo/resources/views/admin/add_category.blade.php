@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục
                </header>
                <div class="panel-body">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                    }
                    ?>
                    <div class="position-center">
                        <form role="form" method="post" action="{{ url('save-category') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control" name="category_name"
                                    placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">liên kết</label>
                                <input type="text" class="form-control" name="category_slug">
                            </div>

                            <button type="submit" name="add_category" class="btn btn-info">Thêm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>

    @endsection

