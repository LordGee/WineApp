function toggleMobileNav() {
    $('.mobileNav').toggleClass('showMobileNav');
    if ($('#menuButton i').hasClass('fa-navicon')) {
        $('#menuButton i').removeClass('fa-navicon');
        $('#menuButton i').addClass('fa-times');

    } else {
        $('#menuButton i').addClass('fa-navicon');
        $('#menuButton i').removeClass('fa-times');
    }
}
