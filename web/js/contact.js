		window.onload=function(){
			//初始化百度地图实例
			var map = new BMap.Map("myMap");
			//创建中心点
			var point = new BMap.Point(116.644116,39.949233);
			//初始化地图，设置中心点和缩放级别、
			map.centerAndZoom(point,14);

			//添加缩放比例和平移控件
			map.addControl(new BMap.NavigationControl());
			//添加比例尺
			map.addControl(new BMap.ScaleControl());

			var marker = new BMap.Marker(point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.centerAndZoom(point, 15);
	var opts = {
	  width : 200,     // 信息窗口宽度
	  height: 100,     // 信息窗口高度
	  title : "顺道嘉" , // 信息窗口标题
	  enableMessage:true,//设置允许信息窗发送短息
	  message:"亲耐滴，晚上一起吃个饭吧？戳下面的链接看下地址喔~"
	}
	var infoWindow = new BMap.InfoWindow("地址：北京市通州区榆景东路金融街园中园5号院56号楼", opts);  // 创建信息窗口对象 
	marker.addEventListener("click", function(){          
		map.openInfoWindow(infoWindow,point); //开启信息窗口
	});

		}