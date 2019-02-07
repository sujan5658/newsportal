<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="#"><span>व्यवस्थापक</span>  विभाग</a>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <?php
                            require_once ("class/connection.php");
                            $con =new connection();
                            $con->db_connect();
                            $sql = "SELECT * FROM Contact WHERE Status=1";
                            $result = mysqli_query(connection::$conn,$sql);
                        ?>
                        <em class="fa fa-envelope"></em>
                        <?php
                            if(mysqli_num_rows($result)>0){
                                echo "<span class='label label-danger'>"."नयाँ"."</span>";
                            }
                        ?>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <div class="message-body">
                                    <strong>सबै सन्देश जाँच गर्नुहोस्।</strong>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="all-button"><a href="index.php?page=dXNlci1tZXNzYWdl">
                                    <em class="fa fa-inbox"></em> <strong>सबै सन्देशहरू</strong>
                                </a></div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>