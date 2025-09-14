<?php

/**
 * Medical Services Sidebar Component
 * 
 * @package Trinity_Health
 */

// Get the current page slug to highlight the active service
$current_page_slug = get_post_field('post_name', get_post());
?>

<!-- Medical Services Sidebar -->
<div class="hidden md:block md:col-span-1 lg:col-span-1">
    <div id="medical-services-sidebar" class="bg-gray-50 rounded-lg p-6 md:sticky md:top-24" style="max-height: calc(100vh - 120px); overflow-y: auto;">
        <h3 class="text-2xl font-semibold text-trinity-maroon-dark mb-6">Medical Services</h3>
        <div class="space-y-4">
            <?php
            $services = [
                [
                    'title' => 'Audiology Clinic',
                    'icon' => 'stethoscope',
                    'slug' => 'audiology-service',
                    'url' => home_url('/audiology-service')
                ],
                [
                    'title' => 'General Medicine',
                    'icon' => 'heart',
                    'slug' => 'general-medicine-service',
                    'url' => home_url('/general-medicine-service')
                ],
                [
                    'title' => 'Laboratory Analysis',
                    'icon' => 'flask',
                    'slug' => 'laboratory-service',
                    'url' => home_url('/laboratory-service')
                ],
                [
                    'title' => 'Paediatric Clinic',
                    'icon' => 'baby',
                    'slug' => 'paediatrics-service',
                    'url' => home_url('/paediatrics-service')
                ],
                [
                    'title' => 'Cardiac Clinic',
                    'icon' => 'activity',
                    'slug' => 'cardiology-service',
                    'url' => home_url('/cardiology-service')
                ],
                [
                    'title' => 'Neurology Clinic',
                    'icon' => 'brain',
                    'slug' => 'neurology-service',
                    'url' => home_url('/neurology-service')
                ]
            ];

            foreach ($services as $service) :
                $is_active = ($current_page_slug === $service['slug']);
            ?>
                <a href="<?php echo esc_url($service['url']); ?>"
                    class="block <?php echo $is_active ? 'bg-trinity-maroon text-white hover:bg-trinity-maroon-dark' : 'bg-white border border-gray-200 hover:border-trinity-maroon hover:shadow-md'; ?> rounded-lg p-4 transition-all">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 <?php echo $is_active ? 'bg-white/20' : 'bg-trinity-gold/20'; ?> rounded-full flex items-center justify-center">
                            <?php if ($service['icon'] === 'stethoscope' && $is_active) : ?>
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                </svg>
                            <?php else : ?>
                                <svg class="w-6 h-6 <?php echo $is_active ? 'text-white' : 'text-trinity-maroon'; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <?php
                                    // Icon paths based on service type
                                    switch ($service['icon']) {
                                        case 'stethoscope':
                                            echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path>';
                                            break;
                                        case 'heart':
                                            echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>';
                                            break;
                                        case 'flask':
                                            echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>';
                                            break;
                                        case 'baby':
                                            echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>';
                                            break;
                                        case 'activity':
                                            echo '<polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>';
                                            break;
                                        case 'brain':
                                            echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>';
                                            break;
                                    }
                                    ?>
                                </svg>
                            <?php endif; ?>
                        </div>
                        <span class="font-semibold text-lg <?php echo $is_active ? '' : 'text-gray-800'; ?>"><?php echo esc_html($service['title']); ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- View All Services Button -->
        <a href="<?php echo esc_url(home_url('/our-services')); ?>"
            class="flex items-center justify-center bg-trinity-gold text-gray-800 px-4 py-3 rounded-full font-semibold hover:bg-trinity-gold-dark transition-colors mt-6">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            View All Services
        </a>
    </div>
</div>
