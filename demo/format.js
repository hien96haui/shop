const products = {
    'T-shirt': {
        'colors': {
            'Đen': 'https://via.placeholder.com/600x400/000000',
            'Trắng': 'https://via.placeholder.com/600x400/ffffff'
        },
        'sizes': {
            'Đen': ['S', 'M', 'L', 'XL', 'XXL', 'XXXL', '4XL'],
            'Trắng': ['S', 'M', 'L'],
        },
        'basePrice': 250000,
    },
    'Hoodie': {
        'colors': {
            'Đen': 'https://via.placeholder.com/600x400/000000',
            'Trắng': 'https://via.placeholder.com/600x400/ffffff'
        },
        'sizes': {
            'Đen': ['S', 'M', 'L', 'XL', 'XXL', 'XXXL'],
            'Trắng': ['S', 'M', 'L'],
        },
        'basePrice': 300000,
    }
};

function changeImage(imageUrl, type, color) {
    const mainImage = document.getElementById('mainImage');
    mainImage.style.opacity = 0;
    setTimeout(() => {
        mainImage.src = imageUrl;
        mainImage.onload = () => mainImage.style.opacity = 1;
    }, 300);
    document.getElementById('productName').innerText = `${type} Màu ${color}`;
}
