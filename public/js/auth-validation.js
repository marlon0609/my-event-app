// Authentication form validation and interactions
document.addEventListener('DOMContentLoaded', function() {
    
    // Login form validation
    const loginForm = document.querySelector('form[action*="login"]');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            const email = this.querySelector('input[name="email"]');
            const password = this.querySelector('input[name="password"]');
            
            // Clear previous custom validation
            clearValidationErrors();
            
            let hasErrors = false;
            
            // Email validation
            if (!email.value.trim()) {
                showFieldError(email, 'L\'adresse e-mail est obligatoire.');
                hasErrors = true;
            } else if (!isValidEmail(email.value)) {
                showFieldError(email, 'L\'adresse e-mail n\'est pas valide.');
                hasErrors = true;
            }
            
            // Password validation
            if (!password.value.trim()) {
                showFieldError(password, 'Le mot de passe est obligatoire.');
                hasErrors = true;
            } else if (password.value.length < 6) {
                showFieldError(password, 'Le mot de passe doit contenir au moins 6 caractères.');
                hasErrors = true;
            }
            
            if (hasErrors) {
                e.preventDefault();
            }
        });
    }
    
    // Registration form validation
    const registerForm = document.querySelector('form[action*="register"]');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            const name = this.querySelector('input[name="name"]');
            const email = this.querySelector('input[name="email"]');
            const password = this.querySelector('input[name="password"]');
            const passwordConfirmation = this.querySelector('input[name="password_confirmation"]');
            const terms = this.querySelector('input[name="terms"]');
            
            // Clear previous custom validation
            clearValidationErrors();
            
            let hasErrors = false;
            
            // Name validation
            if (!name.value.trim()) {
                showFieldError(name, 'Le nom est obligatoire.');
                hasErrors = true;
            } else if (name.value.length > 255) {
                showFieldError(name, 'Le nom ne peut pas dépasser 255 caractères.');
                hasErrors = true;
            }
            
            // Email validation
            if (!email.value.trim()) {
                showFieldError(email, 'L\'adresse e-mail est obligatoire.');
                hasErrors = true;
            } else if (!isValidEmail(email.value)) {
                showFieldError(email, 'L\'adresse e-mail n\'est pas valide.');
                hasErrors = true;
            }
            
            // Password validation
            if (!password.value.trim()) {
                showFieldError(password, 'Le mot de passe est obligatoire.');
                hasErrors = true;
            } else if (password.value.length < 8) {
                showFieldError(password, 'Le mot de passe doit contenir au moins 8 caractères.');
                hasErrors = true;
            }
            
            // Password confirmation validation
            if (!passwordConfirmation.value.trim()) {
                showFieldError(passwordConfirmation, 'La confirmation du mot de passe est obligatoire.');
                hasErrors = true;
            } else if (password.value !== passwordConfirmation.value) {
                showFieldError(passwordConfirmation, 'La confirmation du mot de passe ne correspond pas.');
                hasErrors = true;
            }
            
            // Terms validation
            if (!terms.checked) {
                showFieldError(terms, 'Vous devez accepter les conditions d\'utilisation.');
                hasErrors = true;
            }
            
            if (hasErrors) {
                e.preventDefault();
            }
        });
    }
    
    // Forgot password form validation
    const forgotPasswordForm = document.querySelector('form[action*="forgot-password"]');
    if (forgotPasswordForm) {
        forgotPasswordForm.addEventListener('submit', function(e) {
            const email = this.querySelector('input[name="email"]');
            
            // Clear previous custom validation
            clearValidationErrors();
            
            let hasErrors = false;
            
            // Email validation
            if (!email.value.trim()) {
                showFieldError(email, 'L\'adresse e-mail est obligatoire.');
                hasErrors = true;
            } else if (!isValidEmail(email.value)) {
                showFieldError(email, 'L\'adresse e-mail n\'est pas valide.');
                hasErrors = true;
            }
            
            if (hasErrors) {
                e.preventDefault();
            }
        });
    }
    
    // Real-time validation feedback
    document.querySelectorAll('input[type="email"]').forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value.trim() && !isValidEmail(this.value)) {
                showFieldError(this, 'L\'adresse e-mail n\'est pas valide.');
            } else {
                clearFieldError(this);
            }
        });
    });
    
    document.querySelectorAll('input[type="password"]').forEach(input => {
        input.addEventListener('input', function() {
            const minLength = this.name === 'password' ? 8 : 6;
            if (this.value.length > 0 && this.value.length < minLength) {
                showFieldError(this, `Le mot de passe doit contenir au moins ${minLength} caractères.`);
            } else {
                clearFieldError(this);
            }
        });
    });
    
    // Password confirmation real-time validation
    const passwordConfirmation = document.querySelector('input[name="password_confirmation"]');
    if (passwordConfirmation) {
        passwordConfirmation.addEventListener('input', function() {
            const password = document.querySelector('input[name="password"]');
            if (this.value.length > 0 && password.value !== this.value) {
                showFieldError(this, 'La confirmation du mot de passe ne correspond pas.');
            } else {
                clearFieldError(this);
            }
        });
    }
    
    // Auto-dismiss alerts after 5 seconds
    document.querySelectorAll('.alert').forEach(alert => {
        if (!alert.querySelector('.btn-close')) return;
        
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });
});

// Helper functions
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showFieldError(field, message) {
    clearFieldError(field);
    
    field.classList.add('is-invalid');
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'invalid-feedback';
    errorDiv.textContent = message;
    
    field.parentNode.appendChild(errorDiv);
}

function clearFieldError(field) {
    field.classList.remove('is-invalid');
    const errorDiv = field.parentNode.querySelector('.invalid-feedback');
    if (errorDiv) {
        errorDiv.remove();
    }
}

function clearValidationErrors() {
    document.querySelectorAll('.is-invalid').forEach(field => {
        field.classList.remove('is-invalid');
    });
    document.querySelectorAll('.invalid-feedback').forEach(error => {
        error.remove();
    });
}

// Loading state for forms
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function() {
        const submitBtn = this.querySelector('button[type="submit"]');
        if (submitBtn && !this.querySelector('.is-invalid')) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Chargement...';
            
            // Re-enable after 10 seconds as fallback
            setTimeout(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = submitBtn.getAttribute('data-original-text') || 'Soumettre';
            }, 10000);
        }
    });
    
    // Store original button text
    const submitBtn = form.querySelector('button[type="submit"]');
    if (submitBtn) {
        submitBtn.setAttribute('data-original-text', submitBtn.innerHTML);
    }
});
