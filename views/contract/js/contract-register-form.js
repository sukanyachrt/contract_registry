$('#contract-register-form').validate({
    rules: {
        registration_code: {
            required: true,

        },
        Customer_ID: {
            required: true,

        },
        Installment_payment: {
            required: true,
            maxlength: 60
        },
        Sale_Contract: {
            required: true,
            maxlength: 60
        },
       
    },
    messages: {
        registration_code: {
            required: "โปรดกรอกรหัสทะเบียนสัญญาเข้า ",

        },
        Customer_ID: {
            required: "โปรดเลือกรหัสลูกค้า ",
        },
        Installment_payment: {
            required: "โปรดกรอกชำระเงินงวด",
        },
        Sale_Contract: {
            required: "โปรดกรอกสัญญาซื้อขาย ",
        },
        
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },

    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    },

});