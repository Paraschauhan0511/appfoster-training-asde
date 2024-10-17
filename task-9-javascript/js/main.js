
function splitNumber() {
    const number = parseInt(document.getElementById("number").value);
    const splits = parseInt(document.getElementById("splits").value);
    const resultContainer = document.getElementById("result");
  
    resultContainer.innerHTML = "";  // Clear previous results
  
    if (splits <= 0 || isNaN(number) || isNaN(splits) || splits > number) {
      alert("Please enter valid inputs where number >= splits.");
      return;
    }
  
    // Calculate the base value for each split
    const baseValue = Math.floor(number / splits);
    let remainder = number % splits;  // Calculate the remainder
  
    const splitValues = [];
  
    // Distribute the baseValue, and give an extra 1 to the first 'remainder' splits
    for (let i = 0; i < splits; i++) {
      if (remainder > 0) {
        splitValues.push(baseValue + 1);
        remainder--;
      } else {
        splitValues.push(baseValue);
      }
    }
  
    // Create divs based on the split values
    splitValues.forEach(value => {
      const div = document.createElement("div");
      div.classList.add("box");
      div.textContent = value;
      div.style.width = `${value * 20}px`;  // Adjust width dynamically
      div.style.backgroundColor = getRandomColor();
      resultContainer.appendChild(div);
    });
  }
  
  function getRandomColor() {
    const letters = "0123456789ABCDEF";
    let color = "#";
    for (let i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }
  