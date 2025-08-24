const { chromium } = require('playwright');

async function simpleTest() {
    const browser = await chromium.launch({ headless: false });
    const context = await browser.newContext({
        viewport: { width: 375, height: 812 }
    });
    const page = await context.newPage();

    console.log('🔍 Simple mobile menu test...\n');

    // Collect console messages
    const consoleMessages = [];
    page.on('console', msg => {
        consoleMessages.push(`${msg.type()}: ${msg.text()}`);
        console.log(`Console ${msg.type()}: ${msg.text()}`);
    });

    // Navigate to the site
    await page.goto('https://trinity-health-website.ddev.site');
    
    // Wait for page to load
    await page.waitForTimeout(3000);

    // Check if navigation script is loaded and working
    const scriptCheck = await page.evaluate(() => {
        const scripts = Array.from(document.querySelectorAll('script[src]'));
        const navigationScript = scripts.find(s => s.src.includes('navigation.js'));
        
        return {
            navigationScriptFound: !!navigationScript,
            navigationScriptSrc: navigationScript ? navigationScript.src : null,
            elementsFound: {
                menuToggle: !!document.querySelector('.mobile-menu-toggle'),
                mobileMenu: !!document.querySelector('.mobile-menu')
            },
            lucideAvailable: typeof lucide !== 'undefined'
        };
    });

    console.log('\n📋 Script check results:');
    console.log(JSON.stringify(scriptCheck, null, 2));

    // Try clicking the hamburger menu
    console.log('\n🖱️  Attempting to click hamburger menu...');
    
    try {
        await page.click('.mobile-menu-toggle');
        console.log('✅ Click successful');
        
        await page.waitForTimeout(1000);
        
        // Check if menu is now visible
        const menuState = await page.evaluate(() => {
            const menu = document.querySelector('.mobile-menu');
            return {
                exists: !!menu,
                hasHiddenClass: menu ? menu.classList.contains('hidden') : null,
                isVisible: menu ? !menu.classList.contains('hidden') : null
            };
        });
        
        console.log('Menu state after click:');
        console.log(JSON.stringify(menuState, null, 2));
        
        // Take screenshot after click
        await page.screenshot({ path: 'after-click.png' });
        console.log('✅ Screenshot saved: after-click.png');
        
    } catch (error) {
        console.log(`❌ Click failed: ${error.message}`);
    }

    console.log('\n📝 All console messages:');
    consoleMessages.forEach(msg => console.log(`   ${msg}`));

    await browser.close();
}

simpleTest().catch(console.error);