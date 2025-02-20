<div class="container" style='margin-top:20px'>
    <div class="form-group pull-right">
        <input type="text" class="search form-control" placeholder="What you looking for?">
    </div>
    <span class="counter pull-right"></span>
    <table class="table table-hover table-bordered results">
    <thead>
        <tr>
        <th>ID</th>
        <th style="width: 20%">Kategoria</th>
        <th style="width: 20%">Marka</th>
        <th style="width: 20%">Smak</th>
        <th style="width: 10%">Moc</th>
        <th style="width: 10%">Ilość</th>
        <th style="width: 10%">Cena</th>
        <th style="width: 10%">Akcje</th>
        </tr>
        <tr class="warning no-result">
        <td colspan="4"><i class="fa fa-warning"></i> No result</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->category->category}}</td>
        @if($product->brand_id == null)
            <td>Brak</td>
        @else
            <td>{{$product->brand->brand}}</td>
        @endif

        @if($product->flavour_id == null)
            <td>Brak</td>
        @else
            <td>{{$product->flavour->flavour}}</td>
        @endif

        @if($product->power == null)
            <td>Brak</td>
        @else
            <td>{{$product->power}}</td>
        @endif

        <td>{{$product->quantity}} szt.</td>

        @if($product->price == null)
            <td>Brak</td>
        @else
            <td>{{$product->price}} zł</td>
        @endif
        <td>
            <a href="" class="btn btn-primary">Edytuj</a>
            <a href="" class="btn btn-danger">Usuń</a>
        </td>
        @endforeach
    </tbody>
    </table>
</div>    