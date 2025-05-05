window.addEventListener("load", () => {
    const loadingScreen = document.querySelector(".loading-screen");

    // Hide the loading screen after 3.7 seconds (adjust time if needed)
    setTimeout(() => {
        loadingScreen.classList.add("hide"); // Hide after 2.7 seconds
    }, 2750); // 3750ms = 2.7 seconds
});

document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const toggleSidebar = document.getElementById("toggleSidebar");
    const mainContent = document.getElementById("main-content");
    const mobileBreakpoint = 768; // Medium screen breakpoint

    // Check if we're on a small screen
    function isSmallScreen() {
        return window.innerWidth < mobileBreakpoint;
    }

    // Function to update main content margin based on sidebar state
    function updateMainContentMargin() {
        if (isSmallScreen()) {
            // On small screens, don't push content to the side
            mainContent.style.marginLeft = "0";
        } else {
            // On larger screens, adjust margins based on sidebar state
            mainContent.style.marginLeft = sidebar.classList.contains("collapsed") ? "75px" : "250px";
        }
    }

    // Function to toggle dropdown state on small screens
    function toggleDropdown() {
        if (isSmallScreen()) {
            sidebar.classList.toggle("dropdown-active");
            
            // If dropdown is active, ensure it's not collapsed
            if (sidebar.classList.contains("dropdown-active")) {
                sidebar.classList.remove("collapsed");
            }
        } else {
            // On larger screens, use the original collapse behavior
            sidebar.classList.toggle("collapsed");
        }
        updateMainContentMargin();
    }
    // Force close the sidebar/dropdown when any category link is clicked
    document.querySelectorAll("#sidebar .sidebar-menu a").forEach(item => {
        item.addEventListener("click", function(e) {
            // If on mobile, prevent default to stop immediate navigation
            if (window.innerWidth < 768) {
                e.preventDefault();
                
                // Get the href attribute to find the target section
                const targetId = this.getAttribute("href").substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    // Close dropdown first
                    sidebar.classList.remove("dropdown-active");
                    
                    // Then scroll to section after a small delay
                    setTimeout(() => {
                        targetElement.scrollIntoView({ behavior: "smooth", block: "start" });
                    }, 300);
                }
            } else {
                sidebar.classList.add("collapsed");
                updateMainContentMargin();
            }
        });
    });

    // Set up event listeners
    if (toggleSidebar && sidebar && mainContent) {
        // Toggle sidebar/dropdown when the toggle button is clicked
        toggleSidebar.addEventListener("click", toggleDropdown);

        // For larger screens, handle hover behavior
        sidebar.addEventListener("mouseenter", function () {
            if (!isSmallScreen() && sidebar.classList.contains("collapsed")) {
                sidebar.classList.remove("collapsed");
                updateMainContentMargin();
            }
        });

        sidebar.addEventListener("mouseleave", function () {
            if (!isSmallScreen() && !sidebar.classList.contains("clicked")) {
                sidebar.classList.add("collapsed");
                updateMainContentMargin();
            }
        });

        // Close dropdown when clicking outside of it (for small screens only)
        document.addEventListener("click", function(e) {
            if (isSmallScreen() && 
                sidebar.classList.contains("dropdown-active") && 
                !sidebar.contains(e.target) && 
                e.target !== toggleSidebar) {
                sidebar.classList.remove("dropdown-active");
            }
        });

        // Handle window resize
        window.addEventListener("resize", function() {
            // Reset dropdown state when transitioning between screen sizes
            if (!isSmallScreen() && sidebar.classList.contains("dropdown-active")) {
                sidebar.classList.remove("dropdown-active");
            }
            updateMainContentMargin();
        });

        // Initial setup
        if (isSmallScreen()) {
            sidebar.classList.add("collapsed");
            sidebar.classList.remove("dropdown-active");
        }
        updateMainContentMargin();
    }

// Product carousel scrolling
const carousels = document.querySelectorAll(".product-carousel");

