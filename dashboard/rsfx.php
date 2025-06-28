<?php
require "header.php";
?>
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
 
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "description": "",
      "proName": "AMEX:SPY"
    },
    {
      "description": "",
      "proName": "NASDAQ:AAPL"
    },
    {
      "description": "",
      "proName": "NASDAQ:TSLA"
    },
    {
      "description": "",
      "proName": "NASDAQ:META"
    },
    {
      "description": "",
      "proName": "NASDAQ:AMZN"
    },
    {
      "description": "",
      "proName": "NASDAQ:NVDA"
    },
    {
      "description": "",
      "proName": "NASDAQ:AMD"
    },
    {
      "description": "",
      "proName": "NSE:AXISBANK"
    },
    {
      "description": "",
      "proName": "NASDAQ:MSFT"
    },
    {
      "description": "",
      "proName": "NASDAQ:NFLX"
    },
    {
      "description": "",
      "proName": "NASDAQ:GOOG"
    },
    {
      "description": "",
      "proName": "NYSE:BABA"
    },
    {
      "description": "",
      "proName": "NYSE:SHOP"
    }
  ],
  "showSymbolLogo": true,
  "colorTheme": "dark",
  "isTransparent": true,
  "displayMode": "adaptive",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
<?php
$tick="BTC-USD";
// Retrieve data from the Yahoo Finance API
$url = "https://query1.finance.yahoo.com/v8/finance/chart/$tick?region=US&lang=en-US&includePrePost=false&interval=1mo&useYfid=true&range=1y";
$data = file_get_contents($url);



// Decode the JSON data
$json = json_decode($data, true);
$highValues = $json['chart']['result'][0]['indicators']['quote'][0]['high'];
$lowValues = $json['chart']['result'][0]['indicators']['quote'][0]['low'];
// Find the highest value in the array
$high = round(max($highValues),3);
$low = round(min($lowValues),3);

//get stock data
$curr_price=$json['chart']['result'][0]['meta']['regularMarketPrice'];
$open=$json['chart']['result'][0]['meta']['chartPreviousClose'];
$currentVolume = end($json['chart']['result'][0]['indicators']['quote'][0]['volume']);

// Extract the time and close values from the data
$time = array();
$close = array();
foreach ($json['chart']['result'][0]['timestamp'] as $timestamp) {
    $time[] = date('Y-m-d', $timestamp);
}
foreach ($json['chart']['result'][0]['indicators']['quote'][0]['close'] as $price) {
    $close[] = $price;
}
// Check if the final close value is lower than the initial close value
$initial_close = $close[0];
$final_close = end($close);
$dip = ($final_close < $initial_close);
$url = "https://finance.yahoo.com/quote/$tick";

// Retrieve the contents of the URL
$html = file_get_contents($url);

// Extract the name of the stock using regular expressions
preg_match("/<h1.*>(.*)<\/h1>/", $html, $match);
$name = $match[1];

echo "<h2 class='text-white'>RealStockFX (RSFX)</h2>
<p class='text-mute'>RSFX Analysis monthly for the past 365 days</p>
";

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Time', 'Close'],
          [50,7],[60,8],[70,8],[80,9],[90,9],[100,9],
  [110,10],[120,11],[130,14],[140,14],[150,15]
        ]);

        var options = {
          width:'100vw',
          title: 'RSFX End-of-Day Prices (365 days)',
          hAxis: {title: '',textPosition: 'none',titleTextStyle: {color: 'transparent'}},
          vAxis: {minValue: 0,gridlines: {
        color: 'transparent'
      },},
          backgroundColor: {fill:'transparent'},
         fontColor: "#fff",
          
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
      <style>
          *{
              color #fff !important;
          }
      </style>
    <div class="row mb-3">
        <div class=" mx-auto p-0 m-0">
        <div id="chart_div" style="width: 60vw; height: 500px;"></div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <p><span style="color:#e5e7e9">Open</span> &nbsp; <b>122.69</b></p>
                <p><span style="color:#e5e7e9">High</span> &nbsp; <b>129.82</b></p>
                <p><span style="color:#e5e7e9">Low </span>&nbsp; <b>127.56</b></p>
              </div>
              <div class="col-6">
              <p><span style="color:#e5e7e9">Volume</span> &nbsp; <b>257,639</b></p>
                <p><span style="color:#e5e7e9">Market Cap</span> &nbsp; <b>-</b></p>
                <p><span style="color:#e5e7e9">P/E </span>&nbsp; <b>-</b></p>
              </div>
            </div>
            <center>
                <a href="create-portifolio.php?ticker=RSFX">
                <button class='btn btn-primary'>
                    Invest in this asset
                </button>
                </a>
            </center>
          </div>
        </div>
        </div>
    </div>
    
  </body>
</html>
<?php




?>




<?php
require "footer.php";
?>