import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    var button = document.getElementById('hamburger-button');
    var menu = document.getElementById('menu');

    button.addEventListener('click', function() {
        menu.style.display = menu.style.display === 'block' ? '' : 'block';
    });
});