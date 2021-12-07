<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Stock;
use App\Models\Cart;
use App\Models\History;
use App\Models\Type;
use Illuminate\Support\Facades\Mail;
use App\Mail\Thanks;
use App\Http\Requests\AddRequest;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::Paginate(6);
        return view('shop', compact('stocks'));
    }

    /**
     * 検索メソッド
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if ($request->type == "0") {
            $stocks = Stock::where('name', 'like', "%$request->search%")->Paginate(6);
        } else {
            $stocks = Stock::where('type_id', "$request->type")->where('name', 'like', "%$request->search%")->Paginate(6);
        }
        return view('shop', compact('stocks'));
    }

    /**
     * 詳細表示メソッド
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $img
     * @return \Illuminate\Http\Response
     */
    public function shopDetail(Stock $stock)
    {
        $id = $stock->id;
        $stocks = Stock::where('id', $id)->get();
        return view('shopdetail', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * カートを表示するメソッド
     *
     * @param Cart $cart
     * @param array $data
     * @return void
     */
    public function myCart(Cart $cart)
    {
        $data = $cart->showCart();
        return view('mycart', $data);
    }

    /**
     * カートに商品を追加するメソッド
     *
     * @param Request $request
     * @param Cart $cart
     * @param int $stock_id
     * @param string $message
     * @param array $data
     *
     * @return \Illuminate\Http\Response
     */

    public function addMycart(AddRequest $request, Cart $cart)
    {
        $stock_id = $request->stock_id;
        $number = $request->number;
        $cart->addCart($stock_id, $number);
        return redirect('mycart');
    }

    /**
     * カートの商品を削除するメソッド
     *
     * @param Request $request
     * @param Cart $cart
     * @param int $stock_id
     * @param string $message
     * @param array $data
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteCart(Request $request, Cart $cart)
    {
        $stock_id = $request->stock_id;
        $message = $cart->deleteCart($stock_id);

        $data = $cart->showCart();
        return view('mycart', $data)->with('message', $message);
    }

    public function deleteAllCart(Request $request, Cart $cart)
    {
        $message = $cart->deleteAllCart();
        $data = $cart->showCart();
        return view('mycart', $data)->with('message', $message);
    }

    public function checkout(Request $request, Cart $cart, History $history)
    {
        $user = Auth::user();
        $mail_data['user']=$user->name;
        $mail_data['checkout_items'] = $cart->checkoutCart();
        $history->insertHistory($mail_data['checkout_items']);
        Mail::to('test@example.com')->send(new Thanks($mail_data));
        return view('checkout');
    }

    /**
     * 履歴のページに飛ぶメソッド
     *
     * @param History $history
     * @param array $date
     *
     * @return \Illuminate\Http\Response
     */
 
    public function myHistoryDate(History $history)
    {
        $dates = $history->getDate();
        return view('history', compact('dates'));
    }

    /**
     * 履歴の日付検索するメソッド
     *
     * @param Request $request
     * @param Cart $cart
     * @param int $stock_id
     * @param string $message
     * @param array $data
     *
     * @return \Illuminate\Http\Response
     */

    public function dateHistory(Request $request, History $history)
    {
        $histories = $history->dateHistory($request);
        return view('historydetail', compact('histories'));
    }
}
