if (productTitle === "Colombian Supremo Cup") {
  if (selectedOption === "large") {
    priceElement.textContent = "₱60.00";
  } else {
    priceElement.textContent = "₱40.00";
  }
} else if (productTitle === "Nitro Cold Brew") {
  if (selectedOption === "honey") {
    priceElement.textContent = "₱50.00";
  } else if (selectedOption === "vanilla") {
    priceElement.textContent = "₱40.00";
  } else if (selectedOption === "cinnamon") {
    priceElement.textContent = "₱45.00";
  } else if (selectedOption === "classic") {
    priceElement.textContent = "₱30.00";
  }
} else if (productTitle === "Seasonal Single-Origin") {
  if (selectedOption === "brazilian") {
    priceElement.textContent = "₱30.00";
  } else if (selectedOption === "mexican") {
    priceElement.textContent = "₱27.00";
  } else if (selectedOption === "guatemalan") {
    priceElement.textContent = "₱25.00";
  }
} else if (productTitle === "Mint Mojito Iced Coffee") {
  if (selectedOption === "large") {
    priceElement.textContent = "₱55.00";
  } else {
    priceElement.textContent = "₱35.00";
  }
}