// Function to make carousel responsive
function makeCarouselResponsive() {
    const isMobile = window.innerWidth < 768;
    const isTablet = window.innerWidth >= 768 && window.innerWidth < 1024;
    
    carousels.forEach(carousel => {
        const container = carousel.closest(".product-carousel-container");
        if (!container) return;
        
        // Adjust container padding and size based on screen size
        if (isMobile) {
            // Create a more compact container on mobile
            container.style.padding = "0.4rem";
            container.style.maxWidth = "100%";
            container.style.margin = "0 auto 1rem auto";
            container.style.borderRadius = "6px";
            container.style.boxShadow = "0 2px 8px rgba(0,0,0,0.15)";
            container.style.border = "1px solid rgba(255,255,255,0.05)";
            // Limit height to make it more compact
            container.style.maxHeight = "350px";
            container.style.overflow = "hidden";
        } else if (isTablet) {
            container.style.padding = "0.75rem";
            container.style.maxWidth = "100%";
            container.style.margin = "0 auto 1.5rem auto";
            container.style.borderRadius = "8px";
            container.style.boxShadow = "0 3px 10px rgba(0,0,0,0.1)";
            container.style.border = "1px solid rgba(255,255,255,0.08)";
            container.style.maxHeight = "280px";
            container.style.overflow = "hidden";
        } else {
            container.style.padding = "";
            container.style.maxWidth = "";
            container.style.margin = "";
            container.style.borderRadius = "";
            container.style.boxShadow = "";
            container.style.background = "";
            container.style.border = "";
            container.style.maxHeight = "";
            container.style.overflow = "";
        }
        
        // Make the carousel itself more compact
        if (isMobile || isTablet) {
            carousel.style.paddingBottom = "5px";
            carousel.style.paddingTop = "5px";
        } else {
            carousel.style.paddingBottom = "";
            carousel.style.paddingTop = "";
        }
        
        // Adjust product cards for different screen sizes
        const productCards = carousel.querySelectorAll(".product-card");
        productCards.forEach(card => {
            if (isMobile) {
                card.style.minWidth = "160px";  // More compact cards on mobile
                card.style.maxWidth = "50%";
                card.style.margin = "0 4px";
                card.style.padding = "6px";
                card.style.borderRadius = "5px";
                card.style.boxShadow = "0 1px 3px rgba(0,0,0,0.1)";
                card.style.height = "270px"; // Fixed height for consistency
                card.style.display = "flex";
                card.style.flexDirection = "column";
            } else if (isTablet) {
                card.style.minWidth = "180px";
                card.style.maxWidth = "35%";
                card.style.margin = "0 6px";
                card.style.padding = "8px";
                card.style.borderRadius = "6px";
                card.style.boxShadow = "0 1px 4px rgba(0,0,0,0.1)";
                card.style.height = "230px"; // Fixed height for consistency
                card.style.display = "flex";
                card.style.flexDirection = "column";
            } else {
                card.style.minWidth = "";
                card.style.maxWidth = "";
                card.style.margin = "";
                card.style.padding = "";
                card.style.borderRadius = "";
                card.style.boxShadow = "";
                card.style.background = "";
                card.style.height = "";
                card.style.display = "";
                card.style.flexDirection = "";
            }
        });
        
        // Adjust product images for responsive display
        const images = carousel.querySelectorAll(".product-card img");
        images.forEach(img => {
            if (isMobile) {
                img.style.maxHeight = "180px";
                img.style.objectFit = "contain";
                img.style.margin = "0 auto";
                img.style.display = "block";
                img.style.width = "auto";
                img.style.flex = "1";
            } else if (isTablet) {
                img.style.maxHeight = "140px";
                img.style.objectFit = "contain";
                img.style.margin = "0 auto";
                img.style.display = "block";
                img.style.width = "auto";
                img.style.flex = "1";
            } else {
                img.style.maxHeight = "";
                img.style.objectFit = "";
                img.style.margin = "";
                img.style.display = "";
                img.style.width = "";
                img.style.flex = "";
            }
        });
        
        // Adjust product title and description text
        const titles = carousel.querySelectorAll(".product-card h3, .product-card .product-title");
        titles.forEach(title => {
            if (isMobile) {
                title.style.fontSize = "0.75rem";
                title.style.marginTop = "6px";
                title.style.lineHeight = "1.2";
                title.style.height = "2.4em";
                title.style.overflow = "hidden";
                title.style.textOverflow = "ellipsis";
                title.style.display = "-webkit-box";
                title.style.webkitLineClamp = "2";
                title.style.webkitBoxOrient = "vertical";
            } else if (isTablet) {
                title.style.fontSize = "0.85rem";
                title.style.marginTop = "8px";
                title.style.lineHeight = "1.3";
                title.style.height = "2.6em";
                title.style.overflow = "hidden";
                title.style.textOverflow = "ellipsis";
                title.style.display = "-webkit-box";
                title.style.webkitLineClamp = "2";
                title.style.webkitBoxOrient = "vertical";
            } else {
                title.style.fontSize = "";
                title.style.marginTop = "";
                title.style.lineHeight = "";
                title.style.height = "";
                title.style.overflow = "";
                title.style.textOverflow = "";
                title.style.display = "";
                title.style.webkitLineClamp = "";
                title.style.webkitBoxOrient = "";
            }
        });
        
        // Adjust scroll buttons for better visibility and usability
        const leftBtn = container.querySelector(".scroll-left");
        const rightBtn = container.querySelector(".scroll-right");
        if (leftBtn && rightBtn) {
            if (isMobile) {
                leftBtn.style.width = "24px";
                leftBtn.style.height = "24px";
                rightBtn.style.width = "24px";
                rightBtn.style.height = "24px";
                leftBtn.style.fontSize = "0.7rem";
                rightBtn.style.fontSize = "0.7rem";
                leftBtn.style.left = "2px";
                rightBtn.style.right = "2px";
                leftBtn.style.opacity = "0.9";
                rightBtn.style.opacity = "0.9";
                leftBtn.style.top = "50%";
                rightBtn.style.top = "50%";
                leftBtn.style.transform = "translateY(-50%)";
                rightBtn.style.transform = "translateY(-50%)";
            } else if (isTablet) {
                leftBtn.style.width = "30px";
                leftBtn.style.height = "30px";
                rightBtn.style.width = "30px";
                rightBtn.style.height = "30px";
                leftBtn.style.fontSize = "0.85rem";
                rightBtn.style.fontSize = "0.85rem";
                leftBtn.style.left = "5px";
                rightBtn.style.right = "5px";
                leftBtn.style.opacity = "0.9";
                rightBtn.style.opacity = "0.9";
                leftBtn.style.top = "50%";
                rightBtn.style.top = "50%";
                leftBtn.style.transform = "translateY(-50%)";
                rightBtn.style.transform = "translateY(-50%)";
            } else {
                leftBtn.style.width = "";
                leftBtn.style.height = "";
                rightBtn.style.width = "";
                rightBtn.style.height = "";
                leftBtn.style.fontSize = "";
                rightBtn.style.fontSize = "";
                leftBtn.style.left = "";
                leftBtn.style.right = "";
                rightBtn.style.right = "";
                leftBtn.style.opacity = "";
                rightBtn.style.opacity = "";
                leftBtn.style.top = "";
                rightBtn.style.top = "";
                leftBtn.style.transform = "";
                rightBtn.style.transform = "";
            }
        }
    });
}

