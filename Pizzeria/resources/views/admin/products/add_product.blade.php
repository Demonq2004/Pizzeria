@extends('app')

@section('content')
    <div class="main-wrapper">
        <header class="page-title theme-bg-light text-center gradient py-5">
            <h1 class="heading">Blog Home Page Heading</h1>
        </header>
        <article class="content px-3 py-5 p-md-5">
            <h1>Fromularz dodawania produktow</h1>
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputProduct">Nazwa Produktu</label>
                    <input type="text" class="form-control" name="product" id="exampleInputProduct" placeholder="Produkt" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputProductPrice">Cena Produktu</label>
                    <input type="number" class="form-control" name="price" id="exampleInputProductsPrice" placeholder="Cena" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputProductSupplier">Dostawca Produktu</label>
                    <input type="text" class="form-control" name="supplier" id="exampleInputProductSupplier" placeholder="Dostawca" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputProductExpirationDate">Data Ważności Produktu</label>
                    <input type="date" class="form-control" name="supplier" id="exampleInputProductExpirationDate" placeholder="Data Ważności"  aria-describedby="dateHelp" required>
                    <small id="dateHelp" class="from-text text-muted">Przykładnowa data: 2022-05-01</small>
                </div>
                <button type="submit" class="btn btn-primary">Dodaj Produkt</button>
            </form>
        </article>
@endsection()
