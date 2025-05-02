<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.png" type="image/png">
    <title>Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#004609',
                        'primary-dark': '#003002',
                        'primary-darker': '#002501',
                        'primary-light': '#044e06',
                        'primary-lighter': '#055c08',
                        'primary-lightest': '#066308', 
                        'gold': '#f0a500',
                    },
                    fontFamily: {
                        'swiss': ['Archivo Black', 'sans-serif'],
                        'archivo': ['Archivo', 'sans-serif'],
                        'narrow': ['Archivo Narrow', 'sans-serif'],
                        'lora': ['Lora', 'serif']
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap');
        body {
            overflow-x: hidden;
        }
        .loading-screen {
            position: fixed !important;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(38, 105, 60, 0.85) !important;
            display: flex !important;
            align-items: center;
            justify-content: center;
            z-index: 9999 !important;
            opacity: 1 !important;
            transition: opacity 0.5s ease-out;
        }
        
        .loading-screen.hide {
            opacity: 0 !important;
            visibility: hidden !important;
            display: none !important;
            transition: opacity 3.5s ease-out;
        }
        
        .loading-video {
            width: 450px;
            height: 450px;
            object-fit: cover;
            z-index: 9999;
        }
        .footer {
            background-image: url("images/footer-background.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }
        
        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #011D02D9;  /* Dark Green Overlay */
            z-index: 2; /* Behind the content */
        }
        .font-archivo {
          font-family: 'Archivo', sans-serif;
        }

        .font-archivo-black {
          font-family: 'Archivo Black', sans-serif;
        }

        .font-archivo-narrow {
          font-family: 'Archivo Narrow', sans-serif;
        }
        
        /* Custom styles for scrollbars */
        .sidebar-scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        
        .sidebar-scrollbar::-webkit-scrollbar-track {
            background: #002501;
        }
        
        .sidebar-scrollbar::-webkit-scrollbar-thumb {
            background: #044e06;
            border-radius: 4px;
        }
        
        .sidebar-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #066308;
        }
        
        .submenu-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .submenu-scrollbar::-webkit-scrollbar-track {
            background: #002501;
        }
        
        .submenu-scrollbar::-webkit-scrollbar-thumb {
            background: #044e06;
            border-radius: 3px;
        }
        
        .submenu-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #066308;
        }
        /* Add these styles to your existing style section */

        @media (max-width: 767px) {
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
            border-bottom: 1px solid #066308;
            height: auto;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
        }
        
        #sidebar #sidebarContent {
            max-height: calc(100vh - 80px);
            overflow-y: auto;
        }
        
        #sidebarMenu li {
            margin: 0;
            padding: 0;
        }
        
        #sidebarMenu li a {
            padding: 15px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        #eventsSubmenu {
            position: relative;
            width: 90%;
            margin-left: 30px;
            border-radius: 0;
            max-height: none;
            box-shadow: none;
        }
        
        #eventsSubmenu.active {
            display: block;
        }
        
        /* Mobile header adjustments */
        header {
            left: 0 !important;
            width: 100% !important;
            padding-left: 70px !important;
        }
        
        header h1 {
            font-size: 22px !important;
        }
    }

        /* Gallery image responsive adjustments */
        @media (max-width: 640px) {
        .gallery-row {
            padding: 4px !important;
        }
        
        .gallery-row img {
            transition: transform 0.2s ease !important;
        }
        
        /* Reduce spaces in gallery container */
        .flex-1.p-8 {
            padding: 0.5rem !important;
        }
    }

        @media (max-width: 480px) {
        .gallery-row {
            padding: 2px !important;
            gap: 4px !important;
        }
        
        /* Completely remove gaps between images for very small screens */
        .gallery-row img {
            margin: 0 2px;
            border-radius: 2px !important;
        }
    }

        * Make sure footer is responsive */
        @media (max-width: 640px) {
        footer .flex-row {
            flex-direction: column !important;
        }
        
        footer div {
            width: 100% !important;
            text-align: center !important;
        }
    }
    </style>
