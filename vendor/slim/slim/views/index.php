<?php
<!DOCTYPE html>
<html ng-app="StudentCourseInformationPage">
<head>
  <title>Student Course Information Page</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <!-- Import JQuery -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <!-- Import Angular JS -->
  <script id="angularScript" src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.17/angular.min.js"></script>
</head>
<body>
  <div ng-controller="InformationPageController">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Student Course Info Page</a>
        </div>
    </nav>
    <div class="container-fluid">
      <h1>Contacts</h1>
      <ul>
        <li ng-repeat="contact in response.contacts">
          {{contact.name}}
          <ul>
            <li>{{contact.email}}</li>
            <li>{{contact.telephone}}</li>
          </ul>
        </li>
      </ul>
      <hr />
      <h1>Files</h1>
      <ul>
        <li ng-repeat="file in response.files">
          <a href="{{file.link}}">{{file.title}}</a>
        </li>
      </ul>
    </div>
  </div>
  <!-- Angular JS app -->
  <script type="text/javascript">

  // Set up the app variable as an instance of AngularJS app
  var app = angular.module('StudentCourseInformationPage', []);

  // Set up the information page controller
  app.controller('InformationPageController', function($scope) {
    // Example response from SharePoint API
      $scope.response = {

        "contacts": [
          { 
            name: "Russel Clark",
            email: "russel@falmouth.ac.uk",
            telephone: "01326 789 876"
          },
          { 
            name: "Al Parker",
            email: "alparker@falmouth.ac.uk",
            telephone: "01326 765 678"
          },
          { 
            name: "John Parker Rees",
            email: "jpr@falmouth.ac.uk",
            telephone: "01326 244 355"
          } 
        ],

        "files": [
          { 
            title: "SharePoint 2013 WCM Advanced Cookbook",
            link: "http://it-ebooks.info/book/3167/",
          },
          { 
            title: "Microsoft SharePoint 2013 App Development",
            link: "http://it-ebooks.info/book/3079/",
          } 
        ]

      }
    });

  </script>

</body>
</html>
?>
