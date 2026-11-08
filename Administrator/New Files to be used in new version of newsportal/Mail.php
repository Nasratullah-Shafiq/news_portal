
<?php 

include('./_Partial Components/Header.php');

foreach ($_GET as $key => $data) {
    $data2 = $_GET[$key] = base64_decode(urldecode($data));
    $News_ID = ((($data2*999999)/9999)/123456789);
  }

if (isset($_GET['N'])) {
  $data = $_GET['N'];

    $NewsByID = $exm->getNewsByID($News_ID);
    $result = $NewsByID->fetch_assoc();
  }
else{
    header('Location: index.php');
} 
// if(isset($_GET['del'])){
//    $News_ID = $_GET['del'];
//    $deleteNews = $exm->delNews($News_ID);
//    if($deleteNews){
//         $msg = "News has deleted Successfully";
//    }
//    else{
//         $error = "News Not Deleted!";
//    }
// }


?>
    <div class="containe">
        <div class="row" id="row">
            <div class="left-side-bar">
                <!-- BEGIN SIDEBAR -->
                <?php include('./_Partial Components/Navigation.php');?>
                <!-- END SIDEBAR -->
            </div>
            <div class="right-side-bar">
            
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <div class="row">
            <div calss = "col-md-9">
                <h1 style = "color: #2C3E50"> <i class = "fa fa-list-alt"> </i> <small> View All News </small></h1><hr>
                <ol class="breadcrumb">
                    <li style="color: #5C9BD1"><a href="index.php"> <i class = "fa fa-tachometer"></i> Dashboard </a></li>
                    <li class = ""> <a href="Create-News.php"> <i class = "fa fa-list-alt"></i> Create News </a></li>
                </ol>
            </div>
            <div class = "col-sm-9">

            </div>
            
             <div class="col-md-9">
                    <?php 
                    $NewsByID = $exm->getNewsByID($News_ID);
                    if(!$NewsByID){
                        echo "<h2> No Contacts exist! </h2>";
                    }
                    else{

                    if($NewsByID->num_rows>0){
                        $result = $NewsByID->fetch_assoc();
                    ?>
                <table class="table" style="padding-bottom: 300px;">
                    <tbody>
                        <tr>
                            <th class="col-md-3"> News ID </th>
                            <td> <?php echo $result['News_ID']; ?> </td>
                        </tr>
                        <tr>
                            <th class="col-md-3"> Heading </th>
                            <td> <?php echo $result['Heading']; ?> </td>
                        </tr>
                        <tr>
                            <th class="col-md-3"> Body </th>
                            <td> <?php echo $result['Body']; ?> </td>
                        </tr>
                        <tr>
                            <th class="col-md-3"> Source </th>
                            <td> <?php echo $result['Source']; ?> </td>
                        </tr>
                        <tr>
                            <th> Date </th>
                            <td> <?php echo $result['Date']; ?> </td>
                        </tr>
                        <tr>
                            <th> Category </th>
                            <td> <?php echo $result['Category']; ?> </td>
                        </tr>
                        <tr>
                            <th> Visit </th>
                            <td> <?php echo $result['Visits']; ?> </td>
                        </tr>
                        <tr>
                            <th> Status </th>
                            <td> <?php echo $result['Status']; ?> </td>
                        </tr>
                    </tbody>
                    </table>
                    <?php } 
                else{
                    echo "<h2> No Contacts Available ! </h2> ";
                    echo "<br>";
                    }
                    }
                    ?>
                
            <!-- END CONTENT BODY -->
            </div>
    <!-- END CONTENT -->
           </div>             
        </div>
    </div>
</div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<?php 
include('./_Partial Components/Footer.php');
?>
