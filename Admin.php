<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSSFiles/Admin.css">
    <title>Document</title>
</head>
<body>
    <?php
        include('header.php');
    ?>
    <div class="Home-path">
        <p><a href="index.html">Home</a> / Admin Pannel</p>
    </div>
        <main>
            <div class="Head1">
                    <li><a class="tab" onclick="Tab_bar('Profile')"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li><a class="tab" onclick="Tab_bar('Account_Setting')"><i class="fas fa-user-cog"></i><span>Account Setting</span></a></li>
                    <li><a class="tab" onclick="Tab_bar('Security')"><i class="fas fa-user-shield"></i><span>Security</span></a></li>
                    <li><a class="tab" onclick="Tab_bar('Notification')"><i class="fas fa-bell"></i><span>Notifiation</span></a></li>
                    <li><a class="tab" onclick="Tab_bar('Billing')"><i class="fas fa-money-check-alt"></i><span>Billing</span></a></li>                     
            </div> 
            <div class="tabcontent" id="Profile">
                        This is Profile<br>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<br>
                        when an unknown printer took a galley of type and scrambled it to make a type<br>
                        specimen book. It has survived not only five centuries, but also the leap into<br>
                        electronic typesetting, remaining essentially unchanged. It was popularised in<br>
                        the 1960s with the release of Letraset sheets.
            </div>
            <div class="tabcontent" id="Account_Setting">
                        This is Account Security<br>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<br>
                        when an unknown printer took a galley of type and scrambled it to make a type<br>
                        specimen book. It has survived not only five centuries, but also the leap into<br>
                        electronic typesetting, remaining essentially unchanged. It was popularised in<br>
            </div>
            <div class="tabcontent" id="Security">
                        This is Security<br>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<br>
                        when an unknown printer took a galley of type and scrambled it to make a type<br>
                        specimen book. It has survived not only five centuries, but also the leap into<br>
            </div>
            <div class="tabcontent" id="Notification">
                        This is Notification<br>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<br>
                        when an unknown printer took a galley of type and scrambled it to make a type<br>
            </div>
            <div class="tabcontent" id="Billing">
                        This is Billing<br>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<br>
            </div>
        </main>


    <?php
        include('Footer.php');
        include('js.php');
    ?>
</body>
</html>