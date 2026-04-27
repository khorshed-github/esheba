@extends('frontend.layouts.app')

@section('title', 'Terms & Conditions - ' . ($settings->company_name ?? 'E-Sheba'))
@section('meta_description', 'Read our Terms & Conditions to understand the rules and regulations governing your use of our website and services.')

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
    <h1>Terms & Conditions</h1>
    <p>Please read our complete terms before using our website and services.</p>
  </div>
</div>

<div class="legal-container">
  <div class="legal-nav">
    <a href="{{ route('terms') }}" class="legal-nav-link" style="border-color: #0080FF; color: #0080FF;">
      <i class="fa fa-file-text" style="margin-right: 8px;"></i> Terms & Conditions
    </a>
    <a href="{{ route('privacy') }}" class="legal-nav-link">
      <i class="fa fa-shield" style="margin-right: 8px;"></i> Privacy Policy
    </a>
  </div>

  <div class="legal-section">
    <h2>Terms & Conditions</h2>
    <p class="last-updated">Last Updated: December 2024</p>
  </div>

  <div class="legal-section">
    <h3>1. Acceptance of Terms</h3>
    <p>
      By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement. {{ $settings->company_name ?? 'E-Sheba' }} reserves the right to modify these terms at any time. Your continued use of the website following the posting of revised Terms means that you accept and agree to the changes.
    </p>
  </div>

  <div class="legal-section">
    <h3>2. Use License</h3>
    <p>Permission is granted to temporarily download one copy of the materials (information or software) on {{ $settings->company_name ?? 'E-Sheba' }}'s website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
    <ul>
      <li>Modify or copy the materials</li>
      <li>Use the materials for any commercial purpose or for any public display (commercial or non-commercial)</li>
      <li>Attempt to decompile or reverse engineer any software contained on the website</li>
      <li>Remove any copyright or other proprietary notations from the materials</li>
      <li>Transfer the materials to another person or "mirror" the materials on any other server</li>
      <li>Violate any applicable laws or regulations related to access to or use of the website</li>
    </ul>
  </div>

  <div class="legal-section">
    <h3>3. Disclaimer</h3>
    <p>The materials on {{ $settings->company_name ?? 'E-Sheba' }}'s website are provided "as is". {{ $settings->company_name ?? 'E-Sheba' }} makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>
  </div>

  <div class="legal-section">
    <h3>4. Limitations</h3>
    <p>In no event shall {{ $settings->company_name ?? 'E-Sheba' }} or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on the website, even if authorized representatives have been notified orally or in writing of the possibility of such damage.</p>
  </div>

  <div class="legal-section">
    <h3>5. Accuracy of Materials</h3>
    <p>The materials appearing on {{ $settings->company_name ?? 'E-Sheba' }}'s website could include technical, typographical, or photographic errors. {{ $settings->company_name ?? 'E-Sheba' }} does not warrant that any of the materials on the website are accurate, complete, or current. {{ $settings->company_name ?? 'E-Sheba' }} may make changes to the materials contained on the website at any time without notice.</p>
  </div>

  <div class="legal-section">
    <h3>6. Links</h3>
    <p>{{ $settings->company_name ?? 'E-Sheba' }} has not reviewed all of the sites linked to the website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by {{ $settings->company_name ?? 'E-Sheba' }} of the site. Use of any such linked website is at the user's own risk.</p>
  </div>

  <div class="legal-section">
    <h3>7. Modifications</h3>
    <p>{{ $settings->company_name ?? 'E-Sheba' }} may revise these Terms and Conditions for the website at any time without notice. By using this website, you are agreeing to be bound by the then current version of these Terms and Conditions.</p>
  </div>

  <div class="legal-section">
    <h3>8. Governing Law</h3>
    <p>These Terms and Conditions and any separate agreements we provide to you as part of the website are governed by and construed in accordance with the laws of Bangladesh, and you irrevocably submit to the exclusive jurisdiction of the courts in that location.</p>
  </div>

  <div class="legal-section">
    <h3>9. Service Description</h3>
    <p>{{ $settings->company_name ?? 'E-Sheba' }} provides IT solutions including web development, software development, mobile app development, domain and hosting services. We strive to provide quality services but make no guarantees regarding the results of our work or client satisfaction.</p>
  </div>

  <div class="legal-section">
    <h3>10. Payment Terms</h3>
    <p>All payments must be made according to the agreed-upon terms. Late payments may result in suspension of services. {{ $settings->company_name ?? 'E-Sheba' }} reserves the right to change pricing and payment terms with reasonable notice.</p>
  </div>

  <div class="highlight-box">
    <p><i class="fa fa-info-circle" style="margin-right: 10px; color: #0080FF;"></i> For any questions regarding these Terms & Conditions, please contact us at {{ $settings->email ?? 'info@e-sheba.com' }}</p>
  </div>

  <div class="back-to-links">
    <a href="{{ route('privacy') }}" class="back-link">
      <i class="fa fa-shield" style="margin-right: 8px;"></i> View Privacy Policy
    </a>
    <a href="{{ route('home') }}" class="back-link">
      <i class="fa fa-home" style="margin-right: 8px;"></i> Back to Home
    </a>
  </div>
</div>
@endsection
