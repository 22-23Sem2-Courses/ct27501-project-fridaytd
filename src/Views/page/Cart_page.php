<style>
    /* Cart table styles */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #ddd;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Checkout button styles */
    button {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }
</style>

<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody id="cart-items">
        <!-- Cart items will be added here using JavaScript -->
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Total:</td>
            <td id="cart-total"></td>
        </tr>
        <tr>
            <td colspan="4"><button id="checkout-button">Checkout</button></td>
        </tr>
    </tfoot>
</table>

<script>
    // Sample cart data
    const cartData = [
        { name: "Product 1", price: 10.99, quantity: 2 },
        { name: "Product 2", price: 19.99, quantity: 1 },
        { name: "Product 3", price: 5.99, quantity: 3 },
    ];

    // Get cart items and total
    const cartItemsEl = document.getElementById("cart-items");
    const cartTotalEl = document.getElementById("cart-total");
    let cartTotal = 0;

    // Add each cart item to the table
    cartData.forEach(item => {
        const row = document.createElement("tr");
        const nameCell = document.createElement("td");
        const priceCell = document.createElement("td");
        const quantityCell = document.createElement("td");
        const subtotalCell = document.createElement("td");

        nameCell.innerText = item.name;
        priceCell.innerText = item.price.toFixed(2);
        quantityCell.innerText = item.quantity;
        subtotalCell.innerText = (item.price * item.quantity).toFixed(2);

        row.appendChild(nameCell);
        row.appendChild(priceCell);
        row.appendChild(quantityCell);
        row.appendChild(subtotalCell);

        cartItemsEl.appendChild(row);

        cartTotal += item.price * item.quantity;
    });

    // Display total
    cartTotalEl.innerText = cartTotal.toFixed(2);

    // Checkout button click handler
    const checkoutButton = document.getElementById("checkout-button");
    checkoutButton.addEventListener("click", () => {
        // TODO: Add checkout logic here
    });
</script>