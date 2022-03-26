$(function(){

    var set_year = 2022;
    var set_mon = 5;
    var set_day = 11;
    var set_horse = 00;
    var set_minutes = 00;
    var set_second = 00;
    var set_m_second = 000;

    load_position()
    load_time(set_year,
            set_mon,
            set_day,
            set_horse,
            set_minutes,
            set_second,
            set_m_second);

    $(window).resize(function() {
        load_position()
    });

    function load_time(chas_year,
                        chas_mon,
                        chas_day,
                        chas_horse,
                        chas_minutes,
                        chas_second,
                        chas_m_second){

        var chas_str = chas_year + "/" +
                        chas_mon + "/" +
                        chas_day + " " +
                        chas_horse + ":" +
                        chas_minutes + ":" +
                        chas_second + ":" +
                        chas_m_second
        var count_flag = false
        var count_flag_a = false

        //const music = new Audio('./media/audio/count.mp3');
        
        setInterval(function(){
            var now_time = new Date()
            var set_time = new Date('2022/05/11 00:00:00')

            var chas_data = set_time.getTime() - now_time.getTime()

            var diffHour = chas_data / (1000 * 60 * 60);
            var diffMinute = (diffHour - Math.floor(diffHour)) * 60;
            var diffSecond = (diffMinute - Math.floor(diffMinute)) * 60;

            var chas_str_time = ('0000' + Math.floor(diffHour).toString()).slice(-4) + ":" +
                                ('00' + Math.floor(diffMinute).toString()).slice(-2) + ":" +
                                ('00' + Math.floor(diffSecond).toString()).slice(-2) + "." +
                                ('000' + (Math.floor(diffSecond.toString() * 1000)) / 1000).slice(-3)
            //$("#horse_h1").text(('000' + diffHour).slice(-3)+ ":");
            $("#horse_h1").text(chas_str_time);

            if(Math.floor(diffSecond.toString()) == 3 && Math.floor(diffSecond.toString()) == 3){
                count_flag = true
            }else{
                count_flag = false
            }

            var day_str = Math.floor(diffHour / 24).toString();
            var horse_str = Math.floor(diffHour - (day_str * 24));
            var minutes_str = Math.floor(diffMinute);
            var get_volume = $("#volume_ra").val();
            //console.log(get_volume/100);

            if(count_flag == true && count_flag_a == false){
                const count_se = new Audio('./media/audio/count.mp3');
                const day_se = new Audio('./media/audio/kotoha/day/' + day_str + '.wav');
                const horse_se = new Audio('./media/audio/kotoha/horse/' + horse_str + '.wav');
                const minutes_se = new Audio('./media/audio/kotoha/minutes/' + minutes_str + '.wav');

                count_se.volume = get_volume/100;
                day_se.volume = get_volume/100;
                horse_se.volume = get_volume/100;
                minutes_se.volume = get_volume/100;

                count_se.play();
                count_se.addEventListener('ended', function() {
                    day_se.play();
                    day_se.addEventListener('ended', function() {
                        horse_se.play();
                        horse_se.addEventListener('ended', function() {
                            minutes_se.play();
                            minutes_se.addEventListener('ended', function() {
                                console.log("司法試験まで" + day_str + "日と" + horse_str + "時間" + minutes_str + "分です");
                            });
                        });
                    });
                });
            }

            count_flag_a = count_flag
        },1);
    }

    function load_position(){
        var BG_size_x = 500;
        var BG_size_y = 500;
        var height_size = 120

        $(".globe").css("width" , BG_size_x);
        $(".globe2").css("width" , BG_size_x);
        $(".globe").css("height" , BG_size_y);
        $(".globe2").css("height" , BG_size_y);

        var window_size_x = window.innerWidth;
        var window_size_y = window.innerHeight;
        
        window_size_x = (window_size_x - BG_size_x) / 2;
        window_size_y = (window_size_y - BG_size_y) / 2;

        window_size_y = window_size_y;

        $(".globe").css("left" , window_size_x);
        $(".globe2").css("left" , window_size_x);
        $(".globe").css("top" , window_size_y);
        $(".globe2").css("top" , window_size_y);

        window_size_x = window.innerWidth;
        window_size_y = window.innerHeight;

        var now_time_x = $('#now_time').outerWidth();
        var now_time_y = 90 + height_size//$('#msecond_h1').outerHeight();

        console.log(now_time_y)
        window_size_x = (window_size_x - now_time_x) / 2;
        window_size_y = (window_size_y - now_time_y) / 2;

        
        $(".now_time").css("left" , window_size_x);
        $(".now_time").css("top" , window_size_y);

        var h1_size = 687.938;
        console.log(h1_size)
        h1_size = (now_time_x - h1_size) / 2;

        console.log(now_time_x)
        $("#horse_h1").css("margin-left",h1_size)
    }
    
});