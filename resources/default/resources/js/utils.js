'use strict';

function showToast(type, message) {
    let randomId = Math.floor(Math.random() * 1000);
    let toast = `
        <div id="message-toast-${randomId}" class="toast fade align-items-center __BG_PLACEHOLDER__ border-0" data-bs-autohide="false" role="alert" aria-live="assertive">
            <div class="d-flex">
                <div class="toast-body">
                    __SVG_PLACEHOLDER__
                    __MESSAGE_PLACEHOLDER__
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    `;

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
    else {
        toastBg = 'text-bg-danger';
        toastSvg = `
            <svg xmlns="http://www.w3.org/2000/svg" class="bi-exclamation-triangle-fill flex-shrink-0 me-1" viewBox="0 0 16 16" role="img" width="16" height="16" fill="currentColor">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
            </svg>
        `;
    }

    let swapToast = toast;

    swapToast = swapToast.replaceAll(/__BG_PLACEHOLDER__/g, toastBg);
    swapToast = swapToast.replaceAll(/__SVG_PLACEHOLDER__/g, toastSvg);
    swapToast = swapToast.replaceAll(/__MESSAGE_PLACEHOLDER__/g, message);

    document.getElementById('toast-container').innerHTML += swapToast;

    bootstrap.Toast.getOrCreateInstance(document.getElementById('message-toast-' + randomId)).show();

    document.getElementById('message-toast-' + randomId).addEventListener('hidden.bs.toast', (event) => {
        event.target.remove();
    });
      

    setTimeout(() => {
        bootstrap.Toast.getOrCreateInstance(document.getElementById('message-toast-' + randomId)).hide();
    }, 5000);
}

function saveScrollTop() {
    document.body.setAttribute('data-scroll-y', document.scrollingElement.scrollTop - 150);
}

function unsetSavedScrollTop() {
    if (document.body.hasAttribute('data-scroll-y')) {
        document.body.removeAttribute('data-scroll-y');
    }
}

function addCustomEventListener(selector, event, handler, rootSelector = 'body') {
    let rootElement = document.querySelector(rootSelector);
    //since the root element is set to be body for our current dealings
    rootElement.addEventListener(event, function (evt) {
            var targetElement = evt.target;
            
            while (targetElement != null) {
                if (targetElement.matches(selector)) {
                    handler(evt);
                    return;
                }

                targetElement = targetElement.parentElement;
            }
        },
        true
    );
}

function serializeFormData(form) {
    var formData = new FormData(form);
    var serializedData = {};
  
    for (var [name, value] of formData) {
        if (serializedData[name]) {
            if (!Array.isArray(serializedData[name])) {
                serializedData[name] = [serializedData[name]];
            }
            serializedData[name].push(value);
        } else {
            serializedData[name] = value;
        }
    }
  
    return serializedData;
}

function getCurrentSizer() {
    let size = '';

    document.querySelectorAll('#sizer div').forEach((div) => {
        if (window.getComputedStyle(div).getPropertyValue('display') === 'block') {
            size = div.getAttribute('data-size');
        }
    });

    return size;
}

export default { showToast, addCustomEventListener, serializeFormData, getCurrentSizer };