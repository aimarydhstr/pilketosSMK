<script src="<?= base_url('assets/js/jquery.js'); ?>"></script>
<script src="<?= base_url('assets/js/masign.js'); ?>"></script>

<script type="text/javascript">

onscroll = function(){animasi()}

function animasi(){
    if(document.body.scrollTop > 200 || document.documentElement.scrollTop > 200){
        document.getElementById('navbar').classList.add('navbar-fixed');
        document.getElementById('up').classList.add('tampil');
        document.getElementById('icon').classList.add('vh');
        document.getElementById('post').classList.add('block');
    }
    else if(document.body.scrollTop < 200 || document.documentElement.scrollTop < 200){
        document.getElementById('navbar').classList.remove('navbar-fixed');
        document.getElementById('up').classList.remove('tampil');
        document.getElementById('icon').classList.remove('vh');
        document.getElementById('post').classList.remove('block');
    }
}

function submenu() {
    document.getElementById('sub').classList.toggle('blocks');
    document.getElementById('toggle').classList.toggle('rotate');
}

function nav(){
    document.getElementById('terwrapper').classList.toggle('buka');
    document.getElementById('nav').classList.toggle('show');
}
function ter(){
    document.getElementById('terwrapper').classList.remove('buka');
    document.getElementById('nav').classList.remove('show');
}
function detail(i){
    document.getElementById('back'+i).classList.toggle('block');
    document.getElementById('pop'+i).classList.toggle('blocks');
}
function hide(i){
    document.getElementById('back'+i).classList.remove('block');
    document.getElementById('pop'+i).classList.remove('blocks');
}
function vote(i){
    document.getElementById('backs'+i).classList.toggle('block');
    document.getElementById('pops'+i).classList.toggle('blocks');
    document.getElementById('pop'+i).classList.remove('blocks');
    document.getElementById('back'+i).classList.remove('block');
}
function hides(i){
    document.getElementById('backs'+i).classList.remove('block');
    document.getElementById('pops'+i).classList.remove('blocks');
}

</script>

</body>
</html>
