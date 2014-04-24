<div clas="row">
<div class="col-md-12">
<div class="page-header">
<h1><?= strtoupper($user->name); ?> <small>Work Hours</small></h1>
</div>
<table class="table table-striped">
<tr>
  <th>Category</th>
  <th>Time</th>
</tr>
<? if(!empty($work_time)) :?>
<? foreach($work_time as $wt) :?>
<tr>
  <td><?= $wt->category ;?></td>
  <td><?= date('F j, Y | g:i A',strtotime($wt->time_on)) ;?></td>
</tr>
<? endforeach ;?>
<? endif ;?>
</table>
</div>
</div>
