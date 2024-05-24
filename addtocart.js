// Define an empty cart array to store the items
let cart = [];

// Function to add an item to the cart
function addToCart(item) {
    cart.push(...addToCart.arguments);
    // console.log(`${item} added to cart.`);
    displayCart();
}

// Example usage
addToCart("Product 1");
addToCart("Product 2");
console.log(cart); 