<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket | Page Turner</title>
    <link rel="icon" href="logo.jpg" type="image/jpeg">
    <link rel="stylesheet" href="basket_saved.css" onerror="alert('CSS file not found!')">
</head>
<body>

    <header class="basket-Header">
        <div class="logo">
            <img src="logo.jpg" alt="Logo">
            <h1>Basket</h1>
        </div>
    </header>
    <a href="shop" class="back-to-shopping"> < Back to Shopping</a>

    <div class="main-container">
        <div class="main-content">
            <div class="delivery-address">
                <h2>Delivery Address</h2>
                <form>
                    <label for="full-name">Full Name:</label>
                    <input type="text" id="full-name" name="full-name" required>
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" required>
                    <label for="postcode">Postcode:</label>
                    <input type="text" id="postcode" name="postcode" required>
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" required>
                </form>
            </div>

            <div class="bank-details">
                <h2>Bank Details</h2>
                <form>
                    <label for="card-number">Card Number:</label>
                    <input type="text" id="card-number" name="card-number" required>
                    <label for="expiry-date">Expiry Date (MM/YY):</label>
                    <input type="text" id="expiry-date" name="expiry-date" required>
                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" required>
                </form>
            </div>
        </div>

        <div class="right-column">
            <div class="delivery-options">
                <h2>Delivery Options</h2>
                <form class="delivery-form">
                    <label>
                        <input type="radio" name="delivery" value="next-day"> 
                        Next Day (Orders before 6pm) - £5.99
                    </label>
                    <label>
                        <input type="radio" name="delivery" value="two-three-days"> 
                        2/3 Days - £2.99
                    </label>
                    <label>
                        <input type="radio" name="delivery" value="free-delivery"> 
                        Free (5/7 Days)
                    </label>
                </form>
            </div>

            <div class="promotion-code">
                <h2>Promotion Code (if available)</h2>
                <form class="promo-form">
                    <input type="text" placeholder="Enter your code" class="promo-input">
                    <button type="button" class="promo-apply">Apply</button>
                </form>
            </div>

            <div class="your-order">
                <h2>Your Order</h2>
                <p>0 items</p>
                <p>Subtotal (inc VAT): £0.00</p>
                <hr>
                <p class="total-to-pay">Total to Pay: £0.00</p>
                <p>Total VAT: £0.00</p>
                <a href="checkout" class="checkout-button">Checkout</a>
            </div>
        </div>
    </div>

</body>
</html>
