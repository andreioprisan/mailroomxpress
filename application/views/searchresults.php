<div class="pagehead">
  <h1>Searched for <font color=purple><?= $query; ?></font>!</h1>
    <p><?= $resultsStatus; ?></p>
</div>

<div class="clear"></div>

<p>
<br><br>

	<center>
<table width="90%" cellpadding=3 cellspacing=3 class="resinfo" border=0>
<?php if ($resultsStatus) { ?>
<?php foreach ($results->result() as $row) { 
	var_dump($row);
	?>
	<tr border=1>			
		
	<td width="6%" align=left>
		<table width=30% cellpadding=5 cellspacing=5>
			<tr><?php if ($row->email == "") { $email = false; } else { $email = true; }?>
				<?php if ($email == true) {?>
					<?php if (trim($row->forwardingAddress) != "") {?>
					<td align=center valign=middle width="50%"><img src='/public/img/npackage.jpg' width="156" border=0></a><br><br><font size=2 color=gray><b>New Package</b></font><br><font size=1 color=red><b>Cannot record new package at this time! You must forward the package to the summer address on file!</b></font></a><br><br><br></td>
					<?php } else {?>
				<td align=center valign=middle width="50%"><a href="packages.php?action=new&uniqueid=<?php echo $row['uniqueid']; ?>"  style="text-decoration: none"><img src='img/npackage.jpg' width="156" border=0></a><br><br><a href="packages.php?action=new&uniqueid=<?php echo $row['uniqueid']; ?>"  style="text-decoration: none"><font color=black size=2><b>New Package</b></font></a><br><br><br></td>
					<?php } ?>
				<?php } else {?>
				<td align=center valign=middle width="50%"><img src='img/npackage.jpg' width="156" border=0></a><br><br><font size=2 color=gray><b>New Package</b></font><br><font size=1 color=red><b>Cannot record new package at this time because we have no email on file for <?php echo $row['fullname1']; ?>.</b></font></a><br><br><br></td>
				<?php } ?>			
					
<!-- 				<td align=center valign=middle width="50%"><a href="guest.pass.php?action=new&netid=<?php echo str_replace("@nyu.edu", '', $row['email']); ?>&fullname=<?php echo $row['fullname1']; ?>&box=<?php echo $row['box']; ?>&tower=<?php echo $row['tower']; ?>&room=<?php echo $row['room']; ?>&side=<?php echo $row['side']; ?>"  style="text-decoration: none"><img src='img/new.guestpass.jpg' width="86" border=0></a><br><br><a href="packages.php?action=new&netid=<?php echo str_replace("@nyu.edu", '', $row['email']); ?>&fullname=<?php echo $row['fullname1']; ?>&box=<?php echo $row['box']; ?>&tower=<?php echo $row['tower']; ?>&room=<?php echo $row['room']; ?>&side=<?php echo $row['side']; ?>"  style="text-decoration: none"><font color=black size=2><b>New Guest Pass</b></font></a><br><br><br></td>
	 -->			</tr>
				<tr>
					<td align=center valign=middle width="50%"><a href="packages.php?action=history&uniqueuserid=<?php echo $row['uniqueid']; ?>"  style="text-decoration: none"><img src='img/user.jpg' width="78" border=0></a><br><a href="packages.php?action=history&uniqueuserid=<?php echo $row['uniqueid']; ?>"  style="text-decoration: none"><font color=navy size=2><b>Package History</b></font></a></td>

					<!-- <td align=center valign=middle width="50%"><a href="guest.pass.php?action=history&netid=<?php echo str_replace("@nyu.edu", '', $row['email']); ?>&fullname=<?php echo $row['fullname1']; ?>&box=<?php echo $row['box']; ?>&tower=<?php echo $row['tower']; ?>&room=<?php echo $row['room']; ?>&side=<?php echo $row['side']; ?>"  style="text-decoration: none"><img src='img/history.jpg' width="78" border=0></a><br><a href="packages.php?action=history&netid=<?php echo str_replace("@nyu.edu", '', $row['email']); ?>&fullname=<?php echo $row['fullname1']; ?>&box=<?php echo $row['box']; ?>&tower=<?php echo $row['tower']; ?>&room=<?php echo $row['room']; ?>&side=<?php echo $row['side']; ?>"  style="text-decoration: none"><font color=navy size=2><b>Guest Pass History</b></font></a></td>
 -->
			</tr>
		</table>
	</td>
	<td  width="55%">
		<div>
		  <b class="residentnfo">
		  <b class="residentnfo1"><b></b></b>
		  <b class="residentnfo2"><b></b></b>
		  <b class="residentnfo3"></b>
		  <b class="residentnfo4"></b>
		  <b class="residentnfo5"></b></b>

		  <div class="residentnfofg">
<table width="90%" cellpadding=2 cellspacing=2 border=0>
	<?php if (isset($row['forwardingAddress']) && trim($row['forwardingAddress']) != "") {?>
		<tr>
			<td align=right width="20%"><h3><font color=red>SUMMER FORWARDING ADDRESS:</h2></td>
			<td width="27%"  colspan=4><font size=2 color=black><?php echo $row['forwardingAddress']; ?></font></td>
			
		</tr>

	<?php } ?>
<tr>
	<td align=right width="20%"><h3>&nbsp;&nbsp;&nbsp;Name</h2></td>
	<td width="27%"><font size=2 color=red><?php echo $row['fullname1']; ?></font></td>
	<td align=right width="20%"><h3>&nbsp;&nbsp;&nbsp;Status</h2></td>
	<td width="33%"><font size=2><?php echo $row['status']; ?></font></td>
</tr>
<?php if ($_COOKIE[MailroomSysResHall] == 2) { ?>
	<tr>
		<td align=right><h3>&nbsp;&nbsp;&nbsp;NetID</h2></td>
		<td><font size=2><?php if ($_COOKIE['MailroomSysAccessLevel'] == 'all') {
		echo str_replace("@nyu.edu", '', $row['email']); } else { echo "<font size=1 color=gray>Administrators only</font>";}?></font></td>
		<?php if ($row['email'] == "") { $email = false; } else { $email = true; }?>
		<td align=right><h3>&nbsp;&nbsp;&nbsp;Email</h2></td>
			<?php if ($email == true) {?>
			<td><font size=2><a href="mailto: <?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></font></td>
			<?php } else { 
				echo "<td><font size=1 color=gray>Not available</font></td>";
				} ?>
	</tr>
	<tr>
		<td align=right><h3>&nbsp;&nbsp;&nbsp;Room</h2></td>
		<td><font size=2><?php echo $row['room']; ?></font></td>
		<td align=right><h3>&nbsp;&nbsp;&nbsp;Side</h2></td>
		<td><font size=2><?php echo $row['side']; ?></font></td>
	</tr>
<?php } else if ($_COOKIE[MailroomSysResHall] == 3) { 
	// brittany hall ?>
	<tr>
		<td align=right><h3>&nbsp;&nbsp;&nbsp;NetID</h2></td>
		<td><font size=2><?php if ($_COOKIE['MailroomSysAccessLevel'] == 'all') {
		echo str_replace("@nyu.edu", '', $row['email']); } else { echo "<font size=1 color=gray>Administrators only</font>";}?></font></td>
<?php if ($row['email'] == "") { $email = false; } else { $email = true; }?>
		<td align=right><h3>&nbsp;&nbsp;&nbsp;Email</h2></td>
			<?php if ($email == true) {?>
				<td><font size=2><a href="mailto: <?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></font></td>
				<?php } else { 
					echo "<td><font size=1 color=gray>Not available</font></td>";
					} ?>
	</tr>
	<tr>
		<td align=right><h3>&nbsp;&nbsp;&nbsp;N #</h2></td>
		<td><font size=2><?php if ($_COOKIE['MailroomSysAccessLevel'] == 'all') {
		echo $row['nnumber']; } else { echo "<font size=1 color=gray>Administrators only</font>";}?></font></td>
	</tr>
	<tr>
			<td align=right><h3>&nbsp;&nbsp;&nbsp;Room</h2></td>
			<td><font size=2><?php echo $row['room']; ?></font></td>
			<td align=right><h3>&nbsp;&nbsp;&nbsp;Side</h2></td>
			<td><font size=2><?php echo $row['side']; ?></font></td>
	</tr>
<?php } else { 
	// default: third north hall?>
<tr>
	<td align=right><h3>&nbsp;&nbsp;&nbsp;NetID</h2></td>
	<td><font size=2><?php if ($_COOKIE['MailroomSysAccessLevel'] == 'all') {
	echo str_replace("@nyu.edu", '', $row['email']); } else { echo "<font size=1 color=gray>Administrators only</font>";}?></font></td>
	
	<td align=right><h3>&nbsp;&nbsp;&nbsp;Mailbox #</h2></td>
	<td><font size=2><?php echo $row['box']; ?></font></td>
</tr>
<tr>
	<td align=right><h3>&nbsp;&nbsp;&nbsp;N #</h2></td>
	<td><font size=2><?php if ($_COOKIE['MailroomSysAccessLevel'] == 'all') {
	echo $row['nnumber']; } else { echo "<font size=1 color=gray>Administrators only</font>";}?></font></td>
		<td align=right><h3>&nbsp;&nbsp;&nbsp;Combination</h2></td>
		<?php if ($row['combo'] == "") { $combo = false; } else { $combo = true; }?>
		<?php if ($combo == true) {?>
		<td><font size=2><?php echo $row['combo']; ?></font></td>
		<?php } else { ?>
		<td><font size=1 color=gray>Not available</font></td>				
		<?php } ?>
</tr>
<tr><?php if ($row['email'] == "") { $email = false; } else { $email = true; }?>
	<td align=right><h3>&nbsp;&nbsp;&nbsp;Email</h2></td>
		<?php if ($email == true) {?>
		<td><font size=2><a href="mailto: <?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></font></td>
		<?php } else { 
			echo "<td><font size=1 color=gray>Not available</font></td>";
			} ?>
			<td align=right><h3>&nbsp;&nbsp;&nbsp;Tower</h2></td>
			<td><font size=2><?php if ($row['tower'] == "S") echo "South"; else if ($row['tower'] == "N") echo "North"; else  if ($row['tower'] == "E") echo "East"; else echo $row['tower']; ?></font></td>
</tr>
<tr>
		<td align=right><h3>&nbsp;&nbsp;&nbsp;Room</h2></td>
		<td><font size=2><?php echo $row['room']; ?></font></td>
		<td align=right><h3>&nbsp;&nbsp;&nbsp;Side</h2></td>
		<td><font size=2><?php echo $row['side']; ?></font></td>
</tr>
<?php } ?>
<tr>
	<td align=right><h3>&nbsp;&nbsp;&nbsp;Birthday</h2></td>
	<td><font size=2><?php if ($row['birthday'] != "") { $bday=explode('/', $row['birthday']); 
	
	if ($_COOKIE[MailroomSysResHall] == 1) {
		$bday[1] += 1; $bday[2] += 4;			
	}
	echo $bday[0]."/".$bday[1]."/".$bday[2]; } else { echo "<font size=1 color=gray>Not available</font>";} ?></font></td>
	<td align=right><h3>&nbsp;&nbsp;&nbsp;Gender</h2></td>
	<td><font size=2><?php if ($row['gender'] == "M") { echo "Male"; } else { echo "Female"; } ?></font></td>
</tr>
<?php if ($_COOKIE['MailroomSysAccessLevel'] == 'all') {?>
<tr>
	<td colspan="4">&nbsp;&nbsp;&nbsp;Record last modified by user id <?php if ($row['modby'] == "") echo "1 (Andrei Oprisan)"; else echo $row['modby']; ?> on <?php if ($row['lastmod'] == "0000-00-00 00:00:00") echo "2009-10-05 3:24:00 AM"; else echo $row['lastmod']; ?></td>
</tr>
<?php } ?>
</table>
</div>
<b class="residentnfo">
<b class="residentnfo5"></b>
<b class="residentnfo4"></b>
<b class="residentnfo3"></b>
<b class="residentnfo2"><b></b></b>
<b class="residentnfo1"><b></b></b></b>
</div>
<br>
</td>



	</tr>
		
<?php } ?>
<?php } ?>
</table><br><br>
</center>



