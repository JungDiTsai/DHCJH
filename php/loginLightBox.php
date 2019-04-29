<!-- 登入燈箱 -->
<div id="lightWrap"></div>
<div class="loginBox">
        <i class="fas fa-times"></i>
        <h3>登入</h3>
        <div class="inputBox">
            <i class="fas fa-user fa-1x"></i><input type="text" id="memId" placeholder="User">
        </div>
        <div class="inputBox">
            <i class="fas fa-key fa-1x"></i><input type="password" id="memPsw" placeholder="Password">
        </div>
        <button class="commonBtnSmall" onclick="sendLogin()">登入</button>
        
        <p><a class="showRegistered">註冊</a> / <a class="showForgotPSW">忘記密碼</a></p>
    </div>
    <!-- 註冊燈箱 -->
    <div class="registeredBox">
        <i class="fas fa-times"></i>
        <h3>立即註冊</h3>
        <table>
            <tr>
                <th>會員帳號</th>
                <td><input type="text" id="addMemID"></td>
            </tr>
            <tr id="IdStatus2" style="display:none">
                <td colspan="2" class="prompt"><span>已有此帳號</span></td>
            </tr>
            <tr>
                <th>會員密碼</th>
                <td><input type="password"  id="addMemPsw"></td>
            </tr>
            <tr>
                <th>會員姓名</th>
                <td><input type="text" id="addMemName"></td>
            </tr>
            <tr>
                <th>會員電話</th>
                <td><input type="tel" id="addMemTel"></td>
            </tr>
            <tr>
                <th>會員信箱</th>
                <td><input type="email" id="addMemMail"></td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    <label>
                        <input type="radio" name="sex" value="女" class="addMemSex">
                        <i class="fas fa-venus fa-2x"></i>
                    </label>
                    <label>
                        <input type="radio" name="sex" value="男" class="addMemSex">
                        <i class="fas fa-mars fa-2x"></i>
                    </label>
                </td>
            </tr>
            <tr>
                <th colspan="2"><input type="button" value="註冊帳號" class="commonBtnSmall" id="registeredButton" onclick="registered()"></th>
            </tr>
        </table>
        <div><a class="backLogin">回到登入</a></div>
    </div>
    <!-- 忘記密碼燈箱 -->
    <div class="forgotBox">
        <i class="fas fa-times"></i>
        <h3>忘記密碼</h3>
        <p>請輸入您註冊時的會員信箱，我們會將新的密碼寄至您的信箱。</p>
        <div>會員信箱<input type="email"></div>
        <input type="submit" value="寄送密碼" class="commonBtnSmall">
        <div><a class="backLogin">回到登入</a></div>
    </div>