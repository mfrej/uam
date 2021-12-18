<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accounts = Account::all(); 
        return $accounts; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('uam.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //walidacja
        $rules = [
            'imie' => 'required|alpha|max:255',
            'nazwisko' => 'required|alpha|max:255',
            'login' => 'required|unique:accounts|email|max:255',
            'haslo' => ['required', Password::min(8)],
            'typ' => ['required','array',Rule::in(['wykladowca', 'pracownik_administracyjny'])],
        ];

        if(!is_null($request->typ) && in_array('wykladowca',$request->typ)) {
            $rules['telefon'] = 'required';
            $rules['wyksztalcenie'] = 'required';
        };
        
        if(!is_null($request->typ) && in_array('pracownik_administracyjny',$request->typ)) {
            $rules['adres_z_wojewodztwo'] = 'required';
            $rules['adres_z_miasto'] = 'required';
            $rules['adres_z_kod'] = 'required';
            $rules['adres_z_ulica'] = 'required';
            $rules['adres_z_numer'] = 'required';
        };

        $validate = $this->validate($request, $rules);
        
        //
        if(in_array('pracownik_administracyjny',$request->typ)) {
            $adres_z = array(
                "wojewodztwo" => $request->adres_z_wojewodztwo,
                "miasto" => $request->adres_z_miasto,
                "kod" => $request->adres_z_kod,
                "ulica" => $request->adres_z_ulica,
                "numer" => $request->adres_z_numer,
                );
            $adres_z_JSON=json_encode($adres_z);

            $adres_k = array(
                "wojewodztwo" => $request->adres_k_wojewodztwo,
                "miasto" => $request->adres_k_miasto,
                "kod" => $request->adres_k_kod,
                "ulica" => $request->adres_k_ulica,
                "numer" => $request->adres_k_numer,
            ); 
            $adres_k_JSON=json_encode($adres_k);
            }
        else {
            $adres_k_JSON = null;
            $adres_z_JSON = null;
        }   
        $newAccount = Account::create([
            'imie' => $request->imie,
            'nazwisko' => $request->nazwisko,
            'login' => $request->login,
            'haslo' => $request->haslo,
            'typ' => implode(",",$request->typ),
            'telefon' => $request->telefon,
            'wyksztalcenie' => $request->wyksztalcenie,
            'adres_z' => $adres_z_JSON,
            'adres_k' => $adres_k_JSON
        ]);

        return redirect('uam/' . $newAccount->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
        return $account;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('uam.edit', [
            'post' => $account,
    ]); //returns the edit view with the post
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
        $account->update([
            'imie' => $request->imie,
            'nazwisko' => $request->nazwisko,
            'login' => $request->login,
            'haslo' => $request->haslo,
            'typ' => $request->typ,
            'telefon' => $request->telefon,
            'wyksztalcenie' => $request->wyksztalcenie,
            'adres_z' => $request->adres_z,
            'adres_k' => $request->adres_k
        ]);

        return redirect('uam/' . $account->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();

        return redirect('/uam');
    }
}
