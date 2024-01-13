$('#installation-work-form').validate({
    rules: {
        Installation_code: {
            required: true,

        },
        Contract_delivery_datesend: {
            required: true,
        },
        Contract_delivery_dateoffer: {
            required: true,
        },
        Project_work_page: {
            required: true,
            maxlength: 60
        },
        Order_details: {
            required: true,
        },
        Credit_department: {
            required: true,
        },
        Installation_department: {
            required: true,
        },
        Installation_status: {
            required: true,
        },
    },
    messages: {
        Installation_code: {
            required: "โปรดกรอกรหัสการรับงานติดตั้ง ",

        },
        Contract_delivery_datesend: {
            required: "โปรดเลือกวันส่งของในสัญญา ",
        },
        Contract_delivery_dateoffer: {
            required: "โปรดเลือกวันส่งมอบในสัญญา",
        },
        Project_work_page: {
            required: "โปรดกรอกแบบหน้างานโครงการ ",
        },
        Order_details: {
            required: "โปรดกรอกรายละเอียดการสั่งซื้อ ",
        },
        Credit_department: {
            required: "โปรดกรอกฝ่ายสินเชื่อ ",
        },
        Installation_department: {
            required: "โปรดกรอกฝ่ายติดตั้ง ",
        },
        Installation_status: {
            required: "โปรดเลือกสถานะการติดตั้ง ",
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