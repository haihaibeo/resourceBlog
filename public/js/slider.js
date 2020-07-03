$(".slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    autoplaySpeed: 2000,
    infinite: true,
    dots: true,
    swipeToSlide: true,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 1
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});