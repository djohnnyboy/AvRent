<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">    
        <title>Av Rent a car - Contact Email</title>
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-left:1vw;margin-right:1vw;font-family: 'Nunito', sans-serif;text-align: center;min-width: 200px;">
                    <div style="margin-top: 50px;background-color: #2f2929;color: white;padding-top:30px;padding-bottom:20px;">
                        <img src="{{ url('images/websiteMains/logo.png') }}" alt="logo">
                    </div>
                    <table class="table" style="margin:0 auto;margin-top:50px;color: #636b6f;border: 1px solid;box-shadow: 5px 10px #888888;">
                        <thead >
                            <tr style="background-color: #005d82;color: white;margin-bottom: 20px;border-radius: 5px;text-align: left;">
                                <th scope="col" colspan="4" style="padding:15px;">Message Info:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr >
                                <th scope="row">Name:</th>
                                <td style="margin-top: 10px;padding:10px;" colspan="3">{{ $data['name'] ?? ''}}</td>
                            </tr>
                            <tr >
                                <th scope="row">Subject:</th>
                                <td style="margin-top: 10px;padding:10px;" colspan="3">{{ $data['subject'] ?? ''}}</td>
                            </tr style="border: 1px solid;">
                            <tr>
                                <th scope="row">Email:</th>
                                <td style="margin-top: 10px;padding:10px;" colspan="3">{{ $data['email'] ?? ''}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Message:</th>
                                <td style="margin-top: 20px;padding:20px;min-height:100px;max-width:400px;min-width:240px;overflow: auto;" colspan="3"><p>{{ $data['message'] ?? ''}}</p></td>
                            </tr>
                        </tbody>  
                    </table>   
                    <address style="margin-top: 50px; background-color: #2f2929;color: white;padding-top:20px;padding-bottom:20px;">
                        <p style="font-size: 1.5rem; font-family: 'Nunito', sans-serif;">AV Rent Car, Faro Airport Car Hire</p>  
                        <p style="font-family: 'Nunito', sans-serif;">Helpdesk: +351 282 315 700 </br>
                        24H assistance: +351 966 972 041</br>
                        Fax: +351 282 314 989</br>
                        E-mail: info@avrentcar.com</p>
                        <a href="http://www.thewebdeveloper.net" target="_blank">© developement by www.thewebdeveloper.net</a>
                    </address>
                </div>
            </div>
        </div>
    </body>

 </html>      
