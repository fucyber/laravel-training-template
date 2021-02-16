function StartRules() {
  $(".validate-required").each(function() {
    $(this).rules('add', {
      required: true,
      messages: {
        required: "กรุณากรอกข้อมูลให้ครบถ้วน"
      }
    });
  });

  $(".validate-numberonly").each(function() {
    $(this).rules('add', {
      number: true,
      messages: {
        number: "กรุณากรอกตัวเลขเท่านั้น"
      }
    });
  });

  $(".validate-minlength10").each(function() {
    $(this).rules('add', {
      minlength: 10,
      messages: {
        minlength: "กรุณากรอกอย่างน้อย 10 ตัวอักษร"
      }
    });
  });
  $(".validate-maxlength10").each(function() {
    $(this).rules('add', {
      maxlength: 10,
      messages: {
        maxlength: "กรุณากรอกไม่เกิน 10 ตัวอักษร"
      }
    });
  });
  $(".validate-minlength5").each(function() {
    $(this).rules('add', {
      minlength: 5,
      messages: {
        minlength: "กรุณากรอกอย่างน้อย 5 ตัวอักษร"
      }
    });
  });

  $(".validate-minlength9").each(function() {
    $(this).rules('add', {
      minlength: 9,
      messages: {
        minlength: "กรุณากรอกอย่างน้อย 9 ตัวอักษร"
      }
    });
  });

  $(".validate-minlength13").each(function() {
    $(this).rules('add', {
      minlength: 13,
      messages: {
        minlength: "กรุณากรอกอย่างน้อย 13 ตัวอักษร"
      }
    });
  });

  $(".validate-pdf-jpg").each(function() {
    $(this).rules('add', {
      extension: "pdf|PDF|jpg|jpeg|JPG|JPEG",
      messages: {
        extension: "กรุณาอัพโหลดเฉพาะไฟล์ .pdf หรือ .jpg เท่านั้น"
      }
    });
  });

  $(".validate-maxsize3mb").each(function() {
    $(this).rules('add', {
      filesize: 3145728,
      messages: {
        filesize: "กรุณาอัพโหลดไฟล์ขนาดไม่เกิน 3MB. เท่านั้น"
      }
    });
  });

  jQuery.validator.addMethod('filesize', function(value, element, param) {
    return this.optional(element) || (element.files[0].size <= param);
  });

  jQuery.validator.addMethod("validate-email", function(value, element) {
    return this.optional(element) || /^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i.test(value);
  }, "กรุณากรอกอีเมล์ให้ถูกต้อง");

  jQuery.validator.addMethod("validate-thailettersonly", function(value, element) {
    return this.optional(element) || /^[0-9_ก-๙]+$/i.test(value);
  }, "กรุณากรอกภาษาไทยเท่านั้น");

  jQuery.validator.addMethod("validate-englettersonly", function(value, element) {
    return this.optional(element) || /^[a-z," ",0-9]+$/i.test(value);
  }, "กรุณากรอกภาษาอังกฤษเท่านั้น");

  jQuery.validator.addMethod('validate-zerobegin', function(value, element) {
    return this.optional(element) || /^0\d+$/i.test(value);
  }, "กรุณากรอกเบอร์โทรศัพท์ให้ถูกต้อง");

  jQuery.validator.addMethod(
    "validate-nationalid",
    function(value, element) {
      var pid = value;
      pid = pid.toString().replace(/\D/g, '');
      if (pid.length == 13) {
        var sum = 0;
        for (var i = 0; i < pid.length - 1; i++) {
          sum += Number(pid.charAt(i)) * (pid.length - i);
        }
        var last_digit = (11 - sum % 11) % 10;
        $(element).val(pid);
        return pid.charAt(12) == last_digit;
      } else {
        return false;
      }
    },
    "รหัสบัตรประชาชนไม่ถูกต้อง"
  );

}
