@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật hãng-Thương hiệu
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach ($edit_brand as $key=>$item)
                        <form role="form" method="post" action="{{ url('update-brand',$item->slug) }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control" value="{{ $item->brand_name }}" name="brand_name"
                                   >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Liên kết</label>
                                <input type="text" class="form-control" value="{{ $item->slug }}" name="brand_slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục</label>
                                <select class="form-control input-sm m-bot15" name="category_parent_id">
                                    @foreach($brand as $brand)
                                    <option value="{{ $brand->cate_id }}">{{ $brand->cate_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" name="update_brand" class="btn btn-info">Cập nhật</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>

    @endsection
