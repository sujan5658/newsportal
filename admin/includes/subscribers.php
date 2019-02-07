<div class="row">
    <ol class="breadcrumb">
        <li>
            <em class="fa fa-user"></em>
        </li>
        <li class="active">सदस्यहरू</li>
    </ol>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        विभिन्न श्रेणीमा सदस्यहरूको सूची।
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-hover table-responsive">
            <thead>
                <tr>
                    <th><center>क्रम संख्या</center></th>
                    <th><center>ईमेल</center></th>
                    <th><center>कोटि</center></th>
                </tr>
            </thead>
            <tbody>
            <?php
                require_once ("class/connection.php");
                $con = new connection();
                $con->db_connect();
                $sql = "SELECT * FROM Subscribe ORDER BY SN DESC";
                $i=1;
                $result = mysqli_query(connection::$conn,$sql);
                if(mysqli_num_rows($result)>0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><center><?php echo $i; ?></center></td>
                            <td><?php echo $row['Email']; ?></td>
                            <td>
                                <?php
                                switch($row['Category']){
                                    case "Popular":
                                        $category = "लोकप्रिय";
                                        break;
                                    case "International":
                                        $category="अन्त्रास्त्र्य";
                                        break;
                                    case "National":
                                        $category="रास्तृय";
                                        break;
                                    case "Sports":
                                        $category="खेल्कुद";
                                        break;
                                    case "Politics":
                                        $category="राज्नितीक";
                                        break;
                                    case "Entertainment":
                                        $category="मनोरन्जन";
                                        break;
                                    case "Others":
                                        $category="अर्थ";
                                        break;
                                }
                                    echo $category;
                                ?>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
</div>