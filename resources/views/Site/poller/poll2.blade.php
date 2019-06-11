<h3>Опрос №2</h3>
@if ($message = Session::get('success'))
    <div class=" container alert alert-success">
        <p>{{ $message }}</p>
    </div>
@else
    {!! Form::open(array('action'=>'Site\SiteController@polling', 'method' => 'POST' , 'class'=>'pol')) !!}
    <input type="hidden" name="user" value="{{ Auth::user()->id }}">
    <input type="hidden" name="level" value="2">
    <div id="quest1" class="block active">
    <div class="container mb-50 poll-block">
        <div class="row">
            <div class="col-lg-3 width-img">
                <img src="{{ config('app.url')}}/public/site/polling/images/q1.jpg" alt="АКПП">
            </div>
            <div class="col-lg-9 text-left">
                <p>АКПП позволяет</p>
                <label class="radio"><input name="q1" type="radio" value="a" checked>обеспечить
                    автоматический выбор
                    передаточного числа (верно)</label>
                <label class="radio"><input name="q1" type="radio" value="b">защитить автомобиль от
                    угона</label>
                <label class="radio"><input name="q1" type="radio" value="c">увеличить скорость
                    автомобиля в
                    городских условиях</label>
                <label><input id="sub1" class="btn btn1" data-num="2" name="sub1" type="button" value="Далее"></label>
            </div>
        </div>
    </div>
</div>

<div id="quest2" class="block">
    <div class="container mb-50 poll-block">
        <div class="row">
            <div class="col-lg-3 width-img">
                <img src="{{ config('app.url')}}/public/site/polling/images/q1.jpg" alt="АКПП">
            </div>
            <div class="col-lg-9 text-left">
                <p>Автомобильные мосты предназначены для</p>
                <label class="radio"><input name="q2" type="radio" value="a" checked>передачи крутящего
                    момента между
                    валами</label>
                <label class="radio"><input name="q2" type="radio" value="b">обеспечения вращения колес с
                    разными
                    скоростями при поворотах или ухабах</label>
                <label class="radio"><input name="q2" type="radio" value="c">поддерживания кузова и передачи
                    вертикальной нагрузки на колеса (верно)</label>
                <label class="radio"><input id="sub2" class="btn btn2" data-num="3" name="sub2" type="button"
                        value="Далее"></label>
            </div>
        </div>
    </div>
</div>

<div id="quest3" class="block">
    <div class="container mb-50 poll-block">
        <div class="row">
            <div class="col-lg-3 width-img">
                <img src="{{ config('app.url')}}/public/site/polling/images/q1.jpg" alt="АКПП">
            </div>
            <div class="col-lg-9 text-left">
                <p>Сцепление автомобиля предназначено для</p>
                <label class="radio"><input name="q3" type="radio" value="a" checked>снижения скорости автомобиля</label>
                <label class="radio"><input name="q3" type="radio" value="b">передачи крутящего момента от маховика коленчатого вала двигателя к первичному валу коробки передач (верно)</label>
                <label class="radio"><input name="q3" type="radio" value="c">обеспечения лучшего сцепления автомобиля сдорогой</label>
                <label class="radio"><input name="sub3" class="btn btn3" data-num="4" type="button" value="Далее"></label>
            </div>
        </div>
    </div>
</div>

<div id="quest4" class="block">
    <div class="container mb-50 poll-block">
        <div class="row">
            <div class="col-lg-3 width-img">
                <img src="{{ config('app.url')}}/public/site/polling/images/q1.jpg" alt="АКПП">
            </div>
            <div class="col-lg-9 text-left">
                <p>Узел системы питания ДВС, предназначенный для приготовления горючей смеси наилучшего
                    состава
                    путём смешивания жидкого топлива с воздухом и регулирования количества её подачи в
                    цилиндры
                    двигателя - это</p>
                <label class="radio"><input name="q4" type="radio" value="a" checked>карбюратор (верно)</label>
                <label class="radio"><input name="q4" type="radio" value="b">шатун</label>
                <label class="radio"><input name="q4" type="radio" value="c">коленчатый вал</label>
                <label class="radio"><input name="sub4" class="btn btn4" data-num="5" type="button" value="Далее"></label>
            </div>
        </div>
    </div>
</div>

