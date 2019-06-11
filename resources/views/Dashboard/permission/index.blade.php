@extends('Dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Все разрешения</h2>
        </div>
        <div class="pull-right">
          
            <a href="{{ route('permissions.create') }}" class="btn btn-success">Создать</a>
        
        </div>
   </div>


  <table class="table table-bordered">
        
                <tr>
                    <th>Разрешения</th>
                    <th>Действие</th>
                </tr>
       
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>
                    <a href="{{ route('permissions.edit',$permission->id) }}" class="btn btn-info " style="margin-right: 3px;">Изменить</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ,'style'=>'display:inline' ]) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
        
        </table>

    
 
    </div>
</div>
@endsection