</head>
<body class="overflow-x-hidden bg-primary text-white leading-relaxed">
    
    <div class="loading-screen">
        <img src="images/pagereload.gif" alt="Loading..." class="loading-video" />
    </div>

    <div class="flex flex-col min-h-screen">
        <!-- Collapsible Sidebar - starts collapsed by default -->
        <div id="sidebar" class="fixed left-0 top-0 h-screen bg-primary-dark z-50 transition-all duration-300 w-20" data-collapsed="true">
            <div class="flex justify-between items-center p-8 border-b border-primary-light flex-shrink-0">
                <h3 class="text-2xl hidden font-archivo-black" id="sidebarTitle">Categories</h3>
                <button id="toggleSidebar" class="text-white bg-transparent border-none text-2xl cursor-pointer">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto sidebar-scrollbar py-5" id="sidebarContent">
                <ul class="list-none" id="sidebarMenu">
            <li class="mb-3 whitespace-nowrap">
                <a href="#all" class="flex items-center gap-4 px-[20px] py-[10px] text-white no-underline transition-all duration-300 hover:bg-primary-light">
                    <i class="fas fa-images text-2xl w-8 h-8 flex items-center justify-center"></i> 
                    <span class="hidden font-normal font-archivo-narrow text-[16px]">All Photos</span>
                </a>
            </li>
            <li class="mb-3 whitespace-nowrap">
                <a href="#events" class="flex items-center gap-4 px-[20px] py-[10px] text-white no-underline transition-all duration-300 hover:bg-primary-light">
                    <i class="fas fa-calendar-alt text-2xl w-8 h-8 flex items-center justify-center"></i> 
                    <span class="hidden font-normal font-archivo-narrow text-[16px]">Events</span>
                </a>
            </li>
            <li class="mb-3 whitespace-nowrap">
                <a href="#collateral" class="flex items-center gap-4 px-[20px] py-[10px] text-white no-underline transition-all duration-300 hover:bg-primary-light">
                    <i class="fas fa-folder text-2xl w-8 h-8 flex items-center justify-center"></i> 
                    <span class="hidden font-normal font-archivo-narrow text-[16px]">Collateral</span>
                </a>
            </li>
            <li class="mb-3 whitespace-nowrap">
                <a href="#upgraded" class="flex items-center gap-4 px-[20px] py-[10px] text-white no-underline transition-all duration-300 hover:bg-primary-light">
                    <i class="fas fa-arrow-up text-2xl w-8 h-8 flex items-center justify-center"></i> 
                    <span class="hidden font-normal font-archivo-narrow text-[16px]">Upgraded</span>
                </a>
            </li>
            <li class="mb-3 whitespace-nowrap">
                <a href="#standard" class="flex items-center gap-4 px-[20px] py-[10px] text-white no-underline transition-all duration-300 hover:bg-primary-light">
                    <i class="fas fa-check-circle text-2xl w-8 h-8 flex items-center justify-center"></i> 
                    <span class="hidden font-normal font-archivo-narrow text-[16px]">Standard</span>
                </a>
            </li>
            <li class="mb-3 whitespace-nowrap">
                <a href="#special" class="flex items-center gap-4 px-[20px] py-[10px] text-white no-underline transition-all duration-300 hover:bg-primary-light">
                    <i class="fas fa-star text-2xl w-8 h-8 flex items-center justify-center"></i> 
                    <span class="hidden font-normal font-archivo-narrow text-[16px]">Special</span>
                </a>
            </li>
        </ul>
    </div>
    </div>

<!-- Floating Submenu Panel for Events -->
    <div id="eventsSubmenu" class="fixed top-0 left-20 w-56 max-h-96 bg-primary-dark shadow-lg rounded-r-lg hidden flex-col z-40 transition-all duration-300 submenu-scrollbar font-archivo-narrow overflow-y-auto">
        <ul class="list-none py-4 m-0 w-full">
            <li class="m-0 p-0 w-full">
                <a href="#inside-racing" class="block py-3 px-5 text-white no-underline transition-all duration-300 hover:bg-primary-lighter hover:pl-6 border-l-4 border-transparent hover:border-gold whitespace-nowrap text-base">Inside Racing</a>
            </li>
            <li class="m-0 p-0 w-full">
                <a href="#worldbex-ingress" class="block py-3 px-5 text-white no-underline transition-all duration-300 hover:bg-primary-lighter hover:pl-6 border-l-4 border-transparent hover:border-gold whitespace-nowrap text-base">Worldbex Ingress</a>
            </li>
            <li class="m-0 p-0 w-full">
                <a href="#uap-conex" class="block py-3 px-5 text-white no-underline transition-all duration-300 hover:bg-primary-lighter hover:pl-6 border-l-4 border-transparent hover:border-gold whitespace-nowrap text-base">UAP Conex</a>
            </li>
        </ul>
    </div>

<!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-h-0 ml-20 transition-all duration-300 max-w-full overflow-hidden" id="mainContent">
    <header class="right-0 left-20 top-0 fixed z-40 flex justify-between items-center p-5 bg-primary-dark shadow-md h-20 transition-all duration-300">
        <div class="flex items-center">
            <h1 class="m-0 whitespace-nowrap overflow-hidden text-ellipsis transition-all duration-300 pl-5 text-[32px] font-archivo-black">Photo Gallery</h1>
        </div>
    </header>

    <!-- Gallery Content -->
    <div class="flex-1 p-8 overflow-y-auto flex flex-col mt-20 pt-5">
        <div class="relative w-full flex flex-col gap-8 mb-8 overflow-x-hidden">
            <div class="gallery-row flex gap-12 p-6 whitespace-nowrap w-max transform transition-transform duration-100 row-1"></div>
            <div class="gallery-row flex gap-12 p-6 whitespace-nowrap w-max transform transition-transform duration-100 row-2"></div>
            <div class="gallery-row flex gap-12 p-6 whitespace-nowrap w-max transform transition-transform duration-100 row-3"></div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="relative bg-cover bg-center bg-no-repeat py-0.5 sm:py-3 text-white overflow-hidden mt-auto w-full font-archivo-black">
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

        </div>
    </div>

    <a href="contact.php" class="fixed bottom-8 right-8 bg-gold text-white font-archivo-black font-bold py-3 px-5 rounded-full shadow-md transition-all duration-300 hover:bg-[#d18e00] hover:scale-110 z-50 flex items-center gap-3">Contact Us</a>
    
    <button id="backButton" class="fixed top-5 right-5 font-archivo-narrow py-3 px-4 bg-white bg-opacity-10 backdrop-blur text-white border-none rounded-lg cursor-pointer text-base flex items-center gap-2 transition-all duration-300 hover:bg-white hover:bg-opacity-20 hover:scale-105 shadow-md z-50">
        <span class="text-lg">&#8592;</span> <!-- Left arrow -->
    </button>

<script>
    window.addEventListener("load", () => {
    const loadingScreen = document.querySelector(".loading-screen");
    setTimeout(() => {
        loadingScreen.classList.add("hide");
    }, 2750);
});

// Function to preload images
function preloadImage(url) {
    const img = new Image();
    img.src = url;
    return img;
}

