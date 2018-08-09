;(function ($) {
    $(document).ready(function () {

        //alert(urls.ajaxurl);
        $("#ajaxsubmit").on('click', function (e) {
            var info = $("#info").val();
            var nonce = $("#_wpnonce").val();
            console.log(info);

            $.post(urls.ajaxurl, {
                action: "ajaxtest",
                info: info,
                s:nonce
            }, function (data) {
                console.log(data);
            });

            return false;
        });
    });
})(jQuery);