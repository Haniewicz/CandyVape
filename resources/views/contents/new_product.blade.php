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
            <form>
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="type">Typ produktu</label>
                            <input type="list" class="form-control" id="type" placeholder="Typ produktu" list="type-options">
                            <datalist id="type-options">
                                <option value="E-liquid">
                                <option value="Mod">
                                <option value="Pod">
                                <option value="Accessory">
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label for="brand">Marka produktu</label>
                            <input type="list" class="form-control" id="brand" placeholder="Marka produktu" list="brand-options">
                            <datalist id="brand-options">
                                <option value="Brand A">
                                <option value="Brand B">
                                <option value="Brand C">
                                <option value="Brand D">
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label for="flavour">Smak</label>
                            <input type="list" class="form-control" id="flavour" placeholder="Smak" list="flavour-options">
                            <datalist id="flavour-options">
                                <option value="Strawberry">
                                <option value="Mint">
                                <option value="Vanilla">
                                <option value="Chocolate">
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label for="power">Moc</label>
                            <input type="list" class="form-control" id="power" placeholder="Moc" list="power-options">
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
                            <input type="text" class="form-control" id="price" placeholder="Cena">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Ilość</label>
                            <input type="number" class="form-control" id="quantity" placeholder="Ilość">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>