document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById('sidebar');
    const sidebarTitle = document.getElementById('sidebarTitle');
    const sidebarContent = document.getElementById('sidebarContent');
    const sidebarMenu = document.getElementById('sidebarMenu');
    const toggleSidebar = document.getElementById('toggleSidebar');
    const mainContent = document.getElementById('mainContent');
    const eventsSubmenu = document.getElementById('eventsSubmenu');

    // Initialize sidebar state from data attribute
    let sidebarCollapsed = sidebar.getAttribute('data-collapsed') === 'true';
    
// Function to update sidebar state visually
function updateSidebarState() {
    const sidebar = document.getElementById('sidebar');
    const sidebarTitle = document.getElementById('sidebarTitle');
    const mainContent = document.getElementById('mainContent');
    const sidebarMenu = document.getElementById('sidebarMenu');
    const sidebarCollapsed = sidebar.getAttribute('data-collapsed') === 'true';
    
    // Check if we're in mobile mode
    const isMobile = sidebar.hasAttribute('data-mobile');
    
    // Only apply desktop behavior if not in mobile mode
    if (!isMobile) {
        if (sidebarCollapsed) {
            sidebar.classList.remove('w-64');
            sidebar.classList.add('w-20');
            sidebarTitle.classList.add('hidden');
            mainContent.classList.remove('ml-64');
            mainContent.classList.add('ml-20');
            
            // Hide text spans when sidebar is collapsed on desktop
            const menuSpans = sidebarMenu.querySelectorAll('span');
            menuSpans.forEach(span => span.classList.add('hidden'));
        } else {
            sidebar.classList.add('w-64');
            sidebar.classList.remove('w-20');
            sidebarTitle.classList.remove('hidden');
            mainContent.classList.add('ml-64');
            mainContent.classList.remove('ml-20');
            
            // Show all text spans in the sidebar menu
            const menuSpans = sidebarMenu.querySelectorAll('span');
            menuSpans.forEach(span => span.classList.remove('hidden'));
        }
        
        // Update the data attribute
        sidebar.setAttribute('data-collapsed', sidebarCollapsed);
        
        // Update header width
        updateHeaderPosition();
    }
}
    

// Setup sidebar behavior
sidebar.addEventListener('mouseenter', function() {
    // Only apply hover behavior if we're in desktop mode and sidebar is collapsed
    if (!sidebar.hasAttribute('data-mobile') && sidebar.getAttribute('data-collapsed') === 'true') {
        sidebar.setAttribute('data-collapsed', 'false');
        updateSidebarState();
    }
});

sidebar.addEventListener('mouseleave', function() {
    // Only apply hover behavior if we're in desktop mode and submenu isn't active
    if (!sidebar.hasAttribute('data-mobile') && !eventsSubmenu.classList.contains('active')) {
        sidebar.setAttribute('data-collapsed', 'true');
        updateSidebarState();
    }
});

    // Toggle sidebar on button click
    toggleSidebar.addEventListener('click', function() {
        sidebarCollapsed = !sidebarCollapsed;
        updateSidebarState();
    });

// Header adjustment for sidebar state changes
function updateHeaderPosition() {
    const header = document.querySelector('header');
    const sidebar = document.getElementById('sidebar');
    const isMobile = sidebar.hasAttribute('data-mobile');
    
    if (isMobile) {
        // Mobile header adjustment
        header.classList.remove('left-64', 'left-20', 'w-[calc(100%-16rem)]', 'w-[calc(100%-5rem)]');
        header.classList.add('left-0', 'w-full', 'pl-16');
    } else {
        // Desktop header adjustment
        const sidebarCollapsed = sidebar.getAttribute('data-collapsed') === 'true';
        
        if (sidebarCollapsed) {
            header.classList.remove('left-64', 'w-[calc(100%-16rem)]');
            header.classList.add('left-20', 'w-[calc(100%-5rem)]');
        } else {
            header.classList.remove('left-20', 'w-[calc(100%-5rem)]');
            header.classList.add('left-64', 'w-[calc(100%-16rem)]');
        }
        
        // Remove mobile classes if they exist
        header.classList.remove('left-0', 'w-full', 'pl-16');
    }
    
    // Add transition for smooth movement
    header.style.transition = 'left 0.3s ease, width 0.3s ease';
}

    // Call it once initially to set the correct position
    updateHeaderPosition();

    // Make sure header is positioned correctly on window resize
    window.addEventListener('resize', updateHeaderPosition);


// Setup events menu item click handler
const eventsMenuItem = document.querySelector('a[href="#events"]');
eventsMenuItem.addEventListener('click', function(e) {
    e.preventDefault();
    
    // Set this item as active
    document.querySelectorAll('#sidebarMenu li a').forEach(a => 
        a.classList.remove('bg-primary-light'));
    this.classList.add('bg-primary-light');
    
    // Toggle the submenu
    toggleSubmenuPanel();
    
    // For mobile mode, make sure the sidebar stays open while viewing submenu
    if (sidebar.hasAttribute('data-mobile') && 
        !sidebar.classList.contains('max-h-[80vh]')) {
        sidebar.classList.remove('max-h-0');
        sidebar.classList.add('max-h-[80vh]', 'bg-opacity-95', 'shadow-lg');
    }
});
    
