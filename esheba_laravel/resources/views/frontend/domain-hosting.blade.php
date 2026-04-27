@extends('frontend.layouts.app')

@section('title', 'ডোমেইন ও হোস্টিং - ' . ($settings->company_name ?? 'E-Sheba'))

@section('styles')
<style>
/* Base Variables */
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
    --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.1);
    --shadow-md: 0 10px 25px rgba(0, 0, 0, 0.1);
    --shadow-lg: 0 20px 50px rgba(0, 0, 0, 0.15);
    --shadow-xl: 0 30px 60px rgba(0, 0, 0, 0.2);
}

/* Reset & Base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: var(--light-color);
    color: var(--dark-color);
    overflow-x: hidden;
}

/* Hero Section */
.hosting-hero-section {
    min-height: 100vh;
    background: var(--gradient-primary);
    padding: 140px 0 80px;
    position: relative;
    overflow: hidden;
}

.hero-background-animation {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.server-particles {
    position: absolute;
    width: 100%;
    height: 100%;
}

.particle {
    position: absolute;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    animation: particleFloat 20s infinite linear;
}

.particle:nth-child(1) { width: 100px; height: 100px; top: 10%; left: 10%; animation-delay: 0s; }
.particle:nth-child(2) { width: 150px; height: 150px; top: 60%; right: 10%; animation-delay: 5s; }
.particle:nth-child(3) { width: 80px; height: 80px; bottom: 20%; left: 20%; animation-delay: 10s; }
.particle:nth-child(4) { width: 120px; height: 120px; top: 30%; right: 30%; animation-delay: 15s; }

@keyframes particleFloat {
    0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.5; }
    25% { transform: translate(100px, 50px) scale(1.1); opacity: 0.8; }
    50% { transform: translate(50px, 100px) scale(0.9); opacity: 0.5; }
    75% { transform: translate(-50px, 50px) scale(1.05); opacity: 0.7; }
}

.data-flow {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent 49%, rgba(76, 201, 240, 0.1) 50%, transparent 51%);
    background-size: 50px 100%;
    animation: dataFlow 20s linear infinite;
}

@keyframes dataFlow {
    from { background-position: 0 0; }
    to { background-position: 50px 0; }
}

.server-grid {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: 
        linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
    background-size: 50px 50px;
    opacity: 0.3;
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

.breadcrumb-home {
    display: flex;
    align-items: center;
    gap: 8px;
    color: white;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.breadcrumb-home:hover {
    color: var(--accent-color);
    transform: translateX(-5px);
}

.breadcrumb-separator {
    color: rgba(255, 255, 255, 0.5);
    font-size: 20px;
}

.breadcrumb-current {
    display: flex;
    align-items: center;
    gap: 8px;
    color: white;
    font-weight: 600;
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

/* Hero Content */
.hero-content {
    text-align: center;
    color: white;
    max-width: 900px;
    margin: 0 auto;
}

.hero-title-wrapper {
    position: relative;
    margin-bottom: 40px;
}

.hero-title {
    font-size: 4rem;
    font-weight: 500;
    line-height: 1.1;
    margin-bottom: 20px;
    text-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.title-word {
    display: inline-block;
    opacity: 0;
    transform: translateY(30px);
    animation: wordReveal 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
}

.word-1 { animation-delay: 0.2s; color: var(--light-color);  }
.word-2 { animation-delay: 0.4s; color: var(--accent-color); }
.word-3 { animation-delay: 0.6s; color: var(--light-color);  }

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
    filter: blur(60px);
    opacity: 0.5;
}

/* Hero Subtitle */
.hero-subtitle {
    margin-bottom: 40px;
}

.subtitle-badge {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    padding: 15px 30px;
    border-radius: 50px;
    font-weight: 600;
    position: relative;
    overflow: hidden;
}

.badge-pulse {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: inherit;
    border-radius: 50px;
    animation: badgePulse 3s infinite ease-in-out;
}

@keyframes badgePulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.8; transform: scale(1.05); }
}

/* Hero Description */
.hero-description {
    margin-bottom: 50px;
}

.description-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 25px;
    padding: 30px;
    max-width: 800px;
    margin: 0 auto;
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

@keyframes iconFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.description-text {
    font-size: 1.5rem;
    line-height: 1.8;
    opacity: 0.9;
    text-align: center;
}

.description-sparkle {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        to right,
        transparent 20%,
        rgba(255, 255, 255, 0.1) 50%,
        transparent 80%
    );
    transform: rotate(30deg);
    animation: sparkleShimmer 3s infinite linear;
}

@keyframes sparkleShimmer {
    0% { left: -100%; }
    100% { left: 100%; }
}

/* Domain Search */
.domain-search-wrapper {
    margin-top: 60px;
}

.search-card {
    background: white;
    border-radius: 25px;
    padding: 40px;
    box-shadow: var(--shadow-xl);
    max-width: 800px;
    margin: 0 auto;
}

.search-header {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    margin-bottom: 30px;
}

.search-header h3 {
    font-size: 1.5rem;
    color: var(--dark-color);
    font-weight: 700;
}

.search-icon {
    font-size: 2rem;
    color: var(--primary-color);
    animation: iconSpin 4s linear infinite;
}

@keyframes iconSpin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.search-form {
    margin-bottom: 20px;
}

.input-group {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.domain-input {
    flex: 1;
    padding: 18px 25px;
    border: 2px solid #e2e8f0;
    border-radius: 15px;
    font-size: 1.4rem;
    transition: all 0.3s ease;
}

.domain-input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
}

.domain-ext {
    padding: 0 20px;
    border: 2px solid #e2e8f0;
    border-radius: 15px;
    background: white;
    font-size: 1.4rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.domain-ext:focus {
    outline: none;
    border-color: var(--primary-color);
}

.btn-check-domain {
    background: var(--gradient-primary);
    color: white;
    border: none;
    padding: 18px 35px;
    border-radius: 15px;
    font-size: 1.4rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-check-domain:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(67, 97, 238, 0.3);
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
    animation: buttonShine 3s infinite linear;
}

@keyframes buttonShine {
    0% { left: -100%; }
    100% { left: 100%; }
}

.domain-suggestions {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
    justify-content: center;
}

.suggestion-label {
    color: #64748b;
    font-size: 1.4rem;
    font-weight: 500;
}

.suggestion-tag {
    background: #f1f5f9;
    color: #475569;
    padding: 8px 16px;
    border-radius: 20px;
    border: none;
    font-size: 1.4rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.suggestion-tag:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
}

/* Hosting Plans Section */
.hosting-plans-section,
.smart-plans-section {
    padding: 100px 0;
    position: relative;
}

.hosting-plans-section {
    background: white;
}

.smart-plans-section {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

/* Section Header */
.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.header-decoration {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 30px;
    margin-bottom: 30px;
}

.decoration-line {
    height: 2px;
    width: 100px;
    background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
}

.decoration-icon {
    position: relative;
    width: 80px;
    height: 80px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--shadow-md);
}

.header-icon {
    font-size: 2rem;
    color: var(--primary-color);
    z-index: 2;
}

.icon-ring {
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    border: 2px solid var(--primary-color);
    border-radius: 50%;
    animation: ringRotate 3s linear infinite;
}

@keyframes ringRotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.section-title {
    font-size: 3rem;
    font-weight: 800;
    color: var(--dark-color);
    margin-bottom: 15px;
}

.section-subtitle {
    font-size: 1.5rem;
    color: #64748b;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
    text-align: center;
}

/* Plans Grid */
.plans-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.smart-grid {
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
}

/* Plan Card */
.plan-card {
    background: white;
    border-radius: 25px;
    padding: 40px;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    border: 2px solid transparent;
}

.plan-card:hover {
    transform: translateY(-20px);
    box-shadow: var(--shadow-xl);
    border-color: var(--primary-color);
}

.plan-card.featured {
    border: 3px solid var(--primary-color);
    transform: scale(1.05);
}

.plan-card.featured:hover {
    transform: translateY(-20px) scale(1.05);
}

.plan-card.smart {
    border-top: 5px solid var(--accent-color);
}

/* Plan Badge */
.plan-badge {
    position: absolute;
    top: 40px;
    right: -50px;
    background: var(--warning-color);
    color: white;
    padding: 8px 70px;
    font-size: 1.4rem;
    font-weight: 600;
    text-align: center;
    transform: rotate(45deg);
    box-shadow: 0 5px 15px rgba(245, 158, 11, 0.3);
}

.smart-badge {
    background: var(--accent-color);
}

/* Plan Header */
.plan-header {
    text-align: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #f1f5f9;
}

.plan-icon {
    position: relative;
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
}

.plan-icon-svg {
    font-size: 2.5rem;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
}

.icon-glow {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: inherit;
    border-radius: 50%;
    filter: blur(10px);
    opacity: 0.5;
    animation: iconPulse 2s infinite ease-in-out;
}

@keyframes iconPulse {
    0%, 100% { opacity: 0.3; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(1.1); }
}

.plan-name {
    font-size: 2rem;
    font-weight: 800;
    color: var(--dark-color);
    margin-bottom: 10px;
}

.plan-tagline {
    color: #64748b;
    font-size: 1.4rem;
    font-weight: 500;
}

/* Plan Pricing */
.plan-pricing {
    text-align: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #f1f5f9;
}

.price-wrapper {
    display: flex;
    align-items: baseline;
    justify-content: center;
    gap: 5px;
    margin-bottom: 10px;
}

.price-currency {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--dark-color);
}

