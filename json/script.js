// var mhs = document.getElementById('mahasiswa');
// var xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function () {
//   if(xhr.readyState == 4 && xhr.status==200){
//       var data = JSON.parse(this.responseText);
//       data = data.mahasiswa;
//       for (let x in data){
//         mhs.innerHTML += data[x].nama +'<br>'+data[x].umur +'<br>'+data[x].hobi +'<br>';
//       }
//   }  
// };
// xhr.open('GET', 'coba.json', true);
// xhr.send();
$.ajax({
  type: "GET",
  url: "coba.json",
  dataType: "json",
  success: function (response) {
    $.each(response.mahasiswa, function (index, value) { 
       $('#mahasiswa').append(value.nama+"<br>"+value.umur+"<br>"+value.hobi+"<br>");
    });
  }
});