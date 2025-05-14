<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.png" type="image/png">
    <title>MSD Godspeed Exhibits Corp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap');

        /* Custom animations for typing effect */
        @keyframes typing {
            from { width: 0; }
            to { width: 50% }
        }
          @keyframes blink-caret {
          from, to { border-color: transparent }
          /* 50% { border-color: #f0a500 } */
        }
        
        .typing-animation {
          overflow: hidden;
          white-space: nowrap;
          margin: 0 auto;
          /* letter-spacing: 0.15em; */
          animation: 
            typing 5.5s steps(40, end),
            blink-caret 0.75s step-end infinite;
        }
        html, body {
            overflow-x: hidden;
        }
        body {
            padding-top: 90px; /* adjust based on actual header height */
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
        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            transform: translateZ(0); /* Performance optimization */
        }
        #gallery {
            margin-bottom: 0;
            padding-bottom: 60px;
        }

        #event {
            margin-top: -1px; /* Fix potential gap */
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
        @keyframes typing {
          from { width: 0; }
          to { width: 100%; }
        }
        .hero-text {
        display: block; /* Ensure it's not forced inline */
        white-space: normal; /* Let the text wrap */
        overflow: visible; /* Ensure overflow is handled correctly */
        }
        .scrolled {
          background-color: rgba(226, 226, 226, 0.45) !important;
        }
        
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
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
<body class="font-swiss leading-relaxed bg-dark-gray">
    <!-- Loading Screen -->
    <div class="fixed top-0 left-0 w-screen h-screen bg-[rgba(38,105,60,0.85)] flex items-center justify-center z-50 opacity-100 transition-opacity duration-500" id="loading-screen">
        <img src="images/pagereload.gif" alt="Loading..." class="w-[450px] h-[450px] object-cover rounded-full" />
    </div>

    <!-- Header -->
    <header id="mainHeader" class="fixed top-0 left-0 w-full z-[9999] flex items-center justify-between bg-[rgba(226,226,226,0.6)] backdrop-blur-lg transition-colors duration-300 text-black py-4 px-4">
      <div class="logo">
        <a href="#home">
          <img src="images/img.png" alt="Company Logo" class="w-[375px] h-[55px] object-contain cursor-pointer transition-transform duration-300 hover:scale-105 active:scale-95" />
        </a>
      </div>

      <nav class="relative">
        <!-- Hamburger -->
        <div class="cursor-pointer flex flex-col gap-1.5 p-2.5 z-[1001] md:hidden" id="hamburger">
          <div class="w-[30px] h-[3px] bg-black transition-all duration-300 origin-center"></div>
          <div class="w-[30px] h-[3px] bg-black transition-all duration-300 origin-center"></div>
          <div class="w-[30px] h-[3px] bg-black transition-all duration-300 origin-center"></div>
        </div>

        <!-- Nav Menu -->
        <ul class="gap-5 list-none md:flex hidden" id="nav-menu">
          <li><a href="#home" class="text-[#003303] no-underline text-[19px] p-2.5 block transition-all duration-300 hover:text-[#f0a500] hover:-translate-y-1">Home</a></li>
          <li><a href="#about" class="text-[#003303] no-underline text-[19px] p-2.5 block transition-all duration-300 hover:text-[#f0a500] hover:-translate-y-1">About</a></li>
          <li><a href="#services" class="text-[#003303] no-underline text-[19px] p-2.5 block transition-all duration-300 hover:text-[#f0a500] hover:-translate-y-1">Services</a></li>
          <li><a href="more-product.php" target="_blank" class="text-[#003303] no-underline text-[19px] p-2.5 block transition-all duration-300 hover:text-[#f0a500] hover:-translate-y-1">Products</a></li>
          <li><a href="#gallery" class="text-[#003303] no-underline text-[19px] p-2.5 block transition-all duration-300 hover:text-[#f0a500] hover:-translate-y-1">Gallery</a></li>
        </ul>
      </nav>
    </header>
    <!-- Home Section  -->
    <section id="home" class="w-full overflow-hidden bg-dark-green text-white flex flex-col items-center pt-5 px-4">
        <!-- Hero Text -->
        <div class="hero-text-container relative w-full text-center mb-8">
          <div class="inline-block mx-auto">
            <h1 class="hero-text font-archivo-black text-xl sm:text-2xl md:text-5xl overflow-hidden md:whitespace-nowrap border-r-4 border-gold typing-animation">
              Welcome to MSD Godspeed Exhibits Corp.
            </h1>
          </div>
        </div>

        <!-- Carousel Container (smaller and responsive) -->
        <div class="carousel-container w-full max-w-[1400px] aspect-[16/9] overflow-hidden relative flex items-center justify-center">
          <!-- Carousel slide -->
          <div class="carousel-slide flex flex-nowrap transition-transform duration-800 ease-in-out h-full" id="carouselSlide"></div>
          <!-- Carousel dots -->
          <div class="carousel-dots absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2.5 z-10"></div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class=" text-white bg-medium-green py-24 px-5 min-h-screen text-center">
        <a href="fullview.php?image=about.jpg&text=We%20are%20one%20of%20the%20biggest%20Exhibition%20Booth%20Contractor%20in%20the%20Philippines.%20We%20have%20been%20catering%20Exhibition%2F%20Events%20for%20the%20past%2030%20years%20from%20Basic%20Booth%20System%20to%20Special%20Booth%20Designs.%0A%0A
        MSD%20Godspeed%20Exhibits%20Corporation%20started%20as%20a%20single%20proprietorship%20company%20known%20as%20GODSPEED%20EXHIBITS%20SYSTEMS%20in%20May%201992.%20As%20the%20exhibition%20market%20expanded,%20it%20became%20a%20corporation,%20registered%20and%20approved%20by%20the%20Securities%20and%20Exchange%20Commission%20(SEC)%20on%20July%203,%202007.%0A%0A
        As%20one%20of%20the%20key%20players%20in%20the%20exhibition%20business%20for%20the%20past%2026%20years,%20MSD%20Godspeed%20evolved%20from%20a%20system%20booth%20contractor%20to%20a%20total%20exhibition%20service%20provider,%20serving%20end%20to%20end%20services%20to%20customers.%0A%0A
        With%20its%20long%20years%20of%20involvement%20in%20the%20exhibition%20industry,%20MSD%20Godspeed%20has%20successfully%20accomplished%20a%20number%20of%20quality%20projects%20which%20produced%20a%20vast%20list%20of%20loyal,%20pleased%20and%20satisfied%20customers.%20MSD%20Godspeed%20takes%20pride%20in%20partnering%20with%20its%20customers%20to%20create%20an%20environment%20that%20supports%20their%20business%20objectives%20and%20deliver%20results." 
        class="no-underline text-inherit">
          <h2 class="text-[32px] mb-4 font-archivo-black">About Us</h2>
          <p class="text-xl font-archivo-narrow font-normal">One of the Biggest Exhibition Booth Contractors</b> in the Philippines.</p>
        </a>
        
		<div class="grid grid-cols-1 md:grid-cols-3 md:grid-rows-[200px_250px_250px] gap-5 mt-10">
			<!-- 1 -->
			<a class="group relative overflow-hidden rounded-2xl shadow-md cursor-pointer transition-transform duration-300 hover:scale-105 hover:shadow-none md:col-start-1 md:col-end-2 md:row-start-1 md:row-end-2"href="fullview.php?image=about1.jpg&text=%3Cstrong%3EVISION%20%26%20CORE%20VALUES%20STATEMENTS%3C%2Fstrong%3E%0AFrom%20MSD%20GODSPEED%20EXHIBITS%20CORPORATION,%20we%20are%20engaged%20in%20the%20following%20scope%20of%20work:%20OUTDOOR%20%26%20INDOOR%20EXHIBIT%20BOOTH%20SERVICES,%20INTERIOR%20RENOVATION,%20AND%20OPERATIONS%20MANAGEMENT.%0AFocus%20on%20achieving%20it,%20MSD%20GODSPEED%20has%20defined%20the%20following%20corporate%20values%20and%20vision.%0A%0A%3Cstrong%3EVISION%20STATEMENT%3C%2Fstrong%3E%0AThrough%20excellence%20in%20providing%20general%20services,%20MSD%20GODSPEED%20vision%20is%20to%20provide%20the%20best%20and%20professional%20quality%20installation%20of%20booths%20and%20interior%20renovation%20projects,%20supporting%20our%20clients%20in%20better%20performance,%20efficiency,%20and%20cost-effectiveness.">
				<img src="images/about1.jpg" alt="About Image 1" class="w-full h-full object-cover opacity-90 transition-opacity duration-300 group-hover:opacity-100">
				<div class="absolute inset-0 bg-gradient-to-br from-green-950/80 to-green-800/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
				<div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center pointer-events-auto">
					<b>VISION & CORE VALUES STATEMENTS</b>
				</div>
			</a>
			<!-- 2 -->
      <a class="group relative overflow-hidden rounded-2xl shadow-md cursor-pointer transition-transform duration-300 hover:scale-105 hover:shadow-none md:col-start-2 md:col-end-3 md:row-start-1 md:row-end-3" href="fullview.php?image=about2.jpg&text=At%20%3Cstrong%3EMSD%20GODSPEED%20EXHIBITS%20CORP%3C%2Fstrong%3E,%20we%20believe%20in%20delivering%20nothing%20but%20the%20highest%20quality%20of%20work%20in%20every%20project%20we%20undertake.%20From%20the%20initial%20concept%20design%20to%20the%20final%20execution,%20our%20team%20of%20skilled%20professionals%20meticulously%20oversees%20every%20detail%20to%20ensure%20precision,%20craftsmanship,%20and%20excellence.%20We%20take%20pride%20in%20our%20commitment%20to%20upholding%20industry%20standards%20and%20best%20practices,%20consistently%20exceeding%20our%20clients'%20expectations%20and%20setting%20new%20benchmarks%20for%20quality%20in%20the%20exhibition%20industry.">
        <img src="images/about2.jpg" alt="About Image 2" class="w-full h-full object-cover opacity-90 transition-opacity duration-300 group-hover:opacity-100">
				<div class="absolute inset-0 bg-gradient-to-br from-green-950/80 to-green-800/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
				<div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center pointer-events-auto">
					<b>QUALITY OF WORK</b>
				</div>
			</a>
			<!-- 3 -->
      <a class="group relative overflow-hidden rounded-2xl shadow-md cursor-pointer transition-transform duration-300 hover:scale-105 hover:shadow-none md:col-start-3 md:col-end-4 md:row-start-1 md:row-end-2" href="fullview.php?image=about3.jpg&text=In%20today's%20dynamic%20and%20competitive%20business%20landscape,%20we%20understand%20the%20importance%20of%20staying%20ahead%20of%20the%20curve.%20At%20%3Cstrong%3EMSD%20GODSPEED%20EXHIBITS%20CORP%3C%2Fstrong%3E,%20we%20proactively%20monitor%20market%20trends,%20industry%20developments,%20and%20emerging%20technologies%20to%20anticipate%20and%20adapt%20to%20changes%20in%20the%20competitive%20landscape.%20By%20staying%20agile%20and%20responsive,%20we%20position%20ourselves%20as%20leaders%20in%20innovation,%20continuously%20evolving%20our%20strategies%20and%20offerings%20to%20meet%20the%20evolving%20needs%20of%20our%20clients%20and%20stay%20one%20step%20ahead%20of%20the%20competition.">
        <img src="images/about3.jpg" alt="About Image 3" class="w-full h-full object-cover opacity-90 transition-opacity duration-300 group-hover:opacity-100">
				<div class="absolute inset-0 bg-gradient-to-br from-green-950/80 to-green-800/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
				<div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center pointer-events-auto">
					<b>PERCEIVED COMPETITIVE REACTION</b>
				</div>
			</a>
			<!-- 4 -->
      <a class="group relative overflow-hidden rounded-2xl shadow-md cursor-pointer transition-transform duration-300 hover:scale-105 hover:shadow-none md:col-start-1 md:col-end-2 md:row-start-2 md:row-end-4" href="fullview.php?image=about4.jpg&text=Our%20journey%20at%20%3Cstrong%3EMSD%20GODSPEED%20EXHIBITS%20CORP%3C%2Fstrong%3E%20has%20been%20characterized%20by%20steady%20and%20sustainable%20organic%20growth.%20Through%20our%20unwavering%20dedication%20to%20delivering%20exceptional%20value%20and%20unparalleled%20service%20to%20our%20clients,%20we%20have%20earned%20their%20trust%20and%20loyalty,%20driving%20organic%20growth%20through%20positive%20word-of-mouth%20referrals%20and%20repeat%20business.%20By%20fostering%20long-term%20partnerships%20built%20on%20mutual%20respect,%20integrity,%20and%20shared%20success,%20we%20continue%20to%20expand%20our%20reach%20and%20influence%20in%20the%20exhibition%20industry,%20organically%20growing%20our%20business%20while%20maintaining%20our%20commitment%20to%20excellence.">
        <img src="images/about4.jpg" alt="About Image 4" class="w-full h-full object-cover opacity-90 transition-opacity duration-300 group-hover:opacity-100">
				<div class="absolute inset-0 bg-gradient-to-br from-green-950/80 to-green-800/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
				<div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center pointer-events-auto">
					<b>ORGANIC GROWTH</b>
				</div>
			</a>
			<!-- 5 -->
      <a class="group relative overflow-hidden rounded-2xl shadow-md cursor-pointer transition-transform duration-300 hover:scale-105 hover:shadow-none md:col-start-3 md:col-end-4 md:row-start-2 md:row-end-4" href="fullview.php?image=about5.jpg&text=At%20%3Cstrong%3EMSD%20GODSPEED%20EXHIBITS%20CORP%3C%2Fstrong%3E,%20we%20are%20committed%20to%20continuous%20innovation%20and%20product%20extension%20to%20meet%20the%20evolving%20needs%20and%20preferences%20of%20our%20clients.%20By%20staying%20attuned%20to%20market%20dynamics%20and%20customer%20feedback,%20we%20identify%20new%20opportunities%20for%20expansion%20and%20diversification,%20developing%20innovative%20solutions%20and%20offerings%20that%20add%20value%20and%20enhance%20the%20overall%20customer%20experience.%20Whether%20it's%20introducing%20new%20services,%20expanding%20our%20product%20lines,%20or%20embracing%20emerging%20technologies,%20we%20are%20always%20exploring%20new%20horizons%20and%20pushing%20the%20boundaries%20of%20possibility%20to%20better%20serve%20our%20clients%20and%20drive%20sustainable%20growth.">
        <img src="images/about5.jpg" alt="About Image 5" class="w-full h-full object-cover opacity-90 transition-opacity duration-300 group-hover:opacity-100">
				<div class="absolute inset-0 bg-gradient-to-br from-green-950/80 to-green-800/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
				<div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center pointer-events-auto">
					<b>PRODUCT EXTENSION</b>
				</div>
			</a>
			<!-- 6 -->
      <a class="group relative overflow-hidden rounded-2xl shadow-md cursor-pointer transition-transform duration-300 hover:scale-105 hover:shadow-none md:col-start-2 md:col-end-3 md:row-start-3 md:row-end-4" href="fullview.php?image=about6.jpg&text=Integrity%20is%20the%20cornerstone%20of%20our%20business%20philosophy%20at%20%3Cstrong%3EMSD%20GODSPEED%20EXHIBITS%20CORP%3C%2Fstrong%3E.%20We%20conduct%20ourselves%20with%20honesty,%20transparency,%20and%20integrity%20in%20all%20our%20dealings,%20fostering%20trust%20and%20credibility%20with%20our%20clients,%20partners,%20and%20stakeholders.%20We%20believe%20in%20fair%20and%20ethical%20business%20practices,%20upholding%20the%20highest%20standards%20of%20professionalism%20and%20integrity%20in%20every%20interaction.%20By%20building%20relationships%20based%20on%20trust,%20respect,%20and%20mutual%20benefit,%20we%20create%20a%20positive%20and%20conducive%20environment%20for%20collaboration%20and%20success,%20ensuring%20that%20every%20transaction%20is%20conducted%20with%20integrity%20and%20honor.">
        <img src="images/about6.jpg" alt="About Image 6" class="w-full h-full object-cover opacity-90 transition-opacity duration-300 group-hover:opacity-100">
				<div class="absolute inset-0 bg-gradient-to-br from-green-950/80 to-green-800/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
				<div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center pointer-events-auto">
					<b>STRAIGHT & HONORABLE DEALINGS</b>
				</div>
			</a>
		</div>
    </section>

    <!-- Services Section -->
    <section id="services" class="relative z-10 text-white min-h-[400px] py-12 overflow-hidden text-center">
    <!-- Parallax Background -->
    <div class="parallax-bg absolute top-0 left-0 w-full h-[calc(100%+200px)] bg-cover filter blur-sm opacity-100" style="background: url('images/parallax-image.jpg') center center;"></div>
    <!-- Dark Overlay -->
    <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50"></div>

        <!-- Content -->
        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" class="relative z-10">
        <h2 class="text-[32px] mb-6 font-archivo-black">Our Services</h2>
        <div class="flex flex-col gap-10 px-5">
                
                <!-- First Service Row -->
                <div class="flex flex-col md:flex-row items-center gap-5" data-aos="fade-up-right" data-aos-delay="300">
                    <div class="flex-1">
                        <img src="images/service1.jpg" alt="Service 1" class="w-full h-auto rounded-lg">
                    </div>
                    <div class="flex-1 bg-[#004d04] text-white p-5 rounded-lg text-left">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-accent-gold text-white flex items-center justify-center text-lg font-bold mr-2.5"></div>
                            <h3 class="text-xl"><b class="font-archivo-narrow">Booth Contractor for Exhibitions & Events</b></h3>
                        </div>
                        <p class="my-3 font-archivo font-normal">Expert booth construction for exhibitions and events, tailored to your brand's vision and requirements.</p>
                        
                        <div class="flex items-center mt-4">
                            <div class="w-3 h-3 rounded-full bg-accent-gold text-white flex items-center justify-center text-lg font-bold mr-2.5"></div>
                            <h3 class="text-xl"><b class="font-archivo-narrow">Project Management</b></h3>
                        </div>
                        <p class="my-3 font-archivo font-normal">Comprehensive project management solutions to streamline processes, ensure timely delivery, and exceed expectations.</p>
                        
                        <div class="flex items-center mt-4">
                            <div class="w-3 h-3 rounded-full bg-accent-gold text-white flex items-center justify-center text-lg font-bold mr-2.5"></div>
                            <h3 class="text-xl"><b class="font-archivo-narrow">Branding + Creative Design</b></h3>
                        </div>
                        <p class="my-3 font-archivo font-normal">Elevate your brand with our creative design services, crafting compelling visual identities and engaging brand experiences.</p>
                    </div>
                </div>
                
                <!-- Second Service Row -->
                <div class="flex flex-col md:flex-row items-center gap-5" data-aos="fade-up-left" data-aos-delay="300">
                    <div class="flex-1 bg-[#004d04] text-white p-5 rounded-lg text-left md:order-1 order-2">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-accent-gold text-white flex items-center justify-center text-lg font-bold mr-2.5"></div>
                            <h3 class="text-xl"><b class="font-archivo-narrow">Operations</b></h3>
                        </div>
                        <p class="my-3 font-archivo font-normal">Efficient operations management to optimize resources, streamline workflows, and maximize productivity.</p>
                        
                        <div class="flex items-center mt-4">
                            <div class="w-3 h-3 rounded-full bg-accent-gold text-white flex items-center justify-center text-lg font-bold mr-2.5"></div>
                            <h3 class="text-xl"><b class="font-archivo-narrow">Installation & Dismantling</b></h3>
                        </div>
                        <p class="my-3 font-archivo font-normal">Professional installation and dismantling services for seamless setup and teardown of your exhibits and events.</p>
                        
                        <div class="flex items-center mt-4">
                            <div class="w-3 h-3 rounded-full bg-accent-gold text-white flex items-center justify-center text-lg font-bold mr-2.5"></div>
                            <h3 class="text-xl"><b class="font-archivo-narrow">Logistics & Management</b></h3>
                        </div>
                        <p class="my-3 font-archivo font-normal">End-to-end logistics management to coordinate transportation, shipping, and delivery for your exhibits and events.</p>
                    </div>
                    <div class="flex-1 md:order-2 order-1">
                        <img src="images/service2.jpg" alt="Service 2" class="w-full h-auto rounded-lg">
                    </div>
                </div>
                
                <!-- Third Service Row -->
                <div class="flex flex-col md:flex-row items-center gap-5" data-aos="fade-up-right" data-aos-delay="300">
                    <div class="flex-1">
                        <img src="images/service3.jpg" alt="Service 3" class="w-full h-auto rounded-lg">
                    </div>
                    <div class="flex-1 bg-[#004d04] text-white p-5 rounded-lg text-left">
                        <div class="flex items-center">
                            <div class="w-3 h-3 rounded-full bg-accent-gold text-white flex items-center justify-center text-lg font-bold mr-2.5"></div>
                            <h3 class="text-xl"><b class="font-archivo-narrow">Signage & Visual Identity</b></h3>
                        </div>
                        <p class="my-3 font-archivo font-normal">Eye-catching signage and visual identity solutions to enhance your brand presence and captivate your audience.</p>
                        
                        <div class="flex items-center mt-4">
                            <div class="w-3 h-3 rounded-full bg-accent-gold text-white flex items-center justify-center text-lg font-bold mr-2.5"></div>
                            <h3 class="text-xl"><b class="font-archivo-narrow">Furniture & Fixtures Rental</b></h3>
                        </div>
                        <p class="my-3 font-archivo font-normal">Flexible furniture and fixtures rental options to enhance the functionality and aesthetics of your space.</p>
                        
                        <div class="flex items-center mt-4">
                            <div class="w-3 h-3 rounded-full bg-accent-gold text-white flex items-center justify-center text-lg font-bold mr-2.5"></div>
                            <h3 class="text-xl"><b class="font-archivo-narrow">Electrical & Audio Rental</b></h3>
                        </div>
                        <p class="my-3 font-archivo font-normal">State-of-the-art electrical and audio-visual equipment rental for immersive and interactive experiences.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="relative bg-[#011d02] text-white py-24 px-5 min-h-screen text-center">
    <!-- Parallax Background -->
    <div class="parallax-bg absolute top-0 left-0 w-full h-[calc(100%+200px)] bg-cover filter blur-sm z-0" style="background: url('images/parallax.jpg') center center;"></div>
    <!-- Dark Overlay -->
    <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50"></div>
        <h2 class="text-4xl mb-2 relative z-10 font-archivo-black">Gallery</h2>
        <p class="font-archivo-narrow mb-8 relative z-10 text-[20px] font-normal">Explore our portfolio of past projects.</p>

        <div class="flex flex-col items-center max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row justify-center w-full mb-5">
                <a class="gallery-container collateral relative w-[90%] md:w-[45%] mx-2.5 mb-5 md:mb-0 overflow-hidden rounded-lg shadow-md transition-transform duration-300 hover:scale-[1.03]" href="photo-gallery.php" target="_blank">
                    <div class="absolute top-0 left-0 w-full h-full flex justify-center items-center bg-[rgba(0,0,0,0.6)] text-white text-2xl font-bold text-center opacity-0 transition-opacity duration-300 hover:opacity-100 p-0">See More</div>
                </a>
                <a class="gallery-container special relative w-[90%] md:w-[45%] mx-2.5 overflow-hidden rounded-lg shadow-md transition-transform duration-300 hover:scale-[1.03]" href="photo-gallery.php" target="_blank">
                    <div class="absolute top-0 left-0 w-full h-full flex justify-center items-center bg-[rgba(0,0,0,0.6)] text-white text-2xl font-bold text-center opacity-0 transition-opacity duration-300 hover:opacity-100 p-0">See More</div>
                </a>
            </div>
            <div class="flex flex-col md:flex-row justify-center w-full">
                <a class="gallery-container standard relative w-[90%] md:w-[45%] mx-2.5 mb-5 md:mb-0 overflow-hidden rounded-lg shadow-md transition-transform duration-300 hover:scale-[1.03]" href="photo-gallery.php" target="_blank">
                    <div class="absolute top-0 left-0 w-full h-full flex justify-center items-center bg-[rgba(0,0,0,0.6)] text-white text-2xl font-bold text-center opacity-0 transition-opacity duration-300 hover:opacity-100 p-0">See More</div>
                </a>
                <a class="gallery-container upgraded relative w-[90%] md:w-[45%] mx-2.5 overflow-hidden rounded-lg shadow-md transition-transform duration-300 hover:scale-[1.03]" href="photo-gallery.php" target="_blank">
                    <div class="absolute top-0 left-0 w-full h-full flex justify-center items-center bg-[rgba(0,0,0,0.6)] text-white text-2xl font-bold text-center opacity-0 transition-opacity duration-300 hover:opacity-100 p-0">See More</div>
                </a>
            </div>
        </div>
    </section>

    <!-- Event Section -->
    <section id="event" class="relative z-10 flex flex-col items-center justify-start p-0 min-h-screen text-white bg-dark-green mt-20">
    <?php include 'upcoming-events.php'; ?>
        <div class="contact-bottom"></div>
    </section>

    <!-- Footer Section -->
    <footer class="relative bg-cover bg-center bg-no-repeat py-1 sm:py-3 text-white overflow-hidden mt-auto w-full" style="background-image: url('images/footer-background.png')">
        <!-- Dark Overlay using ::before -->
        <div class="footer"></div> <!-- Apply the footer class for the ::before pseudo-element -->

        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center md:items-stretch max-w-6xl mx-auto px-3 sm:px-8">
            <!-- Footer Left - Logo -->
            <div class="w-full md:w-1/5 flex items-center justify-center md:justify-start pt-2 sm:pt-5 pb-1">
                <a href="#home">
                    <img src="images/campaign-monitor-logo.png" alt="MSD Godspeed Logo" class="max-w-[110px] sm:max-w-[180px] h-auto">
                </a>
            </div>

            <!-- Footer Center - Company Info -->
            <div class="w-full md:flex-1 flex flex-col items-center md:items-start text-center md:text-left md:pl-5 mb-4 sm:mb-8 text-xs sm:text-base leading-tight">
                <h3 class="text-gold font-archivo-black text-sm sm:text-2xl mb-2 sm:mb-3">Main Office</h3>
                <a href="https://maps.app.goo.gl/GQJoP1aYDHUgPhux8" target="_blank" class="text-white hover:text-blue-500 hover:underline leading-snug">
                    #324 Navy Road Veterans Village,<br> Barangay, Holy Spirit, Diliman,<br>Quezon City, Philippines 1127
                </a>

                <div class="flex items-center gap-1 sm:gap-2 mb-1 mt-2 sm:mt-4">
                    <div class="w-[28px] h-[28px] sm:w-[50px] sm:h-[50px] flex items-center justify-center">
                        <img src="images/phone.png" alt="Phone" class="w-full h-full object-contain">
                    </div>
                    <div class="flex flex-col text-[10px] sm:text-sm">
                        <span class="font-bold text-amber-400">Phone:</span> (02) 8 570-8069<br>
                        <span class="font-bold text-amber-400">Mobile:</span> 0915-9785683
                    </div>
                </div>

                <div class="flex items-center gap-1 sm:gap-2 mb-1">
                    <div class="w-[28px] h-[28px] sm:w-[50px] sm:h-[50px] flex items-center justify-center">
                        <img src="images/email.png" alt="Email" class="w-full h-full object-contain">
                    </div>
                    <div class="text-[10px] sm:text-sm">
                        <a href="mailto:wdcampos@msdgodspeedexhibits.com" class="text-white hover:text-amber-400">wdcampos@msdgodspeedexhibits.com</a>
                    </div>
                </div>

                <div class="flex gap-1 sm:gap-4 mt-2 sm:mt-5">
                    <a href="https://www.facebook.com/MSDGospeedExhibitsCorp" class="w-[28px] h-[28px] sm:w-[50px] sm:h-[50px] rounded-full flex items-center justify-center transition-transform hover:scale-110">
                        <img src="images/facebook.png" alt="Facebook" class="w-full h-full object-contain">
                    </a>
                    <a href="https://www.instagram.com/msdgodspeed2022/" class="w-[28px] h-[28px] sm:w-[50px] sm:h-[50px] rounded-full flex items-center justify-center transition-transform hover:scale-110">
                        <img src="images/instagram.png" alt="Instagram" class="w-full h-full object-contain">
                    </a>
                </div>
            </div>

            <!-- Footer Right - Navigation Links -->
            <div class="w-full md:w-1/3 flex justify-center md:justify-start items-center md:pt-4 mb-4 sm:mb-8 text-xs sm:text-sm">
                <ul class="grid grid-cols-2 gap-x-4 sm:gap-x-8 gap-y-1 sm:gap-y-2.5 text-center md:text-left">
                    <li><a href="photo-gallery.php" target="_blank" class="text-white hover:text-amber-400">Galleries</a></li>
                    <li><a href="contact.php" class="text-white hover:text-amber-400">Contact Us</a></li>
                    <li><a href="docs/company-profile.pdf" target="_blank" class="text-white hover:text-amber-400">Catalogue</a></li>
                    <li><a href="docs/pricelist.pdf" target="_blank" class="text-white hover:text-amber-400">Price Lists</a></li>
                    <li><a href="#about" class="text-white hover:text-amber-400">About Us</a></li>
                    <li><a href="more-product.php" target="_blank" class="text-white hover:text-amber-400">Products</a></li>
                    <li><a href="#services" class="text-white hover:text-amber-400">Services</a></li>
                    <li><a href="helpcenter.php" target="_blank" class="text-white hover:text-amber-400">Help Center</a></li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="relative z-10 text-center mt-2 sm:mt-5 pt-2 border-t border-white/10 text-[10px] sm:text-sm">
            <p>&copy; 2025 MSD Godspeed Exhibits - All Rights Reserved | <a href="terms.php" target="_blank" class="text-white hover:text-amber-400">Terms & Policies</a></p>
        </div>
    </footer>


