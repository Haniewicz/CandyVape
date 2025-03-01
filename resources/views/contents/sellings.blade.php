<div class="container" style='margin-top:20px'>
    <div class="form-group pull-right">
        <input type="text" class="search form-control" placeholder="What you looking for?">
    </div>
    <span class="counter pull-right"></span>
    <table id="Magazyn" class="table table-hover table-bordered results">
    <thead>
        <tr>
        <th>ID</th>
        <th id="category" style="width: 20%">Kategoria</th>
        <th id="brand" style="width: 20%">Marka</th>
        <th id="flavour" style="width: 20%">Smak</th>
        <th id="Power" style="width: 10%">Moc</th>
        <th id="Quantity" style="width: 10%">Ilość</th>
        <th id="Price" style="width: 10%">Cena</th>
        <th id="Actions" style="width: 10%">Akcje</th>
        </tr>
        <tr class="warning no-result">
        <td colspan="4"><i class="fa fa-warning"></i> No result</td>
        </tr>
    </thead>
    <tbody>
        @foreach($sellings as $product)
        <tr id="row-{{ $product->id }}">
        <th scope="row-{{ $product->id }}">{{$product->id}}</th>
        <td>
            <select aria-label="category" class="form-control" name="category" id="category-{{ $product->product->id }}" style="width:100%" onchange="changeBrands({{$product->id}})" disabled>
                <option value="{{$product->product->category->id}}">{{$product->product->category->category}}</option>
                    @foreach($categories as $category)
                        @if($category->category->category != $product->product->category->category)
                            <option value="{{$category->category->id}}">{{$category->category->category}}</option>
                        @endif
                    @endforeach
            </select>
        </td>
        
        @if($product->product->brand_id == null)
            <td>
                <select aria-label="brand" class="form-control" name="brand" id="brand-{{ $product->product->id }}" style="width:100%" onchange="changeFlavours({{$product->id}})" disabled>
                <option value="">Brak</option>
            </td> 
        @else
            <td>
                <select aria-label="brand" class="form-control" name="brand" id="brand-{{ $product->product->id }}" style="width:100%" onchange="changeFlavours({{$product->id}})" disabled>
                <option value="{{$product->product->brand->id}}">{{$product->product->brand->brand}}</option>
                @foreach($product->product->category->brands as $brand)
                    @if($brand->brand != $product->product->brand->brand)
                        <option value="{{$brand->id}}">{{$brand->brand}}</option>
                    @endif
                @endforeach
                <option value="">Brak</option>
            </td>
        @endif

        @if($product->product->flavour_id == null)
            <td>
                <select aria-label="flavour" class="form-control" name="flavour" id="flavour-{{ $product->product->id }}" style="width:100%" disabled>
                <option value="" selected>Brak</option>
            </td>
        @else
            <td>
                <select aria-label="flavour" class="form-control" name="flavour" id="flavour-{{ $product->product->id }}" style="width:100%" disabled>
                <option value="{{$product->product->flavour->id}}" selected>{{$product->product->flavour->flavour}}</option>
                @foreach($product->product->brand->flavours as $flavour)
                    @if($flavour->flavour != $product->product->flavour->flavour)
                        <option value="{{$flavour->id}}">{{$flavour->flavour}}</option>
                    @endif
                @endforeach
                <option value="">Brak</option>
            </td>
        @endif

        @if($product->power == null)
            <td>
                <select aria-label="power" class="form-control" name="power" id="power-{{ $product->product->id }}" style="width:100%" disabled>
                    <option value = "" selected>Brak</option>
                    <option value = "3">3</option>
                    <option value = "6">6</option>
                    <option value = "12">12</option>
                    <option value = "18">18</option>
                    <option value = "20">20</option>
                </select>
            </td>
        @else
            <td>
                <select aria-label="power" class="form-control" name="power" id="power-{{ $product->product->id }}" style="width:100%" disabled>
                        <option value = "{{$product->product->power}}" selected>{{$product->power}}</option>
                        <option value = "3">3</option>
                        <option value = "6">6</option>
                        <option value = "12">12</option>
                        <option value = "18">18</option>
                        <option value = "20">20</option>
                </select>
            </td>
        @endif

        <td>
            <input type="number" id="quantity-{{ $product->product->id }}" class="form-control" name="quantity" value="{{ $product->product->quantity }}" style="width:100%" disabled>
        </td>

        @if($product->product->price == null)
            <td>
                <input type="text" id="price-{{ $product->product->id }}" class="form-control" name="price" value="0" style="width:100%" disabled>
            </td>
        @else
            <td>
                <input type="text" id="price-{{ $product->product->id }}" class="form-control" name="price" value="{{ $product->product->price }}" style="width:100%" disabled>
            </td>
        @endif
        <td>
            <input type="hidden" id="submit-{{$product->product->id}}" value="Zatwierdź" class="btn btn-success" onclick="updateProduct({{ $product->id }})" disabled>
            <input type="submit" id="edit-{{$product->product->id}}" value="Edytuj" class="btn btn-primary" onclick="editProduct({{ $product->id }})">
            <input type="submit" id="delete-{{$product->product->id}}" value="Usuń" class="btn btn-danger" onclick="deleteProduct({{ $product->id }})" disabled>
        </td>
        @endforeach
    </tbody>
    </table>

