
<style>
    .dataTables_length, .dataTables_filter, .dataTables_info, .dataTables_paginate {
        display: none;
    }
    .module-head h2 {
        font-size: 18px; padding: 5px 0; margin: 0;
    }
    .module {
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 20px 0;
        padding-bottom: 15px;
    }
    .module .btn {
        margin-left: 10px;
    }
    .btn-mar {
        margin-top: 35px;
    }
    #content {
        margin-top: -10px;
        -webkit-box-shadow: 3px 0 4px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 3px 0 4px rgba(0, 0, 0, 0.1);
        box-shadow: 3px 0 4px rgba(0, 0, 0, 0.1);
        background-color: #eeeeee;
        background-image: url(images/paper_01.png);
        border-color: #ededed;
        overflow: visible;
    }
    .filter-group{
        background: linear-gradient(to bottom, #ffffff 0%, #f6f6f6 47%, #ddd 100%);
        height: 45px;
        margin: 0px 0px 20px 0px;
        border-radius: 4px;
        border: solid 1px #efefef;
        padding: 5px;
        text-align: center;
    }
    .filter-label{
        padding: 0px;
        font-size: 15px;
        display: block;
        position: relative;
        margin: 0px;
    }
    .chart-outside{
        /*padding: 5px 5px 5px 5px;*/
        /*height: 360px;*/
        border: 1px solid #ccc;
        border-radius: 5px;
        text-align: center;
        background-color:#f5f5f5 !important;
    }
    .handle{
        background: linear-gradient(to bottom, rgb(222, 215, 215) 0%,rgba(255,255,255,1) 49%,rgb(224, 222, 222) 100%) !important;
        height: 36px !important;
        position: relative;
        font-size: 14px !important;
        padding: 8px 10px;
        margin: 0;
        text-align: center;
        line-height: 18px;
        margin-bottom: 1px;
        cursor: pointer;
        -moz-border-radius-topleft: 4px;
        -moz-border-radius-topright: 4px;
    }
    .btn-mar {
        margin-top: 0;
        margin-bottom: 10px;
    }
    .charts{
        margin-left: 10%;
        width: 79%;
        padding: 0px;
        position: relative;
        text-align: left;
    }
    input:hover, input:focus, textarea:hover, textarea:focus {
        /*-webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2), 0 0 3px rgba(0, 0, 0, 0.2);*/
        /*-moz-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2), 0 0 3px rgba(0, 0, 0, 0.2);*/
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2), 0 0 3px rgba(0, 0, 0, 0.2);
    }

    /*canvas{*/
    /*    margin-left: 150px;*/
    /*    width: 300px !important;*/
    /*    height: 300px !important;*/

    /*}*/
</style>

<!--<div class="col-xs-12 padding right-p dashboard">-->
    <section id="content">
        <?php $this->load->view('admin/common/breadcrumbs');?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js"></script>

        <form onsubmit="chartFformSubmit(event)" id="chartFilterForm" class="row" method="GET">
            <div class="col-md-12">
                <div  class="filter-group">
                    <div class="col-md-1">
                        <div class="filter-label">
                           <div>Filter By</div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="">
                            <select name="modules" style="float: left; width: 15%;margin-right: 10px;" class="form-control">
                                <option>Default</option>
                                <option>Employees</option>
                                <option>Employees2</option>
                                <option>Employees3</option>
                                <option>Employees4</option>
                                <option>Employees5</option>
                            </select>

                        </div>
                        <select name="year_lists" style="float: left; width: 15%;margin-right: 10px;" class="form-control">
                            <option>2020</option>
                            <option>2019</option>
                        </select>
                        <select name="month_lists" style="float: left; margin-right: 10px;width: 15%;" class="form-control">
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <div style="width: 40px; margin-right: 7px;margin-top: 7px;float: left;">OR</div>
                        <div class="periodDivs">
                            <input type="text" name="from_period" class="form-control placeholder hasDatepicker" style="width: 15%;
                               float: left;margin-right: 10px;" placeholder="From Date">
                            <input type="text" name="to_period" class="form-control placeholder hasDatepicker" style="width: 15%;
                               float: left;margin-right: 10px;" placeholder="To Date">
