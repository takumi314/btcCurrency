@extends('layout')

@section('content')
        <div class="container">
        <h1 section="title">About Exchanges</h1>
        <div section="content">
            <span id="view_clock"></span>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="content">
                    <div>
                        <h2>Zaif</h2>
                    </div>
                    <div>
                        <h4>Last: {{$zaif['json']['last']}} JPY/BTC</h4>
                        <h4>High: {{$zaif['json']['high']}} JPY/BTC</h4>
                        <h4>Low: {{$zaif['json']['low']}} JPY/BTC</h4>
                        <h4>Vwap: {{$zaif['json']['vwap']}} JPY/BTC</h4>
                        <h4>Volume: {{$zaif['json']['volume']}} </h4>
                        <h4>Ask: {{$zaif['json']['ask']}} JPY/BTC</h4>
                        <h4>Bid: {{$zaif['json']['bid']}} JPY/BTC</h4>
                    </div>
                    <br>
                    <div>
                        <h4>Invoice +1.0% (TTS): {{ floor($zaif['json']['ask'] * 1.010) }} JPY/BTC </h4>
                        <h4>Invoice -1.0% (TTB): {{ floor($zaif['json']['bid'] * 0.990) }} JPY/BTC </h4>
                    </div>
                    <br>
                    <div>
                        <h4>With Consumpution Tax </h4>
                        <h4>Invoice +1.0% (TTS): {{ floor($zaif['json']['ask'] * 1.010) * 1.08 }} JPY/BTC </h4>
                        <h4>Invoice -1.0% (TTB): {{ floor($zaif['json']['bid'] * 0.990) * 0.92 }} JPY/BTC </h4>
                    </div>
                    <br>
                    <div>
                        <h5>Current Exchange Price</h5>
                        <h4>Current TTB: {{ $zaif['buy'] }} JPY/BTC </h4>
                        <h4>Current TTS: {{ $zaif['sell'] }} JPY/BTC </h4>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div  class="content">
                    <div>
                        <h2>bitFlyer</h2>
                    </div>
                    <div>
                        <div>
                            <h4>Ask: {{$bitflyer['json']['ask']}} JPY/BTC</h4>
                            <h4>Bid: {{$bitflyer['json']['bid']}} JPY/BTC</h4>
                            <h4>Mid: {{$bitflyer['json']['mid']}} JPY/BTC</h4>
                        </div>
                    </div>
                </div>
                <br>
                <div  class="content">
                    <div>
                        <h2>coincheck</h2>
                    </div>
                    <div>
                        <div>
                            <h4>Last: {{$coincheck['last']}} JPY/BTC</h4>
                            <h4>Ask: {{$coincheck['ask']}} JPY/BTC</h4>
                            <h4>Bid: {{$coincheck['bid']}} JPY/BTC</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div  class="content">
            <div>
                <h2>coinbase</h2>
            </div>
            <div>
                <div>
                    <h4>Exchange rates: {{$coinbase['data']['rates']['JPY']}} JPY/BTC</h4>
                </div>
            </div>
        </div>
        <br>
        <div  class="content">
            <div>
                <h2>bitstamp</h2>
            </div>
            <div>
                <h5>Currancy {{$usd_rates['JPY']}} JPY/USD</h5>
                <div>
                    <h4>Last: {{ floor($bitstamp['last'] * $usd_rates['JPY']) }} JPY/BTC</h4>
                    <h4>Ask: {{ floor($bitstamp['ask'] * $usd_rates['JPY']) }} JPY/BTC</h4>
                    <h4>Bid: {{ floor($bitstamp['bid'] * $usd_rates['JPY']) }} JPY/BTC</h4>
                </div>
            </div>
        </div>
        <br>
        <div  class="content">
            <div>
                <h2>Blockchain Info - Market Prices and exchanges rates</h2>
            </div>
            <div>
                <h5> The 15 minutes delayed market price </h5>
                <h4> {{ $blockchain_info['JPY']['15m'] }} JPY/BTC</h4>
                <div>
                    <h4>Last: {{ $blockchain_info['JPY']['last'] }} JPY/BTC</h4>
                    <h4>Ask: {{ $blockchain_info['JPY']['buy'] }} JPY/BTC</h4>
                    <h4>Bid: {{ $blockchain_info['JPY']['sell'] }} JPY/BTC</h4>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

<script type="text/javascript">
timerID = setInterval('clock()',500); //0.5秒毎にclock()を実行

function clock() {
    document.getElementById("view_clock").innerHTML = getNow();
}

function getNow() {
    var now = new Date();
    var year = now.getFullYear();
    var mon = now.getMonth()+1; //１を足すこと
    var day = now.getDate();
    var hour = now.getHours();
    var min = now.getMinutes();
    var sec = now.getSeconds();

    //出力用
    var s = year + "年" + mon + "月" + day + "日" + hour + "時" + min + "分" + sec + "秒"; 
    return s;
}

</script>




