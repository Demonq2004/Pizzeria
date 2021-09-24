@extends('app')

@section('content')
    <div class="main-wrapper">
        <header class="page-title theme-bg-light text-center gradient py-5">
            <h1 class="heading">Blog Home Page Heading</h1>
        </header>
        <article class="content px-3 py-5 p-md-5">
            <h1>Lista produktów</h1>
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Dostawca</th>
                        <th scope="col">Data Ważności</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pomidor</td>
                        <td>2zł</td>
                        <td>Hurtownia Katowice</td>
                        <td>08-10-2021</td>
                    </tr>
                    <tr>
                        <td>Ser</td>
                        <td>5zł</td>
                        <td>Serownia "Pod Grzybem"</td>
                        <td>12-11-2021</td>
                    </tr>
                </tbody>
            </table>
        </article>
@endsection()
