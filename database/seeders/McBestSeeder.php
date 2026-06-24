<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\McBestProject;
use App\Models\McBestTeamMember;
use App\Models\McBestFaq;
use App\Models\McBestTestimonial;

class McBestSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        McBestProject::truncate();
        McBestTeamMember::truncate();
        McBestFaq::truncate();
        McBestTestimonial::truncate();

        // Create Projects
        $projects = [
            [
                'title' => 'Residential Solar System Installation',
                'location' => 'Maitama, Abuja',
                'description' => 'Complete 5kW solar installation for a 4-bedroom duplex including 8 solar panels, 5kVA inverter, and 4 batteries. System provides 24/7 power supply.',
                'category' => 'residential',
                'featured' => true,
                'display_order' => 1,
            ],
            [
                'title' => 'Commercial Office Complex Wiring',
                'location' => 'Victoria Island, Lagos',
                'description' => 'Full electrical wiring for a 3-story office building including LED lighting systems, backup power, and smart controls.',
                'category' => 'commercial',
                'featured' => true,
                'display_order' => 2,
            ],
            [
                'title' => 'Industrial Solar Farm',
                'location' => 'Kano Industrial Estate',
                'description' => '50kW solar installation for manufacturing facility. Reduced electricity costs by 70%. Includes monitoring system and battery backup.',
                'category' => 'industrial',
                'featured' => true,
                'display_order' => 3,
            ],
            [
                'title' => 'Smart Home Lighting System',
                'location' => 'Asokoro, Abuja',
                'description' => 'Energy-efficient LED lighting throughout 5-bedroom mansion with smart controls and motion sensors.',
                'category' => 'residential',
                'featured' => true,
                'display_order' => 4,
            ],
            [
                'title' => 'Restaurant Power Backup',
                'location' => 'Lekki Phase 1, Lagos',
                'description' => 'Hybrid solar + inverter system for restaurant. Powers refrigeration, lighting, and kitchen equipment 24/7.',
                'category' => 'commercial',
                'featured' => true,
                'display_order' => 5,
            ],
            [
                'title' => 'Hospital Solar Installation',
                'location' => 'Port Harcourt',
                'description' => '30kW solar system for private hospital ensuring uninterrupted power for critical medical equipment.',
                'category' => 'commercial',
                'featured' => true,
                'display_order' => 6,
            ],
        ];

        foreach ($projects as $project) {
            McBestProject::create($project);
        }

        // Create Team Members
        $team = [
            [
                'name' => 'Engr. Michael Okonkwo',
                'role' => 'Lead Engineer',
                'bio' => '12+ years of experience in solar energy systems. Holds certifications from NABCEP and NSE.',
                'experience_years' => 12,
                'certifications' => ['NABCEP Solar Professional', 'NSE Member', 'COREN Registered'],
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Mrs. Grace Adeyemi',
                'role' => 'Senior Electrician',
                'bio' => '10+ years in electrical installations. Master electrician with extensive commercial project experience.',
                'experience_years' => 10,
                'certifications' => ['Master Electrician', 'COREN Registered', 'Safety Certified'],
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Mr. Ibrahim Suleiman',
                'role' => 'Solar Installation Specialist',
                'bio' => '8+ years specializing in residential and commercial solar installations across Nigeria.',
                'experience_years' => 8,
                'certifications' => ['NABCEP Certified', 'Solar PV Installer', 'First Aid Certified'],
                'display_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($team as $member) {
            McBestTeamMember::create($member);
        }

        // Create FAQs
        $faqs = [
            [
                'question' => 'How long does a solar installation take?',
                'answer' => 'Residential solar installations typically take 3-7 days depending on system size. This includes site assessment, panel mounting, inverter setup, and testing. Commercial projects take 2-4 weeks.',
                'category' => 'Installation',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'What is the warranty on solar installations?',
                'answer' => 'We offer a 5-year warranty on all installation work. Solar panels come with 25-year manufacturer warranty, and inverters have 5-10 year warranties depending on the brand.',
                'category' => 'Warranty',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Do you handle full home electrical rewiring?',
                'answer' => 'Yes, our certified electricians handle complete home and commercial electrical rewiring. All work meets Nigerian electrical codes and international safety standards.',
                'category' => 'Services',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'How reliable is solar power in Nigeria?',
                'answer' => 'Solar power is extremely reliable in Nigeria due to abundant sunshine. With proper system sizing and quality batteries, you can have 24/7 power even during rainy seasons.',
                'category' => 'Solar',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'question' => 'Do you offer payment plans?',
                'answer' => 'Yes, we offer flexible payment plans for solar installations including 3-12 month installment options. We also partner with financial institutions for larger projects.',
                'category' => 'Payment',
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'question' => 'What appliances can you install?',
                'answer' => 'We install all home and office appliances including air conditioners, refrigerators, washing machines, fans, water heaters, cooking ranges, and more. We also provide maintenance services.',
                'category' => 'Services',
                'display_order' => 6,
                'is_active' => true,
            ],
            [
                'question' => 'Do you provide emergency services?',
                'answer' => 'Yes, we offer 24/7 emergency electrical services for urgent issues like power outages, electrical faults, and safety hazards. Call +234 706 782 3798.',
                'category' => 'Services',
                'display_order' => 7,
                'is_active' => true,
            ],
            [
                'question' => 'Which areas do you serve?',
                'answer' => 'We primarily serve Abuja, Lagos, Kano, Port Harcourt, Ibadan, Kaduna, and Benin City. We also handle projects in other Nigerian cities upon request.',
                'category' => 'Coverage',
                'display_order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            McBestFaq::create($faq);
        }

        // Create Testimonials
        $testimonials = [
            [
                'client_name' => 'Adebayo Ogunlesi',
                'client_location' => 'Abuja',
                'testimonial_text' => 'McBest transformed our home power situation. The solar installation was seamless and we haven\'t had power issues since. Highly recommended!',
                'rating' => 5,
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'client_name' => 'Chioma Nwosu',
                'client_location' => 'Lagos',
                'testimonial_text' => 'Professional team, quality workmanship, and excellent customer service. They handled our office electrical wiring perfectly.',
                'rating' => 5,
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'client_name' => 'Ibrahim Mohammed',
                'client_location' => 'Kano',
                'testimonial_text' => 'The maintenance team is very responsive. Anytime we have an issue, they\'re there within hours. Best decision we made for our business.',
                'rating' => 5,
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'client_name' => 'Folake Adeleke',
                'client_location' => 'Port Harcourt',
                'testimonial_text' => 'I saved over 60% on electricity costs after installing McBest solar system. The team was professional and installation was quick.',
                'rating' => 5,
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'client_name' => 'Chinedu Okoro',
                'client_location' => 'Enugu',
                'testimonial_text' => 'Best decision for my restaurant. The inverter system keeps all my appliances running during outages. Customers are always happy.',
                'rating' => 5,
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'client_name' => 'Aisha Garba',
                'client_location' => 'Kaduna',
                'testimonial_text' => 'Very transparent pricing and excellent after-sales support. They walked us through everything and we\'re completely satisfied.',
                'rating' => 5,
                'display_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            McBestTestimonial::create($testimonial);
        }

        $this->command->info('McBest sample data created successfully!');
        $this->command->info('Created: ' . count($projects) . ' projects');
        $this->command->info('Created: ' . count($team) . ' team members');
        $this->command->info('Created: ' . count($faqs) . ' FAQs');
        $this->command->info('Created: ' . count($testimonials) . ' testimonials');
    }
}
