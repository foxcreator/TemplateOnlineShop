@extends('layouts.app')

@section('title', 'Контакти')

@section('content')


    <div class="site-blocks-cover inner-page" style="background-image: url({{asset('images/floor_2.webp')}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto align-self-center">
                    <div class=" text-center">
                        <h1>Покриття підлоги</h1>
                        <p>Види та призначення.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light custom-border-bottom" data-aos="fade">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="block-16">
                        <figure>
                            <img src="{{ asset('images/laminat.jpeg') }}" alt="Image placeholder" class="img-fluid rounded">

                        </figure>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">


                    <div class="site-section-heading pt-3 mb-4">
                        <h2 class="text-black">Ламінат</h2>
                    </div>
                    <p>Ламіновані підлоги виглядають так само, як справжня деревина або камінь, але зображення,
                        яке ви бачите, насправді є фотографією. Це означає, що вони можуть поставлятися в широкому
                        діапазоні візуально приголомшливих конструкцій, які можуть бути сформовані як плитки або дошки.

                    </p>
                    <p>Ці підлоги дуже стійкі до бризок і подряпин, що робить їх фантастично універсальними.
                        Якщо Ваша ідеальна підлога - це стильна, універсальна і дійсно красива, ми рекомендуємо ламінат!
                        Ламінована підлога зроблена з високощільної вогнестійкої плити (HDF),
                        покритої фотографією високої чіткості та обробленої жорстким шаром верхнього захисного покриття.
                    </p>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light custom-border-bottom" data-aos="fade">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6 order-md-2">
                    <div class="block-16">
                        <figure>
                            <img src="{{ asset('images/vinil.jpeg') }}" alt="Image placeholder" class="img-fluid rounded">

                        </figure>
                    </div>
                </div>
                <div class="col-md-5 mr-auto">


                    <div class="site-section-heading pt-3 mb-4">
                        <h2 class="text-black">Вініл</h2>
                    </div>
                    <p class="text-black">Вінілове покриття для підлоги (LVT) - сильна сторона світу підлог -
                        на сьогоднішній день немає підлоги, яка була б більш багатофункціональна і практична,
                        ніж підлога з LVT. Його фотографічний верхній шар може імітувати широкий спектр інших
                        матеріалів, дерево, камінь або кераміка. </p>
                    <p class="text-black">Підлога LVT виготовлена ​​з ПВХ, що надає йому
                        додаткової міцності. Він 100% водонепроникний, може використовуватися з
                        підігрівом підлог та має стійкий до подряпин шар зносу.</p>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light custom-border-bottom" data-aos="fade">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="block-16">
                        <figure>
                            <img src="{{ asset('images/massivnajadoska.jpeg') }}" alt="Image placeholder" class="img-fluid rounded">

                        </figure>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">


                    <div class="site-section-heading pt-3 mb-4">
                        <h2 class="text-black">Масивна дошка</h2>
                    </div>
                    <p>Підлога з масивної деревини вирізана з одного красивого шматка деревини.
                        Це створює чисту, просту та автентичну дерев'яну підлогу.
                        Через їхню чутливість до вологи і спеки вони не підходять для кожної кімнати,
                        але, враховуючи їхню здатність багаторазово відшліфуватися, вони можуть
                        використовуватися протягом кількох поколінь.
                        </p>
                    <p>Що робить масивну дошку таким добрим вибором, це її довговічність.
                        Якщо протягом багатьох років стать починає страждати від зносу,
                        її можна просто відшліфувати і переробити, щоб вона виглядала так само добре, як нова.
                    </p>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-truck text-warning"></span>
                    </div>
                    <div class="text">
                        <h2>Безкоштовна доставка</h2>
                        <p>Отримайте ваше ідеальне покриття підлоги зі зручністю доставки до ваших дверей!</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-refresh2 text-warning"></span>
                    </div>
                    <div class="text">
                        <h2>Безпроблемне повернення</h2>
                        <p>Якщо ви не повністю задоволені замовленням, наші професійні менеджери нададуть вам необхідну підтримку та організують повернення товару</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-help text-warning"></span>
                    </div>
                    <div class="text">
                        <h2>Персональна підтримка</h2>
                        <p>Ми віддані вашому задоволенню і готові надати вам персональну підтримку на кожному кроці.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

