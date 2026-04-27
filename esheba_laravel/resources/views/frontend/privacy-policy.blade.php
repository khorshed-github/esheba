@extends('frontend.layouts.app')

@section('title', 'Privacy Policy - ' . ($settings->company_name ?? 'E-Sheba'))
@section('meta_description', 'Read our Privacy Policy to understand how we collect, use, and protect your personal information.')

@section('styles')
<style>
  .legal-hero {
    background: linear-gradient(135deg, var(--primary-cyan) 0%, var(--primary-blue) 50%, var(--primary-purple) 100%);
    color: white;
    padding: 120px 30px 80px;
    text-align: center;
    position: relative;
    overflow: hidden;
    width: 100vw;
    margin-left: calc(-50vw + 50%);
  }

  .legal-hero::before {
    content: '';
    position: absolute;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(0, 217, 255, 0.08) 0%, transparent 70%);
    border-radius: 50%;
    top: -200px;
    right: -150px;
  }

  .legal-hero::after {
    content: '';
    position: absolute;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(0, 128, 255, 0.06) 0%, transparent 70%);
    border-radius: 50%;
    bottom: -100px;
    left: -100px;
  }

  .legal-hero h1 {
    font-size: 48px;
    font-weight: 800;
    margin-bottom: 15px;
    position: relative;
    z-index: 2;
    letter-spacing: -0.5px;
  }

  .legal-hero p {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.9);
    position: relative;
    z-index: 2;
    font-weight: 500;
    text-align: center;
  }

  .legal-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 80px 30px;
  }

  .legal-nav {
    display: flex;
    gap: 15px;
    margin-bottom: 50px;
    justify-content: center;
    flex-wrap: wrap;
  }

  .legal-nav-link {
    padding: 12px 25px;
    background: linear-gradient(135deg, #f5f7ff 0%, #ffffff 100%);
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    text-decoration: none;
    color: #0f1e3f;
    font-weight: 600;
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }

  .legal-nav-link:hover {
    border-color: #0080FF;
    color: #0080FF;
    box-shadow: 0 8px 25px rgba(0, 128, 255, 0.15);
  }

  .legal-section {
    margin-bottom: 50px;
  }

  .legal-section h2 {
    font-size: 28px;
    font-weight: 700;
    color: #0f1e3f;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 3px solid #0080FF;
    display: inline-block;
  }

  .legal-section h3 {
    font-size: 18px;
    font-weight: 700;
    color: #1a2e5a;
    margin-top: 30px;
    margin-bottom: 15px;
    padding-left: 20px;
    border-left: 4px solid #00D9FF;
  }

  .legal-section p {
    color: #555;
    line-height: 1.8;
    margin-bottom: 15px;
    font-size: 15px;
  }

  .legal-section ul,
  .legal-section ol {
    margin-left: 30px;
    margin-bottom: 20px;
  }

  .legal-section li {
    color: #555;
    line-height: 1.8;
    margin-bottom: 12px;
    font-size: 15px;
  }

  .legal-section a {
    color: #0080FF;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .legal-section a:hover {
    color: #00D9FF;
    text-decoration: underline;
  }

  .highlight-box {
    background: linear-gradient(135deg, rgba(0, 128, 255, 0.08), rgba(0, 217, 255, 0.05));
    border-left: 4px solid #0080FF;
    padding: 25px;
    border-radius: 12px;
    margin: 25px 0;
  }

  .highlight-box p {
    margin: 0;
    font-weight: 500;
  }

  .back-to-links {
    display: flex;
    gap: 15px;
    margin-top: 50px;
    flex-wrap: wrap;
  }

  .back-link {
    display: inline-block;
    padding: 15px 30px;
    background: linear-gradient(135deg, #0080FF, #00D9FF);
    color: white;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }

  .back-link:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 128, 255, 0.3);
  }

  .last-updated {
    color: #666;
    font-size: 14px;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #e0e0e0;
  }

  @media (max-width: 768px) {
    .legal-hero {
      padding: 80px 20px 60px;
    }

    .legal-hero h1 {
      font-size: 32px;
    }

    .legal-hero p {
      font-size: 16px;
    }

    .legal-container {
      padding: 40px 20px;
    }

    .legal-nav {
      flex-direction: column;
    }

    .legal-nav-link {
      width: 100%;
      text-align: center;
    }

    .legal-section h2 {
      font-size: 22px;
    }

    .legal-section h3 {
      font-size: 16px;
    }

    .legal-section p,
    .legal-section li {
      font-size: 14px;
    }

    .back-to-links {
      flex-direction: column;
    }

    .back-link {
      width: 100%;
      text-align: center;
    }
  }
</style>
@endsection

@section('content')
<div class="legal-hero">
  <div style="position: relative; z-index: 2;">
    <h1>Privacy Policy</h1>
    <p>Your privacy and trust are our highest priorities.</p>
  </div>
</div>

