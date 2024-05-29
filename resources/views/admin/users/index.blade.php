@extends('layouts.admin_layouts')

@section('title', 'Все пользователи')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Все пользователи</h1>
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
                          Имя
                      </th>
                      <th style="text-align: center;">
                          Почта
                      </th>
                  </tr>
              </thead>
              <tbody>
              @if(isset($users))
                @foreach ($users as $user)
                  <tr>
                      <td>
                          {{ $user ['id'] }}
                      </td>  
                      <td style="text-align: center;">
                          {{ $user ['name'] }}
                      </td>  
                      <td style="text-align: center;">
                          {{ $user ['email'] }}
                      </td>                       
                  </tr>
                @endforeach
               @endif
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
       </div>
    </div><!-- /.container-fluid -->
</section>
@endsection