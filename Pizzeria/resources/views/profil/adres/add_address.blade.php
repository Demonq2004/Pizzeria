@extends('app')
@php

@endphp
@section('content')


    <div class="main-page" style="margin-top: 100px">
        <article class="content px-3 py-5 p-md-5">
            <h1>Formularz dodania adresu</h1>
            <form action="/profil/adres" method="POST">
            @csrf <!-- {{ csrf_field() }} -->
                <div class="form-group">
                    <label for="exampleInputName">Nazwę Adresu</label>
                    <input type="text" class="form-control" name="nazwa" id="exampleInputName" placeholder="Nazwa" required>
                    <small style="color: gray">Np. Mój pierwszy adres</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputCity">Miejscowość</label>
                    <input type="text" class="form-control" name="miejscowosc" id="exampleInputCity" placeholder="Miejscowość" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputAddress">Nazwa ulicy i nr. domu</label>
                    <input type="text" class="form-control" name="adres" id="exampleInputAddress" placeholder="Adres" required>
                    <small style="color: gray">Np. Korfantego 2</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputKod">Kod pocztowy</label>
                    <input type="text" class="form-control" name="kod_pocztowy" id="exampleInputKod" pattern="^[0-9]{2}-[0-9]{3}$" placeholder="Kod Pocztowy" required>
                </div>
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <button type="submit" class="btn btn-primary">Dodaj Adres</button>
            </form>
        </article>
    </div>
@endsection()

