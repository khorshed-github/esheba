@extends('frontend.layouts.app')

@section('title', 'Packages - ' . ($settings->company_name ?? 'E-Sheba'))

@section('styles')
<style>
/* Base Styles */
:root {
    --primary-color: var(--primary-blue);
    --secondary-color: var(--primary-purple);
    --accent-color: var(--primary-cyan);
    --success-color: #4ade80;
    --warning-color: #f59e0b;
    --danger-color: #ef4444;
    --dark-color: #1e293b;
    --light-color: #f8fafc;
    --gradient-1: linear-gradient(135deg, var(--primary-blue), var(--primary-purple));
    --gradient-2: linear-gradient(135deg, var(--primary-cyan), var(--primary-blue));
    --shadow-lg: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    --shadow-xl: 0 35px 60px -15px rgba(0, 0, 0, 0.3);
    --font-bangla: 'Noto Sans Bengali', 'SolaimanLipi', 'Siyam Rupali', sans-serif;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: var(--font-bangla), system-ui, -apple-system, sans-serif;
    overflow-x: hidden;
}

/* Modern breadcrumb (scoped) */
.modern-breadcrumb {
    padding: 18px 0;
    background: var(--primary-blue);
    position: relative;
    z-index: 20;
    
}

.modern-breadcrumb .breadcrumb-nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    background: rgba(255,255,255,0.04);
    padding: 8px 14px;
    border-radius: 14px;
    backdrop-filter: blur(8px);
    box-shadow: 0 8px 30px rgba(7,12,30,0.12);
}

.modern-breadcrumb .breadcrumb-trail {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.modern-breadcrumb .breadcrumb-home,
.modern-breadcrumb .breadcrumb-prev,
.modern-breadcrumb .breadcrumb-current {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 14px;
    border-radius: 20px;
    text-decoration: none;
    color: #ffffff;
    font-weight: 600;
    font-size: 14px;
    background: linear-gradient(90deg, rgba(255,255,255,0.06), rgba(255,255,255,0.02));
    transition: transform .18s ease, background .18s ease;
    white-space: nowrap;
}

.modern-breadcrumb .breadcrumb-home:hover,
.modern-breadcrumb .breadcrumb-prev:hover {
    transform: translateY(-3px);
    background: rgba(255,255,255,0.08);
}

.modern-breadcrumb .breadcrumb-current {
    background: var(--accent-color);
    color: #fff;
    box-shadow: 0 6px 20px rgba(67,97,238,0.12);
}

.modern-breadcrumb .breadcrumb-separator {
    color: rgba(255,255,255,0.6);
    font-weight: 700;
    padding: 0 4px;
}

.modern-breadcrumb .breadcrumb-icon {
    font-size: 16px;
    color: inherit;
}

/* Right side small progress / helper */
.modern-breadcrumb .breadcrumb-progress {
    width: 220px;
    max-width: 40%;
    min-width: 140px;
    display: flex;
    align-items: center;
    gap: 12px;
    justify-content: flex-end;
}

.modern-breadcrumb .progress-bar {
    height: 8px;
    width: 100%;
    background: rgba(255,255,255,0.08);
    border-radius: 999px;
    overflow: hidden;
    position: relative;
}

.modern-breadcrumb .progress-bar > span {
    display: block;
    height: 100%;
    width: 0%;
    background: linear-gradient(90deg, rgba(67,97,238,0.9), rgba(76,201,240,0.9));
    border-radius: 999px;
    transition: width 600ms cubic-bezier(.2,.9,.2,1);
}

/* compact / mobile tweaks */
@media (max-width: 768px) {
    .modern-breadcrumb .breadcrumb-progress { display: none; }
    .modern-breadcrumb .breadcrumb-nav { padding: 10px; }
    .modern-breadcrumb .breadcrumb-home,
    .modern-breadcrumb .breadcrumb-prev,
    .modern-breadcrumb .breadcrumb-current { font-size: 13px; padding: 8px 10px; }
}


/* Hero Section */
.packages-hero-section {
    min-height: 70vh;
    background: var(--gradient-1);
    padding: 120px 0 80px;
    position: relative;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.bg-gradient {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, 
        rgba(67, 97, 238, 0.9) 0%,
        rgba(58, 12, 163, 0.9) 50%,
        rgba(76, 201, 240, 0.9) 100%);
}

.floating-shapes .shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    filter: blur(40px);
    animation: floatShape 20s infinite ease-in-out;
}

.shape-1 { width: 300px; height: 300px; top: 10%; left: 5%; }
.shape-2 { width: 200px; height: 200px; top: 60%; right: 10%; animation-delay: 5s; }
.shape-3 { width: 150px; height: 150px; bottom: 20%; left: 20%; animation-delay: 10s; }
.shape-4 { width: 100px; height: 100px; top: 20%; right: 20%; animation-delay: 15s; }

@keyframes floatShape {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    25% { transform: translate(100px, 50px) rotate(90deg); }
    50% { transform: translate(50px, 100px) rotate(180deg); }
    75% { transform: translate(-50px, 50px) rotate(270deg); }
}

.code-particles {
    position: absolute;
    width: 100%;
    height: 100%;
    background-image: 
        repeating-linear-gradient(
            90deg,
            transparent,
            transparent 20px,
            rgba(255, 255, 255, 0.05) 20px,
            rgba(255, 255, 255, 0.05) 21px
        );
    opacity: 0.3;
}

/* Breadcrumb */
.breadcrumb-wrapper {
    position: absolute;
    top: 20px;
    left: 0;
    width: 100%;
    z-index: 10;
}

.breadcrumb-nav {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 0;
    margin: 0;
    list-style: none;
}

.breadcrumb-item {
    display: flex;
    align-items: center;
}

.breadcrumb-link {
    display: flex;
    align-items: center;
    gap: 8px;
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    padding: 8px 16px;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
}

.breadcrumb-link:hover {
    background: rgba(255, 255, 255, 0.2);
    color: white;
    transform: translateY(-2px);
}

.breadcrumb-item.active .breadcrumb-link {
    background: var(--accent-color);
    color: white;
}

.breadcrumb-icon {
    font-size: 16px;
}

/* Hero Content */
.hero-content {
    margin-top: 40px;
}

.hero-title-wrapper {
    position: relative;
    display: inline-block;
    margin-bottom: 30px;
}

.hero-title {
    font-size: 4rem;
    font-weight: 800;
    color: white;
    line-height: 1.2;
    text-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.title-word {
    display: inline-block;
    opacity: 0;
    transform: translateY(30px);
    animation: wordReveal 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
}

.title-word-1 { animation-delay: 0.2s; }
.title-word-2 { animation-delay: 0.4s; }

@keyframes wordReveal {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.title-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 120%;
    height: 120%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.2), transparent);
    filter: blur(40px);
    opacity: 0.5;
}

.hero-subtitle {
    margin-bottom: 40px;
}

.subtitle-badge {
    display: inline-block;
    position: relative;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    padding: 12px 30px;
    border-radius: 50px;
    margin-bottom: 20px;
}

