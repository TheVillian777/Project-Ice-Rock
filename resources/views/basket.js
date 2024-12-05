const cartItems = [
    { id: 1, name: "Book 1", price: 10.99, quantity: 1 },
    { id: 2, name: "Book 2", price: 12.49, quantity: 2 }
];

function renderCart() {
    const cartItemsContainer = document.getElementById('cart-items');
    const subtotalElem = document.getElementById('subtotal');
    const totalElem = document.getElementById('total');

    let subtotal = 0;
    cartItemsContainer.innerHTML = '';

    cartItems.forEach(item => {
        subtotal += item.price * item.quantity;

        const itemElem = document.createElement('div');
        itemElem.classList.add('cart-item');
        itemElem.innerHTML = `
            <span>${item.name}</span>
            <span>$${item.price.toFixed(2)}</span>
            <span>
                <button onclick="updateQuantity(${item.id}, -1)">-</button>
                ${item.quantity}
                <button onclick="updateQuantity(${item.id}, 1)">+</button>
            </span>
            <span>$${(item.price * item.quantity).toFixed(2)}</span>
            <button onclick="removeItem(${item.id})">Remove</button>
        `;
        cartItemsContainer.appendChild(itemElem);
    });

    subtotalElem.textContent = `$${subtotal.toFixed(2)}`;
    totalElem.textContent = `$${subtotal.toFixed(2)}`;
}

function updateQuantity(itemId, change) {
    const item = cartItems.find(item => item.id === itemId);
    if (item) {
        item.quantity += change;
        if (item.quantity < 1) item.quantity = 1;
        renderCart();
    }
}

function removeItem(itemId) {
    const itemIndex = cartItems.findIndex(item => item.id === itemId);
    if (itemIndex > -1) {
        cartItems.splice(itemIndex, 1);
        renderCart();
    }
}

document.addEventListener('DOMContentLoaded', renderCart);
