<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="upload" value="1">
  <input type="hidden" name="business" value="seller@designerfotos.com">

  <?php $count=0; ?>

  <?php foreach($contents as $v_contents) {?>
  <input type="hidden" name="item_name_{{$count}}" value="{{$v_contents->name}}">
  <input type="hidden" name="item_number_{{$count}}" value="{{$v_contents->id}}">
  <input type="hidden" name="qty_{{$count}}" value="{{$v_contents->qty}}">
  <input type="hidden" name="amount_{{$count}}" value="{{$v_contents->price}}">
  <input type="hidden" name="shipping_{{$count}}" value="0">
  <input type="hidden" name="tax_{{$count}}" value="0.5">
    <?php } ?>

  <input type="image" name="submit"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">

</form>