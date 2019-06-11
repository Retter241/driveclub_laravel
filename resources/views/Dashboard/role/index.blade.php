@extends('Dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Все роли</h2>
        </div>
        <div class="pull-right">
           @if (Auth::check())
                                @if (Auth::user()->sudo == 1)
                                <a class="btn btn-success" href="{{ route('roles.create') }}"> Создать</a>
                                @endif
                            @endif
         {{-- 
@can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Создать</a>
            @endcan
          --}}
        </div>
   </div>
        
   

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Название</th>
     <th width="280px">Действия</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Просмотреть</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Изменить</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $roles->render() !!}

    </div>
</div>
@endsection
