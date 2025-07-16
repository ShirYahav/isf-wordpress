jQuery(document).ready(function ($) {
    const validationFields = [
        { name: 'first_name', validator: validateNotEmpty, message: 'Please enter your first name.' },
        { name: 'last_name', validator: validateNotEmpty, message: 'Please enter your last name.' },
        { name: 'job_title', validator: validateNotEmpty, message: 'Please enter your job title.' },
        { name: 'affiliation', validator: validateNotEmpty, message: 'Please enter your affiliation.' },
        { name: 'email', validator: validateEmail, message: 'Please enter a valid email address.' },
        { name: 'country_code', validator: validateCountryCode, message: 'Please enter a valid country code (e.g. +1).' },
        { name: 'phone_number', validator: validatePhone, message: 'Please enter a valid phone number.' }
    ];

    function showError($input, message) {
        clearError($input);
        $input.addClass('input-error');
        $('<div class="error-message" role="alert">')
            .text(message)
            .appendTo($input.closest('.form-row'));
    }

    function clearError($input) {
        $input.removeClass('input-error')
            .closest('.form-row')
            .find('.error-message')
            .remove();
    }

    function initValidation($form) {
        validationFields.forEach(field => {
            const $input = $form.find(`input[name="${field.name}"]`);
            if (!$input.length) return;
            $input.on('blur', () => {
                const val = ($input.val() || '').trim();
                if (!field.validator(val)) {
                    showError($input, field.message);
                } else {
                    clearError($input);
                }
            });
        });
    }

    function runAjax($form) {
        const data = $form.serialize()
            + '&action=practice_join_us'
            + '&nonce=' + joinUsAjax.nonce;
        $.post(joinUsAjax.ajaxUrl, data, function (response) {
            $form.find('.form-message').text(response.data.message);
            if (response.success) {
                $form[0].reset();
            }
        });
    }

    $('.join-us-form').each((_, formEl) => {
        const $form = $(formEl);
        initValidation($form);

        $form.on('submit', function (e) {
            e.preventDefault();
            let isValid = true;

            validationFields.forEach(field => {
                const $input = $form.find(`input[name="${field.name}"]`);
                if (!$input.is(':hidden')) {
                    const val = ($input.val() || '').trim();
                    if (!field.validator(val)) {
                        showError($input, field.message);
                        isValid = false;
                    } else {
                        clearError($input);
                    }
                }
            });

            if (!isValid) {
                $form.find('.form-message').text('Please fix the errors above before submitting.');
                return;
            }

            runAjax($form);
        });
    });
});

function validateNotEmpty(str) { return str.length > 0; }
function validateEmail(str) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(str); }
function validateCountryCode(str) { return /^\+\d{1,4}$/.test(str); }
function validatePhone(str) { return /^\d{6,14}$/.test(str); }
