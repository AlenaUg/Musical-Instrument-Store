@extends('layouts.admin_layouts')

@section('title', 'Все заказы')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Все заказы</h1>
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
       <div class="card">
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 5%">
                          ID
                      </th>
                      <th style="text-align: center;">
                          ID пользователя 
                      </th>
                      <th style="text-align: center;">
                          Сумма покупки, руб. 
                      </th>
                      <th style="text-align: center;">
                          Дата заказа
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                  <tr>
                      <td>
                          {{ $order ['id'] }}
                      </td>  
                      <td style="text-align: center;">
                          {{ $order ['user_id'] }}
                      </td>  
                      <td style="text-align: center;">
                          {{ $order ['total_sum'] }}
                      </td>   
                      <td style="text-align: center;">
                          {{ $order ['created_at'] }}
                      </td>                                   
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
       </div>
    </div><!-- /.container-fluid -->
</section>
@endsection