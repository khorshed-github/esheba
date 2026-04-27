@extends('frontend.layouts.app')

@section('title', 'Portfolio - ' . ($settings->company_name ?? 'E-Sheba'))

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
    --font-bangla: 'Noto Sans Bengali', 'SolaimanLipi', 'Kalpurush', sans-serif;
}

/* Reset & Base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: var(--font-bangla), system-ui, -apple-system, sans-serif;
    background: var(--light-color);
    color: var(--dark-color);
    line-height: 1.6;
    overflow-x: hidden;
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
    opacity: 0.25;
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
    font-size: 1.6rem;
}

.breadcrumb-separator {
    color: rgba(255, 255, 255, 0.5);
    font-size: 1.6rem;
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
    position: relative;
    z-index: 2;
    color: white;
}

.title-container {
    position: relative;
    margin-bottom: 40px;
}

.main-title {
    font-size: 4.5rem;
    font-weight: 900;
    line-height: 1.1;
    text-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.title-line {
    display: block;
    margin-bottom: 10px;
}

.title-word {
    display: inline-block;
    opacity: 0;
    transform: translateY(30px);
    animation: wordReveal 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
}

.title-word.highlight {
    color: var(--accent-color);
}

.line-1 .title-word:nth-child(1) { animation-delay: 0.2s; }
.line-1 .title-word:nth-child(2) { animation-delay: 0.4s; }
.line-2 .title-word:nth-child(1) { animation-delay: 0.6s; }
.line-2 .title-word:nth-child(2) { animation-delay: 0.8s; }

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

/* Subtitle */
.subtitle-container {
    margin-bottom: 40px;
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
    color: #48b2f1;
    font-weight: 600;
    font-size: 1.7rem;
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

.company-name {
    font-size: 2rem;
    font-weight: 600;
    color: white;
    position: relative;
}

.company-name::before,
.company-name::after {
    content: '"';
    color: var(--accent-color);
    font-size: 2em;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

.company-name::before { left: -40px; }
.company-name::after  { right: -40px; }

@keyframes sparkleShimmer {
    0% { left: -100%; }
    100% { left: 100%; }
}

/* Hero Description */
.hero-description {
    max-width: 100%;
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
    font-size: 1.72rem;
    line-height: 1.8;
    opacity: 0.95;
    text-align: center;
}

.description-shine {
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
    animation: descriptionShine 3s infinite linear;
}

@keyframes descriptionShine {
    0% { left: -100%; }
    100% { left: 100%; }
}

@keyframes iconFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* Hero Separator */
.hero-separator {
    position: relative;
    width: 300px;
    margin: 0 auto;
}

.separator-line {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
    transform: translateY(-50%);
}

.separator-icon {
    position: relative;
    width: 60px;
    height: 60px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.separator-symbol {
    font-size: 1.5rem;
    color: var(--primary-color);
    z-index: 2;
}

.icon-ring {
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    border: 2px solid var(--accent-color);
    border-radius: 50%;
    animation: ringRotate 3s linear infinite;
}

@keyframes ringRotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Portfolio Intro Section */
.portfolio-intro-section {
    padding: 100px 0;
    background: white;
}

/* Intro Card */
.intro-content { height: 100%; }

.intro-card {
    background: white;
    border-radius: 25px;
    padding: 40px;
    box-shadow: var(--shadow-lg);
    height: 100%;
    position: relative;
    overflow: hidden;
    border: 1px solid #f1f5f9;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.intro-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
}

.intro-header { margin-bottom: 30px; }

.intro-icon { font-size: 3rem; margin-bottom: 20px; display: block; animation: iconBounce 2s infinite ease-in-out; }

@keyframes iconBounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.intro-title { font-size: 2rem; font-weight: 800; color: var(--dark-color); margin-bottom: 10px; }
.intro-text { font-size: 1.5rem; line-height: 1.8; color: #64748b; margin-bottom: 30px; }

.intro-stats { display: flex; gap: 20px; margin-top: 30px; }

.stat { text-align: center; flex: 1; }
.stat-number { font-size: 2.5rem; font-weight: 800; color: var(--primary-color); margin-bottom: 5px; }
.stat-label { font-size: 1.6rem; color: #64748b; font-weight: 600; }

/* Intro Image */
.intro-image { position: relative; }

.image-frame {
    position: relative;
    border-radius: 25px;
    overflow: hidden;
    box-shadow: var(--shadow-xl);
}

.frame-border { position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 2; }

.border-animation {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 3px solid transparent;
    border-radius: 25px;
    background: linear-gradient(45deg, #667eea, #764ba2, #ff6b6b, #4ecdc4) border-box;
    mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
    mask-composite: exclude;
    animation: borderFlow 3s linear infinite;
}

@keyframes borderFlow {
    0% { background-position: 0% 50%; }
    100% { background-position: 400% 50%; }
}

.image-content { width: 100%; height: 400px; object-fit: cover; display: block; transition: transform 0.5s ease; }
.image-frame:hover .image-content { transform: scale(1.05); }

.image-overlay {
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

.image-frame:hover .image-overlay { opacity: 1; }

.btn-view-image {
    background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 25px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.btn-view-image:hover { transform: scale(1.1); }

.image-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    padding: 8px 20px;
    border-radius: 20px;
    font-weight: 600;
    color: var(--dark-color);
    box-shadow: var(--shadow-md);
}

.badge-glow { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: inherit; border-radius: 20px; animation: badgePulse 2s infinite ease-in-out; }

@keyframes badgePulse {
    0%, 100% { opacity: 0.5; transform: scale(1); }
    50% { opacity: 0.8; transform: scale(1.05); }
}

/* Client Testimonials */
.client-testimonials { margin-top: 30px; }
.testimonial-slider { position: relative; }
.testimonial { background: #f8fafc; border-radius: 20px; padding: 25px; position: relative; }
.testimonial-content p { font-style: italic; color: #475569; line-height: 1.8; margin-bottom: 20px; }
.testimonial-author { display: flex; align-items: center; gap: 15px; }
.author-name { font-weight: 700; color: var(--dark-color); margin-bottom: 5px; }
.author-company { font-size: 1.6rem; color: #64748b; }

/* Stats Display */
.stats-display { height: 100%; }
.stats-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; height: 100%; }
.stat-card { background: white; border-radius: 20px; padding: 25px; box-shadow: var(--shadow-md); transition: all 0.3s ease; border: 2px solid transparent; }
.stat-card:hover { border-color: var(--primary-color); transform: translateY(-5px); box-shadow: var(--shadow-lg); }
.stat-card .stat-icon { font-size: 2.5rem; margin-bottom: 15px; display: block; }
.stat-card .stat-content { margin-bottom: 15px; }
.stat-card .stat-number { font-size: 2.5rem; font-weight: 800; color: var(--primary-color); line-height: 1; margin-bottom: 5px; }
.stat-card .stat-title { font-size: 1.6rem; color: #64748b; font-weight: 600; }
.stat-progress { height: 6px; background: #e2e8f0; border-radius: 3px; overflow: hidden; }
.stat-card .progress-bar { height: 100%; background: linear-gradient(90deg, var(--primary-color), var(--accent-color)); border-radius: 3px; animation: progressFill 2s ease-out forwards; }
@keyframes progressFill { from { width: 0; } }

/* Portfolio Gallery Section */
.portfolio-gallery-section {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

/* Gallery Header */
.gallery-header { text-align: center; margin-bottom: 60px; }
.gallery-title { font-size: 3rem; font-weight: 800; color: var(--dark-color); margin-bottom: 20px; position: relative; display: inline-block; }
.title-underline { position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); width: 100px; height: 4px; background: var(--gradient-primary); border-radius: 2px; animation: underlineExpand 1s ease forwards; }
@keyframes underlineExpand { to { width: 200px; } }
.gallery-subtitle { text-align: center; font-size: 1.6rem; color: #64748b; max-width: 600px; margin: 0 auto; line-height: 1.6; }

/* Filter Controls */
.filter-controls { background: white; border-radius: 25px; padding: 30px; margin-bottom: 50px; box-shadow: var(--shadow-md); }
.filter-tabs { display: flex; gap: 15px; margin-bottom: 30px; flex-wrap: wrap; justify-content: center; }
.filter-tab {
    background: none;
    border: none;
    padding: 12px 25px;
    border-radius: 50px;
    font-size: 1.6rem;
    font-weight: 600;
    color: #64748b;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
    position: relative;
    transition: all 0.3s ease;
}
.filter-tab:hover { color: var(--primary-color); background: #f8fafc; }
.filter-tab.active { background: var(--gradient-primary); color: white; box-shadow: 0 10px 25px rgba(67, 97, 238, 0.3); }
.tab-icon { font-size: 1.6rem; }
.tab-indicator { position: absolute; bottom: -5px; left: 50%; transform: translateX(-50%); width: 0; height: 3px; background: var(--primary-color); border-radius: 2px; transition: width 0.3s ease; }
.filter-tab.active .tab-indicator { width: 40px; }

.filter-search { max-width: 400px; margin: 0 auto; }
.search-box { position: relative; }
.search-icon { position: absolute; left: 20px; top: 50%; transform: translateY(-50%); font-size: 1.6rem; color: #64748b; }
.search-input {
    width: 100%;
    padding: 18px 20px 18px 50px;
    border: 2px solid #e2e8f0;
    border-radius: 15px;
    font-size: 1.6rem;
    font-family: var(--font-bangla);
    background: white;
    transition: all 0.3s ease;
}
.search-input:focus { outline: none; border-color: var(--primary-color); box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1); }
.search-underline { position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 0; height: 2px; background: var(--primary-color); transition: width 0.3s ease; }
.search-input:focus ~ .search-underline { width: 100%; }

/* Portfolio Grid */
.portfolio-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px; margin-bottom: 60px; }
.portfolio-item { opacity: 0; transform: translateY(50px); animation: itemEntrance 0.6s ease forwards; }
@keyframes itemEntrance { to { opacity: 1; transform: translateY(0); } }

/* Project Card */
.project-card { background: white; border-radius: 25px; overflow: hidden; box-shadow: var(--shadow-md); transition: all 0.3s ease; position: relative; height: 100%; border: 1px solid #f1f5f9; }
.project-card:hover { transform: translateY(-15px); box-shadow: var(--shadow-xl); }

.project-image { position: relative; height: 250px; overflow: hidden; }
.image-container { position: relative; width: 100%; height: 100%; }
.project-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
.project-card:hover .project-img { transform: scale(1.1); }

.image-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.8); display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity 0.3s ease; }
.project-card:hover .image-overlay { opacity: 1; }

.overlay-buttons { display: flex; gap: 15px; }
.btn-live-view, .btn-project-details {
    padding: 12px 25px;
    border-radius: 25px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.btn-live-view { background: var(--gradient-primary); color: white; border: none; text-decoration: none; }
.btn-project-details { background: rgba(255, 255, 255, 0.2); color: white; border: 1px solid rgba(255, 255, 255, 0.3); }
.btn-live-view:hover, .btn-project-details:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); }

.project-badge { position: absolute; top: 20px; right: 20px; width: 40px; height: 40px; background: var(--gradient-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4); }
.badge-number { position: relative; z-index: 2; }

/* Project Info */
.project-info { padding: 25px; }
.project-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
.category-badge { background: #f1f5f9; color: var(--primary-color); padding: 6px 15px; border-radius: 20px; font-size: 1.25rem; font-weight: 600; }
.btn-project-like { background: none; border: none; color: #94a3b8; cursor: pointer; display: flex; align-items: center; gap: 5px; font-size: 1.6rem; transition: color 0.3s ease; }
.btn-project-like:hover { color: var(--danger-color); }
.like-count { font-size: 1.6rem; font-weight: 600; }

.project-body { margin-bottom: 25px; }
.project-title { font-size: 1.5rem; font-weight: 700; color: var(--dark-color); margin-bottom: 15px; line-height: 1.4; }
.project-description { color: #64748b; line-height: 1.6; margin-bottom: 20px; font-size: 1.35rem; }

.project-meta { display: flex; gap: 20px; margin-bottom: 20px; }
.meta-item { display: flex; align-items: center; gap: 8px; color: #64748b; font-size: 1.6rem; }
.meta-icon { font-size: 1.6rem; }

/* Tech Stack */
.tech-stack { margin-bottom: 20px; }
.stack-title { font-size: 1.6rem; font-weight: 600; color: var(--dark-color); margin-bottom: 10px; }
.stack-tags { display: flex; gap: 8px; flex-wrap: wrap; }
.tech-tag { background: #f1f5f9; color: #475569; padding: 6px 12px; border-radius: 15px; font-size: 1.2rem; font-weight: 500; transition: all 0.3s ease; }
.tech-tag:hover { background: var(--primary-color); color: white; transform: translateY(-2px); }

/* Project Footer */
.project-footer { display: flex; justify-content: space-between; align-items: center; padding-top: 20px; border-top: 1px solid #f1f5f9; }
.project-status { display: flex; align-items: center; gap: 8px; }
.status-indicator { width: 10px; height: 10px; background: var(--success-color); border-radius: 50%; animation: statusPulse 2s infinite ease-in-out; }
@keyframes statusPulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }
.status-text { font-size: 1.6rem; color: var(--success-color); font-weight: 600; }
.btn-visit-site { background: none; border: none; color: var(--primary-color); font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 8px; cursor: pointer; transition: all 0.3s ease; }
.btn-visit-site:hover { color: var(--secondary-color); transform: translateX(5px); }

/* Card Effects */
.card-effects { position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; }
.effect-glow { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 80%; height: 80%; background: radial-gradient(circle, rgba(67, 97, 238, 0.1), transparent); filter: blur(20px); opacity: 0; transition: opacity 0.6s ease; }
.project-card:hover .effect-glow { opacity: 1; }
.effect-border { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
.border-line { position: absolute; background: linear-gradient(45deg, #667eea, #764ba2, #ff6b6b, #4ecdc4); opacity: 0; transition: opacity 0.6s ease; }
.line-1 { top: 0; left: 0; width: 100%; height: 3px; }
.line-2 { top: 0; right: 0; width: 3px; height: 100%; }
.line-3 { bottom: 0; right: 0; width: 100%; height: 3px; }
.line-4 { bottom: 0; left: 0; width: 3px; height: 100%; }
.project-card:hover .border-line { opacity: 1; animation: borderFlow 3s linear infinite; }

/* Empty Portfolio */
.empty-portfolio { grid-column: 1 / -1; padding: 80px 20px; text-align: center; }
.empty-content { max-width: 500px; margin: 0 auto; }
.empty-animation { margin-bottom: 40px; }
.empty-icon { position: relative; width: 150px; height: 150px; margin: 0 auto 30px; }
.icon-circle { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); }
.circle-pulse { position: absolute; top: -20px; left: -20px; right: -20px; bottom: -20px; border: 3px dashed var(--primary-color); border-radius: 50%; animation: circleSpin 10s linear infinite; }
.circle-inner { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 80px; height: 80px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-md); }
@keyframes circleSpin { from { transform: translate(-50%, -50%) rotate(0deg); } to { transform: translate(-50%, -50%) rotate(360deg); } }
.empty-symbol { font-size: 2.5rem; color: #94a3b8; }
.empty-text h3 { font-size: 2rem; color: var(--dark-color); margin-bottom: 15px; font-weight: 800; }
.empty-text p { color: #64748b; font-size: 1.5rem; margin-bottom: 30px; }
.btn-notify-me { background: var(--gradient-primary); color: white; border: none; padding: 15px 30px; border-radius: 25px; font-size: 1.6rem; font-weight: 600; display: flex; align-items: center; gap: 10px; margin: 0 auto; cursor: pointer; transition: all 0.3s ease; }
.btn-notify-me:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(67, 97, 238, 0.3); }

/* Load More Section */
.load-more-section { text-align: center; margin-top: 60px; }
.btn-load-more { background: var(--gradient-primary); color: white; border: none; padding: 18px 40px; border-radius: 25px; font-size: 1.5rem; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 15px; position: relative; overflow: hidden; transition: all 0.3s ease; margin-bottom: 30px; }
.btn-load-more:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(67, 97, 238, 0.3); padding-right: 50px; }
.btn-loader { display: flex; gap: 4px; opacity: 0; transition: opacity 0.3s ease; }
.btn-load-more:hover .btn-loader { opacity: 1; }
.loader-dot { width: 8px; height: 8px; background: white; border-radius: 50%; animation: loaderBounce 1.4s infinite ease-in-out; }
.loader-dot:nth-child(1) { animation-delay: -0.32s; }
.loader-dot:nth-child(2) { animation-delay: -0.16s; }
@keyframes loaderBounce { 0%, 80%, 100% { transform: scale(0); } 40% { transform: scale(1); } }
.btn-shine { position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: linear-gradient( to right, transparent 20%, rgba(255, 255, 255, 0.3) 50%, transparent 80% ); transform: rotate(30deg); animation: buttonShine 3s infinite linear; }
@keyframes buttonShine { 0% { left: -100%; } 100% { left: 100%; } }
.project-counter { font-size: 1.6rem; color: #64748b; }
.counter-number { font-weight: 700; color: var(--primary-color); margin-left: 5px; }

/* CTA Section */
.portfolio-cta { padding: 100px 0; background: var(--gradient-primary); text-align: center; color: white; position: relative; overflow: hidden; }
.cta-content { position: relative; z-index: 2; max-width: 800px; margin: 0 auto; }
.cta-icon { font-size: 4rem; margin-bottom: 30px; animation: ctaIconFloat 3s infinite ease-in-out; }
@keyframes ctaIconFloat { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-20px); } }
.cta-title { font-size: 3rem; font-weight: 800; margin-bottom: 20px; text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); color: white; }
.cta-text { font-size: 1.6rem; opacity: 0.9; margin-bottom: 40px; line-height: 1.8; text-align: center; }
.cta-buttons { display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; }
.btn-cta-primary, .btn-cta-secondary, .btn-cta-tertiary { padding: 18px 35px; border-radius: 25px; font-size: 1.5rem; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 12px; transition: all 0.3s ease; position: relative; overflow: hidden; }
.btn-cta-primary { background: white; color: var(--primary-color); }
.btn-cta-secondary { background: transparent; color: white; border: 2px solid rgba(255, 255, 255, 0.3); }
.btn-cta-tertiary { background: #25D366; color: white; border: none; }
.btn-cta-primary:hover, .btn-cta-secondary:hover, .btn-cta-tertiary:hover { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2); }
.btn-cta-primary:hover { color: white; background: var(--primary-color); }
.btn-cta-secondary:hover { background: rgba(255, 255, 255, 0.1); border-color: white; }
.btn-cta-tertiary:hover { background: #128C7E; }
.btn-sparkle { position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; }
.btn-sparkle::before, .btn-sparkle::after { content: ''; position: absolute; width: 10px; height: 10px; background: white; border-radius: 50%; opacity: 0; animation: sparkle 2s infinite linear; }
.btn-sparkle::before { top: 20%; left: 20%; animation-delay: 0s; }
.btn-sparkle::after { top: 60%; left: 70%; animation-delay: 1s; }
@keyframes sparkle { 0% { opacity: 0; transform: scale(0); } 50% { opacity: 1; transform: scale(1); } 100% { opacity: 0; transform: scale(0); } }

/* Responsive Design */
@media (max-width: 1200px) {
    .main-title { font-size: 3.5rem; }
    .gallery-title { font-size: 2.5rem; }
    .portfolio-grid { grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); }
}

@media (max-width: 992px) {
    .portfolio-hero { padding: 120px 0 60px; min-height: auto; }
    .main-title { font-size: 2.8rem; }
    .stats-grid { grid-template-columns: 1fr; }
    .intro-stats { flex-direction: column; gap: 15px; }
    .filter-tabs { flex-direction: column; align-items: center; }
    .filter-tab { width: 100%; max-width: 300px; justify-content: center; }
    .cta-title { font-size: 2.5rem; }
}

@media (max-width: 768px) {
    .main-title { font-size: 2.2rem; }
    .company-name { font-size: 1.5rem; }
    .portfolio-grid { grid-template-columns: 1fr; }
    .overlay-buttons { flex-direction: column; gap: 10px; }
    .btn-live-view, .btn-project-details { justify-content: center; }
    .project-meta { flex-direction: column; gap: 10px; }
    .cta-buttons { flex-direction: column; align-items: center; }
    .btn-cta-primary, .btn-cta-secondary, .btn-cta-tertiary { width: 100%; max-width: 300px; justify-content: center; }
    .breadcrumb-trail { flex-direction: column; align-items: flex-start; gap: 5px; }
    .breadcrumb-separator { display: none; }
}

@media (max-width: 576px) {
    .main-title { font-size: 1.8rem; }
    .intro-card { padding: 25px; }
    .gallery-title { font-size: 2rem; }
    .project-card { margin: 0 10px; }
    .cta-title { font-size: 2rem; }
    .cta-text { font-size: 1.6rem; }
}

/* Animation Classes */
.fade-in { opacity: 0; animation: fadeIn 0.6s ease forwards; }
@keyframes fadeIn { to { opacity: 1; } }
.slide-up { opacity: 0; transform: translateY(30px); animation: slideUp 0.6s ease forwards; }
@keyframes slideUp { to { opacity: 1; transform: translateY(0); } }

/* Smooth Scroll */
html { scroll-behavior: smooth; }

/* Print Styles */
@media print {
    .portfolio-hero, .filter-controls, .btn-load-more, .portfolio-cta { display: none !important; }
    .project-card { break-inside: avoid; box-shadow: none !important; border: 1px solid #ddd !important; }
}
</style>
@endsection

@section('content')
<!-- Modern Portfolio Section -->
<section class="modern-portfolio-section">
    <!-- Hero Section -->
    <div class="portfolio-hero">
        <!-- Animated Background -->
        <div class="hero-background">
            <div class="bg-shape shape-1"></div>
            <div class="bg-shape shape-2"></div>
            <div class="bg-shape shape-3"></div>
            <div class="bg-shape shape-4"></div>
            <div class="floating-elements">
                <div class="float-element el-1">পোর্টফোলিও</div>
                <div class="float-element el-2">প্রজেক্ট</div>
                <div class="float-element el-3">ডিজাইন</div>
                <div class="float-element el-4">ওয়েব</div>
            </div>
        </div>

        <!-- Modern Breadcrumb -->
        <div class="modern-breadcrumb">
            <div class="container">
                <nav class="breadcrumb-nav">
                    <div class="breadcrumb-trail">
                        <a href="{{ url('/') }}" class="breadcrumb-item">
                            <i class="breadcrumb-icon fa fa-home"></i>
                            <span class="breadcrumb-text">{{ $settings->company_name ?? 'E-SHEBA' }}</span>
                        </a>
                        <div class="breadcrumb-separator">/</div>
                        <div class="breadcrumb-item active">
                            <i class="breadcrumb-icon fa fa-folder-open"></i>
                            <span class="breadcrumb-text">পোর্টফোলিও</span>
                        </div>
                    </div>
                    <div class="breadcrumb-progress">
                        <div class="progress-bar"></div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Hero Content -->
        <div class="container hero-content">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-10 text-center">
                    <!-- Subtitle -->
                    <div class="subtitle-container">
                        <div class="company-badge">
                            <span class="badge-text">আমাদের কাজ</span>
                            <div class="badge-sparkle"></div>
                        </div>
                    </div>

                    <!-- Hero Description -->
                    <div class="hero-description">
                        <div class="description-card">
                            <div class="description-icon fa fa-briefcase"></div>
                            <p class="description-text">
                                {{ $settings->company_name ?? 'E-SHEBA' }}-এর বাছাই করা সফল প্রজেক্ট সমূহ এখানে দেখুন — ওয়েবসাইট ডেভেলপমেন্ট, ই-কমার্স, UI/UX ডিজাইন এবং মোবাইল অ্যাপ্লিকেশন সহ সম্পূর্ণ সমাধান। প্রতিটি কাজের যৌক্তিক পদ্ধতি, প্রযুক্তি স্ট্যাক ও ফলাফল সংক্ষেপে প্রদর্শিত আছে।
                            </p>
                            <div class="description-shine"></div>
                        </div>
                    </div>

                    <!-- Hero Separator -->
                    <div class="hero-separator">
                        <div class="separator-line"></div>
                        <div class="separator-icon">
                            <i class="separator-symbol fa fa-star"></i>
                            <div class="icon-ring"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Intro -->
    <div class="portfolio-intro-section">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Intro Text -->
                <div class="col-lg-6">
                    <div class="intro-content" data-aos="fade-right">
                        <div class="intro-card">
                            <div class="intro-header">
                                <div class="intro-icon fa fa-lightbulb"></div>
                                <h3 class="intro-title">সম্পন্ন প্রজেক্ট ও সাফল্য</h3>
                            </div>
                            <div class="intro-body">
                                <p class="intro-text">
                                    আমরা {{ $settings->company_name ?? 'E-SHEBA' }} হিসাবে ক্লায়েন্ট-ফোকাসড ডিজাইন ও ডেভেলপমেন্টে বিশ্বাস করি। প্রতিটি প্রজেক্টে লক্ষ্য নির্ধারণ, পরিকল্পনা ও কার্যকর বাস্তবায়ন নিশ্চিত করা হয় — ফলশ্রুতিতে ক্লায়েন্টদের ব্যবসায় মুল্যৃ বৃদ্ধি ও ব্যবহারকারীর সন্তুষ্টি দেখা যায়।
                                </p>
                                <div class="intro-stats">
                                    <div class="stat">
                                        <div class="stat-number" data-count="100">0</div>
                                        <div class="stat-label">সম্পন্ন প্রকল্প</div>
                                    </div>
                                    <div class="stat">
                                        <div class="stat-number" data-count="50">0</div>
                                        <div class="stat-label">সন্তুষ্ট ক্লায়েন্ট</div>
                                    </div>
                                    <div class="stat">
                                        <div class="stat-number" data-count="95">0</div>
                                        <div class="stat-label">প্রকল্প সফলতার হার (%)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Intro Image -->
                <div class="col-lg-6">
                    <div class="intro-image" data-aos="fade-left">
                        <div class="image-frame">
                            <div class="frame-border">
                                <div class="border-animation"></div>
                            </div>
                            <img src="{{ asset('assets/images/portfolio/e-sheba-success-project.jpg') }}" 
                                 alt="E-Sheba Success Project" 
                                 class="image-content">
                            <div class="image-overlay">
                                <div class="overlay-content">
                                    <button class="btn-view-image">
                                        <i class="view-icon fa fa-eye"></i>
                                        <span>প্রজেক্ট দেখুন</span>
                                    </button>
                                </div>
                            </div>
                            <div class="image-badge">
                                <span class="badge-text">Featured Project</span>
                                <div class="badge-glow"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Intro Row -->
            <div class="row g-5 align-items-center mt-5">
                <!-- Second Image -->
                <div class="col-lg-6 order-lg-2">
                    <div class="intro-content" data-aos="fade-left">
                        <div class="intro-card">
                            <div class="intro-header">
                                <div class="intro-icon fa fa-rocket"></div>
                                <h3 class="intro-title">উন্নত প্রযুক্তি ও দ্রুত ডেলিভারি</h3>
                            </div>
                            <div class="intro-body">
                                <p class="intro-text">
                                    আমরা আধুনিক স্ট্যাক ব্যবহার করে দ্রুত এবং স্কেলেবল সলিউশন ডেলিভারি করি। প্রতিটি প্রজেক্টে কাস্টমাইজড আর্কিটেকচার, পরীক্ষিত কোড ও ব্যবহারকারী কনসেন্ট্রিক ডিজাইন বজায় রাখা হয় যাতে ব্যবসায়িক লক্ষ্য দ্রুত পূরণ হয়।
                                </p>
                                <div class="client-testimonials">
                                    <div class="testimonial-slider">
                                        <div class="testimonial">
                                            <div class="testimonial-content">
                                                <p>"দলের কাজ অত্যন্ত পেশাদার। দ্রুত সমাধান, স্পষ্ট যোগাযোগ এবং চমৎকার ফলাফল!"</p>
                                            </div>
                                            <div class="testimonial-author">
                                                <div class="author-info">
                                                    <div class="author-name">সরওয়ার হোসাইন </div>
                                                    <div class="author-company">CEO, GlobalSource</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Display -->
                <div class="col-lg-6 order-lg-1">
                    <div class="intro-image" data-aos="fade-right">
                        <div class="stats-display">
                            <div class="stats-grid">
                                <div class="stat-card">
                                    <div class="stat-icon fa fa-project-diagram"></div>
                                    <div class="stat-content">
                                        <div class="stat-number" data-count="24">0</div>
                                        <div class="stat-title">চলমান প্রজেক্ট</div>
                                    </div>
                                    <div class="stat-progress">
                                        <div class="progress-bar" style="width: 60%"></div>
                                    </div>
                                </div>
                                <div class="stat-card">
                                    <div class="stat-icon fa fa-users"></div>
                                    <div class="stat-content">
                                        <div class="stat-number" data-count="99">0</div>
                                        <div class="stat-title">ক্লায়েন্ট সন্তুষ্টি (%)</div>
                                    </div>
                                    <div class="stat-progress">
                                        <div class="progress-bar" style="width: 99%"></div>
                                    </div>
                                </div>
                                <div class="stat-card">
                                    <div class="stat-icon fa fa-check-circle"></div>
                                    <div class="stat-content">
                                        <div class="stat-number" data-count="100">0</div>
                                        <div class="stat-title">গুণগত মান নিশ্চিত</div>
                                    </div>
                                    <div class="stat-progress">
                                        <div class="progress-bar" style="width: 100%"></div>
                                    </div>
                                </div>
                                <div class="stat-card">
                                    <div class="stat-icon fa fa-globe"></div>
                                    <div class="stat-content">
                                        <div class="stat-number" data-count="50">0</div>
                                        <div class="stat-title">দেশ-বিদেশে ক্লায়েন্ট</div>
                                    </div>
                                    <div class="stat-progress">
                                        <div class="progress-bar" style="width: 50%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Portfolio Gallery -->
    <div class="portfolio-gallery-section">
        <div class="container">
            <!-- Gallery Header -->
            <div class="gallery-header" data-aos="fade-up">
                <div class="header-content">
                    <h2 class="gallery-title">
                        <span class="title-text">চূড়ান্ত প্রজেক্ট সংগ্রহ</span>
                        <div class="title-underline"></div>
                    </h2>
                    <p class="gallery-subtitle">
                        আমাদের সাম্প্রতিক কাজগুলো দেখুন — প্রতিটি আইটেমে প্রযুক্তি, ভূমিকা ও ফলাফল সংক্ষেপে দেওয়া আছে।
                    </p>
                </div>
            </div>

            <!-- Filter Controls -->
            <div class="filter-controls" data-aos="fade-up" data-aos-delay="100">
                <div class="filter-tabs">
                    <button class="filter-tab active" data-filter="all">
                        <i class="tab-icon fa fa-th-large"></i>
                        <span class="tab-text">সব প্রজেক্ট</span>
                        <div class="tab-indicator"></div>
                    </button>
                    <button class="filter-tab" data-filter="web">
                        <i class="tab-icon fa fa-globe"></i>
                        <span class="tab-text">ওয়েব ডেভেলপমেন্ট</span>
                        <div class="tab-indicator"></div>
                    </button>
                    <button class="filter-tab" data-filter="soft">
                        <i class="tab-icon fa fa-globe"></i>
                        <span class="tab-text">সফটওয়্যার ডেভেলপমেন্ট</span>
                        <div class="tab-indicator"></div>
                    </button>
                    <button class="filter-tab" data-filter="en">
                        <i class="tab-icon fa fa-shopping-cart"></i>
                        <span class="tab-text">ই-কমার্স/নিউজ</span>
                        <div class="tab-indicator"></div>
                    </button>
                    <button class="filter-tab" data-filter="app">
                        <i class="tab-icon fa fa-mobile-alt"></i>
                        <span class="tab-text">মোবাইল অ্যাপ</span>
                        <div class="tab-indicator"></div>
                    </button>
                </div>
                <div class="filter-search">
                    <div class="search-box">
                        <i class="search-icon fa fa-search"></i>
                        <input type="text" 
                               class="search-input" 
                               placeholder="প্রজেক্ট বা কীওয়ার্ড অনুসন্ধান...">
                        <div class="search-underline"></div>
                    </div>
                </div>
            </div>

            <!-- Portfolio Grid -->
            <div class="portfolio-grid" id="portfolioGrid">
                @forelse($portfolios as $portfolio)
                    <div class="portfolio-item" 
                         data-category="{{ $portfolio->category ?? 'web' }}"
                         data-aos="fade-up"
                         data-aos-delay="{{ $loop->index * 100 }}">
                        <!-- Project Card -->
                        <div class="project-card">
                            <!-- Project Image -->
                            <div class="project-image">
                                <div class="image-container">
                                    @if($portfolio->image)
                                        <img src="{{ asset('public/'.$portfolio->image) }}" 
                                             alt="{{ $portfolio->title }}" 
                                             class="project-img">
                                    @else
                                        <img src="{{ asset('assets/images/portfolio/default.jpg') }}" 
                                             alt="{{ $portfolio->title }}" 
                                             class="project-img">
                                    @endif
                                    <div class="image-overlay">
                                        <div class="overlay-content">
                                            <div class="overlay-buttons">
                                                @if($portfolio->website_url)
                                                    <a href="{{ $portfolio->website_url }}" 
                                                       target="_blank" 
                                                       class="btn-live-view">
                                                        <i class="btn-icon fa fa-external-link-alt"></i>
                                                        <span>লাইভ দেখুন</span>
                                                    </a>
                                                @endif
                                                <button class="btn-project-details">
                                                    <i class="btn-icon fa fa-info-circle"></i>
                                                    <span>বিস্তারিত দেখুন</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="project-badge">
                                        <span class="badge-number">{{ $loop->iteration }}</span>
                                        <div class="badge-glow"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Project Info -->
                            <div class="project-info">
                                <!-- Project Header -->
                                <div class="project-header">
                                    <div class="project-category">
                                        <span class="category-badge">{{ ucfirst($portfolio->category ?? 'ওয়েব') }}</span>
                                    </div>
                                    <div class="project-actions">
                                        <button class="btn-project-like">
                                            <i class="like-icon fa fa-heart"></i>
                                            <span class="like-count">0</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Project Body -->
                                <div class="project-body">
                                    <h3 class="project-title">{{ $portfolio->title }}</h3>
                                    <p class="project-description">
                                        {{ Str::limit($portfolio->description ?? 'প্রজেক্টের সংক্ষিপ্ত বর্ণনা এখানে দেখুন।', 120) }}
                                    </p>
                                </div>

                                <!-- Project Footer -->
                                <div class="project-footer">
                                    <div class="project-status">
                                        <div class="status-indicator"></div>
                                        <span class="status-text">সম্পন্ন</span>
                                    </div>
                                    <div class="project-link">
                                        @if($portfolio->website_url)
                                            <a href="{{ $portfolio->website_url }}" 
                                               target="_blank" 
                                               class="btn-visit-site">
                                                <i class="link-icon fa fa-globe"></i>
                                                <span>সাইট পরিদর্শন</span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Card Effects -->
                            <div class="card-effects">
                                <div class="effect-glow"></div>
                                <div class="effect-border">
                                    <div class="border-line line-1"></div>
                                    <div class="border-line line-2"></div>
                                    <div class="border-line line-3"></div>
                                    <div class="border-line line-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="empty-portfolio">
                        <div class="empty-content">
                            <div class="empty-animation">
                                <div class="empty-icon">
                                    <div class="icon-circle">
                                        <div class="circle-pulse"></div>
                                        <div class="circle-inner">
                                            <i class="empty-symbol fa fa-folder-open"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="empty-text">
                                    <h3>কোনো প্রজেক্ট পাওয়া যায়নি</h3>
                                    <p>এখনই প্রজেক্ট আপলোড করুন বা যোগাযোগ করুন — আমরা সাহায্য করতে প্রস্তুত।</p>
                                </div>
                                <button class="btn-notify-me">
                                    <i class="notify-icon fa fa-envelope"></i>
                                    <span>রিলিজ নোট জানতে বলুন</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Load More -->
            <div class="load-more-section" data-aos="fade-up">
                <button class="btn-load-more">
                    <span class="btn-text">আরো প্রজেক্ট দেখুন</span>
                    <div class="btn-loader">
                        <div class="loader-dot"></div>
                        <div class="loader-dot"></div>
                        <div class="loader-dot"></div>
                    </div>
                    <div class="btn-shine"></div>
                </button>
                <div class="project-counter">
                    <span class="counter-text">মোট প্রজেক্ট:</span>
                    <span class="counter-number">{{ count($portfolios) }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="portfolio-cta">
        <div class="container">
            <div class="cta-content">
                <div class="cta-icon fa fa-life-ring"></div>
                <h2 class="cta-title">আপনার পরবর্তী প্রজেক্ট শুরু করতে প্রস্তুত?</h2>
                <p class="cta-text">
                    আমাদের টিম আপনার আইডিয়া রূপায়ণ করতে প্রস্তুত। কনসাল্টেশন থেকে ডেলিভারী — সব ধাপে সহায়তা করে থাকি।
                </p>
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="btn-cta-primary">
                        <i class="btn-icon fa fa-envelope"></i>
                        <span>প্রজেক্ট রিকোয়েস্ট পাঠান</span>
                        <div class="btn-sparkle"></div>
                    </a>
                    <a href="tel:+8801915357699" class="btn-cta-secondary">
                        <i class="btn-icon fa fa-phone"></i>
                        <span>কল করুন: +8801915357699</span>
                    </a>
                    <a href="https://wa.me/8801915357699" target="_blank" class="btn-cta-tertiary">
                        <i class="btn-icon fa fa-whatsapp"></i>
                        <span>WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Portfolio JavaScript
document.addEventListener('DOMContentLoaded', function() {
    initializePortfolio();
    setupEventListeners();
    startAnimations();
});

function initializePortfolio() {
    // Initialize counters
    initCounters();
    
    // Setup filter functionality
    setupFiltering();
    
    // Initialize animations
    initAnimations();
    
    // Setup search functionality
    setupSearch();
}

function setupEventListeners() {
    // Filter tabs
    document.querySelectorAll('.filter-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active tab
            document.querySelectorAll('.filter-tab').forEach(t => {
                t.classList.remove('active');
            });
            this.classList.add('active');
            
            // Filter portfolio items
            filterPortfolioItems(filter);
        });
    });
    
    // Load more button
    const loadMoreBtn = document.querySelector('.btn-load-more');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            loadMoreProjects();
        });
    }
    
    // Project like buttons (delegated since items may be appended)
    document.body.addEventListener('click', function(e) {
        if (e.target.closest('.btn-project-like')) {
            toggleProjectLike(e.target.closest('.btn-project-like'));
        }
        if (e.target.closest('.btn-notify-me')) {
            handleNotificationRequest(e.target.closest('.btn-notify-me'));
        }
        if (e.target.closest('.btn-project-details')) {
            // simple placeholder: show an alert or open modal (implement modal if required)
            alert('প্রজেক্টের বিস্তারিত দেখুন — উন্নত মডাল এখানে সংযুক্ত করা যাবে।');
        }
    });
    
    // CTA buttons: let normal links work, no additional handler needed
}

function initAnimations() {
    // Animate title words (if present)
    const titleWords = document.querySelectorAll('.title-word');
    titleWords.forEach((word, index) => {
        setTimeout(() => {
            word.style.animation = 'wordReveal 0.8s ease forwards';
        }, index * 200);
    });
    
    // Animate portfolio items
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    portfolioItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 100}ms`;
    });
    
    // Initialize AOS if available
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    }
}

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

function setupFiltering() {
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    window.filterPortfolioItems = function(filter) {
        portfolioItems.forEach(item => {
            const category = item.getAttribute('data-category') || 'web';
            if (filter === 'all' || category === filter) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 100);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                setTimeout(() => { item.style.display = 'none'; }, 300);
            }
        });
        updateProjectCounter(filter);
    };
}

function setupSearch() {
    const searchInput = document.querySelector('.search-input');
    if (!searchInput) return;
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const portfolioItems = document.querySelectorAll('.portfolio-item');
        
        portfolioItems.forEach(item => {
            const title = (item.querySelector('.project-title')?.textContent || '').toLowerCase();
            const description = (item.querySelector('.project-description')?.textContent || '').toLowerCase();
            const category = (item.getAttribute('data-category') || '').toLowerCase();
            
            if (title.includes(searchTerm) || description.includes(searchTerm) || category.includes(searchTerm)) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 100);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                setTimeout(() => { item.style.display = 'none'; }, 300);
            }
        });
    });
}

function updateProjectCounter(filter) {
    const counter = document.querySelector('.counter-number');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    
    if (filter === 'all') {
        counter.textContent = portfolioItems.length;
    } else {
        const filteredItems = Array.from(portfolioItems).filter(item => item.getAttribute('data-category') === filter);
        counter.textContent = filteredItems.length;
    }
}

function loadMoreProjects() {
    const button = document.querySelector('.btn-load-more');
    if (!button) return;
    const buttonText = button.querySelector('.btn-text');
    const originalText = buttonText.textContent;
    
    // Show loading state
    buttonText.textContent = 'লোড হচ্ছে...';
    button.disabled = true;
    
    // Simulate API call
    setTimeout(() => {
        const newProjects = [
            {
                id: 1,
                title: 'কাস্টম ই-কমার্স সলিউশন',
                category: 'ecommerce',
                description: 'সম্পূর্ণ কাস্টম ই-কমার্স সিস্টেম — পেমেন্ট, কাস্টমার ড্যাশবোর্ড ও অর্ডার ম্যানেজমেন্টসহ।',
                image: 'https://via.placeholder.com/400x250/667eea/ffffff'
            },
            {
                id: 2,
                title: 'মোবাইল অ্যাপ্লিকেশন (iOS/Android)',
                category: 'mobile',
                description: 'ক্রস-প্ল্যাটফর্ম মোবাইল অ্যাপ — দ্রুত লোডিং, অফলাইন সাপোর্ট ও পুশ নোটিফিকেশন।',
                image: 'https://via.placeholder.com/400x250/4cc9f0/ffffff'
            },
            {
                id: 3,
                title: 'UI/UX রিডিজাইন প্রজেক্ট',
                category: 'design',
                description: 'ইউজার-ফ্রেন্ডলি ইন্টারফেস ও অভিজ্ঞতা উন্নত করার জন্য সম্পূর্ণ রিডিজাইন।',
                image: 'https://via.placeholder.com/400x250/7209b7/ffffff'
            }
        ];
        
        const portfolioGrid = document.getElementById('portfolioGrid');
        
        newProjects.forEach((project, index) => {
            const projectElement = createProjectElement(project, portfolioGrid.children.length + index + 1);
            portfolioGrid.appendChild(projectElement);
            setTimeout(() => {
                projectElement.style.animation = 'itemEntrance 0.6s ease forwards';
            }, index * 200);
        });
        
        updateProjectCounter('all');
        buttonText.textContent = originalText;
        button.disabled = false;
        showNotification('নতুন প্রজেক্ট সফলভাবে যোগ করা হয়েছে!', 'success');
    }, 2000);
}

function createProjectElement(project, number) {
    const div = document.createElement('div');
    div.className = 'portfolio-item';
    div.setAttribute('data-category', project.category);
    div.setAttribute('data-aos', 'fade-up');
    
    div.innerHTML = `
        <div class="project-card">
            <div class="project-image">
                <div class="image-container">
                    <img src="${project.image}" alt="${project.title}" class="project-img">
                    <div class="image-overlay">
                        <div class="overlay-content">
                            <div class="overlay-buttons">
                                <a href="#" target="_blank" class="btn-live-view">
                                    <i class="btn-icon fa fa-external-link-alt"></i>
                                    <span>লাইভ দেখুন</span>
                                </a>
                                <button class="btn-project-details">
                                    <i class="btn-icon fa fa-info-circle"></i>
                                    <span>বিস্তারিত দেখুন</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="project-badge">
                        <span class="badge-number">${number}</span>
                        <div class="badge-glow"></div>
                    </div>
                </div>
            </div>

            <div class="project-info">
                <div class="project-header">
                    <div class="project-category">
                        <span class="category-badge">${getCategoryName(project.category)}</span>
                    </div>
                    <div class="project-actions">
                        <button class="btn-project-like">
                            <i class="like-icon fa fa-heart"></i>
                            <span class="like-count">0</span>
                        </button>
                    </div>
                </div>

                <div class="project-body">
                    <h3 class="project-title">${project.title}</h3>
                    <p class="project-description">${project.description}</p>
                    
                    <div class="project-meta">
                        <div class="meta-item">
                            <i class="meta-icon fa fa-clock"></i>
                            <span class="meta-text">পূর্ণকালীন উন্নয়ন</span>
                        </div>
                        <div class="meta-item">
                            <i class="meta-icon fa fa-user"></i>
                            <span class="meta-text">টিম সমর্থন</span>
                        </div>
                    </div>

                    <div class="tech-stack">
                        <div class="stack-title">প্রযুক্তি</div>
                        <div class="stack-tags">
                            <span class="tech-tag">Laravel</span>
                            <span class="tech-tag">Vue.js</span>
                            <span class="tech-tag">MySQL</span>
                        </div>
                    </div>
                </div>

                <div class="project-footer">
                    <div class="project-status">
                        <div class="status-indicator"></div>
                        <span class="status-text">সম্পন্ন</span>
                    </div>
                    <div class="project-link">
                        <a href="#" target="_blank" class="btn-visit-site">
                            <i class="link-icon fa fa-globe"></i>
                            <span>সাইট পরিদর্শন</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-effects">
                <div class="effect-glow"></div>
                <div class="effect-border">
                    <div class="border-line line-1"></div>
                    <div class="border-line line-2"></div>
                    <div class="border-line line-3"></div>
                    <div class="border-line line-4"></div>
                </div>
            </div>
        </div>
    `;
    
    return div;
}

function getCategoryName(category) {
    const categories = {
        'web': 'ওয়েব ডেভেলপমেন্ট',
        'mobile': 'মোবাইল অ্যাপ',
        'design': 'UI/UX ডিজাইন',
        'ecommerce': 'ই-কমার্স'
    };
    return categories[category] || 'ওয়েব';
}

function toggleProjectLike(button) {
    const icon = button.querySelector('.like-icon');
    const countElement = button.querySelector('.like-count');
    let count = parseInt(countElement.textContent);
    
    if (icon.classList.contains('liked')) {
        icon.classList.remove('liked');
        icon.classList.remove('fa-heart');
        icon.classList.add('fa-heart');
        count = Math.max(0, count - 1);
        button.style.color = '';
    } else {
        icon.classList.add('liked');
        icon.classList.add('fa-heart');
        count++;
        button.style.color = 'var(--danger-color)';
        button.style.transform = 'scale(1.1)';
        setTimeout(() => { button.style.transform = ''; }, 200);
    }
    
    countElement.textContent = count;
}

function handleNotificationRequest(button) {
    const originalHTML = button.innerHTML;
    
    button.innerHTML = '<i class="notify-icon fa fa-check"></i> <span>অনুরোধ মোতাবেক নোটিফিকেশন পাঠানো হবে</span>';
    button.disabled = true;
    
    showNotification('বিনীত অনুরোধ নেওয়া হয়েছে — আমরা আপনাকে জানাবো।', 'success');
    
    setTimeout(() => {
        button.innerHTML = originalHTML;
        button.disabled = false;
    }, 3000);
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="notification-icon fa ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}"></i>
            <span class="notification-text">${message}</span>
        </div>
    `;
    
    const styles = `
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            animation: notificationSlideIn 0.3s ease;
            max-width: 400px;
            font-weight: 600;
        }
        .notification-success { border-left: 5px solid var(--success-color); }
        .notification-error { border-left: 5px solid var(--danger-color); }
        @keyframes notificationSlideIn { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
        .notification-content { display: flex; align-items: center; gap: 15px; }
        .notification-icon { font-size: 1.5rem; }
        .notification-text { flex: 1; }
    `;
    
    if (!document.querySelector('#notification-styles')) {
        const styleSheet = document.createElement('style');
        styleSheet.id = 'notification-styles';
        styleSheet.textContent = styles;
        document.head.appendChild(styleSheet);
    }
    
    document.body.appendChild(notification);
    setTimeout(() => {
        notification.style.animation = 'notificationSlideOut 0.3s ease';
        setTimeout(() => { document.body.removeChild(notification); }, 300);
    }, 3000);
}

const slideOutStyles = `
    @keyframes notificationSlideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
if (!document.querySelector('#notification-styles')) {
    const styleSheet = document.createElement('style');
    styleSheet.id = 'notification-styles';
    styleSheet.textContent = slideOutStyles;
    document.head.appendChild(styleSheet);
}

// Handle window resize
let resizeTimer;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
        initAnimations();
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
            window.scrollTo({ top: targetElement.offsetTop - 80, behavior: 'smooth' });
        }
    });
});

// Performance optimization
if ('requestIdleCallback' in window) {
    requestIdleCallback(() => {
        const images = document.querySelectorAll('img[data-src]');
        images.forEach(img => { img.src = img.getAttribute('data-src'); });
    });
}

// Error handling
window.addEventListener('error', function(e) {
    console.error('Error occurred:', e.error);
    showNotification('অপ্রত্যাশিত ত্রুটি ঘটেছে — অনুগ্রহ করে পরে আবার চেষ্টা করুন।', 'error');
});

</script>

<!-- AOS Library for animations -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
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
