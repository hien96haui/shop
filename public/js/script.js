let currentIndex = 1;



function updateMockup(color_type,product_id,type_input) {
  
    currentIndex=1;

   // console.log(color_type);
    const type = document.getElementById('typeOptions').value;
    const colorElement = document.getElementById('colorOptions');
    let color = colorElement.value.trim();
  
    if (color === "") {
        color = "1"; // Gán giá trị 1 nếu color rỗng
    }
    if(type_input===1) color =1;
    const images = "/public/images/products/"+color_type+"/"+product_id+"/"+type+"/"+color+"/1.png";
    //console.log(images);
    document.getElementById('mainImage').src = images;  
    const imgs = [];
    for (let i = 0; i <= 2; i++) {
        imgs[i] = "/public/images/products/"+color_type+"/"+product_id+"/"+type+"/"+color+"/"+(i+1)+".png";
    }
   // console.log(imgs);
    updateSmallMockups(imgs);

}

function updateSmallMockups(images) {
    //console.log("asbsdbasdha");
    const smallImages = document.querySelectorAll('.image-small img');
    smallImages.forEach((img, index) => {
        img.src = images[index] || ''; // Cập nhật hình ảnh cho các mockup nhỏ

        // img.onclick = () => updateSmallMockup(index); // Thêm sự kiện nhấp
    });
}

function changeImage(direction,product_id,color_type) {
    console.log(currentIndex);
    const type = document.getElementById('typeOptions').value;
    const colorElement = document.getElementById('colorOptions');
    let color = colorElement.value.trim();

    if (color === "") {
        color = "1"; // Gán giá trị 1 nếu color rỗng
    }
    //console.log(color);
    // const images = mockups[type][color];
    // num = currentIndex + direction;

    // console.log(num);
     
    currentIndex = currentIndex + direction;
    if(currentIndex===4) currentIndex =1;
    if(currentIndex===0) currentIndex =3;
    const images = "/public/images/products/"+color_type+"/"+product_id+"/"+type+"/"+color+"/"+currentIndex+".png";
    // console.log(images);
    // document.getElementById('mainImage').src = images[currentIndex];
    document.getElementById('mainImage').src = images;
}

function updateMainImage(index,product_id,color_type) {
    //console.log(product_id);
    const type = document.getElementById('typeOptions').value;
   
    const colorElement = document.getElementById('colorOptions');
    let color = colorElement.value.trim();

    if (color === "") {
        color = "1"; // Gán giá trị 1 nếu color rỗng
    }
   // console.log(color);
    // const images = mockups[type][color];
    const images = "/public/images/products/"+color_type+"/"+product_id+"/"+type+"/"+color+"/"+index+".png";
    // console.log(images);
     document.getElementById('mainImage').src = images; // Thay đ
    // if (images && images.length > index) {
        currentIndex = index; // Cập nhật chỉ số hiện tại
    //     document.getElementById('mainImage').src = images[currentIndex]; // Thay đổi hình ảnh chính
    // }
}

// Sự kiện vuốt
// let touchstartX = 0;
// let touchendX = 0;

// const mainImageDiv = document.querySelector('.image-main');
// mainImageDiv.addEventListener('touchstart', (event) => {
//     touchstartX = event.changedTouches[0].screenX;
// });

// mainImageDiv.addEventListener('touchend', (event) => {
//     touchendX = event.changedTouches[0].screenX;
//     handleSwipe();
// });

function handleSwipe(product_id,color_type) {
    if (touchendX < touchstartX - 50) {
        // Vuốt trái
        changeImage(1,product_id,color_type);
    }
    if (touchendX > touchstartX + 50) {
        // Vuốt phải
        changeImage(-1,product_id,color_type);
    }
}
