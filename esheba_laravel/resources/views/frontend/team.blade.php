@extends('frontend.layouts.app')

@section('title', 'Team - ' . ($settings->company_name ?? 'E-Sheba'))

@section('styles')
<style>
/* Base Styles with Larger Fonts */
:root {
    --primary-color: var(--primary-blue);
    --secondary-color: var(--primary-purple);
    --accent-color: var(--primary-cyan);
    --success-color: #4ade80;
    --warning-color: #f59e0b;
    --danger-color: #ef4444;
    --dark-color: #1e293b;
    --light-color: #f8fafc;
    --gradient-primary: linear-gradient(135deg, var(--primary-blue), var(--primary-purple));
    --gradient-secondary: linear-gradient(135deg, var(--primary-cyan), var(--primary-blue));
    --gradient-accent: linear-gradient(135deg, var(--primary-purple), var(--primary-blue));
    --gradient-light: linear-gradient(135deg, #f8fafc, #e2e8f0);
    --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.1);
    --shadow-md: 0 10px 25px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 20px 50px rgba(0, 0, 0, 0.15);
    --shadow-xl: 0 30px 60px rgba(0, 0, 0, 0.2);
    --font-bangla: 'Noto Sans Bengali', 'SolaimanLipi', 'Kalpurush', sans-serif;
    
    --font-size-xs: 1.5rem;      /* 16px */
    --font-size-sm: 1.7rem;  /* 18px */
    --font-size-base: 1.75rem; /* 20px */
    --font-size-md: 1.7rem;    /* 24px */
    --font-size-lg: 2rem;      /* 32px */
    --font-size-xl: 2.5rem;    /* 40px */
    --font-size-2xl: 3rem;     /* 48px */
    --font-size-3xl: 3.5rem;   /* 56px */
    --font-size-4xl: 4rem;     /* 64px */
    
    --spacing-xs: 0.5rem;
    --spacing-sm: 1rem;
    --spacing-md: 1.5rem;
    --spacing-lg: 2rem;
    --spacing-xl: 3rem;
    --spacing-2xl: 4rem;
}


body {
    font-size: var(--font-size-base);
}
/* Modern Portfolio Section */
.modern-portfolio-section {
    background: var(--light-color);
}

/* Portfolio Hero */
.portfolio-hero {
    min-height: 100vh;
    background: var(--gradient-primary);
    padding: 140px 0 80px;
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
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 12px 24px;
    border-radius: 30px;
    border: 1px solid rgba(255, 255, 255, 0.2);
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
    color: var(--accent-color);
    transform: translateX(-3px);
}

.breadcrumb-item.active {
    color: white;
    font-weight: 600;
}

.breadcrumb-icon {
    font-size: 1rem;
}

.breadcrumb-separator {
    color: rgba(255, 255, 255, 0.5);
    font-size: 1.2rem;
}

.breadcrumb-progress {
    margin-top: 8px;
    height: 3px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 2px;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    width: 0%;
    background: linear-gradient(90deg, var(--accent-color), white);
    animation: progressLoad 2s ease-out forwards;
}

@keyframes progressLoad {
    to { width: 100%; }
}

.modern-team-section {
    background:  var(--gradient-primary);
    min-height: 100vh;
    padding: var(--spacing-2xl) 0;
}

/* Enhanced Background */
.team-background-elements {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    pointer-events: none;
    overflow: hidden;
}

.bg-shape {
    position: absolute;
    border-radius: 50%;
    background: linear-gradient(45deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.05));
    filter: blur(60px);
}

.shape-1 {
    width: 500px;
    height: 500px;
    top: -200px;
    right: -200px;
    animation: floatShape 25s infinite ease-in-out;
}

.shape-2 {
    width: 400px;
    height: 400px;
    bottom: -150px;
    left: -150px;
    animation: floatShape 30s infinite ease-in-out reverse;
}

.shape-3 {
    width: 300px;
    height: 300px;
    top: 30%;
    right: 15%;
    animation: floatShape 35s infinite ease-in-out;
}

.shape-4 {
    width: 200px;
    height: 200px;
    bottom: 30%;
    left: 15%;
    animation: floatShape 40s infinite ease-in-out reverse;
}

@keyframes floatShape {
    0%, 100% { transform: translate(0, 0) rotate(0deg) scale(1); }
    25% { transform: translate(80px, 60px) rotate(90deg) scale(1.1); }
    50% { transform: translate(40px, 120px) rotate(180deg) scale(0.9); }
    75% { transform: translate(-60px, 80px) rotate(270deg) scale(1.05); }
}

.animated-grid {
    position: absolute;
    width: 100%;
    height: 100%;
    background-image: 
        linear-gradient(rgba(102, 126, 234, 0.1) 1px, transparent 1px),
        linear-gradient(90deg, rgba(102, 126, 234, 0.1) 1px, transparent 1px);
    background-size: 80px 80px;
    animation: gridMove 40s linear infinite;
}

@keyframes gridMove {
    from { background-position: 0 0; }
    to { background-position: 80px 80px; }
}

/* Enhanced Header */
.team-header {
    padding: var(--spacing-xl) 0;
}

.title-animation-wrapper {
    position: relative;
    margin-bottom: var(--spacing-lg);
}

.team-main-title {
    font-size: clamp(2.5rem, 8vw, 5rem);
    font-weight: 900;
    line-height: 1.1;
    margin: 0;
    position: relative;
    z-index: 2;
}

.title-gradient {
    background: linear-gradient(45deg, #667eea, #764ba2, #ff6b6b, #4ecdc4);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    background-size: 300% 300%;
    animation: gradientShift 8s ease infinite;
}

@keyframes gradientShift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.title-shadow {
    position: absolute;
    top: 10px;
    left: 0;
    right: 0;
    font-size: clamp(2.5rem, 8vw, 5rem);
    font-weight: 900;
    color: rgba(102, 126, 234, 0.1);
    z-index: 1;
    text-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

/* Company Badge */
.company-wrapper {
    margin: var(--spacing-xl) 0;
}

.company-badge-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--spacing-md);
}

