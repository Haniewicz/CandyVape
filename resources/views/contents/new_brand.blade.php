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
            <form action="{{ route('new_brand_post') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="category">Kategoria</label>
                            <select class="form-control js-example-basic-multiple" name="category[]" id="category" multiple="multiple">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand">Marka</label>
                            <input type="text" class="form-control" name="brand" placeholder="Marka">
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
       $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>