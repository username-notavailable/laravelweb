'use strict';

import './bootstrap';

function showToast(type, message) {
    if (document.getElementById('toast-container') === null) {
        document.querySelector('body').innerHTML += '<div id="toast-container" class="toast-container bottom-0 end-0 p-3"></div>';
    }
    
    let toastBg;
    let toastSvg;

    if (type === 'success') {
        toastBg = 'text-bg-success';
        toastSvg = `
            <svg xmlns="http://www.w3.org/2000/svg" class="check-circle-fill flex-shrink-0 me-1" viewBox="0 0 16 16" role="img" width="16" height="16" fill="currentColor">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
            </svg>
        `;
    }
    else if (type === 'info') {
        toastBg = 'text-bg-info';
        toastSvg = `
            <svg xmlns="http://www.w3.org/2000/svg" class="check-circle-fill flex-shrink-0 me-1" viewBox="0 0 16 16" role="img" width="16" height="16" fill="currentColor">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
            </svg>
        `;
    }
    else if (type === 'warning') {
        toastBg = 'text-bg-warning';
        toastSvg = `
            <svg xmlns="http://www.w3.org/2000/svg" class="bi-exclamation-triangle-fill flex-shrink-0 me-1" viewBox="0 0 16 16" role="img" width="16" height="16" fill="currentColor">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
            </svg>
        `;
    }
    else {
        toastBg = 'text-bg-danger';
        toastSvg = `
            <svg xmlns="http://www.w3.org/2000/svg" class="bi-exclamation-triangle-fill flex-shrink-0 me-1" viewBox="0 0 16 16" role="img" width="16" height="16" fill="currentColor">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
            </svg>
        `;
    }

    let randomId = Math.floor(Math.random() * 1000);
    let toast = `
        <div id="message-toast-${randomId}" class="toast fade align-items-center ${toastBg} border-0" data-bs-autohide="false" role="alert" aria-live="assertive">
            <div class="d-flex">
                <div class="toast-body">
                    ${toastSvg}
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    `;

    document.getElementById('toast-container').innerHTML += toast;

    bootstrap.Toast.getOrCreateInstance(document.getElementById('message-toast-' + randomId)).show();

    document.getElementById('message-toast-' + randomId).addEventListener('hidden.bs.toast', (event) => {
        event.target.remove();
    });
      
    setTimeout(() => {
        bootstrap.Toast.getOrCreateInstance(document.getElementById('message-toast-' + randomId)).hide();
    }, 5000);
}

window.app = {
    showToast: showToast
};