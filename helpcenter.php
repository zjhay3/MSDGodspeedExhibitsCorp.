<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.png" type="image/png">
    <title>Help Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: 'rgb(0, 99, 5)',
                            dark: 'rgb(0, 98, 0)',
                            darker: 'rgb(0, 130, 4)',
                            light: '#66BB6A',
                        },
                        secondary: {
                            DEFAULT: '#5897FB',
                            dark: '#1D69E2',
                        },
                        accent: '#f0a500',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Georgia:wght@400;500;700&display=swap');
        
        body {
            font-family: 'Swiss721', Georgia, serif;
        }
        
        .hero-background {
            background-image: url("images/footer-background.png");
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
        }
        
        .star {
            position: relative;
            display: inline-block;
        }
        .half-star {
            position: relative;
            display: inline-block;
            color: #E5E7EB; /* gray-300 */
        }
        .half-star:before {
            content: '★';
            position: absolute;
            left: 0;
            width: 50%;
            overflow: hidden;
            color: #FBBF24; /* yellow-400 */
        }
    </style>
</head>
<body class="bg-gray-50 m-0 p-0">
    <!-- Header -->
    <header class="flex justify-between items-center px-4 md:px-12 lg:px-16 py-5 bg-white relative overflow-hidden">
        <a href="index.php">
            <img src="images/img.png" alt="Company Logo" class="w-64 h-auto md:w-[340px]">
        </a>
    </header>

    <!-- Hero Section -->
    <section class="hero-background text-white text-center py-10 md:py-12 lg:py-16 px-4 md:px-6 relative">
        <div class="absolute inset-0 bg-black bg-opacity-20 z-0"></div>
        <div class="relative z-10">
            <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-6 md:mb-8">How can we help?</h1>
            <div class="max-w-md md:max-w-xl lg:max-w-2xl mx-auto relative">
                <input type="text" class="w-full py-3 md:py-4 px-4 md:px-5 rounded-full border-none text-base text-black" placeholder="Type your question" id="searchInput">
                <button class="absolute right-3 md:right-4 top-1/2 transform -translate-y-1/2 bg-transparent border-none cursor-pointer">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
                <div class="absolute top-full mt-1 left-0 w-full bg-white text-black border border-gray-700 rounded shadow-lg z-50 max-h-[450px] overflow-y-auto hidden" id="searchResults">
                    <!-- Search results will be populated here -->
                </div>
            </div>  
        </div>
    </section>

    <!-- Navigation Tabs -->
    <nav class="flex justify-center border-b border-gray-200">
        <a href="#faq" class="px-4 md:px-6 py-4 cursor-pointer no-underline text-gray-600 font-medium hover:text-black nav-tab active" id="faq-tab">FAQ</a>
        <a href="#testimonials" class="px-4 md:px-6 py-4 cursor-pointer no-underline text-gray-600 font-medium hover:text-black nav-tab" id="testimonials-tab">Testimonials</a>
        <a href="#submit-feedback" class="px-4 md:px-6 py-4 cursor-pointer no-underline text-gray-600 font-medium hover:text-black nav-tab" id="feedback-tab">Submit Feedback</a>
    </nav>

    <!-- Featured Articles Section -->
    <section class="py-10 md:py-16 px-4 md:px-6 max-w-screen-xl mx-auto featured-section">
        <h2 class="text-center text-2xl md:text-3xl text-gray-800 mb-8 md:mb-10">Featured Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 articles-grid">
            <div class="mb-6 md:mb-8">
                <div class="text-gray-600 text-sm mb-1">Booth Services</div>
                <a href="#" class="text-base md:text-lg font-medium text-black no-underline block hover:underline article-title">What Does Booth Construction Include?</a>
            </div>

            <div class="mb-6 md:mb-8">
                <div class="text-gray-600 text-sm mb-1">Logistics & Setup</div>
                <a href="#" class="text-base md:text-lg font-medium text-black no-underline block hover:underline article-title">How We Manage Event Logistics</a>
            </div>

            <div class="mb-6 md:mb-8">
                <div class="text-gray-600 text-sm mb-1">Creative Services</div>
                <a href="#" class="text-base md:text-lg font-medium text-black no-underline block hover:underline article-title">Design & Branding for Your Booth</a>
            </div>

            <div class="mb-6 md:mb-8">
                <div class="text-gray-600 text-sm mb-1">Support Services</div>
                <a href="#" class="text-base md:text-lg font-medium text-black no-underline block hover:underline article-title">Installation and Dismantling Process</a>
            </div>

            <div class="mb-6 md:mb-8">
                <div class="text-gray-600 text-sm mb-1">Rentals</div>
                <a href="#" class="text-base md:text-lg font-medium text-black no-underline block hover:underline article-title">What Can I Rent for My Exhibit?</a>
            </div>

            <div class="mb-6 md:mb-8">
                <div class="text-gray-600 text-sm mb-1">Client Services</div>
                <a href="#" class="text-base md:text-lg font-medium text-black no-underline block hover:underline article-title">How to Inquire or Book Our Services</a>
            </div>
        </div>
    </section>

    <!-- Answer Section (Initially Hidden) -->
    <section class="py-10 md:py-16 px-4 md:px-6 max-w-screen-xl mx-auto hidden answer-section">
        <div class="bg-gray-200 rounded-lg shadow p-6 md:p-8">
            <div class="mb-5">
                <button id="backToResults" class="bg-transparent border-0 text-black text-base cursor-pointer p-0 flex items-center font-medium hover:underline">← Back to results</button>
            </div>
            <div id="fullAnswer"></div>
        </div>
    </section>

    <!-- Testimonial Section (Initially Hidden) -->
    <section class="py-10 md:py-16 px-4 md:px-6 max-w-screen-xl mx-auto hidden" id="testimonialSection">
        <h2 class="text-center text-2xl md:text-3xl text-gray-800 mb-6 md:mb-8">Customer Testimonials</h2>

        <div class="flex justify-center flex-wrap mb-6 md:mb-8">
            <button class="border border-primary-darker bg-transparent text-black py-2 px-4 mx-2 my-1 rounded-full cursor-pointer transition duration-300 hover:bg-primary-light hover:border-primary-light filter-btn active" data-filter="all">All</button>
            <button class="border border-primary-darker bg-transparent text-black py-2 px-4 mx-2 my-1 rounded-full cursor-pointer transition duration-300 hover:bg-primary-light hover:border-primary-light filter-btn" data-filter="product">Product</button>
            <button class="border border-primary-darker bg-transparent text-black py-2 px-4 mx-2 my-1 rounded-full cursor-pointer transition duration-300 hover:bg-primary-light hover:border-primary-light filter-btn" data-filter="service">Service</button>
            <button class="border border-primary-darker bg-transparent text-black py-2 px-4 mx-2 my-1 rounded-full cursor-pointer transition duration-300 hover:bg-primary-light hover:border-primary-light filter-btn" data-filter="support">Support</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8" id="testimonialsContainer">
            <!-- Testimonials will load here -->
        </div>
    </section>

    <!-- Submit Feedback Section (Initially Hidden) -->
    <section id="submit-feedback" class="py-16 px-4 bg-gray-100 hidden">
        <div class="flex justify-between gap-8 flex-wrap max-w-4xl mx-auto bg-white rounded-3xl p-8 shadow-lg">
            <!-- Left Side -->
            <div class="flex-1 min-w-[40%]">
                <h2 class="text-2xl text-gray-900 mb-4">MSD Godspeed Exhibits Corp.</h2>
                <div class="text-gray-700">
                    <p class="mb-1">(02) 8 570-8069</p>
                    <br>
                    <p class="mb-6">0915-9785683</p>
                    
                    <a href="https://maps.app.goo.gl/GQJoP1aYDHUgPhux8" target="_blank" class="text-secondary hover:text-secondary-dark mb-3 block">
                        #324 Navy Road Veterans Village, Barangay, Holy Spirit, Diliman, Quezon City, Philippines 1127
                    </a>
                    
                    <a href="https://maps.app.goo.gl/ntNrevxVrpNNQAy7A" target="_blank" class="text-secondary hover:text-secondary-dark mb-6 block">
                        #1 King Constantine Street Kingspoint Subdivision Bagbag, Quezon City
                    </a>
                </div>
                <div class="flex gap-4 mt-6">
                    <a href="https://www.facebook.com/MSDGospeedExhibitsCorp" class="social-link">
                        <img src="images/facebookk.png" alt="Facebook" class="w-16 h-16 transition-transform duration-300 hover:scale-110">
                    </a>
                    <a href="https://www.instagram.com/msdgodspeed2022/" class="social-link">
                        <img src="images/instagramm.png" alt="Instagram" class="w-16 h-16 transition-transform duration-300 hover:scale-110">
                    </a>
                </div>
            </div>

            <!-- Right Side (Form) -->
            <div class="flex-1 min-w-[45%]">
                <div id="status-message" class="text-center"></div>
                <form id="feedback-form" class="flex flex-col">
                    <h3 class="text-xl mb-6 text-gray-900">Submit Your Feedback</h3>
                    
                    <div class="mb-5">
                        <label for="name" class="block font-semibold mb-2 text-gray-900">Name</label>
                        <input type="text" id="name" name="name" placeholder="Your name (optional)" class="w-full py-3 px-4 border border-gray-300 rounded-lg transition duration-300 focus:border-secondary focus:outline-none">
                    </div>

                    <div class="mb-5">
                        <label for="email" class="block font-semibold mb-2 text-gray-900">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" placeholder="Your email" required class="w-full py-3 px-4 border border-gray-300 rounded-lg transition duration-300 focus:border-secondary focus:outline-none">
                    </div>

                    <div class="mb-5">
                        <label for="rating" class="block font-semibold mb-2 text-gray-900">Rating <span class="text-red-500">*</span></label>
                        <div class="flex cursor-pointer" id="star-rating">
                            <span class="text-5xl text-gray-300 mx-1 transition-colors duration-300 star" data-value="1">&#9733;</span>
                            <span class="text-5xl text-gray-300 mx-1 transition-colors duration-300 star" data-value="2">&#9733;</span>
                            <span class="text-5xl text-gray-300 mx-1 transition-colors duration-300 star" data-value="3">&#9733;</span>
                            <span class="text-5xl text-gray-300 mx-1 transition-colors duration-300 star" data-value="4">&#9733;</span>
                            <span class="text-5xl text-gray-300 mx-1 transition-colors duration-300 star" data-value="5">&#9733;</span>
                        </div>
                        <input type="hidden" name="rating" id="rating" required>
                    </div>

                    <div class="mb-5">
                        <label for="message" class="block font-semibold mb-2 text-gray-900">Feedback <span class="text-red-500">*</span></label>
                        <textarea id="message" name="message" rows="5" placeholder="Share your thoughts..." required class="w-full py-3 px-4 border border-gray-300 rounded-lg resize-y transition duration-300 focus:border-secondary focus:outline-none"></textarea>
                    </div>

                    <button type="submit" class="bg-secondary text-white border-0 py-3 px-8 rounded-full text-base cursor-pointer transition duration-300 hover:bg-secondary-dark transform hover:scale-[1.03] submit-btn">Send Feedback</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Floating Contact Button -->
    <a href="contact.php" class="fixed bottom-8 right-8 bg-accent text-white text-base py-3 px-5 rounded-full font-bold shadow-md transition duration-300 hover:bg-yellow-600 hover:scale-110 flex items-center gap-3 z-50">Contact Us</a>
    
    <!-- Back Button -->
    <button id="backButton" class="fixed top-5 right-5 font-archivo-narrow py-3 px-4 bg-black bg-opacity-10 backdrop-blur text-black border-2 border-black rounded-lg cursor-pointer text-base flex items-center gap-2 transition-all duration-300 hover:bg-black hover:bg-opacity-20 hover:scale-105 shadow-md z-50">
        <span class="text-xl font-bold">&#8592;</span> <!-- Left arrow -->
    </button>

    <!-- Load EmailJS library -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
