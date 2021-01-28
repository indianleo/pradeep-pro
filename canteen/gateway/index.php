<img src="camera.jpg" />
<h3>Camera <br> $0.01</h3>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type='hidden' name='business' value='Paypal_Business_TestAccount_Id'>
<input type='hidden' name='item_name' value='Camera'>
<input type='hidden' name='item_number' value='CAM#N1'>
<input type='hidden' name='amount' value='0.01'>
<input type='hidden' name='no_shipping' value='1'>
<input type='hidden' name='currency_code' value='USD'>
<input type='hidden' name='notify_url' value='http://SITE NAME/payment.php'>
<input type='hidden' name='cancel_return' value='http://SITE NAME/cancel.php'>
<input type='hidden' name='return' value='http://SITE NAME/success.php'>
<!-- COPY and PASTE Your Button Code -->
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="### COPY FROM BUTTON CODE ###">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
</form>

