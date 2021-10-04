@extends('app')

@section('content')
    <div class="main-page" style="margin-top: 100px;width: 60%; margin-left: 20%">
        <article class="content px-5 py-5 p-md-5" style=" min-height: 400px">
            <div class="alert-success">
                @include('alerts')
            </div>
            <form action="/orders/order" method="POST">
            @csrf <!-- {{ csrf_field() }} -->
                <div class="form-check">
                    <input class="form-check-input" value="na_miejscu"  type="radio" name="miejsce" id="miejsce1" onchange="namiejscu()">
                    <label class="form-check-label"  for="flexRadioDefault1"> Zamów na miejscu </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="na_adres" type="radio" name="miejsce" id="miejsce2" onchange="pokazAdres()">
                    <label class="form-check-label" for="flexRadioDefault2"> Zamów na adres </label>
                </div>
                <div class="form-group">
                    <label for="tel">Numer Telefonu:</label>
                    <input class="form-control" id="tel" type="number" minlength="9" maxlength="9" name="telefon" required>
                </div>
                <div id="adres" style="margin-top: 30px; margin-left: 30px; display: none" >
                    <div class="form-group">
                        <label for="miejscowosc">Miejscowość:</label>
                        <input class="form-control" id="miejscowosc" type="text" name="miejscowosc">
                    </div>
                    <div class="form-group">
                        <label for="adres">Adres:</label>
                        <input  class="form-control" id="adres" type="text" name="adres" >
                    </div>
                    <div class="form-group">
                        <label for="kod">Kod Pocztowy:</label>
                        <input class="form-control" id="kod" type="text" name="kodPocztowy" >
                    </div>


                    <div class="form-check" style="margin-top: 20px">
                        <input class="form-check-input"  type="checkbox" name="powiadomcheckbox" id="powiadomcheckbox" onclick="powiadom()">
                        <label class="form-check-label" > Powiadom innych domowników przy dostarczeniu pizzy </label>
                        <div id="powiadom" style="margin-top: 20px; margin-left: 20px; display: none">
                            <input  class="form-control" id="tel" type="number" minlength="9" maxlength="9" name="telefon1" placeholder="Podaj numer telefonu pierwszej osoby">
                            <input class="form-control" id="tel" type="number" minlength="9" maxlength="9" name="telefon2" placeholder="Podaj numer telefonu drugiej osoby">
                            <input class="form-control" id="tel" type="number" minlength="9" maxlength="9" name="telefon3" placeholder="Podaj numer telefonu trzeciej osoby">
                            <input class="form-control" id="tel" type="number" minlength="9" maxlength="9" name="telefon4" placeholder="Podaj numer telefonu czwartej osoby">
                            <small>Nie musisz wypełniać wszystkich pól!</small>
                        </div>
                    </div>

                </div>
                <div>

                    <div class="form-check" style="margin-top: 20px">
                        <input class="form-check-input"  type="checkbox" name="godzinaPokaz" id="godzinaPokaz" onclick="godzina()">
                        <label class="form-check-label" > Zamów na daną godzinę</label>
                        <div id="pokazGodzine" style="margin-top: 20px; margin-left: 20px; display: none">
                            <input type="time" class="form-control" name="godzinadostarczenia" placeholder="Podaj godzine">
                        </div>
                    </div>
                    <input type="submit" value="Zamów" class="btn btn-success" style="margin-top: 20px">
                </div>
            </form>
            <script>
                function pokazAdres(){
                        document.getElementById('adres').style = "display:block;";
                }
                function namiejscu(){
                        document.getElementById('adres').style = "display:none;";
                }
                function powiadom(){
                    var x = document.getElementById('powiadomcheckbox').checked;
                    if(x == true){
                        document.getElementById('powiadom').style = "display:block;";
                    }else{
                        document.getElementById('powiadom').style = "display:none;";
                    }
                }
                function godzina(){
                    var x = document.getElementById('godzinaPokaz').checked;
                    if(x == true){
                        document.getElementById('pokazGodzine').style = "display:block;";
                    }else{
                        document.getElementById('pokazGodzine').style = "display:none;";
                    }
                }
            </script>
        </article>
    </div>
@endsection()

