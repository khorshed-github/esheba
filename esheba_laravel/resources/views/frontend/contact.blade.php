@extends('frontend.layouts.app')

@section('title', 'Contact - ' . ($settings->company_name ?? 'E-Sheba'))

@section('styles')

<!-- CSS for E-SHEBA Contact Page -->
<style>
/* Modern Breadcrumb */
.modern-breadcrumb {
  position: fixed;
  top: 20px;
  left: 0;
  width: 100%;
  z-index: 1000;
  padding: 0 20px;
}

.breadcrumb-nav {
  max-width: 1200px;
  margin: 0 auto;
}

.breadcrumb-trail {
  display: flex;
  align-items: center;
  gap: 12px;
  background: rgba(0, 128, 255, 0.9);
  backdrop-filter: blur(10px);
  padding: 12px 24px;
  border-radius: 30px;
  border: 1px solid rgba(255, 255, 255, 0.2);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.breadcrumb-item {
  display: flex;
  align-items: center;
  gap: 8px;
  text-decoration: none;
  color: white;
  font-weight: 500;
  transition: all 0.3s ease;
}

.breadcrumb-item:hover {
  color: var(--primary-cyan);
  transform: translateX(-3px);
}

.breadcrumb-item.active {
  color: var(--primary-cyan);
  font-weight: 600;
}

.breadcrumb-icon {
  font-size: 1.5rem;
  color: var(--primary-cyan);
}

.breadcrumb-separator {
  color: #a0aec0;
  font-size: 1.5rem;
}

/* Contact Hero Section */
.contact-hero {
  min-height: 60vh;
  background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-purple) 100%);
  padding: 120px 0 60px;
  position: relative;
  overflow: hidden;
}

.hero-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 1;
}

.bg-shape {
  position: absolute;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
  filter: blur(60px);
  animation: floatShape 25s infinite ease-in-out;
}

.shape-1 { width: 400px; height: 400px; top: -200px; left: -100px; animation-delay: 0s; }
.shape-2 { width: 300px; height: 300px; top: 60%; right: -100px; animation-delay: 5s; }
.shape-3 { width: 200px; height: 200px; bottom: -100px; left: 30%; animation-delay: 10s; }
.shape-4 { width: 150px; height: 150px; top: 30%; right: 20%; animation-delay: 15s; }

@keyframes floatShape {
  0%, 100% { transform: translate(0, 0) rotate(0deg); }
  25% { transform: translate(80px, 60px) rotate(90deg); }
  50% { transform: translate(40px, 120px) rotate(180deg); }
  75% { transform: translate(-60px, 80px) rotate(270deg); }
}

.floating-elements {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
}

.float-element {
  position: absolute;
  font-size: 2rem;
  opacity: 0.3;
  animation: floatElement 20s infinite ease-in-out;
  color: white;
}

.el-1 { top: 20%; left: 10%; animation-delay: 0s; }
.el-2 { top: 60%; right: 15%; animation-delay: 5s; }
.el-3 { bottom: 30%; left: 20%; animation-delay: 10s; }
.el-4 { top: 40%; right: 30%; animation-delay: 15s; }

@keyframes floatElement {
  0%, 100% { transform: translate(0, 0) scale(1); }
  25% { transform: translate(50px, 40px) scale(1.1); }
  50% { transform: translate(20px, 80px) scale(0.9); }
  75% { transform: translate(-40px, 40px) scale(1.05); }
}

/* Hero Content */
.hero-content {
  position: relative;
  z-index: 2;
  color: white;
}

.company-badge {
  display: inline-block;
  position: relative;
  background: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(10px);
  padding: 10px 25px;
  border-radius: 25px;
  margin-bottom: 20px;
}

.badge-text {
  color: white;
  font-weight: 600;
  font-size: 1.5rem;
  position: relative;
  z-index: 2;
}

.badge-sparkle {
  position: absolute;
  top: -5px;
  left: -5px;
  right: -5px;
  bottom: -5px;
  border-radius: 30px;
  background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
  animation: sparkleShimmer 3s infinite linear;
}

@keyframes sparkleShimmer {
  0% { background-position: -200% center; }
  100% { background-position: 200% center; }
}

.main-title {
  font-size: 3rem;
  font-weight: 500;
  line-height: 1.1;
  margin-bottom: 1.5rem;
  text-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
  color: white;
}

.hero-description {
  max-width: 700px;
  margin: 0 auto 50px;
}

.description-card {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border-radius: 25px;
  padding: 30px;
  border: 1px solid rgba(255, 255, 255, 0.2);
  position: relative;
  overflow: hidden;
}