// Initialize EmailJS with your user ID
emailjs.init("N4KnnXr5z0Hxj8y80");  // Your EmailJS User ID

// Main elements
const searchInput = document.getElementById('searchInput');
const searchResults = document.getElementById('searchResults');
const featuredSection = document.querySelector('.featured-section');
const testimonialSection = document.getElementById('testimonialSection');
const submitFeedbackSection = document.getElementById('submit-feedback');
const answerSection = document.querySelector('.answer-section');

// FAQ Data
const faqData = {
    "booth construction": "MSD Godspeed specializes in constructing high-quality booth systems tailored to client needs. We provide over 1,500 modular booths and have completed almost 15,000 exhibition setups. Our booths are designed for functionality, aesthetics, and ease of setup and dismantling.",

    "event logistics": "We handle full logistics management for exhibitions and events—from transportation to on-site coordination—ensuring every detail is taken care of efficiently. Our team manages furniture, lighting, fixtures, and technical equipment to keep your event running smoothly.",

    "custom exhibit design": "Our creative team delivers branding and design services including 3D concepts, storyboards, lighting design, and technical planning. We turn ideas into impactful visual experiences aligned with your brand personality and audience.",

    "installation and dismantling": "Our expert workforce manages the installation and dismantling of booths and event setups with speed and precision. With over 200 skilled on-call workers, we ensure fast and safe turnover for any event size.",

    "rental services": "We offer rental of booth systems, furniture, fixtures, electrical and AV equipment. Whether it's for a single-day event or a week-long exhibit, we provide clean, reliable inventory with delivery and setup included.",

    "project management": "Each project is overseen by our dedicated managers, ensuring seamless execution from planning to completion. We coordinate with organizers, suppliers, and clients for a worry-free experience.",

    "maintenance and storage": "Need to store your materials or reuse them for future events? We offer secure maintenance and storage services for booths and other event components.",

    "visual identity and signage": "From concept to execution, we handle all visual identity requirements, including branded signage, display panels, and directional signs that enhance visibility and communication at your event.",

    "inquire or book services": "To inquire or book our services, contact us at (02) 8 570-8069 or visit us at 324 Navy Road, Veterans Village, Quezon City. You can also email us to schedule a consultation or request a custom proposal."
};

