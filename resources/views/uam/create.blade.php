@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/uam" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Create a New Account</h1>
                    <p>Fill and submit this form to create an account </p>

                    <hr>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                                @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                        <div class="control-group col-12">
                                <label for="imie">imie</label>
                                <input type="text" id="imie" class="form-control" name="imie"
                                       placeholder="wpisz text" >
                        </div>
                        <div class="control-group col-12">
                                <label for="nazwisko">nazwisko</label>
                                <input type="text" id="nazwisko" class="form-control" name="nazwisko"
                                       placeholder="wpisz text" >
                        </div>
                        <div class="control-group col-12">
                                <label for="login">login</label>
                                <input type="text" id="login" class="form-control" name="login"
                                       placeholder="wpisz email" required>
                        </div>
                        <div class="control-group col-12">
                                <label for="haslo">haslo</label>
                                <input type="text" id="haslo" class="form-control" name="haslo"
                                        placeholder="wpisz haslo" required>
                        </div>
                        <div class="control-group col-12">
                                <label for="typ">typ</label> 
                                <input type="checkbox" id="typ" class="form-control" name="typ[]" value="wykladowca">wykladowca
                                <input type="checkbox" id="typ" class="form-control" name="typ[]" value="pracownik_administracyjny">pracownik_administracyjny
                        </div>
                        <div class="control-group col-12">
                                <label for="telefon">telefon</label>
                                <input type="text" id="telefon" class="form-control" name="telefon"
                                        placeholder="wpisz telefon" >
                        </div>
                        <div class="control-group col-12">
                                <label for="wyksztalcenie">wyksztalcenie</label>
                                <input type="text" id="wyksztalcenie" class="form-control" name="wyksztalcenie"
                                        placeholder="wpisz wyksztalcenie" >
                        </div>
                        <div class="control-group col-12">
                                <label for="adres_z">adres_z</label>
                                <input type="text" id="adres_z_wojewodztwo" class="form-control" name="adres_z_wojewodztwo"
                                        placeholder="województwo" >
                                <input type="text" id="adres_z_miasto" class="form-control" name="adres_z_miasto"
                                        placeholder="miasto" >
                                <input type="text" id="adres_z_kod" class="form-control" name="adres_z_kod"
                                        placeholder="kod" >
                                <input type="text" id="adres_z_ulica" class="form-control" name="adres_z_ulica"
                                        placeholder="ulica" >
                                <input type="text" id="adres_z_numer" class="form-control" name="adres_z_numer"
                                        placeholder="numer" >

                        </div>
                        <div class="control-group col-12">
                                <label for="adres_k">adres_k</label>
                                <input type="text" id="adres_k_wojewodztwo" class="form-control" name="adres_k_wojewodztwo"
                                        placeholder="województwo" >
                                <input type="text" id="adres_k_miasto" class="form-control" name="adres_k_miasto"
                                        placeholder="miasto" >
                                <input type="text" id="adres_k_kod" class="form-control" name="adres_k_kod"
                                        placeholder="kod" >
                                <input type="text" id="adres_k_ulica" class="form-control" name="adres_k_ulica"
                                        placeholder="ulica" >
                                <input type="text" id="adres_k_numer" class="form-control" name="adres_k_numer"
                                        placeholder="numer" >

                        </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Create Account
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection