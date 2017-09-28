
		$(function(){
			var removeLink = ' <span style="" class="remove btn btn-danger btn-rounded"  onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false">X</span>';
			
			$('.add').relCopy({ append: removeLink});	
		});

		$(function(){
			var removeLink = ' <span style="" class="remove btn btn-danger btn-rounded"  onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false">Remove</span>';
			
			$('.addemployee').relCopy({ append: removeLink});	
		});
		
		$(function(){
			var removeLink = ' <span style="" class="remove btn btn-danger btn-rounded"  onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false">Remove M</span>';
			
			$('.addmanager').relCopy({ append: removeLink});	
		});
		
		function daysInMonth(month,year) {
				return new Date(year, month, 0).getDate();
			}
			
			var dt = new Date();
			var d = dt.getDate(); //Number of days
			var mm = dt.getMonth();
			var m = mm+1;
			var y = dt.getFullYear();
			var e = daysInMonth(m,y); //Current month days
			//alert(e);
		
		function findTotal(){
			
			var arr = document.getElementsByName('Activation1');
			var arr1 = document.getElementsByName('Activation2');
			
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseInt(arr[i].value))
					tot1 = parseInt(arr[i].value);
			}
			for(var i=0;i<arr1.length;i++){
				if(parseInt(arr1[i].value))
					tot = parseInt(arr1[i].value);
					tot = tot/d*e;
					tot = tot/tot1;
					tot = tot.toFixed(2);
			}
			document.getElementById('total').value = tot;
			
		}
	   
		function findTotal1(){
			var arr = document.getElementsByName('Upgrade1');
			var arr1 = document.getElementsByName('Upgrade2');
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseInt(arr[i].value))
					tot1 = parseInt(arr[i].value);
			}
			for(var i=0;i<arr1.length;i++){
				if(parseInt(arr1[i].value))
					tot = parseInt(arr1[i].value);
					tot = tot/d*e;
					tot = tot/tot1;
					tot = tot.toFixed(2);
			}
			document.getElementById('total1').value = tot;
		}
	
		function findTotal2(){
			var arr = document.getElementsByName('Accessory1');
			var arr1 = document.getElementsByName('Accessory2');
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseInt(arr[i].value))
					tot2 = parseInt(arr[i].value);
			}
			for(var i=0;i<arr1.length;i++){
				if(parseInt(arr1[i].value))
					tot = parseInt(arr1[i].value);
					tot = tot/d*e;
					tot = tot/tot2;
					tot = tot.toFixed(2);
			}
			document.getElementById('total2').value = tot;
		}
	
		function findTotal3(){
			var arr = document.getElementsByName('GP1');
			var arr1 = document.getElementsByName('GP2');
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseInt(arr[i].value))
					tot3 = parseInt(arr[i].value);
			}
			for(var i=0;i<arr1.length;i++){
				if(parseInt(arr1[i].value))
					tot = parseInt(arr1[i].value);
					tot = tot/d*e;
					tot = tot/tot3;
					tot = tot.toFixed(2);
			}
			document.getElementById('total3').value = tot;
		}
	
		function findTotal4(){
			var arr = document.getElementsByName('Deezer1');
			var arr1 = document.getElementsByName('Deezer2');
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseInt(arr[i].value))
					tot4 = parseInt(arr[i].value);
			}
			for(var i=0;i<arr1.length;i++){
				if(parseInt(arr1[i].value))
					tot = parseInt(arr1[i].value);
					tot = tot/d*e;
					tot = tot/tot4;
					tot = tot.toFixed(2);
			}
			document.getElementById('total4').value = tot;
		}
	
		function findTotal5(){
			var arr = document.getElementsByName('AP1');
			var arr1 = document.getElementsByName('AP2');
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseInt(arr[i].value))
					tot5 = parseInt(arr[i].value);
			}
			for(var i=0;i<arr1.length;i++){
				if(parseInt(arr1[i].value))
					tot = parseInt(arr1[i].value);
					tot = tot/d*e;
					tot = tot/tot5;
					tot = tot.toFixed(2);
			}
			document.getElementById('total5').value = tot;
		}
	
		function findTotal6(){
			var arr = document.getElementsByName('CP1');
			var arr1 = document.getElementsByName('CP2');
			var tot=0;
			for(var i=0;i<arr.length;i++){
				if(parseInt(arr[i].value))
					tot6 = parseInt(arr[i].value);
			}
			for(var i=0;i<arr1.length;i++){
				if(parseInt(arr1[i].value))
					tot = parseInt(arr1[i].value);
					tot = tot/d*e;
					tot = tot/tot6;
					tot = tot.toFixed(2);
			}
			document.getElementById('total6').value = tot;
		}