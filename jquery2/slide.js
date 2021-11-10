var KichThuoc = document.getElementsByClassName("slide")[0].clientWidth;
console.log(KichThuoc);
var ChuyenSlide = document.getElementsByClassName("chuyen-slide")[0];
var Img = document.getElementsByTagName("img");
var Max = KichThuoc * Img.length;
Max -= KichThuoc;
var Chuyen = 0;
document.getElementById("next").onclick=function(){next()};
function next(){
	if(Chuyen < Max){
		Chuyen += KichThuoc;
	}else{
		Chuyen = 0;
	}
	ChuyenSlide.style.marginLeft = "-" + Chuyen + "px";
}
document.getElementById("back").addEventListener('click',back);
function back(){
	if(Chuyen == 0){
		Chuyen = Max;
	}else{
		Chuyen -= KichThuoc;
	}
	ChuyenSlide.style.marginLeft = "-" + Chuyen + "px";
}
setInterval(function(){
	next()
},2000);