.price-amount {
    font-size: 3.5rem;
    font-weight: 800;
    color: var(--primary-color);
    line-height: 1;
}

.price-period {
    font-size: 1.4rem;
    color: #64748b;
    font-weight: 500;
}

.price-details {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
}

.original-price {
    font-size: 1.4rem;
    color: #94a3b8;
    text-decoration: line-through;
}

.discount-badge {
    background: var(--success-color);
    color: white;
    padding: 5px 15px;
    border-radius: 15px;
    font-size: 1.4rem;
    font-weight: 600;
}

/* Plan Features */
.plan-features {
    margin-bottom: 30px;
}

.features-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
}

.features-header h4 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--dark-color);
}

.features-list {
    list-style: none;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 0;
    border-bottom: 1px solid #f1f5f9;
    position: relative;
    transition: all 0.3s ease;
}

.feature-item:hover {
    background: #f8fafc;
    padding-left: 10px;
    border-radius: 8px;
}

.feature-item.highlight {
    background: linear-gradient(90deg, rgba(67, 97, 238, 0.1), transparent);
}

.feature-item.unlimited .feature-check {
    background: var(--success-color);
    color: white;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
}

.feature-item.smart-feature {
    background: linear-gradient(90deg, rgba(76, 201, 240, 0.1), transparent);
}

.feature-check {
    color: var(--success-color);
    font-size: 1.4rem;
    flex-shrink: 0;
}

.feature-text {
    flex: 1;
    color: #475569;
    font-size: 1.5rem;
}

.feature-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    border-radius: 1px;
    transition: width 1s ease;
}

.feature-tooltip {
    position: absolute;
    top: -40px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--dark-color);
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 1.4rem;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 10;
}

.feature-item:hover .feature-tooltip {
    opacity: 1;
    visibility: visible;
    top: -50px;
}

/* Plan Actions */
.plan-actions {
    text-align: center;
}

.btn-plan-select {
    width: 100%;
    padding: 18px;
    background: var(--gradient-primary);
    color: white;
    border: none;
    border-radius: 15px;
    font-size: 1.1.4rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-plan-select:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(67, 97, 238, 0.3);
}

.btn-plan-select.featured {
    background: var(--gradient-accent);
}

.btn-plan-select.smart {
    background: var(--gradient-secondary);
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

.btn-plan-contact {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    padding: 10px 20px;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.btn-plan-contact:hover {
    background: #f1f5f9;
    transform: translateY(-2px);
}

.plan-popularity {
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid #f1f5f9;
}

.popularity-stars {
    font-size: 1.5rem;
    color: var(--warning-color);
    margin-bottom: 5px;
}

.popularity-text {
    font-size: 1.2rem;
    color: #64748b;
}

/* Features Comparison */
.features-comparison {
    padding: 80px 0;
    background: white;
}

.comparison-header {
    text-align: center;
    margin-bottom: 50px;
}

.comparison-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--dark-color);
    margin-bottom: 15px;
}

.comparison-subtitle {
    font-size: 1.4rem;
    color: #64748b;
    max-width: 600px;
    margin: 0 auto;
    text-align: center;
}

/* Comparison Tabs */
.comparison-tabs {
    max-width: 1200px;
    margin: 0 auto;
}

.tabs-header {
    display: flex;
    justify-content: center;
    margin-bottom: 40px;
    position: relative;
}

.tab-btn {
    padding: 15px 40px;
    background: none;
    border: none;
    font-size: 1.1.4rem;
    font-weight: 600;
    color: #94a3b8;
    cursor: pointer;
    position: relative;
    transition: all 0.3s ease;
}

.tab-btn.active {
    color: var(--primary-color);
}

.tab-indicator {
    position: absolute;
    bottom: 0;
    height: 3px;
    background: var(--primary-color);
    border-radius: 2px;
    transition: all 0.3s ease;
}

.tabs-content {
    background: white;
    border-radius: 25px;
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

.tab-pane {
    display: none;
    padding: 30px;
}

.tab-pane.active {
    display: block;
}

/* Comparison Grid */
.comparison-grid {
    width: 100%;
    border-collapse: collapse;
}

.comparison-row {
    display: grid;
    grid-template-columns: 2fr repeat(3, 1fr);
    border-bottom: 1px solid #e2e8f0;
    transition: all 0.3s ease;
}

.comparison-row.header {
    background: linear-gradient(135deg, #f8fafc, #e2e8f0);
    font-weight: 700;
    color: var(--dark-color);
}

.comparison-row:hover:not(.header) {
    background: #f8fafc;
}

.col-feature,
.col-plan {
    padding: 20px;
    display: flex;
    align-items: center;
}

.col-feature {
    font-weight: 600;
    color: var(--dark-color);
}

.col-plan {
    justify-content: center;
    text-align: center;
    font-weight: 500;
    color: #475569;
}

.col-plan.price {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--primary-color);
}

.col-plan.unlimited {
    color: var(--success-color);
    font-weight: 700;
}

/* Smart Grid Adjustments */
#tab-smart .comparison-row {
    grid-template-columns: 2fr repeat(4, 1fr);
}

/* Support Section */
.hosting-support {
    padding: 80px 0;
    background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
}

.support-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
}

.support-card {
    background: white;
    padding: 40px 30px;
    border-radius: 20px;
    text-align: center;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.support-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-lg);
}

.support-icon {
    font-size: 3rem;
    margin-bottom: 20px;
    display: block;
    animation: iconBounce 2s infinite ease-in-out;
}

@keyframes iconBounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.support-card h3 {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--dark-color);
    margin-bottom: 15px;
}

.support-card p {
    color: #64748b;
    line-height: 1.6;
    text-align: center;
}

.support-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80%;
    height: 80%;
    background: radial-gradient(circle, rgba(67, 97, 238, 0.1), transparent);
    filter: blur(20px);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.support-card:hover .support-glow {
    opacity: 1;
}

/* Call to Action */
.hosting-cta {
    padding: 100px 0;
    background: var(--gradient-primary);
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
}

.hosting-cta::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.1), transparent);
}

.cta-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
    margin: 0 auto;
}

.cta-icon {
    font-size: 4rem;
    margin-bottom: 30px;
    animation: iconFloat 3s infinite ease-in-out;
}

.cta-title {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 20px;
    text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    color:#fff;
}

.cta-text {
    font-size: 1.5rem;
    opacity: 0.9;
    margin-bottom: 40px;
    line-height: 1.8;
    text-align: center;
}

.cta-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-cta-primary {
    background: white;
    color: var(--primary-color);
    padding: 18px 35px;
    border-radius: 15px;
    font-size: 1.1.4rem;
    font-weight: 700;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-cta-primary:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    background: var(--primary-color);
    color: white;
}

.btn-cta-secondary {
    background: transparent;
    color: white;
    padding: 18px 35px;
    border-radius: 15px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    font-size: 1.1.4rem;
    font-weight: 600;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: all 0.3s ease;
}

.btn-cta-secondary:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: white;
    transform: translateY(-5px);
}

/* Responsive Design */
@media (max-width: 1200px) {
    .hero-title {
        font-size: 3rem;
    }
    
    .section-title {
        font-size: 2.5rem;
    }
    
    .plans-grid {
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }
}

