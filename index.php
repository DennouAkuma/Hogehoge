<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>司法試験まで</title>
    <link type="text/css" rel="stylesheet" href="./css/mian_style.css">
    <link type="text/css" rel="stylesheet" href="./css/comment_style.css">
    <link type="text/css" rel="stylesheet" href="./css/trop_bar_style.css">
    <link type="text/css" rel="stylesheet" href="./css/all_time_style.css">
    <?php
        include "./temp/root.php";
        include "./temp/db_send.php";        
    ?>
</head>
<body>
    <header>
    </header>
    <main>
        <div class="sample02">
            <ul>
                <li>3/22 Add 3 Horse</li>
                <li>3/23 Add 3 Horse</li>
                <li>3/24 Add 3 Horse</li>
                <li>3/25 Add 3 Horse</li>
            </ul>
            <ul>
                <li>!Warning 3/22 2.5Hour penalty time in progress</li>
                <li>!Warning 3/24 6Hour penalty time in progress</li>
                <li>!Warning 3/25 6Hour penalty time in progress</li>
                <li>!Warning 3/26 6Hour penalty time in progress</li>
            </ul>  
            <ul>
                <li>3/22 Add 3 Horse</li>
                <li>3/23 Add 3 Horse</li>
                <li>3/24 Add 3 Horse</li>
                <li>3/25 Add 3 Horse</li>
            </ul>  
        </div>
        <div class="backgraund">
            <div class="globe"></div>
            <div class="globe2"></div>
        </div>
        <div id="now_time" class="now_time">
            <h1 class="time_style" id="horse_h1"></h1>
        </div>

        <p class="var_str">var 0.0.9 ※PCのみ対応</p>

        <p class="volume_str">Volume</p>
        <input id="volume_ra" type="range" name="example" min="0" max="100" step="1" value="0">
        <!--
        <div class="comment_class">
            <p>hogehoge</p>
            <p>hogehoge</p>
        </div>
    -->

        <div class="all_time_div">
            <?php
                include "./temp/get_data.php"
            ?>
        </div>
    </main>
    <footer>
        <h1></h1>
    </footer>
    <script type="text/javascript" src="./js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="./js/main_script.js"></script>
</body>
</html>