function splitNumber() {
    // Get the values from the input fields
    const numberInput = document.getElementById('number').value; // The number to split
    const splitsInput = document.getElementById('splits').value; // The number of parts

    // Convert the input values to a number
    const number = parseFloat(numberInput); // Convert to a floating-point number
    const splits = parseInt(splitsInput);   // Convert to an integer

    // Get the container where the results will be displayed
    const resultContainer = document.getElementById('result-container');

    // Clear any previous results
    resultContainer.innerHTML = '';

    // Check if the inputs are valid numbers
    if (isNaN(number) || isNaN(splits) || splits <= 0) {
        alert('Please enter valid numbers.');
        return; // Stop the function if the inputs are invalid
    }

    // Calculate how much each part will be
    const splitValue = number / splits;

    // Define an array of colors
    const colors = ['blue', 'pink', 'red'];

    // Create a new div for each part and set its color and box styling
    for (let i = 0; i < splits; i++) {
        const div = document.createElement('div');   // Create a new div element
        const color = colors[i % colors.length];     // Get the color for this split

        // Set the text content to show the split value only
        div.textContent = splitValue.toFixed(2);

        // Apply the styles for the box
        div.classList.add('result-box');             // Add a class for styling
        div.style.backgroundColor = color;           // Set background color

        // Add the div to the result container
        resultContainer.appendChild(div);
    }
}