<!--                            <input class="btn" type="submit" name="search_by_periods" value="Search" style="background-color: #f1f1f1;background-image: -webkit-gradient(linear, left top, left bottom, from(#d4caca), to(#f7f4f4));float: left;height: 35px;color: #55555582;-->
<!--                margin-right: 10px;text-transform: initial;padding: 5px 15px 5px 15px;">-->
                            <input class="btn btn-default btn-mar" type="submit" name="search_by" value="Search" style="float:left;margin-right: 10px;height: 35px;color: #1b1919;
                  text-transform: initial;padding: 5px 15px 5px 15px;font-weight:400;">

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <div class="chart-outside">
                        <h3 class="handle"><?php echo $this->lang->line('quote_requests');?></h3>
                        <div class="charts">
                    <canvas id="pie-chart" width="200px" height="200px"></canvas>
                            <a href="<?=base_url("admin/request")?>" class="btn btn-default btn-mar" style="margin-left: -40px;">Go to Quote Requests</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="chart-outside">
                        <h3 class="handle"><?php echo $this->lang->line('calls');?></h3>
                        <div class="charts">
                    <canvas id="pie-chart2" width="200px" height="200px"></canvas>
                            <a href="<?=base_url("admin/calls")?>" class="btn btn-default btn-mar" style="margin-left: -40px;">Go to Calls</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="chart-outside">
                        <h3 class="handle"><?php echo $this->lang->line('job_applications');?></h3>
                        <div class="charts">
                            <canvas id="pie-chart3" width="200px" height="200px"></canvas>
                            <a href="<?=base_url("admin/jobs")?>" class="btn btn-default" style="margin-left: -40px;margin-bottom: 10px;">Go to Job Applications</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="chart-outside">
                        <h3 class="handle"><?php echo ($this->lang->line('support_applications'));?></h3>
                        <div class="charts">
                            <canvas id="pie-chart4" width="200px" height="200px"></canvas>
                            <a href="<?=base_url("admin/support")?>" class="btn btn-default" style="margin-left: -40px;margin-bottom: 10px;">Go to Support Applications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="col-md-3">
                    <div class="chart-outside" style="margin-top: 20px;">
                        <h3 class="handle"><?php echo $this->lang->line('quote_requests');?></h3>
                        <div class="charts">
                    <canvas id="myChart" width="200px" height="200px">
                    </canvas>
                            <a href="<?=base_url("admin/request")?>" class="btn btn-default btn-mar" style="margin-left: -40px;">Go to Quote Requests</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="chart-outside" style="margin-top: 20px;">
                        <h3 class="handle"><?php echo $this->lang->line('calls');?></h3>
                        <div class="charts">
                            <canvas id="myChart1" width="200px" height="200px"></canvas>
                            <a href="<?=base_url("admin/calls")?>" class="btn btn-default btn-mar" style="margin-left: -40px;">Go to Calls</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="chart-outside" style="margin-top: 20px;">
                        <h3 class="handle"><?php echo $this->lang->line('job_applications');?></h3>
                        <div class="charts">
                            <canvas id="myChart2" width="200px" height="200px"></canvas>
                            <a href="<?=base_url("admin/jobs")?>" class="btn btn-default" style="margin-left: -40px;margin-bottom: 10px;">Go to Job Applications</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="chart-outside" style="margin-top: 20px;">
                        <h3 class="handle"><?php echo $this->lang->line('support_applications');?></h3>
                        <div class="charts">
                            <canvas id="myChart3" width="200px" height="200px"></canvas>
                            <a href="<?=base_url("admin/support")?>" class="btn btn-default" style="margin-left: -40px;margin-bottom: 10px;">Go to Support Applications</a>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <div class="chart-outside" style="margin-top: 20px;">
                        <h3 class="handle"><?php echo $this->lang->line('quote_requests');?></h3>
                        <div class="charts">
                            <canvas id="line-chart" width="200px" height="200px"></canvas>
                            <a href="<?=base_url("admin/request")?>" class="btn btn-default btn-mar" style="margin-left: -40px;">Go to Quote Requests</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="chart-outside" style="margin-top: 20px;">
                        <h3 class="handle"><?php echo $this->lang->line('calls');?></h3>
                        <div class="charts">
                            <canvas id="line-chart1" width="200px" height="200px"></canvas>
                            <a href="<?=base_url("admin/calls")?>" class="btn btn-default btn-mar" style="margin-left: -40px;">Go to Calls</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="chart-outside" style="margin-top: 20px;">
                        <h3 class="handle"><?php echo $this->lang->line('job_applications');?></h3>
                        <div class="charts">
                            <canvas id="line-chart2" width="200px" height="200px">
                            </canvas>
                            <a href="<?=base_url("admin/jobs")?>" class="btn btn-default" style="margin-left: -40px;margin-bottom: 10px;">Go to Job Applications</a>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="chart-outside" style="margin-top: 20px;">
                        <h3 class="handle"><?php echo $this->lang->line('support_applications');?></h3>
                        <div class="charts">
                            <canvas id="line-chart3" width="200px" height="200px">
                            </canvas>
                            <a href="<?=base_url("admin/support")?>" class="btn btn-default" style="margin-left: -40px;margin-bottom: 10px;">Go to Support Applications</a>
                        </div>

                    </div>
                </div>


            </div>
