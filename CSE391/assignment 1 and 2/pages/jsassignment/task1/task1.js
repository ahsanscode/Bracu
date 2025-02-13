const quotes = [
    "The only limit to our realization of tomorrow is our doubts of today.",
    "The future belongs to those who believe in the beauty of their dreams.",
    "The best way to predict the future is to invent it.",
    "Life is 10% what happens to us and 90% how we react to it.",
    "The purpose of our lives is to be happy."
];

function generateQuote() {
    const randomIndex = Math.floor(Math.random() * quotes.length);
    const quoteBox = document.getElementById('quote-box');
    quoteBox.innerText = quotes[randomIndex];
}

function changeQuoteBoxStyle(color, fontFamily, fontSize) {
    const quoteBox = document.getElementById('quote-box');

    if (color === 'red') {
        quoteBox.style.color = 'white';
        quoteBox.style.borderColor = 'black';
        quoteBox.style.backgroundColor = 'red';
    } else if (color === 'blue') {
        quoteBox.style.color = 'white';
        quoteBox.style.borderColor = 'black';
        quoteBox.style.backgroundColor = 'blue';
    } else if (color === 'green') {
        quoteBox.style.color = 'white';
        quoteBox.style.borderColor = 'black';
        quoteBox.style.backgroundColor = 'green';
    } else if (color === 'purple') {
        quoteBox.style.color = 'white';
        quoteBox.style.borderColor = 'black';
        quoteBox.style.backgroundColor = 'purple';
    }

    quoteBox.style.fontFamily = fontFamily;
    quoteBox.style.fontSize = fontSize;
}

document.addEventListener("DOMContentLoaded", function () {
    generateQuote();
});




/*[art 2 */

// script.js
function convert() {
    const weightInput = document.getElementById('weightInput').value;
    const unitSelect = document.getElementById('unitSelect').value;
    const resultSpan = document.getElementById('resultSpan');

    let result;

    if (unitSelect === 'kg-to-lb') {
        result = weightInput * 2.2046;
    } else if (unitSelect === 'lb-to-kg') {
        result = weightInput * 0.4536;
    }

    // Display the result
    resultSpan.innerText = result;
}