<a href="contact.php" class="fixed bottom-8 right-8 bg-gold text-white font-archivo-black font-bold py-3 px-5 rounded-full shadow-md transition-all duration-300 hover:bg-[#d18e00] hover:scale-110 z-50 flex items-center gap-3">Contact Us</a>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
// Master Initialization
document.addEventListener("DOMContentLoaded", () => {
  initLoadingScreen();
  initGalleryPreload();
  initCarousel();
  initImageHoverAnimations();
  initHamburgerMenu();
  initSmoothScrolling();
  initAOS();
  initParallax();
  initRandomGalleryImages();
  initScrollSpy();
  initHeroTextResize(); // Initialize dynamic hero text resizing
});

// Scroll to top on reload, even if URL has #hash
window.addEventListener('load', () => {
  if (window.location.hash) {
    history.replaceState(null, null, ' ');
  }
  window.scrollTo(0, 0);

  setTimeout(() => {
    window.scrollTo(0, 0);
    window.dispatchEvent(new Event('scroll'));
  }, 200);
});


// Hero Text Resize
function initHeroTextResize() {
  const heroText = document.querySelector('.hero-text');
  if (!heroText) return;

  function adjustHeroTextSize() {
    const windowWidth = window.innerWidth;

    // Example: Adjust font sizes dynamically based on screen width
    if (windowWidth < 480) {
      heroText.style.fontSize = '20px'; // Smaller screen sizes
    } else if (windowWidth >= 480 && windowWidth < 768) {
      heroText.style.fontSize = '30px'; // Medium screens (tablets)
    } else if (windowWidth >= 768 && windowWidth < 1024) {
      heroText.style.fontSize = '40px'; // Larger tablets and small desktops
    } else {
      heroText.style.fontSize = '50px'; // Larger screens (desktops)
    }
  }

  // Initial resize call
  adjustHeroTextSize();

  // Call the function when the window is resized
  window.addEventListener('resize', adjustHeroTextSize);
}

