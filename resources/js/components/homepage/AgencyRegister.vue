
<template>
    <form>
        <div class="container">
            <div class="info-ticket">
                <h1>Đăng ký đại lý</h1>
                <div class="input-row">
                    <div style="text-align: left;" class="input-field">
                        <label for="fullName">Họ và tên</label> <br> <br>
                        <input type="text" id="fullName">
                    </div>
                    <div style="text-align: left;" class="input-field">
                        <label for="email">Email</label> <br> <br>
                        <input type="tel" id="email">
                    </div>
                </div>
                <div class="input-row">
                    <div style="text-align: left;" class="input-field">
                        <label for="phoneNumber">Số điện thoại</label> <br> <br>
                        <input type="text" id="phoneNumber">
                    </div>
                    <div style="text-align: left;" class="input-field">
                        <label for="nameBasis">Tên cơ sở dịch vụ</label> <br> <br>
                        <input type="text" id="nameBasis">
                    </div>
                </div>
                <div class="input-row">
                    <div style="text-align: left;" class="input-field">
                        <label for="business">Ngành nghề kinh doanh</label> <br> <br>
                        <input type="text" id="business">
                    </div>
                    <div style="text-align: left;" class="input-field">
                        <label for="address">Địa chỉ</label> <br> <br>
                        <input type="text" id="address">
                    </div>
                </div>
                <div style="text-align: left;" class="input-field">
                    <label for="area">Khu vực</label> <br> <br>
                    <input type="text" id="area">
                </div>
            </div>
        </div>
        <button class="submit" type="submit">Đăng ký</button>
    </form>
</template>

<script>

</script>

<style scoped>
.container {
    display: flex;
    align-items: flex-start;
    margin-right: 20px;
    margin-top: 80px;
}

.info-ticket {
    border: 1px solid #E9F0F0;
    background-color: #F7FAFA;
    padding: 20px;
    flex: 1;
    border-radius: 10px;
    margin-top: 20px;

}

.input-row {
    display: flex;
    align-items: flex-start;
}

.input-field {
    margin-right: 20px;
    margin-bottom: 10px;
}

.input-field label {
    font-size: 16px;
    margin-right: 5px;
}

.input-field input {
    width: 550px;
    height: 40px;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #E9F0F0;
    border-radius: 5px;
    outline: none;
}

.submit {
    width: 150px;
    /* Độ rộng của nút */
    height: 50px;
    /* Độ cao của nút */
    font-size: 18px;
    /* Cỡ chữ cho nút */
    background-color: #FF3366;
    /* Màu nền là màu hồng */
    border: none;
    /* Không viền */
    border-radius: 10px;
    /* Độ bo góc */
    color: #FFFFFF;
    /* Màu chữ là trắng */
    margin-top: 30px;
}

.submit:hover {
    background-color: rgb(228, 72, 111);
    /* Màu nền hover là màu hồng nhạt hơn */
    cursor: pointer;
    /* Con trỏ chuột trở thành con trỏ tay khi hover */
}
</style>
