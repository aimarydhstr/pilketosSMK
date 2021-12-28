document.getElementById("iconside").onclick = function(){buka()};
function buka() {
	document.getElementById("sidenav").classList.add("b-sidenav");
}

document.getElementById("iconsides").onclick = function(){tutup()};
function tutup() {
	document.getElementById("sidenav").classList.remove("b-sidenav");
}

document.getElementById("submenu").onclick = function(){tampil()};
function tampil() {
	document.getElementById("submenunya").classList.toggle("tampil");
}
