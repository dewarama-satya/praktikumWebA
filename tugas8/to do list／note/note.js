function edit_row(no)
{
	document.getElementById("edit_button"+no).style.display="none";
	document.getElementById("save_button"+no).style.display="block";
		
	var kegiatan=document.getElementById("kegiatan_row"+no);
	var kegiatan_data=kegiatan.innerHTML;		
	kegiatan.innerHTML="<input type='text' id='kegiatan_text"+no+"' value='"+kegiatan_data+"'>";
}

function save_row(no)
{
	var kegiatan_val=document.getElementById("kegiatan_text"+no).value;
	document.getElementById("kegiatan_row"+no).innerHTML=kegiatan_val;

	document.getElementById("edit_button"+no).style.display="block";
	document.getElementById("save_button"+no).style.display="none";
}

function delete_row(no)
{
	document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
	var new_kegiatan=document.getElementById("new_kegiatan").value;

	var table=document.getElementById("data_table");
	var table_len=(table.rows.length)-1;
	var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='kegiatan_row"+table_len+"'>"+new_kegiatan+"</td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

	document.getElementById("new_kegiatan").value="";
}