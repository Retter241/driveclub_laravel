@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">



   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Все проекты</h2>
        </div>
        <div class="pull-right">
        {{-- @if (Auth::check())
                                @if (Auth::user()->sudo == 1)
                                <a class="btn btn-success" href="{{ route('post.create') }}"> Создать</a>
                                @endif
                            @endif
                 @can('post-create')   @endcan           --}}
       

            <a class="btn btn-success" href="{{ route('project.create') }}"> Создать</a>

    
        </div>
   </div>
        
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

@php
$i=0;
@endphp
{{-- dd($posts) --}}
<table class="table table-bordered">
  <tr>
   
     <th>ID</th>
     <th>Заголовок</th>
      {{--<th>Category</th>--}}
     <th>Превью</th>
     <th width="280px">Действия</th>
  </tr>
    @foreach ($projects as $key => $project)
    <tr>
  
        <td>{{ $project->id }}</td>
        <td>{{ $project->meta_title }}</td>
        {{--@if ($post->category_id !== null)
            {{ $cat_name = \App\Category::where('id' ,$post->category_id)->pluck('name') }}
            
            <td> {{ $cat_name }} </td>
            }
        @endif--}}
        
        <td><img src="{{ config('app.url') }}/{{$project->img}}" style="max-height: 50px;"></td>
        <td>
           <a class="btn btn-info"  href="{{ route('project.show',$project->id) }}">Просмотреть</a>
            {{-- @can('creator')  @endcan --}}

                <a class="btn btn-primary" href="{{ route('project.edit',$project->id) }}">Изменить</a>

           
                {!! Form::open(['method' => 'DELETE','route' => ['project.destroy', $project->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
          
        </td>
    </tr>
    @endforeach
</table>


{{--{!! $project->render() !!}--}}


    </div>
</div>
@endsection
