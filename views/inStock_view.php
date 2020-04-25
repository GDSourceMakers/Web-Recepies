<?php
//since it's a php file, it needs a php tag in the beginning 
?>
<!-- each php site can get their individual css like this, checked!, this is valid-->
<link rel="stylesheet" type="text/css" href="static/css/in_stock.css">

<div class="card content">
    <div class="page_title">In Stock</div>

    <!-- every 'content' withing the main>div got copied here-->
    <div class="contents_table">
        <!--post method here, in the form-->
        <form action="in_stock.php" method="POST" enctype="multipart/form-data">
            <table>
                <colgroup>
                    <col> <!-- pic -->
                    <col> <!-- name -->
                    <col> <!-- quantity-->
                    <col> <!-- buttons-->
                </colgroup>
                <thead>
                    <tr>
                        <th id="a"></th>
                        <th id="b">Product</th>
                        <th id="c">Amount</th>
                        <th id="d"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td headers="a">
                            <!--to make the buttons connect to the php code, we have to give them unique name="..."-s -->
                            <input name="img_browse" id="img_browse" type="file">
                            <label for="img_browse" class="card list_button browse_img_button"><i class="far fa-folder-open"></i></label>
                        </td>

                        <td headers="b">
                            <input name="name" id="data_name" type="text">
                        </td>

                        <td headers="c">
                            <input name="qty" id="data_quantity" type="text">
                        </td>

                        <td headers="d">
                            <input class="card list_button" id="submit_button" type="submit" name="add" value="Add new item">
                        </td>
                    </tr>

                    <?php
                    if(is_array($data)){
                        for ($i = 0; $i < count($data); $i++) {
                            $item = $data[$i];
                            //the html code in the EOT variable gonna appear, when it's echo-ed
                            $template = <<<EOT
                                <tr>
                                    <td headers="a" class="table_image"> <img src="$item->picture" alt="food item"></td>
                                    <td headers="b">$item->name</td>
                                    <td headers="c">$item->amount</td>
                                    <td headers="d">
                                    <!--<div class="card list_button list_edit_button"><i class="fas fa-pen"></i></div> !!debating about if i can make it work in time-->
                                        <!--<div class="card list_button list_delete_button"><i class="fas fa-minus"></i></div>-->
                                        <button type="submit" class="card list_button list_delete_button button_noStyle" name="delete" value="$i"  title="Delete">   <i class="fas fa-minus">   </i></button>                            
                                    </td>
                                </tr>
                                EOT;
                            echo $template; //echo here
                            //every data that gets generated or repeated can be deleted, only one edited version is needed
                        }
                    }
                    ?>

                </tbody>

            </table>
        </form>
    </div>
</div>