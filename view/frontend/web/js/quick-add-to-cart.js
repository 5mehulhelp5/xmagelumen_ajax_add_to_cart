document.addEventListener('submit', function (e) {
    const form = e.target;

    // Only intercept add-to-cart forms
    if (!form.action || !form.action.includes('checkout/cart/add')) {
        return;
    }

    e.preventDefault();

    fetch(window.devScriptsQuickAddToCart.url, {
        method: 'POST',
        body: new FormData(form),
        credentials: 'same-origin'
    })
    .then(response => response.json())
    .then(res => {
        if (res.success) {
            // Dispatch a global event for other scripts
            document.dispatchEvent(new CustomEvent('cart:add'));

            // Open mini cart if enabled
            if (res.open_minicart) {
                // For Luma / default Magento 2 mini cart
                const miniCartTrigger = document.querySelector('.showcart');
                if (miniCartTrigger) {
                    miniCartTrigger.click();
                }

                // For Hyvä theme (dispatching Alpine/JS event)
                document.dispatchEvent(new CustomEvent('devscripts:quickaddtocart:openMinicart'));
            }

            // Redirect to cart if enabled
            if (res.redirect_cart) {
                window.location.href = '/checkout/cart';
            }
        } else {
            alert(res.message || 'Unable to add product');
        }
    })
    .catch(error => {
        console.error('Quick Add To Cart error:', error);
        alert('Something went wrong. Please try again.');
    });

}, true);