jQuery(document).ready(function ($) {
    const $forms = jQuery('.join-us-form');
    $forms.each((_, formEl) => {
        const $form = jQuery(formEl);
        initValidation($form);
    });
});

function initValidation($form) {
    const fields = [
        { name: 'first_name', validator: validateNotEmpty, message: 'Please enter your first name.' },
        { name: 'last_name', validator: validateNotEmpty, message: 'Please enter your last name.' },
        { name: 'job_title', validator: validateNotEmpty, message: 'Please enter your job title.' },
        { name: 'affiliation', validator: validateNotEmpty, message: 'Please enter your affiliation.' },
        { name: 'email', validator: validateEmail, message: 'Please enter a valid email address.' },
        { name: 'country_code', validator: validateCountryCode, message: 'Please enter a valid country code (e.g. +1).' },
        { name: 'phone_number', validator: validatePhone, message: 'Please enter a valid phone number.' },
    ];

    fields.forEach(field => {
        const $input = $form.find(`input[name="${field.name}"]`);
        if (!$input.length) return;
        $input.on('blur', () => {
            if ($input.is(':hidden')) return;
            const val = ($input.val() || '').trim();
            if (!field.validator(val)) {
                showError($input, field.message);
            } else {
                clearError($input);
            }
        });
    });

    $form.on('submit', e => {
        let isValid = true;

        fields.forEach(field => {
            const $input = $form.find(`input[name="${field.name}"]`);
            if ($input.is(':hidden')) return;
            const val = ($input.val() || '').trim();
            if (!field.validator(val)) {
                showError($input, field.message);
                isValid = false;
            }
            else {
                clearError($input);
            }
        });

        if (!isValid) {
            e.preventDefault();
            $form.find('.form-message')
                .text('Please fix the errors above before submitting.');
        }
    });
}

function showError($input, message) {
    clearError($input);
    $input.addClass('input-error');
    const $err = jQuery(`<div class="error-message" role="alert">${message}</div>`);
    $input.closest('.form-row').append($err);
}

function clearError($input) {
    $input.removeClass('input-error');
    $input.closest('.form-row').find('.error-message').remove();
}

function validateNotEmpty(str) {
    return str.length > 0;
}

function validateEmail(str) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(str);
}

function validateCountryCode(str) {
    const re = /^\+\d{1,4}$/;
    return re.test(str);
}

function validatePhone(str) {
    const re = /^\d{6,14}$/;
    return re.test(str);
}