.company-badge {
    position: relative;
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
    padding: 1rem 2.5rem;
    border-radius: 50px;
    font-size: var(--font-size-md);
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
}

.badge-glow {
    position: absolute;
    inset: -5px;
    background: linear-gradient(45deg, #667eea, #764ba2);
    border-radius: 55px;
    filter: blur(20px);
    opacity: 0.6;
    animation: badgePulse 3s infinite ease-in-out;
}

.badge-sparkle {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.8) 2px, transparent 2px);
    background-size: 20px 20px;
    transform: translate(-50%, -50%) rotate(0deg);
    animation: sparkleRotate 10s linear infinite;
}

@keyframes badgePulse {
    0%, 100% { opacity: 0.4; transform: scale(1); }
    50% { opacity: 0.8; transform: scale(1.05); }
}

@keyframes sparkleRotate {
    from { transform: translate(-50%, -50%) rotate(0deg); }
    to { transform: translate(-50%, -50%) rotate(360deg); }
}

.company-name {
    font-size: clamp(1.5rem, 4vw, 2.5rem);
    color: #333;
    font-weight: 600;
    padding: 0 2rem;
    position: relative;
}

.company-name::before,
.company-name::after {
    content: '"';
    color: #667eea;
    font-size: 2em;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

.company-name::before {
    left: 0;
}

.company-name::after {
    right: 0;
}

/* Enhanced Description */
.team-description-wrapper {
    max-width: 800px;
    margin: 0 auto;
}

.description-container {
    background: rgba(255, 255, 255, 0.9);
    padding: var(--spacing-lg);
    border-radius: 30px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
}

.team-intro {
    font-size: clamp(1.125rem, 3vw, 1.5rem);
    line-height: 1.8;
    color: #444;
    margin-bottom: var(--spacing-md);
    text-align: center;
}

.highlight-text {
    font-weight: 700;
    color: #667eea;
    position: relative;
    display: inline-block;
}

.highlight-text::after {
    content: '';
    position: absolute;
    bottom: 2px;
    left: 0;
    width: 100%;
    height: 6px;
    background: rgba(102, 126, 234, 0.2);
    border-radius: 3px;
    z-index: -1;
}

.team-motto {
    font-size: clamp(1.125rem, 3vw, 1.5rem);
    color: #764ba2;
    font-weight: 600;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--spacing-sm);
}

.motto-icon {
    animation: iconFloat 3s infinite ease-in-out;
}

@keyframes iconFloat {
    0%, 100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-10px) scale(1.2); }
}

/* Enhanced Separator */
.modern-separator {
    margin: var(--spacing-xl) auto;
    max-width: 600px;
}

.separator-wrapper {
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
}

