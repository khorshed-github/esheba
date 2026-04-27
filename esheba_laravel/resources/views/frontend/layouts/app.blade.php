<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'E-sheba Online is a Leading IT Solution provider. It was started to provide website development, pos software solutions and app development services. We also provide IT solutions and services to National or Local Government, Private Companies and Educational Institutions.')" />
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('og_title', 'E-sheba Online')" />
    <meta property="og:description" content="@yield('meta_description', 'E-sheba Online is a Leading IT Solution provider. It was started to provide website development, pos software solutions and app development services. We also provide IT solutions and services to National or Local Government, Private Companies and Educational Institutions.')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="E-sheba Online" />
    <meta property="og:updated_time" content="{{ date('c') }}" />
    <meta property="og:image" content="@yield('og_image', asset('assets/images/media/esheba-banner.png'))" />
    <meta property="og:image:secure_url" content="@yield('og_image', asset('assets/images/media/esheba-banner.png'))" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="582" />
    <meta property="og:image:alt" content="@yield('og_image_alt', 'E-sheba Online')" />
    <meta property="og:image:type" content="image/png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('og_title', 'E-sheba Online')" />
    <meta name="twitter:description" content="@yield('meta_description', 'E-sheba Online is a Leading IT Solution provider. It was started to provide website development, pos software solutions and app development services. We also provide IT solutions and services to National or Local Government, Private Companies and Educational Institutions.')" />
    <meta name="twitter:image" content="@yield('og_image', asset('assets/images/media/esheba-banner.png'))" />
    
    <title>@yield('title', 'E-Sheba || All Service Together')</title>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('assets/bootstrap/css/bootstrap-theme.css') }}" type="text/css" rel="stylesheet" />
    <!-- Plugins CSS -->
    <link href="{{ asset('assets/css/normalize.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('assets/css/animate.css') }}" type="text/css" rel="stylesheet" />
    <!-- Main CSS -->
    <link href="{{ asset('assets/css/style.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('assets/css/responsive.css') }}" type="text/css" rel="stylesheet" />
    <!-- Theme CSS -->
    <link href="{{ asset('assets/css/theme.css') }}" type="text/css" rel="stylesheet" />
    <!-- icons -->
    <link href="{{ asset('assets/css/iline-icons.css') }}" type="text/css" rel="stylesheet" />
    <!-- Shortcut icon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/icon.png') }}" type="image/png"/>
    
    <style>
    

    .modern-topbar {
      background: linear-gradient(135deg, #00D9FF 0%, #0080FF 50%, #6B5BFF 100%);
      color: white;
      padding: 12px 0;
      border-bottom: 1px solid rgba(255,255,255,0.1);
      animation: topbarGradient 8s ease infinite;
      background-size: 200% 200%;
      position: relative;
    }

  

    .modern-topbar::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
      animation: shimmer 3s ease infinite;
    }



    .modern-topbar-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: relative;
      z-index: 1;
    }

    .topbar-info {
      font-size: 13px;
      display: flex;
      gap: 10px;
      align-items: center;
    }


    .topbar-info span:hover {
      transform: translateX(8px);
      background: rgba(255,255,255,0.15);
    }

    .topbar-social {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .topbar-social a {
      width: 35px;
      height: 35px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(255,255,255,0.2);
      border-radius: 50%;
      transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      color: white;
      border: 2px solid rgba(255,255,255,0.3);
      position: relative;
      overflow: hidden;
    }

    .topbar-social a::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      border-radius: 50%;
      background: rgba(255,255,255,0.4);
      transform: translate(-50%, -50%);
      transition: width 0.5s ease, height 0.5s ease;
    }

    .topbar-social a:hover::before {
      width: 50px;
      height: 50px;
    }

    .topbar-social a:hover {
      background: rgba(255,255,255,0.3);
      color: white;
      transform: translateY(-5px) scale(1.15);
      border-color: white;
    }

    .E-Sheba-navbar {
      background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%);
      box-shadow: 0 2px 15px rgba(0,0,0,0.08);
      transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      position: sticky;
      top: 0;
      z-index: 100;
      width: 100%;
    }

    .E-Sheba-navbar > div {
      position: relative;
    }

    .E-Sheba-navbar.scrolled {
      background: linear-gradient(135deg, #ffffff 0%, #f5f7ff 100%);
      box-shadow: 0 5px 30px rgba(0, 128, 255, 0.15);
      padding: 5px 0;
    }

    .E-Sheba-navbar::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 3px;
      background: linear-gradient(90deg, transparent, #0080FF, #00D9FF, transparent);
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    .E-Sheba-navbar.scrolled::after {
      opacity: 1;
    }

    .custom-nav-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 0;
      max-width: 1200px;
      margin: 0 auto;
      position: relative;
      width: 100%;
    }

    .nav-header {
      display: flex;
      align-items: center;
      gap: 20px;
      min-width: 200px;
    }

    .nav-logo {
      display: inline-flex;
      align-items: center;
      transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .nav-logo img {
      max-height: 60px;
      transition: all 0.4s ease;
      filter: drop-shadow(0 0 0 transparent);
    }

    .nav-logo:hover img {
      transform: scale(1.1) rotateZ(5deg);
      filter: drop-shadow(0 5px 15px rgba(0, 128, 255, 0.3));
    }

    .custom-nav-menu {
      flex: 1;
      display: flex;
      align-items: center;
    }

    .nav-items {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
      gap: 5px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .nav-item {
      position: relative;
    }

    .nav-link {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 12px 20px;
      color: #333;
      text-decoration: none;
      font-weight: 500;
      font-size: 14px;
      border-radius: 8px;
      transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      position: relative;
      overflow: hidden;
    }

    .nav-link::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(0, 128, 255, 0.12) 0%, rgba(0, 217, 255, 0.08) 100%);
      border-radius: 8px;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      z-index: -1;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 3px;
      background: linear-gradient(90deg, #0080FF, #00D9FF);
      transition: all 0.4s ease;
      transform: translateX(-50%);
      border-radius: 2px;
    }

    .nav-link i {
      font-size: 16px;
      transition: all 0.3s ease;
      color: #0080FF;
    }

    .nav-link span {
      transition: all 0.3s ease;
    }

    .nav-link:hover {
      color: #0080FF;
      transform: translateY(-3px);
    }

    .nav-link:hover::before {
      transform: scaleX(1);
    }

    .nav-link:hover::after {
      width: 100%;
      box-shadow: 0 2px 8px rgba(0, 128, 255, 0.3);
    }

    .nav-link:hover i {
      transform: scale(1.15) rotateZ(-10deg);
      color: #00D9FF;
    }

    .nav-item.active .nav-link {
      color: #0080FF;
    }

    .nav-item.active .nav-link::before {
      transform: scaleX(1);
      background: linear-gradient(135deg, rgba(0, 128, 255, 0.15) 0%, rgba(0, 217, 255, 0.1) 100%);
    }
    .nav-item.active .nav-link::after {
      width: 100%;
      box-shadow: 0 2px 8px rgba(0, 128, 255, 0.3);
    }
    .nav-item.active .nav-link i {
      color: #00D9FF;
      animation: iconPulse 1.5s ease-in-out infinite;
    }
    .mobile-menu-toggle {
      display: none !important;
      flex-direction: column;
      gap: 6px;
      background: none;
      border: none !important;
      cursor: pointer;
      padding: 8px;
      transition: all 0.3s ease;
      z-index: 100;
      position: relative;
      pointer-events: auto !important;
      width: auto;
      height: auto;
      min-width: 40px;
      min-height: 40px;
    }

    .mobile-menu-toggle span {
      width: 25px;
      height: 3px;
      background: #0080FF;
      border-radius: 2px;
      transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      display: block;
    }

    .mobile-menu-toggle:hover {
      transform: scale(1.1);
    }

    .mobile-menu-toggle:focus {
      outline: none;
    }

    .mobile-menu-toggle.active span:nth-child(1) {
      transform: rotate(45deg) translateY(12px);
    }

    .mobile-menu-toggle.active span:nth-child(2) {
      opacity: 0;
    }

    .mobile-menu-toggle.active span:nth-child(3) {
      transform: rotate(-45deg) translateY(-12px);
    }

    .site_logo {
      display: flex;
      align-items: center;
      position: relative;
    }

    .site_logo img {
      max-height: 60px;
      transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      filter: drop-shadow(0 0 0 transparent);
    }

    .site_logo:hover img {
      transform: scale(1.1) rotateZ(5deg);
      filter: drop-shadow(0 5px 15px rgba(0, 128, 255, 0.3));
    }

    @media (max-width: 768px) {
      .topbar-info {
        flex-direction: left;
        font-size: 12px;
      }
      .topbar-social {
        gap: 3px;
      }
    }

    .page-footer {
      background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-purple) 50%, var(--primary-cyan) 100%);
      color: white;
      padding: 30px 0 0 0;
      margin: 0;
      position: relative;
      overflow: hidden;
      width: 100%;
      margin-left: calc(-50vw + 50%);
    }

    .page-footer::before {
      content: '';
      position: absolute;
      width: 500px;
      height: 500px;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
      border-radius: 50%;
      top: -200px;
      right: -150px;
    }

    .page-footer::after {
      content: '';
      position: absolute;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, transparent 70%);
      border-radius: 50%;
      bottom: -100px;
      left: -100px;
    }

    .page-footer .widget {
      position: relative;
      z-index: 2;
      padding: 20px 15px;
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .page-footer .widget:hover {
      background: rgba(255, 255, 255, 0.15);
      border-color: rgba(255, 255, 255, 0.3);
      transform: translateY(-12px);
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    }

    .page-footer .widget h3 {
      font-size: 20px;
      font-weight: 500;
      margin: 0 0 20px 0;
      position: relative;
      letter-spacing: 0.5px;
      color: white;
      text-transform: capitalize;
    }

    .page-footer .widget h3::after {
      content: '';
      position: absolute;
      bottom: -12px;
      left: 0;
      width: 50px;
      height: 3px;
      background: linear-gradient(90deg, var(--primary-cyan), white);
      border-radius: 2px;
    }

    .page-footer .line-sep-gray {
      display: block;
      height: 0;
    }

    .page-footer ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .page-footer ul li {
      transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .page-footer ul li:last-child {
      margin-bottom: 0;
    }

    .page-footer ul li:hover {
      transform: translateX(8px);
    }

    .page-footer a {
      color: rgba(255,255,255,0.9);
      text-decoration: none;
      font-size: 12px;
      font-weight: 500;
      transition: all 0.4s ease;
      display: flex;
      align-items: center;
      position: relative;
      padding: 5px 5px 7px 10px;
      border-radius: 10px;
      gap:5px;
      background: rgba(255, 255, 255, 0.1);
    }

    .page-footer a::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, 0.15);
      border-radius: 10px;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.3s ease;
      z-index: -1;
    }

    .page-footer a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 12px;
      width: 0;
      height: 2px;
      background: linear-gradient(90deg, white, var(--primary-cyan));
      transition: width 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      border-radius: 1px;
    }

    .page-footer a:hover {
      color: white;
      text-shadow: 0 0 15px rgba(0, 217, 255, 0.3);
    }

    .page-footer a:hover::before {
      transform: scaleX(1);
    }

    .page-footer a:hover::after {
      width: calc(100% - 24px);
    }

    .page-footer a i {
      color: #fff;
      transition: all 0.4s ease;
      font-size: 17px;
      min-width: 20px;
      text-align: center;
    }

    .page-footer a:hover i {
      color: #ffffff;
      transform: scale(1.2) rotate(12deg);
      filter: drop-shadow(0 0 10px rgba(0, 217, 255, 0.4));
    }

    .page-footer .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 30px;
      width: 100%;
      position: relative;
      z-index: 2;
    }

    .page-footer .row {      
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 20px;
      padding-bottom: 20px;
    }

    .footer-bottom {
      background: linear-gradient(135deg, rgba(0,0,0,0.5), rgba(0,0,0,0.4));
      padding: 20px 0;
      margin: 0;
      text-align: center;
      border-top: 1px solid rgba(0, 217, 255, 0.15);
      position: relative;
      z-index: 2;
      width: 100%;
      margin-left: calc(-50vw + 50%);
      backdrop-filter: blur(10px);
    }

    .footer-bottom::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(0, 217, 255, 0.25), transparent);
    }

    .footer-bottom span {
      max-width: 100%;
      margin: 0 auto;
      display: block;
      padding: 0 30px;
      font-size: 15px;
      font-weight: 500;
      letter-spacing: 0.3px;
      color: rgba(255,255,255,0.85);
      line-height: 1.6;
    }

    .footer-bottom a {
      color: #00D9FF;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      position: relative;
      padding-bottom: 3px;
      display: inline-block;
    }

    .footer-bottom a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 0;
      height: 2px;
      background: linear-gradient(90deg, #00D9FF, #ffffff);
      transition: width 0.3s ease;
      border-radius: 1px;
    }

    .footer-bottom a:hover::after {
      width: 100%;
    }

    .footer-bottom a:hover {
      color: #ffffff;
      text-shadow: 0 0 12px rgba(0, 217, 255, 0.4);
    }

    .footer-widget-social {
      display: flex;
      gap: 20px;
      margin-top: 25px;
      justify-content: flex-start;
      flex-wrap: wrap;
    }

    .footer-widget-social a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 55px;
      height: 55px;
      background: linear-gradient(135deg, rgba(0, 217, 255, 0.15), rgba(0, 128, 255, 0.08));
      border-radius: 12px;
      transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      border: 2px solid rgba(0, 217, 255, 0.25);
      color: #00D9FF;
      font-size: 20px;
      position: relative;
      overflow: hidden;
    }

    .footer-widget-social a::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      background: radial-gradient(circle, rgba(0, 217, 255, 0.4), rgba(0, 128, 255, 0.2));
      border-radius: 50%;
      transform: translate(-50%, -50%);
      transition: width 0.4s ease, height 0.4s ease;
      z-index: 0;
    }

    .footer-widget-social a > i {
      position: relative;
      z-index: 1;
      transition: all 0.4s ease;
    }

    .footer-widget-social a:hover {
      background: linear-gradient(135deg, rgba(0, 217, 255, 0.25), rgba(0, 128, 255, 0.15));
      transform: translateY(-12px) scale(1.15);
      border-color: #00D9FF;
      color: white;
      box-shadow: 0 15px 40px rgba(0, 217, 255, 0.35);
    }

    .footer-widget-social a:hover::before {
      width: 80px;
      height: 80px;
    }

    .footer-widget-social a:hover > i {
      transform: scale(1.15) rotate(360deg);
      color: #ffffff;
      filter: drop-shadow(0 0 10px rgba(0, 217, 255, 0.4));
    }

    .line-sep-blue {
      display: inline-block;
      width: 50px;
      height: 3px;
      background: linear-gradient(90deg, var(--primary-blue), var(--primary-cyan));
      margin: 10px 0;
      border-radius: 2px;
      box-shadow: 0 0 10px rgba(0, 128, 255, 0.4);
    }

    .text-gradient {
      background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-purple) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      font-weight: 600;
      font-family: 'adorShodesh', sans-serif;
    }

    .main-content {
      width: 100%;
      padding: 0;
      margin: 0;
    }

    @media (max-width: 992px) {
      .custom-nav-container {
        flex-direction: column;
        gap: 15px;
      }

      .nav-items {
        gap: 3px;
      }

      .nav-link {
        padding: 10px 16px;
        font-size: 13px;
      }

      .nav-link i {
        font-size: 14px;
      }
    }

    @media (max-width: 768px) {
      .mobile-menu-toggle {
        display: flex !important;
      }

      .custom-nav-container {
        flex-wrap: wrap;
        padding: 0;
        position: relative;
      }

      .nav-header {
        min-width: auto;
      }

      .custom-nav-menu {
        position: fixed;
        top: 140px;
        left: 0;
        right: 0;
        width: 100%;
        background: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        box-shadow: 0 5px 15px rgba(0, 128, 255, 0.1);
        z-index: 99;
        flex: none;
      }

      .custom-nav-menu.active {
        max-height: 600px;
        overflow-y: auto;
      }

      .nav-items {
        flex-direction: column;
        gap: 5px;
        padding: 15px;
        justify-content: flex-start;
        margin: 0;
        width: 100%;
      }

      .nav-link {
        width: 100%;
        padding: 12px 16px;
        font-size: 14px;
        border-radius: 6px;
        background:#d9edf7;
      }

      .page-footer {
        padding: 20px 0 0 0;
        margin: 0;
      }
      
      .page-footer .container {
        padding: 0 20px;
      }

      .page-footer .widget {
        padding: 30px;
      }

      .page-footer .widget h3 {
        font-size: 17px;
        margin-bottom: 18px;
      }

      .page-footer .row {
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
        padding: 50px 0 40px 0;
      }

      .contact-info-section {
        padding: 50px 20px;
        margin: 0;
      }

      .contact-info-section .row {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
      }

      .contact-info-section .contact-item {
        padding: 25px;
      }

      .footer-bottom {
        padding: 30px 0;
      }

      .footer-bottom span {
        padding: 0 20px;
        font-size: 13px;
      }

      .footer-widget-social {
        justify-content: flex-start;
        gap: 15px;
      }

      .footer-widget-social a {
        width: 48px;
        height: 48px;
        font-size: 18px;
      }
    }

    @media (max-width: 480px) {
      .nav-logo img {
        max-height: 50px;
      }

      .nav-link {
        padding: 10px 12px;
        font-size: 12px;
        gap: 6px;
      }

      .nav-link i {
        font-size: 14px;
      }

      .nav-items {
        padding: 12px;
      }

      .page-footer {
        padding: 50px 0 0 0;
        margin: 0;
      }

      .page-footer .container {
        padding: 0 15px;
      }

      .page-footer .widget {
        padding: 25px;
        margin-bottom: 10px;
      }

      .page-footer .widget h3 {
        font-size: 16px;
        margin-bottom: 15px;
      }


      .page-footer a {
        font-size: 13px;
        padding: 6px 8px;
      }

      .page-footer ul li {
        margin-bottom: 12px;
      }

      .page-footer a i {
        font-size: 15px;
      }

      .contact-info-section {
        padding: 40px 15px;
        margin: 0;
      }

      .contact-info-section .container {
        padding: 0;
      }



      .contact-item {
        padding: 20px;
      }

      .contact-item .icon {
        width: 50px;
        height: 50px;
        font-size: 32px;
      }

      .contact-item p {
        font-size: 13px;
      }

      .footer-bottom {
        padding: 25px 0;
        margin: 0;
      }

      .footer-bottom span {
        padding: 0 15px;
        font-size: 12px;
        line-height: 1.6;
      }

      .footer-widget-social {
        gap: 12px;
        margin-top: 15px;
        justify-content: flex-start;
      }

      .footer-widget-social a {
        width: 46px;
        height: 46px;
        font-size: 16px;
      }

      .footer-widget-social a:hover::before {
        width: 70px;
        height: 70px;
      }
    }
    </style>
    
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '6793765487396595');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=6793765487396595&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    
    @yield('styles')
