function updateOptions(type) {
    const colorOptions = document.getElementById('colorOptions');
    const sizeOptions = document.getElementById('sizeOptions');
    const productPrice = document.getElementById('productPrice');

    // Reset selection
    document.querySelectorAll('input[name="color"], input[name="size"]').forEach(input => input.checked = false);

    // Populate colors based on the selected type
    colorOptions.innerHTML = '';
    sizeOptions.innerHTML = '';

    for (const color in products[type].colors) {
        colorOptions.innerHTML += `
            <label>
                <input type="radio" name="color" value="${color}" onclick="changeImage('${products[type].colors[color]}', '${type}', '${color}'); updateSizes('${type}', '${color}')"> ${color}
            </label>
        `;
    }

    // Update price and set default image
    productPrice.innerText = formatPrice(products[type].basePrice);
    const defaultColor = Object.keys(products[type].colors)[0];
    changeImage(products[type].colors[defaultColor], type, defaultColor);
    
    // Populate sizes for the default color
    updateSizes(type, defaultColor);
}

function updateSizes(type, color) {
    const sizeOptions = document.getElementById('sizeOptions');
    const basePrice = products[type].basePrice;

    sizeOptions.innerHTML = ''; // Clear previous sizes
    const sizes = products[type].sizes[color
