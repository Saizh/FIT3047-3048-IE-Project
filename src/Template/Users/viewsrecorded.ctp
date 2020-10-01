<?php
/**
 * @var \App\View\AppView $this
 * @var array[] $popularArticles
 * @var array[] $viewsOverTime
 */
?>



<a class="login100-form-title p-b-49"><br>Units Views Recorded</a>





<div>
  <li>
                                            <?= $this->Html->link(
                                            'Unit 1 ',
                                            ['controller' => 'student', 'action' => 'unit1', '_full' => true]
                                            );?>
  </li>

  <li>

                                            <?= $this->Html->link(
                                            'Unit 2',
                                            ['controller' => 'student', 'action' => 'unit2', '_full' => true]
                                            );?>
  </li>
  <li>

                                            <?= $this->Html->link(
                                            'Unit 3',
                                            ['controller' => 'student', 'action' => 'unit3', '_full' => true]
                                            );?>
   </li>


</div>



<div class="container">
<a> Unit 1 Page View Counter</a>
<div>
<!-- hitwebcounter Code START -->
<a href="http://www.hitwebcounter.com" target="_blank">
<img src="http://hitwebcounter.com/counter/counter.php?page=7010424&style=0024&nbdigits=6&type=page&initCount=0" title="" Alt=""   border="0" >
</a>
                                        <!-- hitwebcounter.com --><a href="http://www.hitwebcounter.com" title=""
                                        target="_blank" style="font-family: ;
                                        font-size: px; color: #; text-decoration:  ;">                                        </>
                                        </a>
</div>
<a> Unit 1 Visitor View Counter</a>
<div>
<!-- hitwebcounter Code START -->
<a href="http://www.hitwebcounter.com" target="_blank">
<img src="http://hitwebcounter.com/counter/counter.php?page=7010426&style=0024&nbdigits=6&type=ip&initCount=0" title="" Alt=""   border="0" >
</a>                                        <br/>
                                        <!-- hitwebcounter.com --><a href="http://www.hitwebcounter.com" title=""
                                        target="_blank" style="font-family: ;
                                        font-size: px; color: #; text-decoration:  ;">                                       </>
                                        </a>
</div>
</div>





   <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Unit 1 Page Views Weekly</title>
<script src="https://a.alipayobjects.com/jquery/jquery/1.11.1/jquery.js"></script>
<script src="https://gw.alipayobjects.com/as/g/datavis/g2/2.3.13/index.js"></script>
      </head>
      <body>
          <div id="c1"></div>
 <script>

var data = [];
var chart = new G2.Chart({
  id: 'c1',
  forceFit: true,
  height: 450
});

chart.source(data, {
  time: {
    alias: 'Date',
    type: 'time',
    mask: 'MM:ss',
    tickCount:10,
    nice: false
  },
  columns: {
    alias: 'Number of Unit 1 views over time.',
    min: 10,
    max: 40
  },
  type:{
    type:'cat'
  }
});
chart.line().position('time*columns').color('type',['#ff7f0e','#2ca02c']).shape('smooth').size(2);
chart.render();

var tmp = setInterval(function(){
  var now = new Date();
  var time = now.getTime();
  var columns = ~~(Math.random() * 5) + 22;

  if(data.length >= 200) {
    data.shift();

  }
  data.push({time: time, columns: columns, type: 'Unit 1'});

  chart.changeData(data);
},1000);
</script>


      </body>
    </html>












