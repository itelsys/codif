function copyfunction(){

  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  // alert("Copied the text: " + copyText.value);
}
function openNav() {
    document.getElementById("mySidenav").style.display = "block";
}

function closeNav() {
    document.getElementById("mySidenav").style.display = "none";
}

function openNav_2() {
    document.getElementById("mySecondSidenav").style.display = "block";
}
function closeNav_2() {
    document.getElementById("mySecondSidenav").style.display = "none";
}

$(document).ready(function(){
    $('#modify').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        var nom = $(e.relatedTarget).data('nom');
        var code = $(e.relatedTarget).data('code');
        document.getElementById('fetched-data').value = id;
        document.getElementById('nom').value = nom;
        document.getElementById('code').value = code;
          
     });
});

$(document).ready(function(){
    $('#modifLink').on('show.bs.modal', function (e) {
        var link = $(e.relatedTarget).data('link');
        var id = $(e.relatedTarget).data('id');
        var code = $(e.relatedTarget).data('code');
        document.getElementById('lien').value = link;
        document.getElementById('id').value = id;
        document.getElementById('code').value = code;
     });
});

$(document).ready(function(){
    $('#modifyuser').on('show.bs.modal', function (e) {
       
        var nm = $(e.relatedTarget).data('name');
        var eml = $(e.relatedTarget).data('email');
        var tpe = $(e.relatedTarget).data('type');
        var uid = $(e.relatedTarget).data('ident');
        document.getElementById('fetched-data').value = uid;
        document.getElementById('name').value = nm;
        document.getElementById('email').value = eml;
        $('#' + tpe).prop("checked", true);
     });
});


$('#modifyforms').click(function(){
  $.ajax({
    type : 'PATCH',
    url : 'site',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      'id' : $('input[name = id]').val(),
      'nom' : $('input[name = nom]').val(),
      'code' : $('input[name = codesite]').val(),
      _method: "PATCH"
    },
    success : function(data){
      location.href = '/site';
    }
  }) 
});

$('#creatformsite').click(function(){
  $.ajax({
    type : 'post',
    url : 'site',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      'nom' : $('input[name = nomas]').val(),
      'code' : $('input[name = codeas]').val(),
    },
    success : function(data){
      
      location.href = '/site';
    }
  })
});


$('#modifyformp').click(function(){
  $.ajax({
    type : 'PATCH',
    url : 'projet',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      'id' : $('input[name = id]').val(),
      'nom' : $('input[name = nom]').val(),
      'code' : $('input[name = codepro]').val(),
      _method: "PATCH"
    },
    success : function(data){
      location.href = '/projet';
    }
  }) 
});

$('#creatformp').click(function(){
  $.ajax({
    type : 'post',
    url : 'projet',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      
      'nom' : $('input[name = noma]').val(),
      'code' : $('input[name = codea]').val(),
    },
    success : function(data){
      location.href = '/projet';
    }
  })
});



$('#modifyformdp').click(function(){
  $.ajax({
    type : 'PATCH',
    url : 'departement',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      'id' : $('input[name = id]').val(),
      'nom' : $('input[name = nom]').val(),
      'code' : $('input[name = codedep]').val(),
      _method: "PATCH"
    },
    success : function(data){
      location.href = '/departement';
    }
  }) 
});

$('#creatformdp').click(function(){
  $.ajax({
    type : 'post',
    url : 'departement',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      
      'nom' : $('input[name = noma]').val(),
      'code' : $('input[name = codea]').val(),
    },
    success : function(data){
      location.href = '/departement';
    }
  })
});



$('#modifyformd').click(function(){
  $.ajax({
    type : 'PATCH',
    url : 'document',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      'id' : $('input[name = id]').val(),
      'nom' : $('input[name = nom]').val(),
      'code' : $('input[name = codetd]').val(),
      _method: "PATCH"
    },
    success : function(data){
      location.href = '/document';
    }
  }) 
});

$('#creatformd').click(function(){
  $.ajax({
    type : 'post',
    url : 'document',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      
      'nom' : $('input[name = noma]').val(),
      'code' : $('input[name = codea]').val(),
    },
    success : function(data){
      location.href = '/document';
    }
  })
});


$('#modifyformat').click(function(){
  $.ajax({
    type : 'PATCH',
    url : 'atelier',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      'id' : $('input[name = id]').val(),
      'nom' : $('input[name = nom]').val(),
      'code' : $('input[name = num]').val(),
      _method: "PATCH"
    },
    success : function(data){
      location.href = '/atelier';
    }
  }) 
});

$('#creatformat').click(function(){
  $.ajax({
    type : 'post',
    url : 'atelier',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      
      'nom' : $('input[name = noma]').val(),
      'code' : $('input[name = codea]').val(),
    },
    success : function(data){
      location.href = '/atelier';
    }
  })
});


$('#modifyforml').click(function(){
  $.ajax({
    type : 'PATCH',
    url : 'ligne',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      'id' : $('input[name = id]').val(),
      'nom' : $('input[name = nom]').val(),
      'code' : $('input[name = codeli]').val(),
      _method: "PATCH"
    },
    success : function(data){
      location.href = '/ligne';
    }
  }) 
});

