<div class="pagehead">
  <h1>mail station @NYU</h1>
    <p>Making RAs' lives easy since 2009..</p>
</div>

<div class="clear"></div>
<p></p>
<div class="columns equacols bordered">
  <div class="column main questions" id="signupform">
	<br><br>
	
	<form action="/auth/login" class="forlogin" method="post"> 
		<div class="border-top"></div>
		  <h2>user login</h2> 
	  <p class="site-address"> 
		<?php echo $this->dx_auth->get_auth_error(); ?>
		
		<table width="100%">
		<tr>
			<td width="30%"><label class="field-label" for="username">username</label></td>
			<td width="70%"><input class="slug placeholder" id="username" name="username" type="text" placeholder="netid" /></td>
		</tr>
		<tr>
			<td width="30%"><label class="field-label" for="password">password</label></td>
			<td width="70%"><input class="slug placeholder" id="password" name="password" type="password" /></td>
		</tr>
		</table>
	  </p> 
		<br>
	  <p class="submit"> 
	    <input class="button title" id="submit" name="submit" type="submit" value="log me in" /> 
	  </p> 
	  <div class="border-bottom"></div>
	</form>
	<p class="login">forgot your password? <a href="/auth/forgot_password">reset it</a></p>
	

  </div><!-- /.column.main -->
  <div class="column secondary faqs">

    <h2>Who can access the mailroom?</h2>
    <p>Only RAs and administrators at the NYU residence halls that have access to mailroom xpress can login. Ask your RHD if you believe that you should have access but do not.
    </p>

    <h2>What to I need to access the mailroom?</h2>
    <p>You can user Internet Explorer, Safari and Firefox just fine. Our system was tested on all major operating systems and mobile devices for usability. You can also access the mailroom on your Blackberry or iPhone.
    </p>

    <h2>What if I have feedback or want to suggest a new feature?</h2>
    <p>Your feedback & suggestions are very important to us and we'd love to hear from you! We believe that our users can provide very valuable insight and most suggestions are built in the next mailroom xpress release.
    </p>

  </div><!-- /.column.secondary -->
</div><!-- /.columns.equacols.bordered -->

<p class="read-it">questions? concerns? contact us 24/7 <a href="mailto:support@mailroomxpress.com">support@mailroomxpress.com</a></p>

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
