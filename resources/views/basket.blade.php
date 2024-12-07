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

    <div class="left-column">
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
                    5/7 Days - Free
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
        </div>
    </div>

</body>
</html>
