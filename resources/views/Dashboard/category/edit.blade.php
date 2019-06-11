@extends('Dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Редактировать {{$category->name}}</h2>
        </div>
        <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('categories.index') }}"> Назад</a>
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


   {{ Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT')) }}
    <div class="form-group">
        {{ Form::label('name', 'Название') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
        <div class="form-group">
            {{ Form::label('alias', 'Алиас') }}
            {{ Form::text('alias',null, array('class' => 'form-control', 'id' => 'alias')) }}
        </div>
    <br>
    {{ Form::submit('Изменить', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
      
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            var ru2en = {
                ru_str: 'АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя(),.; "+/*?!@',
                en_str: ['a', 'b', 'v', 'g', 'd', 'e', 'jo', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f',
                    'h', 'c', 'ch', 'sh', 'shh', '', 'i', '', 'je', 'ju', 'ja',
                    'a', 'b', 'v', 'g', 'd', 'e', 'jo', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f',
                    'h', 'c', 'ch', 'sh', 'shh', '', 'i', '', 'je', 'ju', 'ja',
                    '', '', '', '', '', '-', '', '', '', '', '', '', ''],
                translit: function (org_str) {

                    var tmp_str = "";
                    for (var i = 0, l = org_str.length; i < l; i++) {
                        var s = org_str.charAt(i), n = this.ru_str.indexOf(s);
                        if (n >= 0) {
                            tmp_str += this.en_str[n];
                        }
                        else {
                            tmp_str += s;
                        }
                    }
                    return tmp_str.toLowerCase();
                }
            };

            function TranslitCustom(old_input, old_value, new_input, new_value, rewritemode = true) {
                //console.log(new_value, rewritemode);
                if (new_value != undefined) {
                    //console.log('clear');
                    new_input.val(ru2en.translit(old_value));
                }
            }
            $('#name').on('change keypress keyup keydown', function (e) {
                TranslitCustom($('#name'), $('#name').val(), $('#alias'), $('#alias').val());
            })
        });

    </script>

@endpush
@endsection