// Loading Screen
function initLoadingScreen() {
  const loadingScreen = document.getElementById("loading-screen");
  if (loadingScreen) {
    setTimeout(() => {
      loadingScreen.style.opacity = "0";
      setTimeout(() => {
        loadingScreen.style.display = "none";
      }, 500);
    }, 1500);
  }
}

// Gallery Image Preloading
function initGalleryPreload() {
  const galleryTypes = ["collateral", "special", "standard", "upgraded"];
  galleryTypes.forEach(type => {
    const element = document.querySelector(`.${type}`);
    if (element) {
      const img = document.createElement('img');
      img.src = `images/${type}.jpg`;
      img.alt = `${type.charAt(0).toUpperCase() + type.slice(1)} Gallery`;
      img.className = "w-full h-64 object-cover transition-transform duration-500 hover:scale-110";
      element.prepend(img);
    }
  });
}

// Carousel Initialization
function initCarousel() {
  const slide = document.querySelector("#carouselSlide");
  const dotsContainer = document.querySelector(".carousel-dots");
  if (!slide || !dotsContainer) return;

  const imageCount = 11;
  let index = 0;
  let autoSlideInterval;

  slide.innerHTML = Array.from({ length: imageCount }, (_, i) => 
    `<div class="carousel-item min-w-full h-full flex-shrink-0">
      <img src="images/home${i + 1}.png" alt="Slide ${i + 1}" class="w-full h-full object-cover" />
    </div>`
  ).join('');
  slide.style.display = "flex";
  slide.style.transition = "transform 0.5s ease-in-out";

  function updateSlide() {
    slide.style.transform = `translateX(-${index * 100}%)`;
    updateDots();
  }

  function updateDots() {
    dotsContainer.innerHTML = '';
    Array.from({ length: imageCount }, (_, i) => {
      const dot = document.createElement('div');
      dot.className = `dot w-3 h-3 rounded-full cursor-pointer transition-all duration-300 ${i === index ? "bg-white scale-125" : "bg-gray-400"}`;
      dot.addEventListener("click", () => { index = i; updateSlide(); resetAutoSlide(); });
      dotsContainer.appendChild(dot);
    });
  }

  function nextSlide() {
    index = (index + 1) % imageCount;
    updateSlide();
  }

  function startAutoSlide() {
    autoSlideInterval = setInterval(nextSlide, 5000);
  }

  function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    startAutoSlide();
  }

  // Swipe Handling
  let touchStartX = 0;
  slide.addEventListener('touchstart', (e) => { touchStartX = e.changedTouches[0].screenX; }, { passive: true });
  slide.addEventListener('touchend', (e) => {
    const touchEndX = e.changedTouches[0].screenX;
    if (touchEndX < touchStartX - 50) nextSlide();
    if (touchEndX > touchStartX + 50) { index = (index - 1 + imageCount) % imageCount; updateSlide(); }
    resetAutoSlide();
  }, { passive: true });

  window.addEventListener("resize", updateSlide);

  updateSlide();
  startAutoSlide();
}

