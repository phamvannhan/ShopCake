	<fieldset>
	    <h2 class="fs-title">ĐĂNG NHẬP</h2>
	    <h3 class="fs-subtitle">Đã là thành viên của ShopCake</h3>
	    <!-- fieldsets -->
	    <div class="form-block">
	    	<label>Tên:</label>
	    	<input type="text" name="name" placeholder="user name"/>
	    </div>
	    <div class="form-block">
			<label>Giới tính </label>
			<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
			<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>				
		</div>
		<div class="form-block">
			<label for="email">Email*</label>
			<input type="email" id="email" name="email" required placeholder="expample@gmail.com" class="form-control">
		</div>
		<div class="form-block">
			<label for="password">Password*</label>
			<input type="password" id="password" name="password" required placeholder="***********" class="form-control">
		</div>

		<div class="form-block">
			<label for="date">Ngày Sinh*</label>
			<input type="text" class="form-control datepicker" id="start_date" name="date_of_birth" data-date-format="{!! JS_DATE !!}" placeholder="dd-mm-yyyy">
		</div>
	    
	    <input type="button" name="next" class="next action-button" value="Tiếp Tục"/>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Địa Chỉ Giao Hàng</h2>
        <h3 class="fs-subtitle">Giao Hàng nhanh</h3>
        <div class="form-block">
			<label for="address">Địa chỉ Giao Hàng*</label>
			<input name="address" type="text" id="address" placeholder="Street Address" class="form-control" required >
		</div>
		<div class="form-block">
			<label for="city">Tỉnh/Thành Phố*</label>
			<input name="city" type="text" id="city" placeholder="=> insert country-city.sql" class="form-control" required >
		</div>
		<div class="form-block">
			<label for="country">Quận/Huyện*</label>
			<input name="country" type="text" id="country" placeholder="=> insert countryside.sql" class="form-control" required >
		</div>
		<div class="form-block">
			<label for="district">Phường/Xã*</label>
			<input name="district" type="text" id="district" placeholder="=> insert district.sql" class="form-control" required >
		</div>
		
		<div class="form-block">
			<label for="phone">Điện Thoại Di Động*</label>
			<input name="phone" type="text" id="phone" class="form-control" required placeholder="Nhập số điện thoại">
		</div>
		
		<div class="form-block">
			<label for="note">Ghi chú</label>
			<textarea id="notes" class="form-control" name="note" placeholder="Ví dụ: giao hàng nhanh zùm"></textarea>
		</div>
        <input type="button" name="next" class="next action-button form-control" value="Giao đến địa chỉ này"/>
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Thanh Toán & Đặt Mua</h2>
        <h3 class="fs-subtitle">Chọn hình thức thanh toán</h3>
        <div class="your-order-body">
			<ul class="payment_methods methods">
				<li class="payment_method_bacs">
					<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
					<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
					<div class="payment_box payment_method_bacs" style="display: block;">
						Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
					</div>						
				</li>

				<li class="payment_method_cheque">
					<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
					<label for="payment_method_cheque">Chuyển khoản </label>
					<div class="payment_box payment_method_cheque" style="display: none;">
						Chuyển tiền đến tài khoản sau:
						<br>- Số tài khoản: 123 456 789
						<br>- Chủ TK: Nguyễn A
						<br>- Ngân hàng ACB, Chi nhánh TPHCM
					</div>						
				</li>
				
			</ul>
		</div>
        <input type="button" name="previous" class="previous action-button-previous" value="Về Trước"/>
        <input type="submit" name="submit" class="submit action-button" value="Đặt Hàng"/>
    </fieldset>