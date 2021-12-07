@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
           <h1 class="text-center font-weight-bold" style="color:#555555;  font-size:1.2em; padding:20px 0px;">
           {{ Auth::user()->name }}さんの購入履歴</h1>
       </div>

       <div class="history-body font-weight-bold offset-4 col-4" style="font-size:1.2em">
           <table align="center" class="table table-striped table-bordered " style="table-layout:fixed;">
            <tr>
            <th>購入日時</th>
            <th>詳細</th>
            </tr>
            
            <tr>
            @foreach($dates as $date)
            <tr>
                <td>{{ $date }}</td>
                <td><form action="{{ route('dateHistory') }}" method="POST">
                @csrf
                <input type="hidden" name="date" value="{{$date}}" class="form-control-sm">
                <input type="submit" value="表示" class="form-control-sm">
                </form></td>
            </tr>
            @endforeach
            </table>
        </div>
        <div class="offset-2">
        <a href="/">商品一覧へ</a>
        </div>
   </div>
</div>


@endsection