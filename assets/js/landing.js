(function ($) {

    $(document).on('click', '.video-box img', function () {
        let modal   = $(".kavimo_box")
        modal.removeClass('closed')
        modal.attr('style', '')
        modal.addClass('active')
    });
    $(document).on('click', '.kavimo_box', function () {
        let modal = $(".kavimo_box")
        modal.addClass('closed')
        modal.removeClass('active')
        $('.kavimo_box video')[0].pause()
    });
    $(document).on('click', '.kavimo_box .video-wrapper', function (event) {
        event.stopPropagation();
    });

    $(document).on('click', '.seasons .season .season-head svg', function (e) {
        $(this).parent().parent().toggleClass("active");
    });

    $(".faq").on("click", function (e) {
        $(this).toggleClass("active");
    });

    $('body').find('.clockdiv').each(function () {
        var deadline = new Date($(this).data('endtime'));
        initializeClock(this, deadline)
    });

    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {'total': t, 'days': days, 'hours': hours, 'minutes': minutes, 'seconds': seconds}
    }

    function initializeClock(clock, endtime) {
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);
            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
            if (t.total <= 0) {
                clearInterval(timeinterval)
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000)
    }

})(jQuery);