<html>
    <head>
        <style type='text/css'>
            body, html {
                margin: 0;
                padding: 0;
            }
            body {
                color: black;
                display: table;
                font-family: Georgia, serif;
                font-size: 24px;
                text-align: center;
            }
            .container {
                border: 20px solid #273873;
                width: 750px;
                height: 563px;
                display: table-cell;
                vertical-align: middle;
            }
            .logo {
                color: #273873;
                width: 250px
            }

            .marquee {
                color: #273873;
                font-size: 48px;
                margin: 20px;
            }
            .assignment {
                margin: 20px;
            }
            .person {
                border-bottom: 2px solid black;
                font-size: 32px;
                font-style: italic;
                margin: 20px auto;
                width: 400px;
                color: #8ED0B9
            }
            .reason {
                margin: 20px;
            }

            #qr_code {
                float:right;
                margin-right: 20px;
            }

        </style>

    </head>
    <body>
        <div class="container">
            <div class="aParent">
                
                        <img class="logo" src="/logo.jpeg" alt="xpertbot Academy">
                        <span id="qr_code">
                            {!! QrCode::size(75)->generate('https://xpertbotacademy.online/students/'.$student->uuid) !!}
                        </span>
                    

                


            </div>

            <div class="marquee">
                Certificate of Completion
            </div>

            <div class="assignment">
                This is to certify that
            </div>

            <div class="person">
                {{$student->name}}
            </div>

            <div class="reason">
                Has completed the necessary courses of study and passed the project <span style="color:#8ED0B9">{{$student->project}}</span> published on <br>
                {{$student->url}}
            </div>

        </div>
    </body>
</html>