<div id="quest5" class="block">
    <div class="container mb-50 poll-block">
        <div class="row">
            <div class="col-lg-3 width-img">
                <img src="{{ config('app.url')}}/public/site/polling/images/q1.jpg" alt="АКПП">
            </div>
            <div class="col-lg-9 text-left">
                <p>Для непосредственного воспламенения топливно-воздушной смеси в бензиновом двигателе
                    внутреннего
                    сгорания используется</p>
                <label class="radio"><input name="q5" type="radio" value="a" checked>свеча зажигания (верно)</label>
                <label class="radio"><input name="q5" type="radio" value="b">центральный электрод</label>
                <label class="radio"><input name="q5" type="radio" value="c">индивидуальная катушка</label>
                <label class="radio"><input name="sub5" class="btn btn5" data-num="6" type="button" value="Далее"></label>
            </div>
        </div>
    </div>
</div>

<div id="quest6" class="block">
    <div class="container mb-50 poll-block">
        <div class="row">
            <div class="col-lg-3 width-img">
                <img src="{{ config('app.url')}}/public/site/polling/images/q1.jpg" alt="АКПП">
            </div>
            <div class="col-lg-9 text-left">
                <p>В какой системе автомобиля используется термостат?</p>
                <label class="radio"><input name="q6" type="radio" value="a" checked>в системе зажигания</label>
                <label class="radio"><input name="q6" type="radio" value="b">в системе впрыска топлива</label>
                <label class="radio"><input name="q6" type="radio" value="c">в системе охлаждения двигателя
                    (верно)</label>
                <label class="radio"><input name="sub6" class="btn btn6" data-num="7" type="button" value="Далее"></label>
            </div>
        </div>
    </div>
</div>

<div id="quest7" class="block">
    <div class="container mb-50 poll-block">
        <div class="row">
            <div class="col-lg-3 width-img">
                <img src="{{ config('app.url')}}/public/site/polling/images/q1.jpg" alt="АКПП">
            </div>
            <div class="col-lg-9 text-left">
                <p>Масляный насос является элементом</p>
                <label class="radio"><input name="q7" type="radio" value="a" checked>Системы смазки
                    (верно)</label>
                <label class="radio"><input name="q7" type="radio" value="b">топливной системы</label>
                <label class="radio"><input name="q7" type="radio" value="c">системы впрыска</label>
                <label class="radio"><input name="sub7" class="btn btn7" data-num="8" type="button" value="Далее"></label>
            </div>
        </div>
    </div>
</div>

<div id="quest8" class="block">
    <div class="container mb-50 poll-block">
        <div class="row">
            <div class="col-lg-3 width-img">
                <img src="{{ config('app.url')}}/public/site/polling/images/q1.jpg" alt="АКПП">
            </div>
            <div class="col-lg-9 text-left">
                <p>Своевременное открытие и закрытие клапанов обеспечивает</p>
                <label class="radio"><input name="q8" type="radio" value="a" checked>маховик</label>
                <label class="radio"><input name="q8" type="radio" value="b">коленчатый вал</label>
                <label class="radio"><input name="q8" type="radio" value="c">распределительный вал
                    (верно)</label>
                <label class="radio"><input name="sub8" class="btn btn8" data-num="9" type="button" value="Далее"></label>
            </div>
        </div>
    </div>
</div>

<div id="quest9" class="block">
    <div class="container mb-50 poll-block">
        <div class="row">
            <div class="col-lg-3 width-img">
                <img src="{{ config('app.url')}}/public/site/polling/images/q1.jpg" alt="АКПП">
            </div>
            <div class="col-lg-9 text-left">
                <p>В работе парктроника (парковочного радара) прменяются</p>
                <label class="radio"><input name="q9" type="radio" value="a" checked>радиоволны</label>
                <label class="radio"><input name="q9" type="radio" value="b">электроволны </label>
                <label class="radio"><input name="q9" type="radio" value="c">звуковые волны
                    (верно)</label>
                <label class="radio"><input name="sub9" class="btn btn9" data-num="10" type="button" value="Далее"></label>
            </div>
        </div>
    </div>
</div>

<div id="quest10" class="block">
    <div class="container mb-50 poll-block">
        <div class="row">
            <div class="col-lg-3 width-img">
                <img src="{{ config('app.url')}}/public/site/polling/images/q1.jpg" alt="АКПП">
            </div>
            <div class="col-lg-9 text-left">
                <p>Устройство, поддерживающее постоянную скорость автомобиля,
                    автоматически прибавляя газ
                    при
                    снижении скорости движения и уменьшая при её увеличении</p>
                <label class="radio"><input name="q10" type="radio" value="a" checked>круиз-контроль</label>
                <label class="radio"><input name="q10" type="radio" value="b">парктроник</label>
                <label class="radio"><input name="q10" type="radio" value="c">Датчик курсовой
                    устойчивости</label>
                <label class="radio">{!! Form::submit('Узнать результат' ,['class'=>'btn'])
                    !!}</label>
            </div>
        </div>
    </div>
</div>

    {!! Form::close() !!}

@endif