// Hover Animations for Images
function initImageHoverAnimations() {
  document.querySelectorAll(".image-container").forEach(container => {
    const overlay = container.querySelector(".overlay-text");
    if (!overlay) return;
    container.addEventListener("mouseenter", () => overlay.style.opacity = "1");
    container.addEventListener("mouseleave", () => overlay.style.opacity = "0");
  });
}

// Hamburger Menu
function initHamburgerMenu() {
  const hamburger = document.getElementById("hamburger");
  const navMenu = document.getElementById("nav-menu");
  const header = document.querySelector("header");

  if (!hamburger || !navMenu || !header) return;

  // Increase font size for nav items when menu is open
  const navLinks = navMenu.querySelectorAll('a');
  navLinks.forEach(link => {
    link.classList.add('text-3xl', 'sm:text-lg'); // Applying 'text-3xl' on small screens, 'text-lg' on larger screens
  });

  const openMenu = () => {
    navMenu.classList.remove("hidden");
    navMenu.classList.add(
      "fixed", "top-0", "left-0", "w-full", "h-screen",
      "bg-white/90", "backdrop-blur-md", "flex", "flex-col", 
      "justify-center", "items-center", "gap-8", "z-[999]"
    );
    document.body.classList.add("overflow-hidden");

    const bars = hamburger.querySelectorAll("div");
    bars[0].classList.add("rotate-45", "translate-y-2");
    bars[1].classList.add("opacity-0");
    bars[2].classList.add("-rotate-45", "-translate-y-2");
  };

  const closeMenu = () => {
    navMenu.classList.add("hidden");
    navMenu.classList.remove(
      "fixed", "top-0", "left-0", "w-full", "h-screen",
      "bg-white/90", "backdrop-blur-md", "flex", "flex-col", 
      "justify-center", "items-center", "gap-8", "z-[999]"
    );
    document.body.classList.remove("overflow-hidden");

    const bars = hamburger.querySelectorAll("div");
    bars[0].classList.remove("rotate-45", "translate-y-2");
    bars[1].classList.remove("opacity-0");
    bars[2].classList.remove("-rotate-45", "-translate-y-2");
  };

  hamburger.addEventListener("click", (e) => {
    e.stopPropagation();
    navMenu.classList.contains("hidden") ? openMenu() : closeMenu();
  });

  document.addEventListener("click", (e) => {
    if (!hamburger.contains(e.target) && !navMenu.contains(e.target) && !navMenu.classList.contains("hidden")) {
      closeMenu();
    }
  });

  navMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      if (window.innerWidth <= 768) closeMenu();
    });
  });

  // Add ESC key functionality to close the menu
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && !navMenu.classList.contains("hidden")) {
      closeMenu();
    }
  });

  window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
      closeMenu();
      navMenu.classList.remove("hidden");
    } else {
      navMenu.classList.add("hidden");
    }
  });

  window.addEventListener("scroll", () => {
    if (window.scrollY > 10) {
      header.classList.add("bg-[rgba(226,226,226,0.95)]");
      header.classList.remove("bg-[rgba(226,226,226,0.6)]");
    } else {
      header.classList.add("bg-[rgba(226,226,226,0.6)]");
      header.classList.remove("bg-[rgba(226,226,226,0.95)]");
    }
  });
}


