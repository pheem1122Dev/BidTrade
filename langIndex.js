function setLanguage(lang) {
    const brandText = document.getElementById('brand-text');
    const welcomeText = document.getElementById('welcome-text');
    const descriptionText = document.getElementById('description-text');
    const actionButton = document.getElementById('action-button');
    const selectedLanguage = document.getElementById('selected-language');

    // Set content based on selected language
    if (lang === 'en') {
        brandText.textContent = 'Bidtrade';
        welcomeText.textContent = 'Welcome to Bidtrade';
        descriptionText.textContent = 'Your trusted trading platform. Start bidding now!';
        actionButton.textContent = 'Start Bidding';
        selectedLanguage.textContent = 'English';  // Update the button text
    } else if (lang === 'th') {
        brandText.textContent = 'บิดเทรด';
        welcomeText.textContent = 'ยินดีต้อนรับสู่ บิดเทรด';
        descriptionText.textContent = 'แพลตฟอร์มการซื้อขายที่เชื่อถือได้ของคุณ เริ่มประมูลเลย!';
        actionButton.textContent = 'เริ่มประมูล';
        selectedLanguage.textContent = 'ไทย';  // Update the button text
    }

    // Close dropdown after selection
    toggleDropdown();
}

function toggleDropdown() {
    const dropdown = document.querySelector('.dropdown');
    dropdown.classList.toggle('open');
}

// Close dropdown if clicked outside
window.onclick = function(event) {
    if (!event.target.closest('.dropdown-toggle') && !event.target.closest('.dropdown-menu')) {
        const dropdown = document.querySelector('.dropdown');
        dropdown.classList.remove('open');
    }
}
