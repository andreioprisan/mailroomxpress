<div class="pagehead">
  <h1>Welcome, <?= $userRealName; ?>!</h1>
    <p>Last login: <?= $userLastLogin; ?></p>
</div>

<div class="clear"></div>
<p></p>
<br><br>

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

							
<div class="columns equacols bordered">
  <div class="column main questions" id="signupform">
		<table width="100%" cellspacing=2 cellpadding=2 class="a">
			<th width="12%">
			<th width="88%">
			<tr>
				<td align=center><img src="/public/img/important.gif" border=0 width="32"></td>
				<td><font size=3><b>Announcements</b></font></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<?php 	
					if (isset($announcements))
						if ($announcements->num_rows() > 0)
							foreach ($announcements->result() as $announcement)
							{ 
								$date = $this->dateTools->dateTime2humanTime($announcement->LastModificationTime);
								$announcementFormatted = nl2br($announcement->MessageContent);
								echo "<font style='font-size : 13px;' color=black>".$announcementFormatted."</font><br><font style='font-size : 11px;' color=black>posted on $date</font><br><br>";
							}
						else
							echo "No announcements posted at this time.";
					else
						echo "No announcements posted at this time.";
					?>	
				</td>
			</tr>
		</table>
  </div><!-- /.column.main -->
  <div class="column secondary faqs">
		<br>
		<table width="100%" cellspacing=2 cellpadding=2 class="a">
			<th width="12%">
			<th width="88%">
			<tr>
				<td align=center><img src="/public/img/postits.gif" border=0 width="32"></td>
				<td><font size=3><b>Today's Notes</b></font></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<?php 	
					if (isset($notes))
						if ($notes->num_rows() > 0)
							foreach ($notes->result() as $note)
							{ 
								$date = $this->dateTools->dateTime2humanTime($note->LastModificationTime);
								$noteFormatted = nl2br($note->content);
								$author = $note->name;
								echo "<font style='font-size : 13px;' color=black>".$noteFormatted."</font><br><font style='font-size : 11px;' color=black>posted on $date by $author</font><br>";
							}
						else
							echo "No notes posted at this time.";
					else
						echo "No notes posted at this time.";
					
					
					?>	<br>
				</td>
			</tr>
			
			<tr>
				<td align=center><img src="/public/img/workpad.gif" border=0 width="32"></td>
				<td><font size=3><b>Post a Note</b></font></td>
			</tr>
			<tr>
				<td></td>
				<td><?php 
							$content = null;
							$date = null;
							$note = null;
							
							if (isset($todaysNote))
								if ($todaysNote->num_rows() > 0)
									$note = $todaysNote->row();
							
							if ($note != null)
							{
								$content = $note->content;
								$date = $this->dateTools->dateTime2humanTime($note->LastModificationTime);
							}
							
							//$MessageQuery = mysql_query("SELECT *, DATE_FORMAT(LastModificationTime, '%M %e, %Y at %l:%i %p') as Datee  FROM 3NMailRoomWorkpads WHERE useruniqueid='$_COOKIE[MailroomSysUniqueID]' AND  institution='$_COOKIE[MailroomSysInstitution]' AND reshall='$_COOKIE[MailroomSysResHall]'");
							//$Notepad = mysql_fetch_assoc($MessageQuery);
							?>
							
							<form action="/notesc/post" method="post" id="abc">
							<input type="hidden" name="backto" value="/home">
							<textarea name="notes" cols=10 rows=5 style="width: 240px; height: 90px;"><?php echo $content; ?></textarea>
							<button type=submit value="Update Workpad"><img src="/public/img/pin.gif" width="32" border=0><b>Post It!</b>&nbsp;&nbsp;&nbsp;</button></form>
							<font size=1><b><?php if ($date != "") {?> Last saved on <?php echo $date;  }?></b></font>
							
				</td>
			</tr>
			
			
		</table>
		

  </div><!-- /.column.secondary -->
</div><!-- /.columns.equacols.bordered -->

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