// Smooth Scrolling
function initSmoothScrolling() {
  document.querySelectorAll('nav a, .logo a').forEach(anchor => {
    anchor.addEventListener('click', (e) => {
      const href = anchor.getAttribute('href');
      if (!href || href.startsWith('http') || href.includes('.php')) return;
      
      e.preventDefault();
      const target = document.querySelector(href);
      if (target) {
        const headerHeight = document.querySelector('header').offsetHeight;
        const targetPosition = target.getBoundingClientRect().top + window.scrollY - headerHeight;
        window.scrollTo({ top: targetPosition, behavior: 'smooth' });
      }
    });
  });
}

// Initialize AOS
function initAOS() {
  if (typeof AOS !== 'undefined') {
    setTimeout(() => {
      AOS.init({
        once: false,
        duration: 1200,
        easing: 'ease-in-out',
        mirror: true,
        anchorPlacement: 'top-bottom',
        offset: 120
      });
      const services = document.querySelector('#services');
      if (services) {
        services.style.display = 'block';
        services.style.opacity = '1';
        AOS.refresh();
      }
    }, 500);
  }
}

// Parallax Effect
function initParallax() {
  const parallaxBgs = document.querySelectorAll('.parallax-bg');
  if (!parallaxBgs.length) return;

  const updateParallax = () => {
    parallaxBgs.forEach(bg => {
      const rect = bg.parentElement.getBoundingClientRect();
      if (rect.top < window.innerHeight && rect.bottom > 0) {
        const scrolled = window.scrollY;
        const sectionOffset = rect.top + scrolled;
        const yPos = (scrolled - sectionOffset) * 0.3;
        bg.style.transform = `translate3d(0, ${yPos}px, 0)`;
      }
    });
  };

  window.addEventListener('scroll', () => requestAnimationFrame(updateParallax));
  window.addEventListener('resize', updateParallax);
  updateParallax();
}

