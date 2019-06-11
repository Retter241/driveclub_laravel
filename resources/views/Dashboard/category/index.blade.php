@extends('Dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Все категории</h2>
        </div>
        <div class="pull-right">
          
            <a href="{{ route('categories.create') }}" class="btn btn-success">Создать</a>
        
        </div>
   </div>

   @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
    @endif


  <table class="table table-bordered">
        
                <tr>
                    <th>Категория</th>
                    <th>Действие</th>
                </tr>
       
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td> 
                    <td>
                        <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Посмотреть</a>
                    <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-info " style="margin-right: 3px;">Редактировать</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id] ,'style'=>'display:inline' ]) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
        
        </table>

    
 
    </div>
</div>
@endsection