.description-icon {
  font-size: 2.5rem;
  margin-bottom: 20px;
  display: block;
  animation: iconFloat 3s infinite ease-in-out;
}

.description-text {
  font-size: 1.5rem;
  line-height: 1.8;
  opacity: 0.9;
  text-align: center;
}

@keyframes iconFloat {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

/* Contact Form Section */
.contact-form-section {
  padding: 80px 0;
  background: white;
}

.section-title {
  position: relative;
  margin-bottom: 2rem;
  font-weight: 500;
  color: var(--dark-text);
}

.section-title:after {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 60px;
  height: 4px;
  background: var(--primary-blue);
  border-radius: 2px;
}

.form-container {
  background: white;
  border-radius: 20px;
  padding: 40px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  border: 1px solid #f1f5f9;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.form-container:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.form-group {
  margin-bottom: 1.5rem;
}

.form-label {
  font-weight: 600;
  color: var(--dark-text);
  margin-bottom: 0.75rem;
  display: block;
}

.form-control {
  width: 100%;
  padding: 0.875rem 1rem;
  border: 2px solid #e2e8f0;
  border-radius: 10px;
  font-size: 1.5rem;
  transition: all 0.3s ease;
  background: white;
}

.form-control:focus {
  outline: none;
  border-color: var(--primary-blue);
  box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
}

.submit-btn {
  background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-purple) 100%);
  color: white;
  border: none;
  padding: 1rem 2rem;
  border-radius: 10px;
  font-size: 1.5rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
}

.submit-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 15px 30px rgba(79, 70, 229, 0.3);
}

/* Contact Info Cards */
.contact-info-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 25px;
  margin-top: 40px;
}

.info-card {
  background: white;
  border-radius: 15px;
  padding: 25px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  border: 2px solid transparent;
  position: relative;
  overflow: hidden;
}

.info-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
  border-color: var(--primary-blue);
}

.info-icon {
  width: 50px;
  height: 50px;
  background: #e0e7ff;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 15px;
  color: var(--primary-blue);
  font-size: 1.6rem;
  transition: all 0.3s ease;
}

.info-card:hover .info-icon {
  background: var(--primary-blue);
  color: white;
  transform: scale(1.1);
}

.info-title {
  font-size: 1.5rem;
  font-weight: 500;
  color: var(--dark-text);
  margin-bottom: 10px;
}

.info-content {
  color: #4a5568;
  line-height: 1.6;
  font-size: 1.3rem;
}

/* Social Links */
.social-links {
  display: flex;
  gap: 12px;
  margin-top: 15px;
}

.social-link {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #f7fafc;
  color: var(--primary-blue);
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  transition: all 0.3s ease;
}

.social-link:hover {
  background: var(--primary-blue);
  color: white;
  transform: translateY(-3px);
  box-shadow: 0 10px 20px rgba(79, 70, 229, 0.2);
}

