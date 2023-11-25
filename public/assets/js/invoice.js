function addToBill(item, price) {
    var billItems = document.getElementById("billItems");
    var itemRows = billItems.getElementsByTagName("tr");

    // Check if the item already exists in the bill
    for (var i = 0; i < itemRows.length; i++) {
        var row = itemRows[i];
        if (row.cells[0].innerText === item) {
            var quantityElement = row.cells[1].querySelector(".quantity");
            var quantity = parseInt(quantityElement.innerText);
            quantity++;
            quantityElement.innerText = quantity;

            calculateTotals(); // Update the totals
            return; // Exit the function
        }
    }

    // If the item doesn't exist, add it as a new row
    var quantity = 1; // Initial quantity
    var total = quantity * price;

    var newRow = document.createElement("tr");

    newRow.innerHTML = `
        <td>${item}</td>
        <td>
            <button class="quantity-btn" onclick="decrementQuantity(this)">-</button>
            <span class="quantity">${quantity}</span>
            <button class="quantity-btn" onclick="incrementQuantity(this)">+</button>
        </td>
        <td>Rs ${price}</td>
        <td class="item-total">Rs ${total}</td>
    `;

    billItems.appendChild(newRow);
    calculateTotals(); // Update the totals

}

function calculateTotals() {
    var itemRows = document.querySelectorAll("#billItems tr");
    var total = 0;

    itemRows.forEach(function(row) {
        var price = parseInt(row.cells[2].innerText.replace("Rs ", ""));
        var quantity = parseInt(row.cells[1].querySelector(".quantity").innerText);
        var itemTotal = price * quantity;

        row.cells[3].innerText = "Rs " + itemTotal;
        total += itemTotal;
    });

    document.getElementById("total").innerText = "Rs " + total;
    document.getElementById("total_amount").value = total;
}

function incrementQuantity(button) {
    var quantityElement = button.parentNode.querySelector(".quantity");
    var quantity = parseInt(quantityElement.innerText);
    quantity++;
    quantityElement.innerText = quantity.toString();
    calculateTotals(); // Update the totals
}

function decrementQuantity(button) {
    var quantityElement = button.parentNode.querySelector(".quantity");
    var quantity = parseInt(quantityElement.innerText);
    if (quantity > 1) {
        quantity--;
        quantityElement.innerText = quantity.toString();
        calculateTotals(); // Update the totals
    } else {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row); // Remove the row
        calculateTotals(); // Update the totals
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var incrementButtons = document.querySelectorAll('.quantity-btn.increment');
    var decrementButtons = document.querySelectorAll('.quantity-btn.decrement');

    incrementButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.stopPropagation();
            incrementQuantity(this);
        });
    });

    decrementButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.stopPropagation();
            decrementQuantity(this);
        });
    });

    var confirmOrderButton = document.querySelector('.confirm-order-btn');
    confirmOrderButton.addEventListener('click', function(event) {
        event.preventDefault();
        confirmOrder();
    });

    var orderForm = document.getElementById('orderForm');
    orderForm.addEventListener('submit', function(event) {
        event.preventDefault();
    });
});

function validateAndConfirmOrder() {
    var totalAmount = parseFloat(document.getElementById('total_amount').value);

    if (totalAmount <= 0) {
        alert("Please add items to the order before confirming.");
    } else {
        document.getElementById('orderForm').submit();
    }
}