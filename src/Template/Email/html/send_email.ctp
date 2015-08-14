<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<!DOCTYPE html>
<html style="font-family: 'Roboto', helvetica, 'sans-serif'; font-weight: normal; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: #5c5c4d;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
        SoleMate DoorMats Email</title>
</head>
<body style="margin: 0;">
<style type="text/css">
a:hover { text-decoration: underline !important; }
a:active { outline: 0 !important; }
a:hover { outline: 0 !important; }
input[type="button"]:hover { text-decoration: none !important; }
input[type="submit"]:hover { text-decoration: none !important; }
select:hover { text-decoration: none !important; }
button:hover { text-decoration: none !important; }
.button:hover { text-decoration: none !important; }
input[type="button"]:active { color: #777 !important; box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1) !important; }
input[type="submit"]:active { color: #777 !important; box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1) !important; }
select:active { color: #777 !important; box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1) !important; }
button:active { color: #777 !important; box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1) !important; }
.button:active { color: #777 !important; box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1) !important; }
.label:hover { text-decoration: none !important; background-color: #217dbb !important; }
.label:active { text-decoration: none !important; background-color: #217dbb !important; }
.label.danger:hover { background-color: #d62c1a !important; }
.label.danger:active { background-color: #d62c1a !important; }
.row:after { clear: both !important; content: '' !important; display: block !important; }
.clearfix:after { display: block !important; content: '' !important; clear: both !important; }
.pagination > li > a:hover { text-decoration: none !important; }
tbody tr:hover { background-color: #fff1af !important; }
.nav-item:hover { background-color: #fff1af !important; text-decoration: none !important; }
></style>

	<header class="site-header" style="display: block; height: 64px;">
	<nav class="header-nav" style="display: block; width: 80%; margin: 0 auto;">
	<h1 class="header-nav-title center" style="font-family: 'Roboto', helvetica, 'serif'; color: #47473c; font-weight: normal; font-size: 2.375em; line-height: 1.6em; text-align: center; float: left; height: 56px; margin: 4px 0;" align="center">
	<img src="http://www.ibaustralia.com/ibaustralia/custom/logo_custom.gif" alt="" style="max-width: 100%; height: 100%; border: 0;">
	</h1>
	<h1 style="font-family: 'Roboto', helvetica, 'serif'; color: #47473c; font-weight: normal; font-size: 2.375em; line-height: 1.157894736em; margin-top: 0; margin-bottom: 0;padding-top:8px;">
  				Solemate doormats
  			</h1>
	</nav>
	</header>
	<main class="site-main" style="display: block; box-shadow: inset 0 1px 2px 1px rgba(0, 0, 0, 0.08); background-color: #f6f4ec; padding: 32px 0;"><div class="main-inner row" style="width: 80%; height: 1%; margin: 0 auto;">
  		<div class="col-8 last panel" style="float: left; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; width: 100% !important; box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.1); background-color: #FFF; margin: 0 0 16px; padding: 16px;">
  			<h2 style="font-family: 'Roboto', helvetica, 'serif'; color: #47473c; font-weight: normal; font-size: 1.8em; line-height: 1.157894736em; margin-top: 0; margin-bottom: 0;">
  				A message from Solemate doormats
  			</h2>
  			<p class="" style="margin-top: 1.375em; margin-bottom: 1.375em;">
            <?php
                $content = explode("\n", $content);
                
                foreach ($content as $line):
                        echo '<p> ' . $line . "</p>\n";
                endforeach;
                
                
                echo "<br /><br />===================================================================";
                
                if(is_array($cust))
                {
                    foreach($cust as $customer)
                    {
                       echo "<br />Customer " . $customer->id . "'s information we have is " . $customer . "<br />";
                    } 
                }
                else
                {
                   debug($cust . "is the customer data.");
                }
                echo "===================================================================<br />";
            ?>
            </p>	
  		</div>
		</div>
	</main>
</body>


