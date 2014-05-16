<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8">

<title>Riskmetrics</title>
<meta name="description" content="">
<meta name="author" content="Justus Meyer">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Basic Styles -->
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/font-awesome.min.css">

<!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-production.css">
<link rel="stylesheet" type="text/css" media="screen" href="/css/smartadmin-skins.css">

<link rel="stylesheet" type="text/css" media="screen" href="/css/main.css">
<link href="/css/theme.blue.css" rel="stylesheet" />

<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
<link rel="stylesheet" type="text/css" media="screen" href="/css/demo.css">

<!-- FAVICONS -->
<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">

<!-- Jquery -->
		<script src="/js/jquery-2.1.0.min.js"></script>
		<script src="/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/js/jquery.ui.touch-punch.min.js"></script>
		<script src="/js/jquery.slimscroll.min.js"></script>

</head>

<body class="fixed-header">
	<!-- possible classes: minified, fixed-ribbon, fixed-header, fixed-width-->

	<!-- HEADER -->
	<header id="header">
		<div id="logo-group">

			<!-- PLACE YOUR LOGO HERE -->
			<span class="txt-color-red" id="logo" style="font-size:1.4em;"> Riskmetrics
			</span>
			<!-- END LOGO PLACEHOLDER -->

			<!-- Note: The activity badge color changes when clicked and resets the number to 0
				Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
			<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i>
				<b class="badge"> 21 </b>
			</span>

			<!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
			<div class="ajax-dropdown">

				<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
				<div class="btn-group btn-group-justified" data-toggle="buttons">
					<label class="btn btn-default"> <input type="radio" name="activity"
						id="ajax/notify/mail.html"> Msgs (14)
					</label> <label class="btn btn-default"> <input type="radio"
						name="activity" id="ajax/notify/notifications.html"> notify (3)
					</label> <label class="btn btn-default"> <input type="radio"
						name="activity" id="ajax/notify/tasks.html"> Tasks (4)
					</label>
				</div>

				<!-- notification content -->
				<div class="ajax-notifications custom-scroll">

					<div class="alert alert-transparent">
						<h4>Click a button to show messages here</h4>
						This blank page message helps protect your privacy, or you can
						show the first message here automatically.
					</div>

					<i class="fa fa-lock fa-4x fa-border"></i>

				</div>
				<!-- end notification content -->

				<!-- footer: refresh area -->
				<span> Last updated on: 12/12/2013 9:43AM
					<button type="button" data-loading-text="<i 
						class='fa fa-refresh fa-spin'>
						</i> Loading..." class="btn btn-xs btn-default pull-right"> <i
							class="fa fa-refresh"></i>
					</button>
				</span>
				<!-- end footer -->

			</div>
			<!-- END AJAX-DROPDOWN -->
		</div>

		<!-- projects dropdown -->
		<div id="project-context">

			<span class="label"><?php $date = date('d F Y');?><?php echo $date ?></span>
			<span id="project-selector"
				class="popover-trigger-element dropdown-toggle"
				data-toggle="dropdown">Recent projects <i class="fa fa-angle-down"></i></span>

		</div>
		<!-- end projects dropdown -->

		<!-- pulled right: nav area -->
		<div class="pull-right">

			<!-- collapse menu button -->
			<div id="hide-menu" class="btn-header pull-right">
				<span> <a href="javascript:void(0);" title="Collapse Menu"><i
						class="fa fa-reorder"></i></a>
				</span>
			</div>
			<!-- end collapse menu -->

			<!-- logout button -->
			<div id="logout" class="btn-header transparent pull-right">
				<span> <a href="/app" title="Sign Out"><i
						class="fa fa-sign-out"></i></a>
				</span>
			</div>
			<!-- end logout button -->

			<!-- search mobile button (this is hidden till mobile view port) -->
			<div id="search-mobile" class="btn-header transparent pull-right">
				<span> <a href="javascript:void(0)" title="Search"><i
						class="fa fa-search"></i></a>
				</span>
			</div>
			<!-- end search mobile button -->

			<!-- input: search field -->
			<form action="#search.html" class="header-search pull-right">
				<input type="text" placeholder="Find reports and more"
					id="search-fld">
				<button type="submit">
					<i class="fa fa-search"></i>
				</button>
				<a href="javascript:void(0);" id="cancel-search-js"
					title="Cancel Search"><i class="fa fa-times"></i></a>
			</form>
			<!-- end input: search field -->

		</div>
		<!-- end pulled right: nav area -->

	</header>
	<!-- END HEADER -->


	<aside id="left-panel">

		<!-- User info -->
		<div class="login-info">
			<span> <!-- User image size is adjusted inside CSS, it should stay as it -->

				<a href="javascript:void(0);" id="show-shortcut"> <i class="fa fa-lg fa-fw fa-user"></i> <span>
						Admin </span> <i class="fa fa-lg fa-angle-down"></i>
			</a>

			</span>
		</div>
		<!-- end user info -->

		<nav>

			<ul>
				<li
					class="<?php if ($this->controller == "welcomes"){echo "active";} else {echo "";}?>">
					<a href="/dashboards"> <i class="fa fa-lg fa-fw fa-home"></i> <span
						class="menu-item-parent"> Dashboard </span>
				</a>
				</li>
				<li
					class="<?php if ($this->controller == "fundreturns" || $this->controller == "indexreturns" ){echo 'active open';} else {echo "";}?>">
					<a href="#" class="dropdown-toggle"> <i
						class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span
						class="menu-item-parent"> Returns Database</span>
					</a>
					<ul>
						<li
							class="<?php echo ($this->controller == "fundreturns")?"active":''?>">
							<a href="/fundreturns"> Fund Returns </a>
						</li>
						<li
							class="<?php echo ($this->controller == "indexreturns")?"active":''?>">
							<a href="/indexreturns"> Index Returns </a>
						</li>
						<li
							class="<?php echo ($this->controller == "fundanalytics")?"active":''?>">
							<a href="/fundanalytics"> Fund Analytics </a>
						</li>
					</ul>
				</li>
				<li
					class="<?php if ($this->controller == "fundreturns" || $this->controller == "indexreturns" ){echo 'active open';} else {echo "";}?>">
					<a href="#" class="dropdown-toggle"> <i
						class="fa fa-lg fa-fw fa-tachometer"></i> <span
						class="menu-item-parent"> Portfolios</span>
					</a>
					<ul>
						<li
							class="<?php echo ($this->controller == "createporfolios")?"active":''?>">
							<a href="/createportfolios"> Create Porfolio </a>
						</li>
					</ul>
				</li>
				<li
					class="<?php if ($this->controller == "mvos"){echo "active";} else {echo "";}?>">
					<a href="/mvos"> <i class="fa fa-lg fa-fw fa-puzzle-piece"></i> <span
						class="menu-item-parent"> MVO </span>
				</a>
				</li>
				
			</ul>
		</nav>
		<span class="minifyme"> <i class="fa fa-arrow-circle-left hit"></i>
		</span>

	</aside>
	<!-- END NAVIGATION -->

	<!-- MAIN PANEL -->
	<div id="main" role="main">

		<!-- RIBBON -->
		<div id="ribbon">

			<span class="ribbon-button-alignment"> <span id="refresh"
				class="btn btn-ribbon" data-title="refresh" rel="tooltip"
				data-placement="bottom" data-original-title="<i 
				class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true"><i class="fa fa-refresh"></i></span>
			</span>

			<!-- breadcrumb -->
			<ol class="breadcrumb">
				<li><a href="/dashboards">Home</a></li>
				<li><?php echo strtoupper(substr($this->controller,0,-1));?></li>
			</ol>
			<!-- end breadcrumb -->

		</div>
		<!-- END RIBBON -->

		<!-- MAIN CONTENT -->
		<div id="content">

			<div class="row">

				<div id="prime">
						<?php if(Flash::has()): ?>
					<div class="errorswrp">
						<div class="errors">
									<?php Flash::draw()?>
						</div>
					</div>
						<?php endif ?>
					    <?php $this->render(); ?>
				</div>
			</div>
		</div>
		<!-- END MAIN CONTENT -->

	</div>
	<!-- END MAIN PANEL -->

		<script data-pace-options='{ "restartOnRequestAfter": true }'
			src="/js/plugin/pace/pace.min.js"></script>

		<!-- BOOTSTRAP JS -->
		<script src="/js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="/js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="js/smartwidgets/jarvis.widget.min.js"></script>
		
		<script type="text/javascript" src="/js/jquery.tablesorter.js"></script>
		<script type="text/javascript" src="/js/jquery.tablesorter.widgets.js"></script>
		<script src="/js/javascript.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="/js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="/js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="/js/plugin/fastclick/fastclick.js"></script>

		<!-- Demo purpose only -->
		<script src="/js/demo.js"></script>

		<!-- MAIN APP JS FILE -->
		<script src="/js/app.js"></script>

		<!-- PAGE RELATED PLUGIN(S) -->

		<!-- Full Calendar -->
		<script src="/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>

		<script>
			$(document).ready(function() {

				// DO NOT REMOVE : GLOBAL FUNCTIONS!
				pageSetUp();

				/*
				 * PAGE RELATED SCRIPTS
				 */

				$(".js-status-update a").click(function() {
					var selText = $(this).text();
					var $this = $(this);
					$this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
					$this.parents('.dropdown-menu').find('li').removeClass('active');
					$this.parent().addClass('active');
				});

				/*
				* TODO: add a way to add more todo's to list
				*/

				// initialize sortable
				$(function() {
					$("#sortable1, #sortable2").sortable({
						handle : '.handle',
						connectWith : ".todo",
						update : countTasks
					}).disableSelection();
				});

				// check and uncheck
				$('.todo .checkbox > input[type="checkbox"]').click(function() {
					var $this = $(this).parent().parent().parent();

					if ($(this).prop('checked')) {
						$this.addClass("complete");

						// remove this if you want to undo a check list once checked
						//$(this).attr("disabled", true);
						$(this).parent().hide();

						// once clicked - add class, copy to memory then remove and add to sortable3
						$this.slideUp(500, function() {
							$this.clone().prependTo("#sortable3").effect("highlight", {}, 800);
							$this.remove();
							countTasks();
						});
					} else {
						// insert undo code here...
					}

				})
				// count tasks
				function countTasks() {

					$('.todo-group-title').each(function() {
						var $this = $(this);
						$this.find(".num-of-tasks").text($this.next().find("li").size());
					});

				}

				
				/* hide default buttons */
				$('.fc-header-right, .fc-header-center').hide();

				// calendar prev
				$('#calendar-buttons #btn-prev').click(function() {
					$('.fc-button-prev').click();
					return false;
				});

				// calendar next
				$('#calendar-buttons #btn-next').click(function() {
					$('.fc-button-next').click();
					return false;
				});

				// calendar today
				$('#calendar-buttons #btn-today').click(function() {
					$('.fc-button-today').click();
					return false;
				});

				// calendar month
				$('#mt').click(function() {
					$('#calendar').fullCalendar('changeView', 'month');
				});

				// calendar agenda week
				$('#ag').click(function() {
					$('#calendar').fullCalendar('changeView', 'agendaWeek');
				});

				// calendar agenda day
				$('#td').click(function() {
					$('#calendar').fullCalendar('changeView', 'agendaDay');
				});

				/*
				 * CHAT
				 */

				$.filter_input = $('#filter-chat-list');
				$.chat_users_container = $('#chat-container > .chat-list-body')
				$.chat_users = $('#chat-users')
				$.chat_list_btn = $('#chat-container > .chat-list-open-close');
				$.chat_body = $('#chat-body');

				/*
				* LIST FILTER (CHAT)
				*/

				// custom css expression for a case-insensitive contains()
				jQuery.expr[':'].Contains = function(a, i, m) {
					return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
				};

				function listFilter(list) {// header is any element, list is an unordered list
					// create and add the filter form to the header

					$.filter_input.change(function() {
						var filter = $(this).val();
						if (filter) {
							// this finds all links in a list that contain the input,
							// and hide the ones not containing the input while showing the ones that do
							$.chat_users.find("a:not(:Contains(" + filter + "))").parent().slideUp();
							$.chat_users.find("a:Contains(" + filter + ")").parent().slideDown();
						} else {
							$.chat_users.find("li").slideDown();
						}
						return false;
					}).keyup(function() {
						// fire the above change event after every letter
						$(this).change();

					});

				}

				// on dom ready
				listFilter($.chat_users);

				// open chat list
				$.chat_list_btn.click(function() {
					$(this).parent('#chat-container').toggleClass('open');
				})

				$.chat_body.animate({
					scrollTop : $.chat_body[0].scrollHeight
				}, 500);

			});

		</script>

</body>

</html>





