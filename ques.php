<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <style>

    </style>
</head>

<body>

    <div class="container-grad">

        <div class="ui center segment  p-5 m-5">
            <form class="ui form">

                <div class="field">
                    <label for="positions">Position you are applying for:</label>
                    <select id="positions" name="positions" class="ui fluid dropdown">

                    </select>
                </div>
            </form>


            <div id="positionId" style="visibility: hidden;"></div>


            <form id="position_ques" class="ui form mt-5">
                <a id="btn_submit"></a>
            </form>
            <div id="response">

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <script>
        $('select.dropdown')
            .dropdown();

        loadPage();

        $("#positions").change(function() {
            loadQues($('#positions').val());
        });

        function loadPage() {
            var url = 'load';
            $.ajax({
                type: 'post',
                url: "testserver.php",
                data: {
                    doc_id: url
                },
                beforeSend: function() {
                    $('#positions').html('<div style="height:300px" class="ui segment"><div class="ui active inverted dimmer">  <div class="ui text loader">Loading</div></div> <p></p></div>');
                },
                success: function(data) {


                    $('#positions').html(data);


                }
            });

        }

        function loadQues(position) {
            var url = 'load_questions';
            var p1 = position;
            var user = {
                "firstName": $('#first-name').val(),
                "lastName": $('#last-name').val()
            };
            var d = new Date();
            $('#positionId').html(position);
           
            $.ajax({
                type: 'post',
                url: "testserver.php",
                data: {
                    doc_id: url,
                    pos_id: position,
                    userDetails: user
                },
                beforeSend: function() {
                    $('#positions').html('<div style="height:300px" class="ui segment"><div class="ui active inverted dimmer">  <div class="ui text loader">Loading</div></div> <p></p></div>');
                },
                success: function(data) {


                    $('#position_ques').html(data);
                    loadPage();

                }
            });

        }

        function submitFunction() {
            var url = 'submit_test';
            var position = $('#positionId').text();

            var data = $('#position_ques').serializeArray();

            $.ajax({
                type: 'post',
                url: "testserver.php",
                data: {
                    doc_id: url,
                    ui_form: data,
                    pos_id: position
                },
                beforeSend: function() {
                    $('#positions').html('<div style="height:300px" class="ui segment"><div class="ui active inverted dimmer">  <div class="ui text loader">Loading</div></div> <p></p></div>');
                },
                success: function(data) {


                    $('#response').html(data);
                    loadPage();

                }
            });
        }
       
    </script>
</body>

</html>