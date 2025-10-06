@extends('base')

@section('title', 'About Us | Navigation Systems')

@section('page_css')
  <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
<div class="about-hero">
  <div class="hero-content">
    <h1>About Navigation Systems</h1>
    <p class="hero-subtitle">Precision Tested by Time Since 1987</p>
    <p class="hero-description">
      For over 35 years, we have been designing and manufacturing high-precision inertial sensors 
      that form the core of navigation systems for aviation, marine vessels, land-based vehicles, and spacecraft.
    </p>
  </div>
  <div class="hero-image">
    <img src="{{ asset('img/about-team.jpg') }}" alt="Our Team">
  </div>
</div>

<div class="about-container">

  <!-- Statistics Section -->
  <section class="stats-section">
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon">📅</div>
        <div class="stat-number">35+</div>
        <div class="stat-label">Years of Experience</div>
        <div class="stat-description">Decades of innovation in navigation technology</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">🌍</div>
        <div class="stat-number">500+</div>
        <div class="stat-label">Global Clients</div>
        <div class="stat-description">Trusted by leading companies worldwide</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">🔧</div>
        <div class="stat-number">1000+</div>
        <div class="stat-label">Sensors Deployed</div>
        <div class="stat-description">High-precision sensors in active use</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon">✅</div>
        <div class="stat-number">99.9%</div>
        <div class="stat-label">Reliability Rate</div>
        <div class="stat-description">Proven performance in extreme conditions</div>
      </div>
    </div>
  </section>

  <!-- Mission Section -->
  <section class="mission-section">
    <div class="mission-content">
      <div class="mission-text">
        <h2>Our Mission</h2>
        <p class="mission-description">
          Our mission is to deliver reliability and accuracy in environments where every degree and millisecond counts. 
          Through continuous investment in research and development, we've created a full range of inertial measurement 
          units (IMUs), gyroscopes, and accelerometers that perform flawlessly even in the most extreme conditions.
        </p>
        <div class="mission-features">
          <div class="feature-item">
            <div class="feature-icon">🌡️</div>
            <div class="feature-text">
              <h4>Extreme Temperature Range</h4>
              <p>Operates flawlessly from -40°C to +85°C</p>
            </div>
          </div>
          <div class="feature-item">
            <div class="feature-icon">🌊</div>
            <div class="feature-text">
              <h4>Deep Sea Capable</h4>
              <p>Tested at depths up to 6000 meters</p>
            </div>
          </div>
          <div class="feature-item">
            <div class="feature-icon">🚀</div>
            <div class="feature-text">
              <h4>Space Grade</h4>
              <p>Radiation-hardened for space applications</p>
            </div>
          </div>
        </div>
      </div>
      <div class="mission-image">
        <img src="{{ asset('img/mission.png') }}" alt="Our Mission">
      </div>
    </div>
  </section>

  <!-- Core Principles Section -->
  <section class="principles-section">
    <div class="principles-header">
      <h2>Core Principles</h2>
      <p>Our commitment to excellence drives everything we do</p>
    </div>
    <div class="principles-grid">
      <div class="principle-card">
        <div class="principle-icon">🎯</div>
        <h3>Precision</h3>
        <p>Down to micro-degrees and microseconds. Every measurement matters when lives and missions depend on accuracy.</p>
        <div class="principle-stats">
          <span>±0.001° accuracy</span>
        </div>
      </div>
      <div class="principle-card">
        <div class="principle-icon">🛡️</div>
        <h3>Reliability</h3>
        <p>Proven in the harshest environments. From Arctic expeditions to deep space missions, our sensors never fail.</p>
        <div class="principle-stats">
          <span>99.9% uptime</span>
        </div>
      </div>
      <div class="principle-card">
        <div class="principle-icon">🚀</div>
        <h3>Innovation</h3>
        <p>Future-ready technology in every sensor. We're always pushing the boundaries of what's possible.</p>
        <div class="principle-stats">
          <span>15+ patents</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Manufacturing Excellence Section -->
  <section class="manufacturing-section">
    <div class="manufacturing-header">
      <h2>Manufacturing Excellence</h2>
      <p>State-of-the-art facilities and rigorous testing ensure the highest quality standards</p>
    </div>
    
    <!-- Carousel -->
    <div class="carousel-container">
      <div class="carousel">
        <div class="slide active">
          <img src="{{ asset('img/factory1.PNG') }}" alt="Mechanical Testing Equipment">
          <div class="slide-content">
            <h3>Mechanical Testing Equipment</h3>
            <p>Advanced equipment for stress testing and durability validation</p>
          </div>
        </div>
        <div class="slide">
          <img src="{{ asset('img/factory2.PNG') }}" alt="Temperature Testing">
          <div class="slide-content">
            <h3>Temperature Testing Chambers</h3>
            <p>Three-axis temperature and vibration testing facilities</p>
          </div>
        </div>
        <div class="slide">
          <img src="{{ asset('img/factory3.PNG') }}" alt="Quality Control">
          <div class="slide-content">
            <h3>Quality Control Systems</h3>
            <p>Precision measurement and calibration systems</p>
          </div>
        </div>
        <div class="slide">
          <img src="{{ asset('img/factory4.PNG') }}" alt="Assembly Line">
          <div class="slide-content">
            <h3>Assembly Line</h3>
            <p>Automated assembly with human oversight for critical components</p>
          </div>
        </div>
        <div class="slide">
          <img src="{{ asset('img/factory5.PNG') }}" alt="Production Equipment">
          <div class="slide-content">
            <h3>Production Equipment</h3>
            <p>High-precision manufacturing machinery for sensor production</p>
          </div>
        </div>
      </div>
      
      <!-- Navigation Dots -->
      <div class="carousel-dots">
        <span class="dot active" data-slide="0"></span>
        <span class="dot" data-slide="1"></span>
        <span class="dot" data-slide="2"></span>
        <span class="dot" data-slide="3"></span>
        <span class="dot" data-slide="4"></span>
      </div>
      
      <!-- Navigation Arrows -->
      <button class="carousel-arrow prev" onclick="changeSlide(-1)">‹</button>
      <button class="carousel-arrow next" onclick="changeSlide(1)">›</button>
    </div>
  </section>
  <!-- Closing Section -->
  <section class="closing-section">
    <div class="closing-content">
      <div class="closing-text">
        <h2>Trusted by Industry Leaders</h2>
        <p class="closing-description">
          Navigation Systems is more than just technology — it's a legacy of engineering excellence. 
          Our solutions are trusted by leading global equipment manufacturers, government agencies, and scientific institutions.
        </p>
        <div class="trust-indicators">
          <div class="trust-item">
            <div class="trust-icon">🏢</div>
            <div class="trust-text">
              <h4>Fortune 500 Companies</h4>
              <p>Trusted by major corporations worldwide</p>
            </div>
          </div>
          <div class="trust-item">
            <div class="trust-icon">🏛️</div>
            <div class="trust-text">
              <h4>Government Agencies</h4>
              <p>Approved for critical defense applications</p>
            </div>
          </div>
          <div class="trust-item">
            <div class="trust-icon">🔬</div>
            <div class="trust-text">
              <h4>Research Institutions</h4>
              <p>Used in cutting-edge scientific research</p>
            </div>
          </div>
        </div>
      </div>
      <div class="closing-highlight">
        <h3>Navigation Systems</h3>
        <p>Your trusted compass in the world of advanced technology</p>
      </div>
    </div>
  </section>

</div>

<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
const totalSlides = slides.length;

function showSlide(index) {
  // Remove active class from all slides and dots
  slides.forEach(slide => slide.classList.remove('active'));
  dots.forEach(dot => dot.classList.remove('active'));
  
  // Add active class to current slide and dot
  slides[index].classList.add('active');
  dots[index].classList.add('active');
  
  // Update current slide
  currentSlide = index;
}

function changeSlide(direction) {
  currentSlide += direction;
  
  if (currentSlide >= totalSlides) {
    currentSlide = 0;
  } else if (currentSlide < 0) {
    currentSlide = totalSlides - 1;
  }
  
  showSlide(currentSlide);
}

// Initialize carousel
document.addEventListener('DOMContentLoaded', function() {
  // Add click event listeners to dots
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      showSlide(index);
    });
  });
  
  // Auto-advance slides every 5 seconds
  setInterval(() => {
    changeSlide(1);
  }, 5000);
  
  // Initialize first slide
  showSlide(0);
});
</script>


@endsection