</head>
<body data-spy="scroll">
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "1578694632154896");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v18.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    
    <!-- Modern Top Bar -->
    <div class="modern-topbar">
        <div class="container">
            <div class="modern-topbar-content">
                <div class="topbar-info">
                    <span>
                        <i class="fa fa-phone"></i>
                        {{ $settings->phone ?? '+88 01915357699' }}
                    </span>
                    <span>
                        <i class="fa fa-envelope"></i>
                        {{ $settings->email ?? 'info@e-sheba.com' }}
                    </span>
                </div>
                <div class="topbar-social">
                    <a href="https://www.facebook.com/esheba247" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com/khorshedussl" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.skype.com/khorshed.alam1989" target="_blank" title="Skype"><i class="fab fa-skype"></i></a>
                    <a href="https://www.youtube.com/channel/UCN5y-XyKL01p0yBxluWqtag" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Navigation -->
    <header class="E-Sheba-navbar">
      <div class="container-fluid custom-nav-container">
        <div class="nav-header">
          <a class="nav-logo" href="{{ url('/') }}">
            <img src="{{ asset('assets/images/esheba-logo.png') }}" alt="E-Sheba Online" class="img-responsive">
          </a>
          <button type="button" class="mobile-menu-toggle" id="mobile-menu-toggle" data-toggle="menu">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>
        <nav class="custom-nav-menu" id="custom-nav-menu">
          <ul class="nav-items">
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
              <a href="{{ url('/') }}" class="nav-link">
                <i class="fa fa-home"></i>
                <span>হোম</span>
              </a>
            </li>
            <li class="nav-item {{ request()->is('packages') ? 'active' : '' }}">
              <a href="{{ route('packages') }}" class="nav-link">
                <i class="fa fa-box"></i>
                <span>প্যাকেজেস</span>
              </a>
            </li>
            <li class="nav-item {{ request()->is('domain-hosting') ? 'active' : '' }}">
              <a href="{{ route('domain.hosting') }}" class="nav-link">
                <i class="fa fa-globe"></i>
                <span>ডোমেইন হোস্টিং</span>
              </a>
            </li>
            <li class="nav-item {{ request()->is('portfolio') ? 'active' : '' }}">
              <a href="{{ route('portfolio') }}" class="nav-link">
                <i class="fa fa-briefcase"></i>
                <span>পোর্টফোলিও</span>
              </a>
            </li>
            <li class="nav-item {{ request()->is('team') ? 'active' : '' }}">
              <a href="{{ route('team') }}" class="nav-link">
                <i class="fa fa-users"></i>
                <span>টিম মেম্বার</span>
              </a>
            </li>
            <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
              <a href="{{ route('contact') }}" class="nav-link">
                <i class="fa fa-envelope"></i>
                <span>যোগাযোগ</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="old_site" target="_blank" class="nav-link">
                <i class="fa fa-globe"></i>
                <span>Old Site</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>
