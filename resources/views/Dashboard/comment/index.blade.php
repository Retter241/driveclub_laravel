@extends('Dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Все комментарии</h2>
        </div>
        <div class="pull-right">
          {{--} @if (Auth::check())
                                @if (Auth::user()->sudo == 1)
                                <a class="btn btn-success" href="{{ route('comments.create') }}"> Создать</a>
                                @endif
                            @endif --}
         {{-- 
@can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Создать</a>
            @endcan
          --}}
        </div>
   </div>
        
   
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


@if(count($comments) > 0)
<table class="table table-bordered">
  <tr>
     <th>Пользователь:</th>
        <td>Статья: </th>
        <th>Текст: </th>
        <th>Действия: </th>
  </tr>
    @foreach ($comments as $key => $comment)
    <tr>
        <td>{{ App\User::find($comment->user_id)->name }}</td>
        <td>
            @if(App\Post::find($comment->commentable_id))
                <a href="{{ route('post.show' , $comment->commentable_id) }}">
                    {{App\Post::find($comment->commentable_id)->meta_title}}</a>
            @else
                <a href="{{ route('project.show' , $comment->commentable_id) }}">
                    {{App\Project::find($comment->commentable_id)->meta_title}}</a>

            @endif

        </td>
        <td>{{ $comment->body }}</td>
        <td>
                {!! Form::open(['method' => 'DELETE','route' => ['comments.destroy', $comment->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</table>



@else 
<div class="alert alert-danger">
        <strong>Пусто</strong> У юзера нету коментов<br><br>
        
    </div>
@endif
    </div>





{!! $comments->render() !!}
    </div>
</div>
@endsection
