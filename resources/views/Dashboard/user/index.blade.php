@extends('Dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="width:100%;">

            <div class="row" style="width:100%;justify-content: space-between;">
                <div class="pull-left">
                    @if (Auth::user()->sudo == 1)
                        <h2>Пользователи</h2>
                    @else
                        <h2>Профиль</h2>
                    @endif

                </div>
                <div class="pull-right">
                    @can('user-create')
                        <a class="btn btn-success" href="{{ route('users.create') }}"> Создать</a>
                    @endcan
                </div>
            </div>


            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                    @if(Auth::user()->sudo == 1)
                        <th>Роли</th>
                    @endif
                    <th width="280px">Действия</th>
                </tr>
                @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if(Auth::user()->sudo == 1)
                            <td>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </td>
                        @endif
                        <td>
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Просмотреть</a>
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Изменить</a>
                            @if(Auth::user()->sudo == 1)

                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}

                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>

            {{-- {!! $data->render() !!} --}}

        </div>
    </div>
@endsection