<!-- CONTACT INFORMATIONS -->


<!-- CONTACT INFORMATIONS -->
<section class="contact-info-section" style="background: linear-gradient(135deg, var(--primary-cyan) 0%, var(--primary-blue) 50%, var(--primary-purple) 100%); position: relative; padding: 80px 0; overflow: hidden;">
  <h2 class="hidden">Contact infos</h2>
  
  <!-- Animated Background Elements -->
  <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; z-index: 0;">
    <div style="position: absolute; width: 300px; height: 300px; background: rgba(255,255,255,0.05); border-radius: 50%; top: -100px; right: -100px; animation: float 20s infinite ease-in-out;"></div>
    <div style="position: absolute; width: 250px; height: 250px; background: rgba(255,255,255,0.08); border-radius: 50%; bottom: -50px; left: 10%; animation: float 25s infinite ease-in-out reverse;"></div>
    <div style="position: absolute; width: 200px; height: 200px; background: rgba(255,255,255,0.04); border-radius: 50%; top: 50%; right: 10%; animation: float 30s infinite ease-in-out;"></div>
  </div>

  <div class="container" style="position: relative; z-index: 1;">
    <div class="row">
      <!-- .col-md-12 -->
        <!-- All contact items -->
        <ul class="isotope-contact wow fadeInUp"  data-wow-duration="1s" data-wow-delay=".3s" style="list-style: none; display: flex; gap: 20px; justify-content: space-around; flex-wrap: wrap; padding: 0; margin: 0;">
            <div class="col-md-3" style="flex: 1; min-width: 250px;">
          <!-- .feature-item -->
          <li class="contact-item" style="background: rgba(255,255,255,0.12); backdrop-filter: blur(10px); border-radius: 20px; padding: 40px 20px; border: 1px solid rgba(255,255,255,0.2); transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55); position: relative; overflow: hidden;">
            <div style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent); transition: left 0.6s ease;"></div>
            <div class="contact-body text-center" style="position: relative; z-index: 1;">
              <i class="icon text-primary iline1-maps3" style="font-size: 48px; color: white; display: block; margin-bottom: 15px; text-shadow: 0 0 20px rgba(255,255,255,0.3);"></i>
              <span class="line-sep-blue" style="display: block; margin: 15px auto;"></span>
              <p class="text-center text-white" style="font-size: 14px; line-height: 1.6; color: rgba(255,255,255,0.95);">
                  {{ $settings->address ?? ' Epic Emdad Heights, 5th Floor, Chawtteshawry Circle, Chittagong, Bangladesh.' }}
              </p>
            </div>
          </li>
          <!-- /.contact-item -->
          </div>
          <div class="col-md-3" style="flex: 1; min-width: 250px;">
          <!-- .contact-item -->
          <li class="contact-item" style="background: rgba(255,255,255,0.12); backdrop-filter: blur(10px); border-radius: 20px; padding: 40px 20px; border: 1px solid rgba(255,255,255,0.2); transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55); position: relative; overflow: hidden;">
            <div style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent); transition: left 0.6s ease;"></div>
            <div class="contact-body text-center" style="position: relative; z-index: 1;">
              <i class="icon text-primary iline2-call10" style="font-size: 48px; color: white; display: block; margin-bottom: 15px; text-shadow: 0 0 20px rgba(255,255,255,0.3);"></i>
              <span class="line-sep-blue" style="display: block; margin: 15px auto;"></span>
              <p class="text-center text-white" style="font-size: 14px; line-height: 1.6; color: rgba(255,255,255,0.95);">
                {{ $settings->phone ?? '০১৯১৫ ৩৫ ৭৬ ৯৯' }}<br/>
                {{ '01722 37 18 82' }}<br/>
              </p>
            </div>
          </li>
          <!-- /.contact-item -->
          </div>
          <div class="col-md-3" style="flex: 1; min-width: 250px;">
          <!-- .contact-item -->
          <li class="contact-item" style="background: rgba(255,255,255,0.12); backdrop-filter: blur(10px); border-radius: 20px; padding: 40px 20px; border: 1px solid rgba(255,255,255,0.2); transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55); position: relative; overflow: hidden;">
            <div style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent); transition: left 0.6s ease;"></div>
            <div class="contact-body text-center" style="position: relative; z-index: 1;">
              <i class="icon text-primary iline2-address16" style="font-size: 48px; color: white; display: block; margin-bottom: 15px; text-shadow: 0 0 20px rgba(255,255,255,0.3);"></i>
              <span class="line-sep-blue" style="display: block; margin: 15px auto;"></span>
              <p class="text-center text-white" style="font-size: 14px; line-height: 1.6; color: rgba(255,255,255,0.95);">
                {{ $settings->email ?? 'esheba2024@gmail.com' }}<br/>
                {{ 'info@e-sheba.com' }}<br/>
              </p>
            </div>
          </li>
          <!-- /.contact-item -->
          </div>
          <div class="col-md-3" style="flex: 1; min-width: 250px;">
          <!-- .contact-item -->
          <li class="contact-item" style="background: rgba(255,255,255,0.12); backdrop-filter: blur(10px); border-radius: 20px; padding: 40px 20px; border: 1px solid rgba(255,255,255,0.2); transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55); position: relative; overflow: hidden;">
            <div style="position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent); transition: left 0.6s ease;"></div>
            <div class="contact-body text-center" style="position: relative; z-index: 1;">
              <i class="icon text-primary iline2-round27" style="font-size: 48px; color: white; display: block; margin-bottom: 15px; text-shadow: 0 0 20px rgba(255,255,255,0.3);"></i>
              <span class="line-sep-blue" style="display: block; margin: 15px auto;"></span>
              <p class="text-center text-white" style="font-size: 14px; line-height: 1.6; color: rgba(255,255,255,0.95);">
                শনি – বৃহস্পতিঃ সকাল ১০টা – রাত ১০টা 
              </p>
            </div>
          </li>
          <!-- /.contact-item -->
          </div>
        </ul>
        <!-- /All contact items -->
      </div>
      <!-- /.col-md-12 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.inner -->
  
  <style>
    @keyframes float {
      0%, 100% { transform: translateY(0px) translateX(0px); }
      50% { transform: translateY(-20px) translateX(10px); }
    }
    
    .contact-item:hover {
      background: rgba(255,255,255,0.18) !important;
      border-color: rgba(255,255,255,0.35) !important;
      transform: translateY(-12px);
      box-shadow: 0 20px 50px rgba(0,0,0,0.2);
    }
    
    .contact-item:hover > div:first-child {
      left: 100%;
    }
    
    .contact-item i {
      transition: all 0.4s ease;
    }
    
    .contact-item:hover i {
      transform: scale(1.15) rotate(360deg);
      filter: drop-shadow(0 0 15px rgba(255,255,255,0.5));
    }
  </style>