/* CTA Section */
.cta-section {
  padding: 60px 0;
  background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.cta-content {
  max-width: 800px;
  margin: 0 auto;
}

.cta-icon {
  font-size: 3rem;
  margin-bottom: 20px;
  animation: ctaIconFloat 3s infinite ease-in-out;
}

@keyframes ctaIconFloat {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}

.cta-title {
  font-size: 2.5rem;
  font-weight: 800;
  margin-bottom: 15px;
  color: var(--dark-text);
}

.cta-text {
  font-size: 1.5rem;
  color: #4a5568;
  margin-bottom: 30px;
  text-align: center;
}

.cta-buttons {
  display: flex;
  gap: 15px;
  justify-content: center;
  flex-wrap: wrap;
}

.btn-cta-primary,
.btn-cta-secondary,
.btn-cta-tertiary {
  padding: 12px 25px;
  border-radius: 10px;
  font-size: 1rem;
  font-weight: 600;
  text-decoration: none;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: all 0.3s ease;
}

.btn-cta-primary {
  background: var(--primary-blue);
  color: white;
}

.btn-cta-secondary {
  background: #25D366;
  color: white;
}

.btn-cta-tertiary {
  background: #ea580c;
  color: white;
}

.btn-cta-primary:hover,
.btn-cta-secondary:hover,
.btn-cta-tertiary:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.btn-cta-primary:hover {
  background: #4338ca;
}

.btn-cta-secondary:hover {
  background: #128C7E;
}

.btn-cta-tertiary:hover {
  background: #c2410c;
}

/* Responsive */
@media (max-width: 768px) {
  .modern-breadcrumb {
    top: 10px;
    padding: 0 15px;
  }
  
  .breadcrumb-trail {
    padding: 10px 20px;
    font-size: 1.3rem;
  }
  
  .contact-hero {
    min-height: 50vh;
    padding: 100px 0 40px;
  }
  
  .main-title {
    font-size: 3rem;
  }
  
  .description-card {
    padding: 20px;
  }
  
  .description-text {
    font-size: 1.5rem;
  }
  
  .contact-form-section {
    padding: 40px 0;
  }
  
  .form-container {
    padding: 25px;
  }
  
  .contact-info-grid {
    grid-template-columns: 1fr;
  }
  
  .cta-title {
    font-size: 2rem;
  }
  
  .cta-buttons {
    flex-direction: column;
    align-items: center;
  }
  
  .btn-cta-primary,
  .btn-cta-secondary,
  .btn-cta-tertiary {
    width: 100%;
    max-width: 250px;
    justify-content: center;
  }
}

@media (max-width: 480px) {
  .main-title {
    font-size: 1.6rem;
  }
  
  .company-badge {
    padding: 8px 20px;
  }
  
  .breadcrumb-trail {
    flex-direction: column;
    align-items: flex-start;
    gap: 5px;
  }
  
  .breadcrumb-separator {
    display: none;
  }
}
</style>

@endsection

@section('content')
<!-- Modern Breadcrumb Navigation -->
<div class="modern-breadcrumb">
  <div class="breadcrumb-nav">
    <div class="breadcrumb-trail">
      <a href="{{ url('/') }}" class="breadcrumb-item">
        <i class="breadcrumb-icon">🏠</i>
        <span class="breadcrumb-text">E-SHEBA</span>
      </a>
      <div class="breadcrumb-separator">›</div>
      <div class="breadcrumb-item active">
        <i class="breadcrumb-icon">📞</i>
        <span class="breadcrumb-text">যোগাযোগ</span>
      </div>
    </div>
  </div>
</div>

<!-- Contact Hero Section -->
<section class="contact-hero">
  <!-- Animated Background -->
  <div class="hero-background">
    <div class="bg-shape shape-1"></div>
    <div class="bg-shape shape-2"></div>
    <div class="bg-shape shape-3"></div>
    <div class="bg-shape shape-4"></div>
    <div class="floating-elements">
      <div class="float-element el-1">📞</div>
      <div class="float-element el-2">💻</div>
      <div class="float-element el-3">🚀</div>
      <div class="float-element el-4">💬</div>
    </div>
  </div>

  <!-- Hero Content -->
  <div class="container hero-content">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-xl-12 text-center">
        <!-- Subtitle -->
        <div class="subtitle-container">
          <div class="company-badge">
            <span class="badge-text">যোগাযোগ করুন</span>
            <div class="badge-sparkle"></div>
          </div>
        </div>

        <!-- Main Title -->
        <h1 class="main-title animate__animated animate__fadeInDown">
          E-SHEBA এর সাথে যোগাযোগ করুন
        </h1>

        <!-- Hero Description -->
        <div class="hero-description">
          <div class="description-card">
            <div class="description-icon">✨</div>
            <p class="description-text">
              ঝড়, বৃষ্টি কিংবা ছুটির দিন আমরা আছি সপ্তাহের সাত দিন ২৪ ঘন্টা আপনার যে কোন জিজ্ঞাসার উত্তর নিয়ে। 
              আপনার প্রয়োজনীয় যে কোন তথ্য জানতে যোগাযোগ করুন আমাদের সাথে। সরাসরি যোগাযোগ করুন আমাদের ফোন নাম্বারে। 
              আপনার জিজ্ঞাসা থাকলে বিস্তারিত লিখে মেইল করতে পারেন আমাদেরকে।
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact Form Section -->
<section class="contact-form-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="row g-5">
          <!-- Contact Form -->
          <div class="col-lg-7">
            <div class="form-container">
              <h2 class="section-title text-center">আপনার বার্তা পাঠান</h2>
              <p class="text-muted mb-4 text-center">নিচের ফর্মটি পূরণ করুন এবং আমরা ২৪ ঘন্টার মধ্যে আপনার কাছে ফিরে আসব।</p>
              
              <form id="contactForm">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">আপনার নাম *</label>
                      <input type="text" class="form-control" required placeholder="আপনার পূর্ণ নাম লিখুন">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">ইমেইল ঠিকানা *</label>
                      <input type="email" class="form-control" required placeholder="your@email.com">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">ফোন নাম্বার</label>
                      <input type="tel" class="form-control" placeholder="+880 1234 567890">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">বিষয় *</label>
                      <input type="text" class="form-control" required placeholder="বিষয় লিখুন">
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="form-label">আপনার বার্তা *</label>
                  <textarea class="form-control" rows="5" required placeholder="আপনার প্রয়োজনীয়তা সম্পর্কে আমাদের জানান..."></textarea>
                </div>
                
                <button type="submit" class="submit-btn">
                  <i class="fa fa-paper-plane"></i>
                  বার্তা পাঠান
                </button>
              </form>
            </div>
          </div>
          
          <!-- Contact Information -->
          <div class="col-lg-5">
            <h2 class="section-title text-center">যোগাযোগের তথ্য</h2>
            <p class="text-muted mb-5 text-center">যেকোনো চ্যানেলের মাধ্যমে আমাদের সাথে যোগাযোগ করুন</p>
            
            <div class="contact-info-grid">
              <!-- Office -->
              <div class="info-card">
                <div class="info-icon">
                  <i class="fa fa-map-marker"></i>
                </div>
                <h3 class="info-title">আমাদের অফিস</h3>
                <div class="info-content">
                  <p>আমরা ডিজিটাল প্লাটফর্মে কাজ করি,<br>
                  তবে প্রয়োজনে মিটিং এর জন্য আলাদাভাবে সময় নির্ধারণ করা হয়।</p>
                  <p><strong>সময়:</strong> সকাল ১০টা - রাত ১০টা (সপ্তাহের ৭ দিন)</p>
                </div>
              </div>
              

              <!-- Social Media -->
              <div class="info-card">
                <div class="info-icon">
                  <i class="fa fa-share-alt"></i>
                </div>
                <h3 class="info-title">আমাদের অনুসরণ করুন</h3>
                <div class="info-content">
                  <p>আপডেট এবং খবরের জন্য আমাদের সোশ্যাল মিডিয়ায় থাকুন।</p>
                  <div class="social-links">
                    <a href="#" class="social-link">
                      <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#" class="social-link">
                      <i class="fa fa-linkedin"></i>
                    </a>
                    <a href="https://wa.me/8801915357699" class="social-link">
                      <i class="fa fa-whatsapp"></i>
                    </a>
                    <a href="mailto:info@e-sheba.com" class="social-link">
                      <i class="fa fa-envelope"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
  <div class="container">
    <div class="cta-content text-center">
      <div class="cta-icon">🚀</div>
      <h2 class="cta-title">আপনার প্রজেক্ট শুরু করতে প্রস্তুত?</h2>
      <p class="cta-text">
        আমাদের সাথে যোগাযোগ করুন এবং আপনার আইডিয়াকে বাস্তবে রূপান্তর করুন
      </p>
      <div class="cta-buttons">
        <a href="tel:+8801915357699" class="btn-cta-primary">
          <i class="fa fa-phone"></i>
          <span>কল করুন</span>
        </a>
        <a href="https://wa.me/8801915357699" target="_blank" class="btn-cta-secondary">
          <i class="fa fa-whatsapp"></i>
          <span>WhatsApp</span>
        </a>
        <a href="mailto:info@e-sheba.com" class="btn-cta-tertiary">
          <i class="fa fa-envelope"></i>
          <span>ইমেইল করুন</span>
        </a>
      </div>
    </div>
  </div>
</section>



<!-- JavaScript for Contact Page -->
<script>
// Handle contact form submission
document.addEventListener('DOMContentLoaded', function() {
  const contactForm = document.getElementById('contactForm');
  if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Show success message
      const submitBtn = this.querySelector('.submit-btn');
      const originalText = submitBtn.innerHTML;
      
      submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> পাঠানো হচ্ছে...';
      submitBtn.disabled = true;
      
      // Simulate API call
      setTimeout(() => {
        alert('আপনার বার্তার জন্য ধন্যবাদ! আমরা ২৪ ঘন্টার মধ্যে আপনার সাথে যোগাযোগ করব।');
        this.reset();
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
      }, 2000);
    });
  }
  
  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      
      const targetId = this.getAttribute('href');
      if (targetId === '#') return;
      
      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop - 80,
          behavior: 'smooth'
        });
      }
    });
  });
  
  // Breadcrumb animation
  const breadcrumbTrail = document.querySelector('.breadcrumb-trail');
  if (breadcrumbTrail) {
    setTimeout(() => {
      breadcrumbTrail.style.transform = 'translateY(0)';
      breadcrumbTrail.style.opacity = '1';
    }, 500);
  }
});
</script>
@endsection