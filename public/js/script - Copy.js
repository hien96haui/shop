let currentIndex = 0;

const mockups = {
    '1': {
        '1': [
            'https://img.thesitebase.net/10611/10611706/products/ver_1/14eap3a5hm2c0kwlm-d5VfX-1712909388e322b2b491.jpg',
            'https://img.thesitebase.net/10611/10611706/products/ver_1/2nytam2c518fu-dyUfl-1712909397dca7267a61.jpg',
            'https://img.thesitebase.net/10611/10611706/products/ver_1/2nytam2c51a0x-xhX5L-17129095062272490e4f.jpg'
        ],
        '2': [
            'https://img.thesitebase.net/10611/10611706/products/ver_1/14eap3a5hm2c0l4kb-MSmQr-1712909388e322b2b491.jpg ',
            'https://img.thesitebase.net/10611/10611706/products/ver_1/2nytam2c51git-FEFL3-1712909397dca7267a61.jpg',
            'https://img.thesitebase.net/10611/10611706/products/ver_1/2nytam2c51k0w-t2Q5N-17129095062272490e4f.jpg'
        ]
    },
    '2': {
        '1': [
            'https://img.thesitebase.net/10611/10611706/products/ver_1/9s2udao1m2c0k86z-1aDP9-1712921898527cbd8d00.jpg',
            'https://img.thesitebase.net/10611/10611706/products/ver_1/gvqg8am2c7068k-ysJrC-17129219035ac0417c25.jpg',
            'https://img.thesitebase.net/10611/10611706/products/ver_1/gvqg8am2c706ac-sU0Lr-1712921997bb8979e360.jpg'
        ],
        '2': [
            'https://img.thesitebase.net/10611/10611706/products/ver_1/9s2udao1m2c0ke2q-hyaXB-1712921898527cbd8d00.jpg',
            'https://img.thesitebase.net/10611/10611706/products/ver_1/gvqg8am2c70e08-8X30t-17129219035ac0417c25.jpg',
            'https://img.thesitebase.net/10611/10611706/products/ver_1/gvqg8am2c70edu-LcGoW-1712921997bb8979e360.jpg'
        ]
    }
};
function updateSizes(size){
    console.log("log",size);
    if(size==="6XL"){
        productPrice.innerHTML = 300000;
    }
    else productPrice.innerHTML = 250000;
}
function updateOptions(type) {
   
    // const colorOptions = document.getElementById('colorOptions');
    // const sizeOptions = document.getElementById('sizeOptions');
    // const mainImage = document.getElementById('mainImage');
    // const productName = document.getElementById('productName');
    // const productDescription = document.getElementById('productDescription');

    // currentIndex = 0;

    // if (type === 'T-shirt') {
    //     colorOptions.innerHTML = `
    //         <option value="white">Trắng</option>
    //         <option value="lime">Vàng chanh</option>
    //     `;
    //     sizeOptions.innerHTML = `
    //         <option value="S">S</option>
    //         <option value="M">M</option>
    //         <option value="L">L</option>
    //         <option value="XL">XL</option>
    //         <option value="2XL">2XL</option>
    //         <option value="3XL">3XL</option>
    //     `;
    //     productName.innerText = 'Áo Thun Màu Trắng';
    //     productDescription.innerText = 'Mô tả chi tiết về sản phẩm áo thun màu trắng.';
    // } else {
    //     colorOptions.innerHTML = `
    //         <option value="white">Trang</option>
    //         <option value="sand">Sand</option>
    //     `;
    //     sizeOptions.innerHTML = `
    //         <option value="M">M</option>
    //         <option value="L">L</option>
    //         <option value="XL">XL</option>
    //         <option value="2XL">2XL</option>
    //         <option value="3XL">3XL</option>
    //         <option value="4XL">4XL</option>
    //         <option value="5XL">5XL</option>
    //         <option value="6XL">6XL</option>
    //     `;
    //     productName.innerText = 'Áo Hoodie Màu Đen';
    //     productDescription.innerText = 'Mô tả chi tiết về sản phẩm áo hoodie màu đen.';
    // }

    updateMockup();
}
function updateColors(){
    const type = document.getElementById('typeOptions').value;
    const color = document.getElementById('colorOptions').value;
     if(type==='T-shirt'&&color==='white'){
        sizeOptions.innerHTML = `
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="2XL">2XL</option>
            <option value="3XL">3XL</option>
            <option value="4XL">4XL</option>
            <option value="5XL">5XL</option>
        `;
     }
     else if(type==='T-shirt'&&color==='lime'){
        sizeOptions.innerHTML = `
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="2XL">2XL</option>
            <option value="3XL">3XL</option>
            <option value="4XL">4XL</option>
        `;
     }
     else if(type==='Hoodie'&&color==='white'){
        sizeOptions.innerHTML = `
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="2XL">2XL</option>
            <option value="3XL">3XL</option>
            <option value="4XL">4XL</option>
            <option value="5XL">5XL</option>
            <option value="6XL">6XL</option>
        `;
     }
     else{
       sizeOptions.innerHTML = `
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="2XL">2XL</option>
            <option value="3XL">3XL</option>
            <option value="4XL">4XL</option>
            <option value="5XL">5XL</option>
            <option value="6XL">6XL</option>
        `; 
     }
    updateMockup();
}
function updateMockup() {
    const type = document.getElementById('typeOptions').value;
    const colorElement = document.getElementById('colorOptions');
    let color = colorElement.value.trim();

    if (color === "") {
        color = "1"; // Gán giá trị 1 nếu color rỗng
    }
     console.log(type);
      console.log(color);
    // Reset current index
    currentIndex = 0;

    if (mockups[type] && mockups[type][color]) {
        const images = mockups[type][color];
        console.log(images);
        document.getElementById('mainImage').src = images[currentIndex]; // Cập nhật mockup chính
        updateSmallMockups(images); // Cập nhật mockup nhỏ
    }
}

function updateSmallMockups(images) {
    const smallImages = document.querySelectorAll('.image-small img');
    smallImages.forEach((img, index) => {
        img.src = images[index] || ''; // Cập nhật hình ảnh cho các mockup nhỏ
        img.onclick = () => updateMainImage(index); // Thêm sự kiện nhấp
    });
}

function changeImage(direction) {
    const type = document.getElementById('typeOptions').value;
    const color = document.getElementById('colorOptions').value;
    const images = mockups[type][color];

    currentIndex = (currentIndex + direction + images.length) % images.length;
    document.getElementById('mainImage').src = images[currentIndex];
}

function updateMainImage(index) {
    const type = document.getElementById('typeOptions').value;
    const color = document.getElementById('colorOptions').value;
    const images = mockups[type][color];

    if (images && images.length > index) {
        currentIndex = index; // Cập nhật chỉ số hiện tại
        document.getElementById('mainImage').src = images[currentIndex]; // Thay đổi hình ảnh chính
    }
}

// Sự kiện vuốt
let touchstartX = 0;
let touchendX = 0;

const mainImageDiv = document.querySelector('.image-main');
mainImageDiv.addEventListener('touchstart', (event) => {
    touchstartX = event.changedTouches[0].screenX;
});

mainImageDiv.addEventListener('touchend', (event) => {
    touchendX = event.changedTouches[0].screenX;
    handleSwipe();
});

function handleSwipe() {
    if (touchendX < touchstartX - 50) {
        // Vuốt trái
        changeImage(1);
    }
    if (touchendX > touchstartX + 50) {
        // Vuốt phải
        changeImage(-1);
    }
}