// Function to toggle submenu panel for Events
function toggleSubmenuPanel() {
    const eventsSubmenu = document.getElementById('eventsSubmenu');
    const eventsMenuItem = document.querySelector('a[href="#events"]');
    const isVisible = eventsSubmenu.classList.contains('active');
    
    if (isVisible) {
        eventsSubmenu.classList.remove('active');
        eventsSubmenu.classList.add('hidden');
        eventsSubmenu.classList.remove('flex');
    } else {
        // Get the position of the Events menu item
        const eventsMenuRect = eventsMenuItem.getBoundingClientRect();
        
        // For mobile view, position differently
        if (window.innerWidth < 768 || sidebar.hasAttribute('data-mobile')) {
            // Always position the submenu directly below the Events menu item
            const topPosition = eventsMenuRect.bottom;
            eventsSubmenu.style.top = `${topPosition}px`;
            eventsSubmenu.style.left = '0';
            eventsSubmenu.style.marginLeft = '50px'; // Adjust to align with menu
            eventsSubmenu.style.width = 'calc(100% - 70px)';
            eventsSubmenu.style.zIndex = '200';
        } else {
            // Desktop positioning - position to the right of sidebar
            const topPosition = eventsMenuRect.top;
            eventsSubmenu.style.top = `${topPosition}px`;
            const sidebarWidth = sidebar.getAttribute('data-collapsed') === 'true' ? 80 : 256; // 5rem or 16rem in pixels
            eventsSubmenu.style.left = `${sidebarWidth}px`;
            eventsSubmenu.style.marginLeft = '0';
            eventsSubmenu.style.width = '14rem';
        }
        
        // Adjust submenu height based on viewport
        const viewportHeight = window.innerHeight;
        const availableHeight = viewportHeight - eventsMenuRect.bottom - 20; // 20px buffer
        eventsSubmenu.style.maxHeight = `${Math.min(350, availableHeight)}px`;
        
        eventsSubmenu.classList.add('active');
        eventsSubmenu.classList.remove('hidden');
        eventsSubmenu.classList.add('flex');
    }
}

    
    // Close submenu when clicking outside
    document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('sidebar');
    const eventsMenuItem = document.querySelector('a[href="#events"]');
    const eventsSubmenu = document.getElementById('eventsSubmenu');
    
    if (!eventsMenuItem.contains(e.target) && 
        !eventsSubmenu.contains(e.target) && 
        eventsSubmenu.classList.contains('active')) {
        eventsSubmenu.classList.remove('active');
        eventsSubmenu.classList.add('hidden');
        eventsSubmenu.classList.remove('flex');
    }
    
    // Also close mobile sidebar if clicking outside
    if (sidebar.hasAttribute('data-mobile') && 
        !sidebar.contains(e.target) &&
        !e.target.closest('#toggleSidebar') &&
        sidebar.classList.contains('max-h-[80vh]')) {
        sidebar.classList.remove('max-h-[80vh]', 'bg-opacity-95', 'shadow-lg');
        sidebar.classList.add('max-h-0');
        document.body.style.overflow = '';
    }
});
    
    // Add scroll event listener to sidebar content
    sidebarContent.addEventListener('scroll', function() {
        if (eventsSubmenu.classList.contains('active')) {
            updateSubmenuPosition();
        }
    });
    
 // Setup submenu item click handlers
const submenuItems = eventsSubmenu.querySelectorAll('li a');
submenuItems.forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Close the submenu after selecting an item
        eventsSubmenu.classList.remove('active');
        eventsSubmenu.classList.add('hidden');
        eventsSubmenu.classList.remove('flex');
        
        // Set the events menu item as active
        document.querySelectorAll('#sidebarMenu li a').forEach(a => 
            a.classList.remove('bg-primary-light'));
        eventsMenuItem.classList.add('bg-primary-light');

        // Close sidebar for both desktop and mobile modes
        if (!sidebar.hasAttribute('data-mobile')) {
            // Desktop mode - collapse sidebar
            sidebar.setAttribute('data-collapsed', 'true');
            updateSidebarState();
        } else {
            // Mobile mode - close dropdown menu 
            sidebar.classList.remove('max-h-[80vh]', 'bg-opacity-95', 'shadow-lg');
            sidebar.classList.add('max-h-0');
            document.body.style.overflow = '';
        }
        
        // Filter gallery based on the selected event
        const category = this.getAttribute('href').substring(1);
        filterGallery(category);
    });
});

// General menu items
const menuItems = document.querySelectorAll('#sidebarMenu li a:not([href="#events"])');
menuItems.forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Remove active class from all menu items
        document.querySelectorAll('#sidebarMenu li a').forEach(a => 
            a.classList.remove('bg-primary-light'));
        
        // Add active class to clicked item
        this.classList.add('bg-primary-light');

        // Always force close the sidebar when a category is clicked (for both desktop and mobile)
        if (!sidebar.hasAttribute('data-mobile')) {
            // Desktop mode - collapse sidebar
            sidebar.setAttribute('data-collapsed', 'true');
            updateSidebarState();
        } else {
            // Mobile mode - close dropdown menu
            sidebar.classList.remove('max-h-[80vh]', 'bg-opacity-95', 'shadow-lg');
            sidebar.classList.add('max-h-0');
            document.body.style.overflow = '';
        }

        // Force close the events submenu if it's open
        if (eventsSubmenu.classList.contains('active')) {
            eventsSubmenu.classList.remove('active');
            eventsSubmenu.classList.add('hidden');
            eventsSubmenu.classList.remove('flex');
        }

        // Get category from href and filter the gallery
        const category = this.getAttribute('href').substring(1); // Remove '#' from href
        filterGallery(category); // Call function to filter gallery based on category
    });
});