<!--            <div class="col-md-4">-->
<!--                <div class="module">-->
<!--                    <div class="module-head">-->
<!--                        <h2 class="grad-bg text-center">Quote Requests:</h2>-->
<!--                    </div>-->
<!--                    <div class="module-body">-->
<!--                        <table class="table table-bordered">-->
<!---->
<!--                            <tbody>-->
<!--                            <tr>-->
<!--                                <th>--><?php //echo $this->lang->line('new');?><!--: </th>-->
<!--                                <td>--><?//=isset($request['new']) ? $request['new'] : 0?><!--</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th>--><?php //echo $this->lang->line('pending');?><!--: </th>-->
<!--                                <td>--><?//=isset($request['pending']) ? $request['pending'] : 0?><!--</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th>--><?php //echo $this->lang->line('replied');?><!--: </th>-->
<!--                                <td>--><?//=isset($request['replied']) ? $request['replied'] : 0?><!--</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th>--><?php //echo $this->lang->line('closed');?><!--: </th>-->
<!--                                <td>--><?//=isset($request['closed']) ? $request['closed'] : 0?><!--</td>-->
<!--                            </tr>-->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                        <a href="--><?//=base_url("admin/request")?><!--" class="btn btn-default btn-mar">Go to Quote Requests</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4">-->
<!--                <div class="module">-->
<!--                    <div class="module-head">-->
<!--                        <h2 class="grad-bg text-center">Calls:</h2>-->
<!--                    </div>-->
<!--                    <div class="module-body">-->
<!--                        <table class="table table-bordered">-->
<!--                            <tbody>-->
<!--                            <tr>-->
<!--                                <th>--><?php //echo $this->lang->line('new');?><!--: </th>-->
<!--                                <td>--><?//=isset($calls['new']) ? $calls['new'] : 0?><!--</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th>--><?php //echo $this->lang->line('pending');?><!--: </th>-->
<!--                                <td>--><?//=isset($calls['pending']) ? $calls['pending'] : 0?><!--</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th>--><?php //echo $this->lang->line('replied');?><!--: </th>-->
<!--                                <td>--><?//=isset($calls['replied']) ? $calls['replied'] : 0?><!--</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th>--><?php //echo $this->lang->line('closed');?><!--: </th>-->
<!--                                <td>--><?//=isset($calls['closed']) ? $calls['closed'] : 0?><!--</td>-->
<!--                            </tr>-->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                        <a href="--><?//=base_url("admin/calls")?><!--" class="btn btn-default btn-mar">Go to Calls</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-md-4">-->
<!--                <div class="module">-->
<!--                    <div class="module-head">-->
<!--                        <h2 class="grad-bg text-center">Job Applications:</h2>-->
<!--                    </div>-->
<!--                    <div class="module-body">-->
<!--                        <table class="table table-bordered">-->
<!--                            <tbody>-->
<!--                            <tr>-->
<!--                                <th>--><?php //echo $this->lang->line('new');?><!--: </th>-->
<!--                                <td>--><?//=isset($jobs['new']) ? $jobs['new'] : 0?><!--</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th>--><?php //echo $this->lang->line('pending');?><!--: </th>-->
<!--                                <td>--><?//=isset($jobs['pending']) ? $jobs['pending'] : 0?><!--</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th>--><?php //echo $this->lang->line('meeting');?><!--: </th>-->
<!--                                <td>--><?//=isset($jobs['meeting']) ? $jobs['meeting'] : 0?><!--</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th>--><?php //echo $this->lang->line('accepted');?><!--: </th>-->
<!--                                <td>--><?//=isset($jobs['accepted']) ? $jobs['accepted'] : 0?><!--</td>-->
<!--                            </tr>-->
<!--                            <tr>-->
<!--                                <th>--><?php //echo $this->lang->line('denied');?><!--: </th>-->
<!--                                <td>--><?//=isset($jobs['denied']) ? $jobs['denied'] : 0?><!--</td>-->
<!--                            </tr>-->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                        <a href="--><?//=base_url("admin/jobs")?><!--" class="btn btn-default">Go to Job Applications</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </section>
    <!--/.content-->
