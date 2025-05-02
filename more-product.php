<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.png" type="image/png">
    <title>Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap');

        .container {
        width: 50px;
        height: 50px;
        }

        .loading-screen {
            background: rgba(38, 105, 60, 0.85) !important;
            transition: opacity 0.5s ease-out;
        }
        .loading-screen.hide {
            opacity: 0 !important;
            visibility: hidden !important;
            display: none !important;
            transition: opacity 3.5s ease-out;
        }
        .loading-video {
            object-fit: cover;
        }
        .product-card:hover .product-image img {
            transform: translate(10px, 45px) rotate(13deg) scale(1.45);
            z-index: 1000;
        }
        /* Lightbox Styles */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
            overflow: hidden;
        }

        .lightbox-image-container {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .lightbox-image {
            width: 100%;
            height: auto;
            transition: transform 0.2s ease-in-out;
        }

        .close-lightbox {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 30px;
            color: white;
            cursor: pointer;
            z-index: 100;
        }

        /* Smooth zoom effect */
        .lightbox-image:hover {
            transform: scale(1.1);
        }

        .highlight-product {
            outline: 3px solid rgba(88, 151, 251, 0.8);
            transition: outline 0.3s ease-in-out;
        }
        .sidebar-menu li a:hover, .sidebar-menu li.active a {
            background-color: #044e06;
        }
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background-color: #044e06;
            border-radius: 10px;
        }
        .sidebar::-webkit-scrollbar-thumb:hover {
            background-color: #066b09;
        }
        .sidebar::-webkit-scrollbar-track {
            background-color: #021601;
        }
        .sidebar.collapsed::-webkit-scrollbar {
            display: none;
        }
        .product-carousel::-webkit-scrollbar {
            display: none;
        }
        .sidebar.collapsed {
            width: 75px !important;
            padding: 10px 20px;
        }

        .sidebar.collapsed .sidebar-header h3 {
            display: none;
            padding: 10px 20px;
        }

        .sidebar.collapsed .sidebar-menu li a {
            text-align: center;
            padding-left: 0;
            padding-right: 0;
        }

        .sidebar.collapsed .sidebar-menu li a span {
            display: none; /* If you have text labels in <span> */
        }
        .sidebar.collapsed .sidebar-header {
            justify-content: center !important;
        }
        .sidebar.collapsed .sidebar-header h3 {
            display: none;
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
        .footer {
            background-image: url("images/footer-background.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            padding: 40px 20px;
            min-height: 100vh;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #011D02D9;  /* Dark Green Overlay */
            z-index: 0; /* Behind the content */
        }

        /* Basic sidebar styling */
        #sidebar {
            transition: all 0.3s ease;
            z-index: 1000;
        }

        /* Mobile sidebar styling */
        @media (max-width: 768px) {
            #sidebar {
                position: fixed;
                top: 60px; /* Adjust based on your header height */
                left: 0;
                width: 100%;
                max-height: 0;
                overflow: hidden;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            
            #sidebar.dropdown-active {
                max-height: 80vh; /* Limit height and enable scrolling */
                overflow-y: auto;
            }
            
            #sidebar .sidebar-item {
                padding: 15px 20px;
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            }
            
            #main-content {
                margin-left: 0 !important; /* Override any inline styles */
                width: 100%;
            }
            
            /* Mobile toggle button styling */
            #toggleSidebar {
                display: block;
                position: fixed;
                top: 15px; /* Adjust as needed */
                left: 15px;
                z-index: 1001;
                cursor: pointer;
            }
            
            /* Adjust submenu styling for mobile */
            #sidebar .submenu {
                max-height: none !important;
                position: static;
                width: 100%;
                padding-left: 20px;
                background-color: rgba(0, 0, 0, 0.03);
            }
            
            #sidebar .has-submenu.open .submenu {
                display: block;
            }
        }

        /* Desktop sidebar styling */
        @media (min-width: 769px) {
            #sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                width: 250px;
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            }
            
            #sidebar.collapsed {
                width: 75px;
            }
            
            #toggleSidebar {
                display: block;
                margin: 15px;
                cursor: pointer;
            }
        }

        /* Animation for dropdown effect */
        @keyframes slideDown {
            from { max-height: 0; }
            to { max-height: 80vh; }
        }

        #sidebar.dropdown-active {
            animation: slideDown 0.3s ease forwards;
        }
        
    </style>
        <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-green': '#002d02',
                        'dark-green': '#004609',
                        'medium-green': '#004601',
                        'light-green': '#005c05',
                        'accent-gold': '#f0a500',
                        'hover-gold': '#d18e00',
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
</head>
<body class="bg-[url('images/faqBG.png')] bg-cover bg-center bg-fixed text-white overflow-x-hidden ml-[30px]">
    <!-- Loading Screen -->
    <div class="loading-screen fixed top-0 left-0 w-screen h-screen flex items-center justify-center z-[9999] opacity-100">
        <div class="w-[450px] h-[450px] rounded-full overflow-hidden">
            <img src="images/pagereload.gif" alt="Loading..." class="loading-video w-[450px] h-[450px] z-[9999]" />
        </div>
    </div>

    <!-- Search Container -->
    <div class="search-container fixed top-5 right-1/2 translate-x-1/2 bg-[#232531] rounded-full p-[5px_15px] flex items-center shadow-[0px_4px_6px_rgba(0,0,0,0.1)] z-[1000]">
        <input type="text" id="searchBox" placeholder="Search for products..." class="bg-transparent border-none outline-none text-white text-base w-[200px] p-2 font-['Archivo_Narrow'] placeholder:text-white/70">
        <div id="searchResults" class="absolute top-[45px] left-0 w-full bg-[#2C2F40] rounded shadow-[0px_4px_6px_rgba(0,0,0,0.2)] hidden p-4 space-y-2">
            <!-- Dynamically generated search recommendations will go here -->
        </div>
    </div>

    <!-- Sidebar -->
    <div class="container">
        <div class="sidebar collapsed fixed left-0 top-0 w-[250px] h-screen bg-[#003002] transition-all duration-300 ease-in-out z-[1000] overflow-y-auto overflow-x-hidden" id="sidebar">
            <div class="sidebar-header flex justify-between items-center p-[20px_20px] border-b border-[#033b04] text-[25px] font-archivo-black">
                <h3>Categories</h3>
                <button id="toggleSidebar" class="text-white bg-transparent border-none text-2xl cursor-pointer"><i class="fas fa-bars"></i></button>            
            </div>
            <div class="sidebar-content p-[20px_0]">
                <ul class="sidebar-menu list-none p-0 m-0">
                    <li><a href="#chairs" class="flex items-center font-archivo-narrow p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-chair text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Chairs</span></a></li>
                    <li><a href="#tables" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-table text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Tables</span></a></li>
                    <li><a href="#conference-set" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-users text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Conference Set</span></a></li>
                    <li><a href="#sofa-sets" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-couch text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Sofa Sets</span></a></li>
                    <li><a href="#sofa-single" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-couch text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Sofa Single</span></a></li>
                    <li><a href="#showcase" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-store text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Showcase</span></a></li>
                    <li><a href="#display" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-tv text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Display</span></a></li>
                    <li><a href="#props-and-aids" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-tools text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Props and Aids</span></a></li>
                    <li><a href="#carpet" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-rug text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Carpet</span></a></li>
                    <li><a href="#appliances" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-blender text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Appliances</span></a></li>
                    <li><a href="#tv-and-audio-visual" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-tv text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>TV and Audio Visual</span></a></li>
                    <li><a href="#outlet-and-adaptor" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-plug text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Outlet and Adaptor</span></a></li>
                    <li><a href="#breaker-single-phase" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-bolt text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Breaker Single Phase</span></a></li>
                    <li><a href="#breaker-three-phase" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-bolt-lightning text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Breaker Three Phase</span></a></li>
                    <li><a href="#transformer" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-charging-station text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Transformer</span></a></li>
                    <li><a href="#light-fittings" class="flex items-center p-[15px_20px] text-white no-underline transition-all duration-300 ease gap-[20px]"><i class="fas fa-lightbulb text-[28px] w-[32px] h-[32px] flex items-center justify-center"></i> <span>Light Fittings</span></a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content flex-1 flex flex-col min-h-auto justify-between ml-[250px] transition-all duration-300 ease-in-out" id="main-content">
        <!-- All product sections would go here with the same structure as before -->

    <!-- Chairs Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="chairs">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Chairs</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="monobloc-chair">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AA-1.png" alt="Monobloc Chair" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Monobloc Chair White & Gray</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="black-stacking-chair-leatherette-cushion">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AB-2.png" alt="Black Stacking Chair" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Black Stacking Chair Leatherette Cushion</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="white-plastic-chair">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AC-3.png" alt="White Plastic Chair" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">White Plastic Chair</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="brown-folded-chair">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AD-4.png" alt="Brown Folded Chair" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Brown Folded Chair with Stainless Footing</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="white-special-chair-nordic">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AE-5.png" alt="White Special Chair Nordic" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">White Special Chair (Nordic chair with Cushion)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="white-special-chair-nordic">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AE-5.png" alt="White Special Chair" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">White Special Chair (Nordic chair with Cushion)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="black-special-chair-chopstick-cushion">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AE-6.png" alt="Black Special Chair" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Black Special Chair (Chopstick with Cushion)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="white-special-chair-chopstick-cushion">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AE-7.png" alt="White Special Chair" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">White Special Chair (Chopstick with Cushion)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="black-special-chair-chopstick">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AE-8.png" alt="Black Special Chair" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Black Special Chair (Chopstick Chair)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="white-special-chair-chopstick">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AE-9.png" alt="White Special Chair" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">White Special Chair (Chopstick Chair)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="black-barstool">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AF-10.png" alt="Black Barstool Leatherette" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Black Barstool Leatherette</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="black-hydraulic-chair">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AG-11.png" alt="Black Hydraulic Chairs Low Backrest" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Black Hydraulic Chairs Low Backrest</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="white-hydraulic-chair">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AG-12.png" alt="White Hydraulic Chairs Low Backrest" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">White Hydraulic Chairs Low Backrest</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="maroon-hydraulic-chair">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AG-13.png" alt="Maroon Hydraulic Chairs High Backrest" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Maroon Hydraulic Chairs High Backrest</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="red-hydraulic-chair">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AG-14.png" alt="Red Hydraulic Chairs High Backrest" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Red Hydraulic Chairs High Backrest</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="orange-hydraulic-chair">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AG-15.png" alt="Orange Hydraulic Chairs Smiley" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Orange Hydraulic Chairs Smiley</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="yellow-hydraulic-chair">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AG-16.png" alt="Yellow Hydraulic Chairs Smiley" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Yellow Hydraulic Chairs Smiley</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="conference-chair">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/AH-17.png" alt="Conference Chairs" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Conference Chairs</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Chairs</p>
                        </div>
                    </div>
                </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

    <!-- Tables Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="tables">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Tables</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="information-table">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/BA-1.png" alt="Information System Table" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Information System Table</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Tables</p>
                        </div>
                    </div>
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="black-stacking-chair-leatherette-cushion">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/BB-2.png" alt="Round Glass Conference Table" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Round Glass Conference Table (60 diameter)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Tables</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="round-glass-table-80">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/BB-3.png" alt="Round Glass Conference Table" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Round Glass Conference Table (80 diameter)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Tables</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="round-white-table-60">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/BB-4.png" alt="Round Conference White Round Table" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Round Conference White Round Table (60 diameter)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Tables</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="round-white-table-80">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/BB-5.png" alt="Round Conference White Round Table" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Round Conference White Round Table (80 diameter)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Tables</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="cocktail-table-60">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/BC-6.png" alt="Cocktail Glass Table" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Cocktail Glass Table (60 diameter)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Tables</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="cocktail-table-80">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/BC-7.png" alt="Cocktail Glass Table" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Cocktail Glass Table (80 diameter)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Tables</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="hydraulic-white-table">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/BD-8.png" alt="Hydraulic White Round Table" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Hydraulic White Round Table</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Tables</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="coffee-table-1">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/BE-9.png" alt="Coffee Table Rectangular 1" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Coffee Table Rectangular 1</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Tables</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="coffee-table-2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/BE-10.png" alt="Coffee Table Rectangular 2" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Coffee Table Rectangular 2</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Tables</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="system-lockable-table1">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/BF-11.png" alt="System Lockable Table" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">System Lockable Table (1m .5m x .75m (h))</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Tables</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="system-lockable-table2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/BF-12.png" alt="System Lockable Table" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">System Lockable Table (1m .5m x 1m (h))</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Tables</p>
                        </div>
                    </div>
                    </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

    <!-- Conference Set Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="conference-set">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Conference Set</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="conference-set1">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/CA-1.png" alt="Conference Set 1" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Conference Set 1 (1 Table, 2 Chair)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Conference Set</p>
                        </div>
                    </div>
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="conference-set2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/CA-2.png" alt="Conference Set 2" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Conference Set 2 (1 Table, 2 Chairs)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Conference Sets</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="conference-set3">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/CB-3.png" alt="Conference Set 3" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Conference Set 3 (1 Table, 4 Chairs)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Conference Sets</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="conference-set4">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/CB-4.png" alt="Conference Set 4" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Conference Set 4 (1 Table, 4 Chairs)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Conference Sets</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="conference-set5">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/CC-5.png" alt="Conference Set 5 White" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Conference Set 5 White (1 Table, 4 Chairs)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Conference Sets</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="conference-set6">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/CC-6.png" alt="Conference Set 6 Black" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Conference Set 6 Black (1 Table, 4 Chairs)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Conference Sets</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="conference-set7">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/CD-7.png" alt="Conference Set 7" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Conference Set 7 (1 Cocktail Table, 2 Barstool Chairs)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Conference Sets</p>
                        </div>
                    </div>
                    </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

    <!-- Sofa Sets Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="sofa-sets">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Sofa Sets</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="sofa-set-1">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/DA-1.png" alt="Sofa Set 1" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Sofa Set 1 Black Leatherette ((1) 3-seater, (2) 1-seater, (3) (1) Center Table)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Sofa Sets</p>
                        </div>
                    </div>
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="sofa-set-2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/DA-2.png" alt="Sofa Set 2" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Sofa Set 2 Black Leatherette ((1) 3-seater, (2) 1-seater, (3) (1) Center Table)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Sofa Sets</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="sofa-set-3">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/DA-3.png" alt="Sofa Set 3" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Sofa Set 3 Black Leatherette ((1) 2-seater, (2) 1-seater, (3) (1) Center Table)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Sofa Sets</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="sofa-set-4">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/DA-4.png" alt="Sofa Set 4" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Sofa Set 4 Black Leatherette ((1) 2-seater, (2) 1-seater, (3) (1) Center Table)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Sofa Sets</p>
                        </div>
                    </div>
                    </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

    <!-- Sofa Single Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="sofa-single">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Sofa Single</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="sofa-3-seater-black">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/DA-1.1.png" alt="Sofa 3 seater Black Leatherette" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Sofa 3 seater Black Leatherette part of DA-1</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Sofa Single</p>
                        </div>
                    </div>
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="sofa-1-seater-black">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/DB-1.2.png" alt="Sofa 1 seater Black Leatherette" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Sofa 1 seater Black Leatherette part of DA-1</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Sofa Singles</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="sofa-3-seater-white">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/DC-2.1.png" alt="Sofa 3 seater White Leatherette" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Sofa 3 seater White Leatherette part of DA-2</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Sofa Singles</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="sofa-1-seater-white">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/DD-2.2.png" alt="Sofa 1 seater White Leatherette" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Sofa 1 seater White Leatherette part of DA-2</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Sofa Singles</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="sofa-2-seater-black">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/DE-3.1.png" alt="Sofa 2 seater Black Leatherette" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Sofa 2 seater Black Leatherette part of DA-3</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Sofa Singles</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="sofa-2-seater-white">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/DF-3.1.png" alt="Sofa 2 seater White Leatherette" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Sofa 2 seater White Leatherette part of DA-3</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Sofa Singles</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="sofa-2-seater-dark-gray">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/DG-4.png" alt="Sofa 2 seater Dark Gray Fabric" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Sofa 2 seater Dark Gray Fabric</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Sofa Singles</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="ottoman">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/DH-5.png" alt="Ottoman" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Ottoman</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Sofa Singles</p>
                        </div>
                    </div>
                    </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

    <!-- Showcase Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="showcase">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Showcase</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="showcase-a">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/EA-1.png" alt="Showcase Type A" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Showcase Type A (1m x .5m x 1m (h))</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Showcase</p>
                        </div>
                    </div>
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="showcase-b">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/EB-2.png" alt="Showcase Type B" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Showcase Type B (1m x .5m x 1.2m (h))</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Showcase</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="showcase-c">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/EC-3.png" alt="Showcase Type C" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Showcase Type C (1m x .5m x 1.8m (h))</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Showcase</p>
                        </div>
                    </div>
                    </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>
    
    <!-- Display Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="display">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Display</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="standard-shelves1">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/FA-1.png" alt="Standard Shelves" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Standard Shelves (1m x .30m x 3/4" (thick))</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Display</p>
                        </div>
                    </div>
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="standard-shelves2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/FB-2.png" alt="Standard Shelves" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Standard Shelves (2m x .30m x 3/4" (thick))</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Display</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="wall-mounted-brochure-pocket1">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/FC-3.png" alt="Wall Mounted Brochure Pocket 1" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Wall Mounted Brochure Pocket 1 (4 cases)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Display</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="wall-mounted-brochure-pocket2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/FD-4.png" alt="Wall Mounted Brochure Pocket 2" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Wall Mounted Brochure Pocket 1 (2 cases)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Display</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="wooded-brochure-standee-1">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/FE-5.png" alt="Wooded Brochure Standee 1" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Wooded Brochure Standee 1 (3 pockets)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Display</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="acrylic-folded-brochure-standee">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/FF-6.png" alt="Acrylic Folded Brochure Standee 1" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Acrylic Folded Brochure Standee 1 (4 pockets)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Display</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="universal-tv-stand">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/FG-7.png" alt="Universal TV Stand" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Universal TV Stand</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Display</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="universal-tv-bracket">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/FH-8.png" alt="Universal TV Bracket" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Universal TV Bracket</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Display</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="system-vertical-photo-panel1">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/FI-9.png" alt="System Vertical Photo Panel" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">System Vertical Photo Panel (1m x 2.5m (h))</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Display</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="system-vertical-photo-panel2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/FJ-10.png" alt="System Vertical Photo Panel with spotlight" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">System Vertical Photo Panel with one spotlight</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Display</p>
                        </div>
                    </div>
                    </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

    <!-- Prop & Aids Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="props-and-aids">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Prop & Aids</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="dry-waste-bin1">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/GA-1.png" alt="Dry Waste Bin 1" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Dry Waste Bin</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Prop & Aids</p>
                        </div>
                    </div>
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="s-hook">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/GB-2.png" alt="S Hook" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">S Hook</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Prop & Aids</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="tambiolo">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/GC-3.png" alt="Tambiolo" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                        <h3 class="text-base text-white font-['Archivo_Narrow']">Tambiolo</h3>
                        <p class="product-category text-[#aaa] text-sm font-['Archivo']">Prop & Aids</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="dressing-room-mirror">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/GD-4.png" alt="Dressing Room Mirror" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Dressing Room Mirror</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Prop & Aids</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="easel-stand">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/GE-5.png" alt="Easel Stand" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Easel Stand</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Prop & Aids</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="palochina-folded-rack3">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/GF-6.png" alt="Palochina Folded Rack 3 layer" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Palochina Folded Rack 3 layer</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Prop & Aids</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="palochina-folded-rack4">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/GF-7.png" alt="Palochina Folded Rack 4 layer" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Palochina Folded Rack 4 layer</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Prop & Aids</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="x-banner">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/GI-8.png" alt="X-Banner with Graphics printed of Tarp" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">X-Banner with Graphics printed of Tarp</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Prop & Aids</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="pull-up-banner">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/GI-9.png" alt="Pull up Banner with Graphics printed of Tarp" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Pull up Banner with Graphics printed of Tarp</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Prop & Aids</p>
                        </div>
                    </div>
                    </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

    <!-- Carpet Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="carpet">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Carpet</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="needle-punched-carpet1">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/HA-1.png" alt="Needle Punched Carpet" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Needle Punched Carpet ( Standard Color Red, Green, Blue, Light Gray, Dark Gray, Black ) /sqm</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Carpet</p>
                        </div>
                    </div>
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="faux-grass-carpet">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/HB-2.png" alt="Faux Grass Carpet" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Faux Grass Carpet /sqm</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Carpet</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="loop-pile-carpet">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/HC-3.png" alt="Loop Pile Carpet" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Loop Pile Carpet /sqm</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Carpet</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="tile-carpet">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/HD-4.png" alt="Tile Carpet" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Tile Carpet /sqm</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Carpet</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="needle-punched-carpet2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/HD-5.png" alt="Needle Punched Carpet Special Color" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Needle Punched Carpet (Special Color) /sqm</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Carpet</p>
                        </div>
                    </div>
                    </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

    <!-- Appliances Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="appliances">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Appliances</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="water-dispenser">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/IA-1.png" alt="Water Dispenser" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">Water Dispenser ( with 5 gal of water with 50 cups )</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">Appliances</p>
                        </div>
                    </div>
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="refrigerator1">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/IB-2.png" alt="Refrigerator 1" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Refrigerator 1</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Appliances</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="refrigerator2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/IB-3.png" alt="Refrigerator 2" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Refrigerator 2</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Appliances</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="chest-type-freezer-1">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/IC-4.png" alt="Chest Type Freezer 1" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Chest Type Freezer 1 /day</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Appliances</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="chest-type-freezer-2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/IC-5.png" alt="Chest Type Freezer 2" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Chest Type Freezer 2 /day</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Appliances</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="chest-type-freezer-3">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/IC-6.png" alt="Chest Type Freezer 3" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Chest Type Freezer 3 /day</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Appliances</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="microwave-oven">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/ID-7.png" alt="Microwave Oven" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Microwave Oven</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Appliances</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="coffee-maker">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/IE-8.png" alt="Coffee Maker" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Coffee Maker (1 gal of water with 50 cups)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Appliances</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="stand-fan">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/IF-9.png" alt="Stand Fan" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Stand Fan</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Appliances</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="electric-kettle">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/IG-10.png" alt="Electric Kettle" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Electric Kettle</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Appliances</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="projector-sets">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/IH-11.png" alt="Projector Sets" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Projector Sets</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Appliances</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="alcohol-dispenser1">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/II-12.png" alt="Alcohol Dispenser" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Alcohol Dispenser (with 1 gal of Alcohol)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Appliances</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="alcohol-dispenser2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/II-13.png" alt="Alcohol Dispenser with Thermometer" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Alcohol Dispenser with Thermometer (1 gal Alcohol)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Appliances</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="mist-spray">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/IJ-14.png" alt="Mist Spray" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Mist Spray with UV Light (1 gal Disinfectant)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Appliances</p>
                        </div>
                    </div>
                    </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

    <!-- TV and Audio Visual Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="tv-and-audio-visual">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">TV and Audio Visual</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="led-32">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/JA-1.png" alt="LED 32 Inches" class="w-full h-auto transition-all duration-500 ease-in-out relative overflow-visible z-[1000]">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="m-0 mb-1 text-base text-white font-['Archivo_Narrow']">LED 32 Inches HDMI Ready with TV Stand/Wall mounted</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo'] m-0 mb-[10px]">TV and Audio Visual</p>
                        </div>
                    </div>
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="led-42">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/JA-2.png" alt="LED 42 Inches" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">LED 42 Inches HDMI Ready with TV Stand/Wall mounted</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">TV & Audio Visual</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="led-50">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/JA-3.png" alt="LED 50 Inches" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">LED 50 Inches HDMI Ready with TV Stand/Wall mounted</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">TV & Audio Visual</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="led-65">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/JA-4.png" alt="LED 65 Inches" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">LED 65 Inches HDMI Ready with TV Stand/Wall mounted</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">TV & Audio Visual</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="led-75">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/JA-5.png" alt="LED 75 Inches" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">LED 75 Inches HDMI Ready with TV Stand/Wall mounted</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">TV & Audio Visual</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="led-wall-standard-size1">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/JB-6.png" alt="LED Wall Standard Size with Basic Sound System" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">LED Wall Standard Size with Basic Sound System</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">TV & Audio Visual</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="led-wall-standard-size2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/JB-7.png" alt="LED Wall Standard Size" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">LED Wall Standard Size</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">TV & Audio Visual</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="led-wall-other-size">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/JC-8.png" alt="LED Wall Other Size" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">LED Wall Other Size</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">TV & Audio Visual</p>
                        </div>
                    </div>
                    </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

    <!-- Outlet & Adaptor Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="outlet-and-adaptor">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Outlet & Adaptor</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="convenience-outlet3">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/KA-1.png" alt="Convenience Outlet 3 gang" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Convenience Outlet 3 gang</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Outlet & Adaptor</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="convenience-outlet2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/KA-2.png" alt="Convenience Outlet 2 gang" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Convenience Outlet 2 gang</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Outlet & Adaptor</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="convenience-outlet1">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/KA-3.png" alt="Convenience Outlet (Universal)" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Convenience Outlet (Universal)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Outlet & Adaptor</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="universal-adaptor">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/KB-4.png" alt="Universal Adaptor" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Universal Adaptor</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Outlet & Adaptor</p>
                        </div>
                    </div>
                    </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

    <!-- Breaker Single Phase Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="breaker-single-phase">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Breaker Single Phase</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="breaker-single-phase1">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/LA-1.png" alt="Up to 4.4kw w/20 A Switch 1P" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Up to 4.4kw w/20 A Switch 1P</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Breaker Single Phase</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="breaker-single-phase2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/LA-2.png" alt="Up to 6.6kw w/30 A Switch 1P" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Up to 6.6kw w/30 A Switch 1P</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Breaker Single Phase</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="breaker-single-phase3">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/LA-3.png" alt="Up to 15.4kw w/60 A Switch 1P" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Up to 15.4kw w/60 A Switch 1P</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Breaker Single Phase</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="breaker-single-phase4">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/LA-4.png" alt="Up to 22kw w/100 A Switch 1P" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Up to 22kw w/100 A Switch 1P</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Breaker Single Phase</p>
                        </div>
                    </div>
                    </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

    <!-- Breaker Three Phase Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="breaker-three-phase">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Breaker Three Phase</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="breaker-three-phase1">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/LB-1.png" alt="30 Amps V 60 Hz Breaker 3P" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">30 Amps V 60 Hz Breaker 3P</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Breaker Three Phase</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="breaker-three-phase2">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/LB-2.png" alt="60 Amps V 60 Hz Breaker 3P" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">60 Amps V 60 Hz Breaker 3P</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Breaker Three Phase</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="breaker-three-phase3">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/LB-3.png" alt="100 Amps V 60 Hz Breaker 3P" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">100 Amps V 60 Hz Breaker 3P</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Breaker Three Phase</p>
                        </div>
                    </div>
                    </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

    <!-- Transformer Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="transformer">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Transformer</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="step-down-single">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/MA-1.png" alt="Step-down Transformer" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Step-down Transformer (Single Phase)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Transformer</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="step-down-three">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/MA-2.png" alt="Step-down Transformer" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Step-down Transformer (Three Phase)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Transformer</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="step-up-single">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/MB-3.png" alt="Step-Up Transformer" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Step-Up Transformer (Single Phase)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Transformer</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="step-up-three">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/MB-4.png" alt="Step-Up Transformer" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Step-Up Transformer (Three Phase)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Transformer</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="genset">
                            <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/MC-5.png" alt="Genset" class="w-full h-auto transition-all duration-500 ease-in-out">
                        </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Genset</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Transformer</p>
                        </div>
                    </div>
                    </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>
        
    <!-- Light Fittings Section -->
        <section class="product-section p-[40px_20px] transition-all duration-300 ease" id="light-fittings">
            <div class="section-header flex justify-between items-center mb-5 font-bold">
                <h2 class="text-2xl text-[#f0a500] font-['Archivo_Black']">Light Fittings</h2>
            </div>

            <div class="product-carousel-container relative w-full overflow-visible">
                <button class="scroll-btn scroll-left absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease left-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-left"></i></button>

                <div class="product-carousel flex overflow-x-auto scroll-smooth gap-5 p-[10px_0] scrollbar-none">
                    <!-- Product cards would go here -->
                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="flourescent-lamp-40">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/NA-1.png" alt="Flourescent Lamp(40 watts)" class="w-full h-auto transition-all duration-500 ease-in-out">
                            </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Flourescent Lamp(40 watts)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Light Fittings</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="led-flourescent-day-light">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/NA-2.png" alt="LED Flourescent (Day Light)" class="w-full h-auto transition-all duration-500 ease-in-out">
                            </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">LED Flourescent (Day Light)</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Light Fittings</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="led-pin-light1">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/NB-3.png" alt="LED Pinlight( 5 watts )" class="w-full h-auto transition-all duration-500 ease-in-out">
                            </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">LED Pinlight( 5 watts )</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Light Fittings</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="led-pin-light2">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/NB-4.png" alt="LED Pinlight( 15 watts )" class="w-full h-auto transition-all duration-500 ease-in-out">
                            </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">LED Pinlight( 15 watts )</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Light Fittings</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="long-arm-spotlight">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/NC-5.png" alt="Long Arm Spotlight" class="w-full h-auto transition-all duration-500 ease-in-out">
                            </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Long Arm Spotlight</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Light Fittings</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="short-arm-spotlight">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/NC-6.png" alt="Short Arm Spotlight" class="w-full h-auto transition-all duration-500 ease-in-out">
                            </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Short Arm Spotlight</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Light Fittings</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="track-bar-track-light">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/ND-7.png" alt="Track Bar with 3 Track Light" class="w-full h-auto transition-all duration-500 ease-in-out">
                            </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Track Bar with 3 Track Light</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Light Fittings</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="halogen-pinlight">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/NE-8.png" alt="Halogen Pinlight" class="w-full h-auto transition-all duration-500 ease-in-out">
                            </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Halogen Pinlight</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Light Fittings</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="floodlight1">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/NF-11.png" alt="Floodlight 150 watts" class="w-full h-auto transition-all duration-500 ease-in-out">
                            </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Floodlight 150 watts</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Light Fittings</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="floodlight2">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/NF-13.png" alt="Floodlight 300 watts" class="w-full h-auto transition-all duration-500 ease-in-out">
                            </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Floodlight 300 watts</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Light Fittings</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="metal-halide1">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/NG-14.png" alt="Metal Halide 150 watts" class="w-full h-auto transition-all duration-500 ease-in-out">
                            </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Metal Halide 150 watts</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Light Fittings</p>
                        </div>
                    </div>

                    <div class="product-card interactive flex-none h-[400px] w-[280px] mx-[10px] bg-[#005c05] rounded-lg transition-all duration-300 ease relative overflow-visible z-10 flex flex-col justify-end items-center p-5" id="metal-halide2">
                        <div class="product-image relative overflow-visible z-[1000] top-5">
                            <img src="images/items/NG-15.png" alt="Metal Halide 400 watts" class="w-full h-auto transition-all duration-500 ease-in-out">
                            </div>
                        <div class="product-info p-4">
                            <h3 class="text-base text-white font-['Archivo_Narrow']">Metal Halide 400 watts</h3>
                            <p class="product-category text-[#aaa] text-sm font-['Archivo']">Light Fittings</p>
                        </div>
                    </div>



                    <!-- More product cards... -->
                </div>
                <button class="scroll-btn scroll-right absolute top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-[rgba(0,201,10,0.8)] text-white border-none flex items-center justify-center cursor-pointer z-[100] transition-all duration-300 ease right-[10px] hover:bg-[rgb(1,255,14)]"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>
    </div>

    <!-- Back Button -->
    <button id="backButton" class="fixed top-5 right-5 font-archivo-narrow py-3 px-4 bg-white bg-opacity-10 backdrop-blur text-white border-none rounded-lg cursor-pointer text-base flex items-center gap-2 transition-all duration-300 hover:bg-white hover:bg-opacity-20 hover:scale-105 shadow-md z-50">
        <span class="text-lg">&#8592;</span> <!-- Left arrow -->
    </button>

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

    <!-- Floating Contact Button -->
    <a href="contact.php" class="fixed bottom-8 right-8 bg-gold text-white font-archivo-black font-bold py-3 px-5 rounded-full shadow-md transition-all duration-300 hover:bg-[#d18e00] hover:scale-110 z-50 flex items-center gap-3">Contact Us</a>

    <script src="more-product.js"></script>
</body>
</html>