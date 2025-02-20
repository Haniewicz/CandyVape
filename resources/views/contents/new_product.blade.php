    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
    </style>
    <div class="container">
        <div class="form-container">
            @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message')['success'] }}
                </div>
            @elseif(Session::has('message'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('message')['error'] }}
                </div>
            @elseif ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('new_product_post') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="category">Typ produktu</label>
                            <input type="list" class="form-control" id="category" name="category" placeholder="Typ produktu" list="categories">
                            <datalist id="categories">
                                @foreach($lists['Categories'] as $item)
                                    <option value="{{$item['category']}}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label for="brand">Marka produktu</label>
                            <input type="list" class="form-control" id="brand" name="brand" placeholder="Marka produktu" list="brands">
                            <datalist id="brands">
                                @foreach($lists['Brands'] as $item)
                                    <option value="{{$item['brand']}}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label for="flavour">Smak</label>
                            <input type="list" class="form-control" id="flavour" name="flavour" placeholder="Smak" list="flavours">
                            <datalist id="flavours">
                                @foreach($lists['Flavours'] as $item)
                                    <option value="{{$item['flavour']}}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label for="power">Moc</label>
                            <input type="list" class="form-control" id="power" name="power" placeholder="Moc" list="power-options">
                            <datalist id="power-options">
                                <option value="3">
                                <option value="6">
                                <option value="12">
                                <option value="18">
                                <option value="20">
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label for="price">Cena</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Cena">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Ilość</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Ilość">
                        </div>
                    </div>
                </div>    <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>