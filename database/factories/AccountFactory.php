<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;


class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        //przydzielanie rol uzytkownikowi
        $typ_arr=array("wykladowca","pracownik_administracyjny");
        $count = $this->faker->numberBetween(1,2);
        if($count > 1) {
            $typ=implode(",",array_rand($typ_arr,$count));
        }
        else {
            $typ=array_rand($typ_arr,$count);
        }
        for ($i = 0; $i < count($typ_arr); $i++) {
            $typ=str_replace($i,$typ_arr[$i],$typ);
        }

        //losowe dane dla adresu korespondencyjnego
        $adres_k = array(
            "wojewodztwo" => ucfirst($this->faker->word()),
            "miasto" => ucfirst($this->faker->word()),
            "kod" => $this->faker->numerify('##-###'), 
            "ulica" => ucfirst($this->faker->word()),
            "numer" => $this->faker->numberBetween(1,99)
        ); 
        $adres_k_JSON=json_encode($adres_k);

        //losowe dane dla adresu zamieszkania
        $adres_z = array(
            "wojewodztwo" => ucfirst($this->faker->word()),
            "miasto" => ucfirst($this->faker->word()),
            "kod" => $this->faker->numerify('##-###'), 
            "ulica" => ucfirst($this->faker->word()),
            "numer" => $this->faker->numberBetween(1,99)
        ); 
        $adres_z_JSON=json_encode($adres_z);

        return [
            //
            'imie' => $this->faker->firstName(),
            'nazwisko' => $this->faker->lastName(),
            'login' => $this->faker->unique()->safeEmail(),
            'haslo' => $this->faker->password(),
            'typ' => $typ,
            'telefon' => $this->faker->numerify('#########'),
            'wyksztalcenie' => $this->faker->word(),
            'adres_z' => $adres_k_JSON,
            'adres_k' => $adres_z_JSON
        ];
    }
}
