
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var content = document.getElementById('content');

keyword.addEventListener('keyup', function(){
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status == 200){
			content.innerHTML = xhr.responseText;
		}
	}


	xhr.open('GET','assets/php/res.php?keyword='+ keyword.value, true);
	xhr.send();
});