// Initial call and add resize listener
makeCarouselResponsive();
window.addEventListener('resize', makeCarouselResponsive);

carousels.forEach(carousel => {
    const container = carousel.closest(".product-carousel-container");
    if (!container) return;

    const leftBtn = container.querySelector(".scroll-left");
    const rightBtn = container.querySelector(".scroll-right");

    if (!leftBtn || !rightBtn) return;

    function getScrollAmount() {
        // Adjust scroll amount based on screen size
        const base = carousel.querySelector(".product-card")?.offsetWidth + 20 || 300;
        return window.innerWidth < 768 ? base * 0.8 : base;
    }

    function checkScrollButtons() {
        leftBtn.disabled = carousel.scrollLeft <= 0;
        rightBtn.disabled = carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth;
    }

    leftBtn.addEventListener("click", () => {
        carousel.scrollBy({ left: -getScrollAmount(), behavior: "smooth" });
        setTimeout(checkScrollButtons, 300);
    });

    rightBtn.addEventListener("click", () => {
        carousel.scrollBy({ left: getScrollAmount(), behavior: "smooth" });
        setTimeout(checkScrollButtons, 300);
    });

    carousel.addEventListener("scroll", checkScrollButtons);
    window.addEventListener("resize", checkScrollButtons);
    checkScrollButtons();
});

// Drag-to-scroll (swipe-like) with touch support
carousels.forEach(carousel => {
    let isDragging = false;
    let startX, scrollLeft;

    // Mouse events
    carousel.addEventListener("mousedown", (e) => {
        isDragging = true;
        startX = e.pageX - carousel.offsetLeft;
        scrollLeft = carousel.scrollLeft;
        carousel.style.cursor = "grabbing";
    });

    carousel.addEventListener("mouseleave", () => {
        isDragging = false;
        carousel.style.cursor = "grab";
    });
    
    carousel.addEventListener("mouseup", () => {
        isDragging = false;
        carousel.style.cursor = "grab";
    });

    carousel.addEventListener("mousemove", (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - carousel.offsetLeft;
        const walk = (x - startX) * 2;
        carousel.scrollLeft = scrollLeft - walk;
    });
    
    // Touch events for mobile
    carousel.addEventListener("touchstart", (e) => {
        isDragging = true;
        startX = e.touches[0].pageX - carousel.offsetLeft;
        scrollLeft = carousel.scrollLeft;
    });
    
    carousel.addEventListener("touchend", () => {
        isDragging = false;
    });
    
    carousel.addEventListener("touchmove", (e) => {
        if (!isDragging) return;
        const x = e.touches[0].pageX - carousel.offsetLeft;
        const walk = (x - startX) * 2;
        carousel.scrollLeft = scrollLeft - walk;
    });
});

    // Submenu functionality
    document.querySelectorAll(".has-submenu > a").forEach(item => {
        item.addEventListener("click", function (e) {
            e.preventDefault();
            const parent = this.parentElement;
            const submenu = parent.querySelector(".submenu");

            if (submenu) {
                submenu.style.maxHeight = submenu.style.maxHeight ? null : submenu.scrollHeight + "px";
                parent.classList.toggle("open");
            }
        });
    });
});

