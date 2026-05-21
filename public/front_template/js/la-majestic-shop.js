(function ($) {
    "use strict";

    var cartKey = "la_majestic_cart_items";
    var paymentMethodKey = "la_majestic_payment_method";
    var toastTimer = null;

    function normalizeItems(items) {
        if (!Array.isArray(items)) {
            return [];
        }

        return items.map(function (item) {
            return {
                slug: item.slug || "",
                name: item.name || "Item",
                price: parseFloat(item.price || 0),
                image: item.image || "",
                quantity: Math.max(parseInt(item.quantity || 1, 10), 1)
            };
        });
    }

    function readCart() {
        try {
            return normalizeItems(JSON.parse(window.localStorage.getItem(cartKey) || "[]"));
        } catch (error) {
            return [];
        }
    }

    function writeCart(items) {
        window.localStorage.setItem(cartKey, JSON.stringify(normalizeItems(items)));
    }

    function readPaymentMethod() {
        var method = window.localStorage.getItem(paymentMethodKey);
        return method === "online" ? "online" : "cash";
    }

    function writePaymentMethod(method) {
        window.localStorage.setItem(paymentMethodKey, method === "online" ? "online" : "cash");
    }

    function getItemCount(items) {
        return items.reduce(function (total, item) {
            return total + item.quantity;
        }, 0);
    }

    function getSubtotal(items) {
        return items.reduce(function (total, item) {
            return total + (item.price * item.quantity);
        }, 0);
    }

    function formatPrice(amount) {
        return "$" + amount.toFixed(2);
    }

    function updateCartCount() {
        var count = getItemCount(readCart());
        $(".lm-cart-count").text(count);
    }

    function showToast(message) {
        var $toast = $("#cartToast");

        if (!$toast.length) {
            return;
        }

        $toast.text(message).addClass("is-visible");

        if (toastTimer) {
            window.clearTimeout(toastTimer);
        }

        toastTimer = window.setTimeout(function () {
            $toast.removeClass("is-visible");
        }, 2200);
    }

    function addCartItem(payload) {
        var items = readCart();
        var existing = items.find(function (item) {
            if (payload.slug && item.slug) {
                return item.slug === payload.slug;
            }

            return item.name === payload.name && item.price === payload.price;
        });

        if (existing) {
            existing.quantity += 1;
            if (!existing.image && payload.image) {
                existing.image = payload.image;
            }
        } else {
            items.push({
                slug: payload.slug || "",
                name: payload.name,
                price: payload.price,
                image: payload.image,
                quantity: 1
            });
        }

        writeCart(items);
        updateCartCount();
        renderCartPage();
    }

    function removeCartItem(index) {
        var items = readCart();
        items.splice(index, 1);
        writeCart(items);
        updateCartCount();
        renderCartPage();
    }

    function clearCart() {
        writeCart([]);
        updateCartCount();
        renderCartPage();
    }

    function syncPaymentMethodControls() {
        var method = readPaymentMethod();
        var $online = $("input[name='payment_method_choice'][value='online']");

        if ($online.length && $online.is(":disabled")) {
            method = "cash";
            writePaymentMethod("cash");
        }

        $("input[name='payment_method_choice'][value='cash']").prop("checked", method === "cash");
        $online.prop("checked", method === "online");
    }

    function updateCheckoutFields(items, subtotal) {
        var method = readPaymentMethod();
        $("#checkoutItemsJson").val(JSON.stringify(items));
        $("#checkoutSubtotal").val(subtotal.toFixed(2));
        $("#checkoutPaymentMethod").val(method);
        $("#submitOrderBtn").prop("disabled", items.length === 0);
    }

    function renderCartPage() {
        var $list = $("#cartItems");
        var $empty = $("#cartEmptyState");
        var $count = $("#cartItemsCount");
        var $subtotal = $("#cartSubtotal");
        var items = readCart();
        var totalItems = getItemCount(items);
        var subtotal = getSubtotal(items);
        var markup = "";

        updateCheckoutFields(items, subtotal);

        if (!$list.length) {
            return;
        }

        syncPaymentMethodControls();
        $count.text(totalItems);
        $subtotal.text(formatPrice(subtotal));

        if (!items.length) {
            $list.empty();
            $empty.show();
            return;
        }

        $empty.hide();

        items.forEach(function (item, index) {
            var imageMarkup = item.image ? '<div class="lm-cart-item-image"><img src="' + item.image + '" alt="' + item.name + '"></div>' : "";

            markup += '' +
                '<div class="lm-cart-item">' +
                    imageMarkup +
                    '<div class="lm-cart-item-copy">' +
                        '<h4>' + item.name + '</h4>' +
                        '<div class="lm-cart-item-meta">' +
                            '<span>Qty ' + item.quantity + '</span>' +
                            '<span>' + formatPrice(item.price) + ' each</span>' +
                        '</div>' +
                        '<div class="lm-cart-item-total">' + formatPrice(item.price * item.quantity) + '</div>' +
                    '</div>' +
                    '<button type="button" class="lm-link-btn lm-remove-cart-item" data-cart-index="' + index + '">Remove</button>' +
                '</div>';
        });

        $list.html(markup);
    }

    function handleAddToCart() {
        $(document).on("click", ".add-to-cart", function (event) {
            event.preventDefault();

            var payload = {
                slug: $(this).data("product-slug") || "",
                name: $(this).data("product-name") || "Item",
                price: parseFloat($(this).data("product-price") || 0),
                image: $(this).data("product-image") || ""
            };

            addCartItem(payload);
            showToast(payload.name + " added to cart");
        });
    }

    function handleCartActions() {
        $(document).on("change", "input[name='payment_method_choice']", function () {
            writePaymentMethod($(this).val());
            renderCartPage();
        });

        $(document).on("click", ".lm-remove-cart-item", function () {
            removeCartItem(parseInt($(this).data("cart-index"), 10));
        });

        $(document).on("click", "#clearCart", function () {
            clearCart();
            showToast("Cart cleared");
        });
    }

    function smoothAnchors() {
        $(document).on("click", "a[href*='#']", function (event) {
            var href = $(this).attr("href");

            if (!href || href === "#" || href.indexOf("#") === -1) {
                return;
            }

            var url;

            try {
                url = new URL(href, window.location.href);
            } catch (error) {
                return;
            }

            if (url.pathname !== window.location.pathname || url.origin !== window.location.origin || !url.hash) {
                return;
            }

            var target = document.querySelector(url.hash);

            if (!target) {
                return;
            }

            event.preventDefault();

            var headerHeight = $(".main-header").outerHeight() || 96;
            var top = $(target).offset().top - headerHeight + 8;

            $("html, body").animate({ scrollTop: top }, 650);
        });
    }

    $(window).on("storage", function () {
        updateCartCount();
        renderCartPage();
        syncPaymentMethodControls();
    });

    $(function () {
        if ($(".lm-cart-page").data("clear-cart") === 1) {
            clearCart();
        }

        updateCartCount();
        syncPaymentMethodControls();
        renderCartPage();
        handleAddToCart();
        handleCartActions();
        smoothAnchors();
    });
})(jQuery);
