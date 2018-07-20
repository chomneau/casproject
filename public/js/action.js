/**
 * Created by chomneau on 8/31/17.
 */

$(document).ready(function() {
    $(".btn-pref .btn").click(function () {
        $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
        // $(".tab").addClass("active"); // instead of this do the below
        $(this).removeClass("btn-default").addClass("btn-primary");
    });
});

// Carousel Auto-Cycle
$(document).ready(function() {
    $('.carousel').carousel({
        interval: 6000
    })
});