.separator-line-left,
.separator-line-right {
    flex: 1;
    height: 4px;
    background: linear-gradient(90deg, transparent, #667eea);
    border-radius: 2px;
}

.separator-line-right {
    background: linear-gradient(90deg, #667eea, transparent);
}

.separator-center {
    position: relative;
}

.separator-icon-wrapper {
    position: relative;
    width: 80px;
    height: 80px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
}

.separator-icon {
    font-size: 2.5rem;
    z-index: 2;
}

.separator-rings {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.ring {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 2px solid rgba(102, 126, 234, 0.2);
    border-radius: 50%;
    animation: ringExpand 3s infinite ease-in-out;
}

.ring-1 { width: 100px; height: 100px; animation-delay: 0s; }
.ring-2 { width: 120px; height: 120px; animation-delay: 0.5s; }
.ring-3 { width: 140px; height: 140px; animation-delay: 1s; }

@keyframes ringExpand {
    0%, 100% { opacity: 0; transform: translate(-50%, -50%) scale(0.8); }
    50% { opacity: 1; transform: translate(-50%, -50%) scale(1.2); }
}

/* Enhanced Team Card */
.enhanced-team-card {
    height: 100%;
    perspective: 1500px;
}

.team-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    background: white;
    border-radius: 30px;
    overflow: hidden;
    box-shadow: 0 30px 90px rgba(0, 0, 0, 0.15);
    transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    margin-bottom: 10px;
}



/* Profile Section */
.profile-section {
    position: relative;
    padding: var(--spacing-lg);
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 30px 30px 0 0;
    overflow: hidden;
}

.profile-image-wrapper {
    position: relative;
    width: 200px;
    height: 200px;
    margin: 0 auto var(--spacing-lg);
}

.profile-frame {
    position: relative;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    overflow: hidden;
    border: 6px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.profile-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.8s ease;
}



.profile-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.6s ease;
}



.btn-view-profile {
    background: linear-gradient(45deg, #4ecdc4, #44a08d);
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-size: var(--font-size-sm);
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-view-profile:hover {
    transform: scale(1.1);
    box-shadow: 0 10px 30px rgba(78, 205, 196, 0.4);
}

.profile-badges {
    position: absolute;
    top: 20px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    gap: var(--spacing-xs);
}

.badge-experience,
.badge-specialty {
    background: rgba(255, 255, 255, 0.95);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: var(--font-size-xs);
    font-weight: 600;
    color: #333;
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    animation: badgeFloat 4s infinite ease-in-out;
}

.badge-experience {
    background: linear-gradient(45deg, #ffe66d, #ffd166);
}

.badge-specialty {
    background: linear-gradient(45deg, #4ecdc4, #44a08d);
    color: white;
}

@keyframes badgeFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.animated-profile-border {
    position: absolute;
    top: -10px;
    left: -10px;
    right: -10px;
    bottom: -10px;
    border: 3px solid transparent;
    border-radius: 50%;
    background: linear-gradient(45deg, #667eea, #764ba2, #ff6b6b, #4ecdc4, #667eea);
    background-size: 400% 400%;
    animation: borderRotate 4s linear infinite;
    opacity: 0;
    transition: opacity 0.6s ease;
}



@keyframes borderRotate {
    0% { background-position: 0% 50%; }
    100% { background-position: 400% 50%; }
}

/* Quick Stats */
.quick-stats {
    display: flex;
    justify-content: center;
    gap: var(--spacing-lg);
    background: rgba(255, 255, 255, 0.1);
    padding: var(--spacing-md);
    border-radius: 20px;
    backdrop-filter: blur(10px);
}

.stat {
    text-align: center;
    color: white;
}

.stat-icon {
    font-size: var(--font-size-lg);
    margin-bottom: var(--spacing-xs);
    display: block;
}

.stat-value {
    font-size: var(--font-size-lg);
    font-weight: 700;
    margin-bottom: var(--spacing-xs);
}

.stat-label {
    font-size: var(--font-size-xs);
    opacity: 0.9;
}

/* Information Section */
.information-section {
    padding: var(--spacing-lg);
}

/* Name & Position */
.name-position {
    margin-bottom: var(--spacing-lg);
    text-align: center;
}

.member-name-display {
    font-size: clamp(1.5rem, 4vw, 2rem);
    font-weight: 800;
    color: #1a237e;
    margin-bottom: var(--spacing-sm);
    position: relative;
    display: inline-block;
}

.name-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(102, 126, 234, 0.3), transparent);
    filter: blur(20px);
    opacity: 0;
    transition: opacity 0.6s ease;
}



.position-display {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--spacing-xs);
}

.position-icon {
    font-size: var(--font-size-md);
    animation: iconBounce 2s infinite ease-in-out;
}

@keyframes iconBounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

.position-text {
    font-size: var(--font-size-base);
    color: #666;
    font-weight: 600;
    margin: 0;
}

/* Bio Section */
.bio-section {
    margin-bottom: var(--spacing-lg);
}

.member-biography {
    font-size: var(--font-size-base);
    line-height: 1.8;
    color: #555;
    margin-bottom: var(--spacing-md);
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: all 0.6s ease;
}

.bio-section.expanded .member-biography {
    -webkit-line-clamp: unset;
}

.btn-toggle-bio {
    background: none;
    border: 2px solid #667eea;
    color: #667eea;
    padding: 0.75rem 1.5rem;
    border-radius: 50px;
    font-size: var(--font-size-sm);
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
    margin: 0 auto;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-toggle-bio:hover {
    background: #667eea;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
}

/* Social Connect */
.social-connect {
    margin-bottom: var(--spacing-lg);
}

.connect-title {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    margin-bottom: var(--spacing-md);
}

.connect-title span {
    font-size: var(--font-size-base);
    font-weight: 600;
    color: #333;
    white-space: nowrap;
}

.connect-line {
    flex: 1;
    height: 2px;
    background: linear-gradient(90deg, #667eea, transparent);
}

.social-icons-large {
    display: flex;
    flex-wrap: wrap;
    gap: var(--spacing-sm);
    justify-content: center;
}

.social-btn {
    position: relative;
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
    padding: 1rem 1.5rem;
    border-radius: 50px;
    color: white;
    text-decoration: none;
    font-size: var(--font-size-sm);
    font-weight: 600;
    overflow: hidden;
    transition: all 0.3s ease;
}

.social-label {
    display: inline-block;
}

@media (max-width: 768px) {
    .social-label {
        display: none;
    }
    
    .social-btn {
        padding: 1rem;
        width: 60px;
        height: 60px;
        justify-content: center;
    }
}

.facebook-btn { background: #1877f2; }
.twitter-btn { background: #1da1f2; }
.linkedin-btn { background: #0077b5; }
.email-btn { background: #ea4335; }
.phone-btn { background: #4caf50; }

.social-btn:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
}

.btn-effect {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    transition: left 0.6s ease;
}

.social-btn:hover .btn-effect {
    left: 100%;
}

/* Skills Section */
.skills-section {
    margin-top: var(--spacing-lg);
}

.skills-title {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
    margin-bottom: var(--spacing-md);
}

.skills-title span {
    font-size: var(--font-size-base);
    font-weight: 600;
    color: #333;
}

.skills-icon {
    font-size: var(--font-size-md);
    animation: iconSpin 4s linear infinite;
}

@keyframes iconSpin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.skills-tags {
    display: flex;
    flex-wrap: wrap;
    gap: var(--spacing-xs);
}

.skill-tag {
    background: linear-gradient(45deg, #f0f4ff, #e8f0ff);
    color: #667eea;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: var(--font-size-xs);
    font-weight: 600;
    border: 2px solid rgba(102, 126, 234, 0.2);
    transition: all 0.3s ease;
}

.skill-tag:hover {
    background: #667eea;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
}

/* Card Effects */
.card-effects {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.effect-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80%;
    height: 80%;
    background: radial-gradient(circle, rgba(102, 126, 234, 0.1), transparent);
    filter: blur(40px);
    opacity: 0;
    transition: opacity 0.6s ease;
}


.particle {
    position: absolute;
    width: 6px;
    height: 6px;
    background: #667eea;
    border-radius: 50%;
    animation: particleFloat 15s infinite linear;
}

.particle:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
.particle:nth-child(2) { top: 60%; left: 80%; animation-delay: 5s; }
.particle:nth-child(3) { bottom: 30%; left: 30%; animation-delay: 10s; }

@keyframes particleFloat {
    0% { transform: translate(0, 0); opacity: 0; }
    10% { opacity: 1; }
    90% { opacity: 1; }
    100% { transform: translate(var(--tx, 100px), var(--ty, -100px)); opacity: 0; }
}

/* Empty State */
.team-empty-state {
    padding: var(--spacing-2xl) var(--spacing-lg);
}

.empty-content {
    max-width: 600px;
    margin: 0 auto;
    text-align: center;
}

.empty-animation-container {
    margin-bottom: var(--spacing-xl);
}

.empty-animation {
    position: relative;
    width: 200px;
    height: 200px;
    margin: 0 auto;
}

.animation-circle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.circle-element {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 3px dashed #667eea;
    border-radius: 50%;
    animation: circleSpin 15s linear infinite;
}

.circle-element:nth-child(1) { width: 150px; height: 150px; animation-delay: 0s; }
.circle-element:nth-child(2) { width: 120px; height: 120px; animation-delay: 5s; }
.circle-element:nth-child(3) { width: 90px; height: 90px; animation-delay: 10s; }

@keyframes circleSpin {
    from { transform: translate(-50%, -50%) rotate(0deg); }
    to { transform: translate(-50%, -50%) rotate(360deg); }
}

.animation-avatar {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.avatar-icon {
    font-size: 4rem;
    opacity: 0.5;
}

.avatar-pulse {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: rgba(102, 126, 234, 0.2);
    animation: pulse 2s infinite ease-in-out;
}

@keyframes pulse {
    0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.2; }
    50% { transform: translate(-50%, -50%) scale(1.2); opacity: 0.4; }
}

.empty-text-content {
    margin-top: var(--spacing-xl);
}

.empty-title {
    font-size: var(--font-size-2xl);
    color: #333;
    margin-bottom: var(--spacing-md);
    font-weight: 800;
}

.empty-message {
    font-size: var(--font-size-base);
    color: #666;
    line-height: 1.8;
    margin-bottom: var(--spacing-xl);
}

.btn-notify-me {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-size: var(--font-size-base);
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    margin: 0 auto;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-notify-me:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(102, 126, 234, 0.4);
}

/* Team Statistics */
.team-statistics {
    margin-top: var(--spacing-2xl);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--spacing-lg);
}

.stat-item-large {
    background: white;
    padding: var(--spacing-xl);
    border-radius: 30px;
    box-shadow: 0 30px 90px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: var(--spacing-lg);
    transition: all 0.3s ease;
}

.stat-item-large:hover {
    transform: translateY(-15px);
    box-shadow: 0 40px 120px rgba(102, 126, 234, 0.2);
}

.stat-icon-large {
    font-size: var(--font-size-3xl);
    min-width: 80px;
    height: 80px;
    background: linear-gradient(45deg, #667eea, #764ba2);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

.stat-content-large {
    flex: 1;
}

.stat-number-large {
    font-size: var(--font-size-3xl);
    font-weight: 800;
    color: #1a237e;
    line-height: 1;
    margin-bottom: var(--spacing-xs);
}

.stat-title-large {
    font-size: var(--font-size-base);
    color: #666;
    font-weight: 600;
}

.stat-progress-large {
    width: 100%;
    height: 10px;
    background: #f0f0f0;
    border-radius: 5px;
    overflow: hidden;
    margin-top: var(--spacing-md);
}

.progress-bar-large {
    height: 100%;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border-radius: 5px;
    animation: progressLoad 2s ease-out forwards;
}

@keyframes progressLoad {
    from { width: 0; }
}

/* Call to Action */
.team-cta {
    background: linear-gradient(90deg, var(--accent-color), white);
    padding: var(--spacing-xl);
    border-radius: 30px;
    text-align: center;
    margin-top: var(--spacing-2xl);
}

.cta-title {
    font-size: var(--font-size-2xl);
    color: #1a237e;
    margin-bottom: var(--spacing-md);
    font-weight: 800;
}

.cta-text {
    font-size: var(--font-size-base);
    color: #666;
    max-width: 600px;
    margin: 0 auto var(--spacing-xl);
    line-height: 1.8;
}

.btn-join-team {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
    border: none;
    padding: 1.25rem 2.5rem;
    border-radius: 50px;
    font-size: var(--font-size-base);
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    margin: 0 auto;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.btn-join-team:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 50px rgba(102, 126, 234, 0.4);
    padding-right: 3rem;
}

.btn-shimmer {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        to right,
        transparent 20%,
        rgba(255, 255, 255, 0.4) 50%,
        transparent 80%
    );
    transform: rotate(30deg);
    animation: shimmer 3s infinite linear;
}

@keyframes shimmer {
    0% { left: -100%; }
    100% { left: 100%; }
}

/* Enhanced Responsive Design */
@media (max-width: 1200px) {
    :root {
        --font-size-4xl: 3rem;
        --font-size-3xl: 2.5rem;
        --font-size-2xl: 2rem;
    }
    
    .profile-image-wrapper {
        width: 180px;
        height: 180px;
    }
}

@media (max-width: 992px) {
    .team-main-title {
        font-size: clamp(2rem, 6vw, 3.5rem);
    }
    
    .stats-grid {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }
    
    .stat-item-large {
        padding: var(--spacing-lg);
    }
}

@media (max-width: 768px) {
    .modern-team-section {
        padding: var(--spacing-xl) 0;
    }
    
    .team-header {
        padding: var(--spacing-lg) 0;
    }
    
    .company-badge {
        padding: 0.75rem 1.5rem;
        font-size: var(--font-size-base);
    }
    
    .profile-image-wrapper {
        width: 150px;
        height: 150px;
    }
    
    .quick-stats {
        flex-direction: column;
        gap: var(--spacing-md);
    }
    
    .social-icons-large {
        justify-content: center;
    }
    
    .skills-tags {
        justify-content: center;
    }
    
    .stat-item-large {
        flex-direction: column;
        text-align: center;
        padding: var(--spacing-md);
    }
    
    .stat-icon-large {
        width: 80px;
        margin-bottom: var(--spacing-md);
    }
}

@media (max-width: 576px) {
    .team-main-title {
        font-size: clamp(1.8rem, 5vw, 2.5rem);
    }
    
    .title-shadow {
        font-size: clamp(1.8rem, 5vw, 2.5rem);
    }
    
    .company-name {
        font-size: clamp(1.2rem, 4vw, 1.8rem);
        padding: 0 1.5rem;
    }
    
    .description-container {
        padding: var(--spacing-md);
    }
    
    .team-intro,
    .team-motto {
        font-size: var(--font-size-sm);
    }
    
    .separator-wrapper {
        gap: var(--spacing-sm);
    }
    
    .separator-icon-wrapper {
        width: 60px;
        height: 60px;
    }
    
    .separator-icon {
        font-size: 1.8rem;
    }
    
    .profile-section {
        padding: var(--spacing-md);
    }
    
    .information-section {
        padding: var(--spacing-md);
    }
    
    .member-name-display {
        font-size: clamp(1.2rem, 4vw, 1.5rem);
    }
    
    .position-text {
        font-size: var(--font-size-sm);
    }
    
    .member-biography {
        font-size: var(--font-size-sm);
    }
    
    .btn-toggle-bio {
        font-size: var(--font-size-xs);
        padding: 0.5rem 1rem;
    }
    
    .social-btn {
        font-size: var(--font-size-xs);
        padding: 0.75rem 1rem;
    }
    
    .team-cta {
        padding: var(--spacing-lg);
    }
    
    .cta-title {
        font-size: var(--font-size-lg);
    }
    
    .cta-text {
        font-size: var(--font-size-sm);
    }
    
    .btn-join-team {
        font-size: var(--font-size-sm);
        padding: 1rem 1.5rem;
    }
}

@media (max-width: 400px) {
    .company-badge {
        padding: 0.5rem 1rem;
        font-size: var(--font-size-xs);
    }
    
    .profile-badges {
        flex-direction: column;
        align-items: center;
    }
    
    .social-icons-large {
        gap: var(--spacing-xs);
    }
    
    .skills-tags {
        gap: var(--spacing-xs);
    }
    
    .skill-tag {
        font-size: 0.875rem;
        padding: 0.375rem 0.75rem;
    }
}

/* Touch Device Optimizations */
@media (hover: none) and (pointer: coarse) {
    
    
    .enhanced-team-card:active .team-card-inner {
        transform: scale(0.98);
    }
    
    .social-btn:active {
        transform: scale(0.95);
    }
    
    .btn-toggle-bio:active {
        transform: scale(0.95);
    }
    
    /* Add active states for mobile */
    .enhanced-team-card.active .team-card-inner {
        transform: translateY(-10px);
    }
}

/* Print Styles */
@media print {
    .team-background-elements,
    .card-effects,
    .btn-effect,
    .effect-glow,
    .animated-profile-border,
    .btn-shimmer,
    .badge-glow,
    .badge-sparkle {
        display: none !important;
    }
    
    .team-card-inner {
        box-shadow: none !important;
        transform: none !important;
    }
    
    .social-btn {
        color: black !important;
        background: none !important;
        border: 1px solid #ccc !important;
    }
}
</style>
@endsection

@section('content')

    <!-- Enhanced Responsive Team Section -->
<section class="modern-team-section py-6 py-lg-8 position-relative overflow-hidden">
    
            <div class="hero-background">
            <div class="bg-shape shape-1"></div>
            <div class="bg-shape shape-2"></div>
            <div class="bg-shape shape-3"></div>
            <div class="bg-shape shape-4"></div>
            <div class="floating-elements">
                <div class="float-element el-1">💻</div>
                <div class="float-element el-2">🚀</div>
                <div class="float-element el-3">🎨</div>
                <div class="float-element el-4">📱</div>
            </div>
        </div>

        <!-- Modern Breadcrumb -->
        <div class="modern-breadcrumb">
            <div class="container">
                <nav class="breadcrumb-nav">
                    <div class="breadcrumb-trail">
                        <a href="{{ url('/') }}" class="breadcrumb-item">
                            <i class="breadcrumb-icon">🏠</i>
                            <span class="breadcrumb-text">{{ $settings->company_name ?? 'E-SHEBA' }}</span>
                        </a>
                        <div class="breadcrumb-separator">›</div>
                        <div class="breadcrumb-item active">
                            <i class="breadcrumb-icon">📂</i>
                            <span class="breadcrumb-text">আমাদের টিম</span>
                        </div>
                    </div>
                    <div class="breadcrumb-progress">
                        <div class="progress-bar"></div>
                    </div>
                </nav>
            </div>
        </div>
        
    <!-- Enhanced Background Elements -->
    <div class="team-background-elements">
        <div class="bg-shape shape-1"></div>
        <div class="bg-shape shape-2"></div>
        <div class="bg-shape shape-3"></div>
        <div class="bg-shape shape-4"></div>
        <div class="animated-grid"></div>
    </div>

    <div class="container position-relative z-3">
        <!-- Enhanced Header Section -->
        <div class="row justify-content-center mb-6 mb-lg-8">
            <div class="col-12 col-lg-12 col-xl-2 text-center">
                <!-- Main Title with Larger Font -->
                <div class="team-header mb-5">
                    <div class="title-animation-wrapper">
                        <h1 class="team-main-title">
                            <span class="title-gradient">আমাদের টিম</span>
                        </h1>
                        <div class="title-shadow">আমাদের টিম</div>
                    </div>
                    
                    
                    <!-- Enhanced Description -->
                    <div class="team-description-wrapper mb-4 mb-lg-5">
                        <div class="description-container">
                            <p class="lead team-intro">
                                <span class="highlight-text">আমাদের টিমের সদস্যরা</span> বিভিন্ন ক্ষেত্রে দক্ষতা অর্জন করেছেন এবং তাদের দক্ষতা ও অভিজ্ঞতা দিয়ে আমাদের প্রকল্পগুলিকে সফল করে তুলেছেন।
                            </p>
                            <p class="team-motto">
                                <i class="motto-icon">✨</i> একতা, দক্ষতা, সফলতা
                                <i class="motto-icon">✨</i>
                            </p>
                        </div>
                    </div>
                    
                    <!-- Enhanced Separator -->
                    <div class="modern-separator">
                        <div class="separator-wrapper">
                            <div class="separator-line-left"></div>
                            <div class="separator-center">
                                <div class="separator-icon-wrapper">
                                    <i class="separator-icon">👥</i>
                                    <div class="separator-rings">
                                        <div class="ring ring-1"></div>
                                        <div class="ring ring-2"></div>
                                        <div class="ring ring-3"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="separator-line-right"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Members Grid - Enhanced for Mobile -->
        <div class="row g-4 g-lg-5 justify-content-center" id="team-grid">
            @forelse($teamMembers as $member)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <!-- Enhanced Team Card -->
                    <div class="enhanced-team-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <!-- Card Container -->
                        <div class="team-card-inner">
                            <!-- Profile Image Section -->
                            <div class="profile-section">
                                <div class="profile-image-wrapper">
                                    <div class="profile-frame">
                                        @if($member->image)
                                            <img src="{{ asset('public/'.$member->image) }}" 
                                                 alt="{{ $member->name }}" 
                                                 class="profile-image"
                                                 loading="lazy">
                                        @else
                                            <img src="{{ asset('assets/images/team/default.jpg') }}" 
                                                 alt="{{ $member->name }}" 
                                                 class="profile-image"
                                                 loading="lazy">
                                        @endif
                                        <div class="profile-overlay">
                                            <div class="overlay-content">
                                                <button class="btn-view-profile">
                                                    <i class="view-icon">👁️</i>
                                                    <span>View Profile</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Profile Badges -->
                                    <!--<div class="profile-badges">
                                        <div class="badge-experience">
                                            <span class="badge-text">{{ rand(1, 10) }}+ Years</span>
                                        </div>
                                        <div class="badge-specialty">
                                            <span class="badge-text">Expert</span>
                                        </div>
                                    </div>-->
                                    
                                    <!-- Animated Border -->
                                    <div class="animated-profile-border"></div>
                                </div>
                                
                                <!-- Quick Stats -->
                                <!--<div class="quick-stats">
                                    <div class="stat">
                                        <div class="stat-icon">📊</div>
                                        <div class="stat-value">{{ rand(10, 50) }}+</div>
                                        <div class="stat-label">Projects</div>
                                    </div>
                                    <div class="stat">
                                        <div class="stat-icon">⭐</div>
                                        <div class="stat-value">{{ rand(4, 5) }}.{{ rand(0, 9) }}</div>
                                        <div class="stat-label">Rating</div>
                                    </div>
                                    <div class="stat">
                                        <div class="stat-icon">🏆</div>
                                        <div class="stat-value">{{ rand(1, 10) }}+</div>
                                        <div class="stat-label">Awards</div>
                                    </div>
                                </div>-->
                            </div>
                            
                            <!-- Member Information Section -->
                            <div class="information-section">
                                <!-- Name & Position -->
                                <div class="name-position">
                                    <h3 class="member-name-display">
                                        <span class="name-text">{{ $member->name }}</span>
                                        <div class="name-glow"></div>
                                    </h3>
                                    <div class="position-display">
                                        <i class="position-icon">🎯</i>
                                        <h4 class="position-text">{{ $member->position }}</h4>
                                    </div>
                                </div>
                                
                                <!-- Bio with Read More -->
                                <div class="bio-section">
                                    
                                    <button class="btn-toggle-bio">
                                        <span class="toggle-text">Read More</span>
                                        <i class="toggle-icon">↓</i>
                                    </button>
                                </div>
                                
                                <!-- Social Links with Larger Icons -->
                                <div class="social-connect">
                                    <div class="connect-title">
                                        <span>Connect With Me</span>
                                        <div class="connect-line"></div>
                                    </div>
                                    <div class="social-icons-large">
                                        @if($member->facebook_url)
                                            <a href="{{ $member->facebook_url }}" 
                                               target="_blank" 
                                               class="social-btn facebook-btn"
                                               aria-label="Facebook">
                                                <i class="fab fa-facebook-f"></i>
                                                <span class="social-label">Facebook</span>
                                                <div class="btn-effect"></div>
                                            </a>
                                        @endif
                                        @if($member->twitter_url)
                                            <a href="{{ $member->twitter_url }}" 
                                               target="_blank" 
                                               class="social-btn twitter-btn"
                                               aria-label="Twitter">
                                                <i class="fab fa-twitter"></i>
                                                <span class="social-label">Twitter</span>
                                                <div class="btn-effect"></div>
                                            </a>
                                        @endif
                                        @if($member->linkedin_url)
                                            <a href="{{ $member->linkedin_url ?? '#' }}" 
                                               target="_blank" 
                                               class="social-btn linkedin-btn"
                                               aria-label="LinkedIn">
                                                <i class="fab fa-linkedin-in"></i>
                                                <span class="social-label">LinkedIn</span>
                                                <div class="btn-effect"></div>
                                            </a>
                                        @endif
                                        @if($member->email)
                                            <a href="mailto:{{ $member->email }}" 
                                               class="social-btn email-btn"
                                               aria-label="Email">
                                                <i class="fas fa-envelope"></i>
                                                <span class="social-label">Email</span>
                                                <div class="btn-effect"></div>
                                            </a>
                                        @endif
                                        @if($member->phone)
                                            <a href="tel:{{ $member->phone }}" 
                                               class="social-btn phone-btn"
                                               aria-label="Phone">
                                                <i class="fas fa-phone"></i>
                                                <span class="social-label">Call</span>
                                                <div class="btn-effect"></div>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Skills Tags -->
                                <!--<div class="skills-section">
                                    <div class="skills-title">
                                        <i class="skills-icon">💪</i>
                                        <span>Key Skills</span>
                                    </div>
                                    <div class="skills-tags">
                                        <span class="skill-tag">Leadership</span>
                                        <span class="skill-tag">Communication</span>
                                        <span class="skill-tag">Problem Solving</span>
                                        <span class="skill-tag">Teamwork</span>
                                    </div>
                                </div>-->
                            </div>
                            
                            <!-- Card Hover Effects -->
                            <div class="card-effects">
                                <div class="effect-glow"></div>
                                <div class="effect-particles">
                                    <div class="particle"></div>
                                    <div class="particle"></div>
                                    <div class="particle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Enhanced Empty State -->
                <div class="col-12">
                    <div class="team-empty-state">
                        <div class="empty-content">
                            <div class="empty-animation-container">
                                <div class="empty-animation">
                                    <div class="animation-circle">
                                        <div class="circle-element"></div>
                                        <div class="circle-element"></div>
                                        <div class="circle-element"></div>
                                    </div>
                                    <div class="animation-avatar">
                                        <div class="avatar-icon">👤</div>
                                        <div class="avatar-pulse"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="empty-text-content">
                                <h2 class="empty-title">Team Coming Soon</h2>
                                <p class="empty-message">
                                    Our exceptional team members are currently being prepared. 
                                    We'll introduce them to you very soon!
                                </p>
                                <button class="btn-notify-me">
                                    <i class="notify-icon">🔔</i>
                                    Notify Me When Ready
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            @endforelse
        </div>

        <!-- Team Statistics -->
        <div class="row mt-6 mt-lg-8">
            <div class="col-12">
                <div class="team-statistics">
                    <div class="stats-grid">
                        <div class="stat-item-large">
                            <div class="stat-icon-large">👥</div>
                            <div class="stat-content-large">
                                <div class="stat-number-large" data-count="{{ count($teamMembers) }}">0</div>
                                <div class="stat-title-large">Active Team Members</div>
                            </div>
                            <div class="stat-progress-large">
                                <div class="progress-bar-large"></div>
                            </div>
                        </div>
                        <div class="stat-item-large">
                            <div class="stat-icon-large">🎯</div>
                            <div class="stat-content-large">
                                <div class="stat-number-large" data-count="{{ count($teamMembers) * 25 }}">0</div>
                                <div class="stat-title-large">Successful Projects</div>
                            </div>
                            <div class="stat-progress-large">
                                <div class="progress-bar-large" style="width: 90%"></div>
                            </div>
                        </div>
                        <div class="stat-item-large">
                            <div class="stat-icon-large">⭐</div>
                            <div class="stat-content-large">
                                <div class="stat-number-large" data-count="100">100</div>
                                <div class="stat-title-large">Client Satisfaction</div>
                            </div>
                            <div class="stat-progress-large">
                                <div class="progress-bar-large" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="row mt-5 mt-lg-6">
            <div class="col-12 text-center">
                <div class="team-cta">
                    <h3 class="cta-title">Join Our Team</h3>
                    <p class="cta-text">
                        Want to work with amazing people? We're always looking for talented individuals to join our team.
                    </p>
                    <button class="btn-join-team">
                        <span class="btn-text">View Career Opportunities</span>
                        <i class="btn-icon">→</i>
                        <div class="btn-shimmer"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Enhanced JavaScript for Team Section
document.addEventListener('DOMContentLoaded', function() {
    // Initialize with enhanced performance
    initTeamSection();
    
    // Setup event listeners
    setupEventListeners();
    
    // Start animations
    startAnimations();
});

function initTeamSection() {
    // Increase font sizes on desktop
    if (window.innerWidth >= 768) {
        document.documentElement.style.setProperty('--font-size-base', '1.375rem');
        document.documentElement.style.setProperty('--font-size-md', '1.75rem');
        document.documentElement.style.setProperty('--font-size-lg', '2.25rem');
    }
    
    // Initialize particle animations
    initParticles();
    
    // Initialize counters
    initCounters();
    
    // Setup intersection observer for animations
    setupIntersectionObserver();
}

function setupEventListeners() {
    // Bio toggle functionality
    document.querySelectorAll('.btn-toggle-bio').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const bioSection = this.closest('.bio-section');
            const bio = bioSection.querySelector('.member-biography');
            const icon = this.querySelector('.toggle-icon');
            
            bioSection.classList.toggle('expanded');
            
            if (bioSection.classList.contains('expanded')) {
                bio.style.webkitLineClamp = 'unset';
                bio.style.maxHeight = 'none';
                this.querySelector('.toggle-text').textContent = 'Read Less';
                icon.textContent = '↑';
            } else {
                bio.style.webkitLineClamp = '3';
                bio.style.maxHeight = '4.8em';
                this.querySelector('.toggle-text').textContent = 'Read More';
                icon.textContent = '↓';
            }
            
            // Add click animation
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
    
    // Social button hover effects
    document.querySelectorAll('.social-btn').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            const effect = this.querySelector('.btn-effect');
            if (effect) {
                effect.style.transition = 'left 0.6s ease';
                effect.style.left = '-100%';
                void effect.offsetWidth; // Trigger reflow
                effect.style.left = '100%';
            }
        });
        
        // Touch device support
        btn.addEventListener('touchstart', function() {
            this.style.transform = 'scale(0.95)';
        });
        
        btn.addEventListener('touchend', function() {
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
    
    // Team card interactions
    document.querySelectorAll('.enhanced-team-card').forEach(card => {
        // Mobile touch support
        if ('ontouchstart' in window) {
            card.addEventListener('touchstart', function() {
                this.classList.add('active');
            });
            
            card.addEventListener('touchend', function() {
                setTimeout(() => {
                    this.classList.remove('active');
                }, 300);
            });
        }
    });
    
    // View profile button
    document.querySelectorAll('.btn-view-profile').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const card = this.closest('.enhanced-team-card');
            const memberName = card.querySelector('.member-name-display').textContent;
            
            // Show modal or navigate to profile page
            alert(`Viewing profile of: ${memberName}`);
        });
    });
    
    // Notify me button
    const notifyBtn = document.querySelector('.btn-notify-me');
    if (notifyBtn) {
        notifyBtn.addEventListener('click', function() {
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="notify-icon">✅</i> Notification Set!';
            this.style.background = 'linear-gradient(45deg, #4ecdc4, #44a08d)';
            
            setTimeout(() => {
                this.innerHTML = originalText;
                this.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
            }, 2000);
        });
    }
    
    // Join team button
    const joinBtn = document.querySelector('.btn-join-team');
    if (joinBtn) {
        joinBtn.addEventListener('click', function() {
            // Open careers page or modal
            window.open('/careers', '_blank');
        });
    }
    
    // Window resize handling
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            adjustLayoutForScreen();
        }, 250);
    });
}

function initParticles() {
    // Add dynamic particle positions
    document.querySelectorAll('.particle').forEach(particle => {
        const tx = (Math.random() * 200 - 100) + 'px';
        const ty = (Math.random() * 200 - 100) + 'px';
        particle.style.setProperty('--tx', tx);
        particle.style.setProperty('--ty', ty);
    });
}

function initCounters() {
    const counters = document.querySelectorAll('[data-count]');
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-count'));
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;
                
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = Math.ceil(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                        counterObserver.unobserve(counter);
                    }
                };
                
                updateCounter();
            }
        });
    }, observerOptions);
    
    counters.forEach(counter => {
        counterObserver.observe(counter);
    });
}

