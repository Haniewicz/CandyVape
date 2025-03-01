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
                            <select class="form-control" id="category" name="category" onchange="changeBrands()" placeholder="Typ produktu" style="width:100%">
                                <option value="">Brak</option>
                                @foreach($lists['Categories'] as $item)
                                    <option value="{{$item['id']}}">{{$item['category']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand">Marka produktu</label>
                            <select class="form-control" id="brand" name="brand" onchange="changeFlavours()" placeholder="Marka produktu" style="width:100%">
                                <option value="">Brak</option>
                                <optgroup id="brandsGroup" label="Marki">
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="flavour">Smak</label>
                            <select class="form-control" id="flavour" name="flavour" placeholder="Smak">
                            <option value="">Brak</option>
                            <optgroup id="flavoursGroup" label="Smaki">

                            </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="power">Moc</label>
                            <select class="form-control" id="power" name="power" placeholder="Moc">
                                <option value="">Brak</option>
                                <option value="3">3</option>
                                <option value="6">6</option>
                                <option value="12">12</option>
                                <option value="18">18</option>
                                <option value="20">20</option>
                            </select>
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

    <script>
        function changeBrands()
        {
            var Category = document.getElementById("category");
            var Brand = document.getElementById("brand");
            var brandsGroup = document.getElementById("brandsGroup");
            var Flavour = document.getElementById("flavour");
            var flavoursGroup = document.getElementById("flavoursGroup");

            if(Category.value == null || Category.value == "")
            {
                Brand.value = "";
                brandsGroup.innerHTML = "";
                Flavour.value = "";
                flavoursGroup.innerHTML = "";
            }

            if(Category.value != "")
            {
                $(function ()
                {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });
                    
                    $.ajax({
                        type: "POST",
                        url: '{{Route('get_brands')}}',
                        data: {
                            id: Category.value,
                        },
                        dataType: "json",
                        success: function(response)
                        {
                            response = JSON.parse(response);
                            brandsGroup.innerHTML = "";
                            Brand.value = "";
                            flavoursGroup.innerHTML = "";
                            Flavour.value = "";
                            if(response != null);
                            {
                                for (let i = 0; i < response.length; i++) {
                                    brandsGroup.innerHTML += "<option value="+response[i]['id']+">"+response[i]['brand']+"</option>";
                                    
                                }
                            }
                            if(Brand.value != "")
                            {
                                changeFlavours();
                            }
                        }
                    });
                });
            }
        }

        function changeFlavours()
        {
            var Category = document.getElementById("category");
            var Brand = document.getElementById("brand");
            var brandsGroup = document.getElementById("brandsGroup");
            var Flavour = document.getElementById("flavour");
            var flavoursGroup = document.getElementById("flavoursGroup");

            if(Brand.value == null || Brand.value == "")
            {
                Flavour.value = "";
                flavoursGroup.innerHTML = "";
            }

            if(Brand.value != null || Brand.value != '')
            {
                $(function ()
                {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });
                    
                    $.ajax({
                        type: "POST",
                        url: '{{Route('get_flavours')}}',
                        data: {
                            id: Brand.value,
                        },
                        dataType: "json",
                        success: function(response)
                        {
                            console.log(response);
                            flavoursGroup.innerHTML = "";
                            if(response != null)
                            {
                                response = JSON.parse(response);
                                for (let i = 0; i < response.length; i++) {
                                    flavoursGroup.innerHTML += "<option value="+response[i]['id']+">"+response[i]['flavour']+"</option>";
                                }
                            }else{
                                flavoursGroup.innerHTML = "";
                                Flavour.value = null;
                            }
                        }
                    });
                });
            }else{
                flavoursGroup.innerHTML = "";
                Flavour.value = null;
            }
        }
    </script>