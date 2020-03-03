<?php 
/* 
===========================================================================
SALES REPORTING SHORTCODE
NOTE:
	CODE THAT IS COMMENTED WILL NEED WORK IN FUTURE 
===========================================================================
*/



function sales_report_fun() {

	ob_start();
	
	if( ! is_user_logged_in() ) {
		return;
	}
		
	$user = wp_get_current_user();

	show_stats();

	$output = ob_get_contents();   
	ob_end_clean();   

	return $output;
}



function show_stats() {
	$llms_analytics = new LLMS_Analytics();

	$total_orders = get_orders();
	$sales = get_total_sales();
	$coupons_amount = get_total_coupon_amount();
	$couponseget_total_coupons_used();
?>
	<div class="container">
		
		<!-- START Sales report filters -->
		<div class="filter-nav">
		<nav>
			<ul>
				<li class="active"><a href="#">This Year</a></li>
				<li><a href="#">Last Month</a></li>
				<li><a href="#">This Month</a></li>
				<li><a href="#">Last 7 Days</a></li>
				<!-- <li id="toggle-custom-filter" class="toggle-custom-filter">
					<span class="dashicons dashicons-filter"></span>
					<a href="#">Toggle Filters</a>
				</li> -->
			</ul>
		</nav>
		</div>

		<!-- START Sales report toggle filter -->
		<!-- <div class="toggle-nav">
		<nav>
			<ul>
				<li><input placeholder="Filter by Student(s)" type="text" name="students"></li>
				<li><input placeholder="Filter by Course(s)" type="text" name="courses"></li>
				<li><input placeholder="Filter by Membership(s)" type="text" name="membership"></li>
				<li class="apply_filters_link"><button id="apply_filters">Apply Filters</button></li>
			</ul>
		</nav>
		</div> -->
		<!-- END Sales report toggle filter  -->

		<!-- END Sales report filters -->
		<!-- START Sales report analytics widgets  -->
		<div class="llms-widget-row llms-widget-row-"> 
		<div class="llms-widget-1-4">
			<div class="llms-widget" data-method="sales" id="llms-widget-sales">
				<p class="llms-label"># of Sales</p>
				<h1>1</h1>
				<span class="spinner"></span>
				<div class="llms-widget-info">
					<p>Number of new active or completed orders placed within this period</p>
				</div>
			</div>
		</div>

		<div class="llms-widget-1-4">
			<div class="llms-widget" data-method="sold" id="llms-widget-sold">
				<p class="llms-label">Net Sales</p>
				<h1>₨99.99</h1>
				<span class="spinner"></span>
				<div class="llms-widget-info">
					<p>Total of all successful transactions during this period</p>
				</div>
			</div>
		</div>

		<div class="llms-widget-1-4">
			<div class="llms-widget" data-method="refunds" id="llms-widget-refunds">
				<p class="llms-label"># of Refunds</p>
				<h1>0</h1>
				<span class="spinner"></span>
				<div class="llms-widget-info">
					<p>Number of orders refunded during this period</p>
				</div>
			</div>
		</div>

		<div class="llms-widget-1-4">
			<div class="llms-widget" data-method="refunded" id="llms-widget-refunded">
				<p class="llms-label">Amount Refunded</p>
				<h1>₨0.00</h1>
				<span class="spinner"></span>
				<div class="llms-widget-info">
					<p>Total of all transactions refunded during this period</p>
				</div>
			</div>
		</div>

		<div class="llms-widget-row llms-widget-row-">
	
		<div class="llms-widget-1-4">
			<div class="llms-widget" data-method="coupons" id="llms-widget-coupons">
				<p class="llms-label"># of Coupons Used</p>
				<h1>0</h1>
				<span class="spinner"></span>
				<div class="llms-widget-info">
					<p>Number of orders completed using coupons during this period</p>
				</div>
			</div>
		</div>

	
		<div class="llms-widget-1-4">
			<div class="llms-widget" data-method="discounts" id="llms-widget-discounts">
				<p class="llms-label">Amount of Coupons</p>
				<h1>₨0.00</h1>
				<span class="spinner"></span>
				<div class="llms-widget-info">
					<p>Total amount of coupons used during this period</p>
				</div>
			</div>
		</div>

		</div>
		<!-- END Sales report analytics widgets  -->


		<!-- START Sales report chart / graph -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
		<div class="llms-charts-wrapper" id="llms-charts-wrapper">
			<canvas id="myChart" width="400" height="100"></canvas>
			<script>
var ctx = document.getElementById('myChart');
	
	var datasets = 
	[	
		{	label: '# of Sales',
		    data: [79.2],
		    backgroundColor: [
		        'rgba(255, 159, 64, 0.2)'
		    ],
		    borderWidth: 1
		},
		{	label: 'Net Sales',
		    data: [79.2],
		    backgroundColor: [
		        'rgba(255, 159, 64, 0.2)'
		    ],
		    borderWidth: 1
		},
		{	label: '# of Coupons Used',
		    data: [79.2],
		    backgroundColor: [
		        'rgba(255, 159, 64, 0.2)'
		    ],
		    borderWidth: 1
		},
		{	label: '# of Refunds',
		    data: [79.2],
		    backgroundColor: [
		        'rgba(255, 159, 64, 0.2)'
		    ],
		    borderWidth: 1
		},
		{	label: 'Amount Refunded',
		    data: [79.2],
		    backgroundColor: [
		        'rgba(255, 159, 64, 0.2)'
		    ],
		    borderWidth: 1
		},

	];	

	var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['# of Sales', 'Net Sales', '# of Coupons Used','# of Refunds', 'Amount Refunded'],
        datasets: datasets,
    },
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>


		</div>
		<!-- END Sales report chart / graph -->

		</div>
	</div>

<?php
}













add_shortcode( 'shortcode_sales_report', 'sales_report_fun' );