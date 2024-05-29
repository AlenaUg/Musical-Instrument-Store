<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title') :: Интернет магазин</title>
        <link href="/styles/main.css" rel="stylesheet" type="text/css">
        <link href="/styles/search.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <ul class="menu-main">
            <li ><a href="{{ route('index') }}" class="glav"><i class="fas fa-home">&nbsp&nbsp</i>Главная</a></li>
            <li><h1 class="text-center">Муза &#9835;</h1></li>
            @yield('main')
            @guest
            <p class="text-right"><a href="{{ route('register') }}"><i class="fas fa-user">&nbsp&nbsp</i>Регистрация</a></p>
            <div class="btn">
            <form action="{{ route('login') }}"  class="form-inline">
            @csrf
            <!-- поля для ввода логина и пароля -->
            <button class="btn btn-primary" >Вход</button>
            </form>
            </div>
            @endguest
            @auth
            <p class="text-right"><a href="{{ route('addCart') }}"><i class="fa fa-shopping-cart">&nbsp;</i>Корзина: </a>
            <span class="coun-style">{{\Cart::session(\Illuminate\Support\Facades\Session::getId())->getTotalQuantity()}}</span>
            </p>
            <p class="text-rig"><a href="{{ route('admin_panel') }}"><i class=""></i>Админ-панель</a></p>
            <div class="btn"><form action="{{ route('logout') }}" method="POST"
            class="form-inline">
            @csrf
            <input margin="10px" type="submit" class="btn btn-danger" value="Выход">
            </form>
            </div>
            @endauth
            </ul>
        </div>
        <div class="d2">
            <form method="get" action="{{ route('search') }}" onsubmit="return validateForm()">
                <input type="text" id="s" name="s" placeholder="Искать здесь...">
                <button type="submit">&#128270;</button>
            </form>
        </div>

        <script>
            function validateForm() {
                var searchTerm = document.getElementById('s').value.trim();

                if (searchTerm === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: 'Введите поисковый запрос',
                    });
                    return false;
                }

                return true;
            }
        </script>
    </body>
</html>