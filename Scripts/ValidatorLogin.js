Validator({
    form: '#formLogin',
    message: '.message',
    rules: [
        Validator.isRequired('#email', 'Vui lòng nhập email.'),
        Validator.isRequired('#password', 'Vui lòng nhập mật khẩu.'),
        Validator.isEmail('#email', 'Trường này phải là email.'),
    ]
})