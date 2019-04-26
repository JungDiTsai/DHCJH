/* 登入燈箱 JS*/
        // 點擊icon開啟登入燈箱----------------------------
        document.querySelector('.fa-user').addEventListener('click', function (e) {

            if( LoginState == "notFound"){
                // 顯示登入燈箱
                let loginBox = document.querySelector('.loginBox');
                let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
                if (style == "block") {
                    document.getElementById('lightWrap').style.setProperty('display', "none");
                    loginBox.style.setProperty('display', "none");
                } else {
                    loginBox.style.setProperty('display', "block");
                    document.getElementById('lightWrap').style.setProperty('display', "block");
                }
            }else{
                window.location.href = "memberCenter.php";
            }
            
        })
        // 點擊關閉----------------------------
        document.querySelector('.loginBox .fa-times').addEventListener('click', function () {
            let loginBox = document.querySelector('.loginBox');
            let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
            if (style == "block") {
                loginBox.style.setProperty('display', "none");
                document.getElementById('lightWrap').style.setProperty('display', "none");
            }
        })
        // 點擊註冊------------------------------
        document.querySelector('.loginBox .showRegistered').addEventListener('click', function () {
            // 隱藏登入燈箱
            let loginBox = document.querySelector('.loginBox');
            loginBox.style.setProperty('display', "none");
            // 顯示註冊燈箱
            let registeredBox = document.querySelector('.registeredBox');
            let style = window.getComputedStyle(registeredBox, null).getPropertyValue('display');
            if (style == "none") {
                registeredBox.style.setProperty('display', "block");
            }
        })
        // 點擊忘記密碼------------------------------
        document.querySelector('.loginBox .showForgotPSW').addEventListener('click', function () {
            // 隱藏登入燈箱
            let loginBox = document.querySelector('.loginBox');
            loginBox.style.setProperty('display', "none");
            // 顯示忘記密碼燈箱
            let forgotBox = document.querySelector('.forgotBox');
            let style = window.getComputedStyle(forgotBox, null).getPropertyValue('display');
            if (style == "none") {
                forgotBox.style.setProperty('display', "block");
            }
        })

        /* 註冊燈箱 JS*/
        // 點擊關閉----------------------------
        document.querySelector('.registeredBox .fa-times').addEventListener('click', function () {
            let registeredBox = document.querySelector('.registeredBox');
            let style = window.getComputedStyle(registeredBox, null).getPropertyValue('display');
            if (style == "block") {
                registeredBox.style.setProperty('display', "none");
                document.getElementById('lightWrap').style.setProperty('display', "none");
            }
        })
        // 點擊回到登入----------------------------
        document.querySelector('.registeredBox .backLogin').addEventListener('click', function () {
            // 隱藏註冊燈箱
            let registeredBox = document.querySelector('.registeredBox');
            registeredBox.style.setProperty('display', "none");
            // 顯示登入燈箱
            let loginBox = document.querySelector('.loginBox');
            let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
            if (style == "none") {
                loginBox.style.setProperty('display', "block");
            }
        })

        /* 忘記密碼燈箱 JS*/
        // 點擊關閉----------------------------
        document.querySelector('.forgotBox .fa-times').addEventListener('click', function () {
            let forgotBox = document.querySelector('.forgotBox');
            let style = window.getComputedStyle(forgotBox, null).getPropertyValue('display');
            if (style == "block") {
                forgotBox.style.setProperty('display', "none");
                document.getElementById('lightWrap').style.setProperty('display', "none");
            }
        })
        // 點擊回到登入----------------------------
        document.querySelector('.forgotBox .backLogin').addEventListener('click', function () {
            // 隱藏忘記密碼燈箱
            let forgotBox = document.querySelector('.forgotBox');
            forgotBox.style.setProperty('display', "none");
            // 顯示登入燈箱
            let loginBox = document.querySelector('.loginBox');
            let style = window.getComputedStyle(loginBox, null).getPropertyValue('display');
            if (style == "none") {
                loginBox.style.setProperty('display', "block");
            }
        })