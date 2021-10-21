/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});

document.querySelectorAll('.table-responsive').forEach(function (dom, index) {
    new SimpleBar(dom);
})

document.querySelectorAll('.scrollable').forEach(function (dom, index) {
    new SimpleBar(dom);
})

function initAutosize()
{
    autosize(document.querySelectorAll('textarea.autosize'))
}
initAutosize()

function toggleMainNav()
{
    var body = $('body'),
        className = 'show-aside';

    if (body.hasClass(className)) {
        body.removeClass(className);
    } else {
        body.addClass(className);
    }
}

function switchDisplay(dom)
{
    let currentDisplay = dom.innerHTML,
        altDisplay = dom.getAttribute('title')

    dom.innerHTML = altDisplay
    dom.setAttribute('title', currentDisplay)
}

function showOverlay()
{
    if (! document.querySelector('.form-overlay')) {
        return false;
    }

    document.querySelector('.form-overlay').style.visibility = 'visible';
    document.querySelector('.form-overlay').style.opacity = '1';
}

function hideOverlay()
{
    if (! document.querySelector('.form-overlay')) {
        return false;
    }

    document.querySelector('.form-overlay').style.visibility = 'hidden';
    document.querySelector('.form-overlay').style.opacity = '0';
}

function bootboxifyWithAxios(event, url, size = 'small', initAfter = null)
{
    event.preventDefault()

    preloadBootbox(size)

    axios.get(url)
        .then(function (response) {
            var data = response.data

            if (data.view) {
                overrideBootbox(data.view)
            }

            if (initAfter) {
                initAfter()
            }
        })
        .catch(function (error) {
            console.log(error)
        })
}

function bootboxify(event, url, size = 'small')
{
    event.preventDefault();

    preloadBootbox(size);

    $.get(url)
        .done(function (r) {
            if (r.view) {
                overrideBootbox(r.view);
            }
        })
        .fail(function (r) {

        });
}

function preloadBootbox(size = 'small')
{
    bootbox.dialog({
        message: '<div class="d-flex justify-content-center py-3"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>',
        closeButton: false,
        onEscape: true,
        size: size
    });
}

function overrideBootbox(view)
{
    let node = document.createElement('div');
    node.innerHTML = view;

    document.querySelector('.bootbox .modal-content').replaceWith(node.firstChild);
}

function ajaxify(formId, initAfter = null)
{
    var form = $(formId),
        data = form.serialize(),
        url = form.attr('action');

    showOverlay();

    $.post(url, data)
        .done(function (r) {

            if (initAfter) {
                initAfter();
            }

            hideOverlay();
        })
        .fail(function (r) {
            hideOverlay();
        });
}

function formSubmit(event, dom, eventAfter = null)
{
    event.preventDefault();

    let form = $(dom),
        url = form.attr('action'),
        data = form.serialize(),
        target = $(form.data('target'));

    showOverlay();
    $.post(url, data)
        .done(function (r) {
            if (r.error) {
                form.prepend(r.error);
            }

            if (r.views && r.views.length > 0) {
                r.views.forEach(function (view) {
                    var target = $('#' + view.id);

                    if (target) {
                        if (view.replaceInnerHtml) {
                            target.html(view.html);
                        } else {
                            target.replaceWith(view.html);
                        }
                    }
                })
            }

            if (eventAfter) {
                eventAfter();
            }

            hideOverlay();
        })
        .fail(function (r) {
            hideOverlay();
        });
}
