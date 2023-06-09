<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;

class getPokeItemInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getpokeiteminfo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            // $pokemon_number_array = range(1, PokemonConst::MAX_POKEMON_NUMBER);
            $item_number_array = range(1, 150);

            foreach ($item_number_array as $no) {
                // すでに取得済みの場合はスキップ
                $item = Item::where('item_id', $no)->first();
                if (!empty($item)) {
                    continue;
                }
                // どうぐの情報をcurlで取得
                $url = 'https://pokeapi.co/api/v2/item/' . $no;
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $r = curl_exec($curl);
                $data = json_decode($r, true);

                //説明文を取得
                if (isset($data['flavor_text_entries'][9]['language']['name']) && $data['flavor_text_entries'][9]['language']['name'] == 'ja-Hrkt') {
                    $description = $data['flavor_text_entries'][9]['text'];
                } elseif (isset($data['flavor_text_entries'][10]['language']['name']) && $data['flavor_text_entries'][10]['language']['name'] == 'ja-Hrkt') {
                    $description = $data['flavor_text_entries'][10]['text'];
                } elseif (isset($data['flavor_text_entries'][6]['language']['name']) && $data['flavor_text_entries'][6]['language']['name'] == 'ja-Hrkt') {
                    $description = $data['flavor_text_entries'][6]['text'];
                } else {
                    $description = $data['flavor_text_entries'][0]['text'];
                }

                // $url = 'https://pokeapi.co/api/v2/pokemon-species/' . $no;
                // $curl = curl_init($url);
                // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
                // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                // $r = curl_exec($curl);
                // $name = json_decode($r, true);
                // $name = $name['names'][0]['name'];

                $item_info = self::getItemInfo($data, $description);
                // print_r($item_info);
                $item_info = Item::createItem($item_info);

                sleep(1);
            }
            curl_close($curl);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    static function getItemInfo($data, $description)
    {
        $item_info = [];
        // パラメータを設定
        $item_info['id'] = $data['id'];
        $item_info['en_name'] = $data['name'];
        $item_info['jp_name'] = $data['names'][0]['name'];
        $item_info['cost'] = $data['cost'];
        // $item_info['description'] = $data['flavor_text_entries'][9]['text'];
        $item_info['description'] = $description;
        $item_info['front_default'] = $data['sprites']['default'];
        $item_info['category'] = $data['category']['name'];

        return $item_info;
    }
}
