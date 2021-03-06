<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='../lib/jquery.min.js'></script>
    <script src='../lib/bootstrap.min.js'></script>
    <script src='../lib/moment.min.js'></script>
    <script src='../lib/fullcalendar.min.js'></script>
    <script src='../scheduler.min.js'></script>
    <link href='../lib/fullcalendar2.min.css' rel='stylesheet' />
    <link href='../lib/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <link href='../scheduler2.css' rel='stylesheet' />
    <link href='../lib/bootstrap.min.css' rel='stylesheet' />

    
    <script>
        $(document).ready(function(){
                $("#modal_form").on("submit", function(e) {
                            var postData = $("#modal_form").serializeArray();
                            var formURL = $("#modal_form").attr("action");
                            $.ajax({
                                url: formURL,
                                type: "POST",
                                data: postData,
                                success: function(data, textStatus, jqXHR) {
                                    $('#myModal .modal-header .modal-title').html("Result");
                                    $('#myModal  .modal-body').html(data);
                                    $("#submitForm").remove();
                                },
                                error: function(jqXHR, status, error) {
                                    console.log(status + ": " + error);
                                }
                            });
                            e.preventDefault();
                        });
                $("#submitForm").on('click', function() {
                    $("#model_form").submit();
                });    
        });


    $(function() { // document ready
    $('#calendar').fullCalendar({
    now: '2018-07-13',
    editable: true,
    selectable: true,
    aspectRatio: 1.8,
    scrollTime: '00:00',
    header: {
    left: ' prev,today,next,promptResource ',
    center: 'title',
    right: 'timelineYear,timelineThreeDays,month,agendaWeek,timelineDay'
    },
    customButtons: {
        promptResource: {
          text: '+ Event',
          click: function(){
            $('#myModal').modal('toggle');
            $('#myModal').modal('show');

        }
        }
    },
    
    select: function(start, end, jsEvent, view) {
           
            $('#myModal').modal('show');
            $('#calendar').fullCalendar("renderEvent", event, true);
         
        
    },
/*
 select: function(start, end, jsEvent, view) {
        var title = prompt("Enter a title for this event", "New event");
        if (title != null) {
            var event = {
                id: "9999",
                title: title.trim() != "" ? title : "New event",
                start: moment("2018-05-05"),
                end: moment("2018-05-05")
               // allDay: allDay
            };

        $('#calendar').fullCalendar("renderEvent", event, true);
                
        };

        $('#calendar').fullCalendar("unselect");
    },
*/


    eventClick: function(event, jsEvent, view){
        var newTitle = prompt("Edit this event", event.title);
        if (newTitle != null) {
            event.title = newTitle.trim() != "" ? newTitle : event.title;
            $('#calendar').fullCalendar("updateEvent", event);
        }
    },
    
    defaultView: 'timelineYear',
    views: {
        timelineYear:{
            type: 'timeline',
            slotLabelInterval: {months: 1},
            slotDuration: {days:1},
            slotWidth: 5,
            resourceAreaWidth: '45%'
        },
    },

    resourceColumns: [
    {
    group: true,
    labelText: 'FIELD',
    field: 'field',
    width: '30%'
    },
    {
    group: true,
    labelText: 'NO',
    field: 'No',
    width: '20%'
    },
    {
    group: false,
    labelText: 'RIG',
    field: 'title',
    width: '40%'
    },
    {
    group: false,
    labelText: 'STATUS',
    field: 'STATUS',
    width: '30%'
    }
    ],
    resources: [
    { id: 'a', field:'JAMBI', No: '1',title:'N-110UE/59\n1500 HP\nPDSI',STATUS: 'MASTER', occupancy: 40},
    { id: 'b', field:'JAMBI', No: '1',title:'N-110UE/59\n1500 HP\nPDSI', STATUS: 'PROYEKSI', occupancy: 40},
    { id: 'c', field:'JAMBI', No: '1',title:'N-110UE/59\n1500 HP\nPDSI',STATUS: 'REALISASI', occupancy: 40},
    { id: 'd', field:'JAMBI', No: '2',title: 'CWKT 210-B/2-A\n 400 HP\nPDSI ', STATUS: 'MASTER', occupancy: 40},
    { id: 'e', field:'JAMBI', No: '2',title: 'CWKT 210-B/2-A\n 400 HP\nPDSI ',  STATUS: 'PROYEKSI', occupancy: 40},
    { id: 'f', field:'JAMBI', No: '2',title: 'CWKT 210-B/2-A\n 400 HP\nPDSI ',  STATUS: 'REALISASI', occupancy: 40},

    { id: 'g', No: '3', STATUS: 'MASTER', occupancy: 40},
    { id: 'h', No: '3', STATUS: 'PROYEKSI', occupancy: 40},
    { id: 'i', No: '3',STATUS: 'REALISASI', occupancy: 40},
    { id: 'j', No: '4', STATUS: 'MASTER', occupancy: 40},
    { id: 'k', No: '4', STATUS: 'PROYEKSI', occupancy: 40},
    { id: 'l', No: '4',STATUS: 'REALISASI', occupancy: 40},
    { id: 'm', No: '5', STATUS: 'MASTER', occupancy: 40},
    { id: 'n', No: '5', STATUS: 'PROYEKSI', occupancy: 40},
    { id: 'o', No: '5',STATUS: 'REALISASI', occupancy: 40},
    { id: 'p', No: '6', STATUS: 'MASTER', occupancy: 40},
    { id: 'q', No: '6', STATUS: 'PROYEKSI', occupancy: 40},
    { id: 'r', No: '6',STATUS: 'REALISASI', occupancy: 40},
    { id: 's', No: '7', STATUS: 'MASTER', occupancy: 40},
    { id: 't', No: '7', STATUS: 'PROYEKSI', occupancy: 40},
    { id: 'u', No: '7',STATUS: 'REALISASI', occupancy: 40},
    ],
    events: [
    { id: '1', resourceId: 'a', start: '2018-01-01', end: '2018-01-31', title: 'TTN-1 / 154 HK\n3800 m (V) (5 DST)\n30-11-17  -  29-05-2018', color: 'red', textColor: 'white' },
    { id: '2', resourceId: 'a', start: '2018-02-01', end: '2018-03-10', title: 'WMP-D2 (55 HK)\n2700 m (D)', color: 'green',  textColor: 'white' },
    { id: '3', resourceId: 'b', start: '2018-01-01', end: '2018-02-15', title: 'TTN-1 / 154 HK\n3800 m (V) (5 DST)\n30-11-17  -  On Progress', color: 'red', textColor: 'white' },
    { id: '4', resourceId: 'b', start: '2018-03-01', end: '2018-04-07', title: 'WMP-D2 (55 HK)\n2700 m (D)', color: 'green', textColor: 'white' },
    { id: '5', resourceId: 'c', start: '2018-01-01', end: '2018-02-15', title: 'TTN-1 / 154 HK\n3800 m (V) (5 DST)\n30-11-17 - On Progress', color: 'grey', textColor: 'black' },
    { id: '6', resourceId: 'b', start: '2018-03-02', end: '2018-04-07', title: 'WMP-D2 :\nWellhead 10K EE Class,\ndelivery time Akhir Mei\n2018\nLokasi siap Medio April\n2018', color: 'white', textColor: 'black' },
    { id: '7', resourceId: 'd', start: '2018-01-01', end: '2018-01-31', title: 'PHE Siak (inc Mob)', color: 'pink', textColor: 'red' },
    { id: '8', resourceId: 'e', start: '2018-01-10', end: '2018-01-24', title: 'KSB-04', color: 'yellow', textColor: 'black' },
    { id: '9', resourceId: 'e', start: '2018-01-25', end: '2018-03-31', title: 'Sumur Kurnis PHE Siak\n(58 hr : Mob, Ops, Demob)', color: 'pink', textColor: 'red' },
    { id: '10', resourceId: 'f', start: '2018-01-10', end: '2018-01-24', title: 'KSB-04', color: 'grey', textColor: 'black' },
    { id: '10', resourceId: 'f', start: '2018-01-25', end: '2018-03-31', title: 'Hasil Rapat di Persero @ 29 Jan. 2018 : - CWKT\nmenyelesaikan WO KSB-04 - Sumur Kumis-02 PHE Siak : 14 hari\nmob; 13 hari ops; 17 hari komplesi; 14 hari demob. ke \nKSB-Prop3 TTN*', color: '#FFFDD0', textColor: 'black' }
    ]
    });
     schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source';
    });
    </script>
    <style>
    body {
    margin: 0;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
    }
    #calendar {
    max-width: 1500px;
    margin: 50px auto;
    }
    .fc-resource-area td {
    cursor: pointer;
    }
     .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
    }
    .modal-footer {
     background-color: #f9f9f9;
  }
    </style>
  </head>
  <body>
    <div id="body">
      <h1 align="center"><b>BARCHART PEMBORAN SUMUR EKSPLORASI, EKSPLOITASI & WORKOVER RK</b></h1>
      <div id='calendar'>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" data-toggle="modal" data-target="#modal-dialog">
        <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-header" style="padding:35px 50px;">
          <h4 class="modal-title"> Event</h4>
        </div>

        <div class="modal-body" style="padding:40px 50px;">
          <form id="modal_form" action="test3.php" method="POST">
             <div class="form-group">
              <label for="Well Name">Well Name</label>
              <select class="form-control" id="WN" name="WN">
                <option>Well Name 1</option>
                <option>Well Name 2</option>
                <option>Well Name 3</option>
                <option>Well Name 4</option>
                <option>Well Name 5</option>
              </select>
            </div>
            <div class="form-group">
              <label for="Target Depth">Target Depth</label>
              <input type="text" class="form-control" id="TD" name="TD"placeholder="OTOMATIS">
            </div>
            <div class="form-group">
              <label for="Duration">Duration</label>
              <input type="text" class="form-control" id="Duration" name="Duration" placeholder="yyyy-mm-dd yyyy-mm-dd">
            </div>
           
              <button type="submit" id="submitForm" class="btn btn-success btn-block"> Create Event</button>
          </form>
        </div>
      </div>
      
    </div>
  </div> 
</div>
      </div>
    </body>
  </html>