<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'item_id',
        'jp_name',
        'en_name',
        'cost',
        'description',
        'front_default',
    ];

    static function createItem($item_info)
    {
        if (empty($item)) {
            self::create([
                'item_id' => $item_info['id'],
                'jp_name' => $item_info['jp_name'],
                'en_name' => $item_info['en_name'],
                'cost' => $item_info['cost'],
                'description' => $item_info['description'],
                'front_default' => $item_info['front_default'],
            ]);
        }
        return true;
    }
}
