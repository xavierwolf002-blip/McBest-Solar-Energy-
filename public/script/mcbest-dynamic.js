/**
 * McBest Dynamic Content Loader
 * Fetches content from database APIs and renders dynamically
 */

// Configuration - Dynamically determine API base path
const currentPath = window.location.pathname;
const basePathMatch = currentPath.match(/^(\/.*?\/)?public\//);
const basePath = basePathMatch ? basePathMatch[1] + 'public' : '';
const API_BASE = basePath + '/mcbest';
const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.content;

// ============================================
// PORTFOLIO/PROJECTS LOADER
// ============================================
async function loadFeaturedProjects() {
    try {
        const response = await fetch(`${API_BASE}/portfolio/featured`);
        const data = await response.json();
        
        if (data.success && data.projects) {
            renderProjects(data.projects);
        }
    } catch (error) {
        console.error('Error loading projects:', error);
    }
}

function renderProjects(projects) {
    const portfolioGrid = document.querySelector('.portfolio-grid');
    if (!portfolioGrid) return;
    
    portfolioGrid.innerHTML = projects.map(project => `
        <div class="portfolio-item">
            <img src="${project.image_url || 'https://images.unsplash.com/photo-1509391366360-2e959784a276?w=800'}" 
                 alt="${project.title}" 
                 loading="lazy">
            <div class="portfolio-overlay">
                <h3>${project.title}</h3>
                <p>${project.location}</p>
            </div>
        </div>
    `).join('');
}

// ============================================
// TEAM MEMBERS LOADER
// ============================================
async function loadTeamMembers() {
    try {
        const response = await fetch(`${API_BASE}/team`);
        const data = await response.json();
        
        if (data.success && data.team) {
            renderTeam(data.team);
        }
    } catch (error) {
        console.error('Error loading team:', error);
    }
}

function renderTeam(members) {
    const teamGrid = document.querySelector('.team-grid');
    if (!teamGrid) return;
    
    teamGrid.innerHTML = members.map(member => `
        <div class="team-member">
            <img src="${member.image_url || 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=800'}" 
                 alt="${member.name}" 
                 loading="lazy">
            <div class="team-badge">${member.role}</div>
            <h3>${member.name}</h3>
            <p>${member.bio}</p>
        </div>
    `).join('');
}

// ============================================
// FAQs LOADER
// ============================================
async function loadFaqs() {
    try {
        const response = await fetch(`${API_BASE}/faqs`);
        const data = await response.json();
        
        if (data.success && data.faqs) {
            renderFaqs(data.faqs);
        }
    } catch (error) {
        console.error('Error loading FAQs:', error);
    }
}

function renderFaqs(faqs) {
    const faqContainer = document.querySelector('.faq-container');
    if (!faqContainer) return;
    
    faqContainer.innerHTML = faqs.map(faq => `
        <div class="faq-item">
            <button class="faq-question">
                <span>${faq.question}</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="faq-answer">
                <p>${faq.answer}</p>
            </div>
        </div>
    `).join('');
    
    // Re-attach FAQ accordion listeners
    attachFaqListeners();
}

function attachFaqListeners() {
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            const item = question.parentElement;
            const isActive = item.classList.contains('active');
            
            document.querySelectorAll('.faq-item').forEach(faqItem => {
                faqItem.classList.remove('active');
            });
            
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });
}

// ============================================
// CONTACT FORM HANDLER
// ============================================
function initContactForm() {
    const contactForm = document.getElementById('whatsappContactForm');
    if (!contactForm) return;
    
    contactForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const submitBtn = document.getElementById('whatsappSubmitBtn');
        const originalButtonText = submitBtn.innerHTML;
        
        // Get form data
        const formData = {
            name: document.getElementById('wa_name').value.trim(),
            email: document.getElementById('wa_email').value.trim(),
            phone: document.getElementById('wa_phone').value.trim(),
            service: document.getElementById('wa_service').value,
            message: document.getElementById('wa_message').value.trim()
        };
        
        // Clear previous errors
        document.querySelectorAll('.error-message').forEach(el => el.classList.remove('show'));
        document.querySelectorAll('.form-group input, .form-group textarea').forEach(el => el.classList.remove('error'));
        
        // Show loading
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
        submitBtn.disabled = true;
        
        try {
            const response = await fetch(`${API_BASE}/contact`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            });
            
            const data = await response.json();
            
            if (data.success) {
                showToast(data.message || 'Thank you! We will contact you within 24 hours.', 'success');
                contactForm.reset();
                
                // Still open WhatsApp for instant communication
                const whatsappMessage = `Hello McBest! I just submitted a consultation request.\n\nName: ${formData.name}\nService: ${formData.service}\nMessage: ${formData.message}`;
                const whatsappUrl = `https://wa.me/2347067823798?text=${encodeURIComponent(whatsappMessage)}`;
                setTimeout(() => window.open(whatsappUrl, '_blank'), 1000);
            } else {
                // Handle validation errors
                if (data.errors) {
                    Object.keys(data.errors).forEach(field => {
                        const input = document.getElementById(`wa_${field}`);
                        if (input) {
                            input.classList.add('error');
                            const errorMsg = document.getElementById(`${field}Error`);
                            if (errorMsg) {
                                errorMsg.textContent = data.errors[field][0];
                                errorMsg.classList.add('show');
                            }
                        }
                    });
                    showToast('Please fix the errors in the form', 'error');
                } else {
                    showToast(data.message || 'An error occurred. Please try again.', 'error');
                }
            }
        } catch (error) {
            console.error('Contact form error:', error);
            showToast('Network error. Please check your connection and try again.', 'error');
        } finally {
            submitBtn.innerHTML = originalButtonText;
            submitBtn.disabled = false;
        }
    });
}

