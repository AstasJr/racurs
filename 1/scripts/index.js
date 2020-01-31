$( document ).ready(function() {
    $i = 0;
    $('.btn').click(function () {
        $i++;
        console.log($i);
        if ($i == 1) {
            $('#btn1').css('order', 4);
        } else if ($i == 2) {
            $('#btn2').css('order', 5);
        } else {
            $i = 0;
            $('#btn1').css('order', 1);
            $('#btn2').css('order', 2);
        }
    });
});
/*
2
3
1

3
1
2
 */