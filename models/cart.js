const mongoose = require('mongoose');

const CartSchema = new mongoose.Schema({
    userId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: 'User', // Reference to the User model (if applicable)
        required: true
    },
    items: [{
        productId: {
            type: mongoose.Schema.Types.ObjectId,
            ref: 'Product', // Reference to the Product model
            required: true
        },
        name: String,
        price: Number,
        quantity: Number
    }],
    totalPrice: Number
});

const Cart = mongoose.model('Cart', CartSchema);

module.exports = Cart;
