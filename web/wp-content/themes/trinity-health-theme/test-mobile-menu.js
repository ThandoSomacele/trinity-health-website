const { chromium } = require('playwright');

async function testMobileMenu() {
    // Launch browser
    const browser = await chromium.launch({ 
        headless: false, // Set to true for headless mode
        devtools: true 
    });
    const context = await browser.newContext({
        viewport: { width: 375, height: 812 } // Mobile viewport
    });
    const page = await context.newPage();

    console.log('🔍 Starting mobile hamburger menu diagnosis...\n');

    try {
        // Navigate to the site
        console.log('📱 Navigating to Trinity Health website...');
        await page.goto('https://trinity-health-website.ddev.site', { 
            waitUntil: 'networkidle' 
        });
        
        // Wait for page to fully load
        await page.waitForTimeout(2000);

        // Take initial screenshot
        await page.screenshot({ 
            path: 'mobile-menu-initial.png', 
            fullPage: true 
        });
        console.log('✅ Initial screenshot taken: mobile-menu-initial.png');

        // Check if elements exist
        console.log('\n🔎 Checking for required elements...');
        
        const menuToggle = await page.locator('.mobile-menu-toggle');
        const mobileMenu = await page.locator('.mobile-menu');
        
        const toggleExists = await menuToggle.count();
        const menuExists = await mobileMenu.count();
        
        console.log(`Hamburger button (.mobile-menu-toggle): ${toggleExists ? '✅ Found' : '❌ Not found'}`);
        console.log(`Mobile menu (.mobile-menu): ${menuExists ? '✅ Found' : '❌ Not found'}`);

        if (toggleExists && menuExists) {
            // Get element properties
            console.log('\n📋 Element properties:');
            
            const toggleVisible = await menuToggle.isVisible();
            const toggleEnabled = await menuToggle.isEnabled();
            const menuVisible = await mobileMenu.isVisible();
            const menuHidden = await mobileMenu.evaluate(el => el.classList.contains('hidden'));
            
            console.log(`Hamburger button visible: ${toggleVisible ? '✅ Yes' : '❌ No'}`);
            console.log(`Hamburger button enabled: ${toggleEnabled ? '✅ Yes' : '❌ No'}`);
            console.log(`Mobile menu visible: ${menuVisible ? '✅ Yes' : '❌ No'}`);
            console.log(`Mobile menu has 'hidden' class: ${menuHidden ? '✅ Yes' : '❌ No'}`);

            // Get computed styles
            const toggleStyles = await menuToggle.evaluate(el => {
                const styles = window.getComputedStyle(el);
                return {
                    display: styles.display,
                    visibility: styles.visibility,
                    opacity: styles.opacity,
                    pointerEvents: styles.pointerEvents,
                    zIndex: styles.zIndex
                };
            });
            
            console.log('\n🎨 Hamburger button computed styles:');
            console.log(JSON.stringify(toggleStyles, null, 2));

            // Check for event listeners
            console.log('\n👂 Checking for event listeners...');
            
            const hasClickListener = await page.evaluate(() => {
                const toggle = document.querySelector('.mobile-menu-toggle');
                if (!toggle) return false;
                
                // Check if any click event listeners are attached
                const events = getEventListeners ? getEventListeners(toggle) : null;
                return events && events.click ? events.click.length > 0 : 'Cannot check listeners';
            });
            
            console.log(`Click listeners: ${hasClickListener}`);

        }

        // Check console for errors
        console.log('\n🐛 Checking for JavaScript errors...');
        
        const errors = [];
        page.on('console', msg => {
            if (msg.type() === 'error') {
                errors.push(msg.text());
            }
        });
        
        // Wait a moment to catch any errors
        await page.waitForTimeout(1000);
        
        if (errors.length > 0) {
            console.log('❌ JavaScript errors found:');
            errors.forEach(error => console.log(`   - ${error}`));
        } else {
            console.log('✅ No JavaScript errors found');
        }

        // Check if navigation.js is loaded
        console.log('\n📜 Checking script loading...');
        
        const scripts = await page.evaluate(() => {
            const scripts = Array.from(document.querySelectorAll('script[src]'));
            return scripts.map(script => script.src);
        });
        
        const navigationScript = scripts.find(src => src.includes('navigation.js'));
        console.log(`Navigation.js loaded: ${navigationScript ? '✅ Yes' : '❌ No'}`);
        if (navigationScript) {
            console.log(`   Path: ${navigationScript}`);
        }

        // Test clicking the hamburger button
        if (toggleExists) {
            console.log('\n🖱️  Testing hamburger button click...');
            
            try {
                // Try to click the hamburger button
                await menuToggle.click();
                console.log('✅ Click executed successfully');
                
                // Wait for animation
                await page.waitForTimeout(500);
                
                // Check if menu opened
                const menuVisibleAfterClick = await mobileMenu.isVisible();
                const menuHiddenAfterClick = await mobileMenu.evaluate(el => el.classList.contains('hidden'));
                
                console.log(`Menu visible after click: ${menuVisibleAfterClick ? '✅ Yes' : '❌ No'}`);
                console.log(`Menu has 'hidden' class after click: ${menuHiddenAfterClick ? '❌ Yes (should be removed)' : '✅ No (correct)'}`);
                
                // Take screenshot after click
                await page.screenshot({ 
                    path: 'mobile-menu-after-click.png', 
                    fullPage: true 
                });
                console.log('✅ After-click screenshot taken: mobile-menu-after-click.png');
                
            } catch (clickError) {
                console.log(`❌ Click failed: ${clickError.message}`);
            }
        }

        // Test direct JavaScript execution
        console.log('\n⚡ Testing direct JavaScript execution...');
        
        const jsTest = await page.evaluate(() => {
            const toggle = document.querySelector('.mobile-menu-toggle');
            const menu = document.querySelector('.mobile-menu');
            
            const results = {
                toggleFound: !!toggle,
                menuFound: !!menu,
                lucideAvailable: typeof lucide !== 'undefined',
                jqueryAvailable: typeof jQuery !== 'undefined'
            };
            
            // Try to manually toggle the menu
            if (toggle && menu) {
                const wasHidden = menu.classList.contains('hidden');
                
                if (wasHidden) {
                    menu.classList.remove('hidden');
                    toggle.setAttribute('aria-expanded', 'true');
                } else {
                    menu.classList.add('hidden');
                    toggle.setAttribute('aria-expanded', 'false');
                }
                
                results.manualToggleWorked = true;
                results.menuStateAfterToggle = menu.classList.contains('hidden') ? 'hidden' : 'visible';
            }
            
            return results;
        });
        
        console.log('JavaScript test results:');
        console.log(JSON.stringify(jsTest, null, 2));

    } catch (error) {
        console.error('❌ Test failed:', error);
    }

    // Keep browser open for manual inspection
    console.log('\n⏸️  Browser will remain open for manual inspection...');
    console.log('   Close the browser window when done.');
    
    // Wait for user to close browser
    await page.waitForTimeout(300000); // 5 minutes timeout
    
    await browser.close();
}

testMobileMenu().catch(console.error);