//  Lightbox for More Products Page with Zoom
document.querySelectorAll(".product-card img").forEach(img => {
    img.addEventListener("click", function () {
        openLightbox(this.src, this.alt); // Opens lightbox with clicked image
    });
});

// Enhanced Lightbox Function with Zoom
function openLightbox(imageSrc, imageAlt = '') {
    // Create lightbox container
    const lightbox = document.createElement("div");
    lightbox.classList.add("lightbox");

    // Create lightbox content wrapper
    const lightboxContent = document.createElement("div");
    lightboxContent.classList.add("lightbox-content");

    // Create close button
    const closeButton = document.createElement("span");
    closeButton.classList.add("close-lightbox");
    closeButton.innerHTML = "&times;";

    // Create image container for zooming
    const imageContainer = document.createElement("div");
    imageContainer.classList.add("lightbox-image-container");

    // Create image element
    const image = document.createElement("img");
    image.src = imageSrc;
    image.alt = imageAlt;
    image.classList.add("lightbox-image");

    // // Add zoom functionality
    // imageContainer.addEventListener("mousemove", function(e) {
    //     const container = e.target.closest(".lightbox-image-container");
    //     const img = container.querySelector("img");
        
    //     // Calculate mouse position relative to container
    //     const rect = container.getBoundingClientRect();
    //     const x = (e.clientX - rect.left) / rect.width * 100;
    //     const y = (e.clientY - rect.top) / rect.height * 100;
        
    //     // Apply transform and background position for zoom effect
    //     img.style.transform = 'scale(2)';
    //     img.style.transformOrigin = `${x}% ${y}%`;
    // });

    // // Reset zoom when mouse leaves
    // imageContainer.addEventListener("mouseleave", function(e) {
    //     const img = e.target.querySelector("img");
    //     img.style.transform = 'scale(1)';
    //     img.style.transformOrigin = 'center center';
    // });

    // Assemble lightbox
    imageContainer.appendChild(image);
    lightboxContent.appendChild(closeButton);
    lightboxContent.appendChild(imageContainer);
    lightbox.appendChild(lightboxContent);
    document.body.appendChild(lightbox);

    // Function to close lightbox
    function closeLightbox() {
        document.body.removeChild(lightbox);
        // Remove the event listener to prevent memory leaks
        document.removeEventListener('keydown', escKeyHandler);
    }

    // ESC key handler
    function escKeyHandler(e) {
        if (e.key === 'Escape') {
            closeLightbox();
        }
    }

    // Add ESC key event listener
    document.addEventListener('keydown', escKeyHandler);

    // Close Lightbox via close button
    closeButton.addEventListener("click", closeLightbox);

    // Close Lightbox when clicking outside the image
    lightbox.addEventListener("click", (e) => {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });
}