// Modified function to update submenu position
function updateSubmenuPosition() {
    const eventsSubmenu = document.getElementById('eventsSubmenu');
    const eventsMenuItem = document.querySelector('a[href="#events"]');

    if (!eventsSubmenu || !eventsMenuItem) return;

    if (eventsSubmenu.classList.contains('active')) {
        const eventsMenuRect = eventsMenuItem.getBoundingClientRect();
        const scrollY = window.scrollY || window.pageYOffset;

        // Hide submenu if menu item is off-screen
        if (eventsMenuRect.bottom < 0 || eventsMenuRect.top > window.innerHeight) {
            eventsSubmenu.classList.remove('active', 'flex');
            eventsSubmenu.classList.add('hidden');
            return;
        }

        if (window.innerWidth < 768 || sidebar.hasAttribute('data-mobile')) {
            // 📱 Mobile: position submenu BELOW #events (relative to the page)
            const topPosition = eventsMenuRect.bottom + scrollY;
            eventsSubmenu.style.position = 'absolute';
            eventsSubmenu.style.top = `${topPosition}px`;
            eventsSubmenu.style.left = '0';
            eventsSubmenu.style.marginLeft = '50px';
            eventsSubmenu.style.width = 'calc(100% - 70px)';
            eventsSubmenu.style.zIndex = '200';
        } else {
            // 🖥️ Desktop: position submenu aligned horizontally with sidebar
            const topPosition = eventsMenuRect.top + scrollY;
            const sidebarWidth = sidebar.getAttribute('data-collapsed') === 'true' ? 80 : 256;
            eventsSubmenu.style.position = 'absolute';
            eventsSubmenu.style.top = `${topPosition}px`;
            eventsSubmenu.style.left = `${sidebarWidth}px`;
            eventsSubmenu.style.marginLeft = '0';
            eventsSubmenu.style.width = '14rem';
        }

        // Limit submenu height to available viewport space
        const viewportHeight = window.innerHeight;
        const availableHeight = viewportHeight - eventsMenuRect.bottom - 20;
        eventsSubmenu.style.maxHeight = `${Math.min(350, availableHeight)}px`;
    }
}

    // Add event listener for window resize to keep submenu aligned
    window.addEventListener('resize', updateSubmenuPosition);

    const imageCounts = {
        "collateral": 968,
        "special": 165,
        "standard": 125,
        "upgraded": 321,
        "inside-racing": 109,
        "uap-conex": 264,
        "worldbex-ingress": 177
    };

    function generateImagePaths(category, count) {
        const paths = [];
        for (let i = 1; i <= count; i++) {
            paths.push(`${category}/${category} (${i}).jpg`);
        }
        return paths;
    }

    const categoryImages = {
        "collateral": generateImagePaths("collateral", imageCounts.collateral),
        "special": generateImagePaths("special", imageCounts.special),
        "standard": generateImagePaths("standard", imageCounts.standard),
        "upgraded": generateImagePaths("upgraded", imageCounts.upgraded),
        "inside-racing": generateImagePaths("inside-racing", imageCounts["inside-racing"]),
        "uap-conex": generateImagePaths("uap-conex", imageCounts["uap-conex"]),
        "worldbex-ingress": generateImagePaths("worldbex-ingress", imageCounts["worldbex-ingress"])
    };

    const allImages = [
        ...categoryImages.collateral,
        ...categoryImages.special,
        ...categoryImages.standard,
        ...categoryImages.upgraded,
        ...categoryImages["inside-racing"],
        ...categoryImages["uap-conex"],
        ...categoryImages["worldbex-ingress"]
    ];

    const galleryRows = document.querySelectorAll(".gallery-row");
    setupGallery('all');

    function setupGallery(category) {
        // Show loading indicator or some visual feedback
        galleryRows.forEach(row => {
            row.classList.add('opacity-50');
        });
        
        // Set the gallery title based on the category
        const galleryTitle = document.querySelector("header h1");
        if (galleryTitle) {
            if (category === 'all') {
                galleryTitle.textContent = "Photo Gallery";
            } else {
                // Format the category name for display
                const formattedCategory = category.replace(/-/g, ' ')
                    .split(' ')
                    .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                    .join(' ');
                galleryTitle.textContent = `${formattedCategory} Gallery`;
            }
        }

        const imagesToUse = category === 'all'
            ? [...allImages].sort(() => 0.5 - Math.random()).slice(0, 75)
            : [...categoryImages[category]].sort(() => 0.5 - Math.random()).slice(0, 50);

        if (imagesToUse.length === 0) return;

        galleryRows.forEach((row, index) => {
            row.innerHTML = '';
            row.style.transform = '';

            const gapSize = 50;
            let selectedImages = imagesToUse.filter((_, i) => i % galleryRows.length === index);
            if (selectedImages.length < 3) selectedImages = [...selectedImages, ...selectedImages];

            let baseImagesHTML = '';
            selectedImages.forEach(img => {
                baseImagesHTML += `<img src="images/${img}" alt="Gallery Image" data-fullsize="images/${img}" class="w-auto h-64 object-cover rounded-lg cursor-pointer transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:z-10 hover:brightness-110 backface-visibility-hidden">`;
            });

            row.innerHTML = baseImagesHTML.repeat(Math.max(5, Math.ceil(30 / selectedImages.length)));
            row.classList.remove('opacity-50');

            setTimeout(() => {
                const imageElements = row.querySelectorAll('img');
                if (imageElements.length === 0) return;

                row.style.columnGap = `${gapSize}px`;

                let singleSetWidth = 0;
                for (let i = 0; i < selectedImages.length; i++) {
                    if (imageElements[i]) {
                        singleSetWidth += imageElements[i].offsetWidth;
                        if (i < selectedImages.length - 1) {
                            singleSetWidth += gapSize;
                        }
                    }
                }

                const goingRight = index % 2 === 0;
                let currentPosition = goingRight ? 0 : -singleSetWidth;
                row.style.transform = `translateX(${currentPosition}px)`;

                const speed = goingRight ? 0.9 : -0.9;
                let isPaused = false;
                let lastFrameTime = 0;

// Update the animateRow function to use the data-speed attribute
function animateRow(timestamp) {
    if (timestamp - lastFrameTime < 16) {
        requestAnimationFrame(animateRow);
        return;
    }

    lastFrameTime = timestamp;
    if (!isPaused) {
        const baseSpeed = parseFloat(row.getAttribute('data-speed') || '0.9');
        const speed = goingRight ? baseSpeed : -baseSpeed;
        
        currentPosition += speed;
        row.style.transform = `translateX(${currentPosition}px)`;

        if (goingRight && currentPosition >= 0) {
            row.style.transition = 'none';
            currentPosition = -singleSetWidth;
            row.style.transform = `translateX(${currentPosition}px)`;
            row.offsetHeight;
            row.style.transition = 'transform 20ms linear';
        } else if (!goingRight && currentPosition <= -2 * singleSetWidth) {
            row.style.transition = 'none';
            currentPosition = -singleSetWidth;
            row.style.transform = `translateX(${currentPosition}px)`;
            row.offsetHeight;
            row.style.transition = 'transform 20ms linear';
        }
    }

    requestAnimationFrame(animateRow);
}

                row.style.transition = 'transform 20ms linear';
                requestAnimationFrame(animateRow);

                imageElements.forEach(img => {
                    // Preload images on hover for faster lightbox display
                    img.addEventListener("mouseenter", () => {
                        isPaused = true;
                        img.style.transform = "scale(1.05)";
                        img.style.transition = "transform 0.3s ease";
                        img.style.zIndex = "5";
                        
                        // Preload the full-size image
                        const fullsizeSrc = img.getAttribute('data-fullsize');
                        preloadImage(fullsizeSrc);
                    });

                    img.addEventListener("mouseleave", () => {
                        isPaused = false;
                        img.style.transform = "scale(1)";
                        img.style.zIndex = "1";
                    });

                    img.addEventListener("click", () => {
                        const fullsizeSrc = img.getAttribute('data-fullsize');
                        openLightbox(fullsizeSrc);
                    });
                });

                row.addEventListener("mouseenter", () => {
                    isPaused = true;
                });

                row.addEventListener("mouseleave", () => {
                    isPaused = false;
                    imageElements.forEach(img => {
                        img.style.transform = "scale(1)";
                        img.style.zIndex = "1";
                    });
                });
            }, 300);
        });
    }

    function openLightbox(imageSrc) {
        // Create loading overlay first
        const loadingOverlay = document.createElement('div');
        loadingOverlay.classList.add('fixed', 'inset-0', 'bg-black', 'bg-opacity-70', 'flex', 'items-center', 'justify-center', 'z-[1001]');
        loadingOverlay.innerHTML = '<div class="w-12 h-12 border-4 border-white border-opacity-30 rounded-full border-t-white animate-spin"></div>';
        document.body.appendChild(loadingOverlay);
        
        // Create the lightbox elements
        const lightbox = document.createElement('div');
        lightbox.classList.add('fixed', 'inset-0', 'bg-black', 'bg-opacity-90', 'flex', 'justify-center', 'items-center', 'z-[1000]', 'opacity-0', 'transition-opacity', 'duration-300');
        
        const lightboxContent = document.createElement('div');
        lightboxContent.classList.add('relative', 'max-w-[90%]', 'max-h-[90%]', 'transform', 'scale-90', 'transition-transform', 'duration-300');
        
        const closeButton = document.createElement('span');
        closeButton.classList.add('absolute', '-top-10', 'right-0', 'text-white', 'text-4xl', 'font-bold', 'cursor-pointer', 'hover:scale-110', 'transition-transform', 'duration-200', 'shadow-md');
        closeButton.innerHTML = '&times;';
        
        const image = new Image();
        image.classList.add('max-w-full', 'max-h-[90vh]', 'object-contain', 'shadow-lg');
        
        // Add loading event handling
        image.onload = function() {
            // Remove loading overlay when image is loaded
            document.body.removeChild(loadingOverlay);
            lightbox.classList.add('opacity-100');
            lightboxContent.classList.remove('scale-90');
            lightboxContent.classList.add('scale-100');
        };
        
        image.onerror = function() {
            document.body.removeChild(loadingOverlay);
            alert('Error loading image. Please try again.');
        };
        
        // Set the source after adding event handlers
        image.src = imageSrc;
        
        lightboxContent.appendChild(closeButton);
        lightboxContent.appendChild(image);
        lightbox.appendChild(lightboxContent);
        document.body.appendChild(lightbox);
        
        // Add a function to close the lightbox
        function closeLightbox() {
            lightbox.classList.remove('opacity-100');
            lightbox.classList.add('opacity-0');
            lightboxContent.classList.remove('scale-100');
            lightboxContent.classList.add('scale-90');
            setTimeout(() => {
                document.body.removeChild(lightbox);
            }, 300);
            // Remove the event listener when lightbox is closed
            document.removeEventListener('keydown', handleKeyDown);
        }
        
        // Add keyboard event listener for ESC key
        function handleKeyDown(event) {
            if (event.key === 'Escape') {
                closeLightbox();
            }
        }
        
        // Add the keyboard event listener
        document.addEventListener('keydown', handleKeyDown);
        
        closeButton.addEventListener('click', closeLightbox);
        
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });
    }

