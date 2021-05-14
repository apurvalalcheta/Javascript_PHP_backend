<?php
session_start();
    include "header.php";
    include "../connection.php";

    if(!isset($_SESSION["admin"])){
        ?>
        <script type="text/javascript">
            window.location="index.php";
            </script>
            <?php
            
    }

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $exam_category='';
    $sql="select * from exam_category where id=$id";
    $res=mysqli_query($link,$sql);
    while($row=mysqli_fetch_array($res))
    {
        $exam_category=$row["category"];
    }
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Question inside<?php echo "<font color='blue'> " .$exam_category. "</font>"; ?></h1>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-body">
                                
                                <div class="col-lg-6">
                                    <form name="form1" action="" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header"><strong>Add New Questions with text</strong></div>
                                    <div class="card-body card-block">
                                            <div class="form-group">
                                                <label for="quiz" class=" form-control-label">Add Question For Quiz</label><input type="text" id="quizname" name="question" placeholder="Add questions for quiz"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="quiz" class=" form-control-label">Add First Option</label><input type="text" id="quizname" name="opt1" placeholder="Add First option"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="quiz" class=" form-control-label">Add Second Option</label><input type="text" id="quizname" name="opt2" placeholder="Add Second option"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="quiz" class=" form-control-label">Add Third Option</label><input type="text" id="quizname" name="opt3" placeholder="Add Third option"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="quiz" class=" form-control-label">Add Fourth Option</label><input type="text" id="quizname" name="opt4" placeholder="Add Fourth option"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="quiz" class=" form-control-label">Add Correct answer</label><input type="text" id="quizname" name="answer" placeholder="Add answer"  class="form-control">
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="submit" name="submit1" value="Add Question" class="btn btn-success">
                                            </div>
                                    </div>
                                </div>
                            
                            </div>

                            <div class="col-lg-6">
                    
                                <div class="card">
                                    <div class="card-header"><strong>Add New Questions with images</strong></div>
                                    <div class="card-body card-block">
                                            <div class="form-group">
                                                <label for="quiz" class=" form-control-label">Add Question For Quiz</label><input type="text" id="quizname" name="fquestion" placeholder="Add questions for quiz"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="quiz" class=" form-control-label">Add First Option</label><input type="file" id="quizname" name="fopt1" class="form-control" style="padding-bottom:36px">
                                            </div>
                                            <div class="form-group">
                                                <label for="quiz" class=" form-control-label">Add Second Option</label><input type="file" id="quizname" name="fopt2" class="form-control" style="padding-bottom:36px">
                                            </div>
                                            <div class="form-group">
                                                <label for="quiz" class=" form-control-label">Add Third Option</label><input type="file" id="quizname" name="fopt3" class="form-control" style="padding-bottom:36px">
                                            </div>
                                            <div class="form-group">
                                                <label for="quiz" class=" form-control-label">Add Fourth Option</label><input type="file" id="quizname" name="fopt4" class="form-control" style="padding-bottom:36px">
                                            </div>
                                            <div class="form-group">
                                                <label for="quiz" class=" form-control-label">Add Correct answer</label><input type="file" id="quizname" name="fanswer" class="form-control" style="padding-bottom:36px">
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="submit" name="submit2" value="Add Question" class="btn btn-success">
                                            </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                                

                            </div>
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->

                    
                </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table tabble-bordered">
                                        <tr>
                                            <th>No</th>
                                            <th>Questions</th>
                                            <th>Opt1</th>
                                            <th>Opt2</th>
                                            <th>Opt3</th>
                                            <th>Opt4</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                    
                                    <?php
                                        $res = mysqli_query($link,"select * from questions where category='$exam_category' order by question_no asc");
                                        while($row = mysqli_fetch_array($res)){
                                            echo "<tr>";
                                            echo "<td>"; echo $row["question_no"]; echo "</td>";
                                            echo "<td>"; echo $row["question"]; echo "</td>";
                                            echo "<td>"; 
                                            if(strpos($row["opt1"],'opt_images/')!==false){
                                                ?>
                                                <img src="<?php echo $row['opt1']; ?>" alt="asdga" height="50px" width="50px">
                                                <?php
                                            }else{
                                                echo $row["opt1"];
                                            }
                                            echo "</td>";

                                            echo "<td>"; 
                                            if(strpos($row["opt2"],'opt_images/')!==false){
                                                ?>
                                                <img src="<?php echo $row['opt2']; ?>" height="50" width="50">
                                                <?php
                                            }else{
                                                echo $row["opt2"];
                                            }
                                            echo "</td>";

                                            echo "<td>"; 
                                            if(strpos($row["opt3"],'opt_images/')!==false){
                                                ?>
                                                <img src="<?php echo $row['opt3']; ?>" height="50" width="50">
                                                <?php
                                            }else{
                                                echo $row["opt3"];
                                            }
                                            echo "</td>";

                                            echo "<td>"; 
                                            if(strpos($row["opt4"],'opt_images/')!==false){
                                                ?>
                                                <img src="<?php echo $row['opt4']; ?>" height="50" width="50">
                                                <?php
                                            }else{
                                                echo $row["opt4"];
                                            }
                                            echo "</td>";

                                            echo "<td>"; 
                                            if(strpos($row["opt1"],'opt_images/')!==false){
                                                ?>
                                                <a href="edit_option_images.php?id=<?php echo $row['id']; ?>&id1=<?php echo $id; ?>">Edit</a>
                                                <?php
                                            }else{
                                                ?>
                                                <a href="edit_option.php?id=<?php echo $row['id']; ?>&id1=<?php echo $id; ?>">Edit</a>
                                                <?php
                                            }
                                            echo "</td>";

                                            echo "<td>";
                                            ?>
                                            <a href="delete_option.php?id=<?php echo $row['id']; ?>&id1=<?php echo $id; ?>">Delete</a>
                                            <?php 
                                            echo "</td>";
                                            
                                            echo "</tr>";
                                        }
                                    ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div><!-- .animated -->
        </div><!-- .content -->
