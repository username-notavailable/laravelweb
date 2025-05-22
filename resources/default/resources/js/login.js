var env = document.querySelector('meta[name="env"]') === null ? 'production' : document.querySelector('meta[name="env"').getAttribute('content');

document.querySelectorAll('#select-language-dropdown .dropdown-item').forEach((link) => { 
    link.addEventListener('click', (event) => {
        event.preventDefault();

        Cookies.set(event.target.closest('.dropdown-menu').getAttribute('data-locale-cookie-name'), event.target.getAttribute('data-locale-code'));

        window.location.reload();
    });
});

function init(event) {
    document.dispatchEvent(new Event('show-main-slot'));
}

window.initJsApp = init;