// Modified function to filter the gallery
function filterGallery(category) {
    // Save current image height before filtering
    const currentImageHeight = document.documentElement.style.getPropertyValue('--current-image-height') || '12rem';
    
    // Setup gallery with the selected category
    setupGallery(category);
    
    // After gallery setup, ensure all images maintain the same height
    setTimeout(() => {
        const galleryImages = document.querySelectorAll('.gallery-row img');
        galleryImages.forEach(img => {
            img.style.height = currentImageHeight;
        });
    }, 400);
}

    const backButton = document.getElementById("backButton");
    if (backButton) {
        backButton.addEventListener("click", function () {
            window.location.href = "index.php";
        });
    } else {
        console.warn("Back button not found in the document");
    }
});

function adjustGalleryForScreenSize() {
const rows = document.querySelectorAll('.gallery-row');
const screenWidth = window.innerWidth;

rows.forEach(row => {
    if (screenWidth < 640) { // Mobile (Tailwind 'sm' is 640px)
        row.style.gap = '1.5rem'; // Smaller gap
        row.querySelectorAll('img').forEach(img => {
            img.style.height = '8rem'; // Smaller images
        });
    } else {
        row.style.gap = '3rem'; // Default gap
        row.querySelectorAll('img').forEach(img => {
            img.style.height = '12rem'; // Larger images
        });
    }
});
}

