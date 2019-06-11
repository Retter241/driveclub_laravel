@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">



   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Все новости</h2>
        </div>
        <div class="pull-right">
        {{-- @if (Auth::check())
                                @if (Auth::user()->sudo == 1)
                                <a class="btn btn-success" href="{{ route('post.create') }}"> Создать</a>
                                @endif
                            @endif
                             --}}
       
        @can('post-create')
            <a class="btn btn-success" href="{{ route('post.create') }}"> Создать</a>
            @endcan
    
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
     <th width="280px">Действие</th>
  </tr>
    @foreach ($posts as $key => $post)
    <tr>
  
        <td>{{ $post->id }}</td>
        <td>{{ $post->meta_title }}</td>
        {{--@if ($post->category_id !== null)
            {{ $cat_name = \App\Category::where('id' ,$post->category_id)->pluck('name') }}
            
            <td> {{ $cat_name }} </td>
            }
        @endif--}}
        
        <td><img src="{{ config('app.url')}}/{{ $post->img }}" style="max-height: 50px;"></td>
        <td>
           <a class="btn btn-info"  href="{{ route('post.show',$post->id) }}">Просмотреть</a>
            {{-- @can('creator')  @endcan --}}

                <a class="btn btn-primary" href="{{ route('post.edit',$post->id) }}">Изменить</a>

           
                {!! Form::open(['method' => 'DELETE','route' => ['post.destroy', $post->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
          
        </td>
    </tr>
    @endforeach
</table>


{{--{!! $posts>render() !!}--}}


      <!--  <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard custom</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Page for all posts 
                    
                        <a href="{{ url('dashboard/post/create') }}" style="float:right;">Создать новость</a>
                    
                </div>
            </div>
            <div class="card">
                {{-- dd($posts) --}}

                   @foreach( $posts as $post)
                   <a href="post/{{ $post->id }}/edit">{{  $post->meta_title }}</a>  <img style="max-width: 75px;!important" src="http://dimamlab/{{ $post->img }}"> <br>
                   <a href="post/{{ $post->id }}/edit">Редактировать</a>
                   <a class="btn btn-info"  href="{{ route('post.show',$post->id) }}">Show</a>
                   
                   <form action="{{route('post.destroy',$post->id)}}" method="post" style="display:inline">
    @method('delete')
    @csrf
    <button type="submit" value="Удалить">Удалить</button>
 </form>

                   

            
                   @endforeach
            </div>
        </div>-->
    </div>
</div>
@endsection
