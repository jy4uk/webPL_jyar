<?php
require('connectdb.php');
require('favorites-db.php');

$action = "list_favorites";        // default action
?>
<!doctype html>
    <html>
        <head>
            <link rel="stylesheet" href="main.css">
            <meta charset="UTF-8">
            <title>
                Favorites
            </title>
        </head>
        <body>
            <div class = "row">
                <div class="column">
                    &nbsp;
                    <!--Empty Column-->
                </div>

                <div class="column">
                    <h1 style="color:black;">
                        <center>
                            Favorites
                        </center>
                    </h1>
                </div>

                <div class="column" align="right">
                    <!--sign in button-->
                    <button type="button" style="height: 25px; width: 100px;"
                    onclick="window.location.href='signInPage.php';">Sign In</button>
                </div>
            </div>
            <ul>
                <li><a class="active" href="home.php">Home</a></li>
                <!-- <li><a href="classSchedule.html">Classes</a></li> -->
                <li><a href="todo.php">To Do</a></li>
                <li><a href="favorites.php">Favorites</a></li>
            </ul>



            <div class="container">
                <!-- <h1>Favorites</h1> -->
                <?php
                    $task_to_update = '';

                    if ($_SERVER['REQUEST_METHOD'] == 'GET')
                    {
                       include('favorites-add.php');
                       echo "<hr/>";
                       $favorites = getAllTasks();
                       include('favorites-view.php');        // default action
                    }
                    else if ($_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                       if (!empty($_POST['action']) && ($_POST['action'] == 'Update'))
                       {
                          $task_to_update = getTaskInfo_by_id($_POST['fav_id']);   
                          include('favorites-update.php');
                          if (!empty($_POST['name']) && !empty($_POST['link']))
                          {
                             updateFavoriteInfo($_POST['name'], $_POST['link'], $_POST['fav_id']);
                             header("Location: favorites.php?action=list_favorites");
                          }
                       }
                       else if (!empty($_POST['action']) && ($_POST['action'] == 'Add'))
                       {
                          if (!empty($_POST['name']) && !empty($_POST['link']))
                          {
                             addFavorite($_POST['name'], $_POST['link']);
                             header("Location: favorites.php?action=list_tasks");
                          }
                       }
                       else if (!empty($_POST['action']) && ($_POST['action'] == 'Delete'))
                       {
                          if (!empty($_POST['fav_id']) )
                          {
                             deleteTask($_POST['fav_id']);
                             header("Location: favorites.php?action=list_tasks");
                          }
                       }
                    }

                ?>


                <!-- BEFORE PHP//HTML ONLY -->
                <!-- <form name="mainform" >
                
                  <div class="form-group">
                    <label for="name-of-site">Name of Site</label>
                    <input type="text" id="name-of-site" class="form-control" name="desc" />
                    <span class="error" id="name-of-site-note"></span>        
                  </div>
                  
                  <div class="form-group">
                    <label for="link">Link</label>  
                    <input type="text" id="link" class="form-control" />  
                    <span class="error" id="link-note"></span>
                  </div>
                            
                  <input type="button" class="btn btn-light" id="add" value="Add Favorite" onclick="addRow()"/> 
                </form>
            
                <br/>
 
                <div id="favorites">
                  <table id="favoritesTable" class="table" >
                    <thead>
                      <tr>
                        <th>Shortcut</th>
                        <th>(Remove)</th>
                      </tr> 
                    </thead>
            
                    <script>
                      function addRow(){
                        var siteName = document.getElementById("name-of-site").value;
                        var siteLink = document.getElementById("link").value;
                        
                        var linker = (function() {
                            if(siteLink.substring(0,7) != "http://" && siteLink.substring(0,8) != "https://") {
                                siteLink = "http://" + siteLink;
                            }
                            else if(siteLink.substring(0,7) != "http://" && siteLink.substring(0,8) == "https://"){
                                siteLink = siteLink;
                            }
                            else if(siteLink.substring(0,7) == "http://" && siteLink.substring(0,8) != "https://") {
                                siteLink = siteLink;
                            }
                        }());
                        
                        var deleteBut = "<input type:=button value='  X  ' onClick='delRow()'>";
                        var linkShortcut = "<p id='hyperlinker' style='color:black;'>" + siteName + "</p>"    
                        var rowdata = [linkShortcut, deleteBut];
            
                        var tableRef = document.getElementById("favoritesTable");
                        var newRow = tableRef.insertRow(tableRef.rows.length);
                        // arrow function to add row to table
                        newRow.onmouseover = () => {tableRef.clickedRowIndex = this.rowIndex}
                        var newCell = "";       
                        var i = 0;         
                        while (i < 2){
                          newCell = newRow.insertCell(i);           
                          newCell.innerHTML = rowdata[i];
                          newCell.onmouseover = this.rowIndex;     
                          i++;
                        }
                        document.getElementById("hyperlinker").innerHTML = "<a href='" + siteLink + "' style='color:blue'>" + siteName + "</a>";

                        document.getElementById("name-of-site").value = '';
                        document.getElementById("link").value = '';
                      }

                      function delRow(){
                        document.getElementById("favoritesTable").deleteRow(document.getElementById("favoritesTable").clickedRowIndex);
                      }
                    </script>
                    
                  </table> 
                </div> -->
              </div> 

        </body>