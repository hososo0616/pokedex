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
            $item_number_array = range(1, 100);

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

                $item_info = self::getItemInfo($data);
                // print_r($item_info);
                $item_info = Item::createItem($item_info);

                sleep(1);
            }
            curl_close($curl);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    static function getItemInfo($data)
    {
        $item_info = [];
        // パラメータを設定
        $item_info['id'] = $data['id'];
        $item_info['en_name'] = $data['name'];
        $item_info['jp_name'] = $data['names'][0]['name'];
        $item_info['cost'] = $data['cost'];
        $item_info['description'] = $data['flavor_text_entries'][9]['text'];
        $item_info['front_default'] = $data['sprites']['default'];
        $item_info['category'] = $data['category']['name'];

        return $item_info;
    }
}