// Initialize content based on active tab when page loads
showDefaultContent();

// Handle click on FAQ article titles
document.querySelectorAll('.article-title').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        const titleText = this.textContent;
        const mapping = {
            "What Does Booth Construction Include?": "booth construction",
            "How We Manage Event Logistics": "event logistics",
            "Design & Branding for Your Booth": "custom exhibit design",
            "Installation and Dismantling Process": "installation and dismantling",
            "What Can I Rent for My Exhibit?": "rental services",
            "How to Inquire or Book Our Services": "inquire or book services"
        };
        const questionKey = mapping[titleText];
        if (questionKey && faqData[questionKey]) {
            showFullAnswer(questionKey, faqData[questionKey]);
        }
    });
});

// Handle input suggestions in search
searchInput.addEventListener('keyup', function (event) {
    const query = this.value.toLowerCase().trim();
    searchResults.innerHTML = '';

    if (query.length === 0) {
        answerSection.classList.add('hidden');
        showDefaultContent();
        searchResults.classList.add('hidden');
        return;
    }

    if (query.length < 2) {
        searchResults.classList.add('hidden');
        return;
    }

    let hasResults = false;
    for (const question in faqData) {
        if (question.includes(query)) {
            hasResults = true;
            const resultDiv = document.createElement('div');
            resultDiv.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer';
            resultDiv.innerHTML = highlightText(question, query);
            resultDiv.setAttribute('data-question', question);
            resultDiv.addEventListener('click', function () {
                const question = this.getAttribute('data-question');
                showFullAnswer(question, faqData[question]);
                searchResults.classList.add('hidden');
            });
            searchResults.appendChild(resultDiv);
        }
    }

    if (event.key === 'Enter' && hasResults) {
        const firstQuestion = searchResults.querySelector('div').getAttribute('data-question');
        showFullAnswer(firstQuestion, faqData[firstQuestion]);
        searchResults.classList.add('hidden');
    }

    searchResults.classList.toggle('hidden', !hasResults);
});

