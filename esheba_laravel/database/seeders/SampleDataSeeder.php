<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\TeamMember;
use App\Models\Setting;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample services
        Service::create([
            'title' => 'Web Development',
            'description' => 'Professional web development services for businesses of all sizes.',
            'price' => 'Starting at $500',
            'is_active' => true
        ]);

        Service::create([
            'title' => 'Mobile App Development',
            'description' => 'Custom mobile applications for iOS and Android platforms.',
            'price' => 'Starting at $1000',
            'is_active' => true
        ]);

        Service::create([
            'title' => 'UI/UX Design',
            'description' => 'User-centered design solutions to enhance user experience.',
            'price' => 'Starting at $300',
            'is_active' => true
        ]);

        // Create sample portfolios
        Portfolio::create([
            'title' => 'E-Commerce Website',
            'description' => 'A fully functional e-commerce platform with payment integration.',
            'website_url' => 'https://example.com',
            'sort_order' => 1,
            'is_active' => true
        ]);

        Portfolio::create([
            'title' => 'Mobile Banking App',
            'description' => 'Secure mobile banking application for financial institutions.',
            'website_url' => 'https://example.com',
            'sort_order' => 2,
            'is_active' => true
        ]);

        // Create sample team members
        TeamMember::create([
            'name' => 'John Doe',
            'position' => 'CEO & Founder',
            'bio' => 'John has over 10 years of experience in the tech industry.',
            'facebook_url' => 'https://facebook.com/johndoe',
            'twitter_url' => 'https://twitter.com/johndoe',
            'sort_order' => 1,
            'is_active' => true
        ]);

        TeamMember::create([
            'name' => 'Jane Smith',
            'position' => 'Lead Developer',
            'bio' => 'Jane specializes in full-stack web development.',
            'facebook_url' => 'https://facebook.com/janesmith',
            'twitter_url' => 'https://twitter.com/janesmith',
            'sort_order' => 2,
            'is_active' => true
        ]);

        // Create sample settings
        Setting::create([
            'company_name' => 'E-Sheba',
            'email' => 'info@e-sheba.com',
            'phone' => '+1234567890',
            'address' => '123 Business Street, City, Country',
            'facebook_url' => 'https://facebook.com/e-sheba',
            'twitter_url' => 'https://twitter.com/e-sheba',
            'about_company' => 'E-Sheba is a leading digital solutions provider.'
        ]);
    }
}