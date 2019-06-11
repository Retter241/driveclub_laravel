@extends('Dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Создать разрешение</h2>
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

 {{ Form::open(array('route' => 'permissions.store')) }}
    <div class="form-group">
        {{ Form::label('name', 'Название') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div><br>
    @if(!$roles->isEmpty())
        <h4>Назначить разрешение роли</h4>
        @foreach ($roles as $role) 
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}
            <br>
        @endforeach
    @endif
    <br>
    {{ Form::submit('Создать', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}

    </div>
</div>
@endsection
