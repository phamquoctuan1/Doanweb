@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm chi tiết sản phẩm
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

                        <form role="form" method="post" action="{{ url('save-detail-product') }}" >
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">CPU</label>
                                <input type="text" class="form-control" name="cpu">
                                    @if ($errors->has('cpu'))
                                        {{ $errors->first('cpu') }}
                                        @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ram</label>
                                <input type="text" class="form-control" name="ram">
                                @if ($errors->has('ram'))
                                {{ $errors->first('ram') }}
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Màn hình</label>
                                <input type="text" class="form-control" name="screen">
                                @if ($errors->has('screen'))
                                {{ $errors->first('screen') }}
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"> Card màn hình</label>
                                <input type="text" class="form-control" name="vga">
                                @if ($errors->has('vga'))
                                {{ $errors->first('vga') }}
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Bộ nhớ </label>
                                <input type="text" class="form-control" name="storage">
                                @if ($errors->has('storage'))
                                {{ $errors->first('storage') }}
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Bộ nhớ ngoài  </label>
                                <input type="text" class="form-control" name="exten_memmory">
                                @if ($errors->has('exten_memmory'))
                                {{ $errors->first('exten_memmory') }}
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Camera trước </label>
                                <input type="text" class="form-control" name="cam1">
                                @if ($errors->has('cam1'))
                                {{ $errors->first('cam1') }}
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="exampleInputPassword1">Camera sau</label>
                                <input type="text" class="form-control" name="cam2">
                                @if ($errors->has('cam2'))
                                {{ $errors->first('cam2') }}
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Sim</label>
                                <input type="text" class="form-control" name="sim">
                                @if ($errors->has('sim'))
                                {{ $errors->first('sim') }}
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kết nối</label>
                                <input type="text" class="form-control" name="connect">
                                @if ($errors->has('connect'))
                                {{ $errors->first('connect') }}
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Pin</label>
                                <input type="text" class="form-control" name="pin">
                                @if ($errors->has('pin'))
                                {{ $errors->first('pin') }}
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hệ điều hành</label>
                                <input type="text" class="form-control" name="os">
                                @if ($errors->has('os'))
                                {{ $errors->first('os') }}
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Sản phẩm</label>
                                <select  class="form-control input-sm m-bot15" id="thuonghieu" name="product">
                                    @foreach ($data as $key => $item)
                                        <option value="{{ $item ->pro_id }}">{{ $item ->pro_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" name="add_detail" class="btn btn-info">Thêm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>

    @endsection


