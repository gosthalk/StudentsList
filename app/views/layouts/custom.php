<!Doctype html>
<html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

            <title><?php echo $title; ?></title>

    </head>
    <body style="background-color:ghostwhite;">

        <header>
            <nav class="navbar d-flex navbar-light bg-dark">
                <a class="navbar-brand text-danger ml-5" href="/">StudentsList</a>
            </nav>
        </header>

        <div style="height: 30px">
            <?php
                if ($flag):
                    echo '<h6 class="d-flex justify-content-center align-items-center text-danger" style="height: 40px"> Ошибка! Имя и фамилия меньше 30 знаков, группа меньше 20 знаков, количество баллов не меньше 0 и не больше 300! </h6>';
                elseif (isset($_POST['add'])):
                    echo '<h6 class="d-flex justify-content-center align-items-center text-success" style="height: 40px"> Данные успешно загружены </h6>';
                else:

                endif;
            ?>
        </div>

        <div class="col-md-8 offset-md-2 bg-light mb-5">
            <?php echo $content; ?>
        </div>

        <div class="fixed-bottom">
            <footer class="d-flex justify-content-center align-items-center bg-dark text-danger" style="height: 60px">
                Footer
            </footer>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>

    </body>
</html>