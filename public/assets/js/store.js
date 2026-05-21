document.addEventListener('DOMContentLoaded', function () {
    var siteHeader = document.getElementById('siteHeader');
    var navbar = document.getElementById('storeNavbar');
    var cartBadge = document.getElementById('cartBadge');
    var toastElement = document.getElementById('cartToast');
    var toastTitle = document.getElementById('toastTitle');
    var toastMessage = document.getElementById('toastMessage');
    var cartCount = 0;
    var toast = toastElement ? new bootstrap.Toast(toastElement, { delay: 2200 }) : null;

    function syncNavbar() {
        if (!navbar) {
            return;
        }

        navbar.classList.toggle('is-scrolled', window.scrollY > 10);
    }

    syncNavbar();
    window.addEventListener('scroll', syncNavbar);

    function getHeaderOffset() {
        return siteHeader ? siteHeader.offsetHeight + 12 : 96;
    }

    document.querySelectorAll('a[href*="#"]').forEach(function (link) {
        link.addEventListener('click', function (event) {
            var href = link.getAttribute('href');

            if (!href || href === '#' || href.indexOf('#') === -1) {
                return;
            }

            var url;

            try {
                url = new URL(href, window.location.href);
            } catch (error) {
                return;
            }

            var hash = url.hash.replace('#', '');

            if (!hash) {
                return;
            }

            var isSamePage = url.pathname === window.location.pathname && url.origin === window.location.origin;

            if (!isSamePage) {
                return;
            }

            var target = document.getElementById(hash);

            if (!target) {
                return;
            }

            event.preventDefault();

            var top = target.getBoundingClientRect().top + window.scrollY - getHeaderOffset();

            window.scrollTo({
                top: top,
                behavior: 'smooth',
            });

            if (history.replaceState) {
                history.replaceState(null, '', '#' + hash);
            }
        });
    });

    document.querySelectorAll('.add-to-cart').forEach(function (button) {
        button.addEventListener('click', function () {
            cartCount += 1;

            if (cartBadge) {
                cartBadge.textContent = String(cartCount);
            }

            if (toastTitle) {
                toastTitle.textContent = 'Added to cart';
            }

            if (toastMessage) {
                toastMessage.textContent = button.dataset.productName + ' is waiting in your cart.';
            }

            if (toast) {
                toast.show();
            }
        });
    });

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.18 });

    document.querySelectorAll('[data-reveal]').forEach(function (element) {
        observer.observe(element);
    });
});
