<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()" style="display: none;">
    
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $key ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo (empty($amount)) ? '' : $amount ?>" /></td>
          <td>First Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo (empty($firstname)) ? '' : $firstname; ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($email)) ? '' : $email; ?>" /></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo (empty($phone)) ? '' : $phone; ?>" /></td>
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo (empty($productinfo)) ? '' : $productinfo ?></textarea></td>
        </tr>
        <tr>
          <td>Success URI: </td>
          <td colspan="3"><input name="surl" value="<?php echo (empty($surl)) ? '' : $surl ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URI: </td>
          <td colspan="3"><input name="furl" value="<?php echo (empty($furl)) ? '' : $furl ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

        <tr>
          <td><b>Optional Parameters</b></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td><input name="lastname" id="lastname" value="" /></td>
          <td>Cancel URI: </td>
          <td><input name="curl" value="<?php echo (empty($curl)) ? '' : $curl ?>" /></td>
        </tr>
        <tr>
          <td>Address1: </td>
          <td><input name="address1" value="" /></td>
          <td>Address2: </td>
          <td><input name="address2" value="" /></td>
        </tr>
        <tr>
          <td>City: </td>
          <td><input name="city" value="" /></td>
          <td>State: </td>
          <td><input name="state" value="" /></td>
        </tr>
        <tr>
          <td>Country: </td>
          <td><input name="country" value="" /></td>
          <td>Zipcode: </td>
          <td><input name="zipcode" value="" /></td>
        </tr>
        <tr>
          <td>UDF1: </td>
          <td><input name="udf1" value="" /></td>
          <td>UDF2: </td>
          <td><input name="udf2" value="" /></td>
        </tr>
        <tr>
          <td>UDF3: </td>
          <td><input name="udf3" value="" /></td>
          <td>UDF4: </td>
          <td><input name="udf4" value="" /></td>
        </tr>
        <tr>
          <td>UDF5: </td>
          <td><input name="udf5" value="" /></td>
          <td>PG: </td>
          <td><input name="pg" value="" /></td>
        </tr>
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
  </body>
</html>
