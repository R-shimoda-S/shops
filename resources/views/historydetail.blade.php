@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:20px 0px;">
           {{ Auth::user()->name }}さんの購入履歴</h1>
       </div>
       <div class="history-body font-weight-bold offset-1 col-10" style="font-size:1.2em">
           <table align="center" class="table table-striped table-bordered " style="table-layout:fixed;">
            <tr>
            <th>購入日時</th>
            <th>商品名</th>
            <th>金額</th>
            <th>商品画像</th>
            </tr>
            @foreach($histories as $history)
            <tr>
            <td>{{ $history->created_at }}</td>
            <td>{{ $history->stock->name}}</td>
            <td>{{ number_format($history->stock->fee)}}円</td>
            <td><a href="{{ route('shopDetail',$history->stock)}}"><img src="/image/{{$history->stock->imgpath}}" alt="" 
            class="incart"></a></td>
            </tr>
            @endforeach
            </table>
            <div class="text-center">
                <h2>合計金額　
                @php
                    $sum = 0;
                    foreach ($histories as $history) {
                    $sum += $history->stock->fee;
                    }
                echo $sum 
                @endphp
                円　</h2>
            </div>
            <a class="text-center" href="/history">履歴一覧へ</a>
        </div>
   </div>
</div>


@endsection