.badge-text {
    color: white;
    font-weight: 600;
    font-size: 2rem;
    position: relative;
    z-index: 2;
}

.badge-animation {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 50px;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    animation: shimmer 3s infinite linear;
}

@keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

.hero-description {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.6rem;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
    text-align: center;
}

/* Separator */
.hero-separator {
    position: relative;
    width: 300px;
    margin: 40px auto;
}

.separator-line {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
}

.line-dot {
    position: absolute;
    top: 50%;
    width: 10px;
    height: 10px;
    background: white;
    border-radius: 50%;
    transform: translateY(-50%);
    animation: dotBounce 2s infinite ease-in-out;
}

.dot-1 { left: 25%; animation-delay: 0s; }
.dot-2 { left: 50%; animation-delay: 0.5s; }
.dot-3 { left: 75%; animation-delay: 1s; }

@keyframes dotBounce {
    0%, 100% { transform: translateY(-50%) scale(1); }
    50% { transform: translateY(-50%) scale(1.5); }
}

.separator-icon {
    position: relative;
    z-index: 2;
    width: 60px;
    height: 60px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    animation: iconFloat 3s infinite ease-in-out;
}

@keyframes iconFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Package Cards */
.website-package-section,
.pos-package-section {
    padding: 100px 0;
    position: relative;
}

.website-package-section {
    background: #ffffff;
}

.pos-package-section {
    background: #ffffff;
}

.package-card {
    background: white;
    border-radius: 30px;
    padding: 40px;
    box-shadow: var(--shadow-lg);
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.package-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
}

.package-header {
    margin-bottom: 40px;
}

.package-badge {
    display: inline-block;
    position: relative;
    background: var(--gradient-1);
    color: white;
    padding: 10px 25px;
    border-radius: 25px;
    font-weight: 600;
    margin-bottom: 20px;
    overflow: hidden;
}

.badge-pulse {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    
    border-radius: 25px;
    animation: badgePulse 2s infinite ease-in-out;
}

@keyframes badgePulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.8; transform: scale(1.05); }
}

.package-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--dark-color);
    margin-bottom: 20px;
    position: relative;
}

.title-highlight {
    background: var(--gradient-1);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.title-underline {
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 100px;
    height: 4px;
    background: var(--gradient-1);
    border-radius: 2px;
    animation: underlineExpand 1s ease forwards;
}

@keyframes underlineExpand {
    to { width: 200px; }
}

.package-intro {
    color: var(--light-color);;
    font-size: 1.5rem;
    line-height: 1.8;
    margin-bottom: 30px;
}

/* Features */
.package-features {
    margin-bottom: 40px;
}

.features-intro {
    margin-bottom: 30px;
}

.features-title {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 10px;
}

.title-icon {
    font-size: 24px;
    animation: iconSpin 4s linear infinite;
}

@keyframes iconSpin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.features-subtitle {
    color: var(--light-color);;
    font-size: 1.5rem;
}

.features-grid {
    display: grid;
    gap: 20px;
}

.feature-item {
    background: #f8fafc;
    border-radius: 20px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 20px;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.feature-item:hover {
    background: white;
    border-color: var(--primary-color);
    transform: translateX(10px);
    box-shadow: 0 10px 30px rgba(67, 97, 238, 0.1);
}

.feature-icon {
    position: relative;
    width: 60px;
    height: 60px;
    flex-shrink: 0;
    background: var(--gradient-2);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.feature-icon-svg {
    font-size: 24px;
    color: white;
    z-index: 2;
}

.icon-glow {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    
    border-radius: 15px;
    filter: blur(10px);
    opacity: 0.5;
}

.feature-content {
    flex: 1;
}

.feature-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 10px;
}

.feature-progress {
    height: 6px;
    background: #e2e8f0;
    border-radius: 3px;
    overflow: hidden;
}

.feature-progress .progress-bar {
    height: 100%;
    background: var(--gradient-1);
    border-radius: 3px;
    animation: progressLoad 1s ease-out forwards;
}

@keyframes progressLoad {
    from { width: 0; }
}

/* Benefits */
.package-benefits {
    margin-bottom: 40px;
}

.benefits-title {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 20px;
}

.benefits-list {
    display: grid;
    gap: 12px;
}

.benefit {
    display: flex;
    align-items: center;
    gap: 12px;
    color: VAR(--LIGHT-COLOR);
    font-size: 1.5rem;
}

.benefit-icon {
    color: var(--success-color);
    font-size: 18px;
}

/* CTA Buttons */
.package-cta {
    border-top: 2px solid #f1f5f9;
    padding-top: 30px;
}

.cta-text {
    color: var(--light-color);;
    font-size: 1.5rem;
    margin-bottom: 30px;
    line-height: 1.8;
}

.cta-buttons {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.btn {
    position: relative;
    padding: 16px 32px;
    border-radius: 15px;
    font-weight: 600;
    font-size: 1.5rem;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    overflow: hidden;
}

.btn-demo {
    background: var(--gradient-1);
    color: white;
}

.btn-contact {
    background: #004a70;
    color: var(--primary-color);
    border: 2px solid var(--primary-color);
}

.btn-shine {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        to right,
        transparent 20%,
        rgba(255, 255, 255, 0.3) 50%,
        transparent 80%
    );
    transform: rotate(30deg);
    animation: shine 2s infinite linear;
}

.btn-pulse {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 15px;
    
    animation: pulse 2s infinite ease-in-out;
}

@keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.8; transform: scale(1.05); }
}

/* Showcase */
.package-showcase {
    position: relative;
}

.showcase-container {
    position: sticky;
    top: 100px;
}

/* Device Mockup */
.device-mockup {
    position: relative;
    max-width: 500px;
    margin: 0 auto;
}

