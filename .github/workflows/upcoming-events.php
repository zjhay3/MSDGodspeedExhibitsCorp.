<?php
// Sample DB connection (update with your credentials)
$conn = new mysqli("localhost", "root", "", "msd_godspeed");

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch upcoming events (from today onwards)
$today = date('Y-m-d');
$sql = "SELECT * FROM events WHERE event_date >= '$today' ORDER BY event_date ASC LIMIT 10";
$result = $conn->query($sql);
?>

<!-- Add Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<section class="upcoming-events">
    <h2 class="text-[32px] font-normal font-archivo-black text-center mt-10 mb-6">
        Upcoming Events
    </h2>
    
    <!-- Swiper container -->
    <div class="swiper eventsSwiper">
        <div class="swiper-wrapper">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="swiper-slide">
                        <div class="event-card">
                            <?php if(!empty($row['event_image'])): ?>
                                <div class="event-image">
                                    <img src="<?= htmlspecialchars($row['event_image']) ?>" alt="<?= htmlspecialchars($row['event_name']) ?>">
                                </div>
                            <?php endif; ?>
                            <div class="event-info">
                                <h3><?= htmlspecialchars($row['event_name']) ?></h3>
                                <p class="event-date"><?= date('F j, Y', strtotime($row['event_date'])) ?></p>
                                <p class="event-location"><?= htmlspecialchars($row['event_location']) ?></p>
                                <p class="event-description"><?= htmlspecialchars(substr($row['event_description'], 0, 100)) ?>...</p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="swiper-slide">
                        <p class="font-archivo-narrow text-center whitespace-nowrap">
                            No upcoming events at the moment. Please check back later!
                        </p>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Add pagination bullets -->
        <div class="swiper-pagination"></div>
        
        <!-- Add hidden navigation arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<!-- Add Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<style>
/* Basic styling for all slides - default state */
.swiper-slide {
    width: 320px;                  /* Fixed width base */
    height: 450px;                 /* Fixed height base */
    transition: all 0.5s ease;
    transform: scale(0.65);        /* Significantly smaller for non-active slides */
    opacity: 0.6;                  /* More transparent for better contrast */
    z-index: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Center (active) slide: Full size */
.swiper-slide-active {
    transform: scale(1);           /* Active slide at 100% scale */
    opacity: 1;                    /* Full opacity */
    z-index: 3;                    /* Highest z-index to stay on top */
}

/* Previous and next slides: Must be explicitly smaller */
.swiper-slide-prev,
.swiper-slide-next {
    transform: scale(0.65);        /* Explicitly set smaller scale (65% of active) */
    opacity: 0.7;                  /* Less opacity than active */
    z-index: 2;                    /* Between active and other slides */
}

/* Create more space for the scaling effect */
.eventsSwiper {
    overflow: visible !important;  /* Must override Swiper's default hidden overflow */
    padding: 60px 0;               /* Increased padding to prevent clipping */
    margin: 0 -50px;               /* Negative margin to allow overflow without page scrollbars */
}

/* Container positioning fixes */
.swiper-container {
    position: relative;
    overflow: hidden;
    padding: 0 40px;
}

/* Ensuring uniform height and proper display */
.event-card {
    width: 100%;
    max-width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    border-radius: 12px;
    overflow: hidden;
    background: #111;
    padding: 20px;
    text-align: center;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    transition: all 0.5s ease;
}

/* Visual enhancement for active card */
.swiper-slide-active .event-card {
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
    background: #181818;
}

/* Add more space between slides */
.swiper-wrapper {
    padding: 20px 0;
}

/* Custom Pagination */
.swiper-pagination {
    position: relative;
    margin-top: 20px;
}

.swiper-pagination-bullet {
    width: 10px;
    height: 10px;
    background: #fff;
    opacity: 0.5;
    transition: all 0.3s ease;
}

.swiper-pagination-bullet-active {
    opacity: 1;
    background: rgb(159, 187, 0);
    width: 30px;
    border-radius: 5px;
}

/* Custom Navigation Arrows */
.swiper-button-next,
.swiper-button-prev {
    color: rgba(255, 255, 255, 0.7);
    transform: scale(0.8);
    transition: all 0.3s ease;
}

.swiper-button-next:hover,
.swiper-button-prev:hover {
    opacity: 1;
    color: rgb(159, 187, 0);
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .swiper-slide {
        width: 280px;
    }
}

@media (max-width: 768px) {
    .swiper-slide {
        height: 400px;
        width: 240px;
        transform: scale(0.6);     /* Even smaller on mobile */
    }
    
    .swiper-slide-active {
        transform: scale(1);       /* Keep active slide full size */
    }
    
    .swiper-slide-prev,
    .swiper-slide-next {
        transform: scale(0.6);     /* Match smaller scale on mobile */
    }

    .event-card {
        padding: 15px;
    }
}

@media (max-width: 576px) {
    .eventsSwiper {
        padding: 40px 0;
    }
    
    .swiper-slide {
        width: 200px;
        height: 350px;
    }
}
</style>

<!-- slidesPerView: 3,          // Fixed at exactly 3 slides 
centeredSlides: true,      // Center the active slide
loop: true,                // Enable continuous loop
spaceBetween: 30,          // Space between slides
initialSlide: 0,           // Start with first slide
speed: 500,                // Transition speed
grabCursor: true,          // Show grab cursor-->

<script>
// Initialize Swiper
document.addEventListener('DOMContentLoaded', function() {
    const swiper = new Swiper('.eventsSwiper', {
        slidesPerView: 3,     // Let slides determine their own width
        centeredSlides: true,      // Center the active slide
        loop: true,                // Enable continuous loop
        spaceBetween: 40,          // Increased space between slides
        initialSlide: 1,           // Start with second slide
        speed: 600,                // Slightly slower for better visual effect
        grabCursor: true,          // Show grab cursor
        
        // Coverflow effect settings
        coverflowEffect: {
            rotate: 0,             // No rotation
            stretch: 0,            // No stretching
            depth: 100,            // Good depth
            modifier: 2,           // Enhance the effect
            slideShadows: false    // No slide shadows
        },
        
        // Better visual updates
        observer: true,
        observeParents: true,
        
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1.3,
                spaceBetween: 20
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 2.2,
                spaceBetween: 30
            },
            // when window width is >= 992px
            992: {
                slidesPerView: 2.8,
                spaceBetween: 40
            }
        },
        
        // Make sure slide scaling works correctly
        on: {
            init: function() {
                // Add a small delay to ensure proper rendering
                setTimeout(() => {
                    this.update();
                }, 100);
            },
            resize: function() {
                // Force update on resize
                this.update();
            }
        }
    });
});
</script>


<?php
$conn->close();
?>