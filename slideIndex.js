// กำหนดตัวแปรสำหรับ slider
let slider = document.querySelector('.slider');
let sliderItems = document.querySelectorAll('.slider-item');

// ฟังก์ชันที่ใช้สำหรับเลื่อน slider
function slideNext() {
    slider.appendChild(sliderItems[0]); // เลื่อน item ตัวแรกไปยังท้าย
}

// ทำให้ slider หมุนทุก 5 วินาที
setInterval(slideNext, 5000); // ปรับเวลาตามต้องการ