.device-frame {
    background: linear-gradient(135deg, #2d3748, #1a202c);
    border-radius: 30px;
    padding: 20px;
    box-shadow: 
        0 30px 60px rgba(0, 0, 0, 0.3),
        inset 0 0 0 2px rgba(255, 255, 255, 0.1);
    position: relative;
    overflow: hidden;
}

.device-screen {
    position: relative;
    width: 100%;
    aspect-ratio: 16/9;
    border-radius: 15px;
    overflow: hidden;
    background: white;
}

.demo-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.device-mockup:hover .demo-image {
    transform: scale(1.05);
}

.screen-overlay {
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
    transition: opacity 0.3s ease;
}

.device-mockup:hover .screen-overlay {
    opacity: 1;
}

.btn-view-fullscreen {
    background: var(--gradient-1);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.btn-view-fullscreen:hover {
    transform: scale(1.1);
}

.device-controls {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

.control {
    width: 40px;
    height: 4px;
    background: #4a5568;
    border-radius: 2px;
}

.device-stand {
    width: 100px;
    height: 20px;
    background: linear-gradient(135deg, #4a5568, #2d3748);
    margin: 20px auto 0;
    border-radius: 10px;
}

/* Tech Stack */
.tech-stack {
    margin-top: 30px;
    text-align: center;
}

.stack-title {
    font-size: 1.5rem;
    color: var(--light-color);;
    margin-bottom: 15px;
    font-weight: 600;
}

.stack-tags {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: center;
}

.stack-tag {
    background: #e2e8f0;
    color: VAR(--LIGHT-COLOR);
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 1.29rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.stack-tag:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-3px);
}

/* Stats Counter */
.stats-counter {
    display: flex;
    justify-content: space-around;
    margin-top: 40px;
    padding: 30px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.stat {
    text-align: center;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--primary-color);
    margin-bottom: 5px;
}

.stat-label {
    font-size: 1.29rem;
    color: var(--light-color);;
    font-weight: 600;
}

/* POS Showcase */
.pos-showcase .showcase-container {
    position: sticky;
    top: 120px;
}

.pos-mockup {
    background: linear-gradient(135deg, #f8fafc, #e2e8f0);
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.pos-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.pos-logo {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--primary-color);
}

.pos-status {
    display: flex;
    align-items: center;
    gap: 8px;
    background: var(--success-color);
    color: white;
    padding: 6px 15px;
    border-radius: 15px;
    font-size: 1.29rem;
    font-weight: 600;
}

.status-dot {
    width: 8px;
    height: 8px;
    background: white;
    border-radius: 50%;
    animation: statusBlink 2s infinite;
}

@keyframes statusBlink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.pos-screen {
    position: relative;
    width: 100%;
    aspect-ratio: 4/3;
    border-radius: 10px;
    overflow: hidden;
    background: white;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.screen-effects {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.scan-line {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--accent-color), transparent);
    animation: scanLine 2s infinite linear;
}

.scan-dot {
    position: absolute;
    width: 10px;
    height: 10px;
    background: var(--accent-color);
    border-radius: 50%;
    animation: scanDot 2s infinite linear;
}

@keyframes scanLine {
    0% { top: 0; }
    100% { top: 100%; }
}

@keyframes scanDot {
    0% { top: 0; left: 0; }
    25% { top: 0; left: 100%; }
    50% { top: 100%; left: 100%; }
    75% { top: 100%; left: 0; }
    100% { top: 0; left: 0; }
}

.pos-controls {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 20px;
}

.control-btn {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #cbd5e1, #94a3b8);
    border-radius: 50%;
    position: relative;
    overflow: hidden;
}

.control-btn::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 30px;
    height: 30px;
    background: VAR(--LIGHT-COLOR);
    border-radius: 50%;
}

/* Features Highlight */
.features-highlight {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-top: 40px;
    flex-wrap: wrap;
}

.highlight-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

.highlight-icon {
    font-size: 2rem;
    margin-bottom: 10px;
    animation: iconBounce 2s infinite ease-in-out;
}

@keyframes iconBounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Accordion */
.features-accordion {
    margin: 30px 0;
}

.accordion {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.accordion-item {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.accordion-item:hover {
    border-color: var(--primary-color);
    transform: translateX(5px);
}

.accordion-header {
    width: 100%;
    padding: 20px;
    background: #f8fafc;
    border: none;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--dark-color);
    transition: all 0.3s ease;
}

.accordion-header:hover {
    background: #e2e8f0;
}

.accordion-icon {
    font-size: 1.2rem;
    margin-right: 12px;
}

.accordion-arrow {
    transition: transform 0.3s ease;
}

.accordion-item.active .accordion-arrow {
    transform: rotate(180deg);
}

.accordion-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    padding: 0 20px;
}

.accordion-item.active .accordion-content {
    max-height: 200px;
    padding: 20px;
}

.content-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
}

.content-grid span {
    background: #f1f5f9;
    padding: 10px 15px;
    border-radius: 10px;
    font-size: 1.29rem;
    color: VAR(--LIGHT-COLOR);
    display: flex;
    align-items: center;
    gap: 8px;
}

.content-grid span::before {
    content: '✓';
    color: var(--success-color);
    font-weight: bold;
}

/* Benefits Grid */
.benefits-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-top: 30px;
}

.benefit-card {
    background: white;
    padding: 25px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.benefit-card:hover {
    border-color: var(--primary-color);
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(67, 97, 238, 0.2);
}

.benefit-card .benefit-icon {
    font-size: 2.5rem;
    margin-bottom: 15px;
    display: block;
}

.benefit-card h4 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--light-color);
    margin-bottom: 10px;
}

.benefit-card p {
    color: var(--light-color);;
    font-size: 1.29rem;
    line-height: 1.6;
}

/* Hotline */
.cta-hotline {
    display: flex;
    align-items: center;
    gap: 20px;
    background: #f5f5f5;
    padding: 25px;
    border-radius: 20px;
    margin-bottom: 30px;
}

.hotline-icon {
    font-size: 2.5rem;
    color: var(--primary-color);
}

.hotline-info {
    flex: 1;
}

.hotline-label {
    display: block;
    font-size: 1.29rem;
    color: var(--light-color);;
    margin-bottom: 5px;
}

.hotline-number {
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--light-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.hotline-number:hover {
    color: var(--primary-color);
}

/* Divider */
.section-divider {
    text-align: center;
    margin: 80px 0;
}

.divider-content {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
}

.divider-text {
    font-size: 2rem;
    color: #02357c;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.divider-icon {
    font-size: 1.5rem;
    animation: dividerBounce 2s infinite ease-in-out;
}

@keyframes dividerBounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(10px); }
}

/* Comparison Table */
.comparison-section {
    padding: 100px 0;
    background: #ffffff;
}

.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-title {
    font-size: 3rem;
    font-weight: 800;
    color: var(--dark-color);
    margin-bottom: 20px;
    position: relative;
    display: inline-block;
}

.section-title .title-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 120%;
    height: 120%;
    background: radial-gradient(circle, rgba(67, 97, 238, 0.1), transparent);
    filter: blur(40px);
}

.section-subtitle {
    color: var(--light-color);;
    font-size: 1.5rem;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
    text-align: center;
}

.comparison-table {
    background: white;
    border-radius: 30px;
    overflow: hidden;
    box-shadow: var(--shadow-xl);
}

.table-header {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
}

