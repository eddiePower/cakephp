<div class="col-md-12">
<h1 class="center page-title">Admin Site Config Page.</h1>
</div>

<div class="col-md-12">
	<div class="panel">
	<h3>
	Logged in as <?= $username; ?>
	</h3>
	<h3>
	Role: <?= $userRole; ?>
   </h3>
    <?= $this->Flash->render(); ?>
</div>
<?php
    
     echo $this->Html->scriptStart(['block' => true]);
     echo "function checkSwitch(){";
     echo "var snowOn = document.getElementById('myonoffswitch').checked;";
     echo "  if(snowOn == true){";
     echo "      alert('the switch is now on! This could start the snow!Make it snow(rain) Bitches');";
     echo "    }else{alert('the switch is now off! This could stop the snow');";
     echo "  }";
     echo "}//end of checkswitch function";
     echo $this->Html->scriptEnd(); 
?>

<div id="content">
    <table class="table table-bordered table-striped">
      <thead>
        <tr><th>Function Name:</th><th>Action Button Goes here:</th></tr>
      </thead>
      <tbody>
        <tr><td>Make It Snow:</td><td class="snowSwitch">
            <div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked onchange="checkSwitch()">
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
        </td></tr>
        <tr><td>User C.R.U.D. settings:</td><td>BUTTON HERE!</td></tr>
        <tr><td>MYOB SYNC Settings:</td><td>BUTTON HERE!</td></tr>
      </tbody>
    </table>
    </div>
</div>
