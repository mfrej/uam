@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Edit Account</h1>
                    <p>Edit and submit this form to update a account</p>

                    <hr>

                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="imie">imie</label>
                                <input type="text" id="imie" class="form-control" name="imie"
                                       placeholder="imie" value="{{ $post->imie }}" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="nazwisko">nazwisko</label>
                                <input type="text" id="haslo" class="form-control" name="nazwisko"
                                       placeholder="nazwisko" value="{{ $post->nazwisko }}" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="login">login</label>
                                <input type="text" id="login" class="form-control" name="login"
                                       placeholder="login" value="{{ $post->login }}" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="haslo">haslo</label>
                                <input type="text" id="haslo" class="form-control" name="haslo"
                                       placeholder="haslo" value="{{ $post->haslo }}" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="typ">typ</label>
                                <input type="text" id="typ" class="form-control" name="typ"
                                       placeholder="typ" value="{{ $post->typ }}" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="telefon">telefon</label>
                                <input type="text" id="telefon" class="form-control" name="telefon"
                                       placeholder="telefon" value="{{ $post->telefon }}" required>
                            </div>
                            <div class="control-group col-12">
                                <label for="wyksztalcenie">wyksztalcenie</label>
                                <input type="text" id="wyksztalcenie" class="form-control" name="wyksztalcenie"
                                       placeholder="wyksztalcenie" value="{{ $post->wyksztalcenie }}" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="adres_z">adres_z</label>
                                <textarea id="body" class="form-control" name="adres_z" placeholder="adres_z"
                                          rows="5" required>{{ $post->adres_z }}</textarea>
                            </div>
                                                        
                            <div class="control-group col-12 mt-2">
                                <label for="adres_k">adres_k</label>
                                <textarea id="body" class="form-control" name="adres_k" placeholder="adres_k"
                                          rows="5" required>{{ $post->adres_k }}</textarea>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Update Account
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection