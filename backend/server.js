const express = require("express");
const cors = require("cors");
const bodyParser = require("body-parser");

const app = express();
const PORT = 5000;

app.use(cors());
app.use(bodyParser.json());

app.post("/checkout", (req, res) => {
  const { name, address, payment, gcashNumber, cart, total } = req.body;

  if (!name || !address || !payment || cart.length === 0) {
    return res.status(400).json({ message: "Missing required fields" });
  }

  console.log("New Order Received:");
  console.log({ name, address, payment, gcashNumber, cart, total });

  return res.status(200).json({
    message: "Order placed successfully!",
    order: { name, address, payment, gcashNumber, cart, total },
  });
});

app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});