// Run it once when page loads
adjustGalleryForScreenSize();

// Also run it whenever window is resized
window.addEventListener('resize', adjustGalleryForScreenSize);
// Add responsive behavior check
checkResponsiveMode();
    
    // Add window resize listener for responsive adjustments
    window.addEventListener('resize', function() {
        checkResponsiveMode();
        adjustGalleryForScreenSize();
    });

// Function to check and adjust for responsive mode
function checkResponsiveMode() {
    const sidebar = document.getElementById('sidebar');
    const sidebarMenu = document.getElementById('sidebarMenu');
    const mainContent = document.getElementById('mainContent');
    const sidebarTitle = document.getElementById('sidebarTitle');
    const isMobile = window.innerWidth < 768; // 768px is standard md breakpoint
    
    if (isMobile) {
        // Mobile mode - transform sidebar into dropdown menu
        sidebar.classList.remove('w-64', 'w-20');
        sidebar.classList.add('w-full', 'h-auto', 'max-h-0', 'overflow-hidden');
        sidebar.style.transition = 'max-height 0.3s ease-in-out';
        sidebar.setAttribute('data-collapsed', 'true');
        sidebar.setAttribute('data-mobile', 'true');
        
        // Always show sidebar title and category text in mobile view
        sidebarTitle.classList.remove('hidden');
        
        // Adjust main content to take full width
        mainContent.classList.remove('ml-64', 'ml-20');
        mainContent.classList.add('ml-0');
        
        // Update toggle button to be hamburger menu style
        const toggleButton = document.getElementById('toggleSidebar');
        toggleButton.style.position = 'fixed';
        toggleButton.style.top = '20px';
        toggleButton.style.left = '20px';
        toggleButton.style.zIndex = '100';
        toggleButton.style.padding = '8px';
        toggleButton.style.backgroundColor = 'rgba(0, 70, 9, 0.9)';
        toggleButton.style.borderRadius = '5px';
        
        // Modify header for mobile view
        const header = document.querySelector('header');
        header.classList.remove('left-64', 'left-20', 'w-[calc(100%-16rem)]', 'w-[calc(100%-5rem)]');
        header.classList.add('left-0', 'w-full', 'pl-16');
        
        // Show all spans in menu items for mobile dropdown - always visible in mobile
        const menuSpans = sidebarMenu.querySelectorAll('span');
        menuSpans.forEach(span => span.classList.remove('hidden'));
        
        // Update sidebar menu item layout
        const menuItems = sidebarMenu.querySelectorAll('li a');
        menuItems.forEach(item => {
            item.classList.add('justify-between');
            item.classList.add('px-6');
        });
        
        // Event submenu adjustment for mobile
        const eventsSubmenu = document.getElementById('eventsSubmenu');
        if (eventsSubmenu) {
            eventsSubmenu.classList.add('left-0', 'ml-8', 'w-[80%]', 'mt-1');
        }
    } else {
        // Desktop mode - restore standard sidebar
        sidebar.classList.remove('w-full', 'h-auto', 'max-h-0', 'overflow-hidden');
        sidebar.removeAttribute('data-mobile');
        
        // Reset toggle button
        const toggleButton = document.getElementById('toggleSidebar');
        toggleButton.style.position = '';
        toggleButton.style.top = '';
        toggleButton.style.left = '';
        toggleButton.style.zIndex = '';
        toggleButton.style.padding = '';
        toggleButton.style.backgroundColor = '';
        toggleButton.style.borderRadius = '';
        
        // Restore collapsed state - default to collapsed on desktop
        sidebar.setAttribute('data-collapsed', 'true');
        sidebar.classList.add('w-20');
        sidebar.classList.remove('w-64');
        mainContent.classList.add('ml-20');
        mainContent.classList.remove('ml-64');
        sidebarTitle.classList.add('hidden');
        
        // In desktop collapsed mode, hide text spans
        const menuSpans = sidebarMenu.querySelectorAll('span');
        menuSpans.forEach(span => span.classList.add('hidden'));
        
        // Update header for desktop view
        const header = document.querySelector('header');
        header.classList.remove('left-0', 'w-full', 'pl-16');
        header.classList.add('left-20', 'w-[calc(100%-5rem)]');
        
        // Reset menu item layout
        const menuItems = sidebarMenu.querySelectorAll('li a');
        menuItems.forEach(item => {
            item.classList.remove('justify-between');
            item.classList.remove('px-6');
        });
        
        // Event submenu adjustment for desktop
        const eventsSubmenu = document.getElementById('eventsSubmenu');
        if (eventsSubmenu) {
            eventsSubmenu.classList.remove('left-0', 'ml-8', 'w-[80%]', 'mt-1');
        }
    }
}


