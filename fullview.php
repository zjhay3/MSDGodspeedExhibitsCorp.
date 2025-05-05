<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.png" type="image/png">
    <title>Image View</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'accent-gold': '#f0a500',
                        'gold': '#f0a500',
                        'dark-gold': '#d18e00',
                        'forest-green': 'rgba(1, 29, 2, 0.85)',
                        'button-green': 'rgba(0, 131, 7, 0.3)',
                        'button-hover': 'rgba(0, 98, 0, 0.9)'
                    },
                    fontFamily: {
                        'swiss': ['Archivo Black', 'sans-serif'],
                        swiss: ['Swiss721', 'Georgia', 'serif'],
                    }
                }
            }
        }
    </script>
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Georgia:wght@400;500;700&display=swap'); */
        @import url('https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap');
        
        body {
            position: relative; /* Make body a stacking context */
            z-index: 1; /* Put body above ::before */
            font-family: 'Swiss721', Georgia, serif;
            background-image: url("images/faqBG.png");
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            background-attachment: fixed;
        }

        body::before {
            content: "";
            position: fixed; /* Cover viewport reliably */
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: -1; /* Send behind all other content */
            pointer-events: none; /* Prevent it from interfering with clicks */
        }             
        .footer {
            background-image: url("images/footer-background.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Archivo Black', sans-serif;
            z-index: 0;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen m-0 p-0 overflow-x-hidden text-white font-swiss">
    <!-- Back Button -->
    <button id="backButton" class="fixed top-5 right-5 font-archivo-narrow py-3 px-4 bg-white bg-opacity-10 backdrop-blur text-white border-2 border-white rounded-lg cursor-pointer text-base flex items-center gap-2 transition-all duration-300 hover:bg-white hover:bg-opacity-20 hover:scale-105 shadow-md z-50">
        <span class="text-xl font-bold">&#8592;</span> <!-- Left arrow -->
    </button>
    
    <!-- Main Content -->
    <div class="flex flex-col items-center justify-center flex-1 px-5 py-10 text-center">
        <img id="fullImage" src="images/your-image.jpg" alt="Full View" class="max-w-[90%] max-h-[80vh] rounded-lg shadow-lg">
        <p id="imageText" class="mt-4 text-lg max-w-[80%] text-center"></p>
    </div>
    
    <!-- Footer -->
    <footer class="relative bg-cover bg-center bg-no-repeat py-0.5 sm:py-3 text-white overflow-hidden mt-auto w-full footer font-archivo-black">
    <!-- Dark green overlay -->
    <div class="absolute top-0 left-0 w-full h-full bg-[#011D02D9] z-0"></div>

    <div class="relative z-10 flex flex-col md:flex-row justify-between items-stretch max-w-6xl mx-auto px-5 md:px-8">
        <!-- Footer Left - Logo -->
        <div class="flex-none w-full md:w-1/5 flex items-center justify-center md:justify-start pt-1 sm:pt-5">
            <a href="index.php">
                <img src="images/campaign-monitor-logo.png" alt="MSD Godspeed Logo" class="max-w-[120px] sm:max-w-[180px] h-auto">
            </a>
        </div>

            <!-- Footer Center - Company Info -->
            <div class="flex-1 flex flex-col items-center md:items-start text-center md:text-left pl-0 md:pl-5 mt-2 sm:mt-8 text-xs sm:text-base leading-tight">
                <h3 class="text-gold font-archivo-black text-2xl mb-3">Main Office</h3>
                <a href="https://maps.app.goo.gl/GQJoP1aYDHUgPhux8" target="_blank" class="no-underline text-white hover:text-blue-500 hover:underline text-base">
                    #324 Navy Road Veterans Village,<br> Barangay, Holy Spirit, Diliman,<br>Quezon City, Philippines 1127
                </a>
                <br>
                <div class="flex items-center gap-2 mb-1 mt-1 sm:mt-4">
                    <div class="w-[30px] h-[30px] sm:w-[50px] sm:h-[50px]">
                        <img src="images/phone.png" alt="Phone" class="w-full h-full object-contain">
                    </div>
                    <div class="flex flex-col text-xs sm:text-sm">
                        <span class="font-bold text-gold">Phone:</span> (02) 8 570-8069<br>
                        <span class="font-bold text-gold">Mobile:</span> 0915-9785683
                    </div>
                </div>
            
                <div class="flex items-center gap-2 mb-1 mt-1 sm:mt-4">
                    <div class="w-[30px] h-[30px] sm:w-[50px] sm:h-[50px]">
                        <img src="images/email.png" alt="Email" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <a href="mailto:wdcampos@msdgodspeedexhibits.com" class="text-white no-underline hover:text-gold">wdcampos@msdgodspeedexhibits.com</a>
                    </div>
                </div>
            
                <div class="flex gap-2 mt-2 sm:mt-5">
                    <a href="https://www.facebook.com/MSDGospeedExhibitsCorp" class="w-[30px] h-[30px] sm:w-[50px] sm:h-[50px]" bg-transparent rounded-full flex items-center justify-center transition-transform duration-300 hover:scale-110">
                        <img src="images/facebook.png" alt="Facebook" class="w-full h-full object-contain">
                    </a>
                    <a href="https://www.instagram.com/msdgodspeed2022/" class="w-[30px] h-[30px] sm:w-[50px] sm:h-[50px]" bg-transparent rounded-full flex items-center justify-center transition-transform duration-300 hover:scale-110">
                        <img src="images/instagram.png" alt="Instagram" class="w-full h-full object-contain">
                    </a>
                </div>      
            </div>
            
            <!-- Footer Right - Navigation Links -->
            <div class="flex-none w-full md:w-1/3 flex justify-center md:justify-start items-center pt-1 mt-2 sm:mt-8 text-xs sm:text-sm">
                <ul class="grid grid-cols-2 gap-3 gap-x-8 text-center md:text-left list-none p-0 m-0">
                    <li><a href="photo-gallery.php" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">Galleries</a></li>
                    <li><a href="contact.php" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">Contact Us</a></li>
                    <li><a href="docs/company-profile.pdf" target="_blank" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">Catalogue</a></li>
                    <li><a href="docs/pricelist.pdf" target="_blank" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">Price Lists</a></li>
                    <li><a href="index.php#about" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">About Us</a></li>
                    <li><a href="more-product.php" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">Products</a></li>
                    <li><a href="index.php#services" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">Services</a></li>
                    <li><a href="helpcenter.php" target="_blank" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">Help Center</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Copyright Text -->
        <div class="relative z-10 text-center mt-2 pt-2 sm:pt-3 border-t border-white/10 text-xs sm:text-sm">
            <p class="text-sm">&copy; 2025 MSD Godspeed Exhibits - All Rights Reserved | <a href="terms.php" target="_blank" class="text-white no-underline hover:text-gold">Terms & Policies</a></p>
        </div>
    </footer>

    <script>
// Get image name and text from URL
const urlParams = new URLSearchParams(window.location.search);
const imageName = urlParams.get('image');
let imageText = urlParams.get('text'); // Get the text from URL

// Set image source
if (imageName) {
    document.getElementById('fullImage').src = "images/" + imageName;
} else {
    document.getElementById('fullImage').alt = "No image found.";
}

// Ensure proper decoding of new lines and special characters
if (imageText) {
    imageText = decodeURIComponent(imageText).replace(/\n/g, "<br>").replace(/%0A/g, "<br>"); 
    document.getElementById('imageText').innerHTML = imageText; // Use innerHTML to support <br>
} else {
    document.getElementById('imageText').innerText = "No description available.";
}

// Improved back button behavior - use browser history instead of page redirect
document.getElementById("backButton").addEventListener("click", function(e) {
    e.preventDefault();
    window.history.back(); // Use browser's native back functionality
});

// Only reload the homepage if necessary (coming from external site)
window.addEventListener("pageshow", function(event) {
    // Only reload if returning from an external site, not from this gallery
    const referrer = document.referrer;
    if (event.persisted && !referrer.includes(window.location.hostname)) {
        window.location.reload();
    }
});
    </script>
</body>
</html>