<br><br>
</p>
      <div id="search_inner"> 
        
        
          
          <div id="search_bar"> 
            <a id="search_submit" href="#" onclick="return onEnter(event,this.form);"></a> 
			<form action="/searchc/results" method="post" id="searchform">
            <input type="text" name="search_input" id="search_input" tabindex="1" onkeypress="return onEnter(event,this.form);" onEnter="return onEnter(event,this.form);" value="" /> 
			</form>
          </div> 
          <div id="search_example"><span>Enter a first or last name, netid, email, apartment #, mailbox #, or combinations of them</span>&nbsp;&nbsp;&nbsp;Example: John M, 245E, abc123</div> 
        </div>

<br><br>


        </div>
      
    </div>

    <div id="footer" class="clearfix">
      <div class="site">
        <div class="sponsor">
			<ul class="sosueme">
	          <li><a href="/site/support">Support</a></li>
	          <li><a href="/site/training">Training</a></li>
	          <li><a href="/site/contact">Contact</a></li>
	          <li><a href="/site/status">Status</a></li>
	          <li><a href="/site/terms">Terms of Service</a></li>
	          <li><a href="/site/privacy">Privacy</a></li>
	          <li><a href="/site/security">Security</a></li>
	        </ul>
        </div>

        <ul class="sosueme">
          <li class="main">&copy; 2010 <span id="_rrt" title="{elapsed_time}">MailRoom XPress</span> LLC. All rights reserved.</li>
        </ul>
      </div>
    </div><!-- /#footer -->

    
      
      
        
      
    


  </body>
</html>
