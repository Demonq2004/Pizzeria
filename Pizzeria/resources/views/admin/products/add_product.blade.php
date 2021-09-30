@extends('app')

@section('content')

        @if(isset($product))
            <div class="main-page" style="margin-top: 100px">

            <article class="content px-3 py-5 p-md-5">
                <h1>Fromularz edytowania produktów</h1>
                <form action="/admin/products/{{ $product->id }} " method="POST">
                @csrf <!-- {{ csrf_field() }} -->
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="exampleInputProduct">Nazwa Produktu</label>
                        <input type="text" class="form-control" name="nazwa" id="exampleInputProduct" placeholder="Produkt" value="{{ $product->nazwa }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProductPrice">Cena Produktu</label>
                        <input type="number" class="form-control" name="cena" id="exampleInputProductsPrice" value="{{ $product->cena }}" placeholder="Cena" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProductSupplier">Dostawca Produktu</label>
                        <input type="text" class="form-control" name="dostawca" id="exampleInputProductSupplier" value="{{ $product->dostawca }}" placeholder="Dostawca" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProductExpirationDate">Data Ważności Produktu</label>
                        <input type="date" class="form-control" name="data_waznosci" id="exampleInputProductExpirationDate" value="{{ $product->data_waznosci }}" placeholder="Data Ważności"  aria-describedby="dateHelp" required>
                        <small id="dateHelp" class="from-text text-muted">Przykładnowa data: 2022-05-01</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Edytuj Produkt</button>
                </form>
            </article>
        @else
                    <div class="main-page" style="margin-top: 100px">

            <article class="content px-3 py-5 p-md-5">
                <h1>Fromularz dodawania produktów</h1>
                <form action="/admin/products" method="POST">
                @csrf <!-- {{ csrf_field() }} -->
                    <div class="form-group">
                        <label for="exampleInputProduct">Nazwa Produktu</label>
                        <input type="text" class="form-control" name="nazwa" id="exampleInputProduct" placeholder="Produkt" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProductPrice">Cena Produktu</label>
                        <input type="number" class="form-control" name="cena" id="exampleInputProductsPrice" placeholder="Cena" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProductSupplier">Dostawca Produktu</label>
                        <input type="text" class="form-control" name="dostawca" id="exampleInputProductSupplier" placeholder="Dostawca" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputProductExpirationDate">Data Ważności Produktu</label>
                        <input type="date" class="form-control" name="data_waznosci" id="exampleInputProductExpirationDate" placeholder="Data Ważności"  aria-describedby="dateHelp" required>
                        <small id="dateHelp" class="from-text text-muted">Przykładnowa data: 2022-05-01</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Dodaj Produkt</button>
                </form>
            </article>
    @endif
@endsection()
