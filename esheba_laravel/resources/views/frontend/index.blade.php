@extends('frontend.layouts.app')

@section('title', 'Home - ' . ($settings->company_name ?? 'E-Sheba'))

@section('styles')
<style>
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-12 hero-content">
        <h1 class="wow fadeInUp" style="font-size: 48px; font-weight: 700; margin-bottom: 20px; color: #fff;">
          আপনার ডিজিটাল স্বপ্ন, আমাদের বাস্তবায়ন
        </h1>
        <p class="wow fadeInUp" style="font-size: 18px; margin-bottom: 30px; color: #fff; line-height: 1.6;">
          {{ $settings->company_name ?? 'E-Sheba' }} আপনার ব্যবসাকে ডিজিটাল যুগে এগিয়ে নিয়ে যেতে সফটওয়্যার, ওয়েবসাইট, অ্যাপ ডেভেলপমেন্টে সম্পূর্ণ সমাধান প্রদান করে।
        </p>
        <a href="{{ route('contact') }}" class="btn btn-white wow fadeInUp" style="padding: 12px 40px; font-size: 16px; font-weight: 600; border: 2px solid white; background: transparent; color: white;">
          আজই যোগাযোগ করুন
        </a>
      </div>
      <div class="col-md-4 col-sm-12 wow fadeInRight" style="text-align: center;">
        <img src="{{ asset('assets/images/media/esheba-banner.png') }}" class="img-responsive" alt="E-Sheba Services" style="max-width: 100%; border-radius: 12px;">
      </div>
    </div>
  </div>
</section>

<!-- Services Section -->
<section class="features-section">
  <div class="container">
    <h2 class="section-title">আমাদের সেবা সমূহ</h2>
    <p class="section-subtitle">আমরা প্রদান করি বিশ্বমানের ডিজিটাল সল্যুশন</p>
    
    <div class="row">
      <div class="col-md-4 col-sm-6">
        <div class="service-card wow fadeInUp">
          <div class="service-icon">
            <i class="fa fa-code"></i>
          </div>
          <h3 style="margin: 0 0 15px 0; color: #333;">ওয়েবসাইট ডেভেলপমেন্ট</h3>
          <p style="color: #666; margin: 0;">আধুনিক এবং প্রতিক্রিয়াশীল ওয়েবসাইট যা আপনার ব্র্যান্ডকে শক্তিশালী করে।</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="service-card wow fadeInUp" style="animation-delay: 0.1s;">
          <div class="service-icon">
            <i class="fa fa-mobile"></i>
          </div>
          <h3 style="margin: 0 0 15px 0; color: #333;">মোবাইল অ্যাপ ডেভেলপমেন্ট</h3>
          <p style="color: #666; margin: 0;">iOS এবং Android এর জন্য ইন্টারঅ্যাক্টিভ এবং ব্যবহারবান্ধব মোবাইল অ্যাপ্লিকেশন।</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="service-card wow fadeInUp" style="animation-delay: 0.2s;">
          <div class="service-icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <h3 style="margin: 0 0 15px 0; color: #333;">ই-কমার্স সমাধান</h3>
          <p style="color: #666; margin: 0;">সম্পূর্ণ ফিচারসমৃদ্ধ অনলাইন স্টোর নিরাপদ পেমেন্ট গেটওয়ে সহ।</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="service-card wow fadeInUp" style="animation-delay: 0.3s;">
          <div class="service-icon">
            <i class="fa fa-cogs"></i>
          </div>
          <h3 style="margin: 0 0 15px 0; color: #333;">সফটওয়্যার ডেভেলপমেন্ট</h3>
          <p style="color: #666; margin: 0;">কাস্টম সফটওয়্যার সমাধান যা আপনার ব্যবসায়িক চাহিদা পূরণ করে।</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="service-card wow fadeInUp" style="animation-delay: 0.4s;">
          <div class="service-icon">
            <i class="fa fa-globe"></i>
          </div>
          <h3 style="margin: 0 0 15px 0; color: #333;">ডোমেইন ও হোস্টিং</h3>
          <p style="color: #666; margin: 0;">নির্ভরযোগ্য এবং দ্রুত ডোমেইন ও হোস্টিং সেবা সাশ্রয়ী মূল্যে।</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="service-card wow fadeInUp" style="animation-delay: 0.5s;">
          <div class="service-icon">
            <i class="fa fa-life-ring"></i>
          </div>
          <h3 style="margin: 0 0 15px 0; color: #333;">২৪/৭ সাপোর্ট</h3>
          <p style="color: #666; margin: 0;">সর্বদা প্রস্তুত আমাদের দক্ষ সাপোর্ট টিম আপনার সমস্যা সমাধানে।</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Stats Section -->
