<style>
@page {
 margin-top: 20px;
 margin-left: 20px;
}
p{margin:2px; padding:2px;}
</style>

<div style="text-align:center; font-family: Arial, Helvetica, sans-serif;">
        <div style="border: 0px; padding: 0px; width: 175px; text-align:center;">
        <p style="font-weight: bold;" align="center">
        ANNIE'S GRILL AND RESTAURANT</p>    

        <p style="font-weight: bold; font-size:10px" align="center">
        Dona Toribia Aspiras Rd. San Antonio, Agoo La Union<br />
        0720607-3910
        </p>    
<br />
          <table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td colspan=2 style="font-size: 12px; font-family: Arial, Helvetica, sans-serif;" align="right"><?= $date; ?></td>
  </tr>
  <tr>
    <td colspan=2 style="font-size: 12px; font-family: Arial, Helvetica, sans-serif;" align="left">Table#: <?= $receipt->name; ?></td>
  </tr>
</table>
<br />

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family: Arial, Helvetica, sans-serif; font-weight:normal;">
<tr class="header">
 <th>Description</th>
 <th>Qty</th>
 <th>Price</th>
</tr>
<tr>
 <td colspan=3>--------------------------------------------</td>
</tr>
<? foreach($orders as $o) :?>
<tr>
 <td><?= $o->name; ?></td>
 <td><?= $o->count ; ?></td>
 <td align='right'>&#8369;<?= $o->value; ?></td>
<? endforeach; ?>
<tr>
 <td colspan=3>--------------------------------------------</td>
</tr>
<tr>
 <th align='left'>Total</th>
 <th colspan=2 align="right">&#8369;<?= number_format((float)($o->count * $o->value), 2, '.', ''); ?></th>
</tr>
<tr>
 <td colspan=3>&nbsp;</td>
</tr>
<tr>
 <td align='left'>CASH</td>
 <td colspan=2 align="right">&#8369;<?= $receipt->payment; ?></td>
</tr>
<tr>
 <td align='left'>CHANGE</td>
 <td colspan=2 align="right">&#8369;<?= $receipt->change; ?></td>
</tr>
</table>
<br />
<span style="font-size:8px">Thank you for dining with us!</span>
  </div>
