document.getElementById("numberForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const input = document.getElementById("numbers").value;
    const numbers = input.split(",").map(num => parseFloat(num)).filter(num => !isNaN(num));

    if (numbers.length === 0) {
        alert("Please enter a valid series of numbers separated by commas.");
        return;
    }

    const max = Math.max(...numbers);
    const min = Math.min(...numbers);
    const sum = numbers.reduce((a, b) => a + b, 0);
    const average = sum / numbers.length;
    const reverse = numbers.slice().reverse().join(",");

    document.getElementById("max").textContent = max;
    document.getElementById("min").textContent = min;
    document.getElementById("sum").textContent = sum;
    document.getElementById("average").textContent = average;
    document.getElementById("reverse").textContent = reverse;
});