.header-item {
    padding: 40px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.header-item.empty {
    background: rgba(255, 255, 255, 0.1);
}

.header-icon {
    font-size: 2.5rem;
    margin-bottom: 20px;
    animation: iconFloat 3s infinite ease-in-out;
}

.header-item h3 {
    font-size: 1.5rem;
    font-weight: 400;
    margin: 0;
    color: white;
}

.table-body {
    padding: 0;
}

.table-row {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    border-bottom: 1px solid #e2e8f0;
    transition: all 0.3s ease;
}

.table-row:hover {
    background: #f8fafc;
    transform: scale(1.01);
}

.row-label {
    padding: 25px;
    font-weight: 600;
    color: var(--dark-color);
    background: #f8fafc;
    display: flex;
    align-items: center;
}

.row-value {
    padding: 25px;
    text-align: center;
    font-weight: 500;
    color: VAR(--LIGHT-COLOR);
    position: relative;
    overflow: hidden;
}

.row-value span {
    position: relative;
    z-index: 2;
}

.value-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, transparent, rgba(67, 97, 238, 0.05), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.table-row:hover .value-glow {
    opacity: 1;
}

.website-value {
    border-right: 1px solid #e2e8f0;
}

.table-footer {
    padding: 40px;
    text-align: center;
    background: #f5f5f5;
}

.btn-consultation {
    background: var(--gradient-1);
    color: white;
    padding: 20px 40px;
    font-size: 1.2rem;
    border-radius: 25px;
    display: inline-flex;
    align-items: center;
    gap: 15px;
    text-decoration: none;
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.btn-consultation:hover {
    transform: translateY(-5px);
}

.btn-sparkle {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.btn-sparkle::before,
.btn-sparkle::after {
    content: '';
    position: absolute;
    width: 10px;
    height: 10px;
    background: white;
    border-radius: 50%;
    opacity: 0;
    animation: sparkle 2s infinite linear;
}

.btn-sparkle::before {
    top: 20%;
    left: 20%;
    animation-delay: 0s;
}

.btn-sparkle::after {
    top: 60%;
    left: 70%;
    animation-delay: 1s;
}

@keyframes sparkle {
    0% { opacity: 0; transform: scale(0); }
    50% { opacity: 1; transform: scale(1); }
    100% { opacity: 0; transform: scale(0); }
}

/* Final CTA */
.package-cta-section {
    padding: 100px 0;
    background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
    position: relative;
    overflow: hidden;
}

.cta-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.cta-shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    filter: blur(40px);
    animation: ctaFloat 20s infinite ease-in-out;
}

.cta-shape.shape-1 { width: 400px; height: 400px; top: -200px; right: -100px; }
.cta-shape.shape-2 { width: 300px; height: 300px; bottom: -150px; left: -100px; animation-delay: 5s; }
.cta-shape.shape-3 { width: 200px; height: 200px; top: 50%; right: 20%; animation-delay: 10s; }

@keyframes ctaFloat {
    0%, 100% { transform: translate(0, 0) scale(1); }
    25% { transform: translate(50px, 50px) scale(1.1); }
    50% { transform: translate(0, 100px) scale(0.9); }
    75% { transform: translate(-50px, 50px) scale(1.05); }
}

.cta-content {
    text-align: center;
    color: white;
}

.cta-icon {
    font-size: 4rem;
    margin-bottom: 30px;
    animation: iconBounce 2s infinite ease-in-out;
}

.cta-title {
    font-size: 3rem;
    font-weight: 500;
    margin-bottom: 20px;
    text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    color: white;
}

.cta-text {
    font-size: 1.5rem;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto 40px;
    line-height: 1.8;
    text-align: center;
}

.cta-actions {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-call, .btn-whatsapp, .btn-email {
    padding: 18px 35px;
    border-radius: 20px;
    font-weight: 600;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-call {
    background: var(--success-color);
    color: white;
}

.btn-whatsapp {
    background: #25D366;
    color: white;
}

.btn-email {
    background: white;
    color: var(--primary-color);
}

.btn-ring {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    border: 3px solid currentColor;
    border-radius: 20px;
    animation: ringPulse 2s infinite ease-in-out;
    opacity: 0;
}

.btn-call:hover .btn-ring,
.btn-whatsapp:hover .btn-ring,
.btn-email:hover .btn-ring {
    animation: ringPulseActive 2s infinite ease-in-out;
}

@keyframes ringPulseActive {
    0%, 100% { opacity: 0; transform: translate(-50%, -50%) scale(1); }
    50% { opacity: 0.5; transform: translate(-50%, -50%) scale(1.1); }
}

/* Responsive Design */
@media (max-width: 1200px) {
    .hero-title {
        font-size: 3rem;
    }
    
    .package-title {
        font-size: 2rem;
    }
    
    .section-title {
        font-size: 2.5rem;
    }
}

@media (max-width: 992px) {
    .packages-hero-section {
        padding: 100px 0 60px;
        min-height: 60vh;
    }
    
    .hero-title {
        font-size: 2.5rem;
    }
    
    .row {
        flex-direction: column;
    }
    
    .col-lg-6 {
        width: 100%;
    }
    
    .cta-buttons {
        justify-content: center;
    }
    
    .benefits-grid {
        grid-template-columns: 1fr;
    }
    
    .content-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .package-card {
        padding: 30px 20px;
    }
    
    .cta-title {
        font-size: 2rem;
    }
    
    .cta-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
    }
    
    .table-header {
        grid-template-columns: 1fr;
    }
    
    .table-row {
        grid-template-columns: 1fr;
        margin-bottom: 20px;
        border: 1px solid #e2e8f0;
        border-radius: 15px;
        overflow: hidden;
    }
    
    .row-label {
        background: var(--primary-color);
        color: white;
        justify-content: center;
    }
    
    .website-value, .pos-value {
        border: none;
        border-top: 1px solid #e2e8f0;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 1.8rem;
    }
    
    .package-title {
        font-size: 1.5rem;
    }
    
    .feature-item {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }
    
    .stats-counter {
        flex-direction: column;
        gap: 20px;
    }
    
    .features-highlight {
        flex-direction: column;
        align-items: center;
    }
    
    .stack-tags {
        justify-content: center;
    }
}

/* Animation Classes */
[data-aos] {
    opacity: 0;
    transition-property: opacity, transform;
}

[data-aos].aos-animate {
    opacity: 1;
}

/* Loading Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Number Counting Animation */
@keyframes countUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Smooth Scrolling */
html {
    scroll-behavior: smooth;
}

/* Print Styles */
@media print {
    .package-card,
    .comparison-table {
        box-shadow: none;
        border: 1px solid #ddd;
    }
    
    .btn,
    .cta-actions,
    .hero-separator,
    .floating-shapes,
    .badge-pulse {
        display: none !important;
    }
}
</style>
@endsection

@section('content')
<!-- HEADER TREE -->
@php
    // পূর্বের ইউআরএল বের করা
    $previousUrl = url()->previous();

    // হোস্ট চেক — যদি বাহিরের সাইট থেকে আসা থাকে তাহলে লিংক avoid করা হবে
    $prevHost = $previousUrl ? parse_url($previousUrl, PHP_URL_HOST) : null;
    $currentHost = request()->getHost();

    // লেবেল তৈরি (সোজা readable)
    $previousLabel = 'পূর্বের পৃষ্ঠা';
    if ($previousUrl && $prevHost === $currentHost) {
        $path = trim(parse_url($previousUrl, PHP_URL_PATH), '/');
        if ($path === '') {
            $previousLabel = 'হোম';
        } else {
            $pretty = ucwords(str_replace(['-', '_', '/'], ' ', $path));
            $previousLabel = strlen($pretty) > 30 ? substr($pretty, 0, 27).'...' : $pretty;
        }
    }
@endphp

<!-- Modern breadcrumb (inserted) -->
<div class="modern-breadcrumb">
    <div class="container">
        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <div class="breadcrumb-trail">
                <!-- Home -->
                <a href="{{ url('/') }}" class="breadcrumb-home" title="হোম">
                    <i class="breadcrumb-icon fas fa-home"></i>
                    <span>{{ $settings->company_name ?? 'E-SHEBA' }}</span>
                </a>

                <div class="breadcrumb-separator">/</div>

                <!-- Previous (only link if same host & exists) -->
                @if($previousUrl && $prevHost === $currentHost)
                    <a href="{{ $previousUrl }}" class="breadcrumb-prev" title="{{ $previousLabel }}">
                        <i class="breadcrumb-icon fas fa-arrow-left"></i>
                        <span>{{ $previousLabel }}</span>
                    </a>
                @else
                    <span class="breadcrumb-prev" aria-hidden="true">
                        <i class="breadcrumb-icon fas fa-arrow-left"></i>
                        <span>পূর্বের পৃষ্ঠা</span>
                    </span>
                @endif

                <div class="breadcrumb-separator">/</div>

                <!-- Current Page (update text if dynamic) -->
                <span class="breadcrumb-current" aria-current="page">
                    <i class="breadcrumb-icon fas fa-box"></i>
                    <span>প্যাকেজসমূহ</span>
                </span>
            </div>

            <div class="breadcrumb-progress" aria-hidden="true">
                <div class="progress-bar" role="presentation" aria-hidden="true">
                    <span></span>
                </div>
            </div>
        </nav>
    </div>
</div>

<!-- small inline script to animate progress bar on view -->
<script>
    (function(){
        try {
            const bar = document.querySelector('.modern-breadcrumb .progress-bar span');
            if (!bar) return;
            // small delay so page paint finishes
            window.requestAnimationFrame(() => {
                setTimeout(() => {
                    bar.style.width = '100%';
                }, 120);
            });
        } catch(e) {
            // silent
            console && console.warn && console.warn(e);
        }
    })();
</script>

<section class="packages-hero-section position-relative overflow-hidden">
        <!-- Hero Content -->
    <div class="container position-relative z-3">
        <div class="hero-content text-center">
            
            <div class="hero-subtitle">
                <div class="subtitle-badge">
                    <span class="badge-text">আপনার ডিজিটাল প্রয়োজন</span>
                    <div class="badge-animation"></div>
                </div>
                <p class="hero-description">
                    আপনার ব্যবসার জন্য কাস্টমাইজড ওয়েবসাইট এবং সফটওয়্যার সমাধান
                </p>
            </div>
            
            <div class="hero-separator">
                <div class="separator-line">
                    <div class="line-dot dot-1"></div>
                    <div class="line-dot dot-2"></div>
                    <div class="line-dot dot-3"></div>
                </div>
                <div class="separator-icon">
                    <i class="separator-icon-svg">⚙️</i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Website Development Package -->
<section class="website-package-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <!-- Content Column -->
            <div class="col-lg-6">
                <div class="package-card" data-aos="fade-right">
                    <div class="package-header">
                        <div class="package-badge">
                            <span class="badge-label">ওয়েব ডেভেলপমেন্ট</span>
                            <div class="badge-pulse"></div>
                        </div>
                        <h2 class="package-title">
                            <span class="title-highlight">ওয়েবসাইট</span> লাগবে?
                            <div class="title-underline"></div>
                        </h2>
                        <p class="package-intro">
                            আপনার ব্যবসা প্রতিষ্ঠান কি অনলাইন ভিত্তিক করতে চাচ্ছেন? তাহলে প্রথমেই প্রয়োজন আপনার ব্যবসার জন্য একটি কাস্টমাইজড ওয়েবসাইট।
                        </p>
                    </div>
                    
                    <div class="package-features">
                        <div class="features-intro">
                            <h3 class="features-title">
                                <i class="title-icon">🎯</i>
                                <span>আমাদের সেবাসমূহ</span>
                            </h3>
                            <p class="features-subtitle">
                                যেকোনো ধরনের ওয়েবসাইট তৈরীতে আমরা বিশেষজ্ঞ
                            </p>
                        </div>
                        
                        <div class="features-grid">
                            @php
                                $websiteTypes = [
                                    'বিজনেস/কর্পোরেট ওয়েবসাইট',
                                    'ই-কমার্স ওয়েবসাইট',
                                    'নিউজ পোর্টাল ওয়েবসাইট',
                                    'হসপিটাল/ক্লিনিক ওয়েবসাইট',
                                    'ডোনেশন কালেকশন/ননপ্রফিট ওয়েবসাইট',
                                    'শিপিং এজেন্সি ওয়েবসাইট',
                                    'ক্লাব ওয়েবসাইট',
                                    'কোচিং সেন্টার ওয়েবসাইট',
                                    'ট্রেডিং ওয়েবসাইট',
                                    'এব্রোড ইডুকেশন ওয়েবসাইট',
                                    'আপনার চাহিদামত যে কোন ধরনের ওয়েবসাইট'
                                ];
                            @endphp
                            
                            @foreach($websiteTypes as $index => $type)
                                <div class="feature-item" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                                    <div class="feature-icon">
                                        <i class="feature-icon-svg">🌐</i>
                                        <div class="icon-glow"></div>
                                    </div>
                                    <div class="feature-content">
                                        <h4 class="feature-title">{{ $type }}</h4>
                                        <div class="feature-progress">
                                            <div class="progress-bar" style="width: {{ 90 - ($index * 2) }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="package-benefits">
                        <h3 class="benefits-title">
                            <i class="benefits-icon">✨</i>
                            অতিরিক্ত সুবিধা
                        </h3>
                        <div class="benefits-list">
                            <div class="benefit">
                                <i class="benefit-icon">✅</i>
                                <span>কনটেন্ট আপডেট ট্রেনিং</span>
                            </div>
                            <div class="benefit">
                                <i class="benefit-icon">✅</i>
                                <span>গুগল মিট ও টিম ভিউয়ার সাপোর্ট</span>
                            </div>
                            <div class="benefit">
                                <i class="benefit-icon">✅</i>
                                <span>নিয়মিত রক্ষণাবেক্ষণ</span>
                            </div>
                            <div class="benefit">
                                <i class="benefit-icon">✅</i>
                                <span>সিকিউরিটি আপডেট</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="package-cta">
                        <p class="cta-text">
                            আপনার প্রতিষ্ঠানকে কাঙ্খিত মানসম্মত ওয়েবসাইট ও পরবর্তী সাপোর্ট দেয়াই আমাদের মূল লক্ষ্য।
                        </p>
                        <div class="cta-buttons">
                            <a href="https://www.munnasacademy.com/" target="_blank" class="btn btn-demo">
                                <i class="btn-icon">👁️</i>
                                <span>ডেমো দেখুন</span>
                                <div class="btn-shine"></div>
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-contact">
                                <i class="btn-icon">💬</i>
                                <span>যোগাযোগ করুন</span>
                                <div class="btn-pulse"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Image Column -->
            <div class="col-lg-6">
                <div class="package-showcase" data-aos="fade-left">
                    <div class="showcase-container">
                        <div class="device-mockup">
                            <div class="device-frame">
                                <div class="device-screen">
                                    <img src="{{ asset('assets/images/portfolio/ffi-jsl.jpg') }}" 
                                         alt="Website Demo" 
                                         class="demo-image"
                                         loading="lazy">
                                    <div class="screen-overlay">
                                        <div class="overlay-content">
                                            <button class="btn-view-fullscreen">
                                                <i class="view-icon">🔍</i>
                                                <span>Full View</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="device-controls">
                                    <div class="control control-1"></div>
                                    <div class="control control-2"></div>
                                </div>
                            </div>
                            <div class="device-stand"></div>
                        </div>
                        
                        <div class="tech-stack">
                            <div class="stack-title">ব্যবহৃত টেকনোলজি</div>
                            <div class="stack-tags">
                                <span class="stack-tag">Laravel</span>
                                <span class="stack-tag">Vue.js</span>
                                <span class="stack-tag">React</span>
                                <span class="stack-tag">MySQL</span>
                                <span class="stack-tag">Bootstrap</span>
                            </div>
                        </div>
                        
                        <div class="stats-counter">
                            <div class="stat">
                                <div class="stat-number" data-count="100">0</div>
                                <div class="stat-label">প্রোজেক্ট</div>
                            </div>
                            <div class="stat">
                                <div class="stat-number" data-count="24">0</div>
                                <div class="stat-label">ঘণ্টা সাপোর্ট</div>
                            </div>
                            <div class="stat">
                                <div class="stat-number" data-count="95">0</div>
                                <div class="stat-label">ক্লায়েন্ট সন্তুষ্টি</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- POS Software Package -->
<section class="pos-package-section">
    <div class="container">
        <div class="section-divider">
            <div class="divider-content">
                <span class="divider-text">পরবর্তী প্যাকেজ</span>
                <div class="divider-icon">👇</div>
            </div>
        </div>
        
        <div class="row g-5 align-items-center">
            <!-- Image Column -->
            <div class="col-lg-6 order-lg-1">
                <div class="package-showcase pos-showcase" data-aos="fade-right">
                    <div class="showcase-container">
                        <div class="pos-mockup">
                            <div class="pos-header">
                                <div class="pos-logo">POS PRO</div>
                                <div class="pos-status">
                                    <div class="status-dot"></div>
                                    <span>লাইভ</span>
                                </div>
                            </div>
                            <div class="pos-screen">
                                <img src="{{ asset('assets/images/works/pos-software.PNG') }}" 
                                     alt="POS Software Demo" 
                                     class="demo-image"
                                     loading="lazy">
                                <div class="screen-effects">
                                    <div class="scan-line"></div>
                                    <div class="scan-dot"></div>
                                </div>
                            </div>
                            <div class="pos-controls">
                                <div class="control-btn btn-1"></div>
                                <div class="control-btn btn-2"></div>
                                <div class="control-btn btn-3"></div>
                            </div>
                        </div>
                        
                        <div class="features-highlight">
                            <div class="highlight-item">
                                <i class="highlight-icon">📊</i>
                                <span>রিয়েল-টাইম রিপোর্ট</span>
                            </div>
                            <div class="highlight-item">
                                <i class="highlight-icon">📱</i>
                                <span>মাল্টি-ডিভাইস</span>
                            </div>
                            <div class="highlight-item">
                                <i class="highlight-icon">🔒</i>
                                <span>সিকিউরড</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Content Column -->
            <div class="col-lg-6 order-lg-2">
                <div class="package-card pos-package" data-aos="fade-left">
                    <div class="package-header">
                        <div class="package-badge">
                            <span class="badge-label">সফটওয়্যার সলিউশন</span>
                            <div class="badge-pulse"></div>
                        </div>
                        <h2 class="package-title">
                            <span class="title-highlight">পজ/ব্যবসায়িক</span> সফটওয়্যার
                            <div class="title-underline"></div>
                        </h2>
                        <p class="package-intro">
                            আপনার ব্যবসা প্রতিষ্ঠানের হিসাব সহজে সংরক্ষণ এবং পর্যবেক্ষণের জন্য সম্পূর্ণ কাস্টমাইজেবল সফটওয়্যার সলিউশন।
                        </p>
                    </div>
                    
                    <div class="package-features">
                        <div class="features-intro">
                            <h3 class="features-title">
                                <i class="title-icon">💼</i>
                                <span>সফটওয়্যার সুবিধা</span>
                            </h3>
                            <p class="features-subtitle">
                                ব্যবসায়িক কার্যক্রম ডিজিটালাইজ করুন সহজেই
                            </p>
                        </div>
                        
                        <div class="features-accordion">
                            <div class="accordion">
                                <div class="accordion-item" data-aos="fade-up" data-aos-delay="0">
                                    <button class="accordion-header">
                                        <span class="accordion-icon">📈</span>
                                        <span class="accordion-title">বিস্তারিত রিপোর্টিং</span>
                                        <i class="accordion-arrow">▼</i>
                                    </button>
                                    <div class="accordion-content">
                                        <div class="content-grid">
                                            <span>প্রতিদিনের ক্রয়-বিক্রয় রিপোর্ট</span>
                                            <span>স্টক রিপোর্ট</span>
                                            <span>মেয়াদ উত্তীর্ণ পণ্য রিপোর্ট</span>
                                            <span>লাভ-ক্ষতি বিশ্লেষণ</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                                    <button class="accordion-header">
                                        <span class="accordion-icon">🛒</span>
                                        <span class="accordion-title">বিক্রয় ব্যবস্থাপনা</span>
                                        <i class="accordion-arrow">▼</i>
                                    </button>
                                    <div class="accordion-content">
                                        <div class="content-grid">
                                            <span>বিক্রয় মেমো প্রস্তুতি</span>
                                            <span>ডিসকাউন্ট ব্যবস্থাপনা</span>
                                            <span>বাকিতে বিক্রয় ব্যবস্থা</span>
                                            <span>পণ্য ফেরত ব্যবস্থা</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                    <button class="accordion-header">
                                        <span class="accordion-icon">🏪</span>
                                        <span class="accordion-title">ইনভেন্টরি কন্ট্রোল</span>
                                        <i class="accordion-arrow">▼</i>
                                    </button>
                                    <div class="accordion-content">
                                        <div class="content-grid">
                                            <span>বারকোড ইন্টিগ্রেশন</span>
                                            <span>রিয়েল-টাইম স্টক আপডেট</span>
                                            <span>কোম্পানি অনুযায়ী হিসাব</span>
                                            <span>অটোমেটিক স্টক এলার্ট</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                                    <button class="accordion-header">
                                        <span class="accordion-icon">💰</span>
                                        <span class="accordion-title">অ্যাকাউন্টস ম্যানেজমেন্ট</span>
                                        <i class="accordion-arrow">▼</i>
                                    </button>
                                    <div class="accordion-content">
                                        <div class="content-grid">
                                            <span>ক্যাশ/ব্যাংক হিসাব</span>
                                            <span>খরচ হিসাব</span>
                                            <span>কাস্টমার/ডিলার বকেয়া</span>
                                            <span>সেলসম্যান পারফরমেন্স</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="package-benefits pos-benefits">
                        <h3 class="benefits-title">
                            <i class="benefits-icon">🚀</i>
                            কেন আমাদের সফটওয়্যার?
                        </h3>
                        <div class="benefits-grid">
                            <div class="benefit-card">
                                <div class="benefit-icon">⚡</div>
                                <h4>দ্রুত ইনস্টলেশন</h4>
                                <p>অর্ডার করার সাথে সাথে ইনস্টলেশন</p>
                            </div>
                            <div class="benefit-card">
                                <div class="benefit-icon">📱</div>
                                <h4>মাল্টি-ডিভাইস</h4>
                                <p>যেকোনো ডিভাইসে ব্যবহারযোগ্য</p>
                            </div>
                            <div class="benefit-card">
                                <div class="benefit-icon">🛡️</div>
                                <h4>সিকিউরিটি</h4>
                                <p>ডেটা নিরাপত্তা ও ব্যাকআপ</p>
                            </div>
                            <div class="benefit-card">
                                <div class="benefit-icon">📞</div>
                                <h4>২৪/৭ সাপোর্ট</h4>
                                <p>হটলাইন: +৮৮০১৯১৫৩৫৭৬৯৯</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="package-cta pos-cta">
                        <div class="cta-hotline">
                            <i class="hotline-icon">📞</i>
                            <div class="hotline-info">
                                <span class="hotline-label">ফ্রি ট্রেনিং ও ডেমো</span>
                                <a href="tel:+8801915357699" class="hotline-number">+৮৮০১৯১৫৩৫৭৬৯৯</a>
                            </div>
                        </div>
                        <div class="cta-buttons">
                            <a href="https://www.pos.e-sheba.com/" target="_blank" class="btn btn-demo">
                                <i class="btn-icon">👁️</i>
                                <span>লাইভ ডেমো</span>
                                <div class="btn-shine"></div>
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-contact">
                                <i class="btn-icon">💬</i>
                                <span>ইনবক্স করুন</span>
                                <div class="btn-pulse"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Comparison Table -->
<section class="comparison-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                <span>প্যাকেজ তুলনা</span>
                <div class="title-glow"></div>
            </h2>
            <p class="section-subtitle">
                আপনার প্রয়োজন অনুযায়ী সঠিক প্যাকেজ নির্বাচন করুন
            </p>
        </div>
        
        <div class="comparison-table">
            <div class="table-header">
                <div class="header-item empty"></div>
                <div class="header-item website-header">
                    <div class="header-icon">🌐</div>
                    <h3>ওয়েবসাইট ডেভেলপমেন্ট</h3>
                </div>
                <div class="header-item website-header">
                    <div class="header-icon">💼</div>
                    <h3>পজ সফটওয়্যার</h3>
                </div>
            </div>
            
            <div class="table-body">
                @php
                    $comparisons = [
                        ['মূল্য', 'প্রকল্পভিত্তিক', 'প্যাকেজভিত্তিক'],
                        ['ডেলিভারি সময়', '৭-১৫ দিন', '৩-৭ দিন'],
                        ['সাপোর্ট', '৬ মাস ফ্রি', '১২ মাস ফ্রি'],
                        ['ট্রেনিং', 'মৌলিক ট্রেনিং', 'বিস্তারিত ট্রেনিং'],
                        ['হোস্টিং', '১ বছর ফ্রি', 'ইনক্লুডেড'],
                        ['ডোমেইন', 'অ্যাডভাইস', 'অ্যাডভাইস'],
                        ['মোবাইল অপ্টিমাইজড', 'হ্যাঁ', 'হ্যাঁ'],
                        ['কাস্টমাইজেশন', 'সীমাহীন', 'সীমাহীন'],
                        ['টেকনিক্যাল সাপোর্ট', '২৪/৭', '২৪/৭'],
                        ['এসএমএস ইন্টিগ্রেশন', 'অপশনাল', 'ইনক্লুডেড']
                    ];
                @endphp
                
                @foreach($comparisons as $index => $comparison)
                    <div class="table-row" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                        <div class="row-label">{{ $comparison[0] }}</div>
                        <div class="row-value website-value">
                            <span>{{ $comparison[1] }}</span>
                            <div class="value-glow"></div>
                        </div>
                        <div class="row-value pos-value">
                            <span>{{ $comparison[2] }}</span>
                            <div class="value-glow"></div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="table-footer">
                <div class="footer-action">
                    <a href="{{ route('contact') }}" class="btn btn-consultation">
                        <i class="btn-icon">🤝</i>
                        <span>ফ্রি কনসাল্টেশন</span>
                        <div class="btn-sparkle"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="package-cta-section">
    <div class="cta-background">
        <div class="cta-shape shape-1"></div>
        <div class="cta-shape shape-2"></div>
        <div class="cta-shape shape-3"></div>
    </div>
    
    <div class="container position-relative z-3">
        <div class="cta-content">
            <div class="cta-icon">🎯</div>
            <h2 class="cta-title">আপনার প্রকল্প শুরু করতে প্রস্তুত?</h2>
            <p class="cta-text">
                আমাদের বিশেষজ্ঞ দল আপনার প্রয়োজনীয়তা বুঝে সর্বোত্তম সমাধান দিতে প্রস্তুত
            </p>
            <div class="cta-actions">
                <a href="tel:+8801915357699" class="btn btn-call">
                    <i class="btn-icon">📞</i>
                    <span>কল করুন</span>
                    <div class="btn-ring"></div>
                </a>
                <a href="https://wa.me/8801915357699" target="_blank" class="btn btn-whatsapp">
                    <i class="btn-icon">💬</i>
                    <span>WhatsApp</span>
                    <div class="btn-ring"></div>
                </a>
                <a href="{{ route('contact') }}" class="btn btn-email">
                    <i class="btn-icon">✉️</i>
                    <span>ইমেইল করুন</span>
                    <div class="btn-ring"></div>
                </a>
            </div>
        </div>
    </div>
</section>



<script>
// Main JavaScript for Packages Module
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initAnimations();
    initAccordions();
    initCounters();
    initScrollAnimations();
    initInteractiveElements();
    initResponsiveFeatures();
});

// Animation Initialization
function initAnimations() {
    // Word reveal animation
    const titleWords = document.querySelectorAll('.title-word');
    titleWords.forEach((word, index) => {
        setTimeout(() => {
            word.style.animation = 'wordReveal 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards';
        }, index * 200);
    });
    
    // Feature items animation
    const featureItems = document.querySelectorAll('.feature-item');
    featureItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 100}ms`;
        item.style.animation = 'fadeInUp 0.6s ease forwards';
    });
}

// Accordion Functionality
function initAccordions() {
    const accordionItems = document.querySelectorAll('.accordion-item');
    
    accordionItems.forEach(item => {
        const header = item.querySelector('.accordion-header');
        const content = item.querySelector('.accordion-content');
        
        header.addEventListener('click', () => {
            // Close all other accordions
            accordionItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                    otherItem.querySelector('.accordion-content').style.maxHeight = '0';
                }
            });
            
            // Toggle current accordion
            item.classList.toggle('active');
            if (item.classList.contains('active')) {
                content.style.maxHeight = content.scrollHeight + 'px';
            } else {
                content.style.maxHeight = '0';
            }
        });
        
        // Initialize first accordion as open
        if (item === accordionItems[0]) {
            item.classList.add('active');
            content.style.maxHeight = content.scrollHeight + 'px';
        }
    });
}

// Number Counters
function initCounters() {
    const counters = document.querySelectorAll('[data-count]');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const updateCounter = () => {
                        if (current < target) {
                            current += increment;
                            counter.textContent = Math.ceil(current);
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.textContent = target;
                        }
                    };
                    updateCounter();
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });
        
        observer.observe(counter);
    });
}

// Scroll Animations
function initScrollAnimations() {
    const animatedElements = document.querySelectorAll('[data-aos]');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('aos-animate');
                
                // Apply specific animation based on data-aos attribute
                const animation = entry.target.getAttribute('data-aos');
                const delay = entry.target.getAttribute('data-aos-delay') || '0';
                
                setTimeout(() => {
                    if (animation === 'fade-right') {
                        entry.target.style.transform = 'translateX(0)';
                        entry.target.style.opacity = '1';
                    } else if (animation === 'fade-left') {
                        entry.target.style.transform = 'translateX(0)';
                        entry.target.style.opacity = '1';
                    } else if (animation === 'fade-up') {
                        entry.target.style.transform = 'translateY(0)';
                        entry.target.style.opacity = '1';
                    }
                }, parseInt(delay));
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    });
    
    animatedElements.forEach(el => {
        // Set initial state
        const animation = el.getAttribute('data-aos');
        if (animation === 'fade-right') {
            el.style.transform = 'translateX(-50px)';
        } else if (animation === 'fade-left') {
            el.style.transform = 'translateX(50px)';
        } else if (animation === 'fade-up') {
            el.style.transform = 'translateY(50px)';
        }
        el.style.opacity = '0';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        
        observer.observe(el);
    });
}

// Interactive Elements
function initInteractiveElements() {
    // Demo buttons
    document.querySelectorAll('.btn-demo').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            const shine = this.querySelector('.btn-shine');
            if (shine) {
                shine.style.animation = 'shine 1.5s linear infinite';
            }
        });
    });
    
    // Contact buttons
    document.querySelectorAll('.btn-contact').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            const pulse = this.querySelector('.btn-pulse');
            if (pulse) {
                pulse.style.animation = 'pulse 1.5s ease-in-out infinite';
            }
        });
    });
    
    // Fullscreen image viewer
    document.querySelectorAll('.btn-view-fullscreen').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const imageSrc = this.closest('.device-mockup').querySelector('.demo-image').src;
            openLightbox(imageSrc);
        });
    });
    
    // Hotline number formatting
    const hotlineNumber = document.querySelector('.hotline-number');
    if (hotlineNumber) {
        hotlineNumber.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = 'tel:' + this.textContent.replace(/[^0-9+]/g, '');
        });
    }
    
    // Call to action buttons
    document.querySelectorAll('.btn-call, .btn-whatsapp, .btn-email').forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            const ring = this.querySelector('.btn-ring');
            if (ring) {
                ring.style.animation = 'ringPulseActive 2s infinite ease-in-out';
            }
        });
        
        btn.addEventListener('mouseleave', function() {
            const ring = this.querySelector('.btn-ring');
            if (ring) {
                ring.style.animation = 'none';
            }
        });
    });
}

// Responsive Features
function initResponsiveFeatures() {
    // Adjust layout on resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            adjustLayout();
        }, 250);
    });
    
    // Touch device optimizations
    if ('ontouchstart' in window) {
        // Add touch feedback for buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('touchstart', function() {
                this.style.transform = 'scale(0.95)';
            });
            
            btn.addEventListener('touchend', function() {
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
        
        // Disable hover effects on touch devices
        document.body.classList.add('touch-device');
    }
}

// Lightbox Function
function openLightbox(imageSrc) {
    const lightbox = document.createElement('div');
    lightbox.className = 'lightbox';
    lightbox.innerHTML = `
        <div class="lightbox-content">
            <img src="${imageSrc}" alt="Fullscreen view">
            <button class="lightbox-close">&times;</button>
        </div>
    `;
    
    document.body.appendChild(lightbox);
    document.body.style.overflow = 'hidden';
    
    // Close lightbox
    const closeBtn = lightbox.querySelector('.lightbox-close');
    closeBtn.addEventListener('click', () => {
        document.body.removeChild(lightbox);
        document.body.style.overflow = '';
    });
    
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            document.body.removeChild(lightbox);
            document.body.style.overflow = '';
        }
    });
}

// Layout Adjustment
function adjustLayout() {
    const width = window.innerWidth;
    
    // Adjust feature grid columns
    const featureGrids = document.querySelectorAll('.features-grid');
    featureGrids.forEach(grid => {
        if (width < 768) {
            grid.style.gridTemplateColumns = '1fr';
        } else {
            grid.style.gridTemplateColumns = 'repeat(auto-fit, minmax(300px, 1fr))';
        }
    });
    
    // Adjust comparison table for mobile
    const comparisonTable = document.querySelector('.comparison-table');
    if (comparisonTable && width < 768) {
        comparisonTable.classList.add('mobile-view');
    } else if (comparisonTable) {
        comparisonTable.classList.remove('mobile-view');
    }
}

// Initialize on load
window.addEventListener('load', () => {
    // Add loading animation
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.3s ease';
    
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 100);
    
    // Adjust layout initially
    adjustLayout();
    
    // Add smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
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
});

// Add lightbox styles dynamically
const lightboxStyles = `
    .lightbox {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        animation: lightboxFadeIn 0.3s ease;
    }
    
    @keyframes lightboxFadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    .lightbox-content {
        position: relative;
        max-width: 90%;
        max-height: 90%;
    }
    
    .lightbox-content img {
        max-width: 100%;
        max-height: 90vh;
        border-radius: 10px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    }
    
    .lightbox-close {
        position: absolute;
        top: -40px;
        right: 0;
        background: none;
        border: none;
        color: white;
        font-size: 2rem;
        cursor: pointer;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }
    
    .lightbox-close:hover {
        transform: scale(1.2);
    }
`;

const styleSheet = document.createElement('style');
styleSheet.textContent = lightboxStyles;
document.head.appendChild(styleSheet);

// Performance optimization
if ('requestIdleCallback' in window) {
    requestIdleCallback(() => {
        // Lazy load non-critical animations
        const lazyElements = document.querySelectorAll('.package-card, .feature-item');
        lazyElements.forEach(el => {
            if (!el.hasAttribute('data-aos')) {
                el.setAttribute('data-aos', 'fade-up');
            }
        });
    });
}

// Error handling
window.addEventListener('error', function(e) {
    console.error('Error occurred:', e.error);
    // You might want to show a user-friendly error message here
});

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    // Close lightbox on Escape
    if (e.key === 'Escape') {
        const lightbox = document.querySelector('.lightbox');
        if (lightbox) {
            document.body.removeChild(lightbox);
            document.body.style.overflow = '';
        }
    }
});
</script>

<!-- AOS Library for animations -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    }
</script>
@endsection