</section>
<!-- CONTACT INFORMATIONS END -->
    <!-- Footer -->
    <section id="bottom" class="page-footer">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>যোগাযোগ</h3>
                        <span class="line-sep-gray"></span>
                        <ul>
                            <li><a target="_blank" href="https://www.facebook.com/esheba247"><i class="iline3-facebook27"></i> Facebook Page</a></li>
                            <li><a href="tel:+88-01915357699"><i class="iline2-call11"></i> +88-01915357699</a></li>
                            <li><a href="tel:+88-01722371882"><i class="iline2-call12"></i> +88-01722371882</a></li>
                            <li><a href="mailto:{{ $settings->email ?? 'info@e-sheba.com' }}"><i class="iline3-google27"></i> {{ $settings->email ?? 'info@e-sheba.com' }}</a></li>
                            <li><a target="_blank" href="https://www.youtube.com/channel/UCN5y-XyKL01p0yBxluWqtag"><i class="iline3-youtube16"></i> Youtube Channel</a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>আমাদের সম্পর্কে</h3>
                        <span class="line-sep-gray"></span>
                        <ul>
                            <li><a href="."><i class="fa fa-angle-double-right" aria-hidden="true"></i> আপনার চাওয়া অনুযায়ী ডিজাইন।</a></li>
                            <li><a href="."><i class="fa fa-angle-double-right" aria-hidden="true"></i> ফুল ফ্রেশ রেসপনসিব ডিজাইন।</a></li>
                            <li><a href="."><i class="fa fa-angle-double-right" aria-hidden="true"></i> আপনার স্বপ্ন, আমাদের বাস্তবায়ন।</a></li>
                            <li><a href="."><i class="fa fa-angle-double-right" aria-hidden="true"></i> ট্যালেন্ট এবং এক্সপার্ট টিম।</a></li>
                            <li><a href="."><i class="fa fa-angle-double-right" aria-hidden="true"></i> ইয়াং এবং এনাজর্েটিক টিম।</a></li>
                            <li><a href="."><i class="fa fa-angle-double-right" aria-hidden="true"></i> টাইম সিডিউল মেইনটেইন করা হয়। </a></li>
                            <li><a href="."><i class="fa fa-angle-double-right" aria-hidden="true"></i> খুবই রিজেনেবল প্রাইজ। </a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3> সার্ভিস সম্পর্কে </h3>
                        <span class="line-sep-gray"></span>
                        <ul>
                            <li><a href="."><i class="fa fa-angle-double-right" aria-hidden="true"></i> অয়েব ডিজাইন </a></li>
                            <li><a href="."><i class="fa fa-angle-double-right" aria-hidden="true"></i> অয়েব ডেভেলপমেন্ট </a></li>
                            <li><a href="."><i class="fa fa-angle-double-right" aria-hidden="true"></i> সফটওয়্যার ডেভেলপমেন্ট</a></li>
                            <li><a href="."><i class="fa fa-angle-double-right" aria-hidden="true"></i> অ্যাপ ডেভেলপমেন্ট</a></li>
                            <li><a href="."><i class="fa fa-angle-double-right" aria-hidden="true"></i> গ্রাফিকস ডিজাইন</a></li>
                            <li><a href="."><i class="fa fa-angle-double-right" aria-hidden="true"></i> ডোমেইন এবং হোস্টিং </a></li>
                            <li><a href="."><i class="fa fa-angle-double-right" aria-hidden="true"></i> এসইও মার্কেটিং </a></li>
                        </ul>
                    </div>    
                </div><!--/.col-md-3-->
                
                <div class="col-md-3 col-sm-6">
                    <div class="widget">
                        <h3>আমাদেরকে অনুসরন করুন</h3>
                        <span class="line-sep-gray"></span>
                        <div class="fotter_gallery">
                            <div class="topbar-social">
                                <a href="https://www.facebook.com/esheba247" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/khorshedussl" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.skype.com/khorshed.alam1989" target="_blank" title="Skype"><i class="fa fa-skype"></i></a>
                                <a href="https://www.youtube.com/channel/UCN5y-XyKL01p0yBxluWqtag" target="_blank" title="YouTube"><i class="fa fa-youtube"></i></a>
                            </div>
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fesheba247&tabs&width=300&height=250&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=767934057741808" height="210" style="border:none;overflow:hidden;width: 230px;margin-top: 20px;border-radius: 10px;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" title=""></iframe>
                        </div>
                    </div>    
                </div><!--/.col-md-3-->
            </div>
        </div>
    </section>
    
    <div class="container-fluid" style="background: linear-gradient(135deg, var(--primary-purple) 0%, var(--primary-blue) 100%);">
        <div class="row">
            <a aria-label="" href="https://api.whatsapp.com/send?phone=8801915357699&text=Hello%20%F0%9F%91%8B%0AYou%20are%20connected%20with%20e-Sheba.%0A%0AWhich%20software%20solution%20are%20you%20looking%20for%20for%20your%20organization%3F%0A%0A1%EF%B8%8F%E2%83%A3%20School%20%2F%20College%20Management%0A2%EF%B8%8F%E2%83%A3%20Hospital%20%2F%20Clinic%20Management%0A3%EF%B8%8F%E2%83%A3%20Shop%20%2F%20POS%20%26%20Inventory%0A4%EF%B8%8F%E2%83%A3%20Custom%20Software%20Development%0A5%EF%B8%8F%E2%83%A3%20Custom%20Website%20Development%0A6%EF%B8%8F%E2%83%A3%20Mobile%20App%20Development%0A%0APlease%20reply%20with%20the%20number%20only.">
                <img src="{{ asset('assets/images/Live-Chat.gif') }}" style="width: 128px; position: fixed; bottom: 4%; right: 3%;z-index: 200;" alt="">
            </a>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:10px;color:white">
                <center><span>কপিরাইট &copy; {{ date('Y') }} <a href="{{ url('/') }}" aria-label="" style="color: white; text-decoration: underline;">{{ $settings->company_name ?? 'E-SHEBA' }}</a> সর্বস্বত্ব সংরক্ষিত।   <a href="{{ url('/terms-conditions') }}" aria-label="" style="color: white; text-decoration: underline;">Terms & Conditions</a> |  <a href="{{ url('/privacy-policy') }}" aria-label="" style="color: white; text-decoration: underline;">Privacy Policy</a></span></center>  
            </div>
        </div>
    </div>
    
    <!-- Back to top -->
    <div id="back-to-top" class="back-to-top">
      <a href="#" class="icon iline2-thin16 no-margin" aria-label=""></a>
    </div>
    <!-- Back to top end -->
    <!-- Scripts -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'bn',
        includedLanguages: 'en,es,fr,de,zh-CN,ja,ru,pt,it,ar,bn',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
      }, 'google_translate_element');
    }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    
    <script>
