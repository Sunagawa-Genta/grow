<x-app-layout>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
    .stepbar {
      margin-left:480px;
    }
    
    .stepbar .stepbarwrap {
      margin: 2em 0;
      position: relative;
    }
    
    .stepbar .stepbarwrap .steptitle {
      display: inline-flex;
      align-items: center;
    }
    
    .stepbar .stepbarwrap .steptitle .stepcircle {
      display: inline-block;
      width: 3em;
      height: 3em;
      content: "";
      border-radius: 50%;
      background-color: #000;
      color: #fff;
      text-align: center;
    }
    
    .stepbar .stepbarwrap .steptitle .stepcircle span {
      display: inline-block;
      line-height: 1.2em;
      font-size: 0.8em;
      font-weight: bold;
      position: relative;
      top: 0.9em;
    }
    
    .stepbar .stepbarwrap .steptitle .title {
      margin: 0.5em;
      font-weight: bold;
      font-size: 1.2em;
    }
    
    .stepbar .stepbarwrap .steptxt {
      padding-left: 3.5em;
    }
    
    .stepbar .stepbarwrap .steptxt .txt {
      font-size: 0.9em;
    }
    
    .stepbar .stepbarwrap .stepline {
      width: 1px;
      height: calc(100% + 1em);
      background-color: #000;
      position: absolute;
      top: 1em;
      left: 1.5em;
      z-index: -1;
    }
    
    .stepbarwrap:last-of-type .stepline:last-of-type {
      display: none;
    }
    
    @media screen and (max-width: 960px) {
      .stepbar {
        width: 90%;
      }
    }
    .circleA {
        width: 200px;
        height: 200px; 
        background-color: red;
        border-radius: 50%; 
        margin: 0 auto;/* ←円を中央揃え */
        text-align: center;/* ←文字を左右に中央揃え */
        line-height: 200px;/* ←文字を上下に中央揃え */
        font-weight:bold;
        font-size:30px;
        transition-duration: .4s;
    }
    .circleA:hover {
      transform: scale(1.1);
    }
 
    .circleB {
        width: 200px;
        height: 200px; 
        background-color: blue;
        border-radius: 50%; 
        margin: 0 auto;/* ←円を中央揃え */
        text-align: center;/* ←文字を左右に中央揃え */
        line-height: 200px;/* ←文字を上下に中央揃え */
        font-weight:bold;
        font-size:30px;
        transition-duration: .4s;
    }
     .circleB:hover {
      transform: scale(1.1);
    }
    
    .usercircle{
      display: flex;
      margin:30px;
    }
    </style>
</head>
<body>
  <div class="usercircle">
    <div class="circleA">自分</div>
    <div class="circleB">信頼している人</div>
  </div>
    <div class="stepbar">

        <div class="stepbarwrap">
            <div class="steptitle">
                <div class="stepcircle"><span>STEP<br>1</span></div>
                <p class="title">目標設定</p>
            </div>
            <div class="steptxt">
                <span class="txt">GROWモデルを用いた目標設定</span><br>
                <span class="txt">G:Goal(目標・ほしい結果) 達成したい目標やほしい結果を明確にする</span><br>
                <span class="txt">R:Reality Check(現実の確認) 客観的なスタート地点を特定する</span><br>
                <span class="txt">O:Options(選択肢) 達成するためにどのような選択肢があるか</span><br>
                <span class="txt">W:Will(意志) アクションプランを作成する</span><br>
            </div>
            <span class="stepline"></span>
        </div>

        <div class="stepbarwrap">
            <div class="steptitle">
                <div class="stepcircle"><span>STEP<br>2</span></div>
                <p class="title">行動ログ</p>
            </div>
            <div class="steptxt">
                <span class="txt">目標達成にむけた具体的な行動を記録する</span>
            </div>
            <span class="stepline"></span>
        </div>

        <div class="stepbarwrap">
            <div class="steptitle">
                <div class="stepcircle"><span>STEP<br>3</span></div>
                <p class="title">共有スケジュール</p>
            </div>
            <div class="steptxt">
                <span class="txt">信頼している人と具体的なスケジュールを決める</span>
            </div>
            <span class="stepline"></span>
        </div>
        
        <div class="stepbarwrap">
            <div class="steptitle">
                <div class="stepcircle"><span>STEP<br>4</span></div>
                <p class="title">ポジティブフィードバック</p>
            </div>
            <div class="steptxt">
                <span class="txt">信頼している人にポジティブフィードバックをもらう</span>
            </div>
            <span class="stepline"></span><br>
        </div>
    </div>
</body>
</x-app-layout>