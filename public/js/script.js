// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Star rating interactivity
document.addEventListener('DOMContentLoaded', function() {
    const starRating = document.querySelector('.star-rating');
    if (starRating) {
        const stars = starRating.querySelectorAll('span');
        let selectedRating = 5; // Default 5 stars
        
        stars.forEach((star, index) => {
            star.addEventListener('click', function() {
                selectedRating = index + 1;
                updateStars(selectedRating);
            });
            
            star.addEventListener('mouseenter', function() {
                updateStars(index + 1);
            });
        });
        
        starRating.addEventListener('mouseleave', function() {
            updateStars(selectedRating);
        });
        
        function updateStars(rating) {
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.style.color = '#fbbf24';
                } else {
                    star.style.color = '#d1d5db';
                }
            });
        }
        
        // Initialize with 5 stars
        updateStars(5);
    }
    
    // Accordion functionality
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    
    accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const item = this.parentElement;
            const body = item.querySelector('.accordion-body');
            const toggle = this.querySelector('.accordion-toggle');
            const isOpen = body.classList.contains('open');
            
            // Close all accordions
            document.querySelectorAll('.accordion-body').forEach(b => {
                b.classList.remove('open');
            });
            document.querySelectorAll('.accordion-toggle').forEach(t => {
                t.classList.remove('open');
            });
            document.querySelectorAll('.accordion-header').forEach(h => {
                h.classList.remove('active');
            });
            
            // Open clicked accordion if it was closed
            if (!isOpen) {
                body.classList.add('open');
                toggle.classList.add('open');
                this.classList.add('active');
            }
        });
    });
});

// Form submission handler (you can customize this)
const testimonialForm = document.querySelector('.testimonial-form-card form');
if (testimonialForm) {
    testimonialForm.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Terima kasih atas ulasan Anda! (Form akan dihubungkan ke database)');
        // Nanti akan dihubungkan ke backend untuk save ke database
    });
}