// Hide suggestions when clicking outside
document.addEventListener('click', function (event) {
    if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
        searchResults.classList.add('hidden');
    }
});

// Handle back button in answer section
document.getElementById('backToResults').addEventListener('click', function () {
    answerSection.classList.add('hidden');
    showDefaultContent();
});

// Handle tab switching
document.querySelectorAll('.nav-tab').forEach(tab => {
    tab.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelectorAll('.nav-tab').forEach(t => t.classList.remove('active', 'border-b-2', 'border-black', 'text-black'));
        this.classList.add('active', 'border-b-2', 'border-black', 'text-black');

        // Reset all content
        featuredSection.classList.add('hidden');
        testimonialSection.classList.add('hidden');
        if (submitFeedbackSection) submitFeedbackSection.classList.add('hidden');
        answerSection.classList.add('hidden');

        const tabId = this.getAttribute('id');
        
        if (tabId === 'faq-tab') {
            featuredSection.classList.remove('hidden');
        } else if (tabId === 'testimonials-tab') {
            testimonialSection.classList.remove('hidden');
        } else if (tabId === 'feedback-tab') {
            if (submitFeedbackSection) {
                submitFeedbackSection.classList.remove('hidden');
                submitFeedbackSection.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
});

// Filter testimonials
document.querySelectorAll('.filter-btn').forEach(button => {
    button.addEventListener('click', function () {
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('active', 'bg-primary-light', 'text-white');
            btn.classList.add('bg-transparent', 'text-black');
        });
        
        this.classList.add('active', 'bg-primary-light', 'text-white');
        this.classList.remove('bg-transparent', 'text-black');

        const filterValue = this.getAttribute('data-filter');
        document.querySelectorAll('.testimonial-card').forEach(card => {
            if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });
    });
});

