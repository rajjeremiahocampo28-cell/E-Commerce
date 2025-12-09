import React, { useState } from "react";
import "./App.css";

function Checkout({ cart, clearCart, goBack }) {
  const [name, setName] = useState("");
  const [address, setAddress] = useState("");
  const [payment, setPayment] = useState("");
  const [gcashNumber, setGcashNumber] = useState("");
  const [submitted, setSubmitted] = useState(false);
  const [finalTotal, setFinalTotal] = useState(0);
  const [loading, setLoading] = useState(false);

  const total = cart.reduce((sum, item) => sum + item.price, 0);

  const handleSubmit = async (e) => {
    e.preventDefault();

    if (!payment) {
      alert("Please select a payment method!");
      return;
    }

    if (payment === "gcash" && gcashNumber.length < 11) {
      alert("Enter a valid GCash number");
      return;
    }

    const orderData = { name, address, payment, gcashNumber, cart, total };

    try {
      setLoading(true);

      const res = await fetch("https://jsonplaceholder.typicode.com/posts", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(orderData),
      });

      const data = await res.json();
      console.log("Order response:", data);

      setFinalTotal(total);
      setSubmitted(true);
      clearCart();
    } catch (err) {
      console.error(err);
      alert("Failed to place order. Try again.");
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="checkout">
      <h2>💳 Checkout</h2>

      {!submitted ? (
        <form className="checkout-form" onSubmit={handleSubmit}>
          <label>
            Full Name:
            <input
              type="text"
              value={name}
              onChange={(e) => setName(e.target.value)}
              placeholder="John Doe"
              required
            />
          </label>

          <label>
            Address:
            <input
              type="text"
              value={address}
              onChange={(e) => setAddress(e.target.value)}
              placeholder="123 Street, City"
              required
            />
          </label>

          <label>
            <strong>Payment Method:</strong>
          </label>
          <div className="payment-options">
            <label>
              <input
                type="radio"
                value="cod"
                checked={payment === "cod"}
                onChange={(e) => setPayment(e.target.value)}
              />
              Cash On Delivery (COD)
            </label>

            <label>
              <input
                type="radio"
                value="gcash"
                checked={payment === "gcash"}
                onChange={(e) => setPayment(e.target.value)}
              />
              GCash
            </label>
          </div>

          {payment === "gcash" && (
            <label>
              GCash Number:
              <input
                type="tel"
                placeholder="09xxxxxxxxx"
                value={gcashNumber}
                onChange={(e) => setGcashNumber(e.target.value)}
                required
              />
            </label>
          )}

          <p className="total">Total Amount: ${total.toLocaleString()}</p>

          <button type="submit" disabled={loading}>
            {loading ? "Processing..." : "Place Order"}
          </button>
          <button type="button" onClick={goBack} className="cancel-btn">
            Cancel
          </button>
        </form>
      ) : (
        <div className="confirmation">
          <h3>✅ Thank you, {name}!</h3>
          <p>
            Your order totaling <strong>₱{finalTotal.toLocaleString()}</strong> will be shipped to {address}.
          </p>
          <p>
            <strong>Payment Method:</strong> {payment === "cod" ? "Cash On Delivery" : "GCash"}
            {payment === "gcash" && <> | GCash No: {gcashNumber}</>}
          </p>
          <button onClick={goBack}>Back to Shop</button>
        </div>
      )}
    </div>
  );
}

export default Checkout;