</div>
<script>
    //funkcja do wyszukiwania w tabeli i zwracania tego co znalazło

    function editProduct(tableID)
    {
        var Category = document.getElementById("category-"+tableID);
        var Brand = document.getElementById("brand-"+tableID);
        var Flavour = document.getElementById("flavour-"+tableID);
        var Power = document.getElementById("power-"+tableID);
        var Quantity = document.getElementById("quantity-"+tableID);
        var Price = document.getElementById("price-"+tableID);
        var Edit = document.getElementById("edit-"+tableID);
        var Delete = document.getElementById("delete-"+tableID);
        var Submit = document.getElementById("submit-"+tableID);

        Category.disabled = false;
        Brand.disabled = false;
        Flavour.disabled = false;
        Power.disabled = false;
        Quantity.disabled = false;
        Price.disabled = false;
        Delete.disabled = false;
        Edit.type = "hidden";
        Submit.disabled = false;
        Submit.type = "submit";

    }

    function updateProduct(tableID)
    {
        var Category = document.getElementById("category-"+tableID);
        var Brand = document.getElementById("brand-"+tableID);
        var Flavour = document.getElementById("flavour-"+tableID);
        var Power = document.getElementById("power-"+tableID);
        var Quantity = document.getElementById("quantity-"+tableID);
        var Price = document.getElementById("price-"+tableID);
        var Edit = document.getElementById("edit-"+tableID);
        var Delete = document.getElementById("delete-"+tableID);
        var Submit = document.getElementById("submit-"+tableID);
        var token = '{{csrf_token()}}';
    
        //Request żeby zaktualizować produkt
        $(function ()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('update_product')}}",
                data: {
                    id: tableID,
                    category: Category.value,
                    brand: Brand.value,
                    flavour: Flavour.value,
                    power: Power.value,
                    quantity: Quantity.value,
                    price: Price.value
                },
                success: function(response){
                    console.log(response);
                }
            });
        });

        Category.disabled = true;
        Brand.disabled = true;
        Flavour.disabled = true;
        Power.disabled = true;
        Quantity.disabled = true;
        Price.disabled = true;
        Delete.disabled = true;
        Submit.disabled = true;
        Submit.type = "hidden";
        Edit.type = "submit";
    }
    
    function deleteProduct(tableID)
    {
        var Row = document.getElementById("row-"+tableID);

        //Request żeby usunąć produkt
        $(function ()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            
            $.ajax({
                type: "POST",
                url: "{{route('delete_product')}}",
                data: {
                    id: tableID,
                },
                success: function(response){
                    console.log(response);
                }
            });
        });

        Row.style.display = "none";
    }


    function changeBrands(tableID)
    {
        var Category = document.getElementById("category-"+tableID);
        var Brand = document.getElementById("brand-"+tableID);
        var Flavour = document.getElementById("flavour-"+tableID);

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
                    response = JSON.parse(response)
                    Brand.innerHTML = "";
                    Brand.value = null;
                    Flavour.innerHTML = null;
                    if(response != null);
                    {
                        for (let i = 0; i < response.length; i++) {
                            Brand.innerHTML += "<option value="+response[i]['id']+">"+response[i]['brand']+"</option>";
                            if(i == 0){
                                Brand.value = response[i]['id'];
                            }
                        }
                        if(Brand.value != null)
                        {
                            changeFlavours(tableID);
                        }else{
                            Flavour.innerHTML = "";
                        }
                    }

                }
            });
        });
        
    }

    function changeFlavours(tableID)
    {
        var Category = document.getElementById("category-"+tableID);
        var Brand = document.getElementById("brand-"+tableID);
        var Flavour = document.getElementById("flavour-"+tableID);


        if(Brand.value != null)
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
                        response = JSON.parse(response)
                        Flavour.innerHTML = "";
                        if(response != null)
                        {
                            for (let i = 0; i < response.length; i++) {
                                Flavour.innerHTML += "<option value="+response[i]['id']+">"+response[i]['flavour']+"</option>";
                            }
                        }
                    }
                });
            });
        }

    }


    



        
</script>