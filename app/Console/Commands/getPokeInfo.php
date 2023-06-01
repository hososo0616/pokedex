<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pokemon;

class getPokeInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getpokeinfo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'DBにポケモンが登録されていない場合ポケモンを登録する。';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            // $pokemon_number_array = range(1, PokemonConst::MAX_POKEMON_NUMBER);
            $pokemon_number_array = range(1, 20);

            foreach ($pokemon_number_array as $no) {
                // すでに取得済みの場合はスキップ
                $pokemon = Pokemon::where('p_id', $no)->first();
                if (!empty($pokemon)) {
                    continue;
                }
                // ポケモンごとの情報をcurlで取得
                $url = 'https://pokeapi.co/api/v2/pokemon/' . $no;

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $r = curl_exec($curl);
                $data = json_decode($r, true);

                // 日本語名を取得
                $url = 'https://pokeapi.co/api/v2/pokemon-species/' . $no;
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $r = curl_exec($curl);
                $name = json_decode($r, true);
                $name = $name['names'][0]['name'];

                $p_info = self::getPokemonInfo($data, $name);
                // print_r($p_info['id']);
                // print_r($p_info['jp_name'] . "\n");
                // print_r($p_info['en_name'] . "\n");
                // print_r("\n");
                $p_info = Pokemon::createPokemon($p_info);
                sleep(1);
            }
            curl_close($curl);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    static function getPokemonInfo($data, $name)
    {
        $p_info = [];
        // パラメータを設定
        $p_info['id'] = $data['id'];
        $p_info['en_name'] = $data['name'];
        $from = "en"; // English
        $to = "ja"; // 日本語
        // $st = new GoogleTranslate($p_info['en_name'], $from, $to);
        // $p_info['jp_name'] = $st->exec();
        $p_info['jp_name'] = $name;
        $p_info['type1'] = $data['types'][0]['type']['name'];
        if (isset($data['types'][1])) {
            $p_info['type2'] = $data['types'][1]['type']['name'];
        } else {
            $p_info['type2'] = null;
        }
        $p_info['ability1'] = $data['abilities'][0]['ability']['name'];
        if (isset($data['abilities'][1]) && !$data['abilities'][1]['is_hidden']) {
            $p_info['ability2'] = $data['abilities'][1]['ability']['name'];
            $p_info['hidden_ability'] = $data['abilities'][2]['ability']['name'];
        } else {
            $p_info['ability2'] = null;
            if (isset($data['abilities'][1]['is_hidden'])) {
                $p_info['hidden_ability'] = $data['abilities'][1]['ability']['name'];
            } else {
                $p_info['hidden_ability'] = null;
            }
        }
        $p_info['hp'] = $data['stats'][0]['base_stat'];
        $p_info['attack'] = $data['stats'][1]['base_stat'];
        $p_info['defense'] = $data['stats'][2]['base_stat'];
        $p_info['special_attack'] = $data['stats'][3]['base_stat'];
        $p_info['special_defense'] = $data['stats'][4]['base_stat'];
        $p_info['speed'] = $data['stats'][5]['base_stat'];
        $p_info['total_stats'] = $p_info['hp'] + $p_info['attack'] + $p_info['defense'] + $p_info['special_attack'] + $p_info['special_defense'] + $p_info['speed'];
        $p_info['front_default'] = $data['sprites']['front_default'];
        $p_info['back_default'] = $data['sprites']['back_default'];
        if (isset($data['sprites']['other']['dream_world'])) {
            $p_info['dream_world_front_default'] = $data['sprites']['other']['dream_world']['front_default'];
        } else {
            $p_info['dream_world_front_default'] = null;
        }
        if (isset($data['sprites']['other']['home'])) {
            $p_info['home_front_default'] = $data['sprites']['other']['home']['front_default'];
        } else {
            $p_info['home_front_default'] = null;
        }
        if (isset($data['sprites']['other']['official-artwork'])) {
            $p_info['official_artwork_front_default'] = $data['sprites']['other']['official-artwork']['front_default'];
        } else {
            $p_info['official_artwork_front_default'] = null;
        }
        $p_info['height'] = $data['height'];
        $p_info['weight'] = $data['weight'];

        return $p_info;
    }
}
