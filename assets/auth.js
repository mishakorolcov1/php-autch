$(document).ready(function(){
    $(document).on('click', '#logIn', function(){
        let userEmail = $('[name="user_email"]').val();
        let userPassword = $('[name="user_password"]').val();
        checkAuthData(userEmail, userPassword);
    });
    
    $(document).on('click', '#register', function(){
        let registerData = {};
        registerData.user_first_name = $('[name="user_first_name"]').val();
        registerData.user_last_name = $('[name="user_last_name"]').val();
        registerData.user_email = $('[name="user_email"]').val();
        registerData.user_phone = $('[name="user_phone"]').val();
        registerData.user_password = $('[name="user_password"]').val();
        checkRegisterData(registerData);
    });
    
    function checkRegisterData(registerData){
        $('.form-control').removeClass('form-control-error');
        let isValid = true;
        let user_first_name = false;
        let user_last_name = false;
        let user_email = false;
        let user_phone = false;
        let user_password = false;
        user_first_name = $.trim(registerData.user_first_name);
        user_last_name = $.trim(registerData.user_last_name);
        user_email = $.trim(registerData.user_email);
        user_phone = $.trim(registerData.user_phone);
        user_password = $.trim(registerData.user_password);
        
    


        if(user_first_name  == '' || user_last_name == ''){
            isValid = false;
        }
        if(user_email  == '' || user_phone  == ''){
            isValid = false;
        }
        if(user_password  == ''){
           if(user_password  == '') user_password_HasError = true;
        }
        
        
        
         if(!user_first_name){
            $('[name="user_first_name"]').addClass('form-control-error');
        }
        if(!user_last_name ){
            $('[name="user_last_name"]').addClass('form-control-error');
        }
        if(!user_email){
            $('[name="user_email"]').addClass('form-control-error');
        }
        if(!user_phone){
            $('[name="user_phone"]').addClass('form-control-error');
        }
        if(!user_password){
            $('[name="user_password"]').addClass('form-control-error');
        }
        
        
        if(isValid){
           register(registerData);
        }
        // has-error

    }

    function checkAuthData(userEmail, userPassword){
        $('.form-control').removeClass('form-control-error');
        let isValid = true;
        let emailHasError = false;
        let passwordHasError = false;
        userEmail = $.trim(userEmail);
        userPassword = $.trim(userPassword);
        if(userEmail == '' || userPassword == ''){
            isValid = false;
            if(userEmail == '') emailHasError = true;
            if(userPassword == '') passwordHasError = true;
        }
        // валідація!
        let regExp = false;
        // email 
        regExp = new RegExp(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/);
        if(!regExp.test(userEmail)){
            isValid = false;
            emailHasError = true;
        }
        // password
        regExp = new RegExp(/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/);
        if(!regExp.test(userPassword)){
            isValid = false;
            passwordHasError = true;
        }

        if(emailHasError){
            //$('[name="user_email"]').closest('.form-group').addClass('has-error');
            $('[name="user_email"]').addClass('form-control-error');
        }
        if(passwordHasError){
            //$('[name="user_password"]').closest('.form-group').addClass('has-error');
            $('[name="user_password"]').addClass('form-control-error');
        }
        console.log('checkAuthData', emailHasError, passwordHasError);
        if(isValid){
           auth(userEmail, userPassword);
        }
        // has-error

    }

    function auth(userEmail, userPassword){
        $.ajax({
            url: '/api/post.php',
            type: 'POST',
            data: {
                authData: {
                    user_email: userEmail,
                    user_password: userPassword,
                },
                type: 'auth'
            },
            success: function(response){
                try{
                    response = JSON.parse(response);
                    if(!response.error){
                       window.location.href = "/?page=home";
                    }
                }catch(e){
                    
                }
            }
        });
    }
    
    function register(registerData){
        $.ajax({
            url: '/api/post.php',
            type: 'POST',
            data: {
                registerData: registerData,
                type: 'register'
            },
            success: function(response){
                try{
                    response = JSON.parse(response);
                    //alert('ok');
                    if(!response.error){
                       window.location.href = "/?page=home";
                    }
                }catch(e){
                    
                }
            }
        });
    }
});


 