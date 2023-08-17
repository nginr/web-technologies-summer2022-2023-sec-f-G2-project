let actv_page = window.location.pathname;
let nav_links = document.querySelectorAll('.navbar a').
forEach (function(link) {
    if (link.href.includes(`${actv_page}`)) {
        link.classList.add('actv');
    }
});