(function(){
  // elements
  var toggleBtn = document.getElementById('mobile-menu-toggle');
  var menu = document.getElementById('custom-nav-menu');
  var pageBody = document.body;

  if (!toggleBtn || !menu) return;

  // helper: check if menu currently open
  function isOpen() {
    return menu.classList.contains('active');
  }

  // open menu
  function openMenu() {
    menu.classList.add('active');
    toggleBtn.classList.add('active');
    toggleBtn.setAttribute('aria-expanded', 'true');
    // prevent background scrolling on small screens
    pageBody.style.overflow = 'hidden';
  }

  // close menu
  function closeMenu() {
    menu.classList.remove('active');
    toggleBtn.classList.remove('active');
    toggleBtn.setAttribute('aria-expanded', 'false');
    pageBody.style.overflow = '';
  }

  // toggle handler
  toggleBtn.addEventListener('click', function(e){
    e.stopPropagation();
    if (isOpen()) closeMenu();
    else openMenu();
  });

  // close when clicking any nav link (mobile)
  menu.addEventListener('click', function(e){
    var target = e.target;
    // if a link inside menu was clicked, close the menu
    while (target && target !== menu) {
      if (target.tagName && target.tagName.toLowerCase() === 'a') {
        // only close on small viewports (prevent closing on desktop)
        if (window.innerWidth <= 992) closeMenu();
        return;
      }
      target = target.parentNode;
    }
  });

  // close on click outside menu (on small screens)
  document.addEventListener('click', function(e){
    if (!isOpen()) return;
    var insideMenu = menu.contains(e.target) || toggleBtn.contains(e.target);
    if (!insideMenu && window.innerWidth <= 992) closeMenu();
  });

  // close on Escape
  document.addEventListener('keydown', function(e){
    if (e.key === 'Escape' && isOpen()) closeMenu();
  });

  // ensure menu state resets on resize (desktop -> mobile and vice versa)
  var resizeTimeout;
  window.addEventListener('resize', function(){
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(function(){
      if (window.innerWidth > 992 && isOpen()) {
        // if user resized to desktop while menu open, reset styles
        closeMenu();
      }
    }, 120);
  });

  // ARIA defaults
  toggleBtn.setAttribute('aria-controls', 'custom-nav-menu');
  if (!toggleBtn.hasAttribute('aria-expanded')) toggleBtn.setAttribute('aria-expanded', 'false');

})();
</script>

    @yield('scripts')
</body>
</html>