// Helper function to show full answer
function showFullAnswer(question, answer) {
    featuredSection.classList.add('hidden');
    testimonialSection.classList.add('hidden');
    if (submitFeedbackSection) submitFeedbackSection.classList.add('hidden');

    answerSection.classList.remove('hidden');
    document.getElementById('fullAnswer').innerHTML = `
        <h2 class="text-2xl font-bold mb-4 text-gray-800">${question}?</h2>
        <div class="text-gray-700">${answer}</div>
    `;
    answerSection.scrollIntoView({ behavior: 'smooth' });
}

// Helper function to show default content
function showDefaultContent() {
    const activeTab = document.querySelector('.nav-tab.active')?.id;
    
    featuredSection.classList.add('hidden');
    testimonialSection.classList.add('hidden');
    if (submitFeedbackSection) submitFeedbackSection.classList.add('hidden');
    
    if (activeTab === 'faq-tab') {
        featuredSection.classList.remove('hidden');
    } else if (activeTab === 'testimonials-tab') {
        testimonialSection.classList.remove('hidden');
    } else if (activeTab === 'feedback-tab' && submitFeedbackSection) {
        submitFeedbackSection.classList.remove('hidden');
    }
}

// Helper function to highlight search text
function highlightText(text, query) {
    const regex = new RegExp(`(${query})`, 'gi');
    return text.replace(regex, '<span class="font-semibold bg-yellow-100">$1</span>');
}

// Star rating system
const stars = document.querySelectorAll('.star');
const ratingInput = document.getElementById('rating');
let selectedRating = 0;
let hoverRating = 0;