// Modified toggleSidebar handler
document.getElementById('toggleSidebar').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    const isMobile = sidebar.hasAttribute('data-mobile');
    
    if (isMobile) {
        // In mobile mode, toggle the dropdown menu
        if (sidebar.classList.contains('max-h-0')) {
            sidebar.classList.remove('max-h-0');
            sidebar.classList.add('max-h-[80vh]', 'bg-opacity-95', 'shadow-lg');
            document.body.style.overflow = 'hidden'; // Prevent body scrolling
        } else {
            sidebar.classList.remove('max-h-[80vh]', 'bg-opacity-95', 'shadow-lg');
            sidebar.classList.add('max-h-0');
            document.body.style.overflow = ''; 
        }
    } else {
        // In desktop mode, toggle sidebar width
        const sidebarCollapsed = sidebar.getAttribute('data-collapsed') === 'true';
        sidebar.setAttribute('data-collapsed', !sidebarCollapsed);
        
        // Update sidebar state visually
        updateSidebarState();
    }
});

// Gallery responsiveness function
function adjustGalleryForScreenSize() {
    const rows = document.querySelectorAll('.gallery-row');
    const screenWidth = window.innerWidth;
    
    let imageHeight, gapSize;
    
    // Responsive scaling based on viewport width
    if (screenWidth < 480) {
        // Extra small screens
        imageHeight = '6rem'; // Maintain minimum readable size
        gapSize = '0.5rem';
    } else if (screenWidth < 640) {
        // Small screens
        imageHeight = '8rem'; // Maintain size for small screens
        gapSize = '0.75rem';
    } else if (screenWidth < 768) {
        // Medium screens
        imageHeight = '10rem';
        gapSize = '1rem';
    } else if (screenWidth < 1024) {
        // Large screens
        imageHeight = '12rem';
        gapSize = '1.5rem';
    } else {
        // XL screens
        imageHeight = '16rem';
        gapSize = '3rem';
    }
    
    // Store the current image height for reference when filtering
    document.documentElement.style.setProperty('--current-image-height', imageHeight);
    
    rows.forEach(row => {
        row.style.gap = gapSize;
        
        // Apply styles to all images in the row
        const images = row.querySelectorAll('img');
        images.forEach(img => {
            img.style.height = imageHeight;
            
            // Additional responsive adjustments for images
            if (screenWidth < 640) {
                img.style.borderRadius = '0.25rem'; // Smaller rounded corners
                img.classList.remove('hover:scale-105');
                img.classList.add('hover:scale-102'); // Smaller hover effect
            } else {
                img.style.borderRadius = '0.5rem'; // Regular rounded corners
                img.classList.remove('hover:scale-102');
                img.classList.add('hover:scale-105'); // Regular hover effect
            }
        });
        
        // Adjust animation speed based on screen size
        const speedAdjustment = screenWidth < 640 ? 0.5 : 0.9;
        row.setAttribute('data-speed', speedAdjustment.toString());
    });
    
    // Update the gallery container padding
    const galleryContainer = document.querySelector('.flex-1.p-8');
    if (galleryContainer) {
        if (screenWidth < 640) {
            galleryContainer.classList.remove('p-8');
            galleryContainer.classList.add('p-2');
        } else {
            galleryContainer.classList.remove('p-2');
            galleryContainer.classList.add('p-8');
        }
    }
}

// Connect these functions to the DOM when loaded
document.addEventListener("DOMContentLoaded", function() {
    // Initial setup
    checkResponsiveMode();
    adjustGalleryForScreenSize();
    
    // Set up event listeners
    window.addEventListener('resize', function() {
        checkResponsiveMode();
        adjustGalleryForScreenSize();
        updateSubmenuPosition();
    });
    
    // Setup eventsMenuItem click handler
    const eventsMenuItem = document.querySelector('a[href="#events"]');
    if (eventsMenuItem) {
        eventsMenuItem.addEventListener('click', function(e) {
            e.preventDefault();
            toggleSubmenuPanel();
        });
    }
});

// Setup sidebar behavior - fix hover behavior for desktop
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const eventsSubmenu = document.getElementById('eventsSubmenu');
    
    sidebar.addEventListener('mouseenter', function() {
        // Only apply hover behavior if we're in desktop mode and sidebar is collapsed
        if (!sidebar.hasAttribute('data-mobile') && sidebar.getAttribute('data-collapsed') === 'true') {
            sidebar.setAttribute('data-collapsed', 'false');
            updateSidebarState();
        }
    });

    sidebar.addEventListener('mouseleave', function() {
        // Only apply hover behavior if we're in desktop mode and the submenu isn't active
        if (!sidebar.hasAttribute('data-mobile') && !eventsSubmenu.classList.contains('active') && 
            sidebar.getAttribute('data-collapsed') === 'false') {
            sidebar.setAttribute('data-collapsed', 'true');
            updateSidebarState();
        }
    });
});


// For existing animateRow function, modify to use the data-speed attribute:
// Inside your existing animateRow function, update this line:
// const speed = goingRight ? 0.9 : -0.9;
// To this:
// const baseSpeed = parseFloat(row.getAttribute('data-speed') || '0.9');
// const speed = goingRight ? baseSpeed : -baseSpeed;
</script>
</body>
</html>