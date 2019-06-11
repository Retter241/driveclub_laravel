    $(document).ready(function() {
        $('.btn').click(function(event) {
            $('.block').removeClass('active')
            var num = $(this).attr('data-num');
            $('#quest'+num).addClass('active');
        });
    });

