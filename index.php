<?php 
 include "include/connect.php";
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/header.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="searchIndex.css">
    <link rel="stylesheet" href="slideIndex.css">
    <link rel = "stylesheet" href = "langIndex.css">
    <link rel="stylesheet" href="backgroudIndex.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href = "styleIndex.css">
    <title>BidTrade</title>

</head>
<body class="bg-light">

<div id="fullWidthSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="s1.png" class="d-block" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="s2.png" class="d-block" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="s3.png" class="d-block" alt="Slide 3">
        </div>
    </div>

    <!-- Navigation Buttons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#fullWidthSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#fullWidthSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#fullWidthSlider" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#fullWidthSlider" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#fullWidthSlider" data-bs-slide-to="2"></button>
    </div>
</div>


<div class="row justify-content-center mt-4">
    <div class="col-md-8 text-center">
        <h2 class="text-uppercase fw-bold text-primary About-title" style="letter-spacing: 3px; font-size: 3rem;">About Website</h2>
        <div class="mt-3">
            <hr style="width: 80px; border: 3px solid #007bff; border-radius: 5px; margin: 0 auto;">
        </div>
    </div>
</div>

<!-- <div class="container my-5"> -->
    <div class="row g-4 justify-content-center">
        <!-- Card 1 -->
        <div class="col-md-3 card-item">
            <div class="card h-100 text-center">
                <img src="https://via.placeholder.com/300x200?text=Image+1" class="card-img-top" alt="Image 1">
                <div class="card-body">
                    <h5 class="card-title">Card Title 1</h5>
                    <p class="card-text">This is a short description for Card 1. It's concise yet informative.</p>
                    <a href="#" class="btn btn-primary w-100">Learn More</a>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-3 p-2 card-item">
            <div class="card h-100 text-center">
                <img src="https://via.placeholder.com/300x200?text=Image+2" class="card-img-top" alt="Image 2">
                <div class="card-body">
                    <h5 class="card-title">Card Title 2</h5>
                    <p class="card-text">This is a short description for Card 2. It's concise yet informative.</p>
                    <a href="#" class="btn btn-success w-100">Discover</a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-3 p-2 card-item">
            <div class="card h-100 text-center">
                <img src="https://via.placeholder.com/300x200?text=Image+3" class="card-img-top" alt="Image 3">
                <div class="card-body">
                    <h5 class="card-title">Card Title 3</h5>
                    <p class="card-text">This is a short description for Card 3. It's concise yet informative.</p>
                    <a href="#" class="btn btn-danger w-100">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>

 <div class="row">
 <div class="row justify-content-center mt-4">
    <div class="col-md-8 text-center">
        <h2 class="text-uppercase fw-bold text-primary product-title" style="letter-spacing: 3px; font-size: 3rem;">Product</h2>
        <div class="mt-3">
            <hr style="width: 80px; border: 3px solid #007bff; border-radius: 5px; margin: 0 auto;">
        </div>
    </div>
</div>
 <div class="container my-5">
    <div class="row justify-content-center">
        <!-- Left Column: Categories -->
        <div class="col-lg-3 divider">
            <div class="category-list">
                <h5>Categories</h5>
                <div class="category-item">Electronics</div>
                <div class="category-item">Furniture</div>
                <div class="category-item">Cars</div>
                <div class="category-item">Jewelry</div>
                <div class="category-item">Sports</div>
                <div class="category-item">Books</div>
                <div class="category-item">Other</div>
            </div>
        </div>

        <!-- Right Column: Auction Cards -->
        <div class="col-lg-8">
            <div class="row g-4 mt-2">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/300x200?text=Product+1" class="card-img-top" alt="Product 1">
                        <div class="card-body">
                            <h5 class="card-title">Product Name 1</h5>
                            <p class="card-text">Short description of the product being auctioned.</p>
                            <button class="btn btn-primary w-100">Place Bid</button>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/300x200?text=Product+2" class="card-img-top" alt="Product 2">
                        <div class="card-body">
                            <h5 class="card-title">Product Name 2</h5>
                            <p class="card-text">Short description of the product being auctioned.</p>
                            <button class="btn btn-primary w-100">Place Bid</button>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/300x200?text=Product+3" class="card-img-top" alt="Product 3">
                        <div class="card-body">
                            <h5 class="card-title">Product Name 3</h5>
                            <p class="card-text">Short description of the product being auctioned.</p>
                            <button class="btn btn-primary w-100">Place Bid</button>
                        </div>
                    </div>
                </div>
                <!-- Add more cards as needed -->
            </div>
            <div class="row g-4 mt-2">
               <!-- Card 1 -->
               <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/300x200?text=Product+1" class="card-img-top" alt="Product 1">
                        <div class="card-body">
                            <h5 class="card-title">Product Name 1</h5>
                            <p class="card-text">Short description of the product being auctioned.</p>
                            <button class="btn btn-primary w-100">Place Bid</button>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/300x200?text=Product+2" class="card-img-top" alt="Product 2">
                        <div class="card-body">
                            <h5 class="card-title">Product Name 2</h5>
                            <p class="card-text">Short description of the product being auctioned.</p>
                            <button class="btn btn-primary w-100">Place Bid</button>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/300x200?text=Product+3" class="card-img-top" alt="Product 3">
                        <div class="card-body">
                            <h5 class="card-title">Product Name 3</h5>
                            <p class="card-text">Short description of the product being auctioned.</p>
                            <button class="btn btn-primary w-100">Place Bid</button>
                        </div>
                    </div>
                </div>
                <!-- Add more cards as needed -->
            </div>
            <div class="row g-4 mt-2">
               <!-- Card 1 -->
               <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/300x200?text=Product+1" class="card-img-top" alt="Product 1">
                        <div class="card-body">
                            <h5 class="card-title">Product Name 1</h5>
                            <p class="card-text">Short description of the product being auctioned.</p>
                            <button class="btn btn-primary w-100">Place Bid</button>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/300x200?text=Product+2" class="card-img-top" alt="Product 2">
                        <div class="card-body">
                            <h5 class="card-title">Product Name 2</h5>
                            <p class="card-text">Short description of the product being auctioned.</p>
                            <button class="btn btn-primary w-100">Place Bid</button>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/300x200?text=Product+3" class="card-img-top" alt="Product 3">
                        <div class="card-body">
                            <h5 class="card-title">Product Name 3</h5>
                            <p class="card-text">Short description of the product being auctioned.</p>
                            <button class="btn btn-primary w-100">Place Bid</button>
                        </div>
                    </div>
                </div>
                <!-- Add more cards as needed -->
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="row justify-content-center mt-4">
    <div class="col-md-8 text-center">
        <h2 class="text-uppercase fw-bold text-primary product-title" style="letter-spacing: 3px; font-size: 3rem;">Contact</h2>
        <div class="mt-3">
            <hr style="width: 80px; border: 3px solid #007bff; border-radius: 5px; margin: 0 auto;">
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="p-4 shadow-lg rounded bg-light text-center">
                <h2 class="mb-4">Stay Connected</h2>
                <p class="mb-4 text-muted">Subscribe to our newsletter to get the latest updates and offers.</p>
                <form>
                    <div class="input-group">
                        <input 
                            type="email" 
                            class="form-control" 
                            placeholder="Enter your email address" 
                            required 
                        />
                        <button 
                            class="btn btn-primary" 
                            type="submit"
                        >
                            Subscribe
                        </button>
                    </div>
                </form>
                <small class="text-muted d-block mt-3">We respect your privacy. Unsubscribe anytime.</small>
            </div>
        </div>
    </div>
