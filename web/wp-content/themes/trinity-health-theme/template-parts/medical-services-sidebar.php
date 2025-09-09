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
<div class="lg:col-span-1">
    <div id="medical-services-sidebar" class="bg-gray-50 rounded-lg p-6 lg:sticky lg:top-24" style="max-height: calc(100vh - 120px); overflow-y: auto;">
        <h3 class="text-xl font-bold text-gray-900 mb-6">Medical Services</h3>
        <div class="space-y-3">
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
                    'title' => 'Pediatric Clinic',
                    'icon' => 'baby',
                    'slug' => 'pediatrics-service',
                    'url' => home_url('/pediatrics-service')
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
                   class="<?php echo $is_active ? 'bg-maroon text-white' : 'bg-white hover:bg-gray-100 text-gray-700'; ?> flex items-center p-4 rounded-lg transition-colors group">
                    <div class="<?php echo $is_active ? 'bg-white/20' : 'bg-gray-100 group-hover:bg-maroon/10'; ?> p-2 rounded-lg mr-3">
                        <svg class="w-6 h-6 <?php echo $is_active ? 'text-white' : 'text-maroon'; ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <?php
                            // Icon paths based on service type
                            switch($service['icon']) {
                                case 'stethoscope':
                                    echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>';
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
                    </div>
                    <span class="font-medium"><?php echo esc_html($service['title']); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
        
        <!-- View All Services Link -->
        <a href="<?php echo esc_url(home_url('/our-services')); ?>" 
           class="mt-6 flex items-center justify-center text-maroon hover:text-maroon-dark transition-colors group">
            <svg class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
            <span class="font-medium">View All Services</span>
        </a>
    </div>
</div>