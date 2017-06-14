function test()
{
	console.log("include js test");
}

function decodeJson(mainId,tableName,insertId)
{
	console.log("decodeJson()");
}

function encodeJson(mainId,tableName,insertId)
{
	console.log("encodeJson():"+mainId);
	console.log(originJson);
	var i=0;
	for(i=0;i<originJson.length;++i)
	{
		if(originJson[i].id==mainId)
		{
			break;
		}
	}
	if(i<originJson.length)
	{
		//JSON.parse(originJson[i].tables);
		tables=JSON.parse(originJson[i].tables);
		console.log("tables");
		console.log(tables);
	}
	else
	{
		console.log("error:canot find by mainId");
	}
	tables=JSON.parse(originJson[i].tables);
	console.log("tables");
	console.log(tables);
	
	for(i=0;i<tables.length;++i)
	{
		if(tables[i].tableName==tableName)
		{
			break;
		}
	}
	if(i<tables.length)
	{
		console.log("something error");
		return false;
	}
	else
	{
		var table={"tableName":tableName,"id":insertId,"tag":tableName};
		tables.push(table);
		tablesString=JSON.stringify(tables);
		console.log(tablesString);
	}
	$.post("controller.php",{
		id:mainId,
		tablesString:tablesString,
		},
		function(data,status){
			//originJson=data;
			alert("数据: \n" + data + "\n状态: " + status);
			//var obj = JSON.parse(data);
			//console.log(obj[0].date);
		});
}
function createRecord(item)
{
	//console.log("createRecord "+originJson);
	console.log(item.id);
	var indexof_=item.id.indexOf("_");
	var tableName=item.id.substr(0,indexof_);
	//var tableName=tag;
	$.post("createRecord.php",{
			tableName:tableName
			//name:"菜鸟教程",
			//url:"http://www.runoob.com"
		},
		function(data,status){
			console.log("createRecord return data");
			console.log(data);
			var json=JSON.parse(data);
			var mainId=item.parentNode.parentNode.childNodes[0].innerHTML;
			//console.log(mainId);
			////console.log(json.code);
			//console.log(json.tableName);
			//console.log(json.lastInsertId);
			var code=json.code;
			var tableName=json.tableName;
			var lastInsertId=json.lastInsertId;
			alert("数据: \n" + data + "\n状态: " + status);
			encodeJson(mainId,tableName,lastInsertId);
			editItem(mainId-1,item.id,genHref(tableName,lastInsertId));
			setTimeout(function(){window.location.reload();},1000);
		});
}
function addRow(row,type)
{
		console.log("addRow()");
		row=row-2;
		var child=document.getElementsByTagName("tr");
		//var target=child[0].parentNode;
		var target=document.getElementsByTagName("tbody")[0];
		console.log(target);
		var paran=document.createElement("tr");
		{
			var para1=document.createElement("td");
			para1.setAttribute("id","id_"+row);
			var node1=document.createTextNode("1");
			para1.appendChild(node1);
			paran.appendChild(para1);
			
			var para2=document.createElement("td");
			var node2=document.createElement("input");
			node2.setAttribute("type","text");
			node2.setAttribute("required","required");
			node2.setAttribute("id","orderid_"+row);
			//node2.setAttribute("id","_50A");
			node2.setAttribute("readonly","readonly");
			para2.appendChild(node2);
			paran.appendChild(para2);
			
			var para3=document.createElement("td");
			var node3=document.createElement("button");
			node3.innerHTML="Edit";
			node3.setAttribute("onclick","switchMode(this)");
			
			node3.setAttribute("class","btn btn-default btn-xs");
			//node2.setAttribute("value","0");
			//node2.setAttribute("readonly","readonly");
			para3.appendChild(node3);
			paran.appendChild(para3);
			
			var para4=document.createElement("td");
			var node4=document.createTextNode("4");
			para4.setAttribute("id","date_"+row);
			para4.appendChild(node4);
			paran.appendChild(para4);
			
			var para5=document.createElement("td");
			var node5=document.createElement("button");
			if(type==1)
			{
				node5.setAttribute("id","invoiceregister_"+row);
			}
			else if(type==2)
			{
				node5.setAttribute("id","supervisionfees_"+row);
			}
			
			node5.setAttribute("onclick","createRecord(this)");
			node5.setAttribute("class","btn btn-default btn-xs");
			node5.innerHTML="---";
			para5.appendChild(node5);
			paran.appendChild(para5);
			
			var para6=document.createElement("td");
			var node6=document.createElement("button");
			node6.setAttribute("id","cars_"+row);
			node6.setAttribute("onclick","createRecord(this)");
			node6.setAttribute("disabled","disabled");
			node6.setAttribute("class","btn btn-default btn-xs disabled");
			node6.innerHTML="---";
			para6.appendChild(node6);
			paran.appendChild(para6);
			
			var para7=document.createElement("td");
			var node7=document.createElement("button");
			if(type==0)
			{
				
			}
			else
			{
				
			}
			node7.setAttribute("id","empty_"+row);
			node7.setAttribute("onclick","createRecord(this)");
			node7.setAttribute("disabled","disabled");
			node7.setAttribute("class","btn btn-default btn-xs disabled");
			node7.innerHTML="---";
			para7.appendChild(node7);
			paran.appendChild(para7);
		}
		target.appendChild(paran);
		//console.log("child num: "+child.length);
}
function editItem(row,tag,data)
{
	console.log("editItem()");
	console.log(row);
	console.log(tag);
	console.log(data);
	//console.log(tag+"_"+row);
	var child=document.getElementById(tag+"_"+row);
	//var index=tag.indexOf("_");
	//var t_tag=tag.substr(0,index);
	//console.log("child");
	//console.log(child);
	var target=child;
	console.log(target);
	if(tag=="id"||tag=="date")
	{
		target.innerHTML=data;
	}
	else if(tag=="orderid")
	{
		target.setAttribute("value",data);
	}
	else if((tag=="invoiceregister"||tag=="supervisionfees"||tag=="cars"||tag=="empty"))
	{
		console.log(tag+"_"+(row+2).toString());
		target=document.getElementById(tag+"_"+(row).toString());
		console.log(target);
		var parent=target.parentNode;
		target.setAttribute("href",data);
		var newtarget=document.createElement("a");
		newtarget.setAttribute("id",tag);
		newtarget.setAttribute("href",data);
		newtarget.innerHTML="<span class='glyphicon glyphicon-link' style='font-size: 16px;'></span>Go";
		parent.replaceChild(newtarget,target);
	}
	else
	{
		console.log("unkown tag:"+tag);
	}
}
function genHref(tableName,id)
{
	return "/system/view/"+tableName+".php?tableName="+tableName+"&id="+id;
}