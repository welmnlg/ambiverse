// var keyword = document.getElementById('keyword');
// var tombolcari = document.getElementById('tombolcari');
// var container = document.getElementById('container');

// //tambah event ketika keyword ditulis
// keyword.addEventListener('keyup', function() {
//     //buat objek ajax
//     var xhr = new XMLHttpRequest();

//     //cek kesiapan ajax
//     xhr.onreadystatechange = function() {
//         if(xhr.readyState == 4 && xhr.status == 200) {
//             container.innerHTML = xhr.responseText;
//         }
//     }
//     xhr.open('GET', 'js/tabel.php?keyword=' +keyword.value, true);
//     xhr.send();
// });