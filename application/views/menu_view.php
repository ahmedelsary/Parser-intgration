<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="utf-8">
    <title>Menu</title>
    <link href="<?php  echo base_url() ?>styles/style.css" rel="stylesheet"/>
    <script src="<?php echo base_url() ?>scripts/script.js"></script>-->

	
</head>
<body>
<div id="container">
    <table>
        <th>Item</th>
        <th>Url</th>
        <th>Icon</th>
        <th>Parent Item</th>
        <th>sort</th>
        <th>Add</th>
        <th>Edit</th>
        <th>Delete</th>
        <tr>
            <?php 
            foreach ($items as $item)
            {
                echo "<td>".$item->title."</td>";
                echo "<td>".$item->url."</td>";
                echo "<td>".$item->icon_path."</td>";
                echo "<td>".$item->parent_id."</td>";
                echo "<td>".$item->sort."</td>";
                echo "<td><a href='menu/add'>Add<a/></td>";
                echo "<td><a href='menu/edit/".$item->id."'>Edit<a/></td>";
                echo "<td><a href='menu/delete/".$item->id."'>Delete<a/></td>";
            }
            
            
            
            
            ?>
        </tr>
    </table>
