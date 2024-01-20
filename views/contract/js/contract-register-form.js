$('#contract-register-form').validate({
    rules: {
        registration_code: {
            required: true,

        },
        Customer_ID: {
            required: true,

        },
       
        Sale_Contract: {
            required: true,
            maxlength: 60
        },
        Salesperson_Code: {
            required: true,

        },
        Salesperson_Name: {
            required: true,

        },
        Salesperson_Tel: {
            required: true,
            number: true,
            maxlength: 10
        },
       
    },
    messages: {
        registration_code: {
            required: "โปรดกรอกรหัสทะเบียนสัญญาเข้า ",

        },
        Customer_ID: {
            required: "โปรดเลือกรหัสลูกค้า ",
        },
        Sale_Contract: {
            required: "โปรดกรอกสัญญาซื้อขาย ",
        },

        Salesperson_Code: {
            required: "โปรดกรอกรหัสพนักงานขาย ",
        },
        Salesperson_Name: {
            required: "โปรดกรอกชื่อพนักงานขาย ",
        },
        Salesperson_Tel: {
            required: "โปรดกรอกเบอร์พนักงานขาย ",
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
$.validator.addMethod("numericWithComma", function(value, element) {
    return this.optional(element) || /^[0-9,]+$/.test(value);
}, "โปรดกรอกข้อมูลที่มีเฉพาะตัวเลขและ ,");