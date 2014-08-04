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