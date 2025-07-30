// Function to check the payment proof checkbox if not already checked
function checkPaymentProofCheckbox() {
    const checkbox = document.querySelector('input[type="checkbox"].digages_enable_payment_proof');
    
    if (checkbox && !checkbox.checked) {
        checkbox.checked = true;
        
        // Trigger change event in case there are listeners
        checkbox.dispatchEvent(new Event('change', { bubbles: true }));
    }
}

// Run immediately when the script loads
checkPaymentProofCheckbox();

// Set up a MutationObserver to watch for dynamically added elements
const observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
        if (mutation.type === 'childList') {
            // Check if any new nodes contain our target checkbox
            mutation.addedNodes.forEach(function(node) {
                if (node.nodeType === Node.ELEMENT_NODE) {
                    // Check if the added node itself is the checkbox
                    if (node.matches && node.matches('input[type="checkbox"].digages_enable_payment_proof')) {
                        if (!node.checked) {
                            node.checked = true;
                            node.dispatchEvent(new Event('change', { bubbles: true }));
                        }
                    }
                    // Check if the added node contains the checkbox
                    const checkbox = node.querySelector && node.querySelector('input[type="checkbox"].digages_enable_payment_proof');
                    if (checkbox && !checkbox.checked) {
                        checkbox.checked = true;
                        checkbox.dispatchEvent(new Event('change', { bubbles: true }));
                    }
                }
            });
        }
    });
});

// Start observing the document for changes
observer.observe(document.body, {
    childList: true,
    subtree: true
});

// Also check periodically (every 2 seconds) as a fallback
setInterval(checkPaymentProofCheckbox, 2000);

// Check when the DOM is fully loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', checkPaymentProofCheckbox);
} else {
    checkPaymentProofCheckbox();
}