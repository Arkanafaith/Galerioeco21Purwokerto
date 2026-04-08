import './bootstrap';
// Accordion functionality
document.addEventListener('DOMContentLoaded', function() {
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    
    accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const accordionItem = this.closest('.accordion-item');
            const body = accordionItem.querySelector('.accordion-body');
            const toggle = this.querySelector('.accordion-toggle');
            
            // Close all other accordion items
            document.querySelectorAll('.accordion-item').forEach(item => {
                if (item !== accordionItem) {
                    const otherBody = item.querySelector('.accordion-body');
                    const otherToggle = item.querySelector('.accordion-toggle');
                    otherBody.classList.remove('open');
                    otherToggle.classList.remove('open');
                }
            });
            
            // Toggle current item
            body.classList.toggle('open');
            toggle.classList.toggle('open');
        });
    });
});