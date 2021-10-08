@extends('app')
@php
    if(Auth::check()){
    $phone = Auth::user()->telefon;
}else{
    $phone = null;
}
@endphp
@section('content')
    <div class="main-page" style="margin-top: 100px;width: 60%; margin-left: 20%">
        <article class="content px-5 py-5 p-md-5" style=" min-height: 400px">
            <form action="/orders/order" method="POST">
            @csrf <!-- {{ csrf_field() }} -->
                @if(Auth::check() && !$addresses->isEmpty())
                    <div class="form-check">
                        <input class="form-check-input" value="na_miejscu"  type="radio" name="miejsce" id="miejsce1" onchange="namiejscu()" required>
                        <label class="form-check-label"  for="flexRadioDefault1"> Zamów na miejscu </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="na_adres" type="radio" name="miejsce" id="miejsce3" onchange="pokazAdresUser()" required checked>
                        <label class="form-check-label" for="flexRadioDefault2">Wybierz swój adres</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="na_adres" type="radio" name="miejsce" id="miejsce2" onchange="pokazAdres()" required>
                        <label class="form-check-label" for="flexRadioDefault2"> Zamów na adres </label>
                    </div>
                @else
                    <div class="form-check">
                        <input class="form-check-input" value="na_miejscu"  type="radio" name="miejsce" id="miejsce1" onchange="namiejscu()" required>
                        <label class="form-check-label"  for="flexRadioDefault1"> Zamów na miejscu </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="na_adres" type="radio" name="miejsce" id="miejsce2" onchange="pokazAdres()" required checked>
                        <label class="form-check-label" for="flexRadioDefault2"> Zamów na adres </label>
                    </div>
                @endif
                <div class="form-group">
                    <label for="tel">Numer Telefonu:</label>
                    <input type="tel" id="phone" name="telefon"
                           pattern="[0-9]{9}" value="{{$phone}}"
                           required class="form-control">
                </div>
                @if(Auth::check() && !$addresses->isEmpty())
                    <div id="adres" style="display: none" >
                        @else
                            <div id="adres" style="display: block" >
                                @endif

                                <div class="form-group">
                                    <label for="miejscowosc">Miejscowość:</label>
                                    <input class="form-control" id="miejscowosc" type="text" name="miejscowosc">
                                    @error('miejscowosc') <p style="color: red">{{ $message }}</p> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="adres">Adres:</label>
                                    <input  class="form-control" id="adres" type="text" name="adres" >
                                    @error('adres') <p style="color: red">{{ $message }}</p>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="kod">Kod Pocztowy:</label>
                                    <input class="form-control" id="kod" type="text" name="kodPocztowy" >
                                    @error('kodPocztowy') <p style="color: red">{{ $message }}</p> @enderror
                                </div>


                                <div class="form-check" style="margin-top: 20px">
                                    <input class="form-check-input"  type="checkbox" name="powiadomcheckbox" id="powiadomcheckbox" onclick="powiadom()">
                                    <label class="form-check-label" > Powiadom innych domowników przy dostarczeniu pizzy </label>
                                    <div id="powiadom" style="margin-top: 20px; margin-left: 20px; display: none">
                                        <input  class="form-control" id="tel" type="number" pattern="[0-9]{9}" minlength="9" maxlength="9" name="telefon1" placeholder="Podaj numer telefonu pierwszej osoby">
                                        <input class="form-control" id="tel" type="number" pattern="[0-9]{9}" minlength="9" maxlength="9" name="telefon2" placeholder="Podaj numer telefonu drugiej osoby">
                                        <input class="form-control" id="tel" type="number" pattern="[0-9]{9}" minlength="9" maxlength="9" name="telefon3" placeholder="Podaj numer telefonu trzeciej osoby">
                                        <input class="form-control" id="tel" type="number" pattern="[0-9]{9}" minlength="9" maxlength="9" name="telefon4" placeholder="Podaj numer telefonu czwartej osoby">
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
                                @if(Auth::check() && !$addresses->isEmpty())
                                    <input type="submit" value="Złóż zamówienie" class="btn btn-success" style="margin-top: 20px;display: none" id="wyslij">
                                @else
                                    <input type="submit" value="Złóż zamówienie" class="btn btn-success" style="margin-top: 20px;display: none" id="wyslij">
                                @endif

                            </div>

                            @if(Auth::check() && isset($addresses))
                                <div style="display: block;" id="account_adres">
                                    <div class="form-check" style="margin-top: 20px; width: 100%;">
                                        <input class="form-check-input"  type="checkbox" name="powiadomcheckbox" id="powiadomcheckbox2" onclick="powiadom2()">
                                        <label class="form-check-label" > Powiadom innych domowników przy dostarczeniu pizzy </label>
                                        <div id="powiadom2" style="margin-top: 20px; margin-left: 20px; display: none">
                                            <input  class="form-control" id="tel" type="number" pattern="[0-9]{9}" minlength="9" maxlength="9" name="telefon1" placeholder="Podaj numer telefonu pierwszej osoby">
                                            <input class="form-control" id="tel" type="number" pattern="[0-9]{9}" minlength="9" maxlength="9" name="telefon2" placeholder="Podaj numer telefonu drugiej osoby">
                                            <input class="form-control" id="tel" type="number" pattern="[0-9]{9}" minlength="9" maxlength="9" name="telefon3" placeholder="Podaj numer telefonu trzeciej osoby">
                                            <input class="form-control" id="tel" type="number" pattern="[0-9]{9}" minlength="9" maxlength="9" name="telefon4" placeholder="Podaj numer telefonu czwartej osoby">
                                            <small>Nie musisz wypełniać wszystkich pól!</small>
                                        </div>
                                    </div>
                                    @foreach($addresses as $address)
                                        <div class="col-xl-6 col-sm-12" style=" border: 5px solid white; float: left; margin-top: 50px; margin-bottom: 50px">

                                            <div style="width: 100%; height: 100%; border: 1px solid gray; padding: 20px">
                                                <h4>{{$address->nazwa}}</h4>
                                                <p><b>Miejscowość:</b> {{$address->Miejscowosc}}</p>
                                                <p><b>Adres:</b> {{$address->Ul_adres}}</p>
                                                <p><b>Kod Pocztowy:</b> {{$address->kod_pocztowy}}</p>

                                                <input type="hidden" name="miejscowosc" value="{{$address->Miejscowosc}}">
                                                <input type="hidden" name="adres" value="{{$address->Ul_adres}}">
                                                <input type="hidden" name="kodPocztowy" value="{{$address->kod_pocztowy}}">
                                                <input type="radio" name="adress" value={{$address->id}}> Wybierz adres
                                            </div>
                                        </div>
                                    @endforeach
                                    <button type="submit" class="btn btn-success">Złóż zamówienie</button>
                                    @endif

                                </div>

            </form>
            <script>
                function pokazAdres(){
                    document.getElementById('adres').style = "display:block;";
                    document.getElementById('wyslij').style = "display:block";
                    document.getElementById('account_adres').style = "display:none";
                }
                function namiejscu(){
                    document.getElementById('adres').style = "display:none;";
                    document.getElementById('wyslij').style = "display:block";
                    document.getElementById('account_adres').style = "display:none";
                }
                function pokazAdresUser(){
                    document.getElementById('adres').style = "display:none;";
                    document.getElementById('wyslij').style = "display:none";
                    document.getElementById('account_adres').style = "display:block";
                }
                function powiadom(){
                    var x = document.getElementById('powiadomcheckbox').checked;
                    if(x == true){
                        document.getElementById('powiadom').style = "display:block;";
                    }else{
                        document.getElementById('powiadom').style = "display:none;";
                    }
                }
                function powiadom2(){
                    var x = document.getElementById('powiadomcheckbox2').checked;
                    if(x == true){
                        document.getElementById('powiadom2').style = "display:block;";
                    }else{
                        document.getElementById('powiadom2').style = "display:none;";
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
