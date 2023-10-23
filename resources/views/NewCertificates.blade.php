<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <title> Xpertbot Academy | {{$student->name}} </title>
        <meta property="og:title" content="XpertBot Academy | {{$student->name}}'s Certificate" />
        <meta property="og:url" content="https://xpertbotacademy.online/students/{{$student->uuid}}" />
        <meta property="og:image" content="https://xpertbotacademy.online/{{$student->uuid}}.jpg" />


        <style>
            .logo{
                width:250px;
                float:right;
            }
            .logo_span{
                float:right;  
                margin-top:10px;
            }

            .container{
                border: 10px solid #273873;
                height: 900px;

            }

            .marquee {
                color: #273873;
                font-size: 48px;
                margin: 20px;
            }
            body {
                color: black;
                font-family: Georgia, serif;
                font-size: 24px;
                text-align: center;
            }

            .person {
                border-bottom: 2px solid black;
                font-size: 32px;
                font-style: italic;
                margin: 20px auto;
                width: 500px;
                color: #8ED0B9
            }


            .reason_details{
                margin-top:20px;
            }

            .txt_bold{
                font-weight:bold;
            }
            .date{
                margin-top:20px;
            }

            #stamp {
                width:170px;
            }

            #signature_div {
                margin-top:20px;
                
            }

            #signature {
                width:100px;
            }
        </style>
    </head>
    <body>
        <div>
            <a href="https://www.linkedin.com/profile/add?startTask=CERTIFICATION_NAME&name=XpertBot Web Developer&organizationId=20546595&issueYear=2022&issueMonth=9&certUrl=https://xpertbotacademy.online/students/{{$student->uuid}}&certId={{$student->uuid}}">
                <img src="https://download.linkedin.com/desktop/add2profile/buttons/en_US.png " alt="LinkedIn Add to Profile button">
            </a>
        </div>
        <br>

        
        <div id="certificate" class="container">
            <div class="row">
                <div class="col-md-7" >
                    <img class="logo" src="/logo.jpeg" alt="xpertbot Academy">
                </div>
                <div class="col" >
                    <span class="logo_span">
                        {!! QrCode::size(150)->generate('https://xpertbotacademy.online/students/'.$student->uuid) !!}
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col text-center marquee">
                Certificate of Completion
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    This is to certify that
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 person">
                    {{ucwords($student->name)}}
                </div>
            </div>
            <div class="row">
                <div class="reason">
                    Has completed the necessary courses of study and passed the project <span style="color:#8ED0B9">{{$student->project}}</span> published on <br>
                    <a href={{$student->url}}>{{$url}}</a>
                </div>
            </div>
            <div class="row">
                <div class="reason_details">
                    with fundamental knowledge of {{$role}} using <span class="txt_bold"> {{$courses}}. </span>
                </div>
            </div>
            <div class="date h5">
                Issued October 15, 2023
            </div>
            <div class="row">
                <div class="col">
                    <img id="stamp" src="/stamp.JPG" alt="stamp">
                </div>
                <div id="signature_div" class="col-md-3" style="margin-right:20px">
                    
                    <div clas="row">
                        <img id="signature" src="/signature.jpg" alt="">
                    </div>

                    <div class="row" >
                        <p style="border-top: 2px solid black;"> Ibrahim FLEIFEL</p>
                        <h5 style="margin-top:-20px">Head of Development</h5>

                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
       
    </script>
</html>