<div class="legal-container">
  <div class="legal-nav">
    <a href="{{ route('terms') }}" class="legal-nav-link">
      <i class="fa fa-file-text" style="margin-right: 8px;"></i> Terms & Conditions
    </a>
    <a href="{{ route('privacy') }}" class="legal-nav-link" style="border-color: #0080FF; color: #0080FF;">
      <i class="fa fa-shield" style="margin-right: 8px;"></i> Privacy Policy
    </a>
  </div>

  <div class="legal-section">
    <h2>Privacy Policy</h2>
    <p class="last-updated">Last Updated: December 2024</p>
  </div>

  <div class="legal-section">
    <h3>1. Introduction</h3>
    <p>
      {{ $settings->company_name ?? 'E-Sheba' }} ("we", "us", "our", or "Company") operates the website. This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our website and the choices you have associated with that data.
    </p>
  </div>

  <div class="legal-section">
    <h3>2. Information Collection and Use</h3>
    <p>We collect several different types of information for various purposes to provide and improve our website and services to you.</p>
    
    <h3>Types of Data Collected:</h3>
    <ul>
      <li><strong>Personal Data:</strong> While using our website, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you ("Personal Data"). This may include, but is not limited to:
        <ul style="margin-top: 10px;">
          <li>Email address</li>
          <li>First name and last name</li>
          <li>Phone number</li>
          <li>Address, State, Province, ZIP/Postal code, City</li>
          <li>Cookies and Usage Data</li>
        </ul>
      </li>
      <li><strong>Usage Data:</strong> We may also collect information on how the website is accessed and used ("Usage Data"). This may include information such as your computer's Internet Protocol address, browser type, browser version, the pages you visit, the time and date of your visit, and other diagnostic data.</li>
      <li><strong>Tracking &amp; Cookies Data:</strong> We use cookies and similar tracking technologies to track activity on our website and store certain information.</li>
    </ul>
  </div>

  <div class="legal-section">
    <h3>3. Use of Data</h3>
    <p>{{ $settings->company_name ?? 'E-Sheba' }} uses the collected data for various purposes:</p>
    <ul>
      <li>To provide and maintain our website</li>
      <li>To notify you about changes to our website</li>
      <li>To provide customer support and respond to your inquiries</li>
      <li>To gather analysis or valuable information so that we can improve our website</li>
      <li>To monitor the usage of our website</li>
      <li>To detect, prevent and address technical and security issues</li>
      <li>To send marketing communications (with your consent where required)</li>
    </ul>
  </div>

  <div class="legal-section">
    <h3>4. Security of Data</h3>
    <p>The security of your data is important to us but remember that no method of transmission over the Internet or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>
  </div>

  <div class="legal-section">
    <h3>5. Cookies and Tracking Technologies</h3>
    <p>We use cookies and similar tracking technologies to track activity on our website and hold certain information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our website.</p>
  </div>

  <div class="legal-section">
    <h3>6. Third-Party Service Providers</h3>
    <p>We may employ third-party companies and individuals to facilitate our service, provide the service on our behalf, perform service-related services or assist us in analyzing how our website is used. These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>
  </div>

  <div class="legal-section">
    <h3>7. Links to Other Websites</h3>
    <p>Our website may contain links to other websites that are not operated by us. This Privacy Policy applies only to information we collect on our website. We are not responsible for the privacy practices of other websites and encourage you to review their privacy policies.</p>
  </div>

  <div class="legal-section">
    <h3>8. Children's Privacy</h3>
    <p>Our website does not address anyone under the age of 18 ("Children"). We do not knowingly collect personally identifiable information from children under 18. If you are a parent or guardian and you are aware that your child has provided us with Personal Data, please contact us immediately. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove such information and terminate the child's account.</p>
  </div>

  <div class="legal-section">
    <h3>9. Changes to This Privacy Policy</h3>
    <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date at the top of this Privacy Policy. You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>
  </div>

  <div class="legal-section">
    <h3>10. Your Rights</h3>
    <p>You have the right to access, update, or delete the information we have on you. You may request to access, correct, or delete any personal information we hold about you by contacting us using the information provided below. We will respond to your request within 30 days.</p>
  </div>

  <div class="legal-section">
    <h3>11. Data Retention</h3>
    <p>We will retain your Personal Data only for as long as necessary for the purposes set out in this Privacy Policy. We will retain and use your Personal Data to the extent necessary to comply with our legal obligations (for example, if we are required to retain your data to comply with applicable laws).</p>
  </div>

  <div class="legal-section">
    <h3>12. Contact Us</h3>
    <p>If you have any questions about this Privacy Policy, please contact us:</p>
    <ul>
      <li><strong>Email:</strong> {{ $settings->email ?? 'info@e-sheba.com' }}</li>
      <li><strong>Phone:</strong> {{ $settings->phone ?? '+88-01915357699' }}</li>
      <li><strong>Address:</strong> {{ $settings->address ?? 'Impulse City Centre (5th Floor), O.R Nizam Road, Gol Pahar Mor, Patelishan, Chattogram' }}</li>
    </ul>
  </div>

  <div class="highlight-box">
    <p>
      <i class="fa fa-lock" style="margin-right: 10px; color: #0080FF;"></i>
      Your privacy and trust are important to us. We are committed to protecting your personal information and ensuring transparency about how we use your data. If you have any concerns about our privacy practices, please don't hesitate to contact us.
    </p>
  </div>

  <div class="back-to-links">
    <a href="{{ route('terms') }}" class="back-link">
      <i class="fa fa-file-text" style="margin-right: 8px;"></i> View Terms & Conditions
    </a>
    <a href="{{ route('home') }}" class="back-link">
      <i class="fa fa-home" style="margin-right: 8px;"></i> Back to Home
    </a>
  </div>
</div>
@endsection
