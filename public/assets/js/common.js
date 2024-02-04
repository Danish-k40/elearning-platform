
const formValidationError = (form, errors) => {
    $('.invalid-feedback').remove();

    $.each(errors, function (field, messages) {
        const inputField = $('[name="' + field + '"]', form);
        const errorElement = $('<span class="invalid-feedback">' + messages[0] + '</span>');
        inputField.addClass('is-invalid').after(errorElement);
    });
};

const getForm = (formElement) => {
    const formData = new FormData(formElement);
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });
    return data;
};

const notifySuccess = (message) => {
    toastr.success(message);
};

const notifyError = async (message) => {
    toastr.error(message);
};




const logout = async () => {
    try {
        const token = $('meta[name="csrf-token"]').attr('content');
        const url = "/logout";

        await $.post({
            url: url,
            headers: {
                'X-CSRF-TOKEN': token
            }
        });

        window.location.href = '/';
    } catch (error) {
        notifyError(error.responseJSON.message);
    }
};


