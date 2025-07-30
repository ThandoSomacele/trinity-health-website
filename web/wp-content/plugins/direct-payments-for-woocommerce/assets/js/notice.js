// JavaScript code to reload the page after saving settings
document.addEventListener('DOMContentLoaded', function() {
    const successMessage = document.querySelector('.digages_messages_updated.digages_messages_notice');
    if (successMessage) {
        setTimeout(function() {
            window.location.reload();
        }, 1000);
    }
});
