@extends('Dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Редактирование {{$permission->name}}</h2>
        </div>
        <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('permissions.index') }}"> Назад</a>
        </div>
   </div>


      <!-- need add -->
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Упс!</strong> Что-то пошло не так.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif
   <!-- need add -->


   {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}
    <div class="form-group">
        {{ Form::label('name', 'Название') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <br>
    {{ Form::submit('Изменить', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
      
    </div>
</div>
@endsection
