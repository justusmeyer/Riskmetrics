<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Hub -  Intranet</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">  
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/ace-fonts.css" />
	<link rel="stylesheet" href="css/ace.min.css" />
	<link rel="stylesheet" href="css/ace-rtl.min.css" />
        
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
        color: #FFF;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
      .form-signin{
      background: url(/images/logos/logo3.png) no-repeat #FFF 10px -70px;
      }

    </style>
    
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

  </head>

 	<body class="login-layout">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <h1>
                                    <i class="icon-dashboard red"></i>
                                    <span class="white">The HUB</span>
                                </h1>
                            </div>
                            <div class="space-6"></div>
                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="icon-globe red"></i>
                                                Please Enter Your Information
                                            </h4>

                                            <div class="space-6"></div>

                                            <form class="form-signin" method="post" action="/admin/login" >
										    	<h2 class="form-signin-heading">&nbsp;</h2>
										    	<label class="block clearfix">
                                                	<span class="block input-icon input-icon-right">
										        		<input type="text" class="form-control" placeholder="Username" name="username" >
										        		<i class="icon-user"></i>
													</span>
                                            	</label>	
										        <label class="block clearfix">
                                                	<span class="block input-icon input-icon-right">
														<input type="password" class="form-control" placeholder="Password" name="password" >
										         		<i class="icon-lock"></i>
                                                    </span>
                                                </label>
										        <div class="space"></div>

                                                <div class="clearfix">
										        	<button class="width-35 pull-right btn btn-sm btn-primary" type="submit">Sign in</button>
									      		</div>
									      	</form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
