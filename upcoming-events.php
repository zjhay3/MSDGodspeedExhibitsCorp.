<?php
// Sample DB connection (update with your credentials)
$conn = new mysqli("localhost", "godspeedexhibits_godspeedexcorp", "?Vct9J5]T%*M", "godspeedexhibits_sub");

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch upcoming events (from today onwards)
$today = date('Y-m-d');
$sql = "SELECT * FROM events WHERE event_date >= '$today' ORDER BY event_date ASC LIMIT 10";
$result = $conn->query($sql);

// Track the number of events found
$eventCount = $result->num_rows;
?>

<!-- Add Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<section class="upcoming-events w-full max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-4xl font-archivo-black text-center mt-10 mb-12 text-gold">
        Upcoming Events
    </h2>
    
    <!-- Swiper container -->
    <div class="swiper eventsSwiper">
        <div class="swiper-wrapper">
            <?php if ($eventCount > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="swiper-slide">
                        <div class="event-card">
                            <?php if(!empty($row['event_image'])): ?>
                                <div class="event-image">
                                    <img src="<?= htmlspecialchars($row['event_image']) ?>" alt="<?= htmlspecialchars($row['event_name']) ?>" class="w-full h-48 object-cover rounded-t-lg">
                                </div>
                            <?php endif; ?>
                            <div class="event-info p-5">
                                <h3 class="text-xl font-archivo-black text-gold mb-2"><?= htmlspecialchars($row['event_name']) ?></h3>
                                <p class="event-date font-archivo text-sm mb-2"><span class="text-amber-400">Date:</span> <?= date('F j, Y', strtotime($row['event_date'])) ?></p>
                                <p class="event-location font-archivo text-sm mb-3"><span class="text-amber-400">Location:</span> <?= htmlspecialchars($row['event_location']) ?></p>
                                <p class="event-description text-sm line-clamp-3"><?= htmlspecialchars(substr($row['event_description'], 0, 100)) ?>...</p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="swiper-slide">
                    <div class="event-card flex items-center justify-center">
                        <p class="font-archivo-narrow text-center text-lg p-8">
                            No upcoming events at the moment. Please check back later!
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Add pagination bullets -->
        <div class="swiper-pagination"></div>
        
        <!-- Navigation arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<!-- Add Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<style>
/* Event section styling */
.upcoming-events {
    overflow: hidden;
    position: relative;
    padding-bottom: 60px;
}

/* Swiper container */
.eventsSwiper {
    padding: 30px 50px 50px;
    overflow: hidden !important; /* Keep overflow hidden for cleaner appearance */
    position: relative;
    z-index: 1;
}

/* Slide styling */
.swiper-slide {
    height: auto;
    transition: transform 0.6s cubic-bezier(0.25, 0.1, 0.25, 1), 
                opacity 0.6s cubic-bezier(0.25, 0.1, 0.25, 1);
    opacity: 0.7;
    transform: scale(0.9);
    will-change: transform, opacity; /* Optimize for animations */
    backface-visibility: hidden; /* Prevent flickering */
}

/* Active/Center slide styling */
.swiper-slide-active {
    opacity: 1;
    transform: scale(1);
    z-index: 2;
}

/* Adjacent slides styling for smoother visual transition */
.swiper-slide-prev, .swiper-slide-next {
    opacity: 0.85;
    transform: scale(0.95);
    z-index: 1;
}

/* Event card styling */
.event-card {
    height: 100%;
    width: 100%;
    background: rgba(1, 29, 2, 0.85);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    display: flex;
    flex-direction: column;
    border: 1px solid rgba(240, 165, 0, 0.2);
    transition: all 0.5s cubic-bezier(0.25, 0.1, 0.25, 1);
    backface-visibility: hidden; /* Prevent flicker during animations */
    transform-style: preserve-3d; /* Smoother transitions */
}

.swiper-slide-active .event-card {
    border-color: rgba(240, 165, 0, 0.6);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
    transform: translateY(-10px);
}

/* Event info styling */
.event-info {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.event-description {
    color: #e0e0e0;
    flex: 1;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
}

/* Pagination styling - improved for seamless transition */
.swiper-pagination {
    position: relative;
    bottom: 0;
    margin-top: 20px;
    transition: opacity 0.3s ease, transform 0.3s ease;
    z-index: 10;
}

.swiper-pagination-bullet {
    width: 10px;
    height: 10px;
    background: #fff;
    opacity: 0.5;
    transition: all 0.4s cubic-bezier(0.25, 0.1, 0.25, 1);
    margin: 0 5px;
}

.swiper-pagination-bullet-active {
    opacity: 1;
    background: #f0a500;
    width: 25px;
    border-radius: 5px;
}

/* Fix pagination for loop transitions */
.swiper-pagination-bullet:first-child,
.swiper-pagination-bullet:last-child {
    transition: all 0.6s cubic-bezier(0.25, 0.1, 0.25, 1);
}

/* Improved pagination transitions for looping */
.swiper-pagination-bullets {
    transition: transform 0.5s ease-out;
}

.swiper-pagination-bullet {
    transform-origin: center center;
    transition: all 0.4s cubic-bezier(0.25, 0.1, 0.25, 1);
}

/* Navigation arrow styling */
.swiper-button-next,
.swiper-button-prev {
    color: rgba(240, 165, 0, 0.7);
    background: rgba(1, 29, 2, 0.5);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    transform: scale(0.7);
    transition: all 0.3s ease;
}

.swiper-button-next:after,
.swiper-button-prev:after {
    font-size: 18px;
}

.swiper-button-next:hover,
.swiper-button-prev:hover {
    color: #f0a500;
    background: rgba(1, 29, 2, 0.8);
    transform: scale(0.75);
}

/* Fix for wrapper to prevent visual jumps */
.swiper-wrapper {
    transition-timing-function: cubic-bezier(0.1, 0.57, 0.1, 1) !important;
}

/* Style for duplicated slides in loop mode to ensure they look identical */
.swiper-slide-duplicate {
    pointer-events: auto !important; /* Ensure duplicated slides are interactive */
}

/* Fix for loop transition when jumping between first/last slides */
.swiper-wrapper {
    transform-style: flat !important; /* Prevent z-axis issues during loop transitions */
    will-change: transform !important; /* Hardware acceleration for smoother transitions */
}

/* Special handling for loop slides to eliminate any visual indication of reset */
.swiper-slide-duplicate-active,
.swiper-slide-duplicate-next,
.swiper-slide-duplicate-prev {
    pointer-events: auto !important;
    visibility: visible !important;
    opacity: inherit !important;
    transform: inherit !important;
}

/* Ensure no visual jumps during looping */
.swiper-wrapper .swiper-slide:first-child,
.swiper-wrapper .swiper-slide:last-child {
    transition: opacity 0.6s ease, transform 0.6s ease !important;
}

/* Style for disabled buttons (for right end limit) */
.swiper-button-disabled {
    opacity: 0.3;
    cursor: not-allowed;
    pointer-events: none;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .eventsSwiper {
        padding: 20px 10px 40px;
    }
    
    .swiper-button-next,
    .swiper-button-prev {
        display: none;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Track the total number of events
    const totalEvents = <?php echo $eventCount; ?>;
    
    const swiper = new Swiper('.eventsSwiper', {
        slidesPerView: 'auto',
        spaceBetween: 30,
        centeredSlides: true,
        loop: false, // Disable built-in loop for custom direction control
        speed: 600,
        grabCursor: true,
        observer: true,
        observeParents: true,
        watchOverflow: true,
        roundLengths: true,
        simulateTouch: true,
        initialSlide: 0, // Always start with the first slide (nearest upcoming event)
        allowTouchMove: true,
        shortSwipes: true,
        longSwipes: true,
        followFinger: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
            dynamicMainBullets: 3
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // Preload for smooth transitions
        preloadImages: true,
        updateOnImagesReady: true,
        // Responsive breakpoints
        breakpoints: {
            // Mobile screens
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // Tablet screens
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            // Desktop screens
            1024: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        },
        on: {
            init: function() {
                // Initialize active slide visuals
                setTimeout(() => {
                    updateSlideVisuals(this);
                    setupDirectionalSwipe(this);
                }, 10);
            },
            slideChange: function() {
                updateSlideVisuals(this);
                checkSlidePosition(this);
            },
            resize: function() {
                this.update();
            },
            // Handle slide transitions more smoothly
            beforeTransitionStart: function() {
                const slides = this.slides;
                for (let i = 0; i < slides.length; i++) {
                    slides[i].style.transition = 'transform 0.6s ease, opacity 0.6s ease';
                }
            }
        }
    });
    
    // Helper function to update slide visuals during transitions
    function updateSlideVisuals(swiperInstance) {
        // Reset all slides
        const slides = swiperInstance.slides;
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.opacity = "0.7";
            slides[i].style.transform = "scale(0.9)";
            slides[i].style.transition = "transform 0.6s ease, opacity 0.6s ease";
        }
        
        // Update active slide
        const activeIndex = swiperInstance.activeIndex;
        if (slides[activeIndex]) {
            slides[activeIndex].style.opacity = "1";
            slides[activeIndex].style.transform = "scale(1)";
        }
        
        // Update adjacent slides
        if (slides[activeIndex - 1]) {
            slides[activeIndex - 1].style.opacity = "0.85";
            slides[activeIndex - 1].style.transform = "scale(0.95)";
        }
        if (slides[activeIndex + 1]) {
            slides[activeIndex + 1].style.opacity = "0.85";
            slides[activeIndex + 1].style.transform = "scale(0.95)";
        }
    }
    
    // Custom function to implement directional swipe behavior
    function setupDirectionalSwipe(swiperInstance) {
        // Disable right swiping if at the first slide (latest event)
        checkSlidePosition(swiperInstance);
        
        // Add custom touch handlers for unlimited left swiping
        const swiperEl = swiperInstance.el;
        let touchStartX = 0;
        
        swiperEl.addEventListener('touchstart', function(e) {
            touchStartX = e.touches[0].pageX;
        }, { passive: true });
        
        swiperEl.addEventListener('touchend', function(e) {
            const touchEndX = e.changedTouches[0].pageX;
            const diff = touchEndX - touchStartX;
            
            // If swipe left (negative diff) and at the last slide
            if (diff < -50 && swiperInstance.isEnd) {
                // Jump back to the beginning + 1 to simulate infinite left swiping
                swiperInstance.slideTo(0, 0, false);
                // Then animate to the next slide
                setTimeout(() => {
                    swiperInstance.slideNext();
                }, 10);
            }
        }, { passive: true });
    }
    
    // Function to check and handle right swipe limits
    function checkSlidePosition(swiperInstance) {
        const nextBtn = swiperInstance.navigation.nextEl;
        const prevBtn = swiperInstance.navigation.prevEl;
        
        // If we're at the first slide (index 0), disable right swiping
        if (swiperInstance.activeIndex === 0) {
            if (prevBtn) prevBtn.classList.add('swiper-button-disabled');
        } else {
            if (prevBtn) prevBtn.classList.remove('swiper-button-disabled');
        }
        
        // Always enable left swiping for infinite loop effect
        if (nextBtn) nextBtn.classList.remove('swiper-button-disabled');
    }
    
    // Custom navigation control for infinite left swiping
    document.querySelector('.swiper-button-next').addEventListener('click', function() {
        if (swiper.isEnd) {
            // When at the end, go back to start and then move one forward
            swiper.slideTo(0, 0, false);
            setTimeout(() => {
                swiper.slideNext();
            }, 10);
        }
    });
    
    // Force an initial update after a slight delay to ensure everything is rendered
    setTimeout(() => {
        swiper.update();
    }, 100);
});
</script>

<?php
$conn->close();
?>