<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    //    \App\Models\User::factory(100)->create();
    
    //  seeder dla małej liczby danych, przy dużej liczbie rekordów może pojawić się błąd ze względu na wymóg unikalności login
    //   \App\Models\Account::factory(10)->create();

    // seeded dla dużej liczby danych - słabe dane
        Model::unguard();

        // User::truncate();
 
        $users = app('db')->table('accounts');
        $senha = bcrypt('1234');
        $position = 0;
 
        // inserting 1000 per iteration (=100k)
        for($i = 0; $i <= 100; $i++){
             $list = [];
 
             for($j = 0; $j <= 1000; $j++){
                
                $telefon = null;
                $wyksztalcenie = null;
                $adres = null;
                #$adres_k = null;

                //przydzielanie rol uzytkownikowi
                $typ_arr=array("wykladowca","pracownik_administracyjny","wykladowca|pracownik_administracyjny");
                $mark = $position % count($typ_arr);
                $typ = $typ_arr[$mark];
                if ($mark == 0 || $mark == 2) {
                    $wyksztalcenie_arr=array("podstawowe","gimnazjalne","zasadnicze zawodowe","branżowe","średnie branżowe","średnie","wyższe");
                    $wyksztalcenie = $wyksztalcenie_arr[$position % count($wyksztalcenie_arr)];
                    $telefon = sprintf('%08d', $position);
                } 
                if ($mark == 1 || $mark == 2) {
                    $adres = json_encode(array(
                        "wojewodztwo" => $position,
                        "miasto" => $position,
                        "kod" => $position, 
                        "ulica" => $position,
                        "numer" => $position
                    )); 
                }

                $list[] = [
                    'imie' => 'imie '.$position,
                    'nazwisko' => 'nazwisko '.$position,
                    'login' => "example.{$position}@example.com",
                    'haslo' => $senha,
                    'typ' => $typ,
                    'telefon' => $telefon,
                    'wyksztalcenie' => $wyksztalcenie,
                    'adres_z' => $adres,
                    'adres_k' => $adres
                ];
 
                $position++;
            }
 
            $users->insert($list);
        }
    }
}
