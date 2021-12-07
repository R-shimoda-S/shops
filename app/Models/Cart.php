<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    protected $fillable = [
        'stock_id',
        'user_id',
    ];

    public function showCart()
    {
        $user_id = Auth::id();
        $data['my_carts'] = $this->where('user_id', $user_id)->get();

        $data['count']=0;
        $data['sum']=0;
       
        foreach ($data['my_carts'] as $my_cart) {
            $data['count']++;
            $data['sum'] += $my_cart->stock->fee;
        }
        return $data;
    }

    public function stock()
    {
        return $this->belongsTo('\App\Models\Stock');
    }

    public function addCart($stock_id, $number)
    {
        $user_id = Auth::id();

        for ($i=0;$i<$number;$i++) {
            Cart::create(['stock_id' => $stock_id,'user_id' => $user_id]);
        }
        $message = 'カートに追加しました';
        
        return $message;
    }

    public function deleteCart($stock_id)
    {
        $user_id = Auth::id();
        $delete = $this->where('user_id', $user_id)->where('stock_id', $stock_id)->first()->delete();
           
        if ($delete > 0) {
            $message = 'カートから一つの商品を削除しました';
        } else {
            $message = '削除に失敗しました';
        }
        return $message;
    }

    public function deleteAllCart()
    {
        $user_id = Auth::id();
        $delete = $this->where('user_id', $user_id)->delete();
           
        if ($delete > 0) {
            $message = 'カートを空にしました';
        } else {
            $message = '削除に失敗しました';
        }
        return $message;
    }

    public function checkoutCart()
    {
        $user_id = Auth::id();
        $checkout_items=$this->where('user_id', $user_id)->get();
        $this->where('user_id', $user_id)->delete();

        return $checkout_items;
    }
}