// ============================================
// NEWSLETTER FORM HANDLER
// ============================================
function initNewsletterForm() {
    const newsletterForm = document.getElementById('newsletterForm');
    if (!newsletterForm) return;
    
    newsletterForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const emailInput = document.getElementById('newsletterEmail');
        const button = newsletterForm.querySelector('button[type="submit"]');
        const originalText = button.textContent;
        
        const email = emailInput.value.trim();
        
        if (!email || !isValidEmail(email)) {
            showToast('Please enter a valid email address', 'error');
            return;
        }
        
        button.textContent = 'Subscribing...';
        button.disabled = true;
        
        try {
            const response = await fetch(`${API_BASE}/newsletter/subscribe`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ email })
            });
            
            const data = await response.json();
            
            if (data.success) {
                showToast(data.message || 'Successfully subscribed!', 'success');
                newsletterForm.reset();
            } else {
                const errorMsg = data.errors?.email?.[0] || data.message || 'Subscription failed';
                showToast(errorMsg, 'error');
            }
        } catch (error) {
            console.error('Newsletter error:', error);
            showToast('Network error. Please try again.', 'error');
        } finally {
            button.textContent = originalText;
            button.disabled = false;
        }
    });
}

// ============================================
// CALLBACK FORM HANDLER
// ============================================
function initCallbackForm() {
    const callbackForm = document.getElementById('callbackForm');
    if (!callbackForm) return;
    
    callbackForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const button = callbackForm.querySelector('button[type="submit"]');
        const originalText = button.innerHTML;
        
        const formData = {
            phone: document.getElementById('callbackPhone').value.trim(),
            name: document.getElementById('callbackName').value.trim(),
            organization: document.getElementById('callbackOrganization').value.trim()
        };
        
        if (!formData.phone) {
            showToast('Please enter your phone number', 'error');
            return;
        }
        
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
        button.disabled = true;
        
        try {
            const response = await fetch(`${API_BASE}/callback`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            });
            
            const data = await response.json();
            
            if (data.success) {
                showToast(data.message || 'Callback request received!', 'success');
                callbackForm.reset();
            } else {
                const errorMsg = data.errors?.phone?.[0] || data.message || 'Request failed';
                showToast(errorMsg, 'error');
            }
        } catch (error) {
            console.error('Callback error:', error);
            showToast('Network error. Please try again.', 'error');
        } finally {
            button.innerHTML = originalText;
            button.disabled = false;
        }
    });
}

// ============================================
// HELPER FUNCTIONS
// ============================================
function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function showToast(message, type = 'success') {
    const toastContainer = document.getElementById('toastContainer');
    if (!toastContainer) return;
    
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    
    let icon = 'fa-check-circle';
    if (type === 'error') icon = 'fa-exclamation-circle';
    if (type === 'warning') icon = 'fa-exclamation-triangle';
    
    toast.innerHTML = `
        <i class="fas ${icon}"></i>
        <span>${message}</span>
    `;
    
    toastContainer.appendChild(toast);
    
    setTimeout(() => toast.classList.add('show'), 10);
    
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 4000);
}

// ============================================
// INITIALIZE ON DOM LOAD
// ============================================
document.addEventListener('DOMContentLoaded', function() {
    // Load dynamic content
    loadFeaturedProjects();
    loadTeamMembers();
    loadFaqs();
    
    // Initialize forms
    initContactForm();
    initNewsletterForm();
    initCallbackForm();
    
    console.log('McBest Dynamic Content Loaded Successfully!');
});
