@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục
                </header>
                <div class="panel-body">


                    <div class="position-center">
                        @foreach ($edit_category as $key=>$item)
                        <form role="form" method="post" action="{{ url('update-category',$item->cate_id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" class="form-control" value="{{ $item->cate_name }}" name="category_name"
                                   >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">liên kết</label>
                                <input type="text" class="form-control" value="{{ $item->cate_slug }}" name="category_slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Parent_ID</label>
                                <select class="form-control input-sm m-bot15" name="category_parent_id">
                                    @foreach($category as $cate)
                                    <option value="{{ $cate->cate_id }}">{{ $cate->cate_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" name="update_category" class="btn btn-info">Cập nhật</button>
                        </form>
                        @endforeach
                    </div>

                </div>
            </section>

        </div>

    @endsection