<section style="padding: 60px 0; background: white;">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-3 col-sm-6">
        <div class="stat-item wow fadeInUp">
          <div class="stat-number">১০০+</div>
          <div class="stat-label">সফল প্রকল্প</div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="stat-item wow fadeInUp" style="animation-delay: 0.1s;">
          <div class="stat-number">৭০+</div>
          <div class="stat-label">হ্যাপি ক্লায়েন্ট</div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="stat-item wow fadeInUp" style="animation-delay: 0.2s;">
          <div class="stat-number">৭+</div>
          <div class="stat-label">অভিজ্ঞ টিম সদস্য</div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="stat-item wow fadeInUp" style="animation-delay: 0.3s;">
          <div class="stat-number">১০০%</div>
          <div class="stat-label">গ্রাহক সন্তুষ্টি</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Pricing Section -->
<section style="padding: 60px 0; background: #f8f9ff;">
  <div class="container">
    <h2 class="section-title">আমাদের প্যাকেজ সমূহ</h2>
    <p class="section-subtitle">সাশ্রয়ী মূল্যে সর্বোত্তম সেবা পান</p>
    
    <div class="row">
      <div class="col-md-4 col-sm-6 wow fadeInUp">
        <div class="pricing-card">
          <div class="pricing-header">
            <h3>স্ট্যাটিক ওয়েবসাইট</h3>
          </div>
          <div class="pricing-body">
            <div class="pricing-amount">৳ ১০,০০০</div>
            <p style="color: #666; font-size: 14px;">শুরু মূল্য</p>
            <ul class="pricing-list">
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> ডোমেইন এবং হোস্টিং</li>
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> SSL সার্টিফিকেট</li>
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> ১০০% নিরাপদ</li>
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> বাগ মুক্ত</li>
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> ২৪/৭ সাপোর্ট</li>
            </ul>
            <a href="{{ route('contact') }}" class="pricing-button">যোগাযোগ করুন</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 wow fadeInUp" style="animation-delay: 0.1s;">
        <div class="pricing-card" style="border-color: #667eea; transform: scale(1.05);">
          <div class="pricing-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <h3>ডাইনামিক ওয়েবসাইট</h3>
            <span style="background: #fff; color: #667eea; padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: 600; display: inline-block; margin-left: 10px;">সবচেয়ে জনপ্রিয়</span>
          </div>
          <div class="pricing-body">
            <div class="pricing-amount">৳ ২০,০০০</div>
            <p style="color: #666; font-size: 14px;">শুরু মূল্য</p>
            <ul class="pricing-list">
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> ডায়নামিক ওয়েবসাইট</li>
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> সহজ এডমিন প্যানেল</li>
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> ১০০% নিরাপদ</li>
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> ডোমেইন এবং হোস্টিং</li>
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> ২৪/৭ সাপোর্ট</li>
            </ul>
            <a href="{{ route('contact') }}" class="pricing-button">যোগাযোগ করুন</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 wow fadeInUp" style="animation-delay: 0.2s;">
        <div class="pricing-card">
          <div class="pricing-header">
            <h3>সফটওয়্যার/অ্যাপ</h3>
          </div>
          <div class="pricing-body">
            <div class="pricing-amount">৳ ২০,০০০+</div>
            <p style="color: #666; font-size: 14px;">শুরু মূল্য</p>
            <ul class="pricing-list">
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> কাস্টম সফটওয়্যার</li>
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> মোবাইল অ্যাপ্লিকেশন</li>
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> বাগ মুক্ত</li>
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> স্কেলেবল সমাধান</li>
              <li><i class="fa fa-check" style="color: #667eea; margin-right: 10px;"></i> ২৪/৭ সাপোর্ট</li>
            </ul>
            <a href="{{ route('contact') }}" class="pricing-button">যোগাযোগ করুন</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
  <div class="container">
    <h2 class="wow fadeInUp" style="color: #fff;">আপনার ব্যবসা ডিজিটাল করুন আজই</h2>
    <p class="wow fadeInUp" style="font-size: 18px; margin: 20px 0 0 0; color: #fff; text-align: center;">
      আমাদের সাথে আপনার ডিজিটাল যাত্রা শুরু করুন এবং সফলতার শিখরে পৌঁছান।
    </p>
    <a href="{{ route('contact') }}" class="cta-button wow fadeInUp">এখনই শুরু করুন</a>
  </div>
</section>

@endsection