function setupIntersectionObserver() {
    const teamCards = document.querySelectorAll('.enhanced-team-card');
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const cardObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                cardObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    teamCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(50px)';
        card.style.transition = `opacity 0.8s ease ${index * 0.1}s, transform 0.8s ease ${index * 0.1}s`;
        cardObserver.observe(card);
    });
}

function startAnimations() {
    // Title character animation
    const titleText = document.querySelector('.title-gradient');
    if (titleText) {
        titleText.style.animationPlayState = 'running';
    }
    
    // Start floating animations
    document.querySelectorAll('.badge-experience, .badge-specialty').forEach(badge => {
        badge.style.animationPlayState = 'running';
    });
}

function adjustLayoutForScreen() {
    const width = window.innerWidth;
    
    // Adjust font sizes based on screen width
    if (width < 576) {
        document.documentElement.style.setProperty('--font-size-base', '1rem');
        document.documentElement.style.setProperty('--font-size-sm', '1.125rem');
    } else if (width < 768) {
        document.documentElement.style.setProperty('--font-size-base', '1.125rem');
        document.documentElement.style.setProperty('--font-size-sm', '1.25rem');
    } else {
        document.documentElement.style.setProperty('--font-size-base', '1.25rem');
        document.documentElement.style.setProperty('--font-size-sm', '1.375rem');
    }
    
    // Adjust grid layout for team cards
    const teamGrid = document.getElementById('team-grid');
    if (teamGrid) {
        if (width < 768) {
            teamGrid.classList.add('row-cols-1');
            teamGrid.classList.remove('row-cols-2', 'row-cols-3', 'row-cols-4');
        } else if (width < 992) {
            teamGrid.classList.add('row-cols-2');
            teamGrid.classList.remove('row-cols-1', 'row-cols-3', 'row-cols-4');
        } else if (width < 1200) {
            teamGrid.classList.add('row-cols-3');
            teamGrid.classList.remove('row-cols-1', 'row-cols-2', 'row-cols-4');
        } else {
            teamGrid.classList.add('row-cols-4');
            teamGrid.classList.remove('row-cols-1', 'row-cols-2', 'row-cols-3');
        }
    }
}

