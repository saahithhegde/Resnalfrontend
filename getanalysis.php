<?php
$sem = $_POST["sem"]; 
$sub = $_POST["subs"]; 

?>
<script src="RGraph.svg.common.core.js"></script>
<script src="RGraph.svg.bar.js"></script>

<p><?php echo $sem,$sub;?></p>

<div style="width: 750px; height: 300px" id="chart-container"></div>

<script>
    var bar = new RGraph.SVG.Bar({
        id: 'cc',
        data: [[47,75],[32,74],[71,85],[25,19],[23,71],[81,59],[43,130],[23,20]],
        options: {
            textSize: 10,
            gutterLeft: 45,
            colors: ['#494949','#35A0DA'],
            xaxisLabels: ['Alf','Bert','Craig','Dan','Edgar','Fred','Gary','Harry'],
            xaxis: false,
            yaxisLabelsCount: 3,
            backgroundGridVlines: false,
            backgroundGridBorder: false,
            hmargin: 10,
            shadow: true
        }
    }).on('draw', function (obj)
    {
        for (var i=0; i<obj.coords.length; ++i) {

            var x = obj.coords[i].x,
                y = obj.coords[i].y,
                w = obj.coords[i].width / 2,
                h = obj.coords[i].height;


            RGraph.SVG.create({
                object: obj,
                type: 'rect',
                parent: obj.svg.all,
                attr: {
                    x: x,
                    y: y,
                    width: w,
                    height: h,
                    fill: 'rgba(255,255,255,.215)'
                }
            });
        }
    }).draw();
</script>