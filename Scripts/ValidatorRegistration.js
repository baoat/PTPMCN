Validator({
    form: '#form-registration',
    message: '.message',
    rules: [
        Validator.isRequired('#name', 'Vui lòng nhập tên đầy đủ.'),
        Validator.isRequired('#gioitinh', 'Vui lòng nhập giới tính.'), 
        Validator.isRequired('#sodienthoai', 'Vui lòng nhập số điện thoại.'), 
        Validator.isRequired('#diachi', 'Vui lòng nhập địa chỉ.'), 
        Validator.isRequired('#email', 'Vui lòng nhập email.'), 
        Validator.isRequired('#password', 'Vui lòng nhập mật khẩu.'), 
        Validator.isRequired('#rpassword', 'Vui lòng xác nhận mật khẩu.'), 
         
        Validator.isEmail('#email'),
    ],
})