</div>

</div>


<footer class="bg-dark-transparent text-white py-4 mt-5">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-3 mb-3">
                <h5>About Us</h5>
                <p>Welcome to our online auction platform, where you can bid on a wide variety of items and find unique deals! Join the auction today and discover exciting opportunities.</p>
            </div>

            <!-- Quick Links Section -->
            <div class="col-md-3 mb-3">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Home</a></li>
                    <li><a href="#" class="text-white">How It Works</a></li>
                    <li><a href="#" class="text-white">Auctions</a></li>
                    <li><a href="#" class="text-white">Contact Us</a></li>
                    <li><a href="#" class="text-white">FAQs</a></li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div class="col-md-3 mb-3">
                <h5>Contact Us</h5>
                <p><strong>Email:</strong> support@auctionwebsite.com</p>
                <p><strong>Phone:</strong> +1 800-123-4567</p>
                <p><strong>Address:</strong> 123 Auction St, City, Country</p>
            </div>

            <!-- Social Media Section -->
            <div class="col-md-3 mb-3">
                <h5>Follow Us</h5>
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

        <!-- Footer Bottom Section -->
        <div class="row">
            <div class="col text-center mt-4">
                <p>&copy; 2024 Auction Website. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    // Function to check if element is in viewport
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return rect.top >= 0 && rect.bottom <= window.innerHeight;
    }

    // Add 'visible' class to elements when they come into view
    function handleScroll() {
        const elements = document.querySelectorAll('.fade-in');
        elements.forEach(function (element) {
            if (isInViewport(element)) {
                element.classList.add('visible');
            }
        });

        // For the product title specifically
        const productTitle = document.querySelector('.product-title');
        if (productTitle && isInViewport(productTitle)) {
            productTitle.classList.add('visible');
        }
    }


    // Run handleScroll function when the page is scrolled
    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Call initially in case items are already in view
});

</script>

<script>
    // ฟังก์ชันสำหรับตรวจสอบตำแหน่งของ element
    const aboutTitle = document.querySelector('.About-title');
    const cards = document.querySelectorAll('.card-item');

    const checkVisibility = () => {
        const aboutRect = aboutTitle.getBoundingClientRect();
        if (aboutRect.top >= 0 && aboutRect.bottom <= window.innerHeight) {
            aboutTitle.classList.add('visible');
        }

        // ตรวจสอบการแสดงการ์ด
        cards.forEach(card => {
            const cardRect = card.getBoundingClientRect();
            if (cardRect.top >= 0 && cardRect.bottom <= window.innerHeight) {
                card.classList.add('visible');
            }
        });
    };

    // เรียกใช้ฟังก์ชันเมื่อเลื่อน
    window.addEventListener('scroll', checkVisibility);
    // เรียกใช้ฟังก์ชันทันทีเมื่อโหลดหน้า
    checkVisibility();
</script>



<script src="langIndex.js"></script>
<!-- <script src="slideIndex.js"></script> -->
</body>
</html>