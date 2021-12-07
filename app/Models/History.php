<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class History extends Model
{
    protected $fillable = [
        'stock_id',
        'user_id',
    ];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
 
    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function stock()
    {
        return $this->belongsTo('\App\Models\Stock');
    }

    public function insertHistory($checkout_items)
    {
        foreach ($checkout_items as $checkout_item) {
            $item =new History();
            $item->user_id = Auth::id();
            $item->stock_id = $checkout_item->stock_id;
            $item->save();
        }
    }

    /**
     * 購入商品履歴を表示するメソッド
     *
     * @param Auth $userId;
     * @param array $data;
     *
     * @return void
     */

    public function showHistory()
    {
        $userId = Auth::id();
        $data = $this->where('user_id', $userId)->get();
        return $data;
    }

    /**
     * 特定の日付の購入商品履歴を表示するメソッド
     *
     * @param Auth $userId;
     * @param array $data;
     *
     * @return void
     */
    public function dateHistory($request)
    {
        $userId = Auth::id();
        $data = $this->where('user_id', $userId)->where('created_at', 'like', "%$request->date%")->get();
        return $data;
    }

    /**
     * 購入者の日付のカラムを取得し、日付をまとめるメソッド
     * @param Auth $userId;
     * @param array $data;
     * @param array $days
     * @return $days
     */
    public function getDate()
    {
        $userId = Auth::id();
        $data = $this->where('user_id', $userId)->get(['created_at'])->toArray();
        $dates = $this->getUniqueArray($data);
        //dd($days);
        return $dates;
    }

    /**
     * ユニークカラムをまとめるメソッド
     *
     * @param [type] $array
     * @return $uniqueArray
     */
    public static function getUniqueArray($array)
    {
        $tmp = [];
        $uniqueArray = [];
        foreach ($array as $value) {
            if (!in_array($value, $tmp, true)) {
                $tmp[] = $value;
                $uniqueArray[] = $value["created_at"];
            }
        }
        return $uniqueArray;
    }
}