$('#creatforml').click(function(){
  $.ajax({
    type : 'post',
    url : 'ligne',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      
      'nom' : $('input[name = noma]').val(),
      'code' : $('input[name = codea]').val(),
    },
    success : function(data){
      location.href = '/ligne';
    }
  })
});


$('#modifyformsa').click(function(){
  $.ajax({
    type : 'PATCH',
    url : 'sous-atelier',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      'id' : $('input[name = id]').val(),
      'nom' : $('input[name = nom]').val(),
      'code' : $('input[name = codesa]').val(),
      _method: "PATCH"
    },
    success : function(data){
      location.href = '/sous-atelier';
    }
  }) 
});

$('#creatformsa').click(function(){
  $.ajax({
    type : 'post',
    url : 'sous-atelier',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      
      'nom' : $('input[name = noma]').val(),
      'code' : $('input[name = codea]').val(),
    },
    success : function(data){
      location.href = '/sous-atelier';
    }
  })
});



$('#modifyformeq').click(function(){
  $.ajax({
    type : 'PATCH',
    url : 'equipement',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      'id' : $('input[name = id]').val(),
      'nom' : $('input[name = nom]').val(),
      'code' : $('input[name = codeeq]').val(),
      _method: "PATCH"
    },
    success : function(data){
      location.href = '/equipement';
    }
  }) 
});

$('#creatformeq').click(function(){
  $.ajax({
    type : 'post',
    url : 'equipement',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      
      'nom' : $('input[name = noma]').val(),
      'code' : $('input[name = codea]').val(),
    },
    success : function(data){
      location.href = '/equipement';
    }
  })
});



$('#modifyformpl').click(function(){
  $.ajax({
    type : 'PATCH',
    url : 'plan',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      'id' : $('input[name = id]').val(),
      'nom' : $('input[name = nom]').val(),
      'code' : $('input[name = codepl]').val(),
      _method: "PATCH"
    },
    success : function(data){
      location.href = '/plan';
    }
  }) 
});

$('#creatformpl').click(function(){
  $.ajax({
    type : 'post',
    url : 'plan',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      
      'nom' : $('input[name = noma]').val(),
      'code' : $('input[name = codea]').val(),
    },
    success : function(data){
      location.href = '/plan';
    }
  })
});

$('#usermodif').click(function(){
  $.ajax({
    type : 'PATCH',
    url : 'utilisateurs',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data : {
      'id' : $('input[name = id]').val(),
      'nom' : $('input[name = name]').val(),
      'email' : $('input[name = email]').val(),
      'type' : $('input[name = optradio]:checked').val(),
      'pswd' : $('input[name = pswd]').val(),
      _method: "PATCH"
    },
    success : function(data){
      location.href = '/utilisateurs';
    }
  }) 
});

function download_csv(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV FILE
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // We have to create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Make sure that the link is not displayed
    downloadLink.style.display = "none";

    // Add the link to your DOM
    document.body.appendChild(downloadLink);

    // Lanzamos
    downloadLink.click();
}

function export_table_to_csv(html, filename) {
  var csv = [];
  var rows = document.querySelectorAll("table tr");
  
    for (var i = 0; i < rows.length ; i++) {
    var row = [], cols = rows[i].querySelectorAll("td, th");
    
        for (var j = 0; j < cols.length -1; j++) 
            row.push(cols[j].innerText);
        
    csv.push(row.join(";"));    
  }

    // Download CSV
    download_csv(csv.join("\n"), filename);
}


function export_table(html, filename) {
  var csv = [];
  var rows = document.querySelectorAll(".trow");
  
    for (var i = 0; i < rows.length ; i++) {
    var row = [], cols = rows[i].querySelectorAll("td, th");
    
        for (var j = 0; j < cols.length ; j++) 
            row.push(cols[j].innerText);
        
    csv.push(row.join(";"));    
  }

    // Download CSV
    download_csv(csv.join("\n"), filename);
}


$('.btnExp').click(function(){
  var html = document.querySelector("table").outerHTML;
  export_table_to_csv(html, "codifExport.csv");
});

$('#exp').click(function(){
  var html = document.querySelector("table").outerHTML;
  export_table(html, "codifExport.csv");
});


$(window).resize(function () {
    var viewportWidth = $(window).width();
        if (viewportWidth < 800) {
            $(".form-inline").removeClass("form-inline");
        }
});


// $('#cherchedocu').click(function(){
//   $.ajax({
//     type : 'get',
//     url : 'recherche',
//     headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     },
//     data : {  
//       'site' : $('input[name = site]').val(),
//       'pro' : $('input[name = projet]').val(),
//       'dep' : $('input[name = dep]').val(),
//       'typedoc' : $('input[name = typedoc]').val(),
//       'codedoc' : $('input[name = codedoc]').val(),
//     },
//     success : function(data){
      
//     }
//   })
// });
// $('#modifylink').click(function(){
//   $.ajax({
//     type : 'PATCH',
//     url : 'recherche',
//     headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     },
//     data : {
//       'lien' : $('input[name = lien]').val(),
//       _method: "PATCH"
//     },
//     success : function(data){
//       location.href = '/codification';
//     }
//   })
// });