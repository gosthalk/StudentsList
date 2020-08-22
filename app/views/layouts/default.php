<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
        <link rel="shortcut icon" href="app/views/layouts/styles/icon.ico" type="image/x-icon">

        <title><?php echo $title; ?></title>

    </head>
    <body style="background-color:ghostwhite;">

        <header>
            <nav class="navbar d-flex justify-content-around navbar-light bg-dark">
                <a class="navbar-brand text-danger" href="/">StudentsList</a>
                <form action='/search' method="post" class="form-inline">
                    <input class="form-control mr-sm-2 flex-grow-2" type="search" placeholder="Search" aria-label="Search" name="searchData">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" name="search">Search</button>
                </form>
                <?php if(isset($_COOKIE['id'])) { ?>
                <div class="d-flex mx-3">
                    <form action="/edit" method="post">
                        <button type="submit" class="btn btn-primary mr-sm-2">Edit</button>
                    </form>
                    <form action="/delete" method="post">
                        <button type="submit" class="btn btn-outline-danger mr-sm-2">Delete</button>
                    </form>
                </div>
                <?php }else{ ?>
                <form action="/add" method="post">
                    <button type="submit" class="btn btn-outline-danger mr-sm-2">Add</button>
                </form>
                <?php } ?>
            </nav>
        </header>

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