// Random Gallery Images
function initRandomGalleryImages() {
  const imageCounts = { collateral: 968, special: 165, standard: 125, upgraded: 321 };
  
  function getRandomInt(max) {
    return Math.floor(Math.random() * max) + 1;
  }

  function setRandomImage(category) {
    const container = document.querySelector(`.gallery-container.${category}`);
    if (!container) return;

    let img = container.querySelector('img');
    if (!img) {
      img = document.createElement('img');
      const overlay = container.querySelector('div');
      if (overlay) container.insertBefore(img, overlay);
      else container.appendChild(img);
    }
    img.className = "w-full h-64 object-cover transition-transform duration-500 hover:scale-110";
    
    const randomNum = getRandomInt(imageCounts[category]);
    img.src = `images/${category}/${category} (${randomNum}).jpg`;
    img.alt = category;

    img.onerror = () => {
      img.src = `images/${category}/${category}.jpg`;
    };
  }

  setTimeout(() => {
    Object.keys(imageCounts).forEach(setRandomImage);
  }, 200);
}

// ScrollSpy for Active Navigation
function initScrollSpy() {
  const sections = document.querySelectorAll("section[id]");
  const navLinks = document.querySelectorAll("nav a");

  window.addEventListener("scroll", () => {
    let currentId = "";
    sections.forEach(section => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.offsetHeight;
      if (pageYOffset >= sectionTop - sectionHeight / 3) {
        currentId = section.getAttribute("id");
      }
    });

    navLinks.forEach(link => {
      link.classList.remove("text-gold", "font-bold");
      if (link.getAttribute("href")?.replace("#", "") === currentId) {
        link.classList.add("text-gold", "font-bold");
      }
    });
  });
}

const header = document.getElementById('mainHeader');

window.addEventListener('scroll', () => {
  if (window.scrollY > 10) {
	header.classList.add('scrolled');
  } else {
	header.classList.remove('scrolled');
  }
});


</script>

</body>
</html>