</div>
<!--/.span9-->
</div>
<!--/.container-->
</section>
<!--</div>-->
<!--/.wrapper-->
<script>


    //First Pie Chart

    var data = {
        datasets: [{
            data: [
                <?=isset($request['new']) ? $request['new'] : 0?>,
                <?=isset($request['pending']) ? $request['pending'] : 0?>,
                <?=isset($request['replied']) ? $request['replied'] : 0?>,
                <?=isset($request['closed']) ? $request['closed'] : 0?>
            ],
            backgroundColor: [
                "#e67e22",
                "#e74c3c",
                "#2ecc71",
                "#95a5a6"

            ],
            label: 'My dataset' // for legend
        }],
        labels: [
            "New",
            "Pending",
            "Replied",
            "Closed"
        ]

    };

    var pieOptions = {
        legend: {
            display: true,
            position: "top",
            labels: {
                fontSize: 12
            }
        },
        events: false,
        animation: {
            duration: 500,
            easing: "easeOutQuart",
            onComplete: function () {
                var ctx = this.chart.ctx;
                ctx.font = Chart.helpers.fontString(16, 'bold', Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset) {

                    for (var i = 0; i < dataset.data.length; i++) {
                        var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                            total = dataset._meta[Object.keys(dataset._meta)[0]].total,
                            mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
                            start_angle = model.startAngle,
                            end_angle = model.endAngle,
                            mid_angle = start_angle + (end_angle - start_angle)/2;

                        var x = mid_radius * Math.cos(mid_angle);
                        var y = mid_radius * Math.sin(mid_angle);

                        ctx.fillStyle = '#fff';
                        if (i == 3){ // Darker text color for lighter background
                            ctx.fillStyle = '#444';
                        }
                        var percent = String(Math.round(dataset.data[i]/total*100)) + "%";
                        ctx.fillText(dataset.data[i], model.x + x, model.y + y);
                        // Display percent in another line, line break doesn't work for fillText
                        ctx.fillText(percent, model.x + x, model.y + y + 15);
                    }
                });
            }
        }
    };

    var pieChartCanvas = $("#pie-chart");
    var pieChart1 = new Chart(pieChartCanvas, {
        type: 'pie', // or doughnut
        data: data,
        options: pieOptions

    });
   //console.log(pieChart1)

    // Second Pie Chart

    var data = {
        datasets: [{
            data: [
                <?=isset($calls['new']) ? $calls['new'] : 0?>,
                <?=isset($calls['pending']) ? $calls['pending'] : 0?>,
                <?=isset($calls['replied']) ? $calls['replied'] : 0?>,
                <?=isset($calls['closed']) ? $calls['closed'] : 0?>

            ],
            backgroundColor: [
                "#e67e22",
                "#e74c3c",
                "#2ecc71",
                "#95a5a6"

            ],
            label: 'My dataset' // for legend
        }],
        labels: [
            "New",
            "Pending",
            "Replied",
            "Closed"
        ]
    };

    var pieOptions = {
        legend: {
            display: true,
            fullWidth: true,
            position: "top",
            align: "start",
            labels: {
                fontSize: 12
            }
        },
        events: false,
        animation: {
            duration: 500,
            easing: "easeOutQuart",
            onComplete: function () {
                var ctx = this.chart.ctx;
                ctx.font = Chart.helpers.fontString(16, 'bold', Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset) {

                    for (var i = 0; i < dataset.data.length; i++) {
                        var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                            total = dataset._meta[Object.keys(dataset._meta)[0]].total,
                            mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
                            start_angle = model.startAngle,
                            end_angle = model.endAngle,
                            mid_angle = start_angle + (end_angle - start_angle)/2;

                        var x = mid_radius * Math.cos(mid_angle);
                        var y = mid_radius * Math.sin(mid_angle);

                        ctx.fillStyle = '#fff';
                        if (i == 3){ // Darker text color for lighter background
                            ctx.fillStyle = '#444';
                        }
                        var percent = String(Math.round(dataset.data[i]/total*100)) + "%";
                        ctx.fillText(dataset.data[i], model.x + x, model.y + y);
                        // Display percent in another line, line break doesn't work for fillText
                        ctx.fillText(percent, model.x + x, model.y + y + 15);
                    }
                });
            }
        }
    };

    var pieChartCanvas = $("#pie-chart2");
    var pieChart2 = new Chart(pieChartCanvas, {
        type: 'pie', // or doughnut
        data: data,
        options: pieOptions
    });


    //Third Pie Chart
    var data = {
        datasets: [{
            data: [
                <?=isset($jobs['new']) ? $jobs['new'] : 0?>,
                <?=isset($jobs['pending']) ? $jobs['pending'] : 0?>,
                <?=isset($jobs['meeting']) ? $jobs['meeting'] : 0?>,
                <?=isset($calls['accepting']) ? $jobs['accepting'] : 0?>,
                <?=isset($jobs['denied']) ? $jobs['denied'] : 0?>
            ],
            backgroundColor: [
                "#e67e22",
                "#e74c3c",
                "#2ecc71",
                "#95a5a6",
                "#36A2EB"
            ],
            label: 'My dataset' // for legend
        }],
        labels: [
            "New",
            "Pending",
            "Meeting",
            "Accepted",
            "Denied"
        ]
    };

    var pieOptions = {
        legend: {
            display: true,
            position: "top",
            labels: {
                fontSize: 12
            }
        },
        events: false,
        animation: {
            duration: 500,
            easing: "easeOutQuart",
            onComplete: function () {
                var ctx = this.chart.ctx;
                ctx.font = Chart.helpers.fontString(16, 'bold', Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset) {

                    for (var i = 0; i < dataset.data.length; i++) {
                        var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                            total = dataset._meta[Object.keys(dataset._meta)[0]].total,
                            mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
                            start_angle = model.startAngle,
                            end_angle = model.endAngle,
                            mid_angle = start_angle + (end_angle - start_angle)/2;

                        var x = mid_radius * Math.cos(mid_angle);
                        var y = mid_radius * Math.sin(mid_angle);

                        ctx.fillStyle = '#fff';
                        if (i == 3){ // Darker text color for lighter background
                            ctx.fillStyle = '#444';
                        }
                        var percent = String(Math.round(dataset.data[i]/total*100)) + "%";
                        ctx.fillText(dataset.data[i], model.x + x, model.y + y);
                        // Display percent in another line, line break doesn't work for fillText
                        ctx.fillText(percent, model.x + x, model.y + y + 15);
                    }
                });
            }
        }
    };

    var pieChartCanvas = $("#pie-chart3");
    var pieChart3 = new Chart(pieChartCanvas, {
        type: 'pie', // or doughnut
        data: data,
        options: pieOptions
    });
	
    //Fourth Pie Chart

    var data = {
        datasets: [{
            data: [
                <?=isset($support['new']) ? $support['new'] : 0?>,
                <?=isset($support['pending']) ? $support['pending'] : 0?>,
                <?=isset($support['replied']) ? $support['replied'] : 0?>,
                <?=isset($support['closed']) ? $support['closed'] : 0?>
            ],
            backgroundColor: [
                "#e67e22",
                "#e74c3c",
                "#2ecc71",
                "#95a5a6"
            ],
            label: 'My dataset' // for legend
        }],
        labels: [
            "New",
            "Pending",
            "Replied",
            "Closed",
        ]
    };

    var pieOptions = {
        legend: {
            display: true,
            position: "top",
            labels: {
                fontSize: 12
            }
        },
        events: false,
        animation: {
            duration: 500,
            easing: "easeOutQuart",
            onComplete: function () {
                var ctx = this.chart.ctx;
                ctx.font = Chart.helpers.fontString(16, 'bold', Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset) {

                    for (var i = 0; i < dataset.data.length; i++) {
                        var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                            total = dataset._meta[Object.keys(dataset._meta)[0]].total,
                            mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
                            start_angle = model.startAngle,
                            end_angle = model.endAngle,
                            mid_angle = start_angle + (end_angle - start_angle)/2;

                        var x = mid_radius * Math.cos(mid_angle);
                        var y = mid_radius * Math.sin(mid_angle);

                        ctx.fillStyle = '#fff';
                        if (i == 3){ // Darker text color for lighter background
                            ctx.fillStyle = '#444';
                        }
                        var percent = String(Math.round(dataset.data[i]/total*100)) + "%";
                        ctx.fillText(dataset.data[i], model.x + x, model.y + y);
                        // Display percent in another line, line break doesn't work for fillText
                        ctx.fillText(percent, model.x + x, model.y + y + 15);
                    }
                });
            }
        }
    };

    var pieChartCanvas = $("#pie-chart4");
    var pieChart4 = new Chart(pieChartCanvas, {
        type: 'pie', // or doughnut
        data: data,
        options: pieOptions
    });
    
    
    function chartFformSubmit(e){
        e.preventDefault();
        var url = "<?php echo base_url('index.php/request/filterby'); ?>";
        var form = $('#chartFilterForm');
        $.get(url+'?'+form.serialize(),function(res,b,c) {
            const r = JSON.parse(res);
            pieChart1.data.datasets[0].data = r.chart1
            pieChart2.data.datasets[0].data = r.chart2
            pieChart3.data.datasets[0].data = r.chart3
            pieChart4.data.datasets[0].data = r.chart4
            pieChart1.update();
            pieChart2.update();
            pieChart3.update();
            pieChart4.update();
            console.log(JSON.parse(res));
        });
    }
    
    
    
    
    
    
    
    
    
    
    //First Bar Chart
    $(function() {
        var cData = JSON.parse(`<?php echo $chart_data; ?>`);
        //console.log(cData);
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: cData.label,
                datasets: [{
                    label: '# of Quote Request',
                    data: cData.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    xAxes: [{
                        ticks: {
                            // maxRotation: 90,
                            // minRotation: 80
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    });
    //Second Bar Chart
    var callData = JSON.parse(`<?php echo $call_chart_data; ?>`);
    var ctx = document.getElementById("myChart1");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: callData.label,
            datasets: [{
                label: '# of Calls',
                data: callData.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                xAxes: [{
                    ticks: {
                        // maxRotation: 90,
                        // minRotation: 80
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    //Third Bar Chart
    var jobsData = JSON.parse(`<?php echo $jobs_chart_data; ?>`);
    var ctx = document.getElementById("myChart2");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: jobsData.label,
            datasets: [{
                label: '# of Job Application',
                data: jobsData.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                xAxes: [{
                    ticks: {
                        // maxRotation: 90,
                        // minRotation: 80
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
	
	//Fourth Bar Chart
    var callData = JSON.parse(`<?php echo $support_chart_data; ?>`);
    var ctx = document.getElementById("myChart3");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: callData.label,
            datasets: [{
                label: '# of Support',
                data: callData.data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                xAxes: [{
                    ticks: {
                        // maxRotation: 90,
                        // minRotation: 80
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    //First Line Chart

    var serries = JSON.parse(`<?php echo $qoute_line_data; ?>`);
    console.log(serries);
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {
            labels:serries.day,
            datasets: [{

                data:serries.count,
                label: "Total Request",
                borderColor: "#3e95cd",
                fill: false
            }

            ]
        },
        options: {
            title: {
                display: true,
                 text: 'Quote Requests'
            }
        }
    });


    //Second Line Chart
    var chartData = JSON.parse(`<?php echo $calls_line_data; ?>`);
    new Chart(document.getElementById("line-chart1"), {
        type: 'line',
        data: {
            labels: chartData.day,
            datasets: [{
                data: chartData.count,
                label: "Call Request",
                borderColor: "#3e95cd",
                fill: false
            }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Calls'
            }
        }
    });


    //Third Line Chart
    var chartDatas = JSON.parse(`<?php echo $jobs_line_data; ?>`);
    new Chart(document.getElementById("line-chart2"), {
        type: 'line',
        data: {
            labels:chartDatas.day,
            datasets: [{
                data: chartDatas.count,
                label: "Jobs Application",
                borderColor: "#3e95cd",
                fill: false
            }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Job Applications'
            }
        }
    });
	
	//Fourth Line Chart
    var chartData = JSON.parse(`<?php echo $support_line_data; ?>`);
    new Chart(document.getElementById("line-chart3"), {
        type: 'line',
        data: {
            labels: chartData.day,
            datasets: [{
                data: chartData.count,
                label: "Support Request",
                borderColor: "#3e95cd",
                fill: false
            }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Support'
            }
        }
    });

</script>
<script>    $(document).ready(function () {
       // $("#from_period").wl_Date({dateFormat: 'dd/mm/yy'});
        //$("#to_period").wl_Date({dateFormat: 'dd/mm/yy'});
    });</script>