<?php
if(isset($_POST["submit1"]))
{
    $loop=0;
    $count=0;
    $res=mysqli_query($link,"select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($link));
    $count=mysqli_num_rows($res);

    if($count==0)
    {

    }
    else{
        while($row=mysqli_fetch_array($res))
        {
            $loop=$loop+1;
            mysqli_query($link,"update questions, set question_no='$loop' where id=$row[id] ");
        }
    }
    $loop=$loop+1;
    mysqli_query($link,"insert into questions values(NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category')") or die(my_sqli_error($link));
?>
<script type="text/javascript">
    alert("question added successfully");
    window.location.href=window.location.href;
    </script>
    <?php
}

?>
<?php
if(isset($_POST["submit2"]))
{
    $loop=0;
    $count=0;
    $res=mysqli_query($link,"select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($link));
    $count=mysqli_num_rows($res);

    if($count==0)
    {

    }
    else{
        while($row=mysqli_fetch_array($res))
        {
            $loop=$loop+1;
            mysqli_query($link,"updste questions, set question_no='$loop' where id=$row[id] ");
        }
    }
    $loop=$loop+1;
    $tm=md5(time());

    $fnm1=$_FILES["fopt1"]["name"];
    $dst1="./opt_images/".$tm.$fnm1;
    $dst_db1="opt_images/".$tm.$fnm1;
    move_uploaded_file($_FILES["fopt1"]["tmp_name"], $dst1);

    $fnm2=$_FILES["fopt2"]["name"];
    $dst2="./opt_images/".$tm.$fnm2;
    $dst_db2="opt_images/".$tm.$fnm2;
    move_uploaded_file($_FILES["fopt2"]["tmp_name"],$dst2);

    $fnm3=$_FILES["fopt3"]["name"];
    $dst3="./opt_images/".$tm.$fnm3;
    $dst_db3="opt_images/".$tm.$fnm3;
    move_uploaded_file($_FILES["fopt3"]["tmp_name"],$dst3);

    $fnm4=$_FILES["fopt4"]["name"];
    $dst4="./opt_images/".$tm.$fnm4;
    $dst_db4="opt_images/".$tm.$fnm4;
    move_uploaded_file($_FILES["fopt4"]["tmp_name"],$dst4);

    $fnm5=$_FILES["fanswer"]["name"];
    $dst5="./opt_images/".$tm.$fnm5;
    $dst_db5="opt_images/".$tm.$fnm5;
    move_uploaded_file($_FILES["fanswer"]["tmp_name"],$dst5);

    mysqli_query($link,"insert into questions values(NULL,'$loop','$_POST[fquestion]','$dst_db1','$dst_db2','$dst_db3','$dst_db4','$dst_db5','$exam_category')") or die(my_sqli_error($link));
?>
<script type="text/javascript">
    alert("question added successfully");
    window.location.href=window.location.href;
    </script>
    <?php
}

?>

    <?php
    include "footer.php";
    ?>                            