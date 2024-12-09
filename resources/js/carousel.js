document.addEventListener('DOMContentLoaded', function () {
    // Ініціалізація всіх каруселей на сторінці
    var carousels = document.querySelectorAll('.carousel');
    carousels.forEach(function (carousel) {
        new bootstrap.Carousel(carousel, {
            interval: 3000, // Інтервал для автоматичної прокрутки (мс)
            ride: 'carousel' // Запуск автоматичного прокручування при завантаженні
        });
    });
});
