@extends('site.layouts.app')

@section('content')

@include('site.layouts.menu')

<div class="container">
    <div class="row">
        <div class="col-lg-8 text-left light">
            <h1>Реклама на DriveClub</h1>
            <p>
                Наш принцип: реклама должна быть красивой, эффективной для рекламодателя, не мешать пользователям
                получать нужную информацию.
            </p>
            <p>
                Поэтому у нас всего два места для баннеров: в сайдбаре и между новостями. Не исключен формат рекламной
                статьи.
            </p>
            <p>Также, если у Вы владелец автосервиса, автомобильного магазина или Вы предоставляете любые услуги
                связанные с автомобилями, то предлагаем Вам стать партнером нашего клуба! Подробности по тел. <a
                    class="style-a" href="tel:+375333611011">+375 (33) 361-10-11</a></p>
                    <p>
                        Ниже представлен прайс на каждый вид рекламы. Цены в белорусских рублях.
                    </p>
            <table id="tablePreview" class="table table-striped">
                <thead>
                    <tr>
                        <th>Вид рекламы</th>
                        <th>Цена</th>
                        <th>Период</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Баннер в новостях</th>
                        <td>120 рублей</td>
                        <td>1 неделя</td>
                    </tr>
                    <tr>
                        <th scope="row">Баннер в сайдбаре</th>
                        <td>240 рублей</td>
                        <td>1 неделя</td>
                    </tr>
                    <tr>
                        <th scope="row">Рекламная статья</th>
                        <td>1000 рублей</td>
                        <td>Без срока</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @include('site.layouts.saidbar')
    </div>
</div>


@endsection