if (stars.length > 0) {
    stars.forEach(star => {
        // Click event for selecting rating
        star.addEventListener('click', function(e) {
            const rect = this.getBoundingClientRect();
            const clickX = e.clientX - rect.left; // X position within the star
            const starWidth = rect.width;
            const starValue = parseInt(this.getAttribute('data-value'));
            
            // Determine if click was on left (half) or right (full) side of star
            if (clickX < starWidth / 2) {
                // Half star selected (e.g., 3.5)
                selectedRating = starValue - 0.5;
            } else {
                // Full star selected (e.g., 4)
                selectedRating = starValue;
            }
            
            ratingInput.value = selectedRating;
            updateStarDisplay();
        });

        // Mouseover event for hover effect
        star.addEventListener('mouseover', function(e) {
            const rect = this.getBoundingClientRect();
            const mouseX = e.clientX - rect.left;
            const starWidth = rect.width;
            const starValue = parseInt(this.getAttribute('data-value'));
            
            if (mouseX < starWidth / 2) {
                hoverRating = starValue - 0.5;
            } else {
                hoverRating = starValue;
            }
            
            updateStarDisplay(true);
        });
    });

    // Mouseout event to reset hover effect
    document.getElementById('star-rating').addEventListener('mouseout', function() {
        hoverRating = 0;
        updateStarDisplay();
    });
}

// Update star display based on selection or hover
function updateStarDisplay(isHover = false) {
    const displayRating = isHover ? hoverRating : selectedRating;
    
    stars.forEach(star => {
        const starValue = parseInt(star.getAttribute('data-value'));
        
        // Reset all classes first
        star.className = 'text-5xl mx-1 transition-colors duration-300 star';
        star.removeAttribute('style');
        
        if (displayRating >= starValue) {
            // Full star
            star.classList.add('text-yellow-400');
        } else if (displayRating > starValue - 1 && displayRating < starValue) {
            // Half star - apply the half-star class
            star.classList.add('half-star');
        } else {
            // Empty star
            star.classList.add('text-gray-300');
        }
    });
    
    // Update the hidden rating field
    ratingInput.value = selectedRating;
}

    // UPDATED FORM SUBMISSION HANDLING
    const feedbackForm = document.getElementById('feedback-form');
    if (feedbackForm) {
        feedbackForm.addEventListener('submit', function(event) {
            event.preventDefault();
            
            const formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                rating: document.getElementById('rating').value,
                message: document.getElementById('message').value,
                date: new Date().toLocaleString()
            };

            // Show loading state
            const submitBtn = document.querySelector('.submit-btn');
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;

            // First send to your database
            fetch('save_feedback.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    throw new Error(data.error);
                }
                
                // If database save is successful, send via EmailJS
                return emailjs.send('service_ci53h1f', 'template_o2yy36z', {
                    to_email: "wdcampos@msdgodspeedexhibits.com",
                    reply_to: formData.email,
                    from_name: formData.name || 'Anonymous',
                    from_email: formData.email,
                    name: formData.name,
                    email: formData.email,
                    rating: formData.rating,
                    message: formData.message,
                    date: formData.date
                });
            })
            .then(
                function(response) {
                    document.getElementById('status-message').innerHTML = 
                        'Thank you! Your feedback has been submitted.';
                    document.getElementById('status-message').style.color = 'green';
                    document.getElementById('feedback-form').reset();
                },
                function(error) {
                    document.getElementById('status-message').innerHTML = 
                        'Error: ' + error.message + '. Please try again or contact us directly.';
                    document.getElementById('status-message').style.color = 'red';
                }
            )
            .finally(() => {
                submitBtn.textContent = 'Send Feedback';
                submitBtn.disabled = false;
            });
        });
    }

// Back button event listener
document.getElementById("backButton").addEventListener("click", function () {
    window.location.href = "index.php";
});

