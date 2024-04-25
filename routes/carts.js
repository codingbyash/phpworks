const express = require('express');
const router = express.Router();
const Cart = require('../models/cart');

// Route to add an item to the cart
router.post('/add-to-cart', async (req, res) => {
    const { userId, productId, name, price, quantity } = req.body;
    // Find the user's cart
    let cart = await Cart.findOne({ userId });
    if (!cart) {
        cart = new Cart({ userId, items: [], totalPrice: 0 });
    }
    // Add the item to the cart
    cart.items.push({ productId, name, price, quantity });
    cart.totalPrice += price * quantity;
    await cart.save();
    res.send('Item added to cart');
});

// Route to remove an item from the cart
router.post('/remove-from-cart', async (req, res) => {
    // Logic to remove an item from the cart
});

// Route to get the cart information
router.get('/cart', async (req, res) => {
    const { userId } = req.query; // Assuming the user ID is provided as a query parameter
    const cart = await Cart.findOne({ userId });
    res.render('cart', { cart });
});

module.exports = router;