document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchBox");
    const searchResults = document.getElementById("searchResults");
    let selectedIndex = -1;
    
   // Sample product data with IDs for scrolling
   const products = [     //{ name: "", category: "", id: "" },

// CHAIRS
        { name: "Monobloc Chair", category: "chairs", id: "monobloc-chair" },
        { name: "Black Stacking Chair Leatherette Cushion", category: "chairs", id: "black-stacking-chair-leatherette-cushion" },
        { name: "White Plastic Chair", category: "chairs", id: "white-plastic-chair" },
        { name: "Brown Folded Chair with Stainless Footing", category: "chairs", id: "brown-folded-chair" },
        { name: "White Special Chair(Nordic Chair with Cushion", category: "chairs", id: "white-special-chair-nordic" },
        { name: "Black Special Chair(Chopstick with Cushion)", category: "chairs", id: "white-special-chair-chopstick-cushion" },
        { name: "White Special Chair(Chopstick with Cushion)", category: "chairs", id: "white-special-chair-chopstick-cushion" },
        { name: "Black Special Chair(Chopstick Chair)", category: "chairs", id: "black-special-chair-chopstick" },
        { name: "White Special Chair(Chopstick Chair)", category: "chairs", id: "white-special-chair-chopstick" },
        { name: "Black Barstool Leatherette", category: "chairs", id: "black-barstool" },
        { name: "Black Hydraulic Chairs Low Backrest", category: "chairs", id: "black-hydraulic-chair" },
        { name: "White Hydraulic Chairs Low Backrest", category: "chairs", id: "white-hydraulic-chair" },
        { name: "Maroon Hydraulic Chairs High Backrest", category: "chairs", id: "maroon-hydraulic-chair" },
        { name: "Red Hydraulic Chairs High Backrest", category: "chairs", id: "red-hydraulic-chair" },
        { name: "Orange Hydraulic Chairs Smiley Type", category: "chairs", id: "orange-hydraulic-chair" },
        { name: "Yellow Hydraulic Chairs Smiley Type", category: "chairs", id: "yellow-hydraulic-chair" },
        { name: "Conference Chair", category: "chairs", id: "conference-chair" },
// TABLES
        { name: "Information System Table", category: "tables", id: "information-table" },
        { name: "Round Glass Conference Table(60 Diameter)", category: "tables", id: "round-glass-table-60" },
        { name: "Round Glass Conference Table(80 Diameter)", category: "tables", id: "round-glass-table-80" },
        { name: "Round Conference White Round Table(60 Diameter)", category: "tables", id: "round-white-table-60" },
        { name: "Round Conference White Round Table(80 Diameter)", category: "tables", id: "round-white-table-80" },
        { name: "Cocktail Glass Table(60 Diameter)", category: "tables", id: "cocktail-table-60" },
        { name: "Cocktail Glass Table(80 Diameter)", category: "tables", id: "cocktail-table-80" },
        { name: "Hydraulic White Round Table", category: "tables", id: "hydraulic-white-table" },
        { name: "Coffee Table Rectangular 1", category: "tables", id: "coffee-table-1" },
        { name: "Coffee Table Rectangular 2", category: "tables", id: "coffee-table-2" },
        { name: "System Lockable Table ( 1m .5m x .75m (h))", category: "tables", id: "system-lockable-table1" },
        { name: "System Lockable Table ( 1m .5m x 1m (h))", category: "tables", id: "system-lockable-table2" },
// CONFERENCE SET
        { name: "Conference Set 1", category: "conference", id: "conference-set1" },
        { name: "Conference Set 2", category: "conference", id: "conference-set2" },
        { name: "Conference Set 3", category: "conference", id: "conference-set3" },
        { name: "Conference Set 4", category: "conference", id: "conference-set4" },
        { name: "Conference Set 5", category: "conference", id: "conference-set5" },
        { name: "Conference Set 6", category: "conference", id: "conference-set6" },
        { name: "Conference Set 7", category: "conference", id: "conference-set7" },
// SOFA SET
        { name: "Sofa Set 1 Black Leatherette ((1) 3-seater, (2) 1-seater, (3) (1) Center Table)", category: "sofa-set", id: "sofa-set-1" },
        { name: "Sofa Set 2 Black Leatherette ((1) 3-seater, (2) 1-seater, (3) (1) Center Table)", category: "sofa-set", id: "sofa-set-2" },
        { name: "Sofa Set 3 Black Leatherette ((1) 2-seater, (2) 1-seater, (3) (1) Center Table)", category: "sofa-set", id: "sofa-set-3" },
        { name: "Sofa Set 4 Black Leatherette ((1) 2-seater, (2) 1-seater, (3) (1) Center Table)", category: "sofa-set", id: "sofa-set-4" },
// SOFA SINGLE
        { name: "Sofa 3 seater Black Leatherette", category: "sofa-single", id: "sofa-3-seater-black" },
        { name: "Sofa 1 seater Black Leatherette", category: "sofa-single", id: "sofa-1-seater-black" },
        { name: "Sofa 3 seater White Leatherette", category: "sofa-single", id: "sofa-3-seater-white" },
        { name: "Sofa 1 seater White Leatherette", category: "sofa-single", id: "sofa-1-seater-white" },
        { name: "Sofa 2 seater Black Leatherette", category: "sofa-single", id: "sofa-2-seater-black" },
        { name: "Sofa 2 seater White Leatherette", category: "sofa-single", id: "sofa-2-seater-white" },
        { name: "Sofa 2 seater Dark Gray Fabric", category: "sofa-single", id: "sofa-2-seater-dark-gray" },
        { name: "Ottoman", category: "sofa-single", id: "ottoman" },
// SHOWCASE
        { name: "Showcase Type A (1m x .5m x 1m (h))", category: "showcase", id: "showcase-a" },
        { name: "Showcase Type B (1m x .5m x 1.2m (h))", category: "showcase", id: "showcase-b" },
        { name: "Showcase Type C (1m x .5m x 1.8m (h))", category: "showcase", id: "showcase-c" },
// DISPLAY
        { name: "Standard Shelves (1m x .30m x 3/4 inches (thick)", category: "display", id: "standard-shelves1" },
        { name: "Standard Shelves (2m x .30m x 3/4 inches (thick))", category: "display", id: "standard-shelves2" },
        { name: "Wall Mounted Brochure Pocket 1( 4 cases )", category: "display", id: "wall-mounted-brochure-pocket1" },
        { name: "Wall Mounted Brochure Pocket 1( 2 cases )", category: "display", id: "wall-mounted-brochure-pocket2" },
        { name: "Wooded Brochure Standee 1( 3 pockets )", category: "display", id: "wooded-brochure-standee-1" },
        { name: "Acrylic Folded Brochure Standee 1 ( 4 pockets )", category: "display", id: "acrylic-folded-brochure-standee" },
        { name: "Universal TV Stand", category: "display", id: "universal-tv-stand" },
        { name: "Universal TV Bracket", category: "display", id: "universal-tv-bracket" },
        { name: "System Vertical Photo Panel ( 1m x 2.5m (h))", category: "display", id: "system-vertical-photo-panel1" },
        { name: "System Vertical Photo Panel with one spotlight", category: "display", id: "system-vertical-photo-panel2" },
//PROPS AND AIDS
        { name: "Dry Waste Bin 1", category: "props-and-aids", id: "dry-waste-bin1" },
        { name: "S Hook", category: "props-and-aids", id: "s-hook" },
        { name: "Tambiolo", category: "props-and-aids", id: "tambiolo" },
        { name: "Dressing Room Mirror", category: "props-and-aids", id: "dressing-room-mirror" },
        { name: "Easel Stand", category: "props-and-aids", id: "easel-stand" },
        { name: "Palochina Folded Rack 3 layer", category: "props-and-aids", id: "palochina-folded-rack3" },
        { name: "Palochina Folded Rack 4 layer", category: "props-and-aids", id: "palochina-folded-rack4" },
        { name: "X-Banner with Graphics printed of Tarp", category: "props-and-aids", id: "x-banner" },
        { name: "Pull up Banner with Graphics printed of Tarp", category: "props-and-aids", id: "pull-up-banner" },
// CARPET
        { name: "Needle Punched Carpet ( Standard Color Red, Green, Blue, Light Gray, Dark Gray, Black ) /sqm", category: "carpet", id: "needle-punched-carpet1" },
        { name: "Faux Grass Carpet /sqm", category: "carpet", id: "faux-grass-carpet" },
        { name: "Loop Pile Carpet Carpet /sqm", category: "carpet", id: "loop-pile-carpet" },
        { name: "Tile Carpet Carpet /sqm", category: "carpet", id: "tile-carpet" },
        { name: "Needle Punched Carpet ( Special Color ) /sqm", category: "carpet", id: "needle-punched-carpet2" },
// APPLIANCES
        { name: "Water Dispenser ( with 5 gal of water with 50 cups )", category: "appliances", id: "water-dispenser" },
        { name: "Refrigerator 1", category: "appliances", id: "refrigerator1" },
        { name: "Refrigerator 2", category: "appliances", id: "refrigerator2" },
        { name: "Chest Type Freezer 1 /day", category: "appliances", id: "chest-type-freezer-1" },
        { name: "Chest Type Freezer 2 /day", category: "appliances", id: "chest-type-freezer-2" },
        { name: "Chest Type Freezer 3 /day", category: "appliances", id: "chest-type-freezer-3" },
        { name: "Microwave Oven", category: "appliances", id: "microwave-oven" },
        { name: "Coffee Maker 1 gal of water with 50 cups", category: "appliances", id: "coffee-maker" },
        { name: "Stand Fan", category: "appliances", id: "stand-fan" },
        { name: "Electric Kettle", category: "appliances", id: "electric-kettle" },
        { name: "Projector Sets", category: "appliances", id: "projector-sets" },
        { name: "Alcohol Dispenser with 1 gal of Alcohol", category: "appliances", id: "alcohol-dispenser1" },
        { name: "Alcohol Dispenser with Thermometer with 1 gal Alcohol", category: "appliances", id: "alcohol-dispenser2" },
        { name: "Mist Spray with ultra violet light with 1 gal Disinfectant", category: "appliances", id: "mist-spray" },
// TV AND AUDIO VISUAL
        { name: "LED 32 Inches HDMI Ready with TV Stand/Wall mounted", category: "tv-and-audio-visual", id: "led-32" },
        { name: "LED 42 Inches HDMI Ready with TV Stand/Wall mounted", category: "tv-and-audio-visual", id: "led-42" },
        { name: "LED 50 Inches HDMI Ready with TV Stand/Wall mounted", category: "tv-and-audio-visual", id: "led-50" },
        { name: "LED 65 Inches HDMI Ready with TV Stand/Wall mounted", category: "tv-and-audio-visual", id: "led-65" },
        { name: "LED 75 Inches HDMI Ready with TV Stand/Wall mounted", category: "tv-and-audio-visual", id: "led-75" },
        { name: "LED Wall Standard Size with Basic Sound System", category: "tv-and-audio-visual", id: "led-wall-standard-size1" },
        { name: "LED Wall Standard Size", category: "tv-and-audio-visual", id: "led-wall-standard-size2" },
        { name: "LED Wall Other Size", category: "tv-and-audio-visual", id: "led-wall-other-size" },
// OUTLET AND ADAPTOR
        { name: "Convenience Outlet 3 gang", category: "outlet-and-adaptor", id: "convenience-outlet3" },
        { name: "Convenience Outlet 2 gang", category: "outlet-and-adaptor", id: "convenience-outlet2" },
        { name: "Convenience Outlet ( Universal )", category: "outlet-and-adaptor", id: "convenience-outlet1" },
        { name: "Universal Adaptor", category: "outlet-and-adaptor", id: "universal-adaptor" },
// BREAKER SINGLE PHASE
        { name: "Up to 4.4kw w/20 A Switch 1P", category: "breaker-single-phase", id: "breaker-single-phase1" },
        { name: "Up to 6.6kw w/30 A Switch 1P", category: "breaker-single-phase", id: "breaker-single-phase2" },
        { name: "Up to 15.4kw w/60 A Switch 1P", category: "breaker-single-phase", id: "breaker-single-phase3" },
        { name: "Up to 22.0kw w/100 A Switch 1P", category: "breaker-single-phase", id: "breaker-single-phase4" },
// BREAKER THREE PHASE
        { name: "30 Amps V 60 Hz Breaker 3P", category: "breaker-three-phase", id: "breaker-three-phase1" },
        { name: "60 Amps V 60 Hz Breaker 3P", category: "breaker-three-phase", id: "breaker-three-phase2" },
        { name: "100 Amps V 60 Hz Breaker 3P", category: "breaker-three-phase", id: "breaker-three-phase3" },
// TRANSFORMER
        { name: "Step-down Transformer ( Single Phase )", category: "transformer", id: "step-down-single" },
        { name: "Step-down Transformer ( Three Phase )", category: "transformer", id: "step-down-three" },
        { name: "Step-up Transformer ( Single Phase )", category: "transformer", id: "step-up-single" },
        { name: "Step-up Transformer ( Three Phase )", category: "transformer", id: "step-up-three" },
        { name: "Genset", category: "transformer", id: "genset" },
// LIGHT FITTINGS
        { name: "Flourescent Lamp(40 watts)", category: "light-fittings", id: "flourescent-lamp-40" },
        { name: "LED Flourescent (Day Light)", category: "light-fittings", id: "led-flourescent-day-light" },
        { name: "LED Pinlight( 5 watts )", category: "light-fittings", id: "led-pin-light1" },
        { name: "LED Pinlight( 15 watts )", category: "light-fittings", id: "led-pin-light2" },
        { name: "Long Arm Spotlight", category: "light-fittings", id: "long-arm-spotlight" },
        { name: "Short Arm Spotlight", category: "light-fittings", id: "short-arm-spotlight" },
        { name: "Track Bar with 3 Track Light", category: "light-fittings", id: "track-bar-track-light" },
        { name: "Halogen Pinlight", category: "light-fittings", id: "halogen-pinlight" },
        { name: "Floodlight 150 watts", category: "light-fittings", id: "floodlight1" },
        { name: "Floodlight 300 watts", category: "light-fittings", id: "floodlight2" },
        { name: "Metal Halide 150 watts", category: "light-fittings", id: "metal-halide1" },
        { name: "Metal Halide 400 watts", category: "light-fittings", id: "metal-halide2" },    
];
    
    if (searchInput && searchResults) {
        searchInput.addEventListener("input", function() {
            const query = searchInput.value.toLowerCase().trim();
            searchResults.innerHTML = "";
            selectedIndex = -1;
            
            if (query.length === 0) {
                searchResults.style.display = "none";
                return;
            }
            
            const filteredProducts = products.filter(product =>
                product.name.toLowerCase().includes(query) ||
                product.category.toLowerCase().includes(query)
            );
            
            if (filteredProducts.length > 0) {
                searchResults.style.display = "block";
                searchResults.style.maxHeight = window.innerWidth < 768 ? "150px" : "200px";
                searchResults.style.overflowY = "auto";
                
                filteredProducts.forEach((product, index) => {
                    const item = document.createElement("div");
                    item.classList.add("search-item", "p-2", "cursor-pointer", "hover:bg-[#3a3f54]", "transition-colors");
                    
                    // Highlight the matching text
                    const regex = new RegExp(`(${query})`, 'gi');
                    const highlightedText = product.name.replace(regex, '<span class="bg-[#f0a50060] text-white">$1</span>');
                    
                    item.innerHTML = highlightedText;
                    item.dataset.productId = product.id;
                    
                    item.addEventListener("click", function() {
                        selectProduct(product.name, product.id);
                    });
                    
                    searchResults.appendChild(item);
                });
            } else {
                // Show no results message
                searchResults.style.display = "block";
                const noResults = document.createElement("div");
                noResults.classList.add("p-2", "text-gray-400", "text-center");
                noResults.textContent = "No products found";
                searchResults.appendChild(noResults);
            }
        });

        searchInput.addEventListener("keydown", function(e) {
            const items = searchResults.querySelectorAll(".search-item");
            
            if (items.length > 0) {
                if (e.key === "ArrowDown") {
                    e.preventDefault();
                    selectedIndex = (selectedIndex + 1) % items.length;
                } else if (e.key === "ArrowUp") {
                    e.preventDefault();
                    selectedIndex = (selectedIndex - 1 + items.length) % items.length;
                } else if (e.key === "Enter") {
                    e.preventDefault();
                    if (selectedIndex === -1) {
                        selectedIndex = 0; // Default to the first item if no selection
                    }
                    if (items[selectedIndex]) {
                        searchInput.value = items[selectedIndex].textContent.replace(/\s+/g, ' ').trim();
                        searchResults.style.display = "none";
                        scrollToProduct(items[selectedIndex].dataset.productId);
                    }
                    return;
                } else if (e.key === "Escape") {
                    e.preventDefault();
                    searchInput.value = "";
                    searchResults.style.display = "none";
                    return;
                }
                
                items.forEach(item => item.classList.remove("bg-[#3a3f54]"));
                if (selectedIndex >= 0 && items[selectedIndex]) {
                    items[selectedIndex].classList.add("bg-[#3a3f54]");
                    items[selectedIndex].scrollIntoView({ block: "nearest" });
                }
            }
        });

        function selectProduct(name, productId) {
            searchInput.value = name;
            searchResults.style.display = "none";
            scrollToProduct(productId);
        }
    }

    function scrollToProduct(productId) {
        const productElement = document.getElementById(productId);
        if (productElement) {
            productElement.scrollIntoView({ behavior: "smooth", block: "center", inline: "center" });
            productElement.classList.add("highlight-product");
            setTimeout(() => {
                productElement.classList.remove("highlight-product");
            }, 1500);
        }
    }
        // Ensure smooth scrolling on all internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    
    document.addEventListener("click", function (e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.style.display = "none";
        }
    });
});