// Initialize layout on load
setTimeout(adjustLayoutForScreen, 100);

// Add keyboard navigation support
document.addEventListener('keydown', function(e) {
    if (e.key === 'Tab') {
        // Add focus styles for accessibility
        document.querySelectorAll('.social-btn, .btn-toggle-bio, .btn-join-team').forEach(btn => {
            btn.addEventListener('focus', function() {
                this.style.outline = '3px solid #667eea';
                this.style.outlineOffset = '2px';
            });
            
            btn.addEventListener('blur', function() {
                this.style.outline = 'none';
            });
        });
    }
});

// Performance optimization: Reduce animations on low-end devices
if ('hardwareConcurrency' in navigator && navigator.hardwareConcurrency < 4) {
    document.querySelectorAll('.particle, .badge-sparkle, .effect-glow').forEach(el => {
        el.style.display = 'none';
    });
}

// Save scroll position for team cards
let teamScrollPosition = 0;
window.addEventListener('scroll', function() {
    teamScrollPosition = window.scrollY;
    localStorage.setItem('teamScrollPosition', teamScrollPosition);
});

// Restore scroll position on page load
window.addEventListener('load', function() {
    const savedPosition = localStorage.getItem('teamScrollPosition');
    if (savedPosition) {
        window.scrollTo(0, parseInt(savedPosition));
        localStorage.removeItem('teamScrollPosition');
    }
});
</script>


<!-- Optional: AOS Library for scroll animations -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    // Initialize AOS if available
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100,
            easing: 'ease-out-cubic'
        });
    }
</script>
    <!-- /.container -->
</section>
@endsection