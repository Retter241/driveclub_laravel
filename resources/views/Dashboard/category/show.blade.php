@extends('Dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Категория</h2>
        </div>
        <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Назад</a>
        </div>
   </div>

   <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Название: </strong>
            {{ $category->name }}
        </div>
    </div>
    <h3>Посты в этой категории</h3>
         <table class="table table-bordered">
  <tr>
     <th>ID</th>
     <th>Название</th>
     <th>Превью</th>
     <th width="280px">Действия</th>
  </tr>
    @foreach ($posts as $key => $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->meta_title }}</td>
        <td><img src="http://dimamlab/{{ $post->img }}" style="max-height: 50px;"></td>
        <td>
           <a class="btn btn-info"  href="{{ route('post.show',$post->id) }}">Просмотреть</a>
            {{-- @can('creator')  @endcan --}}
            @can('post-edit')
                <a class="btn btn-primary" href="{{ route('post.edit',$post->id) }}">Изменить</a>
            @endcan
           
                {!! Form::open(['method' => 'DELETE','route' => ['post.destroy', $post->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
          
        </td>
    </tr>
    @endforeach
</table>

  
</div>
 

    </div>
</div>
@endsection
