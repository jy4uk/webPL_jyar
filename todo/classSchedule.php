<!doctype html>
    <html>
        <head>
            <link rel="stylesheet" href="main.css">
            <!-- <link href="https://cdn.alloyui.com/3.0.1/aui-css/css/bootstrap.min.css" rel="stylesheet"></link> -->
            <link rel="stylesheet" href="styles/cdn_main.css">
        
            <script src="https://cdn.alloyui.com/3.0.1/aui/aui-min.js"></script>
            

            <meta charset="UTF-8">
            <title>
                Class Schedule
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
                            Class Schedule
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

            <!-- Creates calendar -->
            <div id="wrapper">
                <div id="myScheduler"></div>
              </div>

            <!-- Script for calendar and its views -->
            <script>
                YUI().use(
                    'aui-scheduler',
                    function(Y) {
                        var events = [
                            {
                                
                            }
                        ];

                        var eventRecorder = new Y.SchedulerEventRecorder();
                        var weekView = new Y.SchedulerWeekView();
                        var monthView = new Y.SchedulerMonthView();
                        var agendaView = new Y.SchedulerAgendaView();

                        new Y.Scheduler(
                            {
                                boundingBox: '#myScheduler',
                                activeView: weekView,
                                date: new Date(2020, 3, 4),
                                eventRecorder: eventRecorder,
                                items: events,
                                render: true,
                                views: [weekView, monthView, agendaView]
                            }
                        );
                    }
                );
            </script>

            <!-- FORM TO ADD CLASSES TO CALENDAR - tbd -->
        <!-- <form name="mainform">
                <div class="form-group">
                    <label for="classname">Class Name</label>
                    <input type="text" id="classname" class="form-control" name="desc" required />
                    <span class="error" id="classname-note"></span>
                </div>
                <div class="form-group">
                    <label for="start-time">Start Time</label>
                    <input type="time" id="start-time" class="form-control" name="desc" required />
                    <span class="error" id="start-time=note"></span>
                </div>
                <div class="form-group"> 
                    <label for="end-time">End Time</label>
                    <input type="time" id="end-time" class="form-control" name="desc" required />
                    <span class="error" id="end-time=note"></span>
                </div>
                <div class="form-group">
                    <label for="days-of-week">Which Days?</label>
                    <input type="checkbox" id="days-of-week" name="desc" value="Monday">Monday
                    <input type="checkbox" id="days-of-week" name="desc" value="Tuesday">Tuesday
                    <input type="checkbox" id="days-of-week" name="desc" value="Wednesday">Wednesday
                    <input type="checkbox" id="days-of-week" name="desc" value="Thursday">Thursday
                    <input type="checkbox" id="days-of-week" name="desc" value="Friday">Friday
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" class="form-control" name="desc" />
                </div>

                <input type="button" class="btn btn-light" id="add" value="Add Class" onclick="addClass()"/> 
            </form> -->

            <!-- <div id='calendar'></div> -->
        </body>