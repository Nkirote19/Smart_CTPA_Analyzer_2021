// function showPreview(event){
//   if(event.target.files.length > 0){
//     var src = URL.createObjectURL(event.target.files[0]);
//     var preview = document.getElementById("file-ip-1-preview");
//     preview.src = src;
//     preview.style.display = "block";
//   }
// }

// CODE FOR MULTIPLE IMAGES UPLOAD
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<div class=\"img-upload-container\"><img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/></div>" +
            "<br/><span class=\"remove\"><i class=\"fas fa-trash-alt p-1\"></i>Remove</span> " +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});


// CODE FOR SCAN ANALYSES RESULTS DOUGHNUT CHART
var potentialResultsChart = function()
{
  var config = {
    type: 'doughnut',
    data:
    {
      datasets: [
      {
        data: [
            10,
            16,
            7,
            3,
            14
        ],
        backgroundColor: [
          'rgb(244, 243, 239)',
          'rgb(36, 48, 74)',
          'rgb(95, 60, 73)',
          'rgb(155, 72, 72)',
          'rgb(215, 84, 72)'
        ],
        label: 'My dataset' // for legend
      }],

      labels: [
        "rv_lv_ratio_gte_1",
        "leftsided_pe ",
        "acute_and_chronic_pe",
        "indeterminate",
        "rv_lv_ratio_lt_1 "
      ]
    },
    options:
    {
      responsive: true,
      legend:
      {
        display: true,
        position: 'bottom',
      }
    }
  };
    
  new Chart($("#potentialResultsChart > canvas").get(0).getContext("2d"), config);
}

/* initialize the chart */
$(document).ready(function()
{
  potentialResultsChart();
});