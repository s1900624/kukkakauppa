const setTotalHinta = (e) => {
    const totalHinta = document.getElementById('totalHinta');
    const price = e.value;
    if (e.checked) {
        totalHinta.innerText = parseInt(totalHinta.innerText) + parseInt(document.getElementById('price_' + price).innerText);
    } else {
        totalHinta.innerText = parseInt(totalHinta.innerText) - parseInt(document.getElementById('price_' + price).innerText);
    }
};

