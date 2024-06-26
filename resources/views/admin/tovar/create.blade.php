@extends('layouts.admin_layouts')

@section('title', 'Добавить товар')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавить товар</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
        @endif
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
       <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('tovar.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Название</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" 
                    placeholder="Введите название товара" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Цена</label>
                    <input type="float" name="price" class="form-control" id="" 
                    placeholder="Введите цену товара" required>
                  </div>
                  <div class="form-group">
                <!-- select -->
                   <div class="form-group">
                    <label>Выберите категорию</label>
                        <select name="cat_id" class="form-control" required>
                        @foreach ($categorys as $categories)
                            <option value="{{ $categories['id'] }}">{{ $categories['title'] }}</option>
                        @endforeach
                        </select>
                   </div>
                </div>
                <div class="form-group">
                    <textarea name="text" class="editor"></textarea>
                </div>
                <div class="form-group">
                    <label for="feature_image">Изображение товара</label>
                    <img src="" alt="" class="img-uploaded" style="display: block; width: 200px">
                    <input type="text" name="image" class="form-control" id="feature_image" name="feature_image" value="" readlonly>
                    <a href="" class="popup_selector" data-inputid="feature_image">Выбрать кртинку</a>
                </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
              </form>
            </div>
        </div>
       </div>
    </div><!-- /.container-fluid -->
</section>
@endsection