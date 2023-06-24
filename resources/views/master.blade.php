

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta property="og:description" content="Інтернет магазин якісної техникі" />
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    <link rel="stylesheet" href="/css/style.css">


    <title>TechnoKit: @yield('title')</title>
    <style>
        html, body, .carousel{
            height: 60vh;
        }
        @media (max-width: 740px) {
            .html, body, .carousel{
                height: 100vh;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            .html, body, .carousel{
                height: 100vh;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light bg-gradient position-fixed z-1 w-100">
    <div class="container">
        <a class="navbar-brand" href="">
            <img class="img-fluid" src="" alt="Slovenska Pekara" style="max-height: 40px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="">Продажа</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Товары
                        </a>

                        <div class="dropdown-menu dropdown-menu-end bg-light bg-gradient"
                             aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">
                                Все товары
                            </a>
                            <a class="dropdown-item" href="">
                                Добавить новый товар
                            </a>

                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="">Открытый чек
                                <span class="badge text-bg-info">New</span>
                        </a>
                    </li>

                </ul>
        </div>
    </div>
</nav>





@yield('content')

<footer>
    <div class="container">
        <div class="row" style="color: aliceblue">
            <div class="col-3" style="font-size: 12px">© Created by FoxCreator</div>
            <div class="col-3" style="font-size: 12px"><a class="link-secondary" href="{{ asset('docs/ПУБЛІЧНИЙ ДОГОВІР (ОФЕРТА).pdf') }}" download>Договір оферти</a></div>
            <div class="col-3" style="font-size: 12px"><a class="link-secondary" href="{{ asset('docs/Політика конфіденційності.pdf') }}" download>Політика конфіденційності</a></div>
            <div class="col-3" style="font-size: 12px">All rights Reserved</div>
        </div>
    </div>
</footer>



<script src="/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</body>


</html>

