@extends('Dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Просмотр разрещения</h2>
        </div>
        <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('permissions.index') }}"> Назад</a>
        </div>
   </div>
 

    </div>
</div>
@endsection