document.getElementById("backButton").addEventListener("click", function () {
    window.location.href = "index.php";
});


window.history.scrollRestoration = "manual";

window.onload = function () {
    window.scrollTo(0, 0);
};

// Back to top button functionality
document.addEventListener("DOMContentLoaded", function() {
    // Create the back to top button
    const backToTopBtn = document.createElement("button");
    backToTopBtn.id = "backToTopBtn";
    backToTopBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>`;
    
    // Updated class with responsive positioning
    // bottom-24 for desktop, media query handles mobile positioning
    backToTopBtn.className = "fixed bottom-24 right-6 bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg transition-all duration-300 flex items-center justify-center z-50 transform scale-0 opacity-0";
    document.body.appendChild(backToTopBtn);
    
    // Function to check scroll position and show/hide the button
    function toggleBackToTopButton() {
        if (window.scrollY > 300) {
            backToTopBtn.classList.remove("scale-0", "opacity-0");
            backToTopBtn.classList.add("scale-100", "opacity-100");
        } else {
            backToTopBtn.classList.remove("scale-100", "opacity-100");
            backToTopBtn.classList.add("scale-0", "opacity-0");
        }
    }
    
    // Add scroll event listener
    window.addEventListener("scroll", toggleBackToTopButton);
    
    // Add click event to scroll back to top
    backToTopBtn.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
    
    // Initial check in case page is refreshed while scrolled down
    toggleBackToTopButton();
});