// Load testimonials
fetch("get_testimonials.php")
    .then(response => response.json())
    .then(data => {
        const container = document.getElementById("testimonialsContainer");
        if (container) {
            container.innerHTML = "";

            data.forEach(t => {
                // Create star rating display
                let starRating = '';
                for (let i = 1; i <= 5; i++) {
                    if (i <= t.rating) {
                        starRating += '<span class="text-yellow-400">★</span>';
                    } else {
                        starRating += '<span class="text-gray-300">☆</span>';
                    }
                }
                
                container.innerHTML += `
                <div class="testimonial-card bg-white rounded-lg shadow-md p-6 mb-6" data-category="${t.category}">
                    <div class="mb-4">
                        <p class="text-gray-700">"${t.content}"</p>
                    </div>
                    <div class="flex items-center">
                        <img src="${t.avatar}" alt="User Avatar" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <div class="font-medium text-gray-900">${t.name}</div>
                            <div class="text-gray-500 text-sm">${t.location}</div>
                            <div class="mt-1">${starRating}</div>
                        </div>
                    </div>
                </div>
                `;
            });

            // Make sure to show testimonials section if testimonials tab is active
            if (document.querySelector('.nav-tab.active')?.id === 'testimonials-tab') {
                testimonialSection.classList.remove('hidden');
            }
        }
    })
    .catch(error => {
        console.error("Error loading testimonials:", error);
        const container = document.getElementById("testimonialsContainer");
        if (container) {
            container.innerHTML = `<div class="text-center text-red-600 p-4">Failed to load testimonials. Please try refreshing the page.</div>`;
        }
    });
    
// Set initial active tab
const initialActiveTab = document.querySelector('.nav-tab.active');
if (initialActiveTab) {
    initialActiveTab.classList.add('border-b-2', 'border-black', 'text-black');
}
});
// Add this function to the bottom of your existing help-center.js file
document.addEventListener('DOMContentLoaded', function() {
// Function to handle responsive layout for the feedback form
function handleFeedbackFormResponsiveness() {
    const submitFeedbackSection = document.getElementById('submit-feedback');
    const formContainer = submitFeedbackSection.querySelector('.flex.justify-between');
    const windowWidth = window.innerWidth;
    
    if (windowWidth < 768) { // Mobile breakpoint
        // Apply mobile-specific styles
        formContainer.classList.remove('flex-wrap');
        formContainer.classList.add('flex-col');
        
        // Adjust the form container width and padding
        formContainer.style.padding = '1.5rem';
        
        // Make sure the form and contact info take full width
        const contactInfo = formContainer.querySelector('.flex-1:first-child');
        const feedbackForm = formContainer.querySelector('.flex-1:last-child');
        
        if (contactInfo && feedbackForm) {
            contactInfo.style.minWidth = '100%';
            contactInfo.style.marginBottom = '2rem';
            feedbackForm.style.minWidth = '100%';
        }
        
        // Adjust star rating display size for smaller screens
        const stars = document.querySelectorAll('.star');
        stars.forEach(star => {
            star.classList.remove('text-5xl');
            star.classList.add('text-4xl');
        });
    } else {
        // Reset to default styles for larger screens
        formContainer.classList.add('flex-wrap');
        formContainer.classList.remove('flex-col');
        formContainer.style.padding = '2rem';
        
        const contactInfo = formContainer.querySelector('.flex-1:first-child');
        const feedbackForm = formContainer.querySelector('.flex-1:last-child');
        
        if (contactInfo && feedbackForm) {
            contactInfo.style.minWidth = '40%';
            contactInfo.style.marginBottom = '0';
            feedbackForm.style.minWidth = '45%';
        }
        
        // Reset star rating display size
        const stars = document.querySelectorAll('.star');
        stars.forEach(star => {
            star.classList.add('text-5xl');
            star.classList.remove('text-4xl');
        });
    }
}

// Run on page load
handleFeedbackFormResponsiveness();

// Add event listener for window resize
window.addEventListener('resize', handleFeedbackFormResponsiveness);

// Also ensure proper layout when switching to the feedback tab
document.getElementById('feedback-tab').addEventListener('click', function() {
    // Give a small delay to allow the tab content to become visible
    setTimeout(handleFeedbackFormResponsiveness, 100);
});
});
</script>
</body>
</html>