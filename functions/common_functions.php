<?php
// converts array data into a simple HTML table format
function array_to_table($_header_names, $_data, $_with_numbering =
TRUE) {
	// extra numbering at the left-most column
	$number = 1;
	$table = '<table border="1">';
	// create header columns
	$table.='<tr>';
	// buids the header row
	foreach ($_header_names as $header) {
		$table .= '<th>' . $header . '</th>';
	}
	$table .= "<th colspan=3>Action</th>";
	$table.='</tr>';
	
	// create data rows
	foreach ($_data as $datum) {
		$table.='<tr>';
		if ($_with_numbering) {
			$table .= '<td>' . $number++ . '</td>';
		}
		$temp;
		// cell will be filled wih 'NULL' when it is empty
		foreach ($datum as $cell) {
			$table .= '<td>' . (($cell) ? $cell : 'NULL') . '</td>' ;
		}
		$table .= "<td><a href=mail.php?id=$datum[id]>View</td>";
	}
	
	$table.='</tr>';

	$table .= '</table>';

	return ($table);
}
//single arr_to_table
function array_to_table_single($_header_names, $_id)
{
	$i=0;
	$arr = array(6);
	$books=view_books_by_id($_id);
	foreach ($books as $book) {
		foreach($book as $cell){
			 $arr[$i] = $cell;
			 $i++;
		}
	}
	$table = '<table border="1">';
	$table.='<tr>';
	
	$i=0;
	foreach ($_header_names as $header) {
		$table .= '<td>' . $header . '</td>';
		$table .= '<td> : </td>';
		
			$table .= "<td>". $arr[$i] ."</td>";
			$table .= '</tr>';
			$table .= '<tr>';
			$i++;
	}
	
	
	$table.='</tr>';	
	$table .= '</table>';

	return ($table);

}
function array_to_table_single2($_header_names, $_id)
{
	$i=0;
	$arr = array(6);
	$authors=view_authors_by_id($_id);
	foreach ($authors as $author) {
		foreach($author as $cell){
			 $arr[$i] = $cell;
			 $i++;
		}
	}
	$table = '<table border="0">';
	$table.='<tr>';
	
	$i=0;
	foreach ($_header_names as $header) {
		$table .= '<td>' . $header . '</td>';
		$table .= '<td> : </td>';
		
			$table .= "<td>". $arr[$i] ."</td>";
			$table .= '</tr>';
			$table .= '<tr>';
			$i++;
	}
	
	
	$table.='</tr>';	
	$table .= '</table>';

	return ($table);

}
	
function array_to_table_single3($_header_names, $_id)
{
	$i=0;
	$arr = array(1);
	$publishers=view_publishers_by_id($_id);
	foreach ($publishers as $publisher) {
		foreach($publisher as $cell){
			 $arr[$i] = $cell;
			 $i++;
		}
	}
	$table = '<table border="0">';
	$table.='<tr>';
	
	$i=0;
	foreach ($_header_names as $header) {
		$table .= '<td>' . $header . '</td>';
		$table .= '<td> : </td>';
		
			$table .= "<td>". $arr[$i] ."</td>";
			$table .= '</tr>';
			$table .= '<tr>';
			$i++;
	}
	
	
	$table.='</tr>';	
	$table .= '</table>';

	return ($table);

}
// creates a link with URL and link text specified

function create_anchor($_url, $_link, $_alt = NULL) {
	return('<a href="' . $_url . '" alt="' . (($_alt) ? $_alt : $_link)
. '" class="normal_anchor">' . $_link . '</a>');
}

function navigate_member($_name)
{
    return("<a href='member.php?name=".$_name.">".$_name."</a>");
}

// read a parameter passed through POST method
function get_post_parameter($_key) {
	// trim is removing white-spaces before and after value
	$data = ((isset($_POST[$_key])) ? trim($_POST[$_key]) : NULL);

	// addslashes puts slash to prevent SQL-injection
	if (!empty($data) && strlen($data)) {
		return ($data);
	}
	return(NULL);
}

// for debugging
function debug($_message, $_use_numbering = TRUE) {
	static $debug_numbering = 0;
	if (get_config('show_debug')) {
		echo((($_use_numbering) ? 'debug (' . (++$debug_numbering) .
'): ' : '') . $_message . '<br/>');
	}
}

function redirect_to($url = null) {
    debug('redirect_to');
    echo("<SCRIPT LANGUAGE='JavaScript'>document.location='" . $url .
    "'</SCRIPT>");
    die;
}
?>