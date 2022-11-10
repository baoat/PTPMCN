function Validator(options) {
    var arrayRules = {};
    function Validate(inputElement, rule) {
        var errorElement = inputElement.parentElement.querySelector(options.message);
        var errorMessage;
        var rules = arrayRules[rule.selector];
        for(var i = 0; i < rules.length; i++) {
            errorMessage = rules[i](inputElement.value);
            if(errorMessage) {
                errorElement.innerText = errorMessage;
                inputElement.parentElement.classList.add('error');
                break;
            } else {
                errorElement.innerText = '';
                inputElement.parentElement.classList.remove('error');
            }
        }
        return !errorMessage;
        
    }
    var getForm = document.querySelector(options.form);
    if(getForm) {
        
        getForm.onsubmit = function(e) {
            e.preventDefault();
            var isFormValid = true;
            options.rules.forEach(function(rule) {
                
                var inputElement = getForm.querySelector(rule.selector);
                var isValid = Validate(inputElement, rule);

                if(!isValid) {
                    isFormValid = false;
                }
            })
            if(isFormValid) {
                options.onsubmit = function() {
                    
                }
            }
        }

        options.rules.forEach(function(rule) {
            if(Array.isArray(arrayRules[rule.selector])) {
                arrayRules[rule.selector].push(rule.test);
            } else {
                arrayRules[rule.selector] = [rule.test];
            }
            var inputElement = getForm.querySelector(rule.selector);
            if(inputElement) {
                inputElement.onblur = function() {
                    Validate(inputElement, rule);
                }
            }
        });

    }
}
Validator.isRequired = function(selector, message) {
    return {
        selector: selector,
        test: function(value) {
            return value.trim() ? undefined : message || "Vui lòng nhập trường này."
        }
    }
}
Validator.isEmail = function(selector, message) {
    return {
        selector: selector,
        test: function(value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : 'Trường này là phải là email.'
        }
    }
}