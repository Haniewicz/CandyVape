<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .vh-100 {
            height: 100vh !important;
        }
        .d-flex {
            display: flex !important;
        }
        .justify-content-center {
            justify-content: center !important;
        }
        .align-items-center {
            align-items: center !important;
        }
    </style>
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        
        <div class="row justify-content-center align-items-center w-100">
            <div class="col-12 col-md-8 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Logowanie</h2>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nazwa</label>
                                <input type="name" class="form-control" id="name" name="name" placeholder="Podaj nazwę">
                            </div>
                            <div class="form-group">
                                <label for="password">Hasło</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Podaj hasło">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Zaloguj</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
