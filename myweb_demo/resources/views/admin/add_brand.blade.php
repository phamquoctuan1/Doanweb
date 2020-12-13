@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm hãng của sản phẩm
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
                        <form role="form" method="post" action="{{ url('save-brand') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Hãng</label>
                                <input type="text" class="form-control" name="brand_name"
                                    placeholder="Nhập tên danh mục">
                                    @if ($errors->has('brand_name'))
                                    {{ $errors->first('brand_name') }}
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Liên kết</label>
                                <input type="text" class="form-control" name="brand_slug"
                                placeholder="">
                                @if ($errors->has('brand_slug'))
                                    {{ $errors->first('brand_slug') }}
                                    @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục</label>
                                <select class="form-control input-sm m-bot15" name="brand_parent_id">
                                    @foreach($brand as $brand)
                                    <option value="{{ $brand->cate_id }}">{{ $brand->cate_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" name="add_brand" class="btn btn-info">Thêm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>

    @endsection
