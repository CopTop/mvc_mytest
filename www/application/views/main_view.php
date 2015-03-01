<h1>Robo shop</h1>
<p>
<div id="content">




    <?
    if(isset($_GET['id_cat'])) {


        $id_cat= $_GET['id_cat'];
        echo '<form name="" action="" method="post">
				<table aling="left">
				<tr>

				<td>Price from:</td><td><input type="text" name="price_start" /> $</td>
				</tr>
				<tr>
				<td>Price to:</td><td><input type="text" name="price_end" /> $</td>
			</tr>
				</table>
				<input type="submit" name="filter" value="Find goods"    />
				</form>';


    }
    ?>


    <?
    tov();

    if(isset($_GET['id_cat']))
    {

        $id_cat= $_GET['id_cat'];
        $x=0;
        $query="select a.id, a.name, a.price, a.image from product a, categories b where b.id=$id_cat and b.id=a.cat_id ";
        $result= mysql_query($query);
        echo "<table id='product_table'>";

        while ($x<mysql_num_rows($result)){
            $name=mysql_result($result,$x,'name');
            $price=mysql_result($result,$x,'price');
            $image=mysql_result($result,$x,'image');
            $id=mysql_result($result,$x,'id');
            echo $image;

            echo "<td> <p> <a href=product.php?id=$id><img src='$image'  width='150px'></a></td></tr>
                echo $name;
				".$name."<tr><td>Цена: ". $price."
				грн</td></tr>";
            $x++;

        }
        echo "</table>";

    }



    ?>
</div>
</p>