@media (max-width: 992px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .plan-card.featured {
        transform: scale(1);
    }
    
    .plan-card.featured:hover {
        transform: translateY(-20px);
    }
    
    .comparison-row {
        grid-template-columns: 1fr;
        padding: 20px;
    }
    
    .col-feature,
    .col-plan {
        justify-content: space-between;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .comparison-row.header {
        display: none;
    }
    
    #tab-smart .comparison-row {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
        .modern-breadcrumb {
        width: 100%;
        padding: 5px 0px 20px 0px;
        position:relative !important;
    }
    .hosting-hero-section {
        padding: 120px 0 60px;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .cta-title {
        font-size: 2rem;
    }
    
    .input-group {
        flex-direction: column;
    }
    
    .domain-input,
    .domain-ext,
    .btn-check-domain {
        width: 100%;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-cta-primary,
    .btn-cta-secondary {
        width: 100%;
        justify-content: center;
    }
    
    .tabs-header {
        flex-direction: column;
        gap: 10px;
    }
    
    .tab-btn {
        width: 100%;
        text-align: center;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 1.8rem;
    }
    
    .plan-card {
        padding: 30px 20px;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .support-grid {
        grid-template-columns: 1fr;
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

/* Animation Classes */
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

.fade-in-up {
    animation: fadeInUp 0.6s ease forwards;
}

/* Loading Animation */
.loading-spinner {
    width: 40px;
    height: 40px;
    border: 3px solid #f1f5f9;
    border-top: 3px solid var(--primary-color);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Print Styles */
@media print {
    .hero-background-animation,
    .btn-sparkle,
    .badge-pulse,
    .icon-glow,
    .feature-tooltip,
    .cta-buttons {
        display: none !important;
    }
    
    .plan-card {
        box-shadow: none !important;
        border: 1px solid #ddd !important;
        break-inside: avoid;
    }
    
    .hosting-hero-section {
        background: white !important;
        color: black !important;
        padding: 50px 0 !important;
    }
}
</style>
@endsection

@section('content')
<!-- Modern Hosting & Domain Plans Section -->
<section class="hosting-hero-section">
    <!-- Animated Background -->
    <div class="hero-background-animation">
        <div class="server-particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        <div class="data-flow"></div>
        <div class="server-grid"></div>
    </div>

    <!-- Modern Breadcrumb -->
    <div class="modern-breadcrumb">
        <div class="container">
            <nav class="breadcrumb-nav" aria-label="breadcrumb">
                <div class="breadcrumb-trail">
                    <a href="{{ url('/') }}" class="breadcrumb-home">
                        <i class="breadcrumb-icon fa fa-home"></i>
                        <span>{{ $settings->company_name ?? 'E-SHEBA' }}</span>
                    </a>
                    <div class="breadcrumb-separator">/</div>
                    <span class="breadcrumb-current">
                        <i class="breadcrumb-icon fa fa-server"></i>
                        ডোমেইন ও হোস্টিং সেবা
                    </span>
                </div>
                <div class="breadcrumb-progress">
                    <div class="progress-bar"></div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Hero Content -->
    <div class="container">
        <div class="hero-content">
            <div class="hero-title-wrapper">
                <h1 class="hero-title">
                    <span class="title-word word-1">দ্রুত</span>
                    <span class="title-word word-2">নির্ভরযোগ্য</span>
                    <span class="title-word word-3">হোস্টিং সমাধান আপনার ব্যবসার জন্য</span>
                </h1>
                <div class="title-glow"></div>
            </div>
            
            <div class="hero-subtitle">
                <div class="subtitle-badge">
                    <i class="badge-icon fa fa-check-circle"></i>
                    <span>পেশাদার ডোমেইন নিবন্ধন ও ম্যানেজড হোস্টিং — শুরু করুন এখনই</span>
                    <div class="badge-pulse"></div>
                </div>
            </div>
            
            <div class="hero-description">
                <div class="description-card">
                    <div class="description-icon fa fa-cloud"></div>
                    <p class="description-text">
                        আমাদের হোস্টিং প্ল্যানগুলো ছোট ব্যবসা থেকে বড় প্রতিষ্ঠানের জন্যও উপযুক্ত — দ্রুতগতির সার্ভার, অটোমেটিক ব্যাকআপ, বিনামূল্যে SSL এবং ২৪/৭ লাইভ সাপোর্ট।
                        আপনি চাইলে ওয়েবসাইট মাইগ্রেশন, কাস্টম সিকিউরিটি কনফিগারেশন এবং CDN সমন্বয় সহ সম্পূর্ণ ম্যানেজড সেবা পেতে পারেন।
                    </p>
                    <div class="description-sparkle"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hosting Plans Section -->
<section class="hosting-plans-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <div class="header-decoration">
                <div class="decoration-line line-1"></div>
                <div class="decoration-icon">
                    <i class="header-icon fa fa-server"></i>
                    <div class="icon-ring"></div>
                </div>
                <div class="decoration-line line-2"></div>
            </div>
            <h2 class="section-title">ঘরোয়া ও বেসিক হোস্টিং প্ল্যান</h2>
            <p class="section-subtitle">সহজ পরিকল্পনা, দ্রুত সেটআপ এবং ২৪/৭ সাপোর্ট — আপনার অনলাইন উপস্থিতি শুরু করার সবচেয়ে সহজ উপায়।</p>
        </div>

        <!-- Basic Hosting Plans -->
        <div class="plans-grid" id="basic-plans">
            <!-- Start Up Plan -->
            <div class="plan-card" data-plan="startup">
                <div class="plan-badge">শুরুতেই সেরা</div>
                <div class="plan-header">
                    <div class="plan-icon">
                        <i class="plan-icon-svg fa fa-rocket"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="plan-name">স্টার্ট আপ</h3>
                    <div class="plan-tagline">ছোট ওয়েবসাইট ও ব্যক্তিগত ব্লগের জন্য উপযুক্ত</div>
                </div>
                
                <div class="plan-pricing">
                    <div class="price-wrapper">
                        <span class="price-currency">৳</span>
                        <span class="price-amount">650</span>
                        <span class="price-period">/ বার্ষিক</span>
                    </div>
                    <div class="price-details">
                        <span class="original-price">৳ 800</span>
                        <span class="discount-badge">১৯% ছাড়</span>
                    </div>
                </div>
                
                <div class="plan-features">
                    <div class="features-header">
                        <i class="features-icon fa fa-list"></i>
                        <h4>মূল সুবিধাসমূহ</h4>
                    </div>
                    <ul class="features-list">
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">৫০০ MB ডিস্ক স্পেস</span>
                            <div class="feature-tooltip">ছোট সাইট এবং ব্লগ হোস্টিংয়ের জন্য উপযুক্ত।</div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">২ GB ব্যান্ডউইথ (মাসিক)</span>
                            <div class="feature-progress" style="width: 40%"></div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">২ সাবডোমেইন</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">৫ ইমেইল অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">৫ FTP অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">৫ MySQL ডাটাবেস</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-shield-alt"></i>
                            <span class="feature-text">ফ্রি SSL সার্টিফিকেট</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-clock"></i>
                            <span class="feature-text">৯৯.৯৯% আপটাইম গ্যারান্টি</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-cog"></i>
                            <span class="feature-text">cPanel কন্ট্রোল প্যানেল</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-headset"></i>
                            <span class="feature-text">২৪/৭ সাপোর্ট</span>
                        </li>
                    </ul>
                </div>
                
                <div class="plan-actions">
                    <button class="btn-plan-select" data-plan="startup">
                        <i class="btn-icon fa fa-shopping-cart"></i>
                        <span>এখন অর্ডার করুন</span>
                        <div class="btn-sparkle"></div>
                    </button>
                    <a href="{{ route('contact') }}" class="btn-plan-contact">
                        <i class="btn-icon fa fa-envelope"></i>
                        <span>যোগাযোগ করুন</span>
                    </a>
                    <div class="plan-popularity">
                        <div class="popularity-stars">★★★★★</div>
                        <span class="popularity-text">২৫০+ সক্রিয় ব্যবহারকারী</span>
                    </div>
                </div>
            </div>

            <!-- Basic Plan -->
            <div class="plan-card featured" data-plan="basic">
                <div class="plan-badge">সেরা মূল্য</div>
                <div class="plan-header">
                    <div class="plan-icon">
                        <i class="plan-icon-svg fa fa-star"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="plan-name">বেসিক</h3>
                    <div class="plan-tagline">ছোট থেকে মাঝারি ব্যবসার জন্য দারুণ পছন্দ</div>
                </div>
                
                <div class="plan-pricing">
                    <div class="price-wrapper">
                        <span class="price-currency">৳</span>
                        <span class="price-amount">1,200</span>
                        <span class="price-period">/ বার্ষিক</span>
                    </div>
                    <div class="price-details">
                        <span class="original-price">৳ 1,500</span>
                        <span class="discount-badge">২০% ছাড়</span>
                    </div>
                </div>
                
                <div class="plan-features">
                    <div class="features-header">
                        <i class="features-icon fa fa-list"></i>
                        <h4>মূল সুবিধাসমূহ</h4>
                    </div>
                    <ul class="features-list">
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১ GB ডিস্ক স্পেস</span>
                            <div class="feature-tooltip">বহু-ফিচার ও মাঝারি ট্রাফিক সাইটের জন্য।</div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">৫ GB ব্যান্ডউইথ (মাসিক)</span>
                            <div class="feature-progress" style="width: 60%"></div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ সাবডোমেইন</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ ইমেইল অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ FTP অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ MySQL ডাটাবেস</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-shield-alt"></i>
                            <span class="feature-text">ফ্রি SSL সার্টিফিকেট</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-clock"></i>
                            <span class="feature-text">৯৯.৯৯% আপটাইম গ্যারান্টি</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-cog"></i>
                            <span class="feature-text">cPanel কন্ট্রোল প্যানেল</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-headset"></i>
                            <span class="feature-text">২৪/৭ সাপোর্ট</span>
                        </li>
                    </ul>
                </div>
                
                <div class="plan-actions">
                    <button class="btn-plan-select featured" data-plan="basic">
                        <i class="btn-icon fa fa-credit-card"></i>
                        <span>প্যাকেজটি বেছে নিন</span>
                        <div class="btn-sparkle"></div>
                    </button>
                    <a href="{{ route('contact') }}" class="btn-plan-contact">
                        <i class="btn-icon fa fa-envelope"></i>
                        <span>যোগাযোগ করুন</span>
                    </a>
                    <div class="plan-popularity">
                        <div class="popularity-stars">★★★★★</div>
                        <span class="popularity-text">৫০০+ সক্রিয় ব্যবহারকারী</span>
                    </div>
                </div>
            </div>

            <!-- Standard Plan -->
            <div class="plan-card" data-plan="standard">
                <div class="plan-badge">জনপ্রিয়</div>
                <div class="plan-header">
                    <div class="plan-icon">
                        <i class="plan-icon-svg fa fa-th-large"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="plan-name">স্ট্যান্ডার্ড</h3>
                    <div class="plan-tagline">উন্নত পারফরম্যান্স ও বাড়তি ব্যান্ডউইথ</div>
                </div>
                
                <div class="plan-pricing">
                    <div class="price-wrapper">
                        <span class="price-currency">৳</span>
                        <span class="price-amount">1,800</span>
                        <span class="price-period">/ বার্ষিক</span>
                    </div>
                    <div class="price-details">
                        <span class="original-price">৳ 2,200</span>
                        <span class="discount-badge">১৮% ছাড়</span>
                    </div>
                </div>
                
                <div class="plan-features">
                    <div class="features-header">
                        <i class="features-icon fa fa-list"></i>
                        <h4>মূল সুবিধাসমূহ</h4>
                    </div>
                    <ul class="features-list">
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">২ GB ডিস্ক স্পেস</span>
                            <div class="feature-tooltip">বড় ও মাঝারি সাইটের জন্য উন্নত বিকল্প।</div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ GB ব্যান্ডউইথ (মাসিক)</span>
                            <div class="feature-progress" style="width: 80%"></div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ সাবডোমেইন</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ ইমেইল অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ FTP অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ MySQL ডাটাবেস</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-shield-alt"></i>
                            <span class="feature-text">ফ্রি SSL সার্টিফিকেট</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-clock"></i>
                            <span class="feature-text">৯৯.৯৯% আপটাইম গ্যারান্টি</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-cog"></i>
                            <span class="feature-text">cPanel কন্ট্রোল প্যানেল</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-headset"></i>
                            <span class="feature-text">২৪/৭ সাপোর্ট</span>
                        </li>
                    </ul>
                </div>
                
                <div class="plan-actions">
                    <button class="btn-plan-select" data-plan="standard">
                        <i class="btn-icon fa fa-shopping-cart"></i>
                        <span>এখন অর্ডার করুন</span>
                        <div class="btn-sparkle"></div>
                    </button>
                    <a href="{{ route('contact') }}" class="btn-plan-contact">
                        <i class="btn-icon fa fa-envelope"></i>
                        <span>যোগাযোগ করুন</span>
                    </a>
                    <div class="plan-popularity">
                        <div class="popularity-stars">★★★★★</div>
                        <span class="popularity-text">৩০০+ সক্রিয় ব্যবহারকারী</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Smart Hosting Plans Section -->
<section class="smart-plans-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <div class="header-decoration">
                <div class="decoration-line line-1"></div>
                <div class="decoration-icon">
                    <i class="header-icon fa fa-cogs"></i>
                    <div class="icon-ring"></div>
                </div>
                <div class="decoration-line line-2"></div>
            </div>
            <h2 class="section-title">স্মার্ট হোস্টিং প্ল্যান</h2>
            <p class="section-subtitle">উন্নত নিরাপত্তা, অটোমেটিক ব্যাকআপ এবং CDN—বড় ট্রাফিকের জন্য অপ্টিমাইজড।</p>
        </div>

        <!-- Smart Plans Grid -->
        <div class="plans-grid smart-grid" id="smart-plans">
            <!-- Smart Basic Plan -->
            <div class="plan-card smart" data-plan="smart-basic">
                <div class="plan-badge smart-badge">সুযোগসন্ধানী</div>
                <div class="plan-header">
                    <div class="plan-icon">
                        <i class="plan-icon-svg fa fa-bolt"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="plan-name">স্মার্ট বেসিক</h3>
                    <div class="plan-tagline">দ্রুত লোডিং ও অটোমেটিক ব্যাকআপ</div>
                </div>
                
                <div class="plan-pricing">
                    <div class="price-wrapper">
                        <span class="price-currency">৳</span>
                        <span class="price-amount">2,500</span>
                        <span class="price-period">/ বার্ষিক</span>
                    </div>
                    <div class="price-details">
                        <span class="original-price">৳ 3,000</span>
                        <span class="discount-badge">১৭% ছাড়</span>
                    </div>
                </div>
                
                <div class="plan-features">
                    <div class="features-header">
                        <i class="features-icon fa fa-list"></i>
                        <h4>মূল সুবিধাসমূহ</h4>
                    </div>
                    <ul class="features-list">
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">৩ GB ডিস্ক স্পেস</span>
                            <div class="feature-tooltip">দ্রুতগতির SSD স্টোরেজ।</div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ GB ব্যান্ডউইথ (মাসিক)</span>
                            <div class="feature-progress" style="width: 50%"></div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ সাবডোমেইন</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ ইমেইল অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ FTP অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ MySQL ডাটাবেস</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-shield-alt"></i>
                            <span class="feature-text">ফ্রি SSL সার্টিফিকেট</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-clock"></i>
                            <span class="feature-text">৯৯.৯৯% আপটাইম গ্যারান্টি</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-cog"></i>
                            <span class="feature-text">cPanel কন্ট্রোল প্যানেল</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-headset"></i>
                            <span class="feature-text">২৪/৭ সাপোর্ট</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-database"></i>
                            <span class="feature-text">অটো ব্যাকআপ</span>
                        </li>
                    </ul>
                </div>
                
                <div class="plan-actions">
                    <button class="btn-plan-select smart" data-plan="smart-basic">
                        <i class="btn-icon fa fa-shopping-cart"></i>
                        <span>এখন অর্ডার করুন</span>
                        <div class="btn-sparkle"></div>
                    </button>
                    <a href="{{ route('contact') }}" class="btn-plan-contact">
                        <i class="btn-icon fa fa-envelope"></i>
                        <span>যোগাযোগ করুন</span>
                    </a>
                </div>
            </div>

            <!-- Smart Plus Plan -->
            <div class="plan-card smart featured" data-plan="smart-plus">
                <div class="plan-badge smart-badge">বেস্ট সিলেকশন</div>
                <div class="plan-header">
                    <div class="plan-icon">
                        <i class="plan-icon-svg fa fa-rocket"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="plan-name">স্মার্ট প্লাস</h3>
                    <div class="plan-tagline">এন্টারপ্রাইজ-রেডি পারফরম্যান্স</div>
                </div>
                
                <div class="plan-pricing">
                    <div class="price-wrapper">
                        <span class="price-currency">৳</span>
                        <span class="price-amount">3,500</span>
                        <span class="price-period">/ বার্ষিক</span>
                    </div>
                    <div class="price-details">
                        <span class="original-price">৳ 4,200</span>
                        <span class="discount-badge">১৭% ছাড়</span>
                    </div>
                </div>
                
                <div class="plan-features">
                    <div class="features-header">
                        <i class="features-icon fa fa-list"></i>
                        <h4>মূল সুবিধাসমূহ</h4>
                    </div>
                    <ul class="features-list">
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">৫ GB ডিস্ক স্পেস</span>
                            <div class="feature-tooltip">উচ্চ পারফরম্যান্স সাইটের জন্য বেশি স্টোরেজ।</div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">২০ GB ব্যান্ডউইথ (মাসিক)</span>
                            <div class="feature-progress" style="width: 70%"></div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১৫ সাবডোমেইন</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১৫ ইমেইল অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১৫ FTP অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১৫ MySQL ডাটাবেস</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-shield-alt"></i>
                            <span class="feature-text">ফ্রি SSL সার্টিফিকেট</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-clock"></i>
                            <span class="feature-text">৯৯.৯৯% আপটাইম গ্যারান্টি</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-cog"></i>
                            <span class="feature-text">cPanel কন্ট্রোল প্যানেল</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-headset"></i>
                            <span class="feature-text">২৪/৭ সাপোর্ট</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-database"></i>
                            <span class="feature-text">অটো ব্যাকআপ</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-lock"></i>
                            <span class="feature-text">উন্নত নিরাপত্তা</span>
                        </li>
                    </ul>
                </div>
                
                <div class="plan-actions">
                    <button class="btn-plan-select smart featured" data-plan="smart-plus">
                        <i class="btn-icon fa fa-credit-card"></i>
                        <span>প্যাকেজটি বেছে নিন</span>
                        <div class="btn-sparkle"></div>
                    </button>
                    <a href="{{ route('contact') }}" class="btn-plan-contact">
                        <i class="btn-icon fa fa-envelope"></i>
                        <span>যোগাযোগ করুন</span>
                    </a>
                </div>
            </div>

            <!-- Smart Pro Plan -->
            <div class="plan-card smart" data-plan="smart-pro">
                <div class="plan-badge smart-badge">প্রো পারফরম্যান্স</div>
                <div class="plan-header">
                    <div class="plan-icon">
                        <i class="plan-icon-svg fa fa-tachometer-alt"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="plan-name">স্মার্ট প্রো</h3>
                    <div class="plan-tagline">বড় ট্রাফিক ও উচ্চতর নির্ভরতার জন্য</div>
                </div>
                
                <div class="plan-pricing">
                    <div class="price-wrapper">
                        <span class="price-currency">৳</span>
                        <span class="price-amount">5,000</span>
                        <span class="price-period">/ বার্ষিক</span>
                    </div>
                    <div class="price-details">
                        <span class="original-price">৳ 6,000</span>
                        <span class="discount-badge">১৭% ছাড়</span>
                    </div>
                </div>
                
                <div class="plan-features">
                    <div class="features-header">
                        <i class="features-icon fa fa-list"></i>
                        <h4>মূল সুবিধাসমূহ</h4>
                    </div>
                    <ul class="features-list">
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০ GB ডিস্ক স্পেস</span>
                            <div class="feature-tooltip">বৃহৎ মিডিয়া ও ডাটাবেস সমর্থন।</div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">৫০ GB ব্যান্ডউইথ (মাসিক)</span>
                            <div class="feature-progress" style="width: 90%"></div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">২০ সাবডোমেইন</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">২০ ইমেইল অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">২০ FTP অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">২০ MySQL ডাটাবেস</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-shield-alt"></i>
                            <span class="feature-text">ফ্রি SSL সার্টিফিকেট</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-clock"></i>
                            <span class="feature-text">৯৯.৯৯% আপটাইম গ্যারান্টি</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-cog"></i>
                            <span class="feature-text">cPanel কন্ট্রোল প্যানেল</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-headset"></i>
                            <span class="feature-text">২৪/৭ সাপোর্ট</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-database"></i>
                            <span class="feature-text">অটো ব্যাকআপ</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-lock"></i>
                            <span class="feature-text">উন্নত নিরাপত্তা</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-cloud"></i>
                            <span class="feature-text">CDN অন্তর্ভুক্ত</span>
                        </li>
                    </ul>
                </div>
                
                <div class="plan-actions">
                    <button class="btn-plan-select smart" data-plan="smart-pro">
                        <i class="btn-icon fa fa-shopping-cart"></i>
                        <span>এখন অর্ডার করুন</span>
                        <div class="btn-sparkle"></div>
                    </button>
                    <a href="{{ route('contact') }}" class="btn-plan-contact">
                        <i class="btn-icon fa fa-envelope"></i>
                        <span>যোগাযোগ করুন</span>
                    </a>
                </div>
            </div>

            <!-- Smart Business Plan -->
            <div class="plan-card smart" data-plan="smart-business">
                <div class="plan-badge smart-badge">বিজনেস অপশন-১</div>
                <div class="plan-header">
                    <div class="plan-icon">
                        <i class="plan-icon-svg fa fa-briefcase"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="plan-name">স্মার্ট বিজনেস-১</h3>
                    <div class="plan-tagline">বড় কোম্পানি ও ই-কমার্সের জন্য প্রিমিয়াম সার্ভিস</div>
                </div>
                
                <div class="plan-pricing">
                    <div class="price-wrapper">
                        <span class="price-currency">৳</span>
                        <span class="price-amount">8,000</span>
                        <span class="price-period">/ বার্ষিক</span>
                    </div>
                    <div class="price-details">
                        <span class="original-price">৳ 10,000</span>
                        <span class="discount-badge">২০% ছাড়</span>
                    </div>
                </div>
                
                <div class="plan-features">
                    <div class="features-header">
                        <i class="features-icon fa fa-list"></i>
                        <h4>মূল সুবিধাসমূহ</h4>
                    </div>
                    <ul class="features-list">
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">২০ GB ডিস্ক স্পেস</span>
                            <div class="feature-tooltip">বৃহৎ স্টোরেজ প্রয়োজন হলে উপযুক্ত।</div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০০ GB ব্যান্ডউইথ (মাসিক)</span>
                            <div class="feature-progress" style="width: 100%"></div>
                        </li>
                        <li class="feature-item unlimited">
                            <i class="feature-check fa fa-infinity"></i>
                            <span class="feature-text">আনলিমিটেড সাবডোমেইন</span>
                        </li>
                        <li class="feature-item unlimited">
                            <i class="feature-check fa fa-infinity"></i>
                            <span class="feature-text">আনলিমিটেড ইমেইল অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item unlimited">
                            <i class="feature-check fa fa-infinity"></i>
                            <span class="feature-text">আনলিমিটেড FTP অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item unlimited">
                            <i class="feature-check fa fa-infinity"></i>
                            <span class="feature-text">আনলিমিটেড MySQL ডাটাবেস</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-shield-alt"></i>
                            <span class="feature-text">ফ্রি SSL সার্টিফিকেট</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-clock"></i>
                            <span class="feature-text">৯৯.৯৯% আপটাইম গ্যারান্টি</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-cog"></i>
                            <span class="feature-text">cPanel কন্ট্রোল প্যানেল</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-headset"></i>
                            <span class="feature-text">২৪/৭ প্রিমিয়াম সাপোর্ট</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-database"></i>
                            <span class="feature-text">অটো ব্যাকআপ</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-lock"></i>
                            <span class="feature-text">উন্নত নিরাপত্তা</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-cloud"></i>
                            <span class="feature-text">CDN অন্তর্ভুক্ত</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-star"></i>
                            <span class="feature-text">প্রায়োরিটি সাপোর্ট</span>
                        </li>
                    </ul>
                </div>
                
                <div class="plan-actions">
                    <button class="btn-plan-select smart" data-plan="smart-business">
                        <i class="btn-icon fa fa-shopping-cart"></i>
                        <span>এখন অর্ডার করুন</span>
                        <div class="btn-sparkle"></div>
                    </button>
                    <a href="{{ route('contact') }}" class="btn-plan-contact">
                        <i class="btn-icon fa fa-envelope"></i>
                        <span>যোগাযোগ করুন</span>
                    </a>
                </div>
            </div>
            
            <!-- Smart Business Plan -->
            <div class="plan-card smart" data-plan="smart-business">
                <div class="plan-badge smart-badge">বিজনেস অপশন-২</div>
                <div class="plan-header">
                    <div class="plan-icon">
                        <i class="plan-icon-svg fa fa-briefcase"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="plan-name">স্মার্ট বিজনেস-২</h3>
                    <div class="plan-tagline">বড় কোম্পানি ও ই-কমার্সের জন্য প্রিমিয়াম সার্ভিস</div>
                </div>
                
                <div class="plan-pricing">
                    <div class="price-wrapper">
                        <span class="price-currency">৳</span>
                        <span class="price-amount">10,000</span>
                        <span class="price-period">/ বার্ষিক</span>
                    </div>
                    <div class="price-details">
                        <span class="original-price">৳ 12,000</span>
                        <span class="discount-badge">২০% ছাড়</span>
                    </div>
                </div>
                
                <div class="plan-features">
                    <div class="features-header">
                        <i class="features-icon fa fa-list"></i>
                        <h4>মূল সুবিধাসমূহ</h4>
                    </div>
                    <ul class="features-list">
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">৫০ GB ডিস্ক স্পেস</span>
                            <div class="feature-tooltip">বৃহৎ স্টোরেজ প্রয়োজন হলে উপযুক্ত।</div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">১০০০ GB ব্যান্ডউইথ (মাসিক)</span>
                            <div class="feature-progress" style="width: 100%"></div>
                        </li>
                        <li class="feature-item unlimited">
                            <i class="feature-check fa fa-infinity"></i>
                            <span class="feature-text">আনলিমিটেড সাবডোমেইন</span>
                        </li>
                        <li class="feature-item unlimited">
                            <i class="feature-check fa fa-infinity"></i>
                            <span class="feature-text">আনলিমিটেড ইমেইল অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item unlimited">
                            <i class="feature-check fa fa-infinity"></i>
                            <span class="feature-text">আনলিমিটেড FTP অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item unlimited">
                            <i class="feature-check fa fa-infinity"></i>
                            <span class="feature-text">আনলিমিটেড MySQL ডাটাবেস</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-shield-alt"></i>
                            <span class="feature-text">ফ্রি SSL সার্টিফিকেট</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-clock"></i>
                            <span class="feature-text">৯৯.৯৯% আপটাইম গ্যারান্টি</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-cog"></i>
                            <span class="feature-text">cPanel কন্ট্রোল প্যানেল</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-headset"></i>
                            <span class="feature-text">২৪/৭ প্রিমিয়াম সাপোর্ট</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-database"></i>
                            <span class="feature-text">অটো ব্যাকআপ</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-lock"></i>
                            <span class="feature-text">উন্নত নিরাপত্তা</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-cloud"></i>
                            <span class="feature-text">CDN অন্তর্ভুক্ত</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-star"></i>
                            <span class="feature-text">প্রায়োরিটি সাপোর্ট</span>
                        </li>
                    </ul>
                </div>
                
                <div class="plan-actions">
                    <button class="btn-plan-select smart" data-plan="smart-business">
                        <i class="btn-icon fa fa-shopping-cart"></i>
                        <span>এখন অর্ডার করুন</span>
                        <div class="btn-sparkle"></div>
                    </button>
                    <a href="{{ route('contact') }}" class="btn-plan-contact">
                        <i class="btn-icon fa fa-envelope"></i>
                        <span>যোগাযোগ করুন</span>
                    </a>
                </div>
            </div>
            
            <!-- Smart Business Plan -->
            <div class="plan-card smart" data-plan="smart-business">
                <div class="plan-badge smart-badge">বিজনেস অপশন-৩</div>
                <div class="plan-header">
                    <div class="plan-icon">
                        <i class="plan-icon-svg fa fa-briefcase"></i>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="plan-name">স্মার্ট বিজনেস-৩</h3>
                    <div class="plan-tagline">বড় কোম্পানি ও ই-কমার্সের জন্য প্রিমিয়াম সার্ভিস</div>
                </div>
                
                <div class="plan-pricing">
                    <div class="price-wrapper">
                        <span class="price-currency">৳</span>
                        <span class="price-amount">12,000</span>
                        <span class="price-period">/ বার্ষিক</span>
                    </div>
                    <div class="price-details">
                        <span class="original-price">৳ 16,000</span>
                        <span class="discount-badge">২০% ছাড়</span>
                    </div>
                </div>
                
                <div class="plan-features">
                    <div class="features-header">
                        <i class="features-icon fa fa-list"></i>
                        <h4>মূল সুবিধাসমূহ</h4>
                    </div>
                    <ul class="features-list">
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">আনলিমিটেড ডিস্ক স্পেস</span>
                            <div class="feature-tooltip">বৃহৎ স্টোরেজ প্রয়োজন হলে উপযুক্ত।</div>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-check-circle"></i>
                            <span class="feature-text">আনলিমিটেড ব্যান্ডউইথ (মাসিক)</span>
                            <div class="feature-progress" style="width: 100%"></div>
                        </li>
                        <li class="feature-item unlimited">
                            <i class="feature-check fa fa-infinity"></i>
                            <span class="feature-text">আনলিমিটেড সাবডোমেইন</span>
                        </li>
                        <li class="feature-item unlimited">
                            <i class="feature-check fa fa-infinity"></i>
                            <span class="feature-text">আনলিমিটেড ইমেইল অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item unlimited">
                            <i class="feature-check fa fa-infinity"></i>
                            <span class="feature-text">আনলিমিটেড FTP অ্যাকাউন্ট</span>
                        </li>
                        <li class="feature-item unlimited">
                            <i class="feature-check fa fa-infinity"></i>
                            <span class="feature-text">আনলিমিটেড MySQL ডাটাবেস</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-shield-alt"></i>
                            <span class="feature-text">ফ্রি SSL সার্টিফিকেট</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-clock"></i>
                            <span class="feature-text">৯৯.৯৯% আপটাইম গ্যারান্টি</span>
                        </li>
                        <li class="feature-item">
                            <i class="feature-check fa fa-cog"></i>
                            <span class="feature-text">cPanel কন্ট্রোল প্যানেল</span>
                        </li>
                        <li class="feature-item highlight">
                            <i class="feature-check fa fa-headset"></i>
                            <span class="feature-text">২৪/৭ প্রিমিয়াম সাপোর্ট</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-database"></i>
                            <span class="feature-text">অটো ব্যাকআপ</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-lock"></i>
                            <span class="feature-text">উন্নত নিরাপত্তা</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-cloud"></i>
                            <span class="feature-text">CDN অন্তর্ভুক্ত</span>
                        </li>
                        <li class="feature-item smart-feature">
                            <i class="feature-check fa fa-star"></i>
                            <span class="feature-text">প্রায়োরিটি সাপোর্ট</span>
                        </li>
                    </ul>
                </div>
                
                <div class="plan-actions">
                    <button class="btn-plan-select smart" data-plan="smart-business">
                        <i class="btn-icon fa fa-shopping-cart"></i>
                        <span>এখন অর্ডার করুন</span>
                        <div class="btn-sparkle"></div>
                    </button>
                    <a href="{{ route('contact') }}" class="btn-plan-contact">
                        <i class="btn-icon fa fa-envelope"></i>
                        <span>যোগাযোগ করুন</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Comparison -->
<section class="features-comparison">
    <div class="container">
        <div class="comparison-header">
            <h2 class="comparison-title">প্যাকেজ তুলনা</h2>
            <p class="comparison-subtitle">সহজ তুলনা দেখুন — কোন প্ল্যান আপনার প্রয়োজজনের সাথে সবচেয়ে মানানসই তা সহজেই যাচাই করুন।</p>
        </div>
        
        <div class="comparison-tabs">
            <div class="tabs-header">
                <button class="tab-btn active" data-tab="basic">বেসিক প্ল্যান</button>
                <button class="tab-btn" data-tab="smart">স্মার্ট প্ল্যান</button>
                <div class="tab-indicator"></div>
            </div>
            
            <div class="tabs-content">
                <div class="tab-pane active" id="tab-basic">
                    <div class="comparison-grid">
                        <div class="comparison-row header">
                            <div class="col-feature">বৈশিষ্ট্য</div>
                            <div class="col-plan">Start Up</div>
                            <div class="col-plan">Basic</div>
                            <div class="col-plan">Standard</div>
                        </div>
                        
                        <div class="comparison-row">
                            <div class="col-feature">ডিস্ক স্পেস</div>
                            <div class="col-plan">৫০০ MB</div>
                            <div class="col-plan">১ GB</div>
                            <div class="col-plan">২ GB</div>
                        </div>
                        
                        <div class="comparison-row">
                            <div class="col-feature">মাসিক ব্যান্ডউইথ</div>
                            <div class="col-plan">২ GB</div>
                            <div class="col-plan">৫ GB</div>
                            <div class="col-plan">১০ GB</div>
                        </div>
                        
                        <div class="comparison-row">
                            <div class="col-feature">সাবডোমেইন</div>
                            <div class="col-plan">২</div>
                            <div class="col-plan">১০</div>
                            <div class="col-plan">১০</div>
                        </div>
                        
                        <div class="comparison-row">
                            <div class="col-feature">ইমেইল অ্যাকাউন্ট</div>
                            <div class="col-plan">৫</div>
                            <div class="col-plan">১০</div>
                            <div class="col-plan">১০</div>
                        </div>
                        
                        <div class="comparison-row">
                            <div class="col-feature">মূল্য (প্রতি বছর)</div>
                            <div class="col-plan price">৳ 650</div>
                            <div class="col-plan price">৳ 1,200</div>
                            <div class="col-plan price">৳ 1,800</div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane" id="tab-smart">
                    <div class="comparison-grid">
                        <div class="comparison-row header">
                            <div class="col-feature">বৈশিষ্ট্য</div>
                            <div class="col-plan">Smart Basic</div>
                            <div class="col-plan">Smart Plus</div>
                            <div class="col-plan">Smart Pro</div>
                            <div class="col-plan">Smart Business</div>
                        </div>
                        
                        <div class="comparison-row">
                            <div class="col-feature">ডিস্ক স্পেস</div>
                            <div class="col-plan">৩ GB</div>
                            <div class="col-plan">৫ GB</div>
                            <div class="col-plan">১০ GB</div>
                            <div class="col-plan">২০ GB</div>
                        </div>
                        
                        <div class="comparison-row">
                            <div class="col-feature">মাসিক ব্যান্ডউইথ</div>
                            <div class="col-plan">১০ GB</div>
                            <div class="col-plan">২০ GB</div>
                            <div class="col-plan">৫০ GB</div>
                            <div class="col-plan">১০০ GB</div>
                        </div>
                        
                        <div class="comparison-row">
                            <div class="col-feature">সাবডোমেইন</div>
                            <div class="col-plan">১০</div>
                            <div class="col-plan">১৫</div>
                            <div class="col-plan">২০</div>
                            <div class="col-plan unlimited">Unlim.</div>
                        </div>
                        
                        <div class="comparison-row">
                            <div class="col-feature">ইমেইল অ্যাকাউন্ট</div>
                            <div class="col-plan">১০</div>
                            <div class="col-plan">১৫</div>
                            <div class="col-plan">২০</div>
                            <div class="col-plan unlimited">Unlim.</div>
                        </div>
                        
                        <div class="comparison-row">
                            <div class="col-feature">মূল্য (প্রতি বছর)</div>
                            <div class="col-plan price">৳ 2,500</div>
                            <div class="col-plan price">৳ 3,500</div>
                            <div class="col-plan price">৳ 5,000</div>
                            <div class="col-plan price">৳ 8,000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Support & Features -->
<section class="hosting-support">
    <div class="container">
        <div class="support-grid">
            <div class="support-card">
                <div class="support-icon fa fa-shield-alt"></div>
                <h3>উচ্চ মানের নিরাপত্তা</h3>
                <p>৯৯.৯৯% আপটাইম, বিনামূল্যে SSL এবং সার্ভার স্তরের নিরাপত্তা কনফিগারেশন।</p>
                <div class="support-glow"></div>
            </div>
            
            <div class="support-card">
                <div class="support-icon fa fa-headset"></div>
                <h3>প্রফেশনাল সাপোর্ট</h3>
                <p>টিকিট, চ্যাট ও কল—সমস্যা হলে আমরা ২৪/৭ আপনার পাশে আছি। দ্রুত সমাধান নিশ্চিত করা হয়।</p>
                <div class="support-glow"></div>
            </div>
            
            <div class="support-card">
                <div class="support-icon fa fa-sync"></div>
                <h3>অটো ব্যাকআপ</h3>
                <p>দৈনিক/সপ্তাহিক ব্যাকআপ অপশন — প্রয়োজন হলে দ্রুত পুনরুদ্ধার করা যাবে।</p>
                <div class="support-glow"></div>
            </div>
            
            <div class="support-card">
                <div class="support-icon fa fa-rocket"></div>
                <h3>দ্রুতগতির পারফরম্যান্স</h3>
                <p>SSD স্টোরেজ ও অপ্টিমাইজড সার্ভার কনফিগারেশনের মাধ্যমে দ্রুত লোডিং নিশ্চিত করা হয়।</p>
                <div class="support-glow"></div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="hosting-cta">
    <div class="container">
        <div class="cta-content">
            <div class="cta-icon fa fa-life-ring"></div>
            <h2 class="cta-title">আপনার সাইটকে নিরাপদ ও দ্রুত করুন</h2>
            <p class="cta-text">
                আজই যুক্ত হোন — বিশেষ ছাড় এবং প্রিমিয়াম সাপোর্ট সহ। আমাদের দল সাইট সেটআপ থেকে মেইনটেন্যান্স পর্যন্ত সবকিছু পরিচালনা করবে।
            </p>
            <div class="cta-buttons">
                <a href="{{ route('contact') }}" class="btn-cta-primary">
                    <i class="btn-icon fa fa-envelope"></i>
                    <span>নিয়োগ/সেবা চাওয়া</span>
                    <div class="btn-sparkle"></div>
                </a>
                <a href="tel:+8801915357699" class="btn-cta-secondary">
                    <i class="btn-icon fa fa-phone"></i>
                    <span>কল করুন: +8801915357699</span>
                </a>
            </div>
        </div>
    </div>
</section>



<script>
// Hosting Plans JavaScript
document.addEventListener('DOMContentLoaded', function() {
    initAnimations();
    initPlanSelection();
    initDomainSearch();
    initComparisonTabs();
    initScrollAnimations();
    initInteractiveFeatures();
});

// Initialize Animations
function initAnimations() {
    // Word reveal animation
    const titleWords = document.querySelectorAll('.title-word');
    titleWords.forEach((word, index) => {
        setTimeout(() => {
            word.style.animation = 'wordReveal 0.8s ease forwards';
        }, index * 200);
    });
    
    // Plan cards entrance animation
    const planCards = document.querySelectorAll('.plan-card');
    planCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(50px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 150);
    });
    
    // Feature items animation
    const featureItems = document.querySelectorAll('.feature-item');
    featureItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateX(-20px)';
        item.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
        
        setTimeout(() => {
            item.style.opacity = '1';
            item.style.transform = 'translateX(0)';
        }, index * 50 + 300);
    });
}

// Plan Selection
function initPlanSelection() {
    const planButtons = document.querySelectorAll('.btn-plan-select');
    
    planButtons.forEach(button => {
        button.addEventListener('click', function() {
            const plan = this.getAttribute('data-plan');
            const planCard = this.closest('.plan-card');
            const planName = planCard.querySelector('.plan-name').textContent;
            const planPrice = planCard.querySelector('.price-amount').textContent;
            
            // Add selection animation
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
            
            // Show selection confirmation
            showPlanConfirmation(planName, planPrice, plan);
        });
    });
}

function showPlanConfirmation(name, price, plan) {
    const modal = document.createElement('div');
    modal.className = 'plan-modal';
    modal.innerHTML = `
        <div class="modal-content">
            <div class="modal-header">
                <i class="modal-icon fa fa-check-circle"></i>
                <h3>প্যাকেজটি নির্বাচিত হয়েছে!</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <p>আপনি নির্বাচিত করেছেন <strong>${name}</strong>।</p>
                <p>মূল্য: <strong>৳${price} / বার্ষিক</strong></p>
                <div class="modal-actions">
                    <button class="btn-modal-contact" data-plan="${plan}">
                        <i class="btn-icon fa fa-envelope"></i>
                        <span>যোগাযোগ করে অর্ডার করুন</span>
                    </button>
                    <button class="btn-modal-close">
                        <span>বাতিল করুন</span>
                    </button>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    document.body.style.overflow = 'hidden';
    
    // Add modal styles
    const modalStyles = `
        .plan-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            animation: modalFadeIn 0.3s ease;
        }
        
        @keyframes modalFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .modal-content {
            background: white;
            border-radius: 20px;
            padding: 40px;
            max-width: 500px;
            width: 90%;
            animation: modalSlideIn 0.3s ease;
        }
        
        @keyframes modalSlideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        
        .modal-header h3 {
            font-size: 1.8rem;
            color: var(--dark-color);
            margin: 0;
        }
        
        .modal-icon {
            font-size: 3rem;
            color: var(--primary-color);
        }
        
        .modal-close {
            background: none;
            border: none;
            font-size: 2rem;
            color: #94a3b8;
            cursor: pointer;
            line-height: 1;
        }
        
        .modal-body {
            margin-bottom: 20px;
        }
        
        .modal-body p {
            font-size: 1.4rem;
            margin-bottom: 15px;
            color: #475569;
        }
        
        .modal-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn-modal-contact {
            flex: 1;
            background: var(--gradient-primary);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 10px;
            font-size: 1.4rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-modal-contact:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(67, 97, 238, 0.3);
        }
        
        .btn-modal-close {
            flex: 1;
            background: #f1f5f9;
            color: #475569;
            border: none;
            padding: 15px;
            border-radius: 10px;
            font-size: 1.4rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-modal-close:hover {
            background: #e2e8f0;
        }
    `;
    
    const styleSheet = document.createElement('style');
    styleSheet.textContent = modalStyles;
    document.head.appendChild(styleSheet);
    
    // Close modal
    const closeBtn = modal.querySelector('.modal-close');
    const closeModalBtn = modal.querySelector('.btn-modal-close');
    
    closeBtn.addEventListener('click', closeModal);
    closeModalBtn.addEventListener('click', closeModal);
    
    // Contact button
    const contactBtn = modal.querySelector('.btn-modal-contact');
    contactBtn.addEventListener('click', function() {
        const selectedPlan = this.getAttribute('data-plan');
        window.location.href = `{{ route('contact') }}?plan=${selectedPlan}`;
    });
    
    // Close on background click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });
    
    function closeModal() {
        modal.style.animation = 'modalFadeOut 0.3s ease';
        modal.querySelector('.modal-content').style.animation = 'modalSlideOut 0.3s ease';
        
        setTimeout(() => {
            document.body.removeChild(modal);
            document.body.style.overflow = '';
        }, 300);
        
        // Add fade out animation
        const fadeOutStyles = `
            @keyframes modalFadeOut {
                from { opacity: 1; }
                to { opacity: 0; }
            }
            
            @keyframes modalSlideOut {
                from { transform: translateY(0); opacity: 1; }
                to { transform: translateY(-50px); opacity: 0; }
            }
        `;
        
        styleSheet.textContent += fadeOutStyles;
    }
}

// Domain Search
function initDomainSearch() {
    const domainInput = document.querySelector('.domain-input');
    const checkButton = document.querySelector('.btn-check-domain');
    const suggestionTags = document.querySelectorAll('.suggestion-tag');
    const domainExt = document.querySelector('.domain-ext');
    
    // Check domain availability
    checkButton.addEventListener('click', function() {
        const domain = domainInput.value.trim();
        const extension = domainExt.value;
        
        if (!domain) {
            showDomainError('অনুগ্রহ করে একটি ডোমেইন নাম লিখুন।');
            return;
        }
        
        const fullDomain = domain + extension;
        checkDomainAvailability(fullDomain);
    });
    
    // Suggestion tags
    suggestionTags.forEach(tag => {
        tag.addEventListener('click', function() {
            const suggestedDomain = this.textContent;
            domainInput.value = suggestedDomain.split('.')[0];
            domainExt.value = '.' + suggestedDomain.split('.')[1];
            checkDomainAvailability(suggestedDomain);
        });
    });
    
    // Enter key support
    domainInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            checkButton.click();
        }
    });
}

function checkDomainAvailability(domain) {
    const checkButton = document.querySelector('.btn-check-domain');
    const originalContent = checkButton.innerHTML;
    
    // Show loading
    checkButton.innerHTML = '<span class="loading-spinner"></span>';
    checkButton.disabled = true;
    
    // Simulate API call
    setTimeout(() => {
        const isAvailable = Math.random() > 0.5;
        
        if (isAvailable) {
            showDomainAvailable(domain);
        } else {
            showDomainUnavailable(domain);
        }
        
        // Restore button
        checkButton.innerHTML = originalContent;
        checkButton.disabled = false;
    }, 1500);
}

function showDomainAvailable(domain) {
    const notification = document.createElement('div');
    notification.className = 'domain-notification available';
    notification.innerHTML = `
        <div class="notification-content">
            <i class="notification-icon fa fa-check-circle"></i>
            <div class="notification-text">
                <h4>ডোমেইন পাওয়া গেছে!</h4>
                <p><strong>${domain}</strong> উপলব্ধ আছে — এখনই রেজিস্টার করুন।</p>
            </div>
            <button class="notification-action" data-domain="${domain}">
                সরাসরি রেজিস্টার করুন
            </button>
        </div>
    `;
    
    document.querySelector('.domain-search-wrapper').appendChild(notification);
    
    // Remove after 5 seconds
    setTimeout(() => {
        notification.remove();
    }, 5000);
}

function showDomainUnavailable(domain) {
    const notification = document.createElement('div');
    notification.className = 'domain-notification unavailable';
    notification.innerHTML = `
        <div class="notification-content">
            <i class="notification-icon fa fa-times-circle"></i>
            <div class="notification-text">
                <h4>দুঃখিত, ডোমেইনটি নেওয়া আছে</h4>
                <p><strong>${domain}</strong> ইতোমধ্যে নেওয়া আছে — অনুগ্রহ করে অন্য নাম চেষ্টা করুন।</p>
            </div>
        </div>
    `;
    
    document.querySelector('.domain-search-wrapper').appendChild(notification);
    
    // Remove after 5 seconds
    setTimeout(() => {
        notification.remove();
    }, 5000);
}

function showDomainError(message) {
    const notification = document.createElement('div');
    notification.className = 'domain-notification error';
    notification.innerHTML = `
        <div class="notification-content">
            <i class="notification-icon fa fa-exclamation-triangle"></i>
            <div class="notification-text">
                <h4>ত্রুটি!</h4>
                <p>${message}</p>
            </div>
        </div>
    `;
    
    document.querySelector('.domain-search-wrapper').appendChild(notification);
    
    // Remove after 5 seconds
    setTimeout(() => {
        notification.remove();
    }, 5000);
}

// Comparison Tabs
function initComparisonTabs() {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabPanes = document.querySelectorAll('.tab-pane');
    const tabIndicator = document.querySelector('.tab-indicator');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            
            // Update active tab
            tabButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Update tab indicator position
            const buttonWidth = this.offsetWidth;
            const buttonLeft = this.offsetLeft;
            tabIndicator.style.width = `${buttonWidth}px`;
            tabIndicator.style.left = `${buttonLeft}px`;
            
            // Show selected tab pane
            tabPanes.forEach(pane => pane.classList.remove('active'));
            document.getElementById(`tab-${tabId}`).classList.add('active');
        });
    });
    
    // Initialize tab indicator position
    const activeTab = document.querySelector('.tab-btn.active');
    if (activeTab) {
        const buttonWidth = activeTab.offsetWidth;
        const buttonLeft = activeTab.offsetLeft;
        tabIndicator.style.width = `${buttonWidth}px`;
        tabIndicator.style.left = `${buttonLeft}px`;
    }
}

// Scroll Animations
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up');
            }
        });
    }, observerOptions);
    
    // Observe elements
    const animatedElements = document.querySelectorAll('.support-card, .comparison-row:not(.header)');
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        observer.observe(el);
    });
}

// Interactive Features
function initInteractiveFeatures() {
    // Feature tooltips
    const featureItems = document.querySelectorAll('.feature-item');
    featureItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            const tooltip = this.querySelector('.feature-tooltip');
            if (tooltip) {
                tooltip.style.opacity = '1';
                tooltip.style.visibility = 'visible';
                tooltip.style.top = '-50px';
            }
        });
        
        item.addEventListener('mouseleave', function() {
            const tooltip = this.querySelector('.feature-tooltip');
            if (tooltip) {
                tooltip.style.opacity = '0';
                tooltip.style.visibility = 'hidden';
                tooltip.style.top = '-40px';
            }
        });
    });
    
    // Plan card hover effects
    const planCards = document.querySelectorAll('.plan-card');
    planCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const iconGlow = this.querySelector('.icon-glow');
            if (iconGlow) {
                iconGlow.style.animation = 'iconPulse 0.5s ease-in-out';
            }
        });
    });
    
    // Add notification styles
    const notificationStyles = `
        .domain-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            animation: notificationSlideIn 0.3s ease;
            max-width: 400px;
        }
        
        @keyframes notificationSlideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        .domain-notification.available {
            border-left: 5px solid var(--success-color);
        }
        
        .domain-notification.unavailable {
            border-left: 5px solid var(--warning-color);
        }
        
        .domain-notification.error {
            border-left: 5px solid var(--danger-color);
        }
        
        .notification-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .notification-icon {
            font-size: 2rem;
            flex-shrink: 0;
        }
        
        .notification-text {
            flex: 1;
        }
        
        .notification-text h4 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--dark-color);
        }
        
        .notification-text p {
            font-size: 1.2rem;
            color: #64748b;
            margin: 0;
        }
        
        .notification-action {
            background: var(--gradient-primary);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .notification-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(67, 97, 238, 0.3);
        }
    `;
    
    const styleSheet = document.createElement('style');
    styleSheet.textContent = notificationStyles;
    document.head.appendChild(styleSheet);
}

// Window resize handler
let resizeTimer;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
        initComparisonTabs();
    }, 250);
});

// Smooth scrolling for anchor links
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

// Performance optimization
if ('requestIdleCallback' in window) {
    requestIdleCallback(() => {
        // Lazy load non-critical elements
        const lazyElements = document.querySelectorAll('.support-card, .comparison-row');
        lazyElements.forEach(el => {
            el.classList.add('lazy-load');
        });
    });
}

// Error handling
window.addEventListener('error', function(e) {
    console.error('Error occurred:', e.error);
    // You can add user-friendly error handling here
});

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    // Close modal on Escape
    if (e.key === 'Escape') {
        const modal = document.querySelector('.plan-modal');
        if (modal) {
            modal.querySelector('.modal-close')?.click();
        }
    }
    
    // Tab navigation for plan cards
    if (e.key === 'Tab') {
        document.querySelectorAll('.btn-plan-select').forEach(btn => {
            btn.addEventListener('focus', function() {
                this.style.outline = '3px solid var(--primary-color)';
                this.style.outlineOffset = '2px';
            });
            
            btn.addEventListener('blur', function() {
                this.style.outline = 'none';
            });
        });
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
@endsection
